<div wire:poll.5s class="relative" data-te-dropdown-ref>
        <button
            class="flex items-center whitespace-nowrap rounded bg-gray-200 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-neutral-800 shadow-[0_4px_9px_-4px_#fbfbfb] transition duration-150 ease-in-out hover:bg-neutral-100 hover:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:bg-neutral-100 focus:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:outline-none focus:ring-0 active:bg-neutral-200 active:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] motion-reduce:transition-none"
            type="button" id="dropdownMenuButton9" data-te-dropdown-toggle-ref aria-expanded="false"
            data-te-ripple-init>
            {{-- Cart --}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
            </svg>

            {{-- Cart --}}
            <span class="ml-2 w-2">
                    {{-- Count --}}
                    <p  class="text-md">{{ count((array) session('cart')) }}</p>
                    {{-- Count --}}
                </span>
        </button>
        <ul class="absolute z-[1000] float-left m-0 hidden w-80 list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
            aria-labelledby="dropdownMenuButton9" data-te-dropdown-menu-ref>
            <li class="m-1">
                <a class="block w-full whitespace-nowrap bg-transparent px-4 pt-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                   data-te-dropdown-item-ref>
                    <div class="row total-header-section">
                        @php $total = 0 @endphp
                        @foreach ((array) session('cart') as $id => $details)
                            @php $total += $details['product_price'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                            <p>Total: <span class="text-info">₱ {{ $total }}</span></p>
                        </div>
                    </div>
                </a>
            </li>
            <li class="h-48 overflow-y-auto my-2 mx-2">
                <a class="mt-3 block w-full whitespace-nowrap bg-transparent px-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                   data-te-dropdown-item-ref>
                    @if (session('cart'))
                        @foreach (session('cart') as $id => $details)
                            <div  class="flex">
                                <div class="col-lg-4 col-sm-4 col-4 mr-5">
                                    <img src="storage/{{ $details['product_image'] }}"
                                         alt="{{ $details['product_name'] }}"
                                         class="h-14 w-14 bg-cover rounded-md" />
                                </div>
                                <div class="col-lg-8 col-sm-8 col-8">
                                    <p class="">{{ $details['product_name'] }}</p>
                                    <span class="price text-info "> ₱{{ $details['product_price'] }}</span> <span
                                        class="bn n"> Qty:{{ $details['quantity'] }}</span>
                                </div>
                            </div>
                            <hr class="my-1">
                        @endforeach
                    @endif
                </a>
            </li>
            <li class="">
                <a class="my-2" data-te-dropdown-item-ref>
                    <div class="row">
                        <div class="text-center m-2">
                            <a href="{{ route('cart') }}"
                               class="text-center w-full bg-blue-200 p-2 rounded-md">View all</a>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
</div>

