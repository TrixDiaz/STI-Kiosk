<div class="py-10 mx-3">
    <div class="mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
            @foreach ($products as $product)
                <div class="relative">
                    <a href="{{ route('posAddToCart', $product->id) }}">
                        <img src="/storage/{{ $product->product_image }}"
                            class="h-40 w-full bg-cover rounded-lg" alt="" />
                        <div class="">
                            <div class="flex flex-col w-full text-black text-md text-md px-2 py-2 rounded-md">
                                <div class="uppercase"><p class="font-thin">{{ $product->product_name }}</p></div>
                                <div class=""><p class="font-semibold">₱ {{ $product->product_price }}</p></div>
                                <div class="hidden">{{ $product->product_category }}</div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        {{ $products->links() }}
    </div>
</div>

