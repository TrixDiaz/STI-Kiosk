<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Queue;
use App\Models\Stock;
use App\Models\Revenue;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Filament\Notifications\Notification;

class CashierController extends Controller
{

    public function clear()
    {
        Auth::user()
            ->notifications()
            ->delete();

        return back()->with('success', 'Notifications cleared successfully.');
    }
    
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
    public function posAddToCart(Request $request, $id)
    {
        $product = Stock::findOrFail($id);

        // Check if product_stock is zero
        if ($product->product_stock == 0) {
            // You can add additional logic here as per your requirements
            Notification::make()
                ->success()
                ->icon('heroicon-o-archive-box')
                ->title('Stocks Notification')
                ->body(Auth::user()->name . ' No stock Available for product ' . $product->product_name)
                ->sendToDatabase(
                    $usersToNotify = User::whereHas('roles', function ($query) {
                        $query->where('id', [1, 2]);
                    })->get(),
                );

            $usersToNotify->push(Auth::user());

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
    

    public function posCart()
    {
        return view('pos.cart');
    }

    public function posUpdate(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated!');
        }
    }

    public function posRemove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed!');
        }
    }

    /**
     * Get the User order from shopping cart and insert to Order Table and will return to receipt show the order
     */
    public function posCreateOrder(Request $request)
    {
        $orderDetails = []; // Declarad null array

        $cart = session('cart'); // Retrieve products from the session

         // Check if the cart is empty
         if (empty($cart)) {
            return redirect()->back()->with('success', 'No items in the cart. Please add items to your cart before placing an order.');
        }

        $authUser = $request->input('name'); 
        $total = $request->input('total'); // Get the Total Request from input
        $orderID = $request->input('orderID'); 
        $orderType = $request->input('order_type'); // Get the order type Request from input
        
        // You can now insert the products into your orders table.
        foreach ($cart as $item) {
            $orderDetails[] = [
                'order_id' => $orderID,
                'product_name' => $item['product_name'],
                'product_price' => $item['product_price'],
                // 'product_image' => $item['product_image'],
                'quantity' => $item['quantity'],
                'order_type' => $orderType,
                'total' => $total,
                'name' => $authUser,
                'payment_status' => 'Cash',
                'created_at' => now(),
                'updated_at' => now(),
                // Add other fields as needed
            ];
             // Update product_stock in the Stock table
        Stock::where('product_name', $item['product_name'])
        ->decrement('product_stock', $item['quantity']);
        }
        session()->put('cart', $orderDetails);

        Queue::insert($orderDetails); 
        Revenue::insert($orderDetails);  // Insert all the order details into the database

        session()->forget('cart'); // Optionally, you can clear the cart after the order is created

        return redirect()->route('pos_receipt', ['orderID' => $orderID])->with('success', 'Order created.');
    }
      /**
     * Fetch all the orders of Customer or Receipt
     */
    public function posShowReceipt($orderID)
    {
        // Retrieve the order details from the database based on the order ID
        $orderDetails = Queue::where('order_id', $orderID)->get();

        // You can pass the order details to a view for displaying
        return view('pos.receipt', ['orderDetails' => $orderDetails]);
    }

    public function posQrCode()
    {
        return view('pos.qrCode');
    }

      /**
     * Qr Code Generator
     */
    public function posQrPayment(Request $request)
    {
        $total = $request->input('total');
        $orderID = '' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $orderType = $request->input('order_type');
        $authUser = $request->input('name');
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
                'name' => $authUser,
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
                    'success_url' => route('posSuccessOrder', ['orderDetails' => $orderDetails]),
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
    
        return redirect()->to('posQrCode')
            ->with('checkout_url', $response->data->attributes->checkout_url, 'cart', $cart);
    }
    

 /**
     * Success Payment in API
     */
    public function posSuccessOrder(Request $request)
{
    // Retrieve orderDetails from URL parameters
    $orderDetails = $request->input('orderDetails');
    $authUser = $request->input('name'); 
    $total = $request->input('total');
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
            'order_type' => $item['name'],
            'name' => $authUser,
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
            'order_type' => $item['name'],
            'name' => $authUser,
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
    return redirect()->route('pos_receipt', ['orderID' => $orderID])->with('success', 'Order created.');
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
