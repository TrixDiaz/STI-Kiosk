<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Styles -->
        @livewireStyles
        {{-- @livewire('database-notifications') --}}
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            {{-- <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

            <div class="h-screen w-screen flex bg-gray-200">
                <!-- container -->
        
                <aside class="flex flex-col items-center bg-white text-gray-700 shadow h-full">
                    <!-- Side Nav Bar-->
        
                    <div class="h-16 flex items-center w-full">
                        <!-- Logo Section -->
                        <a class="h-6 w-6 mx-auto" href="/dashboard"  
                        wire:navigate>
                            <img class="h-6 w-6 mx-auto" src="/images/iz-logo.png" alt="svelte logo" />
                        </a>
                    </div>
        
                    <ul class="overflow-y-auto h-auto">
                        <!-- Items Section -->
                        <li class="hover:bg-gray-100">
                            <a href="#"
                            wire:navigate
                                class="h-16 px-6 flex justify-center items-center w-full uppercase
                            focus:text-orange-500">
                               Donmono
        
                            </a>
                        </li>
        
                        {{-- <li class="hover:bg-gray-100">
                            <a href="{{ route('ippin') }}"
                            wire:navigate
                                class="h-16 px-6 flex justify-center items-center w-full uppercase
                            focus:text-orange-500">
                                Ippin
        
                            </a>
                        </li>
        
                        <li class="hover:bg-gray-100">
                            <a href="{{ route('kushiyaki') }}"
                            wire:navigate
                                class="h-16 px-6 flex justify-center items-center w-full uppercase
                            focus:text-orange-500">
        
                                kushiyaki
        
                            </a>
                        </li>
        
                        <li class="hover:bg-gray-100">
                            <a href="{{ route('makizushi') }}"
                            wire:navigate
                                class="h-16 px-6 flex justify-center items-center w-full uppercase
                            focus:text-orange-500">
                              
                  makisushi
        
                            </a>
                        </li>
        
                        <li class="hover:bg-gray-100">
                            <a href="{{ route('zensai') }}"
                            wire:navigate
                                class="h-16 px-6 flex justify-center items-center w-full uppercase
                            focus:text-orange-500">
                              zensai
                            </a>
                        </li>
        
                        <li class="hover:bg-gray-100">
                            <a href="{{ route('men') }}"
                            wire:navigate
                                class="h-16 px-6 flex justify-center items-center w-full uppercase
                            focus:text-orange-500">
                               men
                            </a>
                        </li>
        
                        <li class="hover:bg-gray-100">
                          <a href="{{ route('nigirizushi') }}"
                          wire:navigate
                              class="h-16 px-6 flex justify-center items-center w-full uppercase
                focus:text-orange-500">
                              nigirizushi
                          </a>
                      </li>
        
                      <li class="hover:bg-gray-100">
                        <a href="{{ route('ochazuke') }}"
                        wire:navigate
                            class="h-16 px-6 flex justify-center items-center w-full uppercase
              focus:text-orange-500">
                           ochazuke
                        </a>
                    </li>
        
                    <li class="hover:bg-gray-100">
                      <a href="{{ route('ramen') }}"
                      wire:navigate
                          class="h-16 px-6 flex justify-center items-center w-full uppercase
            focus:text-orange-500">
                        ramen
                      </a>
                  </li>
        
                  <li class="hover:bg-gray-100">
                    <a href="{{ route('salad') }}"
                    wire:navigate
                        class="h-16 px-6 flex justify-center items-center w-full uppercase
          focus:text-orange-500">
                     salad
                    </a>
                </li>
        
                <li class="hover:bg-gray-100">
                  <a href="{{ route('sashimi') }}"
                  wire:navigate
                      class="h-16 px-6 flex justify-center items-center w-full uppercase
        focus:text-orange-500">
                      sashimi
                  </a>
              </li>
        
              <li class="hover:bg-gray-100">
                <a href="{{ route('tempura') }}"
                wire:navigate
                    class="h-16 px-6 flex justify-center items-center w-full uppercase
        focus:text-orange-500">
                    tempura
                </a>
            </li>
        
            <li class="hover:bg-gray-100">
              <a href="{{ route('yakizakana') }}"
              wire:navigate
                  class="h-16 px-6 flex justify-center items-center w-full uppercase
        focus:text-orange-500">
                yakizakana
              </a>
          </li>
        
                    </ul> --}}
        
                </aside>
                {{-- Page Content --}}
                <div class="flex w-full bg-slate-50 overflow-y-auto h-auto">
                    {{ $slot }}
        
                    <div class="float-right p-3">
                        @if(Request::is('cart'))
                            {{-- <a href="{{ route('kiosk') }}" wire:navigate>Back</a> --}}
                        @else
                        {{-- <button type="button" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <a href="{{ route('cashier.cart') }}" wire:navigate>Cart</a>
                            <span class="inline-flex items-center justify-center w-4 h-4 ml-2 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                                @cartCount
                            </span>
                          </button> --}}
                        @endif
                    </div>
                    
                    
                </div>
               
        
            </div>
        </div>

        @stack('modals')

        @livewireScripts

     
        
    </body>
</html>
