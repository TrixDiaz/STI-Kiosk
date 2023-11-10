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
                    <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->
<div class="bg-white">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
      <h2 class="sr-only">Products</h2>
  
      <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        <a href="#" class="group">
          <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
            <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
          </div>
          <h3 class="mt-4 text-sm text-gray-700">Earthen Bottle</h3>
          <p class="mt-1 text-lg font-medium text-gray-900">$48</p>
        </a>
        <a href="#" class="group">
          <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
            <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-02.jpg" alt="Olive drab green insulated bottle with flared screw lid and flat top." class="h-full w-full object-cover object-center group-hover:opacity-75">
          </div>
          <h3 class="mt-4 text-sm text-gray-700">Nomad Tumbler</h3>
          <p class="mt-1 text-lg font-medium text-gray-900">$35</p>
        </a>
        <a href="#" class="group">
          <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
            <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-03.jpg" alt="Person using a pen to cross a task off a productivity paper card." class="h-full w-full object-cover object-center group-hover:opacity-75">
          </div>
          <h3 class="mt-4 text-sm text-gray-700">Focus Paper Refill</h3>
          <p class="mt-1 text-lg font-medium text-gray-900">$89</p>
        </a>
        <a href="#" class="group">
          <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
            <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-04.jpg" alt="Hand holding black machined steel mechanical pencil with brass tip and top." class="h-full w-full object-cover object-center group-hover:opacity-75">
          </div>
          <h3 class="mt-4 text-sm text-gray-700">Machined Mechanical Pencil</h3>
          <p class="mt-1 text-lg font-medium text-gray-900">$35</p>
        </a>
  
        <!-- More products... -->
      </div>
    </div>
  </div>
  
                </div>

                <div class="hidden opacity-0" id="message" role="tabpanel">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
        
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-5">
                    <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                    <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                <div class="flex">
                    <!-- Table for "Queue" -->
                    <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700  dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3">
                                    Preparing
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($queues as $queue)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <td scope="row"
                                        class="py-4 font-medium text-gray-900 whitespace-nowrap rounded-lg dark:text-white">
                                        {{ $queue->order_id }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                
                    <!-- Table for "Serve" -->
                    <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 text-green-400">
                                    Now Serving
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($serves as $serve)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <td scope="col"
                                        class="py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $serve->order_id }}
                                    </td>
                                  
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>

               

            </div>
        </div>
    </div>


</x-app-layout>
