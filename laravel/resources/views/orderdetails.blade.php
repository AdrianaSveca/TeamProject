<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- This is the button to go back -->
            <div class="mb-6">
                <a href="{{ route('dashboard.active-orders') }}" class="text-gray-500 hover:text-[#2B332A] flex items-center gap-2">
                    &larr; Back to Active Orders
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                
                <!-- Order header -->
                <div class="flex justify-between items-start border-b pb-6 mb-6">
                    <div>
                        <h1 class="text-3xl font-bold text-[#2B332A]">Order #{{ $order->order_id }}</h1>
                        <p class="text-gray-500 mt-1">Placed on {{ \Carbon\Carbon::parse($order->order_date)->format('F d, Y') }}</p>
                    </div>
                    <div>
                        <span class="px-4 py-2 rounded-full text-sm font-bold 
                            {{ $order->order_status === 'Delivered' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ $order->order_status }}
                        </span>
                    </div>
                </div>

                <!-- Items table -->
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Items in this Order</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm whitespace-nowrap">
                        <thead class="bg-gray-50 uppercase tracking-wider border-b">
                            <tr>
                                <th class="px-6 py-4 font-semibold text-gray-700">Product</th>
                                <th class="px-6 py-4 font-semibold text-gray-700">Price</th>
                                <th class="px-6 py-4 font-semibold text-gray-700">Qty</th>
                                <th class="px-6 py-4 font-semibold text-gray-700 text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($order->items as $item)
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            {{-- Product Image --}}
                                            <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-md border border-gray-200 bg-gray-100">
                                                @if($item->product && $item->product->product_image)
                                                    <img src="{{ asset($item->product->product_image) }}" class="h-full w-full object-contain object-center">
                                                @else
                                                    <span class="flex h-full items-center justify-center text-gray-400 text-xs">No Img</span>
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="font-medium text-gray-900">
                                                    {{ $item->product ? $item->product->product_name : 'Unknown Product' }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">£{{ number_format($item->order_item_price, 2) }}</td>
                                    <td class="px-6 py-4 text-gray-600">x{{ $item->order_item_quantity }}</td>
                                    <td class="px-6 py-4 text-right font-bold text-[#7FA82E]">
                                        £{{ number_format($item->order_item_price * $item->order_item_quantity, 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Price breakdown -->
                <div class="mt-8 border-t pt-6 flex justify-end">
                    <div class="w-full md:w-1/3">
                        <div class="flex justify-between text-base font-medium text-gray-900 mb-2">
                            <p>Subtotal</p>
                            <p>£{{ number_format($order->order_total, 2) }}</p>
                        </div>
                        <div class="flex justify-between text-sm text-gray-500 mb-4">
                            <p>Shipping</p>
                            <p>Free</p>
                        </div>
                        <div class="flex justify-between text-xl font-bold text-[#2B332A] border-t pt-4">
                            <p>Total Paid</p>
                            <p>£{{ number_format($order->order_total, 2) }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout>