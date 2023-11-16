<?php

namespace App\Livewire;

use App\Models\Stock;
use Livewire\Component;

class KioskPage extends Component
{

    public function render()
    {
        return view('livewire.kiosk-page', [
            'products' => Stock::paginate(6),
        ]);
    }
}
