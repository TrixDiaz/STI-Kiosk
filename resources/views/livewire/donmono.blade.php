<div>
    <x-kiosk-layout>

        <div class="py-10">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                  @foreach ($products as $product)
                         <!-- Product 1 -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                   
                       <button wire:click="addToCart({{ $product->id }})" class="hover:bg-gray-400">
                        <div class="shadow-lg">
                            <img src="/storage/{{ $product->product_image }}"
                                alt="Product Image" class="w-full h-60 p-3 shadow-md"> <!-- Set the height here -->
                                <div class="flex justify-between items-center">
                                    <div class="order-first">
                                        <h2 class="text-lg font-semibold p-2">{{ $product->product_name }}</h2>
                                    </div>
                                    <div class="order-last">
                                        <h2 class="text-lg font-semibold p-2"> ₱{{ $product->product_price }}</h2>
                                    </div>
                                </div>
                                <div class="flex justify-between p-2">
                                   <div class="order-first px-2">
                                    <p>{{ $product->product_description}}</p>
                                   </div>
                                </div>
                              
                        </div>
                       </button>
                  
                </div>
                  @endforeach
                </div>
            </div>
        </div>
       
    </x-kiosk-layout>
</div>
