<x-app-layout>
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

            <div data-tab-content="" class="">
                <div class="block opacity-100" id="app" role="tabpanel">{{-- Start  of First panel --}}
                    <!-- Sidenav -->
                    <nav id="sidenav-1"
                        class="absolute left-0 top-0 z-[1035] h-full w-60 -translate-x-full overflow-hidden bg-white shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] data-[te-sidenav-hidden='true']:translate-x-0 dark:bg-zinc-800"
                        data-te-sidenav-init data-te-sidenav-hidden="false" data-te-sidenav-position="absolute">
                        <p class="grid place-self-center m-5 text-xl text-center mt-10 font-semibold ">Izakaya</p>
                        <ul class="relative m-0 list-none px-[0.2rem] text-center" data-te-sidenav-menu-ref>
                            <li class="relative">
                                <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                    href="{{ route('kiosk') }}" wire:navigate data-te-sidenav-link-ref>
                                    <span
                                        class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:text-gray-400 dark:[&>svg]:text-gray-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                        </svg>

                                    </span>
                                    <span class="uppercase">Home</span>
                                </a>
                            </li>
                            <li class="relative">
                                <a class="flex h-12 cursor-pointer items-center truncate rounded-[5px] px-6 py-4 text-[0.875rem] text-black  outline-none transition duration-300 ease-linear hover:bg-slate-50 hover:text-inherit hover:outline-none focus:bg-slate-50 focus:text-inherit focus:outline-none active:bg-slate-50 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                                    href="{{ route('donmono') }}" wire:navigate data-te-sidenav-link-ref>
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
                                                <a href="{{ route('cart') }}"
                                                    class="text-center w-full bg-blue-200 p-2 rounded-md">View all</a>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        {{-- Dropdown Toggler --}}
                    </div>
                    <div class="">
                        <div class="mx-auto sm:px-6 lg:px-8">
                            <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-2">

                                <!-- Product  -->
                                <div class="">
                                    <a href="{{ route('donmono') }}" wire:navigate>
                                        <div class="shadow-lg">
                                            <img src="/images/donmono.jpeg" alt="Product Image"
                                                class="w-full h-40 rounded-lg shadow-lg"> <!-- Set the height here -->

                                        </div>
                                    </a>
                                </div>
                                {{-- End of Product --}}

                                <!-- Product  -->
                                <div class="">
                                    <a href="{{ route('ippin') }}" wire:navigate>
                                        <div class="shadow-lg">
                                            <img src="images/ippin.jpeg" alt="Product Image"
                                                class="w-full h-40 rounded-lg shadow-lg"> <!-- Set the height here -->

                                        </div>
                                    </a>
                                </div>
                                {{-- End of Product --}}

                                <!-- Product  -->
                                <div class="">
                                    <a href="{{ route('kushiyaki') }}" wire:navigate>
                                        <div class="shadow-lg">
                                            <img src="images/kushiyaki.jpeg" alt="Product Image"
                                                class="w-full h-40 rounded-lg shadow-lg"> <!-- Set the height here -->

                                        </div>
                                    </a>
                                </div>
                                {{-- End of Product --}}

                                <!-- Product  -->
                                <div class="">
                                    <a href="{{ route('makizushi') }}" wire:navigate>
                                        <div class="shadow-lg">
                                            <img src="images/makisushi.jpeg" alt="Product Image"
                                                class="w-full h-40 rounded-lg shadow-lg"> <!-- Set the height here -->

                                        </div>
                                    </a>
                                </div>
                                {{-- End of Product --}}

                                <!-- Product  -->
                                <div class="">
                                    <a href="{{ route('men') }}" wire:navigate>
                                        <div class="shadow-lg">
                                            <img src="images/men.jpeg" alt="Product Image"
                                                class="w-full h-40 rounded-lg shadow-lg"> <!-- Set the height here -->

                                        </div>
                                    </a>
                                </div>
                                {{-- End of Product --}}

                                <!-- Product  -->
                                <div class="">
                                    <a href="{{ route('nigirizushi') }}" wire:navigate>
                                        <div class="shadow-lg">
                                            <img src="images/nigiri.jpeg" alt="Product Image"
                                                class="w-full h-40 rounded-lg shadow-lg"> <!-- Set the height here -->

                                        </div>
                                    </a>
                                </div>
                                {{-- End of Product --}}

                                <!-- Product  -->
                                <div class="">
                                    <a href="{{ route('ochazuke') }}" wire:navigate>
                                        <div class="shadow-lg">
                                            <img src="images/ochazuke.jpeg" alt="Product Image"
                                                class="w-full h-40 rounded-lg shadow-lg"> <!-- Set the height here -->

                                        </div>
                                    </a>
                                </div>
                                {{-- End of Product --}}

                                <!-- Product  -->
                                <div class="">
                                    <a href="{{ route('ramen') }}" wire:navigate>
                                        <div class="shadow-lg">
                                            <img src="images/ramen.jpeg" alt="Product Image"
                                                class="w-full h-40 rounded-lg shadow-lg"> <!-- Set the height here -->

                                        </div>
                                    </a>
                                </div>
                                {{-- End of Product --}}

                                <!-- Product  -->
                                <div class="">
                                    <a href="{{ route('salad') }}" wire:navigate>
                                        <div class="shadow-lg">
                                            <img src="images/salad.jpeg" alt="Product Image"
                                                class="w-full h-40 rounded-lg shadow-lg"> <!-- Set the height here -->

                                        </div>
                                    </a>
                                </div>
                                {{-- End of Product --}}

                                <!-- Product  -->
                                <div class="">
                                    <a href="{{ route('sashimi') }}" wire:navigate>
                                        <div class="shadow-lg">
                                            <img src="images/sashimi.jpeg" alt="Product Image"
                                                class="w-full h-40 rounded-lg shadow-lg"> <!-- Set the height here -->

                                        </div>
                                    </a>
                                </div>
                                {{-- End of Product --}}

                                <!-- Product  -->
                                <div class="">
                                    <a href="{{ route('tempura') }}" wire:navigate>
                                        <div class="shadow-lg">
                                            <img src="images/tempura.jpeg" alt="Product Image"
                                                class="w-full h-40 rounded-lg shadow-lg"> <!-- Set the height here -->

                                        </div>
                                    </a>
                                </div>
                                {{-- End of Product --}}

                                <!-- Product  -->
                                <div class="">
                                    <a href="{{ route('yakizakana') }}" wire:navigate>
                                        <div class="shadow-lg">
                                            <img src="images/yakizakana.jpeg" alt="Product Image"
                                                class="w-full h-40 rounded-lg shadow-lg"> <!-- Set the height here -->

                                        </div>
                                    </a>
                                </div>
                                {{-- End of Product --}}

                                <!-- Product  -->
                                <div class="">
                                    <a href="{{ route('zensai') }}" wire:navigate>
                                        <div class="shadow-lg">
                                            <img src="images/zenkai.jpeg" alt="Product Image"
                                                class="w-full h-40 rounded-lg shadow-lg"> <!-- Set the height here -->

                                        </div>
                                    </a>
                                </div>
                                {{-- End of Product --}}



                            </div>
                        </div>
                    </div>

                </div> {{-- End of First panel --}}

                <div class="hidden opacity-0" id="message" role="tabpanel">
                    {{-- Table --}}

                    <div class="mb-3 mx-8">
                        <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                            <input id="advanced-search-input" type="search"
                                class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                                placeholder="Search" aria-label="Search" aria-describedby="button-addon1" />

                            <!--Search button-->
                            <button
                                class="relative z-[2] flex items-center rounded-r bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                                type="button" id="advanced-search-button" data-te-ripple-init
                                data-te-ripple-color="light">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="h-5 w-5">
                                    <path fill-rule="evenodd"
                                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div id="datatable">
                        {{-- Table --}}

                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-5">
                            <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
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
                                            class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 text-center">
                                            <td scope="row"
                                                class="py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">


                                                <button type="button"
                                                    class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                                    data-te-toggle="modal"
                                                    data-te-target="#order{{ $order['order_id'] }}"
                                                    data-te-ripple-init data-te-ripple-color="light">
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

                                                                <p>Order ID : {{ $order['order_id'] }}</p>
                                                                <p>Product Name :
                                                                    @foreach ($order['order_info'] as $info)
                                                                        {{ $info->product_name }}
                                                                        @if (!$loop->last)
                                                                            <br>
                                                                        @endif
                                                                    @endforeach
                                                                </p>
                                                                <p>Qty
                                                                    @foreach ($order['order_info'] as $info)
                                                                        {{ $info->quantity }}
                                                                        @if (!$loop->last)
                                                                            <br>
                                                                        @endif
                                                                    @endforeach
                                                                </p>
                                                                <p>Order Type : {{ $order['order_type'] }}</p>
                                                                <p>Payment Status : {{ $order['payment_status'] }}</p>
                                                                <p>Total : {{ $order['total'] }}</p>
                                                                <p>Created : {{ $order['created_at'] }}</p>

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
                                                <form action="{{ route('orders.move-to-queue', $order['id']) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Are you sure you want to move this order to the queue?')">Move
                                                        to Queue</button>
                                                </form>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- End of Table --}}
                    </div> {{-- End of DataTable --}}
                </div> {{-- End of second panel --}}

                <div class="hidden opacity-0" id="settings" role="tabpanel">


                    <div class="flex">
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

                                                            <p>Order ID : {{ $queue['order_id'] }}</p>
                                                            <p>Product Name :
                                                                @foreach ($queue['order_info'] as $info)
                                                                    {{ $info->product_name }}
                                                                    @if (!$loop->last)
                                                                        <br>
                                                                    @endif
                                                                @endforeach
                                                            </p>
                                                            <p>Qty
                                                                @foreach ($queue['order_info'] as $info)
                                                                    {{ $info->quantity }}
                                                                    @if (!$loop->last)
                                                                        <br>
                                                                    @endif
                                                                @endforeach
                                                            </p>
                                                            <p>Order Type : {{ $queue['order_type'] }}</p>
                                                            <p>Payment Status : {{ $queue['payment_status'] }}</p>
                                                            <p>Total : {{ $queue['total'] }}</p>
                                                            <p>Created : {{ $queue['created_at'] }}</p>

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
                                                            {{-- <button type="button"
                                                                class="ml-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                                                data-te-ripple-init data-te-ripple-color="light">
                                                                Save changes
                                                            </button> --}}
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
                </div>{{-- End of First panel --}}


</x-app-layout>
