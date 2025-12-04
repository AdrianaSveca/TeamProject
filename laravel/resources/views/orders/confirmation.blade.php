<!-- This is the order confirmation page that displays the order details after a successful purchase. It shows the order ID, a summary of purchased items, their quantities, individual prices, and the total amount. There's also a button to continue shopping. -->
<x-layout>
    <div class="bg-gray-50 min-h-screen py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-2xl shadow-md">
                <h1 class="text-3xl font-bold text-[#1f5b38] mb-4">Order Confirmation</h1>
                <p class="text-gray-700 mb-6">
                    Thank you for your purchase! Your order <span class="font-bold">#{{ $order->order_id }}</span> has been placed.
                </p>

                <h2 class="text-xl font-bold mb-2">Order Summary</h2>
                <div class="divide-y divide-gray-200 mb-6"> <!-- Loop through order items -->
                    @foreach($order->items as $item)
                        <div class="flex justify-between py-4 items-center">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 bg-gray-100 rounded-xl overflow-hidden">
                                    @if($item->product->product_image)
                                        <img src="{{ asset($item->product->product_image) }}" class="w-full h-full object-cover" alt="{{ $item->product->product_name }}"> <!-- Product Image -->
                                    @else
                                        <div class="flex items-center justify-center w-full h-full text-gray-400 text-xs">No Image</div>
                                    @endif
                                </div>
                                <div>
                                    <p class="font-bold">{{ $item->product->product_name }}</p>
                                    <p class="text-sm text-gray-500">Qty: {{ $item->order_item_quantity }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-bold">£{{ number_format($item->order_item_quantity * $item->order_item_price, 2) }}</p> <!-- Total price for this item -->
                                <p class="text-xs text-gray-400">£{{ number_format($item->order_item_price, 2) }} each</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="flex justify-between text-gray-900 font-bold text-lg">
                    <span>Total</span>
                    <span>£{{ number_format($order->items->sum(fn($i) => $i->order_item_quantity * $i->order_item_price), 2) }}</span> <!-- Total order amount -->
                </div>

                <div class="mt-8 text-center">
                    <a href="{{ route('shop.index') }}" class="inline-block bg-[#1f5b38] text-white font-bold py-3 px-8 rounded-xl hover:bg-[#7FA82E] hover:text-[#1f5b38] transition">
                        Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>