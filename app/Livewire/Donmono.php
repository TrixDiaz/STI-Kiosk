<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Stock;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Donmono extends Component
{
    public $products; // List all product
    public $cart = []; // Initialize the cart as an empty array
    public $productName;
    public $productImage;
    public $productPrice;

    public function mount()
    {
        $this->products = Stock::all();
        
    }

    public function addToCart($id)
    {
        $product = Stock::findOrFail($id);
    
        // Retrieve the current cart from the session
        $this->cart = session('cart', []);
    
        // Generate a unique orderID
        // $orderID = "" . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
    
        // Check if the product is already in the cart
        if (isset($this->cart[$id])) {
            // If the product is in the cart, increase the quantity
            $this->cart[$id]['quantity']++;
        } else {
            // Add the product to the cart with the generated orderID
            $this->cart[$id] = [
                // "order_id" => $orderID,
                "product_name" => $product->product_name,
                "product_image" => $product->product_image,
                "product_price" => $product->product_price,
                // "product_category" => $product->product_category,
                "quantity" => 1,
            ];
        }
    
        // Store the updated cart in the session
        session(['cart' => $this->cart]);
    
        // You can also show a message that the product has been added to the cart if needed.
    }
    
    

    

   

    public function render()
    {
        return view('livewire.donmono');
    }
}
