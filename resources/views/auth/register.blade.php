<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            {{-- <x-authentication-card-logo /> --}}
        </x-slot>

        <x-validation-errors class="mb-4" />

        <div class="flex flex-col-reverse md:flex-row">
            <!-- Registration Form -->
            <form class="sm:w-52 md:w-1/2 mx-auto" method="POST" action="{{ route('register') }}" id="registerForm">
                @csrf
                <input type="hidden" class="g-recaptcha" name="recaptcha_token" id="recaptcha_token">
                {{-- Name --}}
                <div class="mb-4">
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" onkeypress="return onlyAlphabets(event,this);" class="block w-full" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                </div>

                {{-- Email --}}
                <div class="mb-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block w-full" type="email" name="email" :value="old('email')"
                        required autocomplete="username" />
                </div>

                {{-- Password --}}
                <div x-data="{ showPassword: false }" class="mb-4">
                    <x-label for="password" value="{{ __('Password') }}" />

                    <div class="relative">
                        <x-input id="password" class="block w-full pr-10" type="password" name="password" required
                            autocomplete="new-password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                            x-bind:type="showPassword ? 'text' : 'password'" />

                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 cursor-pointer"
                            @click="showPassword = !showPassword">
                            <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              </svg>
                              

                              <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                              </svg>
                              
                        </div>
                    </div>
                </div>

                {{-- Confirmation Password --}}
                <div x-data="{ showConfirmation: false }" class="mb-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />

                    <div class="relative">
                        <x-input id="password_confirmation" class="block w-full pr-10" type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                            x-bind:type="showConfirmation ? 'text' : 'password'" />

                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 cursor-pointer"
                            @click="showConfirmation = !showConfirmation">
                            <svg x-show="!showConfirmation" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              </svg>
                              

                              <svg x-show="showConfirmation" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                              </svg>
                              
                        </div>
                    </div>
                </div>


                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mb-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />
                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' =>
                                            '<a target="_blank" href="' .
                                            route('terms.show') .
                                            '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                            __('Terms of Service') .
                                            '</a>',
                                        'privacy_policy' =>
                                            '<a target="_blank" href="' .
                                            route('policy.show') .
                                            '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                            __('Privacy Policy') .
                                            '</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mb-4">
                    <a wire:navigate
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="ml-4">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>

            <!-- Image -->
            <div class="sm:w-52 md:w-1/2 mx-auto mb-8">
                <img class="w-full" src="{{ url('http://clipartmag.com/images/jeep-clipart-40.jpg') }}"
                    alt="Image" />
            </div>
        </div>

        @push('scripts')
            <script>
                grecaptcha.ready(function() {
                    document.getElementById('registerForm').addEventListener("submit", function(event) {
                        event.preventDefault();
                        grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', {
                                action: 'register'
                            })
                            .then(function(token) {
                                document.getElementById("recaptcha_token").value = token;
                                document.getElementById('registerForm').submit();
                            });
                    });
                });
            </script>
        @endpush

        <script language="Javascript" type="text/javascript">

            function onlyAlphabets(e, t) {
                try {
                    if (window.event) {
                        var charCode = window.event.keyCode;
                    }
                    else if (e) {
                        var charCode = e.which;
                    }
                    else { return true; }
                    if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                        return true;
                    else
                        return false;
                }
                catch (err) {
                    alert(err.Description);
                }
            }
    
        </script>

    </x-authentication-card>

</x-guest-layout>
