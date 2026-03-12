<!-- This is the basket page where users can view and manage the items they have added to their shopping basket. It displays product details, allows quantity adjustments, and provides a summary of the order before proceeding to checkout. -->
<x-layout>
    <div class="bg-gray-50 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-[#1f5b38] mb-8">Your Basket</h1>

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
                                                    class="w-8 h-8 flex items-center justify-center rounded-md bg-white">
                                                    -
                                                </button>
                                            </form>

                                            <span class="w-12 text-center font-bold">
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
                                                    class="w-8 h-8 flex items-center justify-center rounded-md bg-white">
                                                    +
                                                </button>
                                            </form>

                                        </div>

                                        <!-- PRICE + REMOVE -->
                                        <div class="flex items-center gap-6">

                                            <div class="text-right">
                                                <div class="text-lg font-bold text-[#7FA82E]">
                                                    £{{ number_format($item->basket_item_quantity * $item->basket_item_price, 2) }}
                                                </div>

                                                <div class="text-xs text-gray-400">
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

                    <!-- SUMMARY -->
                    <div class="lg:w-1/3">
                        <div class="bg-white rounded-2xl p-8 shadow border sticky top-8">

                            <h2 class="text-2xl font-bold mb-6">Order Summary</h2>

                            <div class="flex justify-between mb-2">
                                <span>Subtotal</span>
                                <span>
                                    £{{ number_format($basket->items->sum(fn($i) => $i->basket_item_quantity * $i->basket_item_price), 2) }}
                                </span>
                            </div>

                            <div class="flex justify-between mb-4">
                                <span>Shipping</span>
                                <span class="text-green-600">Free</span>
                            </div>

                            <div class="flex justify-between font-bold text-lg border-t pt-4">
                                <span>Total</span>
                                <span>
                                    £{{ number_format($basket->items->sum(fn($i) => $i->basket_item_quantity * $i->basket_item_price), 2) }}
                                </span>
                            </div>

                        </div>
                    </div>

                </div>

            @else

                <div class="text-center py-20 bg-white rounded-2xl">
                    <h2 class="text-2xl font-bold mb-2">Your basket is empty</h2>

                    <a href="{{ route('shop.index') }}" class="text-[#1f5b38] underline">
                        Start Shopping
                    </a>
                </div>

            @endif

        </div>
    </div>
</x-layout>