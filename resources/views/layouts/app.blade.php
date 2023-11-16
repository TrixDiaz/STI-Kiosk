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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
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

        {{-- Top nav --}}

 <!-- Sidenav -->
 <nav id="sidenav-1"
 class="absolute left-0 top-0 z-[1035] h-full w-60 -translate-x-full overflow-hidden bg-white shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] data-[te-sidenav-hidden='true']:translate-x-0 dark:bg-zinc-800"
 data-te-sidenav-init data-te-sidenav-hidden="false" data-te-sidenav-position="absolute">
 <p class="grid place-self-center m-5 text-xl text-center mt-10 font-semibold ">Izakaya</p>
 <ul class="relative m-0 list-none px-[0.2rem] text-center" data-te-sidenav-menu-ref>
     <li class="relative">
         <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
             href="{{ route('dashboard') }}" wire:navigate data-te-sidenav-link-ref>
             <span
                 class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round"
                         d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                 </svg>

             </span>
             <span class="uppercase">Dashboard</span>
         </a>
     </li>
     <li class="relative">
         <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
             href="{{ route('pos.donmono') }}" wire:navigate data-te-sidenav-link-ref>
             <span
                 class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round"
                         d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                 </svg>

             </span>
             <span class="uppercase">Donmono</span>
         </a>
     </li>
     <li class="relative">
         <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
             href="{{ route('ippin') }}" wire:navigate data-te-sidenav-link-ref>
             <span
                 class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round"
                         d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                 </svg>

             </span>
             <span class="uppercase">ippin ryori</span>
         </a>
     </li>
     <li class="relative">
         <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
             href="{{ route('kushiyaki') }}" wire:navigate data-te-sidenav-link-ref>
             <span
                 class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round"
                         d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                 </svg>

             </span>
             <span class="uppercase">kushiyaki</span>
         </a>
     </li>
     <li class="relative">
         <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
             href="{{ route('makizushi') }}" wire:navigate data-te-sidenav-link-ref>
             <span
                 class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round"
                         d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                 </svg>

             </span>
             <span class="uppercase">makizushi</span>
         </a>
     </li>
     <li class="relative">
         <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
             href="{{ route('men') }}" wire:navigate data-te-sidenav-link-ref>
             <span
                 class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round"
                         d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                 </svg>

             </span>
             <span class="uppercase">men</span>
         </a>
     </li>
     <li class="relative">
         <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
             href="{{ route('nigirizushi') }}" wire:navigate data-te-sidenav-link-ref>
             <span
                 class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round"
                         d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                 </svg>

             </span>
             <span class="uppercase">nigirizushi</span>
         </a>
     </li>
     <li class="relative">
         <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
             href="{{ route('ochazuke') }}" wire:navigate data-te-sidenav-link-ref>
             <span
                 class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round"
                         d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                 </svg>

             </span>
             <span class="uppercase">ochazuke</span>
         </a>
     </li>
     <li class="relative">
         <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
             href="{{ route('ramen') }}" wire:navigate data-te-sidenav-link-ref>
             <span
                 class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round"
                         d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                 </svg>

             </span>
             <span class="uppercase">ramen</span>
         </a>
     </li>
     <li class="relative">
         <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
             href="{{ route('salad') }}" wire:navigate data-te-sidenav-link-ref>
             <span
                 class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round"
                         d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                 </svg>

             </span>
             <span class="uppercase">salad</span>
         </a>
     </li>
     <li class="relative">
         <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
             href="{{ route('sashimi') }}" wire:navigate data-te-sidenav-link-ref>
             <span
                 class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round"
                         d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                 </svg>

             </span>
             <span class="uppercase">sashimi</span>
         </a>
     </li>
     <li class="relative">
         <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
             href="{{ route('tempura') }}" wire:navigate data-te-sidenav-link-ref>
             <span
                 class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round"
                         d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                 </svg>

             </span>
             <span class="uppercase">tempura</span>
         </a>
     </li>
     <li class="relative">
         <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
             href="{{ route('yakizakana') }}" wire:navigate data-te-sidenav-link-ref>
             <span
                 class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round"
                         d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                 </svg>

             </span>
             <span class="uppercase">yakizakana</span>
         </a>
     </li>
     <li class="relative">
         <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
             href="{{ route('zensai') }}" wire:navigate data-te-sidenav-link-ref>
             <span
                 class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round"
                         d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                 </svg>

             </span>
             <span class="uppercase">zensai</span>
         </a>
     </li>

 </ul>
