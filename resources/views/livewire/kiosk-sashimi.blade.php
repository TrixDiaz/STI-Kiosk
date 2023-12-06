<div class="py-10 mx-3">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2">
            @foreach ($products as $product)
                <div class="relative mx-2">
                    <button class="w-full" wire:click="openModal({{ $product->id }})">
                        <img src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image"
                             class="h-40 md:h-48 lg:h-56 xl:h-64 w-full bg-cover rounded-lg" alt="" />
                        <div class="">
                            <div class="flex flex-col w-full text-black text-md px-2 py-2 rounded-md">
                                <div class="uppercase">
                                    <p class="font-thin">{{ $product->product_name }}</p>
                                </div>
                                <div class="">
                                    <p class="font-semibold">₱ {{ $product->product_price }}</p>
                                </div>
                                <div class="hidden">{{ $product->product_category }}</div>
                            </div>
                        </div>
                    </button>
                </div>
            @endforeach

            {{-- Modal --}}
            @if ($modalOpen)
                @php
                    $selectedProduct = $products->firstWhere('id', $selectedProductId);
                @endphp
                <div class="fixed z-10 inset-0 overflow-y-auto">
                    <div class="flex items-center justify-center min-h-screen px-4 text-center sm:block sm:p-0">
                        <!-- Background overlay -->
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>

                        <!-- Modal panel -->
                        <div
                            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle max-w-lg w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mt-3 text-center w-full sm:mt-0 sm:ml-4 sm:text-left">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                            <img src="{{ asset('storage/' . $selectedProduct->product_image) }}"
                                                 class="h-56 md:h-48 lg:h-56 xl:h-64 w-full bg-cover rounded-lg"
                                                 alt="" />
                                            <p class="float-right text-sm font-semibold mx-4">Stock: {{ $selectedProduct->product_stock }}</p>
                                            <div class="">
                                                <div
                                                    class="flex flex-col w-full text-black text-md px-2 py-2 rounded-md">
                                                    <div class="uppercase">
                                                        <p class="font-thin">{{ $selectedProduct->product_name }}</p>
                                                    </div>
                                                    <div class="">
                                                        <p class="font-semibold">₱ {{ $selectedProduct->product_price }}
                                                        </p>
                                                    </div>
                                                    <div class="hidden">{{ $selectedProduct->product_category }}</div>
                                                    <!-- Quantity control -->
                                                    <div class="flex justify-center items-center mt-4">
                                                        <button wire:click="decrementQuantity"
                                                                class="px-2 py-1 bg-gray-300 text-gray-700 rounded-md">-</button>
                                                        <span class="mx-4">{{ $quantity }}</span>
                                                        <button wire:click="incrementQuantity"
                                                                class="px-2 py-1 bg-gray-300 text-gray-700 rounded-md">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button wire:click="addToCart" type="button"
                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 my-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    Add to Cart
                                </button>
                                <button wire:click="closeModal" type="button"
                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 my-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        {{ $products->links() }}
    </div>
</div>
