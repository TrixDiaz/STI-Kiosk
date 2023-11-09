<div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                <div class="pointer-events-auto w-screen max-w-md">
                    <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                        <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                            <div class="flex items-start justify-between">
                                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart</h2>
                                <!-- Add radio buttons for Dine-In and Take-Out here -->
                                <div class="ml-3 flex h-7 items-center">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="order_type" value="dine-in" wire:model="orderType">
                                        <span class="ml-2">Dine-In</span>
                                    </label>
                                    <label class="ml-4 inline-flex items-center">
                                        <input type="radio" name="order_type" value="take-out" wire:model="orderType">
                                        <span class="ml-2">Take-Out</span>
                                    </label>
                                </div>
                                <div class="ml-3 flex h-7 items-center">
                                    <button type="button" class="relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                                        <a href="{{ route('kiosk') }}" wire:navigate>
                                            <span class="absolute -inset-0.5"></span>
                                            <span class="sr-only">Close panel</span>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </a>
                                    </button>
                                </div>
                            </div>
                            <div class="mt-8 overflow-y-auto h-auto">
                                <div class="flow-root">
                                    <ul role="list" class="-my-6 divide-y divide-gray-200">
                                        @forelse ($cart as $id => $item)
                                            <li class="flex py-6">
                                                <div
                                                    class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                    <img src="/storage/{{ $item['product_image'] }}" alt="Product Image"
                                                        class="h-full w-full object-cover object-center">
                                                </div>

                                                <div class="ml-4 flex flex-1 flex-col">
                                                    <div>
                                                        <div
                                                            class="flex justify-between text-base font-medium text-gray-900">
                                                            <h3>
                                                                <a href="#">{{ $item['product_name'] }}</a>
                                                            </h3>
                                                            <p class="ml-4">₱{{ $item['product_price'] }}</p>
                                                        </div>
                                                        {{-- <p class="mt-1 text-sm text-gray-500">{{ $item['product_category'] }}</p> --}}
                                                    </div>
                                                    <div class="flex flex-1 items-end justify-between text-sm">
                                                        <p class="text-gray-500">Quantity: {{ $item['quantity'] }}</p>
                                                        <p class="text-gray-500">Total:
                                                            ₱{{ number_format($item['item_total'], 2) }}</p>
                                                        <!-- Display item total -->
                                                        <div class="flex">
                                                            <button wire:click="removeItem({{ $id }})"
                                                                type="button"
                                                                class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                            <p class="text-md capitalize">No Item Found. Continue shopping</p>
                                        @endforelse
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                            <div class="flex justify-between text-base font-medium text-gray-900">
                                <p>Subtotal</p>
                                <p>₱{{ number_format($cartSubtotal, 2) }}</p>
                            </div>
                            <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                            <div class="flex justify-between mt-6">
                                <a wire:click="checkout"
                                    class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-12 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Pay
                                    Via QR</a>
                                <a href="{{ route('receipt') }}"
                                    class=" flex items-center justify-center rounded-md border border-transparent bg-transparent px-6 py-3 text-base font-medium text-indigo-600 shadow-sm hover:bg-white hover:text-black">Over
                                    the Counter</a>
                            </div>
                            <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                <p>
                                    or
                                    <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">
                                        <a href="{{ route('kiosk') }}">Continue Shopping</a>
                                        <span aria-hidden="true"> &rarr;</span>
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
