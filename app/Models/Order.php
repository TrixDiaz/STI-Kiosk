<?php

namespace App\Models;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Revenue;
use App\Models\OrderLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    protected $fillable = ['order_id', 'product_name', 'product_price', 'product_image', 'quantity', 'total', 'order_type', 'product_category', 'payment_status', 'session_id','name','user_id','created_at','updated_at'];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Order.php
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    // Assuming there is a relationship between Order and Queue
    public function queue()
    {
        return $this->hasOne(Queue::class);
    }
    

    public function moveToQueueAndDelete()
    {
        // Get the order ID
        $orderId = $this->order_id;
        
        // Get all products associated with the order
        $orderItems = DB::table('orders')
            ->where('order_id', $orderId)
            ->get();
    
        // Iterate over order items
        foreach ($orderItems as $item) {
    
            // Update the payment status to "cash"
            $this->update(['payment_status' => 'Cash']);
    
            // Update the product_stock in the stocks table using Eloquent
            $productStock = Stock::where('product_name', $item->product_name)
                ->broadcast()->decrement('product_stock', $item->quantity);
    
            // Check if the product stock is less than 300
            if ($productStock < 300) {
                // Update the product status to "critical"
                Stock::where('product_name', $item->product_name)->update(['product_status' => 'critical']);
    
                Notification::make()
                ->success()
                ->icon('heroicon-o-archive-box')
                ->title('Stocks in Critical Notification')
                ->body(Auth::user()->name . ' Stock for this is Critical ' .  $item->product_name )
                ->sendToDatabase(
                    $usersToNotify = User::whereHas('roles', function ($query) {
                        $query->where('id', [1, 2, 3]);
                    })->get(),
                );

            $usersToNotify->push(Auth::user());
            }
                
            // Create a new record in the queue table with the order item data
            Queue::create([
                'order_id' => $item->order_id,
                'product_name' => $item->product_name,
                'product_price' => $item->product_price,
                'quantity' => $item->quantity,
                'total' => $item->total,
                'order_type' => $item->order_type,
                'name' => Auth::user()->name, 
                'payment_status' => 'Cash', // Update payment_status to "cash"
                'created_at' => now(),
            ]);
    
            // Create a new record in the orderLog table for each order item
            Revenue::create([
                'order_id' => $item->order_id,
                'product_name' => $item->product_name,
                'product_price' => $item->product_price,
                'quantity' => $item->quantity,
                'total' => $item->total,
                'order_type' => $item->order_type,
                'payment_status' => 'Cash', // Update payment_status to "cash"
                'name' => Auth::user()->name, // Update with the authenticated user's name
                'created_at' => now(),
            ]);
        }
    
        // Delete all orders with the same order_id from the orders table
        DB::table('orders')->where('order_id', $orderId)->delete();
    }
    
    
    
    
    
    

}
