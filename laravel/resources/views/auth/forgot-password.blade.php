<!-- This is the password reset request page, The user can request a password reset link here -->
<x-layout>
    <div class="flex flex-col justify-center items-center min-h-screen gap-[2rem] p-[1rem] md:flex-row md:justify-around md:gap-0 md:p-0">
        
        <div class="flex justify-center items-center">
            <img class="w-full h-full object-contain max-w-[200px] md:max-w-full" src="{{ asset('favicon.jpeg') }}" alt="WELLTH Logo">
        </div>

        <!-- Password Reset Form Container -->
        <div class="flex flex-col justify-self-center items-center bg-[#1f5b38] p-[10%] w-full max-w-[450px] shadow-[10px_10px_0_#2d322c] md:p-[8%] md:w-auto md:max-w-lg rounded-lg">
            
            <h1 class="text-3xl mb-6 text-[#7FA82E] font-bold tracking-wider text-center">RESET PASSWORD</h1>

            <div class="mb-6 text-sm text-gray-200 text-center leading-relaxed">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />
            <!-- Password Reset Request Form -->
            <form method="POST" action="{{ route('password.email') }}" class="w-full">
                @csrf

                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-white" />
                    <x-text-input id="email" class=" block mt-1 w-full" type="email" name="email" :value="old('email')" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Submit Button -->
                <div class="flex items-center justify-end mt-6">
                    <x-primary-button class="w-full justify-center">
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-layout>