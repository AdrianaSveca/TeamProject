<x-layout>


    <div class="flex flex-col justify-center items-center min-h-screen gap-[2rem] p-[1rem] md:flex-row md:justify-around md:gap-0 md:p-0">
        <div class="flex justify-center items-center">
            <img class="w-full h-full object-contain max-w-[200px] md: max-w-full" src="{{ asset('favicon.png') }}" alt="Website Logo">
        </div>
        
        <div class="flex flex-col justify-self-center items-center bg-[#1f5b38] p-[10%] w-full max-w-[450px] shadow-[10px_10px_0_#2d322c] md:p-[15%] md:w-auto md:max-w-none">
            <h1 class="text-xl text-white font-semibold justify-self-center">Register</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a href="{{ route('login') }}" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 whitespace-nowrap" >
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ms-4 whitespace-nowrap">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
