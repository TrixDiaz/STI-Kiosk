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

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    {{-- @livewire('database-notifications') --}}
</head>

<body class="font-sans antialiased">

    <x-banner />

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="">
            @if (session('success'))
                <div data-aos="fade-left" data-aos-duration="1000">
                    <div class="font-regular relative block w-full rounded-lg bg-gradient-to-tr from-green-400 to-green-300 px-4 py-4 text-base text-white"
                        data-dismissible="alert" id="success-alert">
                        <div class="absolute top-4 left-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
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
            {{ $slot }}
        </main>
    </div>

    @stack('modals')


    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/tabs.js"></script>
    <script type="text/javascript" src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    @livewireScripts

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init()
    </script>
    <script>
        $(document).ready(function() {
            // Add smooth scrolling to all links
            $('a').on('click', function(event) {
                if (this.hash !== '') {
                    event.preventDefault()

                    var hash = this.hash

                    $('html, body').animate({
                            scrollTop: $(hash).offset().top,
                        },
                        800,
                        function() {
                            window.location.hash = hash
                        }
                    )
                }
            })
        })
    </script>

</body>

</html>
