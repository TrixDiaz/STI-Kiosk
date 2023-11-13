<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Queue;
use App\Models\Serve;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{

   /** 
    * Start of Products 
    **/

   public function donmono()
   {
       $products = Stock::where('product_category', 'Donmono')->get();

       return view('products.donmono', compact('products'));
   }

   public function ippin()
   {
       $products = Stock::where('product_category', 'Ippin ryori')->get();

       return view('products.ippin', compact('products'));
   }

   public function kushiyaki()
   {
       $products = Stock::where('product_category', 'Kushiyaki')->get();

       return view('products.kushiyaki', compact('products'));
   }

   public function makizushi()
   {
       $products = Stock::where('product_category', 'Makizushi')->get();

       return view('products.makisushi', compact('products'));
   }

   public function men()
   {
       $products = Stock::where('product_category', 'Men')->get();

       return view('products.men', compact('products'));
   }

   public function nigirizushi()
   {
       $products = Stock::where('product_category', 'Nigirizushi')->get();

       return view('products.nigirizushi', compact('products'));
   }

   public function ochazuke()
   {
       $products = Stock::where('product_category', 'Ochazuke')->get();

       return view('products.ochazuke', compact('products'));
   }

   public function ramen()
   {
       $products = Stock::where('product_category', 'Ramen')->get();

       return view('products.ramen', compact('products'));
   }

   public function salad()
   {
       $products = Stock::where('product_category', 'Salad')->get();

       return view('products.salad', compact('products'));
   }

   public function sashimi()
   {
       $products = Stock::where('product_category', 'Sashimi')->get();

       return view('products.sashimi', compact('products'));
   }

   public function tempura()
   {
       $products = Stock::where('product_category', 'Tempura')->get();

       return view('products.tempura', compact('products'));
   }

   public function yakizakana()
   {
       $products = Stock::where('product_category', 'Yakizakana')->get();

       return view('products.yakizakana', compact('products'));
   }

   public function zensai()
   {
       $products = Stock::where('product_category', 'Zensai')->get();

       return view('products.zensai', compact('products'));
   }

   /** 
    * End of Products 
    **/

    public function destroyServe(Serve $serve)
{
    // Get the order_id of the serve
    $orderId = $serve->order_id;

    // Delete all serves with the same order_id
    Serve::where('order_id', $orderId)->delete();

    // Delete all orders with the same order_id from the "queue" table
    Queue::where('order_id', $orderId)->delete();

    // Delete the specific serve record
    $serve->delete();

    return redirect()
        ->back()
        ->with('success', 'Order served and removed from the "serve" table, along with related orders');
}


    public function queue()
    {
        $queues = DB::table('queues')->get();
        $serves = DB::table('serves')->get();

        return view('queue', compact('queues', 'serves'));
    }

    public function orderServe(Request $request, Order $order)
    {
        // Move the order to the "serve" table
        Serve::create([
            'order_id' => $order->order_id,
            // Add any other fields you need for the "serve" table
        ]);
        $order->delete(); // Delete the order from the "queue" table

        return redirect()
            ->back()
            ->with('success', 'Order served successfully');
    }

    

    
    /**
     * Remove the specified order id from queue
     * and insert to serve.
     */
    public function serving(Request $request, $order_id)
    {
        // Find all orders in the "queue" table with the same order_id
        $orders = Queue::where('order_id', $order_id)->get();
    
        // Check if any orders exist
        if ($orders->isNotEmpty()) {
            // Insert each order into the "serve" table
            foreach ($orders as $order) {
                Serve::create([
                    'order_id' => $order->order_id,
                    // Add any other fields you need for the "serve" table
                ]);
    
                // Delete the order from the "queue" table
                $order->delete();
            }
    
            return redirect()
                ->route('dashboard')
                ->with('success', 'Orders served successfully');
        } else {
            // Handle the case where no orders with the specified order_id were found
            return redirect()
                ->route('dashboard')
                ->with('error', 'Orders not found');
        }
    }
    
    

    /**
     *
     * Fetch Orders
     *
     **/



    /**
     *
     * Delete From Order Insert to Queue
     *
     **/

     public function prepareOrder(Request $request,$order_id)
     {
         // dd(session()->all());
         $orderDetails = Order::where('order_id', $order_id)->first();
         dd($orderDetails);
         // Check if the order exists
         if (!$orderDetails) {
             return redirect()
                 ->back()
                 ->with('error', 'Order not found.');
         }
     
        
         // Insert the order ID into the queue table
         DB::table('queues')->insert([
             'order_id'         => $orderDetails->order_id,
             'product_name'     => $orderDetails->product_name,
             'product_price'    => $orderDetails->product_price,
             'quantity'         => $orderDetails->quantity,
             'total'            => $orderDetails->total,
             'order_type'       => $orderDetails->order_type,
             'payment_status'   => 'Cash',
             'created_at'       => now(),
             'updated_at'       => now(),
         ]);
     // Soft delete the order from the orders table
     Order::where('order_id', $order_id)->delete();
         return redirect()
             ->back()
             ->with('success', 'Order prepared and added to the queue.');
     }
}
