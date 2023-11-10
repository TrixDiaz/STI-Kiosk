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
                                <div class="flex justify-between w-full text-black text-lg font-semibold text-md px-2 py-4 rounded-md">
                                    <div class="uppercase pr-5">{{ $product->product_name }}</div>
                                    <div class="">₱ {{ $product->product_price }}</div>
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
