<x-layout>
    <div class="max-w-4xl mx-auto py-12">
        <h1 class="text-3xl font-bold text-[#1f5b38] mb-8">Checkout</h1>

        @if($basket && $basket->items->count() > 0)

            @php
                $hasStockIssues = $basket->items->contains(fn($item) => $item->basket_item_quantity > $item->product->product_stock_level);
            @endphp

            <div class="bg-white p-8 rounded-2xl shadow-sm">
                <h2 class="text-xl font-bold mb-4">Review Your Items</h2>

                <ul class="space-y-4">
                    @foreach($basket->items as $item)
                        <li class="flex justify-between border-b pb-2">
                            <div>
                                <span class="font-semibold">{{ $item->product->product_name }}</span> x {{ $item->basket_item_quantity }}
                            </div>
                            <div>£{{ number_format($item->basket_item_quantity * $item->basket_item_price, 2) }}</div>
                        </li>
                    @endforeach
                </ul>

                <div class="flex justify-between mt-6 text-lg font-bold">
                    <span>Total:</span>
                    <span>£{{ number_format($basket->items->sum(fn($i) => $i->basket_item_quantity * $i->basket_item_price), 2) }}</span>
                </div>

                @if($hasStockIssues)
                    <p class="mt-4 text-sm text-red-500">
                        Some items exceed available stock. Please adjust your basket before placing the order.
                    </p>
                @endif

                <form action="{{ route('orders.place') }}" method="POST" class="mt-6">
                    @csrf
                    <button type="submit" 
                            class="w-full bg-[#1f5b38] text-white font-bold py-4 rounded-xl hover:bg-[#7FA82E] hover:text-[#1f5b38] transition"
                            {{ $hasStockIssues ? 'disabled' : '' }}>
                        Place Order
                    </button>
                </form>

                <div class="mt-4 text-center">
                    <a href="{{ route('basket.index') }}" class="text-sm text-gray-500 hover:text-[#1f5b38] underline">
                        Back to Basket
                    </a>
                </div>
            </div>

        @else
            <p>Your basket is empty.</p>
        @endif
    </div>
</x-layout>
