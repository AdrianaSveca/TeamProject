<!-- This is the basket page where users can view and manage the items they have added to their shopping basket. It displays product details, allows quantity adjustments, and provides a summary of the order before proceeding to checkout. -->
<x-layout>
    <div class="bg-gray-50 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-[#1f5b38] mb-8">Your Basket</h1>

            @if($basket && $basket->items->count() > 0) <!-- Check if basket has items -->
                <div class="flex flex-col lg:flex-row gap-8">
                    
                    <div class="lg:w-2/3 space-y-6">
                        @foreach($basket->items as $item)
                            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col sm:flex-row items-center gap-6 transition hover:shadow-md">
                                
                                <div class="w-32 h-32 flex-shrink-0 bg-gray-100 rounded-xl overflow-hidden">
                                    @if($item->product->product_image)
                                        <img src="{{ asset($item->product->product_image) }}" 
                                             alt="{{ $item->product->product_name }}" 
                                             class="w-full h-full object-cover">
                                    @else <!-- No Image Available -->
                                        <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs">No Image</div>
                                    @endif
                                </div>

                                <div class="flex-1 text-center sm:text-left">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <span class="inline-block bg-[#1f5b38] text-white text-[10px] px-2 py-0.5 rounded-full mb-1">
                                                {{ $item->product->category->category_name ?? 'Product' }} <!-- Product Category -->
                                            </span>
                                            <h3 class="text-xl font-bold text-gray-900">
                                                <a href="{{ route('products.show', $item->product_id) }}" class="hover:text-[#7FA82E] transition">
                                                    {{ $item->product->product_name }} <!-- Product Name -->
                                                </a>
                                            </h3>
                                            <p class="text-sm text-gray-500 mt-1 line-clamp-1">{{ $item->product->product_description }}</p> <!-- Product Description -->
                                        </div>
                                    </div>

                                    <div class="flex flex-col sm:flex-row items-center justify-between mt-4 gap-4"> <!-- Quantity Controls and Price -->
                                        <div class="flex items-center bg-gray-100 rounded-lg p-1">
                                            <form action="{{ route('basket.update') }}" method="POST">
                                                @csrf <!-- Decrease Quantity Button -->
                                                <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                                <input type="hidden" name="action" value="decrease">
                                                <button type="submit" 
                                                    class="w-8 h-8 flex items-center justify-center rounded-md bg-white text-gray-600 shadow-sm hover:text-red-500 disabled:opacity-50"
                                                    {{ $item->basket_item_quantity <= 1 ? 'disabled' : '' }}> 
                                                    -
                                                </button>
                                            </form>

                                            <span class="w-12 text-center font-bold text-gray-900">{{ $item->basket_item_quantity }}</span> <!-- Current Quantity -->

                                            <form action="{{ route('basket.update') }}" method="POST">
                                                @csrf <!-- Increase Quantity Button -->
                                                <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                                <input type="hidden" name="action" value="increase">
                                                <button type="submit" 
                                                    class="w-8 h-8 flex items-center justify-center rounded-md bg-white text-gray-600 shadow-sm hover:text-[#7FA82E] disabled:opacity-50"
                                                    {{ $item->basket_item_quantity >= $item->product->product_stock_level ? 'disabled' : '' }}>
                                                    +
                                                </button>
                                            </form>
                                        </div>

                                        <div class="flex items-center gap-6">
                                            <div class="text-right">
                                                <div class="text-lg font-bold text-[#7FA82E]"> <!-- Total Price for this item -->
                                                    £{{ number_format($item->basket_item_quantity * $item->basket_item_price, 2) }}
                                                </div>
                                                <div class="text-xs text-gray-400"> <!-- Price per unit -->
                                                    £{{ number_format($item->basket_item_price, 2) }} each
                                                </div>
                                            </div>

                                            <form action="{{ route('basket.remove') }}" method="POST"> <!-- Remove Item Button -->
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                                <button type="submit" class="text-gray-400 hover:text-red-500 transition p-2" title="Remove item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="lg:w-1/3"> <!-- Order Summary Sidebar -->
                        <div class="bg-white rounded-2xl p-8 shadow-[8px_8px_0_#2d322c] border border-gray-100 sticky top-8">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">Order Summary</h2>
                            
                            <div class="space-y-4 mb-6">
                                <div class="flex justify-between text-gray-600">
                                    <span>Subtotal</span>
                                    <span>£{{ number_format($basket->items->sum(fn($i) => $i->basket_item_quantity * $i->basket_item_price), 2) }}</span>
                                </div>
                                <div class="flex justify-between text-gray-600">
                                    <span>Shipping</span>
                                    <span class="text-green-600 font-medium">Free</span>
                                </div>
                                <div class="border-t border-gray-100 pt-4 flex justify-between items-center">
                                    <span class="text-lg font-bold text-gray-900">Total</span>
                                    <span class="text-2xl font-bold text-[#1f5b38]">
                                        £{{ number_format($basket->items->sum(fn($i) => $i->basket_item_quantity * $i->basket_item_price), 2) }}
                                    </span>
                                </div>
                            </div>
                            
                            @php
                                $hasStockIssues = $basket->items->contains(fn($item) => $item->basket_item_quantity > $item->product->product_stock_level);
                            @endphp

                            <form action="{{ route('checkout') }}" method="GET"> <!-- Proceed to Checkout Form -->
                                <button type="submit"
                                        class="block w-full text-center font-bold py-4 rounded-xl 
                                        {{ $hasStockIssues ? 'bg-gray-400 cursor-not-allowed' : 'bg-[#1f5b38] text-white hover:bg-[#7FA82E] hover:text-[#1f5b38]' }} 
                                        transition shadow-lg"
                                        {{ $hasStockIssues ? 'disabled' : '' }}>
                                    Checkout
                                </button>
                            </form>

                            @if($hasStockIssues)
                                <p class="mt-2 text-sm text-red-500">Some items exceed available stock. Adjust quantities before checkout.</p>
                            @endif

                            <div class="mt-6 text-center">
                                <a href="{{ route('shop.index') }}" class="text-sm text-gray-500 hover:text-[#1f5b38] underline">
                                    or Continue Shopping
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else <!-- If basket is empty... -->
                <div class="text-center py-20 bg-white rounded-2xl shadow-sm border border-gray-100">
                    <div class="bg-green-50 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#1f5b38" class="w-10 h-10">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Your basket is empty</h2>
                    <p class="text-gray-500 mb-8">Looks like you haven't added any supplements yet.</p>
                    <a href="{{ route('shop.index') }}" 
                       class="inline-block bg-[#1f5b38] text-white font-bold py-3 px-8 rounded-full hover:bg-[#7FA82E] hover:text-[#1f5b38] transition">
                        Start Shopping
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-layout>