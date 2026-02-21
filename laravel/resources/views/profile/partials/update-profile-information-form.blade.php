<!-- Laravel Breeze's default profile information update form, modified to fit our design -->

<section>
    <header>
        <h2 class="text-lg font-bold text-gray-900 dark:text-white">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                {{ __('Name') }}
            </label>
            <input id="name" name="name" type="text" 
                   class="block w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring focus:ring-[#7FA82E] focus:ring-opacity-50 py-3 px-4 transition-colors" 
                   value="{{ old('name', $user->name) }}" required autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <label for="email" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                {{ __('Email') }}
            </label>
            <input id="email" name="email" type="email" 
                   class="block w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring focus:ring-[#7FA82E] focus:ring-opacity-50 py-3 px-4 transition-colors" 
                   value="{{ old('email', $user->email) }}" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-gray-800 dark:text-gray-300">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="underline text-sm text-[#7FA82E] hover:text-[#6d9126] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#7FA82E]">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="inline-flex items-center px-6 py-3 bg-[#7FA82E] border border-transparent rounded-full font-bold text-xs text-white uppercase tracking-widest hover:bg-[#6d9126] focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-[#7FA82E] focus:ring-offset-2 transition ease-in-out duration-150 shadow-md hover:shadow-lg hover:-translate-y-0.5">
                {{ __('Save Changes') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-[#7FA82E] font-bold">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>