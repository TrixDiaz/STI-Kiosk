<?php

namespace App\Livewire\Cashier;

use App\Models\Product;
use App\Models\Stock;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Donmono extends Component
{

    public $products;
    public $cart = [];

    public function mount()
    {
        $this->products = Stock::all();
    }

    public function addToCart($productId)
    {
        if (Auth::check()) {
            // User is authenticated, add the product to the shopping cart
            // You can implement your cart logic here
            $product = Stock::find($productId);
            if ($product) {
                $this->cart[] = $product;
            }
        } else {
            // User is not authenticated, redirect to the login page
            return Redirect::to('/login');
        }
    }

  

    public function render()
    {
        return view('livewire.cashier.donmono');
    }
}
