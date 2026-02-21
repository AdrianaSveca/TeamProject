<!-- This is the admin order details page. It displays the full details of a specific order including items, customer information, status, and total for admin review. -->

<x-layout>
    @auth
        <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
                    <a href="{{ route('admin.orders') }}" class="inline-flex items-center text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-[#7FA82E] transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Back to Orders
                    </a>
                </div>

                <div class="bg-white dark:bg-[#1a2920] rounded-3xl shadow-xl border border-gray-100 dark:border-[#2a4535] overflow-hidden transition-colors duration-300">
                    <div class="px-8 py-6 border-b border-gray-100 dark:border-[#2a4535] flex flex-col md:flex-row justify-between items-start md:items-center gap-4 bg-gray-50/50 dark:bg-[#121e16]/30">
                        <div>
                            <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">
                                Order <span class="text-[#7FA82E]">#{{ $order->order_id }}</span>
                            </h1>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1 flex items-center gap-2">
                                <i class="fa fa-calendar-o"></i> 
                                Placed on {{ \Carbon\Carbon::parse($order->order_date)->format('F d, Y') }}
                            </p>
                            @if($order->user)
                                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                    Customer: <span class="font-semibold text-gray-700 dark:text-gray-300">{{ $order->user->name }}</span> ({{ $order->user->email }})
                                </p>
                            @endif
                        </div>
                        <div>
                            <span class="px-5 py-2 rounded-full text-sm font-bold uppercase tracking-wide border  
                                {{ $order->order_status === 'Delivered' 
                                    ? 'bg-green-100 text-green-800 border-green-200 dark:bg-green-900/30 dark:text-green-300 dark:border-green-800' 
                                    : ($order->order_status === 'Shipped'
                                        ? 'bg-blue-100 text-blue-800 border-blue-200 dark:bg-blue-900/30 dark:text-blue-300 dark:border-blue-800'
                                        : 'bg-yellow-100 text-yellow-800 border-yellow-200 dark:bg-yellow-900/30 dark:text-yellow-300 dark:border-yellow-800') }}">
                                {{ $order->order_status }}
                            </span>
                        </div>
                    </div>

                    <div class="p-8">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-6 uppercase tracking-wider text-sm">Items Ordered</h3>
                        
                        <div class="space-y-6">
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

                    <div class="bg-gray-50 dark:bg-[#15201a] px-8 py-8 border-t border-gray-100 dark:border-[#2a4535]">
                        <div class="space-y-6">
                            <!-- Order Status Update Form -->
                            <div class="bg-white dark:bg-[#1a2920] rounded-xl p-6 border border-gray-200 dark:border-[#2a4535]">
                                @if(session('status'))
                                    <div class="mb-4 rounded-xl border border-emerald-200 bg-emerald-50 dark:bg-emerald-900/30 dark:border-emerald-800 px-4 py-3 text-sm text-emerald-800 dark:text-emerald-200">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Update Order Status</h4>
                                <form action="{{ route('admin.orders.update-status', $order->order_id) }}" method="POST" class="flex gap-4 items-end">
                                    @csrf
                                    <div class="flex-1">
                                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Status</label>
                                        <select name="order_status" required
                                                class="w-full rounded-lg border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#121e16] text-gray-900 dark:text-white focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                            <option value="Pending" {{ $order->order_status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="Shipped" {{ $order->order_status === 'Shipped' ? 'selected' : '' }}>Shipped</option>
                                            <option value="Delivered" {{ $order->order_status === 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="bg-[#7FA82E] hover:bg-[#6d9126] text-white font-bold py-3 px-6 rounded-lg transition-colors">
                                        Update Status
                                    </button>
                                </form>
                            </div>

                            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                                <div class="text-center md:text-left">
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Shipping Address</p>
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $order->order_address }}</p>
                                </div>

                                <div class="text-center md:text-right space-y-2">
                                    @php $orderSubtotal = $order->items->sum(fn($i) => $i->order_item_quantity * $i->order_item_price); @endphp
                                    @if(isset($order->order_discount) && $order->order_discount > 0)
                                        <div class="flex justify-between text-gray-600 dark:text-gray-400 text-sm">
                                            <span>Subtotal:</span>
                                            <span>£{{ number_format($orderSubtotal, 2) }}</span>
                                        </div>
                                        <div class="flex justify-between text-green-600 dark:text-green-400 text-sm">
                                            <span>Discount:</span>
                                            <span>−£{{ number_format($order->order_discount, 2) }}</span>
                                        </div>
                                    @endif
                                    <div class="flex justify-between items-center text-xl font-bold text-gray-900 dark:text-white pt-2 border-t border-gray-200 dark:border-[#2a4535]">
                                        <span>Total:</span>
                                        <span class="text-[#7FA82E]">£{{ number_format($order->order_total, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
</x-layout>
