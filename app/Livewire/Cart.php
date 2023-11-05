<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Cart extends Component
{
    public $count = 0;
    public $cart = [];
   

    public function mount()
    {
        $this->cart = session('cart', []);
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
        }
    }
    
    
    public function render()
    {
        return view('livewire.cart');
    }
}
