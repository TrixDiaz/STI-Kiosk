<div>
  <h2>Your Shopping Cart</h2>
  @if (count($cart) > 0)
      <ul>
          @foreach ($cart as $item)
              <li>
                  {{ $item->name }}
                  <button wire:click="removeFromCart({{ $item->id }})">Remove</button>
              </li>
          @endforeach
      </ul>
  @else
      <p>Your shopping cart is empty.</p>
  @endif
</div>
