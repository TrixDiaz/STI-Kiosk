<?php

namespace App\Livewire;

use App\Models\Stock;
use Livewire\Component;

class PosPage extends Component
{



    public function render()
    {
        return view('livewire.pos-page', [
            'products' => Stock::paginate(6),
        ]);
    }
}
