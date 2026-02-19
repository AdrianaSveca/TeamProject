<!-- This is the basket page where users can view and manage the items they have added to their shopping basket. It displays product details, allows quantity adjustments, and provides a summary of the order before proceeding to checkout. -->

<x-layout>
    <div class="min-h-screen py-12 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-8">
                Your <span class="text-[#7FA82E]">Basket</span>
            </h1>

            @if(isset($basket) && $basket->items->count() > 0) <!-- Check if basket has items -->
                <div class="flex flex-col lg:flex-row gap-8">
                    
                    <div class="lg:w-2/3 space-y-6">
                        @foreach($basket->items as $item)
                            <div class="bg-white dark:bg-[#1a2920] rounded-3xl p-6 shadow-lg border border-gray-100 dark:border-[#2a4535] flex flex-col sm:flex-row items-center gap-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                                
                                <div class="w-32 h-32 flex-shrink-0 bg-gray-50 dark:bg-[#121e16] rounded-2xl overflow-hidden border border-gray-100 dark:border-[#2a4535] flex items-center justify-center">
                                    @if($item->product->product_image)
                                        <img src="{{ asset($item->product->product_image) }}" 
                                             alt="{{ $item->product->product_name }}" 
                                             class="w-full h-full object-contain p-2">
                                    @else <!-- No Image Available -->
                                        <div class="text-gray-400 dark:text-gray-500 text-xs font-medium">No Image</div>
                                    @endif
                                </div>

                                <div class="flex-1 w-full text-center sm:text-left">
                                    <div class="flex flex-col sm:flex-row justify-between items-start gap-2">
                                        <div>
                                            <span class="inline-block bg-[#7FA82E]/10 text-[#7FA82E] text-[10px] font-bold px-2.5 py-1 rounded-full mb-2 border border-[#7FA82E]/20">
                                                {{ $item->product->category->category_name ?? 'Product' }} <!-- Product Category -->
                                            </span>
                                            <h3 class="text-xl font-bold text-gray-900 dark:text-white leading-tight">
                                                <a href="{{ route('products.show', $item->product_id) }}" class="hover:text-[#7FA82E] transition-colors">
                                                    {{ $item->product->product_name }} <!-- Product Name -->
                                                </a>
                                            </h3>
                                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1 line-clamp-1">
                                                {{ $item->product->product_description }} <!-- Product Description -->
                                            </p>
                                        </div>
                                        
                                        <div class="hidden sm:block text-right"> <!-- Quantity Controls and Price -->
                                            <div class="text-lg font-bold text-[#7FA82E]">
                                                £{{ number_format($item->basket_item_quantity * $item->basket_item_price, 2) }}
                                            </div>
                                            <div class="text-xs text-gray-400 dark:text-gray-500">
                                                £{{ number_format($item->basket_item_price, 2) }} each
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex flex-col sm:flex-row items-center justify-between mt-6 gap-4">
                                        
                                        <div class="flex items-center bg-gray-100 dark:bg-[#121e16] rounded-xl p-1 border border-transparent dark:border-[#2a4535]">
                                            <form action="{{ route('basket.update') }}" method="POST">
                                                @csrf <!-- Decrease Quantity Button -->
                                                <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                                <input type="hidden" name="action" value="decrease">
                                                <button type="submit" 
                                                    class="w-8 h-8 flex items-center justify-center rounded-lg bg-white dark:bg-[#1a2920] text-gray-600 dark:text-gray-300 shadow-sm hover:text-red-500 dark:hover:text-red-400 disabled:opacity-50 transition-colors"
                                                    {{ $item->basket_item_quantity <= 1 ? 'disabled' : '' }}> 
                                                    -
                                                </button>
                                            </form>

                                            <span class="w-10 text-center font-bold text-gray-900 dark:text-white text-sm"> <!-- Current Quantity -->
                                                {{ $item->basket_item_quantity }}
                                            </span>

                                            <form action="{{ route('basket.update') }}" method="POST">
                                                @csrf <!-- Increase Quantity Button -->
                                                <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                                <input type="hidden" name="action" value="increase">
                                                <button type="submit" 
                                                    class="w-8 h-8 flex items-center justify-center rounded-lg bg-white dark:bg-[#1a2920] text-gray-600 dark:text-gray-300 shadow-sm hover:text-[#7FA82E] dark:hover:text-[#7FA82E] disabled:opacity-50 transition-colors"
                                                    {{ $item->basket_item_quantity >= $item->product->product_stock_level ? 'disabled' : '' }}>
                                                    +
                                                </button>
                                            </form>
                                        </div>

                                        <div class="flex items-center gap-4 w-full sm:w-auto justify-between sm:justify-end">
                                            <div class="block sm:hidden text-left">
                                                <div class="text-lg font-bold text-[#7FA82E]">
                                                    £{{ number_format($item->basket_item_quantity * $item->basket_item_price, 2) }} <!-- Total Price for this item -->
                                                </div>
                                                <div class="text-xs text-gray-400 dark:text-gray-500"> <!-- Price per unit -->
                                                    £{{ number_format($item->basket_item_price, 2) }} each
                                                </div>
                                            </div>

                                            <form action="{{ route('basket.remove') }}" method="POST"> <!-- Remove Item Button -->
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                                <button type="submit" class="text-gray-400 hover:text-red-500 dark:text-gray-500 dark:hover:text-red-400 transition-colors p-2 rounded-full hover:bg-red-50 dark:hover:bg-red-900/20" title="Remove item">
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
                        <div class="bg-white dark:bg-[#1a2920] rounded-3xl p-8 shadow-xl border border-gray-100 dark:border-[#2a4535] sticky top-24 transition-colors duration-300">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Order Summary</h2>
                            
                            <div class="space-y-4 mb-8">
                                <div class="flex justify-between text-gray-600 dark:text-gray-400">
                                    <span>Subtotal</span>
                                    <span class="font-medium text-gray-900 dark:text-gray-200">
                                        £{{ number_format($basket->items->sum(fn($i) => $i->basket_item_quantity * $i->basket_item_price), 2) }}
                                    </span>
                                </div>
                                <div class="flex justify-between text-gray-600 dark:text-gray-400">
                                    <span>Shipping</span>
                                    <span class="text-[#7FA82E] font-bold">Free</span>
                                </div>
                                <div class="border-t border-gray-100 dark:border-[#2a4535] pt-4 flex justify-between items-center mt-4">
                                    <span class="text-lg font-bold text-gray-900 dark:text-white">Total</span>
                                    <span class="text-3xl font-extrabold text-[#7FA82E]">
                                        £{{ number_format($basket->items->sum(fn($i) => $i->basket_item_quantity * $i->basket_item_price), 2) }}
                                    </span>
                                </div>
                            </div>
                            
                            @php
                                $total = $basket->items->sum(fn($i) => $i->basket_item_quantity * $i->basket_item_price);
                                $hasStockIssues = $basket->items->contains(fn($item) => $item->basket_item_quantity > $item->product->product_stock_level);
                            @endphp <!-- Proceed to Checkout Form -->

                            @if(!$hasStockIssues)
                                <form action="{{ route('checkout') }}" method="GET">
                                    <input type="hidden" name="total_amount" value="{{ $total }}">
                                    <button type="submit"
                                            class="w-full bg-[#7FA82E] hover:bg-[#6d9126] text-white font-extrabold py-4 rounded-full transition-all duration-300 text-lg shadow-lg hover:shadow-[#7FA82E]/40 hover:-translate-y-1 flex items-center justify-center gap-2">
                                        Checkout securely
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                    </button>
                                </form>
                            @else 
                                <button disabled class="w-full bg-gray-400 dark:bg-gray-600 cursor-not-allowed text-white font-bold py-4 rounded-full">
                                    Stock Issues Detected
                                </button>
                                <p class="mt-3 text-sm text-center text-red-500 bg-red-50 dark:bg-red-900/20 py-2 px-3 rounded-lg border border-red-100 dark:border-red-900/30">
                                    Some items exceed available stock. Please adjust quantities.
                                </p>
                            @endif

                            <div class="mt-6 text-center">
                                <a href="{{ route('shop.index') }}" class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-[#7FA82E] dark:hover:text-[#7FA82E] transition-colors">
                                    or <span class="underline">Continue Shopping</span>
                                </a>
                            </div>

                            <div class="mt-8 pt-6 border-t border-gray-100 dark:border-[#2a4535] flex justify-center gap-4 text-gray-400 dark:text-gray-500">
                                <i class="fa fa-cc-visa text-2xl"></i>
                                <i class="fa fa-cc-mastercard text-2xl"></i>
                                <i class="fa fa-cc-amex text-2xl"></i>
                                <i class="fa fa-cc-paypal text-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

            @else <!-- If basket is empty... -->
                <div class="text-center py-24 bg-white dark:bg-[#1a2920] rounded-3xl shadow-xl border border-gray-100 dark:border-[#2a4535] transition-colors duration-300">
                    <div class="bg-gray-50 dark:bg-[#121e16] w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#7FA82E" class="w-12 h-12">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-3">Your basket is empty</h2>
                    <p class="text-gray-500 dark:text-gray-400 mb-8 max-w-md mx-auto">
                        Looks like you haven't added any supplements yet. Visit our shop to find the best fuel for your journey.
                    </p>
                    <a href="{{ route('shop.index') }}" 
                       class="inline-flex items-center justify-center bg-[#7FA82E] text-white font-bold py-3 px-8 rounded-full hover:bg-[#6d9126] shadow-lg hover:shadow-[#7FA82E]/40 hover:-translate-y-1 transition-all duration-300">
                        Start Shopping
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-layout>