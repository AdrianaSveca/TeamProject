<!-- This is the checkout page where users can review their basket items, see the total amount, and place their order. 
    If any items exceed available stock, a warning message is displayed and the "Place Order" button is disabled. 
    The form collects shipping address and payment details, which are sent to the server for order processing.
-->

<x-layout>
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            
            <div class="mb-10 text-center sm:text-left">
                <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white">
                    Secure <span class="text-[#7FA82E]">Checkout</span>
                </h1>
                <p class="mt-2 text-gray-600 dark:text-gray-400">Complete the form below to place your order.</p>
            </div>

            @if(isset($basket) && $basket->items->count() > 0) <!-- Check if the basket exists and has items -->
                
                @php
                    $hasStockIssues = $basket->items->contains(fn($item) => $item->basket_item_quantity > $item->product->product_stock_level);
                    $total = $subtotal - $discountAmount;
                @endphp

                <div class="flex flex-col lg:flex-row gap-8">

                    <!-- Form for shipping and payment details (placing the order) -->
                    <form id="checkout-form" action="{{ route('orders.place') }}" method="POST" class="lg:w-2/3 space-y-8">
                        @csrf

                        <div class="bg-white dark:bg-[#1a2920] rounded-3xl shadow-lg border border-gray-100 dark:border-[#2a4535] p-6 sm:p-8 transition-colors duration-300">
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                                <span class="bg-[#7FA82E] text-white w-8 h-8 rounded-full flex items-center justify-center text-sm">1</span>
                                Shipping Address
                            </h2>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Street Address</label>
                                    <input type="text" name="address" required placeholder="123 Wellness St" 
                                           class="w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">City</label>
                                    <input type="text" name="city" required placeholder="Birmingham" 
                                           class="w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Postcode</label>
                                    <input type="text" name="zip" required placeholder="B4 7ET" 
                                           class="w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-[#1a2920] rounded-3xl shadow-lg border border-gray-100 dark:border-[#2a4535] p-6 sm:p-8 transition-colors duration-300"> <!-- Payment Details Section -->
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                                <span class="bg-[#7FA82E] text-white w-8 h-8 rounded-full flex items-center justify-center text-sm">2</span>
                                Payment Details
                            </h2>

                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Card Number</label>
                                    <div class="relative">
                                        <input type="text" name="card_number" required placeholder="0000 0000 0000 0000" maxlength="19"
                                               class="w-full pl-12 rounded-xl border-gray-300 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                        <div class="absolute left-4 top-3 text-gray-400">
                                            <i class="fa fa-credit-card"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Expiry Date</label>
                                        <input type="text" name="expiry" required placeholder="MM/YY" maxlength="5"
                                               class="w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">CVC</label>
                                        <input type="text" name="cvc" required placeholder="123" maxlength="3"
                                               class="w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Order Summary, discount code and place order button -->
                    <div class="lg:w-1/3"> <!-- Order Summary and Place Order Button -->
                        <div class="bg-white dark:bg-[#1a2920] rounded-3xl shadow-xl border border-gray-100 dark:border-[#2a4535] p-8 sticky top-8 transition-colors duration-300">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Order Summary</h2>

                            <div class="max-h-60 overflow-y-auto mb-6 pr-2 space-y-4 custom-scrollbar">
                                @foreach($basket->items as $item)
                                    <div class="flex justify-between items-start text-sm">
                                        <div class="text-gray-600 dark:text-gray-300">
                                            <span class="font-bold text-gray-900 dark:text-white">{{ $item->basket_item_quantity }}x</span> {{ $item->product->product_name }} <!-- This shows the quantity and product name for each item in the basket -->
                                        </div>
                                        <div class="font-bold text-[#7FA82E]">
                                            £{{ number_format($item->basket_item_quantity * $item->basket_item_price, 2) }} <!-- Total price for this item --> 
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Discount code -->
                            @if($appliedDiscount)
                                <div class="mb-4 p-3 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl text-sm text-green-800 dark:text-green-200 flex items-center justify-between flex-wrap gap-2">
                                    <span>Code <strong>{{ $appliedDiscount->code }}</strong> applied (−£{{ number_format($discountAmount, 2) }})</span>
                                    <a href="{{ route('checkout.remove-discount') }}" class="text-green-700 dark:text-green-300 hover:underline font-medium">Remove</a>
                                </div>
                            @else
                                <form action="{{ route('checkout.apply-discount') }}" method="POST" class="mb-4 flex gap-2">
                                    @csrf
                                    <input type="text" name="discount_code" placeholder="Discount code" maxlength="64" value="{{ old('discount_code') }}"
                                           class="flex-1 rounded-xl border-gray-300 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white text-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                    <button type="submit" class="rounded-xl bg-gray-200 dark:bg-[#2a4535] text-gray-800 dark:text-gray-200 px-4 py-2 text-sm font-semibold hover:bg-[#7FA82E] hover:text-white dark:hover:bg-[#7FA82E] transition-colors">Apply</button>
                                </form>
                                @if(session('discount_error'))
                                    <p class="mb-4 text-sm text-red-600 dark:text-red-400">{{ session('discount_error') }}</p>
                                @endif
                                @if(session('status'))<p class="mb-4 text-sm text-green-600 dark:text-green-400">{{ session('status') }}</p>@endif
                            @endif

                            <div class="border-t border-gray-100 dark:border-[#2a4535] pt-4 space-y-2 mb-6"> <!-- This section shows the subtotal, shipping cost, discount, and total amount for the order -->
                                <div class="flex justify-between text-gray-600 dark:text-gray-400">
                                    <span>Subtotal</span>
                                    <span>£{{ number_format($subtotal, 2) }}</span>
                                </div>
                                @if($discountAmount > 0)
                                    <div class="flex justify-between text-green-600 dark:text-green-400">
                                        <span>Discount</span>
                                        <span>−£{{ number_format($discountAmount, 2) }}</span>
                                    </div>
                                @endif
                                <div class="flex justify-between text-gray-600 dark:text-gray-400">
                                    <span>Shipping</span>
                                    <span class="text-[#7FA82E] font-medium">Free</span>
                                </div>
                                <div class="flex justify-between items-center text-xl font-bold text-gray-900 dark:text-white pt-2">
                                    <span>Total</span>
                                    <span class="text-[#7FA82E]">£{{ number_format($total, 2) }}</span>
                                </div>
                            </div>

                            @if($hasStockIssues)
                                <div class="mb-4 p-3 bg-red-50 dark:bg-red-900/20 border border-red-100 dark:border-red-800 rounded-lg text-sm text-red-600 dark:text-red-300 text-center">
                                    Items out of stock. Please adjust basket.
                                </div>
                            @endif

                            <button type="submit" form="checkout-form"
                                    class="w-full bg-[#7FA82E] hover:bg-[#6d9126] text-white font-extrabold py-4 rounded-full shadow-lg hover:shadow-[#7FA82E]/40 hover:-translate-y-1 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none"
                                    {{ $hasStockIssues ? 'disabled' : '' }}>
                                Pay & Place Order
                            </button>

                            <div class="mt-4 text-center">
                                <a href="{{ route('basket.index') }}" class="text-sm text-gray-500 hover:text-[#7FA82E] underline">Modify Basket</a>
                            </div>
                        </div>
                    </div>
                </div>

            @else <!-- If the basket is empty, show a message and a link to return to the shop -->
                <div class="text-center py-20">
                    <p class="text-gray-500 dark:text-gray-400 text-lg">Your basket is empty.</p>
                    <a href="{{ route('shop.index') }}" class="text-[#7FA82E] font-bold hover:underline mt-2 inline-block">Return to Shop</a>
                </div>
            @endif
        </div>
    </div>
</x-layout>