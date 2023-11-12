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

   












}
