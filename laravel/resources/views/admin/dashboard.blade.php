<!-- This is the admin dashboard view -->
<x-layout>
    @auth
        <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                
                <div class="bg-white dark:bg-[#1a2920] overflow-hidden shadow-2xl rounded-3xl border border-gray-100 dark:border-[#2a4535] transition-colors duration-300">
                    <div class="p-8 md:p-12">
                        
                        <div class="flex items-center gap-6 mb-8">
                            <div class="w-16 h-16 rounded-full bg-[#7FA82E]/10 flex items-center justify-center border border-[#7FA82E]/20"> <!-- Admin  Settings Icon. Dividing by 20 the border color is to define the colour's transparency to 20% (80% opacity) -->
                                <svg class="w-8 h-8 text-[#7FA82E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            
                            <div>
                                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">
                                    Admin <span class="text-[#7FA82E]">Dashboard</span>
                                </h2>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">Control Panel</p>
                            </div>
                        </div>

                        <div class="bg-gray-50 dark:bg-[#121e16] rounded-2xl p-6 border border-gray-100 dark:border-[#2a4535]">
                            <p class="text-xl text-gray-800 dark:text-gray-200">
                                Hi, <span class="font-bold text-[#7FA82E]">{{ Auth::user()->name }}</span>!
                            </p>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">
                                Welcome to your administration area.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endauth
</x-layout>