<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
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
