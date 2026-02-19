<!-- This view displays the details of a specific order, including the items ordered, their quantities, prices, and the total amount paid. 
    It also provides a link to contact support if the user has any issues with the order.
    We can access this page by clicking the "View Details" link on an order in the Active Orders or Order History pages inside the Dashboard.
-->

<x-layout>
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-5xl mx-auto">
            
            <div class="mb-8"> <!-- Back link to the active orders page -->
                <a href="{{ route('dashboard.active-orders') }}" class="inline-flex items-center text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-[#7FA82E] dark:hover:text-[#7FA82E] transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Active Orders
                </a>
            </div>

            <div class="bg-white dark:bg-[#1a2920] rounded-3xl shadow-2xl border border-gray-100 dark:border-[#2a4535] overflow-hidden transition-colors duration-300">
                
                <div class="px-8 py-8 border-b border-gray-100 dark:border-[#2a4535] flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-gray-50/50 dark:bg-[#121e16]/30">
                    <div>
                        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">
                            Order <span class="text-[#7FA82E]">#{{ $order->order_id }}</span>
                        </h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1 flex items-center gap-2">
                            <i class="fa fa-calendar-o"></i> 
                            Placed on {{ \Carbon\Carbon::parse($order->order_date)->format('F d, Y') }} <!-- Formatting the order date to a more readable format -->
                        </p>
                    </div>
                    <div> <!-- Displaying the order status with different colors for Delivered and other statuses -->
                        <span class="px-5 py-2 rounded-full text-sm font-bold uppercase tracking-wide border  
                            {{ $order->order_status === 'Delivered' 
                                ? 'bg-green-100 text-green-800 border-green-200 dark:bg-green-900/30 dark:text-green-300 dark:border-green-800' 
                                : 'bg-blue-100 text-blue-800 border-blue-200 dark:bg-blue-900/30 dark:text-blue-300 dark:border-blue-800' }}">
                            {{ $order->order_status }}
                        </span>
                    </div>
                </div>

                <div class="p-8">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6 uppercase tracking-wider text-sm">Items Ordered</h3>
                    
                    <div class="space-y-6"> <!-- Looping through each item in the order and displaying its details -->
                        @foreach($order->items as $item)
                            <div class="flex flex-col sm:flex-row items-center gap-6 border-b border-gray-100 dark:border-[#2a4535] pb-6 last:border-0 last:pb-0">
                                
                                <div class="w-20 h-20 flex-shrink-0 bg-gray-50 dark:bg-[#121e16] rounded-xl overflow-hidden border border-gray-100 dark:border-[#2a4535] flex items-center justify-center">
                                    @if($item->product && $item->product->product_image)
                                        <img src="{{ asset($item->product->product_image) }}" class="w-full h-full object-contain p-1" alt="{{ $item->product->product_name }}">
                                    @else
                                        <span class="text-xs text-gray-400">No Img</span>
                                    @endif
                                </div>

                                <div class="flex-1 text-center sm:text-left">
                                    <h4 class="text-lg font-bold text-gray-900 dark:text-white">
                                        {{ $item->product ? $item->product->product_name : 'Unknown Product' }}
                                    </h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Unit Price: £{{ number_format($item->order_item_price, 2) }}
                                    </p>
                                </div>

                                <div class="text-center sm:text-right">
                                    <p class="text-gray-500 dark:text-gray-400 text-sm mb-1">Quantity: <span class="font-bold text-gray-900 dark:text-white">{{ $item->order_item_quantity }}</span></p>
                                    <p class="text-xl font-bold text-[#7FA82E]">
                                        £{{ number_format($item->order_item_price * $item->order_item_quantity, 2) }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-gray-50 dark:bg-[#15201a] px-8 py-8 border-t border-gray-100 dark:border-[#2a4535]"> <!-- Order summary section displaying the subtotal, shipping cost, and total paid -->
                    <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                        
                        <div class="text-center md:text-left">
                            <p class="text-sm text-gray-500 dark:text-gray-400">Need help with this order?</p>
                            <a href="{{ route('contact.index') }}" class="text-sm font-bold text-[#7FA82E] hover:underline">Contact Support</a>
                        </div>

                        <div class="w-full md:w-1/3 space-y-3">
                            <div class="flex justify-between text-gray-600 dark:text-gray-400 text-sm">
                                <span>Subtotal</span>
                                <span>£{{ number_format($order->order_total, 2) }}</span>
                            </div>
                            <div class="flex justify-between text-gray-600 dark:text-gray-400 text-sm">
                                <span>Shipping</span>
                                <span class="text-[#7FA82E] font-medium">Free</span>
                            </div>
                            <div class="flex justify-between text-xl font-extrabold text-gray-900 dark:text-white border-t border-gray-200 dark:border-[#2a4535] pt-3 mt-3">
                                <span>Total Paid</span>
                                <span class="text-[#7FA82E]">£{{ number_format($order->order_total, 2) }}</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout>