<x-kiosk-layout>

    <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">

                    <div class="pointer-events-auto w-screen max-w-md">
                        <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                            <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                                <div class="flex items-start justify-between">
                                    <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart
                                    </h2>
                                    <div class="ml-3 flex h-7 items-center">
                                       <a href="{{ route('kiosk') }}">
                                        <button type="button"
                                        class="relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                                        <span class="absolute -inset-0.5"></span>
                                        <span class="sr-only">Close panel</span>
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                            stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                       </a>
                                    </div>
                                </div>

                                <div class="mt-8">
                                    <div class="flow-root">
                                        <ul id="cart" role="list" class="-my-6 divide-y divide-gray-200">
                                            <form id="checkout-form" method="post"
                                                action="{{ route('create.order') }}">
                                                @csrf
                                                @php $total = 0 @endphp
                                                @if (session('cart'))
                                                    @foreach (session('cart') as $id => $details)
                                                        @php $total += $details['product_price'] * $details['quantity'] @endphp
                                                        <li class="flex py-6" data-id="{{ $id }}">
                                                            <div
                                                                class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                                <img data-th="Product"
                                                                    src="{{ asset('storage/' . $details['product_image']) }}"
                                                                    alt="Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch."
                                                                    class="h-full w-full object-cover object-center">
                                                            </div>

                                                            <div class="ml-4 flex flex-1 flex-col">
                                                                <div>
                                                                    <div
                                                                        class="flex justify-between text-base font-medium text-gray-900">
                                                                        <h3>
                                                                            <a
                                                                               >{{ $details['product_name'] }}</a>
                                                                        </h3>
                                                                        <div class="flex flex-col">
                                                                            <p data-th="Price" class="ml-2">
                                                                                ₱{{ $details['product_price'] }}</p>
                                                                            <span data-th="Subtotal"
                                                                                class="text-xs text-gray-400 ml-2">total</span>
                                                                            <p class="text-xs text-gray-400 ml-2">
                                                                                ₱{{ $details['product_price'] * $details['quantity'] }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mt-1 text-sm text-gray-500">
                                                                        {{ $details['product_category'] }}</p>
                                                                </div>
                                                                <div
                                                                    class="flex flex-1 items-end justify-between text-sm">
                                                                    <button>-</button>
                                                                    <p data-th="Quantity" class="text-gray-500"> <input
                                                                            type="number"
                                                                            class="w-12 quantity cart_update"
                                                                            value="{{ $details['quantity'] }}"
                                                                            min="1" /></p>
                                                                    <button>+</button>
                                                                    <div class="actions flex" data-th="">
                                                                        <button type="button"
                                                                            class="font-medium text-indigo-600 hover:text-indigo-500 cart_remove">Remove</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @endif
                                                @php
                                                    $orderID = '' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT); //Create random 6 digit generator
                                                @endphp
                                            </form>
                                            <!-- More products... -->
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                    <p>Subtotal</p>
                                    <p>₱{{ $total }}</p>
                                </div>
                                <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                                <div class="mt-6">
                                    <a href="#"
                                        class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</a>
                                </div>
                                <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
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

    <script type="text/javascript">
        $(".cart_update").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("li").attr("data-id"),
                    quantity: ele.parents("li").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".cart_remove").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Do you really want to remove?")) {
                $.ajax({
                    url: '{{ route('remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("li").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
    <script>
        function changePaymentMethod(paymentMethod) {
            // Get the form element by its id
            var form = document.getElementById('checkout-form');

            // Prevent the default form submission
            event.preventDefault();

            // Update the form's action attribute to the new route
            if (paymentMethod === 'cash') {
                form.action = "{{ route('create.order') }}";
                form.method = 'post';
            } else if (paymentMethod === 'qrPayment') {
                form.action = "{{ route('qrPayment') }}";
                form.method = 'get';
            }

            // Remove existing hidden input fields with name 'payment_method'
            var existingInput = form.querySelector('input[name="payment_method"]');
            if (existingInput) {
                existingInput.remove();
            }

            // Create a new hidden input for payment_method
            var hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'payment_method';
            hiddenInput.value = paymentMethod;
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>

</x-kiosk-layout>
