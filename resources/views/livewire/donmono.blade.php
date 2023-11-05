<div>
    <x-kiosk-layout>
        <div class="py-10">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($products as $product)
                        <!-- Product 1 -->
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                            <div class="shadow-lg">
                                <img wire:model="productImage" src="/storage/{{ $product->product_image }}"
                                    alt="Product Image" class="w-full h-60 p-3 shadow-md"> <!-- Set the height here -->
                                <div class="flex justify-between items-center px-3">
                                    <div class="order-first">
                                        <h2 wire:model="productName" class="text-lg font-semibold p-2">
                                            {{ $product->product_name }}</h2>
                                    </div>
                                    <div class="order-last">
                                        <h2 wire:model="productPrice" class="text-lg font-semibold p-2">
                                            ₱{{ $product->product_price }}</h2>
                                    </div>
                                </div>
                                <div>
                                    <p>{{ $product->product_classification }}</p>
                                </div>
                                <button wire:click="addToCart({{ $product->id }})" type="button"
                                    class="m-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-3.5 h-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 18 21">
                                        <path
                                            d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                                    </svg>
                                    Buy now
                                </button>
                               
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </x-kiosk-layout>
</div>
