<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Stock;
use Illuminate\Http\Request;

class KioskController extends Controller
{
   /** 
    *Start 
    **/

    public function start()
    {
        session()->forget('cart'); // Clear the Session in Cart
        return view('welcome'); // Tab to Start 
    }

    public function kiosk()
    {
        return view('kiosk'); // Return to Kiosk 
    }

    /**
     * Find by ID the User order and store to Shopping Cart Session
     */
    public function addToCart(Request $request, $id)
    {
        $product = Stock::findOrFail($id);

        $cart = session()->get('cart', []);

        $orderType = $request->input('order_type'); // Get the selected order type from the input
        
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'product_name' => $product->product_name,
                'product_price' => $product->product_price,
                'product_category' => $product->product_category,
                'quantity' => 1,
                'order_type' => $orderType, 
            ];
        }
        session()->put('cart', $cart); // update the cart
        
        return redirect()->back()->with('success', 'Product add to cart Successfully!');
    }

     /**
     * Remove the specified resource from shopping cart.
     */

    public function removeFromCart(string $id)
    {
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart')->with('success', 'Item removed from the cart successfully.');
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
                // Add other fields as needed
            ];
        }
      
        Order::insert($orderDetails);   // Insert all the order details into the database

        session()->forget('cart'); // Optionally, you can clear the cart after the order is created

        return redirect()->route('receipt', ['orderID' => $orderID])->with('success', 'Order has been created successfully.');
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
