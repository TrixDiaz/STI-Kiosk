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
        $serve->delete();

        return redirect()
            ->back()
            ->with('success', 'Order served and removed from the "serve" table');
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

    

    

    public function qrCode()
    {
        return view('qrCode');
    }

    /**
     * Qr Code Generator
     */
    public function qrPayment(Request $request)
    {
        // Retrieve products from the session
        $cart = session('cart');

        $orderID = '' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $total = $request->input('total');
        $orderType = $request->input('order_type');

        $orderDetails = [];

        // You can now insert the products into your orders table.
        // Assuming you have an "Order" model and an "orders" table:
        foreach ($cart as $item) {
            $orderDetails[] = [
                'order_id' => $orderID,
                'product_name' => $item['product_name'],
                'product_price' => $item['product_price'],
                'quantity' => $item['quantity'],
                'order_type' => $orderType,
                'total' => $total,
                // Add other fields as needed
            ];
        }

        $data = [
            'data' => [
                'attributes' => [
                    'line_items' => [
                        [
                            'currency' => 'PHP',
                            'amount' => $total * 100,
                            'description' => 'text',
                            'name' => 'Add Credits',
                            'quantity' => 1,
                        ],
                    ],
                    'payment_method_types' => ['card', 'gcash'],
                    'success_url' => route('successOrder', ['total' => $total, 'orderDetails' => $orderDetails]),
                    'cancel_url' => route('/'),
                    'description' => 'text',
                ],
            ],
        ];

        $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions')
            ->withHeader('Content-Type: application/json')
            ->withHeader('accept: application/json')
            ->withHeader('Authorization: Basic c2tfdGVzdF9TZkhKUDFTb05nb1ltWFRBWDJ6d3NNYlI6')
            ->withData($data)
            ->asJson()
            ->post();

        // dd($response);
        Session::put('session_id', $response->data->id);
        Session::put('checkout_url', $response->data->attributes->checkout_url);

        // return redirect()->to($response->data->attributes->checkout_url);

        // Redirect or display a success message
        return redirect()
            ->route('qrCode', ['orderDetails' => $orderDetails])
            ->with('checkout_url', $response->data->attributes->checkout_url);
    }

    /**
     * Success Payment in API
     */
    public function successOrder(Request $request,$orderDetails)
    {
        // dd(session()->all());
        // Retrieve products from the session
        $cart = session('cart') ?? [];

        // Check if the cart is not empty
        if (empty($cart)) {
            return redirect()
                ->route('/')
                ->with('error', 'Cart is empty.');
        }

        $orderID = '' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

        $orderDetails = [];

        // Retrieve additional data from the request
        $total = $request->input('total');
        $orderType = $request->input('order_type');

        // You can now insert the products into your orders table.
        // Assuming you have an "Order" model and an "orders" table:
        foreach ($cart as $item) {
            $orderDetails[] = [
                'order_id' => $orderID,
                'product_name' => $item['product_name'],
                'product_price' => $item['product_price'],
                'quantity' => $item['quantity'],
                'order_type' => $orderType,
                'total' => $total,
                // Add other fields as needed
            ];
        }

        // Insert all the order details into the database
        Order::insert($orderDetails);

        // Optionally, you can clear the cart after the order is created
        session()->forget('cart');

        // Redirect back or to a confirmation page
        return redirect()
            ->route('order', ['orderID' => $orderID])
            ->with('success', 'Order has been created successfully.');
    }

   

   

    /**
     * Remove the specified order id from queue
     * and insert to serve.
     */
    public function serving(Request $request, Queue $order)
    {
        // Insert the order into the "serve" table
        Serve::create([
            'order_id' => $order->order_id,
            // Add any other fields you need for the "serve" table
        ]);

        // Delete the order from the "queue" table
        $order->delete();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Order served successfully');
    }

    /**
     *
     * Fetch Orders
     **/

    /**
     *
     * Delete From Order Insert to Queue
     **/

    public function prepareOrder($order_id)
    {
        // Soft delete the order from the orders table
        DB::table('orders')
            ->where('order_id', $order_id)
            ->delete();

        // Insert the order ID into the queue table
        DB::table('queues')->insert([
            'order_id' => $order_id,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Order prepared and added to the queue.');
    }
}
