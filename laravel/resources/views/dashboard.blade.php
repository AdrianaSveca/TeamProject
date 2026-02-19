<!-- This is the Dashboard page for the logged in WELLTH clients, providing users with an overview of their account, orders, and wellness progress. -->


<x-layout>
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Nav bar of dashboard -->
            <div class="mb-8">
                <x-dashboard-tabs />
            </div>
            <!-- Welcome with user name -->
            <div class="bg-[#2B332A] dark:bg-[#1a2920] rounded-3xl shadow-xl p-8 mb-10 text-white flex flex-col md:flex-row justify-between items-center relative overflow-hidden border border-gray-700 dark:border-[#2a4535]">
                <div class="absolute top-0 right-0 w-64 h-64 bg-[#7FA82E] rounded-full blur-[80px] opacity-10 pointer-events-none"></div>
                
                <div class="relative z-10 text-center md:text-left mb-6 md:mb-0">
                    <h2 class="text-3xl md:text-4xl font-extrabold mb-2">Welcome back, <span class="text-[#7FA82E]">{{ Auth::user()->name }}</span>!</h2>
                    <p class="text-gray-300 text-lg">Here is what’s happening with your wellness journey today.</p>
                </div>
                <div class="relative z-10">
                    <a href="/shop" class="inline-flex items-center justify-center bg-[#7FA82E] hover:bg-[#6d9126] text-white font-bold py-3 px-8 rounded-full transition-all duration-300 shadow-lg hover:shadow-[#7FA82E]/40 hover:-translate-y-1">
                        Browse Shop
                    </a>
                </div>
            </div>
            <!-- Dashboard Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <!-- Orders button -->
                <div class="bg-white dark:bg-[#1a2920] rounded-2xl p-6 shadow-lg border-l-4 border-[#7FA82E] dark:border-[#7FA82E] transition-all duration-300 hover:shadow-xl hover:-translate-y-1 group">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Active Orders</p>
                            <p class="text-4xl font-extrabold text-gray-900 dark:text-white mt-1">{{ $activeCount }}</p>
                        </div>
                        <div class="p-3 bg-green-50 dark:bg-[#7FA82E]/10 rounded-full group-hover:bg-[#7FA82E] transition-colors duration-300">
                            <svg class="w-8 h-8 text-[#7FA82E] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('dashboard.active-orders') }}" class="text-sm font-bold text-[#7FA82E] hover:underline flex items-center gap-1">
                            Track Shipments <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
                <!-- Quiz button -->
                <div class="bg-white dark:bg-[#1a2920] rounded-2xl p-6 shadow-lg border-l-4 border-[#1F5B38] dark:border-[#2a4535] transition-all duration-300 hover:shadow-xl hover:-translate-y-1 group">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Current Goal</p>
                            <p class="text-xl font-extrabold text-gray-900 dark:text-white mt-1 leading-tight">
                                {{ $lastBMI ? $lastBMI->bmi_feedback : 'No Data' }}
                            </p>
                        </div>
                        <div class="p-3 bg-gray-100 dark:bg-gray-700/30 rounded-full group-hover:bg-[#1F5B38] transition-colors duration-300">
                            <svg class="w-8 h-8 text-[#1F5B38] dark:text-gray-300 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                    </div>
                    <div>
                        @if($lastBMI)
                            <a href="{{ route('quiz.results') }}" class="text-sm font-bold text-[#1F5B38] dark:text-gray-300 hover:underline flex items-center gap-1">
                                View Progress <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        @else
                            <a href="{{ route('quiz.index') }}" class="text-sm font-bold text-[#1F5B38] dark:text-[#7FA82E] hover:underline flex items-center gap-1">
                                Take the Quiz <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        @endif
                    </div>
                </div>
                <!-- Chatbot -->
                <div class="bg-white dark:bg-[#1a2920] rounded-2xl p-6 shadow-lg border-l-4 border-blue-600 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 group">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <p class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Need Help?</p>
                            <p class="text-xl font-extrabold text-gray-900 dark:text-white mt-1">Personal Trainer</p>
                        </div>
                        <div class="p-3 bg-blue-50 dark:bg-blue-900/20 rounded-full group-hover:bg-blue-600 transition-colors duration-300">
                            <svg class="w-8 h-8 text-blue-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('dashboard.chatbot') }}" class="text-sm font-bold text-blue-600 hover:underline flex items-center gap-1">
                            Chat Now <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Latest orders of the user -->
            <div class="bg-white dark:bg-[#1a2920] rounded-3xl shadow-lg p-8 mb-12 border border-gray-100 dark:border-[#2a4535]">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Latest Order</h3>
                
                @if($lastOrder)
                    <div class="bg-gray-50 dark:bg-[#121e16] rounded-2xl p-6 flex flex-col md:flex-row justify-between items-center border border-gray-100 dark:border-[#2a4535] hover:shadow-md transition-shadow">
                        <div class="mb-4 md:mb-0 text-center md:text-left">
                            <p class="font-bold text-lg text-gray-900 dark:text-white">Order #{{ $lastOrder->order_id }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Placed on {{ \Carbon\Carbon::parse($lastOrder->order_date)->format('M d, Y') }}</p>
                        </div>
                        
                        <div class="mb-4 md:mb-0">
                            <span class="px-4 py-2 rounded-full text-xs font-bold uppercase tracking-wider
                                {{ $lastOrder->order_status === 'Delivered' 
                                    ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300' 
                                    : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300' }}">
                                {{ $lastOrder->order_status }}
                            </span>
                        </div>
                        
                        <div class="text-center md:text-right">
                            <p class="text-xl font-extrabold text-[#7FA82E]">£{{ number_format($lastOrder->order_total, 2) }}</p>
                            <a href="{{ route('dashboard.order-details', $lastOrder->order_id) }}" class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-[#7FA82E] dark:hover:text-[#7FA82E] hover:underline transition-colors">
                                View Details
                            </a>
                        </div>
                    </div>
                @else
                    <div class="text-center py-8">
                        <p class="text-gray-500 dark:text-gray-400 italic mb-4">You haven't placed any orders yet.</p>
                        <a href="{{ route('shop.index') }}" class="text-[#7FA82E] font-bold hover:underline">Start Shopping</a>
                    </div>
                @endif
            </div>
            <!-- Account Settings (same as in edit.blade.php, the profile page link that appears clicking user's name) -->
            <div class="space-y-8">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white px-2">Account Settings</h3>

                <div class="p-6 sm:p-8 bg-white dark:bg-[#1a2920] shadow-lg sm:rounded-3xl border-l-4 border-[#7FA82E] dark:border-[#7FA82E] transition-all duration-300 hover:shadow-xl">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-6 sm:p-8 bg-white dark:bg-[#1a2920] shadow-lg sm:rounded-3xl border-l-4 border-[#1F5B38] dark:border-[#2a4535] transition-all duration-300 hover:shadow-xl">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-6 sm:p-8 bg-white dark:bg-[#1a2920] shadow-lg sm:rounded-3xl border-l-4 border-red-600 transition-all duration-300 hover:shadow-xl">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layout>