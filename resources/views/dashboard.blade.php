<x-app-layout>

    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            {{ __('POS') }}
            <p class="text-slate-500 text-sm py-2">Additional Subtitle here</p>
        </h2>
    </x-slot> --}}

    <div class="w-full">
        <div class="relative right-0">
            <ul class="relative flex list-none flex-wrap rounded-xl bg-blue-gray-50/60 p-1" data-tabs="tabs"
                role="list">
                <li class="z-30 flex-auto text-center">
                    <a class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out"
                        data-tab-target="" active="" role="tab" aria-selected="true" aria-controls="app">
                        <span class="ml-1">POS</span>
                    </a>
                </li>
                <li class="z-30 flex-auto text-center">
                    <a class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out"
                        data-tab-target="" role="tab" aria-selected="false" aria-controls="message">
                        <span class="ml-1">ORDER</span>
                    </a>
                </li>
                <li class="z-30 flex-auto text-center">
                    <a class="text-slate-700 z-30 mb-0 flex w-full cursor-pointer items-center justify-center rounded-lg border-0 bg-inherit px-0 py-1 transition-all ease-in-out"
                        data-tab-target="" role="tab" aria-selected="false" aria-controls="settings">
                        <span class="ml-1">KITCHEN</span>
                    </a>
                </li>


            </ul>

            <div data-tab-content="" class="p-5">
                <div class="block opacity-100" id="app" role="tabpanel">
                    <div class="bg-white">
                        <!-- Button trigger modal -->
                        <div class="p-5 flex">
                            <!-- Toggler -->
                            <button
                                class="mr-5 ml-3 inline-block rounded bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                                data-te-sidenav-toggle-ref data-te-target="#sidenav-1" aria-controls="#sidenav-1"
                                aria-haspopup="true">
                                <span class="block [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="h-5 w-5">
                                        <path fill-rule="evenodd"
                                            d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </button>
                            <!-- Toggler -->
                            <button type="button"
                                class="inline-block rounded bg-primary px-6 pb-2 pt-2.5  text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                data-te-toggle="modal" data-te-target="#rightTopModal" data-te-ripple-init
                                data-te-ripple-color="light">
                                Cart
                            </button>
                        </div>

                        <!-- Modal top right-->
                        <div data-te-modal-init
                            class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                            id="rightTopModal" tabindex="-1" aria-labelledby="rightTopModalLabel" aria-hidden="true">
                            <div data-te-modal-dialog-ref
                                class="pointer-events-none absolute right-7 h-auto w-full translate-x-[100%] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                                <div
                                    class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                                    <div
                                        class="flex flex-shrink-0 items-center justify-between rounded-t-md bg-info-600 p-4 dark:border-b dark:border-neutral-500 dark:bg-transparent">
                                        <h5 class="text-xl font-medium leading-normal text-white"
                                            id="rightTopModalLabel">
                                            Product in the cart
                                        </h5>
                                        <button type="button"
                                            class="box-content rounded-none border-none text-white hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                            data-te-modal-dismiss aria-label="Close">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="max-h-80 mt-5 mx-3" data-te-modal-body-ref>

                                        <form id="checkout-form" method="post" action="{{ route('create.order') }}"
                                            class="overflow-y-auto max-h-72">
                                            @csrf
                                            <ul role="list" class="-my-6 divide-y divide-gray-200">
                                                @if (session('cart'))
                                                    @foreach (session('cart') as $id => $item)
                                                        <li class="flex py-6">
                                                            <div
                                                                class="h-24 w-24 flex-shrink-0  rounded-md border border-gray-200">
                                                                <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg"
                                                                    alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                                                    class="h-full w-full object-cover object-center">
                                                            </div>

                                                            <div class="ml-4 flex flex-1 flex-col">
                                                                <div>
                                                                    <div
                                                                        class="flex justify-between text-base font-medium text-gray-900">
                                                                        <h3>
                                                                            <a
                                                                                href="#">{{ $item['product_name'] }}</a>
                                                                        </h3>
                                                                        <p class="ml-4">₱
                                                                            {{ $item['product_price'] }}</p>
                                                                    </div>
                                                                    <p class="mt-1 text-sm text-gray-500 float-left">
                                                                        {{ $item['product_category'] }}
                                                                    </p>
                                                                </div>
                                                                <div
                                                                    class="flex flex-1 items-end justify-between text-sm">
                                                                    <p class="text-gray-500">Qty
                                                                        {{ $item['quantity'] }}</p>

                                                                    <p class="text-gray-500">Total: ₱
                                                                        {{ $item['product_price'] * $item['quantity'] }}
                                                                    </p> <!-- Add this line -->
                                                                    <div class="flex">
                                                                        <button type="button"
                                                                            class="font-medium text-indigo-600 hover:text-indigo-500"
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

                                            {{-- End of Body Cart --}}
                                    </div>
                                    <div class="border-gray-200 px-4 sm:px-6">
                                        @php
                                            $total = 0;
                                        @endphp

                                        @foreach ((array) session('cart') as $id => $item)
                                            @php
                                                $total += $item['product_price'] * $item['quantity'];
                                            @endphp
                                        @endforeach
                                        <div class="flex justify-between text-base pb-3 font-medium text-gray-900">
                                            <div>
                                                <p>Subtotal</p>
                                            </div>

                                            <div> <input type="text" value="{{ $total }}" name="total"
                                                    class="hidden">₱ {{ $total }}</div>
                                        </div>

                                        <ul class="grid w-full gap-2 grid-cols-2 ">
                                            <li>
                                                <input type="radio" id="dine-in" name="order_type"
                                                    value="dine in" class="hidden peer uppercase" checked required>
                                                <label for="dine-in"
                                                    class="inline-flex items-center justify-between w-full p-3 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                                    <div class="block">
                                                        <div class="w-full text-lg font-semibold">Dine in</div>

                                                    </div>
                                                    <svg class="w-3 h-3 ml-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 10">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                    </svg>
                                                </label>
                                            </li>
                                            <li>
                                                <input type="radio" id="take-out" name="order_type"
                                                    value="take out" class="hidden peer uppercase" required>
                                                <label for="take-out"
                                                    class="inline-flex items-center justify-between w-full p-3 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
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


                                    </div>
                                    <div
                                        class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                        <button type="submit"
                                            class="mr-2 inline-block rounded bg-info px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#54b4d3] transition duration-150 ease-in-out hover:bg-info-600 hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:bg-info-600 focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:outline-none focus:ring-0 active:bg-info-700 active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(84,180,211,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)]"
                                            data-te-ripple-init data-te-ripple-color="light"
                                            onclick="changePaymentMethod('cash')">
                                            Cash
                                        </button>
                                        <button type="submit"
                                            class="mr-2 inline-block rounded bg-warning px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#e4a11b] transition duration-150 ease-in-out hover:bg-warning-600 hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:bg-warning-600 focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] focus:outline-none focus:ring-0 active:bg-warning-700 active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.3),0_4px_18px_0_rgba(228,161,27,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(228,161,27,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(228,161,27,0.2),0_4px_18px_0_rgba(228,161,27,0.1)]"
                                            onclick="changePaymentMethod('qrPayment')">
                                            Cashless
                                        </button>
                                        <button type="button"
                                            class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                                            data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                                            Close
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="py-0">
                            <div class="mx-auto sm:px-6 lg:px-8">
                                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                    
                                    <!-- Product  -->
                                    <div class="p-2">
                                        <a href="{{ route('donmono') }}">
                                            <div class="shadow-lg">
                                                <img src="/images/donmono.jpeg"
                                                    alt="Product Image" class="w-full h-60 rounded-lg shadow-lg"> <!-- Set the height here -->
                                                    
                                            </div>
                                        </a>
                                    </div>
                                    {{-- End of Product --}}
                    
                                     <!-- Product  -->
                                     <div class="p-2">
                                        <a href="{{ route('ippin') }}">
                                            <div class="shadow-lg">
                                                <img src="images/ippin.jpeg"
                                                    alt="Product Image" class="w-full h-60 rounded-lg shadow-lg"> <!-- Set the height here -->
                                                    
                                            </div>
                                        </a>
                                    </div>
                                    {{-- End of Product --}}
                    
                                     <!-- Product  -->
                                     <div class="p-2">
                                        <a href="{{ route('kushiyaki') }}">
                                            <div class="shadow-lg">
                                                <img src="images/kushiyaki.jpeg"
                                                    alt="Product Image" class="w-full h-60 rounded-lg shadow-lg"> <!-- Set the height here -->
                                                    
                                            </div>
                                        </a>
                                    </div>
                                    {{-- End of Product --}}
                    
                                     <!-- Product  -->
                                     <div class="p-2">
                                        <a href="{{ route('makizushi') }}">
                                            <div class="shadow-lg">
                                                <img src="images/makisushi.jpeg"
                                                    alt="Product Image" class="w-full h-60 rounded-lg shadow-lg"> <!-- Set the height here -->
                                                    
                                            </div>
                                        </a>
                                    </div>
                                    {{-- End of Product --}}
                    
                                     <!-- Product  -->
                                     <div class="p-2">
                                        <a href="{{ route('men') }}">
                                            <div class="shadow-lg">
                                                <img src="images/men.jpeg"
                                                    alt="Product Image" class="w-full h-60 rounded-lg shadow-lg"> <!-- Set the height here -->
                                                    
                                            </div>
                                        </a>
                                    </div>
                                    {{-- End of Product --}}
                    
                                     <!-- Product  -->
                                     <div class="p-2">
                                        <a href="{{ route('nigirizushi') }}">
                                            <div class="shadow-lg">
                                                <img src="images/nigiri.jpeg"
                                                    alt="Product Image" class="w-full h-60 rounded-lg shadow-lg"> <!-- Set the height here -->
                                                    
                                            </div>
                                        </a>
                                    </div>
                                    {{-- End of Product --}}
                    
                                     <!-- Product  -->
                                     <div class="p-2">
                                        <a href="{{ route('ochazuke') }}">
                                            <div class="shadow-lg">
                                                <img src="images/ochazuke.jpeg"
                                                    alt="Product Image" class="w-full h-60 rounded-lg shadow-lg"> <!-- Set the height here -->
                                                    
                                            </div>
                                        </a>
                                    </div>
                                    {{-- End of Product --}}
                    
                                     <!-- Product  -->
                                     <div class="p-2">
                                        <a href="{{ route('ramen') }}">
                                            <div class="shadow-lg">
                                                <img src="images/ramen.jpeg"
                                                    alt="Product Image" class="w-full h-60 rounded-lg shadow-lg"> <!-- Set the height here -->
                                                    
                                            </div>
                                        </a>
                                    </div>
                                    {{-- End of Product --}}
                    
                                     <!-- Product  -->
                                     <div class="p-2">
                                        <a href="{{ route('salad') }}">
                                            <div class="shadow-lg">
                                                <img src="images/salad.jpeg"
                                                    alt="Product Image" class="w-full h-60 rounded-lg shadow-lg"> <!-- Set the height here -->
                                                    
                                            </div>
                                        </a>
                                    </div>
                                    {{-- End of Product --}}
                    
                                     <!-- Product  -->
                                     <div class="p-2">
                                        <a href="{{ route('sashimi') }}">
                                            <div class="shadow-lg">
                                                <img src="images/sashimi.jpeg"
                                                    alt="Product Image" class="w-full h-60 rounded-lg shadow-lg"> <!-- Set the height here -->
                                                    
                                            </div>
                                        </a>
                                    </div>
                                    {{-- End of Product --}}
                    
                                     <!-- Product  -->
                                     <div class="p-2">
                                        <a href="{{ route('tempura') }}">
                                            <div class="shadow-lg">
                                                <img src="images/tempura.jpeg"
                                                    alt="Product Image" class="w-full h-60 rounded-lg shadow-lg"> <!-- Set the height here -->
                                                    
                                            </div>
                                        </a>
                                    </div>
                                    {{-- End of Product --}}
                    
                                     <!-- Product  -->
                                     <div class="p-2">
                                        <a href="{{ route('yakizakana') }}">
                                            <div class="shadow-lg">
                                                <img src="images/yakizakana.jpeg"
                                                    alt="Product Image" class="w-full h-60 rounded-lg shadow-lg"> <!-- Set the height here -->
                                                    
                                            </div>
                                        </a>
                                    </div>
                                    {{-- End of Product --}}
                    
                                     <!-- Product  -->
                                     <div class="p-2">
                                        <a href="{{ route('zensai') }}">
                                            <div class="shadow-lg">
                                                <img src="images/zenkai.jpeg"
                                                    alt="Product Image" class="w-full h-60 rounded-lg shadow-lg"> <!-- Set the height here -->
                                                    
                                            </div>
                                        </a>
                                    </div>
                                    {{-- End of Product --}}
                    
                                    
                    
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Sidenav -->
                    <nav id="sidenav-1"
                        class="absolute left-0 top-0 z-[1035] h-full w-60 -translate-x-full overflow-hidden bg-white shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] data-[te-sidenav-hidden='true']:translate-x-0 dark:bg-zinc-800"
                        data-te-sidenav-init data-te-sidenav-hidden="false" data-te-sidenav-position="absolute">
                        <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
                            <li class="relative">
                                <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                href="{{ route('kiosk') }}"    
                                data-te-sidenav-link-ref>
                                    <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                          </svg>
                                          
                                    </span>
                                    <span class="uppercase">Home</span>
                                </a>
                            </li>
                            <li class="relative">
                                <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                href="{{ route('donmono') }}"     
                                data-te-sidenav-link-ref>
                                    <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                          </svg>
                                          
                                    </span>
                                    <span class="uppercase">Donmono</span>
                                </a>
                            </li>
                            <li class="relative">
                                <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                href="{{ route('ippin') }}"       
                                data-te-sidenav-link-ref>
                                    <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                          </svg>
                                          
                                    </span>
                                    <span class="uppercase">ippin ryori</span>
                                </a>
                            </li>
                            <li class="relative">
                                <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                href="{{ route('kushiyaki') }}"        
                                data-te-sidenav-link-ref>
                                    <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                          </svg>
                                          
                                    </span>
                                    <span class="uppercase">kushiyaki</span>
                                </a>
                            </li>
                            <li class="relative">
                                <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                href="{{ route('makizushi') }}"     
                                data-te-sidenav-link-ref>
                                    <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                          </svg>
                                          
                                    </span>
                                    <span class="uppercase">makizushi</span>
                                </a>
                            </li>
                            <li class="relative">
                                <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                href="{{ route('men') }}"  
                                data-te-sidenav-link-ref>
                                    <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                          </svg>
                                          
                                    </span>
                                    <span class="uppercase">men</span>
                                </a>
                            </li>
                            <li class="relative">
                                <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                href="{{ route('nigirizushi') }}"   
                                data-te-sidenav-link-ref>
                                    <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                          </svg>
                                          
                                    </span>
                                    <span class="uppercase">nigirizushi</span>
                                </a>
                            </li>
                            <li class="relative">
                                <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                href="{{ route('ochazuke') }}"    
                                data-te-sidenav-link-ref>
                                    <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                          </svg>
                                          
                                    </span>
                                    <span class="uppercase">ochazuke</span>
                                </a>
                            </li>
                            <li class="relative">
                                <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                href="{{ route('ramen') }}"    
                                data-te-sidenav-link-ref>
                                    <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                          </svg>
                                          
                                    </span>
                                    <span class="uppercase">ramen</span>
                                </a>
                            </li>
                            <li class="relative">
                                <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                href="{{ route('salad') }}"       
                                data-te-sidenav-link-ref>
                                    <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                          </svg>
                                          
                                    </span>
                                    <span class="uppercase">salad</span>
                                </a>
                            </li>
                            <li class="relative">
                                <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                href="{{ route('sashimi') }}"          
                                data-te-sidenav-link-ref>
                                    <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                          </svg>
                                          
                                    </span>
                                    <span class="uppercase">sashimi</span>
                                </a>
                            </li>
                            <li class="relative">
                                <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                href="{{ route('tempura') }}" 
                                data-te-sidenav-link-ref>
                                    <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                          </svg>
                                          
                                    </span>
                                    <span class="uppercase">tempura</span>
                                </a>
                            </li>
                            <li class="relative">
                                <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                href="{{ route('yakizakana') }}"   
                                data-te-sidenav-link-ref>
                                    <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                          </svg>
                                          
                                    </span>
                                    <span class="uppercase">yakizakana</span>
                                </a>
                            </li>
                            <li class="relative">
                                <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                href="{{ route('zensai') }}"      
                                data-te-sidenav-link-ref>
                                    <span class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                          </svg>
                                          
                                    </span>
                                    <span class="uppercase">zensai</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- Sidenav -->

                </div>

                <div class="hidden opacity-0" id="message" role="tabpanel">


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-5">
                        <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3">
                                        Order ID
                                    </th>
                                    <th scope="col" class="py-3">
                                        Products
                                    </th>
                                    <th scope="col" class="py-3">
                                        Quantity
                                    </th>
                                    <th scope="col" class="py-3">
                                        Order type
                                    </th>
                                    <th scope="col" class="py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                        <th scope="row"
                                            class="py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $order['order_id'] }}
                                        </th>
                                        <td>
                                            @foreach ($order['order_info'] as $info)
                                                {{ $info->product_name }}
                                                @if (!$loop->last)
                                                    <br>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($order['order_info'] as $info)
                                                {{ $info->quantity }}
                                                @if (!$loop->last)
                                                    <br>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $order['order_type'] }}
                                        </td>
                                        <td>
                                            <a href="{{ route('prepare.order', ['order_id' => $order['order_id']]) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Prepare</a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="hidden opacity-0" id="settings" role="tabpanel">


                    <div class="flex">
                        <!-- Table for "Queue" -->
                        <table class="w-1/2 text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 text-center">
                                        Preparing
                                    </th>
                                    <th scope="col" class="py-3 text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($queues as $queue)
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 text-center">
                                        <td scope="row"
                                            class="py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $queue->order_id }}
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('serving', $queue->id) }}">
                                                @csrf
                                                <button type="submit"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline text-center">Serve</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Table for "Serve" -->
                        <table class="w-1/2 text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 text-green-400 text-center">
                                        Now Serving
                                    </th>
                                    <th scope="col" class="py-3 text-green-400 text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($serves as $serve)
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 text-center">
                                        <td scope="row"
                                            class="py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $serve->order_id }}
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('serve.destroy', $serve->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-center">Done</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>



</x-app-layout>
