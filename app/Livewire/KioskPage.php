<?php

namespace App\Livewire;

use App\Models\Stock;
use Livewire\Component;

class KioskPage extends Component
{
    public $modalOpen;
    public $selectedProductId;
    public $selectedProduct;
    public $quantity = 1;
    


    public function mount()
    {
        // Clear the cart session variable at the beginning of a new session
        // session()->forget('cart');
    }

    public function incrementQuantity()
    {
        if ($this->selectedProduct && $this->quantity < $this->selectedProduct->product_stock) {
            $this->quantity++;
        }
    }

    public function decrementQuantity()
    {
        $this->quantity = max(1, $this->quantity - 1);
    }

    public function openModal($productId)
    {
        $this->selectedProductId = $productId;
        $this->selectedProduct = Stock::find($productId); // Replace 'Product' with your actual model name

       
         // Check if the product is out of stock
         if ($this->selectedProduct && $this->selectedProduct->product_stock === 0) {
            $this->dispatch('outOfStock');
            
        }

        $this->modalOpen = true;
    }

    public function closeModal()
    {
        $this->modalOpen = false;
        $this->redirectRoute('kiosk');
    }

    public function addToCart()
    {
        // Check if the selectedProduct is set
        if ($this->selectedProduct) {
            // Check if the cart session variable exists
            $cart = session()->get('cart', []);

            // Add the selected product to the cart with its details
            $cart[$this->selectedProductId] = [
                'product_id' => $this->selectedProduct->id,
                'product_name' => $this->selectedProduct->product_name,
                'product_price' => $this->selectedProduct->product_price,
                'product_category' => $this->selectedProduct->product_category,
                'product_image' => $this->selectedProduct->product_image,
                'quantity' => $this->quantity,
            ];

            // Update the cart session variable
            session(['cart' => $cart]);

            // Close the modal after adding to cart
            $this->closeModal();
        }
    }

    public function render()
    {
        return view('livewire.kiosk-page', [
            'products' => Stock::paginate(6),
            
        ]);
    }
}
