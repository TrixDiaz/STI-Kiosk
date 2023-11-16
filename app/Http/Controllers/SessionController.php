<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Queue;
use App\Models\Stock;
use App\Models\Revenue;
use Filament\Notifications\Events\DatabaseNotificationsSent;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Filament\Notifications\Notification;

class SessionController extends Controller
{
    public function start()
    {
        session()->forget('cart'); // Clear the Session in Cart
        return view('welcome'); // Tab to Start
    }

    public function kiosk()
    {
        return view('kiosk');
    }

    public function cart()
    {
        return view('cart');
    }

    public function qrCode()
    {
        return view('qrCode');
    }

    /**
     * Find by ID the User order and store to Shopping Cart Session
     */
    public function addToCart(Request $request, $id)
    {
        $product = Stock::findOrFail($id);

        // Check if product_stock is zero
        if ($product->product_stock == 0) {
            // You can add additional logic here as per your requirements
            Notification::make()
                ->success()
                ->icon('heroicon-o-archive-box')
                ->title('Stocks Notification')
                ->body(' No stock Available for product ' . $product->product_name)
                // ->broadcast($usersToNotify);
                ->sendToDatabase(
                    $usersToNotify = User::whereHas('roles', function ($query) {
                        $query->where('id', [1, 2, 3]);
                    })->get(),
                )->broadcast($usersToNotify);

            $usersToNotify->push(Auth::user());
            
                // event(new DatabaseNotificationsSent($usersToNotify));
            return redirect()
                ->back()
                ->with('success', 'No stocks available for this product.');
        }

        $cart = session()->get('cart', []);

        $orderType = $request->input('order_type'); // Get the selected order type from the input
        $total = $request->input('total');

        // Check if the product is already in the cart
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'product_name' => $product->product_name,
                'product_price' => $product->product_price,
                'product_image' => $product->product_image,
                'product_category' => $product->product_category,
                'quantity' => 1,
                'order_type' => $orderType,
                'total' => $total,
            ];
        }

        session()->put('cart', $cart); // update the cart

        return redirect()
            ->back()
            ->with('success', 'Product added to cart!');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated!');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed!');
        }
    }

    /**
     * Get the User order from shopping cart and insert to Order Table and will return to receipt show the order
     */
    public function createOrder(Request $request)
    {
        $cart = session('cart');
    
        // Check if the cart is empty
        if (empty($cart)) {
            return redirect()->back()->with('success', 'No items in the cart. Please add items to your cart before placing an order.');
        }
    
        $orderDetails = [];
        $total = $request->input('total');
        $orderID = $request->input('orderID');
        $orderType = $request->input('order_type');
    
        foreach ($cart as $item) {
            $orderDetails[] = [
                'order_id' => $orderID,
                'product_name' => $item['product_name'],
                'product_price' => $item['product_price'],
                'quantity' => $item['quantity'],
                'order_type' => $orderType,
                'total' => $total,
                'payment_status' => 'Pending',
                'created_at' => now(),
                'updated_at' => now(),
                // Add other fields as needed
            ];
        }
    
        Order::insert($orderDetails);
    
        session()->forget('cart');
    
        return redirect()
            ->route('receipt', ['orderID' => $orderID])
            ->with('success', 'Order created.');
    }
    

    /**
     * Qr Code Generator
     */
   public function qrPayment(Request $request)
{
    $total = $request->input('total');
    $orderID = '' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
    $orderType = $request->input('order_type');
    $cart = session('cart');

    // Check if the cart is empty
    if (empty($cart)) {
        return redirect()->back()->with('success', 'No items in the cart. Please add items to your cart before making a payment.');
    }

    $orderDetails = [];
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

    session()->put('cart', $orderDetails);

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
                'success_url' => route('successOrder', ['orderDetails' => $orderDetails]),
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

    Session::put('session_id', $response->data->id);
    Session::put('checkout_url', $response->data->attributes->checkout_url);

    return redirect()
        ->to('qrCode')
        ->with('checkout_url', $response->data->attributes->checkout_url, 'cart', $cart);
}


    /**
     * Success Payment in API
     */
    public function successOrder(Request $request)
    {
        // Retrieve orderDetails from URL parameters
        $orderDetails = $request->input('orderDetails');
        $orderID = '' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT); // Create random 6 digit generator

        foreach ($orderDetails as $item) {
            // Insert each item into the orders table
            Queue::create([
                'order_id' => $orderID,
                'product_name' => $item['product_name'],
                'product_price' => $item['product_price'],
                'quantity' => $item['quantity'],
                'order_type' => $item['order_type'],
                'total' => $item['total'],
                'payment_status' => 'Gcash',
                'created_at' => now(),
                'updated_at' => now(),
                // Add other fields as needed
            ]);
            Revenue::create([
                'order_id' => $orderID,
                'product_name' => $item['product_name'],
                'product_price' => $item['product_price'],
                'quantity' => $item['quantity'],
                'order_type' => $item['order_type'],
                'total' => $item['total'],
                'payment_status' => 'Gcash',
                'created_at' => now(),
                'updated_at' => now(),
                // Add other fields as needed
            ]);

            // Update the product stock quantity
            $product = Stock::where('product_name', $item['product_name'])->first();
            if ($product) {
                $newQuantity = $product->quantity - $item['quantity'];
                $product->update(['quantity' => $newQuantity]);
            }
        }

        // Optionally, you can clear the cart after the order is created
        session()->forget('cart');

        // Redirect back or to a confirmation page
        return redirect()
            ->route('receipt', ['orderID' => $orderID])
            ->with('success', 'Order created.');
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

    public function QRshowReceipt($orderID)
    {
        // Retrieve the order details from the database based on the order ID
        $orderDetails = Queue::where('order_id', $orderID)->get();

        // You can pass the order details to a view for displaying
        return view('receipt', ['orderDetails' => $orderDetails]);
    }
}
