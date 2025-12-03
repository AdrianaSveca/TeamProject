<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 md:p-10">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    
                    {{-- Left: Image --}}
                    <div class="bg-gray-100 rounded-lg overflow-hidden h-96 flex items-center justify-center">
                        @if($product->product_image)
                            <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}" class="h-full w-full object-cover">
                        @else
                            <span class="text-gray-400">No Image Available</span>
                        @endif
                    </div>

                    {{-- Right: Details --}}
                    <div class="flex flex-col justify-center">
                        {{-- Category Badge --}}
                        <span class="inline-block bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full w-fit mb-2">
                            {{ $product->category->category_name ?? 'General' }}
                        </span>

                        <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $product->product_name }}</h1>
                        
                        <div class="text-2xl font-bold text-[#7FA82E] mb-6">
                            £{{ number_format($product->product_price, 2) }}
                        </div>

                        <div class="prose text-gray-600 mb-8">
                            <p>{{ $product->product_description }}</p>
                        </div>

                        {{-- Stock Indicator --}}
                        <div class="mb-6">
                            <span class="font-bold {{ $product->product_stock_level > 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $stockLevel }}
                            </span>
                            @if($product->product_stock_level > 0 && $product->product_stock_level < 10)
                                <span class="text-sm text-red-500 ml-2">Only {{ $product->product_stock_level }} left!</span>
                            @endif
                        </div>

                        {{-- Add to Basket Form --}}
                        @if($product->product_stock_level > 0)
                            <form action="{{ route('basket.add') }}" method="POST" class="flex gap-4">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                
                                {{-- Quantity Selector --}}
                                <input type="number" name="quantity" value="1" min="1" max="{{ $product->product_stock_level }}" 
                                       class="w-20 rounded-md border-gray-300 focus:border-[#7FA82E] focus:ring-[#7FA82E]">

                                <button type="submit" class="flex-1 bg-[#2B332A] text-white font-bold py-3 rounded-md hover:bg-black transition text-lg">
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