<!-- This is the product detail page that displays comprehensive information about a specific product, including its image, name, price, description, stock level, and an option to add it to the basket. -->
<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 md:p-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                    <div class="bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center">
                        @if($product->product_image) <!-- Product Image -->
                            <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}"
                                 class="h-full w-full object-cover">
                        @else <!-- No Image Available -->
                            <span class="text-gray-400">No Image Available</span>
                        @endif
                    </div>

                    <div class="flex flex-col justify-center">
                        <span class="inline-block bg-[#1f5b38] text-white text-xs px-2 py-1 rounded-full w-fit mb-2 shadow-[3px_3px_0_#2d322c]">
                            {{ $product->category->category_name ?? 'General' }} <!-- Product Category -->
                        </span>

                        <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $product->product_name }}</h1>
                        <div class="text-2xl font-bold text-[#7FA82E] mb-6">£{{ number_format($product->product_price, 2) }}</div>

                        <div class="prose text-gray-600 mb-8">
                            <p>{{ $product->product_description }}</p>
                        </div>

                        <div class="mb-6">
                            <span class="font-bold {{ $product->product_stock_level > 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $product->product_stock_level }} Left in Stock
                            </span>
                            @if($product->product_stock_level > 0 && $product->product_stock_level < 5)
                                <span class="text-sm text-red-500 ml-2">Only {{ $product->product_stock_level }} left!</span>
                            @endif
                        </div>

                        @if($product->product_stock_level > 0) <!-- Add to Basket Form -->
                            <form action="{{ route('basket.add') }}" method="POST" class="flex gap-4">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                <input type="number" name="quantity" value="1" min="1" max="{{ $product->product_stock_level }}"
                                       class="w-20 rounded-md border-gray-300 focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                <button type="submit"
                                        class="flex-1 bg-[#2B332A] text-white font-bold py-3 rounded-md hover:bg-black transition text-lg">
                                    Add to Basket
                                </button>
                            </form>
                        @else
                            <button disabled class="w-full bg-gray-300 text-gray-500 font-bold py-3 rounded-md cursor-not-allowed">
                                Out of Stock
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
