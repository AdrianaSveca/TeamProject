<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- SEARCH & FILTER SECTION --}}
            <div class="mb-8 bg-white p-6 rounded-lg shadow-sm">
                <form action="{{ route('shop.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                    
                    {{-- Search Bar --}}
                    <div class="flex-grow">
                        <input type="text" name="search" placeholder="Search products..." value="{{ request('search') }}"
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                    </div>

                    {{-- Category Filter --}}
                    <div class="w-full md:w-1/4">
                        <select name="category" class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->category_id }}" {{ request('category') == $category->category_id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Submit Button --}}
                    <button type="submit" class="bg-[#2B332A] text-white px-6 py-2 rounded-md font-bold hover:bg-black transition">
                        Filter
                    </button>
                    
                    {{-- Reset Link --}}
                    <a href="{{ route('shop.index') }}" class="flex items-center text-gray-500 hover:text-[#7FA82E]">Reset</a>
                </form>
            </div>

            {{-- PRODUCT GRID --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($products as $product)
                    <div class="bg-white border rounded-lg overflow-hidden hover:shadow-lg transition group">
                        
                        {{-- Product Image (Clickable) --}}
                        <a href="{{ route('products.show', $product->product_id) }}" class="block h-48 bg-gray-200 overflow-hidden relative">
                            @if($product->product_image)
                                <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            @else
                                <div class="flex items-center justify-center h-full text-gray-400">No Image</div>
                            @endif
                        </a>

                        {{-- Details --}}
                        <div class="p-4">
                            <h3 class="text-lg font-bold text-gray-900 truncate">
                                <a href="{{ route('products.show', $product->product_id) }}">{{ $product->product_name }}</a>
                            </h3>
                            <p class="text-sm text-gray-500 mb-2">{{ Str::limit($product->product_description, 50) }}</p>
                            
                            <div class="flex items-center justify-between mt-4">
                                <span class="text-xl font-bold text-[#7FA82E]">£{{ number_format($product->product_price, 2) }}</span>
                                
                                {{-- Quick Add to Basket --}}
                                <form action="{{ route('basket.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                    <button type="submit" class="text-[#2B332A] hover:text-[#7FA82E] transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12 text-gray-500">
                        No products found matching your search.
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-layout>
    