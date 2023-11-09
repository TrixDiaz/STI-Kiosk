<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.donmono',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $product = Stock::findOrFail($id);

        $cart = session()->get('cart', []);
        
        $orderType = $request->input('order_type'); // Get the selected order type from the request

        if(isset($cart[$id])) {
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

        session()->put('cart',$cart);
        return redirect()->back()->with('success', 'Product add to cart Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function createOrder(Request $request)
{
    // Retrieve products from the session
    $cart = session('cart');

    $orderID = "" . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

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
    return redirect()->route('kiosk')->with('success', 'Order has been created successfully.');
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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

        return redirect()->route('cart')->with('success', 'Item removed from the cart successfully.');
    }
}
