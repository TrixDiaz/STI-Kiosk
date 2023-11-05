<ul>
    @foreach ($cart as $id => $item)
        <li class="mb-2">
            {{ $item['product_name'] }} - Price: ₱{{ $item['product_price'] }} - Quantity: {{ $item['quantity'] }}
            <button wire:click="removeItem({{ $id }})" type="button"
                class="text-red-600 ml-2 focus:outline-none">
                Remove Item
            </button>
        </li>
    @endforeach
</ul>
