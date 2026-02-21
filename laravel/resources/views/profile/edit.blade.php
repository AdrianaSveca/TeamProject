<!-- This page allows users to edit their profile information, update their password, and manage account settings. 
    The page is structured into three main sections: Update Profile Information, Update Password, and Delete Account. 
    These sections are already included with Laravel's built-in profile management components. -->

<x-layout>
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto space-y-8">
            
            <div class="mb-8">
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white">
                    Account <span class="text-[#7FA82E]">Settings</span>
                </h1>
                <p class="mt-2 text-gray-600 dark:text-gray-400 text-lg">
                    Manage your profile information and security settings.
                </p>
            </div>

            <div class="space-y-8">
                <!-- Update Profile Information Section -->
                <div class="p-8 bg-white dark:bg-[#1a2920] shadow-lg rounded-3xl border-l-4 border-[#7FA82E] dark:border-[#7FA82E] transition-all duration-300 hover:shadow-xl relative overflow-hidden">
                    <div class="relative z-10 max-w-xl">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                            <svg class="w-6 h-6 text-[#7FA82E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </h2>
                        
                        @include('profile.partials.update-profile-information-form')
                    </div>
                    
                    <div class="absolute top-4 right-4 text-[#7FA82E]/5 dark:text-[#7FA82E]/10 pointer-events-none">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    </div>
                </div>
                <!-- Update Password Section -->
                <div class="p-8 bg-white dark:bg-[#1a2920] shadow-lg rounded-3xl border-l-4 border-[#1F5B38] dark:border-[#2a4535] transition-all duration-300 hover:shadow-xl relative overflow-hidden">
                    <div class="relative z-10 max-w-xl">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                            <svg class="w-6 h-6 text-[#1F5B38] dark:text-[#7FA82E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </h2>

                        @include('profile.partials.update-password-form')
                    </div>

                     <div class="absolute top-4 right-4 text-[#1F5B38]/5 dark:text-[#7FA82E]/10 pointer-events-none">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
                    </div>
                </div>
                <!-- Delete Account Section -->
                 <div class="p-8 bg-white dark:bg-[#1a2920] shadow-lg rounded-3xl border-l-4 border-red-600 transition-all duration-300 hover:shadow-xl relative overflow-hidden">
                    <div class="relative z-10 max-w-xl">
                        <h2 class="text-xl font-bold text-red-600 mb-4 flex items-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </h2>

                        @include('profile.partials.delete-user-form')
                    </div>
                    
                    <div class="absolute top-4 right-4 text-red-600/5 dark:text-red-600/10 pointer-events-none">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </div>
                <div class="p-8 bg-white dark:bg-[#1a2920] shadow-lg rounded-3xl border-l-4 border-red-600 transition-all duration-300 hover:shadow-xl relative overflow-hidden">
                    <div class="relative z-10 w-full">
                        <h2 class="text-xl font-bold text-red-600 mb-4 flex items-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </h2>

                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>