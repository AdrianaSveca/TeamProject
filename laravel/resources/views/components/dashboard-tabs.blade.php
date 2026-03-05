<!-- This component is used in the dashboard views to provide a consistent navigation experience across all dashboard pages. 
    It highlights the active tab based on the current route, making it easy for users to see which section they are currently viewing. 
-->

<div class="bg-white dark:bg-[#2B332A] shadow-lg rounded-3xl border border-gray-100 dark:border-[#3d4a3b] mb-8 overflow-hidden transition-colors duration-300">
    <div class="">
        <nav class="-mb-px flex space-x-8 px-6 overflow-x-auto no-scrollbar" aria-label="Tabs"> <!-- Using negative margin to pull the border up. The no-scrollbar class is used to hide the scrollbar while still allowing horizontal scrolling on smaller screens. -->
            
            <!-- Each link checks if the current route matches its own route using request()->routeIs(). If it does, it applies the active styles (green border and text). If not, it applies the default styles with hover effects. -->
            <a href="{{ route('dashboard') }}"
               class="group whitespace-nowrap py-5 px-1 border-b-4 font-bold text-sm flex items-center gap-2 transition-all duration-200
               {{ request()->routeIs('dashboard') 
                    ? 'border-[#7FA82E] text-[#7FA82E]' 
                    : 'border-transparent text-gray-500 dark:text-gray-300 hover:text-[#7FA82E] dark:hover:text-[#7FA82E] hover:border-gray-300 dark:hover:border-[#7FA82E]/50' }}">
                
                <svg class="w-5 h-5 {{ request()->routeIs('dashboard') ? 'text-[#7FA82E]' : 'text-gray-400 dark:text-gray-400 group-hover:text-[#7FA82E]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Overview
            </a>

            <a href="{{ route('dashboard.active-orders') }}" 
               class="group whitespace-nowrap py-5 px-1 border-b-4 font-bold text-sm flex items-center gap-2 transition-all duration-200
               {{ request()->routeIs('dashboard.active-orders') 
                    ? 'border-[#7FA82E] text-[#7FA82E]' 
                    : 'border-transparent text-gray-500 dark:text-gray-300 hover:text-[#7FA82E] dark:hover:text-[#7FA82E] hover:border-gray-300 dark:hover:border-[#7FA82E]/50' }}">
                
                <svg class="w-5 h-5 {{ request()->routeIs('dashboard.active-orders') ? 'text-[#7FA82E]' : 'text-gray-400 dark:text-gray-400 group-hover:text-[#7FA82E]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                Active Orders
            </a>

            <a href="{{ route('dashboard.order-history') }}" 
               class="group whitespace-nowrap py-5 px-1 border-b-4 font-bold text-sm flex items-center gap-2 transition-all duration-200
               {{ request()->routeIs('dashboard.order-history') 
                    ? 'border-[#7FA82E] text-[#7FA82E]' 
                    : 'border-transparent text-gray-500 dark:text-gray-300 hover:text-[#7FA82E] dark:hover:text-[#7FA82E] hover:border-gray-300 dark:hover:border-[#7FA82E]/50' }}">
                
                <svg class="w-5 h-5 {{ request()->routeIs('dashboard.order-history') ? 'text-[#7FA82E]' : 'text-gray-400 dark:text-gray-400 group-hover:text-[#7FA82E]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Order History
            </a>

            <a href="{{ route('dashboard.track-order') }}" 
               class="group whitespace-nowrap py-5 px-1 border-b-4 font-bold text-sm flex items-center gap-2 transition-all duration-200
               {{ request()->routeIs('dashboard.track-order') 
                    ? 'border-[#7FA82E] text-[#7FA82E]' 
                    : 'border-transparent text-gray-500 dark:text-gray-300 hover:text-[#7FA82E] dark:hover:text-[#7FA82E] hover:border-gray-300 dark:hover:border-[#7FA82E]/50' }}">
                
                <svg class="w-5 h-5 {{ request()->routeIs('dashboard.track-order') ? 'text-[#7FA82E]' : 'text-gray-400 dark:text-gray-400 group-hover:text-[#7FA82E]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                Track Order
            </a>

            <a href="{{ route('dashboard.chatbot') }}" 
               class="group whitespace-nowrap py-5 px-1 border-b-4 font-bold text-sm flex items-center gap-2 transition-all duration-200
               {{ request()->routeIs('dashboard.chatbot') 
                    ? 'border-[#7FA82E] text-[#7FA82E]' 
                    : 'border-transparent text-gray-500 dark:text-gray-300 hover:text-[#7FA82E] dark:hover:text-[#7FA82E] hover:border-gray-300 dark:hover:border-[#7FA82E]/50' }}">
                
                <svg class="w-5 h-5 {{ request()->routeIs('dashboard.chatbot') ? 'text-[#7FA82E]' : 'text-gray-400 dark:text-gray-400 group-hover:text-[#7FA82E]' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                Personal Trainer
            </a>

        </nav>
    </div>
</div>