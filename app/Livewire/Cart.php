<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class Cart extends Component
{
    public $count = 0;
    public $cart = [];
    public $cartSubtotal = 0; // Initialize cart subtotal

    public function mount()
    {
        $this->cart = session('cart', []);
        $this->calculateCartSubtotal();
    }

    public function checkout()
    {
        // Generate a unique orderID
        $orderID = "OID" . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

        // Insert cart items into the order table
        foreach ($this->cart as $id => $item) {
            DB::table('orders')->insert([
                'order_id' => $orderID,
                'product_name' => $item['product_name'],
                'product_price' => $item['product_price'],
                'product_image' => $item['product_image'],
                'product_classification' => $item['product_classification'],
                'payment_status' => 'pending',
                
                // Add other fields as needed
            ]);
        }

        // After inserting into the order table, you can clear the cart
        $this->cart = [];
        session(['cart' => $this->cart]);

        $data = [
            'data' => [
                'attributes' => [
                    'line_items' => [
                        [
                            'currency' => 'PHP',
                            'amount' => $this->cartSubtotal * 100,
                            'description' => 'text',
                            'name' => 'Add Credits',
                            'quantity' => 1,
                        ],
                    ],
                    'payment_method_types' => ['card', 'gcash'],
                    'success_url' => route('dashboard'),
                    'cancel_url' => route('dashboard'),
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

        // return redirect()->to($response->data->attributes->checkout_url);

        // Storing the checkout_url in the session
Session::put('checkout_url', $response->data->attributes->checkout_url);

        // Redirect or display a success message
        return redirect()->route('qrPayment');
    }
    

    // Function to calculate item totals and cart subtotal
    public function calculateCartSubtotal()
    {
        $subtotal = 0;

        foreach ($this->cart as $id => $item) {
            $itemTotal = $item['product_price'] * $item['quantity'];
            $subtotal += $itemTotal;
            $this->cart[$id]['item_total'] = $itemTotal; // Store the item total in the cart data
        }

        $this->cartSubtotal = $subtotal;
    }

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function removeItem($id)
    {
        if (isset($this->cart[$id])) {
            unset($this->cart[$id]);
            session(['cart' => $this->cart]);

            // Recalculate the cart subtotal after removing the item
            $this->calculateCartSubtotal();
        }
    }

 
    
    public function render()
    {
        return view('livewire.cart');
    }
}
