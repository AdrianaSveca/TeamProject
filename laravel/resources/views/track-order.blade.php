<!-- This is the public track order page. Anyone can enter their order ID and email to see the order status without logging in. The page shows either the tracking form, the order result (status and total), or a generic “not found” message. -->

<x-layout>
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <div class="absolute top-0 right-0 w-64 h-64 bg-[#7FA82E] rounded-full blur-[80px] opacity-10 pointer-events-none"></div>

            <section class="text-center mb-10 relative z-10">
                <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-2">
                    Track Your <span class="text-[#7FA82E]">Order</span>
                </h1>
                <p class="text-gray-600 dark:text-gray-400">
                    Enter your Order ID and email to see your order status.
                </p>
            </section>

            @if(!$order && !$error)
                <div class="bg-white dark:bg-[#1a2920] rounded-3xl shadow-xl border border-gray-100 dark:border-[#2a4535] p-8 relative z-10 transition-colors duration-300">
                    <form action="{{ route('track-order.lookup') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="order_id" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Order ID</label>
                            <input type="number" name="order_id" id="order_id" required min="1" placeholder="e.g. 1"
                                   class="w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                            @error('order_id')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Email</label>
                            <input type="email" name="email" id="email" required placeholder="your@email.com"
                                   class="w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                            @error('email')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                        </div>
                        <button type="submit" class="w-full bg-[#7FA82E] hover:bg-[#6d9126] text-white font-bold py-3 rounded-full transition shadow-lg">
                            Track Order
                        </button>
                    </form>
                </div>
            @endif

            @if($error)
                <div class="bg-white dark:bg-[#1a2920] rounded-3xl shadow-xl border border-gray-100 dark:border-[#2a4535] p-8 relative z-10 transition-colors duration-300">
                    <div class="text-center py-4">
                        <p class="text-gray-600 dark:text-gray-400 mb-6">{{ $error }}</p>
                        <a href="{{ route('track-order.form') }}" class="inline-flex items-center justify-center rounded-full bg-[#7FA82E] px-6 py-2.5 text-sm font-semibold text-white hover:bg-[#6d9126] transition">Try Again</a>
                    </div>
                </div>
            @endif

            @if($order)
                <div class="bg-white dark:bg-[#1a2920] rounded-3xl shadow-xl border border-gray-100 dark:border-[#2a4535] overflow-hidden relative z-10 transition-colors duration-300">
                    <div class="px-8 py-6 border-b border-gray-100 dark:border-[#2a4535] flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-gray-50/50 dark:bg-[#121e16]/30">
                        <div>
                            <h2 class="text-2xl font-extrabold text-gray-900 dark:text-white">Order <span class="text-[#7FA82E]">#{{ $order->order_id }}</span></h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Placed on {{ \Carbon\Carbon::parse($order->order_date)->format('F d, Y') }}</p>
                        </div>
                        <span class="px-5 py-2 rounded-full text-sm font-bold uppercase tracking-wide border
                            {{ $order->order_status === 'Delivered' ? 'bg-green-100 text-green-800 border-green-200 dark:bg-green-900/30 dark:text-green-300 dark:border-green-800' : 'bg-blue-100 text-blue-800 border-blue-200 dark:bg-blue-900/30 dark:text-blue-300 dark:border-blue-800' }}">
                            {{ $order->order_status }}
                        </span>
                    </div>
                    <div class="p-8">
                        <div class="flex justify-between items-center text-lg font-bold text-gray-900 dark:text-white mb-4">
                            <span>Total</span>
                            <span class="text-[#7FA82E]">£{{ number_format($order->order_total, 2) }}</span>
                        </div>
                        <a href="{{ route('track-order.form') }}" class="text-sm font-semibold text-[#7FA82E] hover:underline">Track another order</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-layout>
