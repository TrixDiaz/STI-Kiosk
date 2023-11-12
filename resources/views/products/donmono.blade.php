<x-kiosk-layout>
    <div class="py-10 mx-3">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                @foreach ($products as $product)
                    <div class="relative">
                        <a href="{{ route('add_to_cart', $product->id) }}">
                            <img src="/storage/{{ $product->product_image }}"
                                class="h-40 max-w-full bg-cover rounded-lg" alt="" />
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
        </div>
    </div>
       

       

    {{-- <div class="row">
        @foreach($products as $product)
            <div class="col-xs-18 col-sm-6 col-md-4" style="margin-top:10px;">
                <div class="img_thumbnail productlist">
                    <img src="/storage/{{ $product->product_image }}" class="img-fluid">
                    <div class="caption">
                        <h4>{{ $product->product_name }}</h4>
                        <p>{{ $product->product_category }}</p>
                        <p><strong>Price: </strong> ${{ $product->product_price }}</p>
                        <p class="btn-holder"><a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-primary btn-block text-center" role="button">Add to cart</a> </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div> --}}
</x-kiosk-layout>