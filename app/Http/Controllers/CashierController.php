<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CashierController extends Controller
{


    public function moveToQueueAndDelete(Order $order)
    {
        
        $order->moveToQueueAndDelete();

        // Redirect to the dashboard view
        return redirect()
            ->route('dashboard')
            ->with('success', 'Order moved to queue successfully.');
    }

     /**
     * Find by ID the User order and store to Shopping Cart Session
     */
    public function POSaddToCart(Request $request, $id)
    {
        $product = Stock::findOrFail($id);
    
        $user = Auth::user();
    
        // Retrieve the user's cart or create a new one
        $cart = $user->cart ?? [];
    
        $orderType = $request->input('order_type');
        $total = $request->input('total');
    
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
    
        // Update the user's cart
        $user->cart = $cart;
        $user->save();
    
        return redirect()->back()->with('success', 'Product added to cart!');
    }


      /** 
    * Start of Products 
    **/

   public function donmono()
   {
       $products = Stock::where('product_category', 'Donmono')->get();

       return view('pos.donmono', compact('products'));
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
    
}
