<!-- This is the order confirmation page that is shown after a user successfully places an order. 
    It displays a confirmation message, a summary of the order, and options to continue shopping or go to the dashboard.
-->

<x-layout>
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8 flex items-center justify-center"> <!-- Container to center the content on the page -->
        
        <div class="max-w-3xl w-full bg-white dark:bg-[#1a2920] rounded-3xl shadow-2xl border border-gray-100 dark:border-[#2a4535] p-8 md:p-12 relative overflow-hidden transition-colors duration-300">
            
            <div class="text-center mb-8">
                <div class="w-20 h-20 bg-green-100 dark:bg-[#7FA82E]/20 rounded-full flex items-center justify-center mx-auto mb-4 animate-bounce">
                    <svg class="w-10 h-10 text-[#7FA82E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 dark:text-white mb-2">
                    Order Confirmed!
                </h1>
                <p class="text-gray-600 dark:text-gray-300">
                    Thank you for your purchase. Your order <span class="font-bold text-[#7FA82E]">#{{ $order->order_id }}</span> has been placed.
                </p>
            </div>

            <div class="bg-gray-50 dark:bg-[#121e16] rounded-2xl p-6 border border-gray-100 dark:border-[#2a4535] mb-8">
                <h2 class="text-lg font-bold text-gray-900 dark:text-white mb-4 border-b border-gray-200 dark:border-[#2a4535] pb-2">
                    Order Summary
                </h2>
                
                <div class="space-y-4">
                    @foreach($order->items as $item)
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-4">
                                <div class="w-14 h-14 bg-white dark:bg-[#1a2920] rounded-xl overflow-hidden border border-gray-100 dark:border-[#2a4535] flex-shrink-0 flex items-center justify-center">
                                    @if($item->product->product_image) <!-- Check if the product has an image -->
                                        <img src="{{ asset($item->product->product_image) }}" class="w-full h-full object-contain p-1" alt="{{ $item->product->product_name }}">
                                    @else
                                        <div class="text-xs text-gray-400">No Img</div>
                                    @endif
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900 dark:text-white text-sm sm:text-base">{{ $item->product->product_name }}</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Qty: {{ $item->order_item_quantity }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-[#7FA82E]">£{{ number_format($item->order_item_quantity * $item->order_item_price, 2) }}</p> <!-- Total price for this item -->
                                <p class="text-xs text-gray-400">£{{ number_format($item->order_item_price, 2) }} ea</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6 pt-4 border-t border-gray-200 dark:border-[#2a4535] flex justify-between items-center">
                    <span class="text-lg font-bold text-gray-900 dark:text-white">Total Amount</span>
                    <span class="text-2xl font-extrabold text-[#7FA82E]">
                        £{{ number_format($order->items->sum(fn($i) => $i->order_item_quantity * $i->order_item_price), 2) }} <!-- Total amount for the entire order -->
                    </span>
                </div>
            </div>
            <!-- Buttons to continue shopping or go to the dashboard -->
            <div class="text-center space-y-3">
                <a href="{{ route('shop.index') }}" class="block w-full bg-[#7FA82E] hover:bg-[#6d9126] text-white font-bold py-4 rounded-full shadow-lg hover:shadow-[#7FA82E]/40 hover:-translate-y-1 transition-all duration-300">
                    Continue Shopping
                </a>
                <a href="{{ route('dashboard') }}" class="block text-sm font-semibold text-gray-500 dark:text-gray-400 hover:text-[#7FA82E] dark:hover:text-[#7FA82E] transition-colors">
                    Go to Dashboard
                </a>
            </div>

        </div>
    </div>
</x-layout>