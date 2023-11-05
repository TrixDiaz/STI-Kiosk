<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Donmono extends Component
{
   

    public function render()
    {
        $products = Product::all();
        return view('livewire.donmono', compact('products'));
    }
}
