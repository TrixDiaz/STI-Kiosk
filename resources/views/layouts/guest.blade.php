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

    {{-- ReCaptcha --}}
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>
    @livewireStyles
    <style>
        /* ... your existing styles ... */
        
        /* Add responsive styles here */
        @media (max-width: 768px) {
            /* Define styles for smaller screens here */
            .popup {
                width: 100%;
            }
            .block.text-center.md\:text-left {
                text-align: center;
            }
            .flex.flex-col.items-center.md\:flex-row.md\:items-center.justify-center.md\:justify-between.mt-4 {
                justify-content: center;
            }
        }
    </style>
    
</head>
<body>
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>

    @stack('scripts')
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    @livewireScripts
</body>
</html>
