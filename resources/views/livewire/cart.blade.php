{{-- Order list --}}
     <div class="w-1/4 p-4 bg-white shadow overflow-y-auto h-auto">
        <h1 class="font-semibold uppercase">Order List</h1>
        <div class="flex justify-between py-3">
            <div class="order-first">
                <p>Product Name</p>
                <p>Ramen</p>
            </div>
            <div class="order-second">
                <p>Price</p>
                <p>100</p>
            </div>
            <div class="order-last">
                <p>QTY</p>
                <div class="flex order-last text-center">
                    <button wire:click="decrement" class="px-2"><p class="font-semibold text-red-500">-</p></button>
                    <h1 class="px-2">{{ $count }}</h1>
                    <button wire:click="increment" class="px-2"><p class="font-semibold text-emerald-500">+</p></button>
                </div>
            </div>
        </div>
        <hr class="py-1">
        <div class="flex justify-between">
            <div class="order-first uppercase">
                <p>total</p>
            </div>
            <div class="order-last">
                <p>200</p>
            </div>

        </div>
    </div>

