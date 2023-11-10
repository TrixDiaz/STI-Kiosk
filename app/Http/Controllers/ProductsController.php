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
    


    // Start

    public function start()
    {
        session()->forget('cart');
        return view('welcome');
    }

    public function kiosk()
    {
        session()->forget('cart');
        return view('kiosk');
    }

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
    
        return view('queue', compact('queues','serves'));
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
     * Get the User order and store to Shopping Cart Session
     */
    public function store(Request $request, $id)
    {
        $product = Stock::findOrFail($id);

        $cart = session()->get('cart', []);

        $orderType = $request->input('order_type'); // Get the selected order type from the request

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'product_name' => $product->product_name,
                'product_price' => $product->product_price,
                'product_category' => $product->product_category,
                'quantity' => 1,
                'order_type' => $orderType, // Add the selected order type to the cart item
            ];
        }

        session()->put('cart', $cart);
        return redirect()
            ->back()
            ->with('success', 'Product add to cart Successfully!');
    }

    /**
     * Get the User order and insert to Order Table
     */
    public function createOrder(Request $request)
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
     * Qr Code Generator
     */
    public function qrPayment(Request $request)
    {
        $total = $request->input('total');

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
                    'success_url' => route('successOrder'),
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

        // Storing the checkout_url in the session
        Session::put('checkout_url', $response->data->attributes->checkout_url);

        // return redirect()->to($response->data->attributes->checkout_url);

        // Redirect or display a success message
        return view('qrCode', ['checkout_url' => $response->data->attributes->checkout_url]);
    }

    /**
     * Success Payment in API
     */
    public function successOrder(Request $request)
    {
        // Retrieve products from the session
        $cart = session('cart');

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
     * Fetch all the orders of Customer | Receipt
     */
    public function showOrder($orderID)
    {
        // Retrieve the order details from the database based on the order ID
        $orderDetails = Order::where('order_id', $orderID)->get();

        // You can pass the order details to a view for displaying
        return view('order', ['orderDetails' => $orderDetails]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()
            ->route('cart')
            ->with('success', 'Item removed from the cart successfully.');
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