</nav>
<!-- Sidenav -->
<div class="mt-3 mx-3 flex">
 <!-- Toggler -->
 <button
     class="mx-3 mb-3 inline-block rounded bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
     data-te-sidenav-toggle-ref data-te-target="#sidenav-1" aria-controls="#sidenav-1"
     aria-haspopup="true">
     <span class="block [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-white">
         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
             class="h-5 w-5">
             <path fill-rule="evenodd"
                 d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                 clip-rule="evenodd" />
         </svg>
     </span>
 </button>
 <!-- Toggler -->
 {{-- Dropdown Toggler --}}
 <div class="relative" data-te-dropdown-ref>
     <button
         class="flex items-center whitespace-nowrap rounded bg-gray-200 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-neutral-800 shadow-[0_4px_9px_-4px_#fbfbfb] transition duration-150 ease-in-out hover:bg-neutral-100 hover:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:bg-neutral-100 focus:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] focus:outline-none focus:ring-0 active:bg-neutral-200 active:shadow-[0_8px_9px_-4px_rgba(251,251,251,0.3),0_4px_18px_0_rgba(251,251,251,0.2)] motion-reduce:transition-none"
         type="button" id="dropdownMenuButton9" data-te-dropdown-toggle-ref
         aria-expanded="false" data-te-ripple-init>
         {{-- Cart --}}
         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
             <path stroke-linecap="round" stroke-linejoin="round"
                 d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
         </svg>

         {{-- Cart --}}
         <span class="ml-2 w-2">
             {{-- Count --}}
             <p class="text-md">{{ count((array) session('cart')) }}</p>
             {{-- Count --}}
         </span>
     </button>
     <ul class="absolute z-[1000] float-left m-0 hidden w-80 list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-neutral-700 [&[data-te-dropdown-show]]:block"
         aria-labelledby="dropdownMenuButton9" data-te-dropdown-menu-ref>
         <li class="m-1">
             <a class="block w-full whitespace-nowrap bg-transparent px-4 pt-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                 data-te-dropdown-item-ref>
                 <div class="row total-header-section">
                     @php $total = 0 @endphp
                     @foreach ((array) session('cart') as $id => $details)
                         @php $total += $details['product_price'] * $details['quantity'] @endphp
                     @endforeach
                     <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                         <p>Total: <span class="text-info">₱ {{ $total }}</span></p>
                     </div>
                 </div>
             </a>
         </li>
         <li class="h-48 overflow-y-auto my-2 mx-2">
             <a class="mt-3 block w-full whitespace-nowrap bg-transparent px-2 text-sm font-normal text-neutral-700 hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400 dark:text-neutral-200 dark:hover:bg-neutral-600"
                 data-te-dropdown-item-ref>
                 @if (session('cart'))
                     @foreach (session('cart') as $id => $details)
                         <div class="flex">
                             <div class="col-lg-4 col-sm-4 col-4 mr-5">
                                 <img src="storage/{{ $details['product_image'] }}"
                                     alt="{{ $details['product_name'] }}"
                                     class="h-14 w-14 bg-cover rounded-md" />
                             </div>
                             <div class="col-lg-8 col-sm-8 col-8">
                                 <p class="">{{ $details['product_name'] }}</p>
                                 <span class="price text-info ">
                                     ${{ $details['product_price'] }}</span> <span
                                     class="bn n"> Qty:{{ $details['quantity'] }}</span>
                             </div>
                         </div>
                         <hr class="my-1">
                     @endforeach
                 @endif
             </a>
         </li>
         <li class="">
             <a class="my-2" data-te-dropdown-item-ref>
                 <div class="row">
                     <div class="text-center m-2">
                         <a href="{{ route('posCart') }}"
                             class="text-center w-full bg-blue-200 p-2 rounded-md">View all</a>
                     </div>
                 </div>
             </a>
         </li>
     </ul>
 </div>
 {{-- Dropdown Toggler --}}
</div>
        {{-- end of top nav --}}
        <!-- Page Content -->
        <main class="font-sans text-gray-900 antialiased">
            @if (session('success'))
            <div data-aos="fade-left" data-aos-duration="1000" class="mx-5">
                <div class="mt-3 font-regular relative block w-full rounded-lg bg-gradient-to-tr from-green-400 to-green-300 px-4 py-4 text-base text-white"
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

        @if (session('error'))
            <div data-aos="fade-left" data-aos-duration="1000" class="mx-5">
                <div class="mt-3 font-regular relative block w-full rounded-lg bg-gradient-to-tr from-red-600 to-red-500  px-4 py-4 text-base text-white"
                    data-dismissible="alert" id="success-alert">
                    <div class="absolute top-4 left-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-8 mr-12">{{ session('error') }}</div>
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

    @livewireScripts

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/tabs.js"></script>
    <script type="text/javascript" src="../node_modules/tw-elements/dist/js/tw-elements.umd.min.js"></script>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
      document.addEventListener('dblclick', function () {
        toggleFullscreen();
      });
    });

    function toggleFullscreen() {
      const doc = window.document;
      const docEl = doc.documentElement;

      const requestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl.webkitRequestFullScreen || docEl.msRequestFullscreen;
      const cancelFullScreen = doc.exitFullscreen || doc.mozCancelFullScreen || doc.webkitExitFullscreen || doc.msExitFullscreen;

      if (!doc.fullscreenElement && !doc.mozFullScreenElement && !doc.webkitFullscreenElement && !doc.msFullscreenElement) {
        requestFullScreen.call(docEl);
      } else {
        cancelFullScreen.call(doc);
      }
    }
  </script>

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
