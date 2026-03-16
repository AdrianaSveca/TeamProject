<!-- This is the dashboard track order page. Logged-in users can enter their order ID here to jump directly to that order’s details page. If the order is not found for their account, an error message is shown. -->

<x-layout>
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="mb-8">
                <x-dashboard-tabs />
            </div>

            <div class="max-w-xl mx-auto">
                <div class="bg-white dark:bg-[#1a2920] rounded-3xl shadow-xl border border-gray-100 dark:border-[#2a4535] p-8 transition-colors duration-300">
                    <h2 class="text-2xl font-extrabold text-gray-900 dark:text-white mb-2 flex items-center gap-3">
                        <span class="w-2 h-8 bg-[#7FA82E] rounded-full"></span>
                        Track <span class="text-[#7FA82E]">Order</span>
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">Enter your Order ID to view its status and details.</p>

                    @if(session('track_order_error') || isset($error))
                        <div class="mb-6 p-4 rounded-xl bg-red-50 dark:bg-red-900/20 border border-red-100 dark:border-red-800 text-red-700 dark:text-red-300 text-sm">
                            {{ session('track_order_error') ?? ($error ?? '') }}
                        </div>
                    @endif

                    <form action="{{ route('dashboard.track-order.lookup') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="order_id" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Order ID</label>
                            <input type="number" name="order_id" id="order_id" required min="1" placeholder="e.g. 1"
                                   class="w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                            @error('order_id')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                        </div>
                        <button type="submit" class="w-full bg-[#7FA82E] hover:bg-[#6d9126] text-white font-bold py-3 rounded-full transition shadow-lg">
                            View Order
                        </button>
                    </form>

                    <p class="mt-6 text-sm text-gray-500 dark:text-gray-400">
                        You can also see all orders under <a href="{{ route('dashboard.active-orders') }}" class="text-[#7FA82E] font-semibold hover:underline">Active Orders</a> or <a href="{{ route('dashboard.order-history') }}" class="text-[#7FA82E] font-semibold hover:underline">Order History</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
