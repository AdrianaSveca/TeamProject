<x-layout>
    <div class="relative w-screen left-[calc(-50vw+50%)] -mt-6 h-auto">
        <div class="relative min-h-[240px] md:min-h-[255px] w-full overflow-hidden flex flex-col justify-end">
            <img src="{{ asset('images/banner2-bg.jpg') }}" alt="WELLTH Shop" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/30"></div>
            <div class="relative z-10 flex justify-center items-center px-4 pb-6 h-full">
                <div class="text-center max-w-xl mx-auto mt-20">
                    <h1 class="text-4xl font-bold text-white mb-2">Our Shop</h1>
                    <p class="text-lg text-white/90">
                        Discover premium supplements to fuel your journey.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

            <aside class="md:col-span-1">
                <div class="bg-[#1f5b38] rounded-2xl p-6 shadow-[10px_10px_0_#2d322c]  text-white sticky top-24">
                    <form action="{{ route('shop.index') }}" method="GET" class="space-y-8">
                        
                        <div>
                            <h3 class="text-lg font-bold mb-3 border-b border-white/30 pb-2">Search</h3>
                            <input 
                                type="text" 
                                name="search" 
                                value="{{ request('search') }}"
                                placeholder="Find a product..." 
                                class="w-full rounded-lg border-none text-slate-800 placeholder-slate-400  focus:ring-2 focus:ring-white"
                            >
                        </div>

                        <div>
                            <h3 class="text-lg font-bold mb-3 border-b border-white/30 pb-2">Categories</h3>
                            <ul class="space-y-2">
                                <li>
                                    <button type="submit" name="category" value="" class="w-full text-left hover:text-white/80 {{ !request('category') ? 'font-bold underline' : '' }}">
                                        All Products
                                    </button>
                                </li>
                                @forelse($categories as $category)
                                    <li>
                                        <button type="submit" name="category" value="{{ $category->category_id }}" 
                                            class="w-full text-left hover:text-white/80 {{ request('category') == $category->category_id ? 'font-bold underline' : '' }}">
                                            {{ $category->category_name }}
                                        </button>
                                    </li>
                                @empty
                                    <li class="text-sm opacity-80">No categories found.</li>
                                @endforelse
                            </ul>
                        </div>

                        <div>
                            <h3 class="text-lg font-bold mb-3 border-b border-white/30 pb-2">Price Range</h3>
                            <div class="flex justify-between text-xs mb-2">
                                <span>£0</span>
                                <span>£100</span>
                            </div>
                            <input type="range" name="max_price" min="0" max="100" 
                                   value="{{ request('max_price', 100) }}" 
                                   class="w-full accent-white cursor-pointer">
                            <div class="text-right text-sm font-bold mt-1">
                                Max: £{{ request('max_price', 100) }}
                            </div>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="w-full bg-[#7FA82E] text-[#1f5b38] font-bold py-2 rounded-lg hover:bg-slate-100 transition">
                                Apply Filters
                            </button>
                            @if(request()->anyFilled(['search', 'category', 'max_price']))
                                <a href="{{ route('shop.index') }}" class="block text-center text-sm text-white/80 hover:text-white mt-3 underline">
                                    Clear All
                                </a>
                            @endif
                        </div>

                    </form>
                </div>
            </aside>

            <div class="md:col-span-3">
                
                {{-- Sort Bar --}}
                <div class="flex justify-between items-center mb-6 bg-slate-50 p-4 rounded-xl border border-slate-200">
                    <p class="text-slate-600">
                        Showing <span class="font-bold text-slate-900">{{ $products->count() }}</span> products
                    </p>
                    <form action="{{ route('shop.index') }}" method="GET">
                        <input type="hidden" name="search" value="{{ request('search') }}">
                        <input type="hidden" name="category" value="{{ request('category') }}">
                        
                        <select name="sort" onchange="this.form.submit()" class="bg-[#7FA82E] border-gray-300 rounded-lg p-2.5 text-base text-white m-2 focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest Arrivals</option>
                            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                        </select>
                    </form>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($products as $product)
                            <a href="/products/{{ $product->product_id }}">
                                <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden hover:shadow-lg transition group flex flex-col h-full">
                                
                                    {{-- Image --}}
                                    <div class="h-56 bg-white p-6 flex items-center justify-center relative overflow-hidden">
                                        @if($product->product_image)
                                            <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}" 
                                                class="w-full h-full object-contain group-hover:scale-105 transition duration-300">
                                        @else
                                            <div class="text-slate-400 text-sm">No Image</div>
                                        @endif
                                    </div>

                                {{-- Details --}}
                                <div class="p-5 flex flex-col flex-grow bg-slate-50">
                                    <h3 class="text-lg font-bold text-slate-900 mb-1 leading-tight">
                                        {{ $product->product_name }}
                                    </h3>
                                    
                                    <p class="text-sm text-slate-500 mb-4 flex-grow line-clamp-2">
                                        {{ $product->product_description }}
                                    </p>
                                    
                                    <div class="flex items-center justify-between mt-auto pt-4 border-t border-slate-200">
                                        <span class="text-xl font-bold text-[#7FA82E]">
                                            £{{ number_format($product->product_price, 2) }}
                                        </span>
                                        
                                        {{-- Add to Cart --}}
                                        <form action="{{ route('basket.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                            <button type="submit" class="bg-[#2B332A] text-white p-2 rounded-full hover:bg-black transition" title="Add to Cart">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-20 bg-slate-50 rounded-2xl border border-dashed border-slate-300">
                                <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                </svg>
                                <h3 class="text-lg font-bold text-slate-600">No products found</h3>
                                <p class="text-slate-500">We are stocking up! Check back soon.</p>
                            </div>
                        </a>
                    @endforelse
                </div>

                <div class="mt-8">
                    {{ $products->appends(request()->query())->links() }}
                </div>

            </div>
        </div>
    </main>
</x-layout>