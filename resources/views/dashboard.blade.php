<x-app-layout>


    <!--Tabs content-->
    <div class="mb-6">
        <div
            class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
            id="tabs-home"
            role="tabpanel"
            aria-labelledby="tabs-home-tab"
            data-te-tab-active>
            Tab 1 content
        </div>
        <div
            class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"
            id="tabs-profile"
            role="tabpanel"
            aria-labelledby="tabs-profile-tab">
            Tab 2 content
        </div>
{{--        <div--}}
{{--            class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block"--}}
{{--            id="tabs-messages"--}}
{{--            role="tabpanel"--}}
{{--            aria-labelledby="tabs-profile-tab">--}}
{{--            Tab 3 content--}}
{{--        </div>--}}
    </div>

    @livewire('posPage')
</x-app-layout>
