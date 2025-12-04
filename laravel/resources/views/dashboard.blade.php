<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Nav bar of dashboard -->
            <x-dashboard-tabs />

            <!-- Welcome with user name -->
            <div class="bg-[#2B332A] rounded-lg shadow-lg p-6 mb-8 text-white flex justify-between items-center">
                <div>
                    <h2 class="text-3xl font-bold">Welcome back, {{ Auth::user()->name }}!</h2>
                    <p class="text-gray-300 mt-1">Here is what’s happening with your wellness journey today.</p>
                </div>
                <div class="hidden md:block">
                    <a href="/shop" class="bg-[#7FA82E] hover:bg-[#6d9126] text-white font-bold py-2 px-6 rounded-full transition">
                        Browse Shop
                    </a>
                </div>
            </div>

            <!-- Dashboard Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Orders button -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-[#7FA82E]">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Active Orders</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $activeCount }}</p>
                        </div>
                        <div class="p-3 bg-green-50 rounded-full">
                            <svg class="w-8 h-8 text-[#7FA82E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('dashboard.active-orders') }}" class="text-sm text-[#7FA82E] font-bold hover:underline">Track Shipments &rarr;</a>
                    </div>
                </div>

                <!-- Quiz button -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-[#1F5B38]">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Current Goal</p>
                            <p class="text-xl font-bold text-gray-900">
                                {{ $lastBMI ? $lastBMI->bmi_feedback : 'No Data' }}
                            </p>
                        </div>
                        <div class="p-3 bg-gray-100 rounded-full">
                            <svg class="w-8 h-8 text-[#1F5B38]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        @if($lastBMI)
                            <a href="{{ route('quiz.results') }}" class="text-sm text-[#2B332A] font-bold hover:underline">View Progress &rarr;</a>
                        @else
                            <a href="{{ route('quiz.index') }}" class="text-sm text-[#1F5B38] font-bold hover:underline">Take the Quiz &rarr;</a>
                        @endif
                    </div>
                </div>

                <!-- Chatbot -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-blue-600">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Need Help?</p>
                            <p class="text-lg font-bold text-gray-900">Personal Trainer</p>
                        </div>
                        <div class="p-3 bg-blue-50 rounded-full">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('dashboard.chatbot') }}" class="text-sm text-blue-600 font-bold hover:underline">Chat Now &rarr;</a>
                    </div>
                </div>
            </div>

            <!-- Latest orders of the user -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-8">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Latest Order</h3>
                @if($lastOrder)
                    <div class="border rounded-lg p-4 flex flex-col md:flex-row justify-between items-center bg-gray-50">
                        <div class="mb-2 md:mb-0">
                            <p class="font-bold text-gray-800">Order #{{ $lastOrder->order_id }}</p>
                            <p class="text-sm text-gray-500">Placed on {{ \Carbon\Carbon::parse($lastOrder->order_date)->format('M d, Y') }}</p>
                        </div>
                        <div class="mb-2 md:mb-0">
                            <span class="px-3 py-1 rounded-full text-xs font-bold 
                                {{ $lastOrder->order_status === 'Delivered' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $lastOrder->order_status }}
                            </span>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-[#7FA82E]">£{{ number_format($lastOrder->order_total, 2) }}</p>
                            <a href="{{ route('dashboard.order-details', $lastOrder->order_id) }}" class="text-xs text-gray-500 hover:text-[#7FA82E] hover:underline">View Details</a>
                        </div>
                    </div>
                @else
                    <p class="text-gray-500 italic">You haven't placed any orders yet.</p>
                @endif
            </div>

            <!-- Account Settings (same as in edit.blade.php, the profile page link that appears clicking user's name) -->
            <div class="space-y-6">
                <h3 class="text-2xl font-bold text-gray-900">Account Settings</h3>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border-l-4 border-[#7FA82E] transition-all duration-300 hover:shadow-[0_0_5px_#7FA82E]">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                 <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border-l-4 border-[#1F5B38] transition-all duration-300 hover:shadow-[0_0_5px_#1F5B38]">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border-4 border-red-700">
                    <div class="w-full">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layout>