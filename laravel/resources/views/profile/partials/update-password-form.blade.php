<!-- Laravel Breeze's default profile information update form, modified to fit our design -->

<section>
    <header>
        <h2 class="text-lg font-bold text-gray-900 dark:text-white">
            {{ __('Update Password') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="current_password" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                {{ __('Current Password') }}
            </label>
            <input id="current_password" name="current_password" type="password" 
                   class="block w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring focus:ring-[#7FA82E] focus:ring-opacity-50 py-3 px-4 transition-colors" 
                   autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                {{ __('New Password') }}
            </label>
            <input id="password" name="password" type="password" 
                   class="block w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring focus:ring-[#7FA82E] focus:ring-opacity-50 py-3 px-4 transition-colors" 
                   autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                {{ __('Confirm Password') }}
            </label>
            <input id="password_confirmation" name="password_confirmation" type="password" 
                   class="block w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring focus:ring-[#7FA82E] focus:ring-opacity-50 py-3 px-4 transition-colors" 
                   autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="inline-flex items-center px-6 py-3 bg-[#7FA82E] border border-transparent rounded-full font-bold text-xs text-white uppercase tracking-widest hover:bg-[#6d9126] focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-[#7FA82E] focus:ring-offset-2 transition ease-in-out duration-150 shadow-md hover:shadow-lg hover:-translate-y-0.5">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-[#7FA82E] font-bold">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>