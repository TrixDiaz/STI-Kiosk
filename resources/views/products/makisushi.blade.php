<x-kiosk-layout>
    <div class="py-10">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($products as $product)
                    <div class="relative">
                        <a href="{{ route('addToCart', $product->id) }}">
                            <img src="/storage/{{ $product->product_image }}"
                                class="max-h-60 max-w-full bg-cover rounded-lg" alt="" />
                            <div class="">
                                <div class="flex flex-col w-full text-black text-lg text-md px-2 py-2 rounded-md">
                                    <div class="uppercase"><p class="font-thin">{{ $product->product_name }}</p></div>
                                    <div class=""><p class="font-semibold">₱ {{ $product->product_price }}</p></div>
                                    <div class="hidden">{{ $product->product_category }}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-kiosk-layout>
