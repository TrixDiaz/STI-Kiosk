<x-app-layout>
    <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full">

                    <div class="pointer-events-auto w-screen max-w-md">
                        <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                            <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                                <div class="flex items-start justify-between">
                                    <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">POS Shopping
                                        cart
                                    </h2>
                                    <div class="ml-3 flex h-7 items-center">
                                        <a href="{{ route('dashboard') }}" wire:navigate>
                                            <button type="button"
                                                class="relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                                                <span class="absolute -inset-0.5"></span>
                                                <span class="sr-only">Close panel</span>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                @if (session('success'))
                                    <div data-aos="fade-left" data-aos-duration="1000">
                                        <div class="mt-3 font-regular relative block w-full rounded-lg bg-gradient-to-tr from-green-400 to-green-300 px-4 py-4 text-base text-white"
                                            data-dismissible="alert" id="success-alert">
                                            <div class="absolute top-4 left-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <div class="ml-8 mr-12">{{ session('success') }}</div>
                                        </div>
                                    </div>

                                    <script>
                                        // Close the success message after 2 seconds
                                        setTimeout(function() {
                                            document.getElementById('success-alert').remove();
                                        }, 2000);
                                    </script>
                                @endif
                                <div class="mt-8">
                                    <div class="flow-root">
                                        <ul id="cart" role="list" class="-my-6 divide-y divide-gray-200">
                                            <form id="checkout-form" method="post"
                                                action="{{ route('pos_create.order') }}">
                                                @csrf
                                                @php $total = 0 @endphp
                                                @if (session('cart'))
                                                    @foreach (session('cart') as $id => $details)
                                                        @php $total += $details['product_price'] * $details['quantity'] @endphp
                                                        <li class="flex py-6" data-id="{{ $id }}">
                                                            <div
                                                                class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                                <img data-th="Product"
                                                                    src="storage/{{ $details['product_image'] }}"
                                                                    alt="Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch."
                                                                    class="h-full w-full object-cover object-center">
                                                            </div>

                                                            <div class="ml-4 flex flex-1 flex-col">
                                                                <div>
                                                                    <div
                                                                        class="flex justify-between text-base font-medium text-gray-900">
                                                                        <h3>
                                                                            <a>{{ $details['product_name'] }}</a>
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
                                                                    <p data-th="Quantity"
                                                                        class="text-gray-500 flex items-center">
                                                                        <span>Quantity:</span>
                                                                    <div class="ml-2 flex items-center">
                                                                        <button type="button"
                                                                            class="px-2 py-1 bg-gray-200 rounded-l-md border border-gray-300"
                                                                            onclick="decrementQuantity(this, {{ $details['quantity'] }})">-</button>
                                                                        <span
                                                                            class="px-4 py-1 bg-white border border-gray-300">{{ $details['quantity'] }}</span>
                                                                        <button type="button"
                                                                            class="px-2 py-1 bg-gray-200 rounded-r-md border border-gray-300"
                                                                            onclick="incrementQuantity(this)">+</button>
                                                                    </div>
                                                                    </p>
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
                                                    $authUser = Auth::user()->name;
                                                @endphp
                                                <input type="text" value="{{ $total }}" name="total"
                                                    class="hidden">
                                                <input type="text" value="{{ $orderID }}" name="orderID"
                                                    class="hidden">
                                                <input type="text" value="{{ $authUser }}" name="name"
                                                    class="hidden">
                                                <input type="hidden" name="change" id="changeInput">

                                                <!-- More products... -->
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 px-4 py-2 sm:px-6">

                                {{-- Radio --}}
                                <div class="flex justify-around m-2">
                                    <div>
                                        <input type="radio" id="dine-in" name="order_type" value="Dine in"
                                            checked class="hidden peer" required>
                                        <label for="dine-in"
                                            class="inline-flex items-center justify-between w-auto p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">Dine in</div>
                                            </div>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="radio" id="take-out" name="order_type" value="Take out"
                                            class="hidden peer">
                                        <label for="take-out"
                                            class="inline-flex items-center justify-between w-auto p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                            <div class="block">
                                                <div class="w-full text-lg font-semibold">Take out</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                </form>
                                {{-- Radio --}}
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                    <p>Subtotal</p>
                                    <p>₱{{ $total }}</p>
                                </div>

                                <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
                                <div class="mt-6 flex justify-evenly">
                                    {{-- <livewire:kioskcalculator/> --}}

                                    {{-- calculate --}}
                                    <div>

                                        <button onclick="openModal()"
                                            class="flex items-center justify-center rounded-md border border-transparent px-6 py-3 text-base font-medium bg-indigo-600 text-white">Checkout</button>

                                        <!-- Modal Structure -->
                                        <div id="myModal"
                                            class="hidden fixed inset-0 z-50 overflow-auto bg-gray-500 bg-opacity-75 flex justify-center items-center">
                                            <!-- Modal Content -->
                                            <div class="bg-white rounded-lg shadow-xl w-3/4">
                                                <h2 class="text-lg font-medium text-gray-900 p-4">Input Customer Amount
                                                    - ₱{{ $total }}</h2>
                                                <p class="text-gray-700 px-4">
                                                    <input id="amountInput" type="number" placeholder="Amount"
                                                        class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
                                                </p>
                                                <label for="changeLabel"
                                                    class="block text-gray-700 px-4 mt-2">Change:</label>
                                                <p id="changeLabel" class="text-gray-700 px-4 mb-4">0.00</p>

                                                <!-- Buttons for digits -->
                                                <div class="col-span-2 grid grid-cols-4 gap-4 ml-4">
                                                    <button onclick="appendToInput('1')"
                                                        class="digit-button w-16 h-16 bg-blue-300 rounded-lg">1</button>
                                                    <button onclick="appendToInput('2')"
                                                        class="digit-button w-16 h-16 bg-blue-300 rounded-lg">2</button>
                                                    <button onclick="appendToInput('3')"
                                                        class="digit-button w-16 h-16 bg-blue-300 rounded-lg">3</button>
                                                    <button onclick="appendToInput('4')"
                                                        class="digit-button w-16 h-16 bg-blue-300 rounded-lg">4</button>
                                                    <button onclick="appendToInput('5')"
                                                        class="digit-button w-16 h-16 bg-blue-300 rounded-lg">5</button>
                                                    <button onclick="appendToInput('6')"
                                                        class="digit-button w-16 h-16 bg-blue-300 rounded-lg">6</button>
                                                    <button onclick="appendToInput('7')"
                                                        class="digit-button w-16 h-16 bg-blue-300 rounded-lg">7</button>
                                                    <button onclick="appendToInput('8')"
                                                        class="digit-button w-16 h-16 bg-blue-300 rounded-lg">8</button>
                                                    <button onclick="appendToInput('9')"
                                                        class="digit-button w-16 h-16 bg-blue-300 rounded-lg">9</button>
                                                    <button onclick="appendToInput('0')"
                                                        class="digit-button w-16 h-16 bg-blue-300 rounded-lg">0</button>
                                                    <button onclick="clearInput()"
                                                        class="bg-red-500 text-white w-16 h-16 rounded-md">Clear</button>
                                                </div>

                                                <!-- The script remains the same -->
                                                <script>
                                                    // Get the value from the <p> element
                                                    var valueFromP = document.getElementById('changeLabel').innerText;

                                                    // Set the value to the input field
                                                    document.getElementById('changeInput').value = valueFromP;

                                                    function clearInput() {
                                                        var inputField = document.getElementById('amountInput');
                                                        inputField.value = ''; // Clear the input field
                                                        calculateChange(); // Recalculate change after clearing input
                                                    }

                                                    function appendToInput(digit) {
                                                        var inputField = document.getElementById('amountInput');
                                                        inputField.value += digit;
                                                        calculateChange(); // Calculate change when digits are appended
                                                    }

                                                    function calculateChange() {
                                                        var total = {{ $total }}; // Get the initial total from PHP
                                                        var amountInput = parseFloat(document.getElementById('amountInput').value);
                                                        var changeLabel = document.getElementById('changeLabel');
                                                        var checkoutButton = document.getElementById('checkoutButton');

                                                        if (!isNaN(amountInput)) {
                                                            // Calculate change
                                                            var change = amountInput - total;
                                                            changeLabel.textContent = '₱' + change.toFixed(2);

                                                            // Enable or disable the checkout button based on the change value
                                                            checkoutButton.disabled = change < 0; // Enable if change is greater than or equal to 0

                                                            // Change button color based on the disabled state
                                                            if (checkoutButton.disabled) {
                                                                checkoutButton.classList.remove('bg-green-500', 'hover:bg-green-600');
                                                                checkoutButton.classList.add('bg-gray-500');
                                                            } else {
                                                                checkoutButton.classList.remove('bg-gray-500');
                                                                checkoutButton.classList.add('bg-green-500', 'hover:bg-green-600');
                                                            }
                                                        } else {
                                                            changeLabel.textContent = '₱0.00';
                                                            checkoutButton.disabled = true; // Disable if the input is not a valid number
                                                            checkoutButton.classList.remove('bg-green-500', 'hover:bg-green-600');
                                                            checkoutButton.classList.add('bg-gray-500');
                                                        }
                                                    }

                                                    function changePaymentMethod(paymentMethod) {
                                                        // ... (existing code remains the same)

                                                        calculateChange(); // Calculate change before submitting the form
                                                    }
                                                </script>


                                                <div class="flex justify-between p-4">
                                                    <button id="checkoutButton"
                                                        onclick="changePaymentMethod('posCash')"
                                                        class="flex items-center justify-center rounded-md border border-transparent px-6 py-3 text-base font-medium text-black"
                                                        disabled>Checkout</button>

                                                    <button onclick="closeModal()"
                                                        class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-md focus:outline-none">Close</button>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            // Function to open the modal
                                            // Function to open the modal
                                            function openModal() {
                                                var modal = document.getElementById('myModal');
                                                modal.classList.remove('hidden');
                                            }

                                            // Function to close the modal
                                            function closeModal() {
                                                var modal = document.getElementById('myModal');
                                                modal.classList.add('hidden');
                                            }
                                        </script>
                                    </div>


                                    {{-- end of calculator --}}


                                    {{-- <button onclick="changePaymentMethod('posCash')"
                                        class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</button> --}}
                                    <button onclick="changePaymentMethod('posQrPayment')"
                                        class="flex items-center justify-center rounded-md border border-transparent px-6 py-3 text-base font-medium text-indigo-600">Cashless</button>
                                </div>
                                <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                    <p>
                                        or
                                        <a href="{{ route('dashboard') }}" wire:navigate>
                                            <button type="button"
                                                class="font-medium text-indigo-600 hover:text-indigo-500">
                                                Continue Shopping
                                                <span aria-hidden="true"> &rarr;</span>
                                            </button>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function incrementQuantity(button) {
            var quantityElement = button.parentNode.querySelector('span');
            var quantity = parseInt(quantityElement.textContent);
            quantity++;
            updateQuantity(quantityElement, quantity);
        }

        function decrementQuantity(button, currentQuantity) {
            if (currentQuantity > 1) {
                var quantityElement = button.parentNode.querySelector('span');
                var quantity = parseInt(quantityElement.textContent);
                quantity--;
                updateQuantity(quantityElement, quantity);
            }
        }

        function updateQuantity(element, quantity) {
            var id = element.closest('li').getAttribute('data-id');

            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    quantity: quantity
                },
                success: function(response) {
                    window.location.reload();
                }
            });

            element.textContent = quantity;
        }
    </script>
    <script type="text/javascript">
        $(".cart_update").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('pos_update_cart') }}',
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
                    url: '{{ route('pos_remove_from_cart') }}',
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
            if (paymentMethod === 'posCash') {
                form.action = "{{ route('pos_create.order') }}";
                form.method = 'post';
            } else if (paymentMethod === 'posQrPayment') {
                form.action = "{{ route('posQrPayment') }}";
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
</x-app-layout>
