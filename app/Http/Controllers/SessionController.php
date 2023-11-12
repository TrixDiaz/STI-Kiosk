<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Stock;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
  
    public function start()
    {
        session()->forget('cart'); // Clear the Session in Cart
        return view('welcome'); // Tab to Start 
    }
    
    public function cart()
    {
        return view('cart');
    }

      /**
     * Find by ID the User order and store to Shopping Cart Session
     */
    public function addToCart(Request $request, $id)
    {
        $product = Stock::findOrFail($id);

        $cart = session()->get('cart', []);

        $orderType = $request->input('order_type'); // Get the selected order type from the input
        $total = $request->input('total');
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'product_name' => $product->product_name,
                'product_price' => $product->product_price,
                'product_category' => $product->product_category,
                'quantity' => 1,
                'order_type' => $orderType, 
                'total' =>  $total,
            ];
        }
        session()->put('cart', $cart); // update the cart
        
        return redirect()->back()->with('success', 'Product add to cart Successfully!');
    }
 
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

     /**
     * Get the User order from shopping cart and insert to Order Table and will return to receipt show the order
     */
    public function createOrder(Request $request)
    {
        $orderDetails = []; // Declarad null array

        $cart = session('cart'); // Retrieve products from the session

        $orderID = '' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT); //Create random 6 digit generator
        
        $total = $request->input('total'); // Get the Total Request from input
        $orderID = $request->input('orderID'); 
        $orderType = $request->input('order_type'); // Get the order type Request from input
        
        // You can now insert the products into your orders table.
        foreach ($cart as $item) {
            $orderDetails[] = [
                'order_id' => $orderID,
                'product_name' => $item['product_name'],
                'product_price' => $item['product_price'],
                'quantity' => $item['quantity'],
                'order_type' => $orderType,
                'total' => $total,
                'created_at' => now(),
                'updated_at' => now(),
                // Add other fields as needed
            ];
        }
      
        Order::insert($orderDetails);   // Insert all the order details into the database

        session()->forget('cart'); // Optionally, you can clear the cart after the order is created

        return redirect()->route('receipt', ['orderID' => $orderID])->with('success', 'Order has been created successfully.');
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
                    'success_url' => route('successOrder', ['total' => $total]),
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

        
        return redirect()->to($response->data->attributes->checkout_url);

        // Redirect or display a success message
        // return redirect()
        //     ->route('qrCode', ['orderDetails' => $orderDetails])
        //     ->with('checkout_url', $response->data->attributes->checkout_url);
    }


    public function qrCode()
    {
        return view('qrCode');
    }


     /**
     * Success Payment in API
     */
    public function successOrder(Request $request)
    {
        // dd(session()->all());
        // Assuming the cart data is stored in the session
        $cartData = session('cart');
        $orderID = '' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT); //Create random 6 digit generator
        $total = $request->input('total'); // Get the Total Request from input
    
        // Check if the cart data exists and is an array
        if ($cartData && is_array($cartData)) {
            foreach ($cartData as $item) {
                // Insert each item into the orders table
                Order::create([
                    'order_id' => $orderID,
                    'product_name' => $item['product_name'],
                    'product_price' => $item['product_price'],
                    'quantity' => $item['quantity'],
                    'order_type' => $item['order_type'],
                    'total' => $total,
                    'product_category' => $item['product_category'],
                    // Add other fields as needed
                ]);
            }
    
            // Optionally, you can clear the cart after the order is created
            session()->forget('cart');
    
            // Redirect back or to a confirmation page
            return redirect()->route('receipt', ['orderID' => $orderID])->with('success', 'Order has been created successfully.');
        } else {
            // Handle the case where there is no cart data
            return redirect()->route('donmono')->with('error', 'Cart is empty.');
        }
    }

     /**
     * Fetch all the orders of Customer or Receipt
     */
    public function showReceipt($orderID)
    {
        // Retrieve the order details from the database based on the order ID
        $orderDetails = Order::where('order_id', $orderID)->get();

        // You can pass the order details to a view for displaying
        return view('receipt', ['orderDetails' => $orderDetails]);
    }
}