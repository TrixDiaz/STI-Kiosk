<x-kiosk-layout>


    <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
     
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 ">
            <div class="absolute inset-0 ">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full">
                
                    <div data-aos="fade-left" data-aos-duration="2000" class="mx-auto max-w-screen-sm text-center">
                        <div class="pointer-events-auto w-screen max-w-md">
                            <div class="flex h-full flex-col overflow-y-auto bg-white shadow-xl">
                                <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                                    <div class="flex items-start justify-between">
                                        <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping
                                            cart</h2>
                                        <div class="ml-3 flex h-7 items-center">
                                            <button type="button"
                                                class="relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                                                <a href="{{ route('kiosk') }}">
                                                    <span class="absolute -inset-0.5"></span>
                                                    <span class="sr-only">Close panel</span>
                                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mt-8">
                                        <div class="flow-root">
                                            <form method="post" action="{{ route('create.order') }}" class="overflow-y-auto max-h-72">
                                                @csrf
                                                @method('post')
                                                <ul role="list" class="-my-6 divide-y divide-gray-200">
                                                    @if (session('cart'))
                                                        @foreach (session('cart') as $id => $item)
                                                            <li class="flex py-6">
                                                                <div class="h-24 w-24 flex-shrink-0  rounded-md border border-gray-200">
                                                                    <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg"
                                                                        alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                                                        class="h-full w-full object-cover object-center">
                                                                </div>
                                                
                                                                <div class="ml-4 flex flex-1 flex-col">
                                                                    <div>
                                                                        <div class="flex justify-between text-base font-medium text-gray-900">
                                                                            <h3>
                                                                                <a href="#">{{ $item['product_name'] }}</a>
                                                                            </h3>
                                                                            <p class="ml-4">₱ {{ $item['product_price'] }}</p>
                                                                        </div>
                                                                        <p class="mt-1 text-sm text-gray-500 float-left">
                                                                            {{ $item['product_category'] }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="flex flex-1 items-end justify-between text-sm">
                                                                        <p class="text-gray-500">Qty {{ $item['quantity'] }}</p>
                                                
                                                                        <p class="text-gray-500">Total: ₱ {{ $item['product_price'] * $item['quantity'] }}</p> <!-- Add this line -->
                                                                        <div class="flex">
                                                                            <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500"
                                                                                onclick="confirmRemove('{{ route('cart.remove', $id) }}')">Remove</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <p>Your cart is empty.</p>
                                                    @endif
                                                </ul>
                                                


                                        </div>
                                    </div>
                                </div>

                                <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                                    @php $total = 0 @endphp
                                        @foreach ((array) session('cart') as $id => $item)
                                            @php $total += $item['product_price'] * $item['quantity'] @endphp
                                        @endforeach
                                    <div class="flex justify-between text-base pb-3 font-medium text-gray-900">
                                        <div><p>Subtotal</p></div>
                                        
                                      <div> <input type="text" value="{{ $total }}" name="total" class="hidden">₱ {{ $total }}</div>
                                    </div>

                                    <ul class="grid w-full gap-6 grid-cols-2 ">
                                        <li>
                                            <input type="radio" id="dine-in" name="order_type"
                                                value="dine_in" class="hidden peer" required>
                                            <label for="dine-in"
                                                class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="block">
                                                    <div class="w-full text-lg font-semibold">Dine in</div>
                                                
                                                </div>
                                                <svg class="w-5 h-5 ml-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 10">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                </svg>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" id="take-out" name="order_type" value="take_out"
                                                class="hidden peer">
                                            <label for="take-out"
                                                class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                <div class="block">
                                                    <div class="w-full text-lg font-semibold">Take out</div>
                                                  
                                                </div>
                                                <svg class="w-5 h-5 ml-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 10">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                </svg>
                                            </label>
                                        </li>
                                    </ul>
                                    <div class="flex justify-center mt-2">
                                        <div> <button type="submit"
                                                class="flex mx-5 items-center justify-center rounded-md border border-transparent bg-indigo-600 px-10 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Cash</button>
                                        </div>
                                        <div> <a href="#"
                                                class="flex mx-5 items-center justify-center rounded-md px-10 py-3 text-base font-medium text-indigo-600 shadow-sm ">Cashless</a>
                                        </div>
                                    </div>
                                    </form>
                                    <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.
                                    </p>
                                    <div class="mt-3 flex justify-center text-center text-sm text-gray-500">
                                        <p>
                                            or
                                            <button type="button"
                                                class="font-medium text-indigo-600 hover:text-indigo-500">
                                                Continue Shopping
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
    </div>
    <script>
        function confirmRemove(removeUrl) {
            if (confirm('Are you sure you want to remove this item from the cart?')) {
                window.location.href = removeUrl;
            }
        }
    </script>

</x-kiosk-layout>
