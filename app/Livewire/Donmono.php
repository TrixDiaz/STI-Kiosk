<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Donmono extends Component
{
   public $products;

   public function addToCart($id)
   {
    dd($id);
   }

    public function render()
    {
        $this->products = Product::all();
        return view('livewire.donmono');
    }
}
