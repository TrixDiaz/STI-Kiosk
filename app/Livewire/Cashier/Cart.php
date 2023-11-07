<?php

namespace App\Livewire\Cashier;

use Livewire\Component;

class Cart extends Component
{

    public $cart = [];


    public function removeFromCart($productId)
    {
        $this->cart = array_filter($this->cart, function ($item) use ($productId) {
            return $item->id !== $productId;
        });
    }
    
    public function render()
    {
        return view('livewire.cashier.cart');
    }
}
