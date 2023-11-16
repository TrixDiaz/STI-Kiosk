<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- PWA  -->
<meta name="theme-color" content="#6777ef"/>
<link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
<link rel="manifest" href="{{ asset('/manifest.json') }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Izakaya Shonantei</title>
    <link rel="icon" type="image/x-icon" href="/images/iz-logo.png">

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

    <script src="{{ asset('/sw.js') }}"></script>
<script>
   if ("serviceWorker" in navigator) {
      // Register a service worker hosted at the root of the
      // site using the default scope.
      navigator.serviceWorker.register("/sw.js").then(
      (registration) => {
         console.log("Service worker registration succeeded:", registration);
      },
      (error) => {
         console.error(`Service worker registration failed: ${error}`);
      },
    );
  } else {
     console.error("Service workers are not supported.");
  }
</script>

</body>


</html>
