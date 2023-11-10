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
    <!-- Button trigger modal -->
<div class="p-5">
    <button
type="button"
class="float-right inline-block rounded bg-primary px-6 pb-2 pt-2.5  text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
data-te-toggle="modal"
data-te-target="#rightTopModal"
data-te-ripple-init
data-te-ripple-color="light">
Modal
</button>
</div>

<!-- Modal top right-->
<div
data-te-modal-init
class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
id="rightTopModal"
tabindex="-1"
aria-labelledby="rightTopModalLabel"
aria-hidden="true">
<div
  data-te-modal-dialog-ref
  class="pointer-events-none absolute right-7 h-auto w-full translate-x-[100%] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
  <div
    class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
    <div
      class="flex flex-shrink-0 items-center justify-between rounded-t-md bg-info-600 p-4 dark:border-b dark:border-neutral-500 dark:bg-transparent">
      <h5
        class="text-xl font-medium leading-normal text-white"
        id="rightTopModalLabel">
        Product in the cart
      </h5>
      <button
        type="button"
        class="box-content rounded-none border-none text-white hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
        data-te-modal-dismiss
        aria-label="Close">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor"
          class="h-6 w-6">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
    <div class="relative flex flex-auto p-4" data-te-modal-body-ref>
      <span class="text-info-600 [&>svg]:h-16 [&>svg]:w-20">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          fill="currentColor">
          <path
            d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
        </svg>
      </span>
      <div class="ml-8">
        <p class="my-4">
          Do you need more time to make a purchase decision?
        </p>
        <p class="my-4">
          No pressure, your product will be waiting for you in the cart.
        </p>
      </div>
    </div>
    <div
      class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
      <button
        type="button"
        class="mr-2 inline-block rounded bg-info px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#54b4d3] transition duration-150 ease-in-out hover:bg-info-600 hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:bg-info-600 focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] focus:outline-none focus:ring-0 active:bg-info-700 active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.3),0_4px_18px_0_rgba(84,180,211,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(84,180,211,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(84,180,211,0.2),0_4px_18px_0_rgba(84,180,211,0.1)]"
        data-te-ripple-init
        data-te-ripple-color="light">
        Go to the cart
      </button>
      <button
        type="button"
        class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-100 focus:bg-primary-accent-100 focus:outline-none focus:ring-0 active:bg-primary-accent-200"
        data-te-modal-dismiss
        data-te-ripple-init
        data-te-ripple-color="light">
        Close
      </button>
    </div>
  </div>
</div>
</div>
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
                   
                
                <div class="flex">
                    <!-- Table for "Queue" -->
                    <table class="w-1/2 text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                            <button type="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline text-center">Serve</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                
                    <!-- Table for "Serve" -->
                    <table class="w-1/2 text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
