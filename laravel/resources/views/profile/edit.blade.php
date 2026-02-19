<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="space-y-6">
                
                <!-- Update profile name and email -->
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border-l-4 border-[#7FA82E] transition-all duration-300 hover:shadow-[0_0_5px_#7FA82E]">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Update Password Section-->
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border-l-4 border-[#1F5B38] transition-all duration-300 hover:shadow-[0_0_5px_#1F5B38]">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- Delete Account Section -->
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border-4 border-red-700">
                    <div class="w-full">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>