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
    <!-- component -->
    <div class="h-screen w-screen flex bg-gray-200">
        <!-- container -->

        <aside class="flex flex-col items-center bg-white text-gray-700 shadow h-full">
            <!-- Side Nav Bar-->

            <div class="h-16 flex items-center w-full">
                <!-- Logo Section -->
                <a class="h-6 w-6 mx-auto" href="/">
                    <img class="h-6 w-6 mx-auto"
                        src="/images/iz-logo.png"
                        alt="svelte logo" />
                </a>
            </div>

            <ul>
                <!-- Items Section -->
                <li class="hover:bg-gray-100">
                    <a href="{{ route('donmono') }}"
                        class="h-16 px-6 flex justify-center items-center w-full
					focus:text-orange-500">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                            <path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0
       2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0
       0-1.79 1.11z"></path>
                        </svg>

                    </a>
                </li>

                <li class="hover:bg-gray-100">
                    <a href="{{ route('ippin') }}"
                        class="h-16 px-6 flex justify-center items-center w-full
					focus:text-orange-500">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                        </svg>

                    </a>
                </li>

                <li class="hover:bg-gray-100">
                    <a href="."
                        class="h-16 px-6 flex justify-center items-center w-full
					focus:text-orange-500">

                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2
       0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        </svg>

                    </a>
                </li>

                <li class="hover:bg-gray-100">
                    <a href="."
                        class="h-16 px-6 flex justify-center items-center w-full
					focus:text-orange-500">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0
       2-1.61L23 6H6"></path>
                        </svg>

                    </a>
                </li>

                <li class="hover:bg-gray-100">
                    <a href="."
                        class="h-16 px-6 flex justify-center items-center w-full
					focus:text-orange-500">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1
       0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0
       0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2
       2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0
       0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1
       0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0
       0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65
       0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0
       1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0
       1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2
       0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0
       1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0
       2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0
       0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65
       1.65 0 0 0-1.51 1z"></path>
                        </svg>
                    </a>
                </li>

                <li class="hover:bg-gray-100">
                    <a href="."
                        class="h-16 px-6 flex justify-center items-center w-full
					focus:text-orange-500">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                    </a>
                </li>

            </ul>

            <div class="mt-auto h-16 flex items-center w-full">
                <!-- Action Section -->
                <button
                    class="h-16 mx-auto flex justify-center items-center
				w-full focus:text-orange-500 hover:bg-red-200 focus:outline-none">
                    <svg class="h-5 w-5 text-red-700" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>

                </button>
            </div>
        </aside>
        {{-- Page Content --}}
        <div class="flex w-full bg-slate-50">
            {{ $slot }}
        </div>
        {{-- Order list --}}
        <div class="w-1/4 p-4 bg-white shadow">
          <h1>Order List</h1>
      </div>
      
    </div>

    @stack('modals')

    @livewireScripts



</body>

</html>
