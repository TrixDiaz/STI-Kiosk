<?php

namespace App\Livewire;

use App\Models\Product;
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
        $this->products = Product::all();
        
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        // Retrieve the current cart from the session
        $this->cart = session('cart', []);

        // Check if the product is already in the cart
        if (isset($this->cart[$id])) {
            // If the product is in the cart, increase the quantity
            $this->cart[$id]['quantity']++;
        } else {
            // If the product is not in the cart, add it to the cart
            $this->cart[$id] = [
                "product_name" => $product->product_name,
                "product_image" => $product->product_image,
                "product_price" => $product->product_price,
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
