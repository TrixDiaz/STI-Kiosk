<x-app-layout>
    <!--Tabs content-->
    <div class="mb-6">
        <div
            class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
            id="tabs-home"
            role="tabpanel"
            aria-labelledby="tabs-home-tab"
            data-te-tab-active>
            <div id="datatable" class="max-h-80 overflow-y-auto overflow-hidden"> {{-- Table --}}
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-5">
                    <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400 ">
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3">
                                Order ID
                            </th>
                            <th scope="col" class="py-3">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr
                                class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 text-center ">
                                <td scope="row"
                                    class="py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">


                                    <button type="button"
                                            class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                            data-te-toggle="modal"
                                            data-te-target="#order{{ $order['order_id'] }}" data-te-ripple-init
                                            data-te-ripple-color="light">
                                        {{ $order['order_id'] }}
                                    </button>


                                    <div data-te-modal-init
                                         class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                         id="order{{ $order['order_id'] }}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div data-te-modal-dialog-ref
                                             class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                                            <div
                                                class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                                                <div
                                                    class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                                    <!--Modal title-->
                                                    <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                                        id="exampleModalLabel">
                                                        Order ID {{ $order['order_id'] }}
                                                    </h5>
                                                    <p class="float-right">{{ $order['created_at'] }}</p>
                                                    <!--Close button-->
                                                    <button type="button"
                                                            class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                                            data-te-modal-dismiss aria-label="Close">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             fill="none" viewBox="0 0 24 24"
                                                             stroke-width="1.5" stroke="currentColor"
                                                             class="h-6 w-6">
                                                            <path stroke-linecap="round"
                                                                  stroke-linejoin="round"
                                                                  d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </div>

                                                <!--Modal body-->
                                                <div class="relative flex-auto p-4" data-te-modal-body-ref>
                                                    <div class="flex justify-between mb-6">
                                                        <h1 class="text-lg font-bold">
                                                            {{ $order['order_type'] }}</h1>
                                                        <div class="text-gray-700">
                                                            <div>Invoice / Order #: {{ $order['order_id'] }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <table class="w-full mb-8">
                                                        <thead>
                                                        <tr>
                                                            <th
                                                                class="text-left font-bold text-gray-700">
                                                                Product</th>
                                                            <th
                                                                class="text-right font-bold text-gray-700">
                                                                Qty</th>
                                                            <th
                                                                class="text-right font-bold text-gray-700">
                                                                Amount</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        <tr>
                                                            <td class="text-left text-gray-700">
                                                                @foreach ($order['order_info'] as $info)
                                                                    {{ $info->product_name }}
                                                                    @if (!$loop->last)
                                                                        <br>
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td class="text-right text-gray-700">
                                                                @foreach ($order['order_info'] as $info)
                                                                    {{ $info->quantity }}
                                                                    @if (!$loop->last)
                                                                        <br>
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td class="text-right text-gray-700">
                                                                @foreach ($order['order_info'] as $info)
                                                                    {{ $info->product_price }}
                                                                    @if (!$loop->last)
                                                                        <br>
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                        </tr>

                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <td
                                                                class="text-left font-bold text-gray-700">
                                                                Total</td>
                                                            <td class=""></td>
                                                            <td
                                                                class="text-right font-bold text-gray-700">
                                                                {{ $order['total'] }} <br>
                                                                {{ $order['payment_status'] }}

                                                            </td>

                                                        </tr>
                                                        </tfoot>
                                                    </table>

                                                </div>

                                                <!--Modal footer-->
                                                <div
                                                    class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                                    <button type="button"
                                                            class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                                                            data-te-modal-dismiss data-te-ripple-init
                                                            data-te-ripple-color="light">
                                                        Close
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button"
                                            class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                            data-te-toggle="modal"
                                            data-te-target="#exampleFrameBottomModal{{ $order['order_id'] }}"
                                            data-te-ripple-init data-te-ripple-color="light">
                                        Pay
                                    </button>
                                    <!-- Modal -->
                                    <div data-te-modal-init
                                         class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-hidden outline-none"
                                         id="exampleFrameBottomModal{{ $order['order_id'] }}"
                                         tabindex="-1" aria-labelledby="exampleFrameBottomModalLabel"
                                         aria-hidden="true">
                                        <div data-te-modal-dialog-ref
                                             class="pointer-events-none absolute bottom-0 w-full translate-y-[50px] opacity-0 transition-all duration-300 ease-in-out">
                                            <div
                                                class="pointer-events-auto relative flex w-full flex-col border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                                                <div class="relative flex-auto py-1"
                                                     data-te-modal-body-ref>
                                                    <div
                                                        class="my-4 flex flex-col items-center justify-center">
                                                        <h2 class="text-lg font-bold"
                                                            id="totalPayment{{ $order['order_id'] }}">
                                                            Payment -
                                                            {{ $order['total'] }} </h2>
                                                        <p class="text-gray-700 px-4">
                                                            <input
                                                                id="amountInput{{ $order['order_id'] }}"
                                                                type="number" placeholder="Amount"
                                                                class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
                                                        </p>
                                                        <label for="changeLabel"
                                                               class="block text-gray-700 px-4 mt-2">Change:</label>
                                                        <p id="changeLabel{{ $order['order_id'] }}"
                                                           class="text-gray-700 px-4 mb-4">0.00</p>

                                                        <!-- Buttons for numbers 0-9 and Clear -->
                                                        <div class="grid grid-cols-3 gap-2">
                                                            @for ($i = 1; $i <= 9; $i++)
                                                                <button type="button"
                                                                        onclick="updateAmount({{ $i }}, '{{ $order['order_id'] }}')"
                                                                        class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded">
                                                                    {{ $i }}
                                                                </button>
                                                            @endfor

                                                            <!-- Add a button for value 0 -->
                                                            <button type="button"
                                                                    onclick="updateAmount(0, '{{ $order['order_id'] }}')"
                                                                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded">
                                                                0
                                                            </button>

                                                            <button type="button"
                                                                    onclick="clearAmount('{{ $order['order_id'] }}')"
                                                                    class="bg-red-200 hover:bg-red-300 text-red-700 font-semibold py-2 px-4 rounded">
                                                                Clear
                                                            </button>
                                                        </div>
                                                        <!-- Footer -->
                                                        <div class="flex justify-end w-full px-4 mt-4">
                                                            {{-- <button type="button"
                                                                onclick="closeModal('{{ $order['order_id'] }}')"
                                                                class="text-gray-600 hover:text-gray-800 font-semibold">
                                                                Close
                                                            </button> --}}
                                                            <form
                                                                action="{{ route('orders.move-to-queue', $order['id']) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                        id="saveChangesBtn{{ $order['order_id'] }}"
                                                                        onclick="return confirm('Are you sure you want to move this order to the queue?')"
                                                                        class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded"
                                                                        disabled> <!-- Initially disabled -->
                                                                    Save
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </td>
                            </tr>
                        @endforeach

                        <script>
                            function updateAmount(value, orderId) {
                                const amountInput = document.getElementById(`amountInput${orderId}`);
                                const totalPayment = document.getElementById(`totalPayment${orderId}`);
                                const changeLabel = document.getElementById(`changeLabel${orderId}`);
                                const saveButton = document.getElementById(`saveChangesBtn${orderId}`);

                                const currentValue = parseFloat(amountInput.value) || 0;
                                const orderTotal = parseFloat(totalPayment.innerText.split('-')[1].trim());

                                const updatedValue = currentValue * 10 + value; // Concatenate value as number

                                amountInput.value = updatedValue;
                                const change = (updatedValue - orderTotal).toFixed(2);
                                changeLabel.innerText = change < 0 ? '0.00' : change;

                                // Enable/disable and change style based on conditions
                                if (updatedValue >= orderTotal) {
                                    saveButton.disabled = false;
                                    saveButton.classList.remove('bg-gray-500');
                                    saveButton.classList.add('bg-green-500', 'hover:bg-green-600');
                                } else {
                                    saveButton.disabled = true;
                                    saveButton.classList.remove('bg-green-500', 'hover:bg-green-600');
                                    saveButton.classList.add('bg-gray-500');
                                }
                            }

                            function clearAmount(orderId) {
                                const amountInput = document.getElementById(`amountInput${orderId}`);
                                const changeLabel = document.getElementById(`changeLabel${orderId}`);

                                amountInput.value = '';
                                changeLabel.innerText = '0.00';
                            }

                            function closeModal(orderId) {
                                const modal = document.getElementById(`exampleFrameBottomModal${orderId}`);
                                modal.classList.add('hidden');
                            }

                            // function saveChanges(orderId) {
                            //     // Add logic here to save changes
                            //     // For example, you can retrieve values and perform necessary actions
                            //     // For demonstration purposes, let's log a message
                            //     console.log(`Changes saved for order ID: ${orderId}`);
                            //     return true;
                            // }
                        </script>
                        </tbody>
                    </table>
                </div>
            </div> {{-- End of DataTable --}}
        </div>
        <div
            class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
            id="tabs-profile"
            role="tabpanel"
            aria-labelledby="tabs-profile-tab">
            <div class="flex max-h-80 overflow-y-auto overflow-hidden">
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

                                <!-- Button trigger modal -->
                                <button type="button"
                                        class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                        data-te-toggle="modal"
                                        data-te-target="#exampleModal{{ $queue['order_id'] }}"
                                        data-te-ripple-init data-te-ripple-color="light">
                                    {{ $queue['order_id'] }}
                                </button>

                                <!-- Modal -->
                                <div data-te-modal-init
                                     class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                     id="exampleModal{{ $queue['order_id'] }}" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div data-te-modal-dialog-ref
                                         class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                                        <div
                                            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                                            <div
                                                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                                <!--Modal title-->
                                                <h5 class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                                    id="exampleModalLabel">
                                                    Order ID {{ $queue['order_id'] }}
                                                </h5>
                                                <!--Close button-->
                                                <button type="button"
                                                        class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                                        data-te-modal-dismiss aria-label="Close">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5"
                                                         stroke="currentColor" class="h-6 w-6">
                                                        <path stroke-linecap="round"
                                                              stroke-linejoin="round"
                                                              d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>

                                            <!--Modal body-->
                                            <div class="relative flex-auto p-4" data-te-modal-body-ref>

                                                <table class="w-full mb-8">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-left font-bold text-gray-700">
                                                            Product</th>
                                                        <th class="text-right font-bold text-gray-700">
                                                            Qty</th>
                                                        {{-- <th
                                                            class="text-right font-bold text-gray-700">
                                                            Amount</th> --}}

                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr>
                                                        <td class="text-left text-gray-700">
                                                            @foreach ($queue['order_info'] as $info)
                                                                {{ $info->product_name }}
                                                                @if (!$loop->last)
                                                                    <br>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="text-right text-gray-700">
                                                            @foreach ($queue['order_info'] as $info)
                                                                {{ $info->quantity }}
                                                                @if (!$loop->last)
                                                                    <br>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        {{-- <td class="text-right text-gray-700">
                                                                @foreach ($queue['order_info'] as $info)
                                                                {{ $info->product_price }}
                                                                @if (!$loop->last)
                                                                    <br>
                                                                @endif
                                                            @endforeach
                                                            </td> --}}
                                                    </tr>

                                                    </tbody>
                                                    {{-- <tfoot>
                                                        <tr>
                                                            <td
                                                                class="text-left font-bold text-gray-700">
                                                                Total</td>
                                                            <td class=""></td>
                                                            <td
                                                                class="text-right font-bold text-gray-700">
                                                                {{ $queue['total'] }} <br>
                                                                {{ $queue['payment_status'] }}

                                                            </td>

                                                        </tr>
                                                    </tfoot> --}}
                                                </table>

                                            </div>

                                            <!--Modal footer-->
                                            <div
                                                class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                                <button type="button"
                                                        class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
                                                        data-te-modal-dismiss data-te-ripple-init
                                                        data-te-ripple-color="light">
                                                    Close
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('serving', $queue['order_id']) }}">
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
                    @foreach ($serves->unique('order_id') as $serve)
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
        </div>
    </div>
    @livewire('posPage')
</x-app-layout>
