<!-- This is the basket page where users can view and manage the items they have added to their shopping basket. It displays product details, allows quantity adjustments, and provides a summary of the order before proceeding to checkout. -->

<x-layout>
    <div class="min-h-screen py-12 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-8">
                Your <span class="text-[#7FA82E]">Basket</span>
            </h1>

            @if($basket && $basket->items->count() > 0)

                <div class="flex flex-col lg:flex-row gap-8">
                    
                    <div class="lg:w-2/3 space-y-6">
                        @foreach($basket->items as $item)

                            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col sm:flex-row items-center gap-6 transition hover:shadow-md">
                                
                                <!-- IMAGE -->
                                <div class="w-32 h-32 flex-shrink-0 bg-gray-100 rounded-xl overflow-hidden">
                                    @if($item->product->product_image)
                                        <img src="{{ asset($item->product->product_image) }}" 
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs">
                                            No Image
                                        </div>
                                    @endif
                                </div>

                                <!-- PRODUCT INFO -->
                                <div class="flex-1 text-center sm:text-left">

                                    <div class="flex justify-between items-start">
                                        <div>

                                            <span class="inline-block bg-[#1f5b38] text-white text-[10px] px-2 py-0.5 rounded-full mb-1">
                                                {{ $item->product->category->category_name ?? 'Product' }}
                                            </span>

                                            <h3 class="text-xl font-bold text-gray-900">
                                                <a href="{{ route('products.show', $item->product_id) }}">
                                                    {{ $item->product->product_name }}
                                                </a>
                                            </h3>

                                            <!-- SIZE -->
                                            @if($item->variant)
                                                <p class="text-sm text-gray-500">
                                                    Size: <span class="font-medium">{{ $item->variant->size }}</span>
                                                </p>
                                            @endif

                                            <!-- FLAVOUR -->
                                            @if($item->flavour)
                                                <p class="text-sm text-gray-500">
                                                    Flavour: <span class="font-medium">{{ $item->flavour }}</span>
                                                </p>
                                            @endif

                                            <p class="text-sm text-gray-500 mt-1">
                                                {{ $item->product->product_description }}
                                            </p>

                                        </div>
                                    </div>

                                    <div class="flex flex-col sm:flex-row items-center justify-between mt-4 gap-4">

                                        <!-- QUANTITY -->
                                        <div class="flex items-center bg-gray-100 rounded-lg p-1">

                                            <!-- DECREASE -->
                                            <form action="{{ route('basket.update') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                                <input type="hidden" name="variant_id" value="{{ $item->variant_id }}">
                                                <input type="hidden" name="flavour" value="{{ $item->flavour }}">
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

                                            <!-- INCREASE -->
                                            <form action="{{ route('basket.update') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                                <input type="hidden" name="variant_id" value="{{ $item->variant_id }}">
                                                <input type="hidden" name="flavour" value="{{ $item->flavour }}">
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

                                            <!-- REMOVE -->
                                            <form action="{{ route('basket.remove') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="basket_item_id" value="{{ $item->basket_item_id }}">

                                                <button type="submit" class="text-red-500">
                                                    ✕
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