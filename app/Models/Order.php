<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    protected $fillable = ['order_id', 'product_name', 'product_price', 'quantity', 'total', 'order_type', 'product_category', 'payment_status', 'session_id'];

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
        // Update the payment status to "cash"
        $this->update(['payment_status' => 'cash']);
    
        // Get the order ID
        $orderId = $this->order_id;
    
        // Get all products associated with the order
        $orderItems = DB::table('orders')
            ->where('order_id', $orderId)
            ->get();
    
        // Delete all products associated with the order
        DB::table('orders')->where('order_id', $orderId)->delete();
    
        // Create a new record in the queue table for each order item
        foreach ($orderItems as $item) {
            // Create a new record in the queue table with the order item data
            Queue::create([
                'order_id' => $item->order_id,
                'product_name' => $item->product_name,
                'product_price' => $item->product_price,
                'quantity' => $item->quantity,
                'total' => $item->total,
                'order_type' => $item->order_type,
                'payment_status' => $item->payment_status,
                'created_at' => now(),
            ]);
        }
    }
    

}
