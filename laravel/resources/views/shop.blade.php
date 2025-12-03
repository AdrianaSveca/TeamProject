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
                <div class="bg-[#1f5b38] rounded-2xl p-6 shadow-[10px_10px_0_#2d322c] text-white sticky top-24">
                    <form action="{{ route('shop.index') }}" method="GET" class="space-y-8">
                        <div>
                            <h3 class="text-lg font-bold mb-3 border-b border-white/30 pb-2">Search</h3>
                            <input type="text" name="search" value="{{ request('search') }}" placeholder="Find a product..."
                                   class="w-full rounded-lg border-none text-slate-800 placeholder-slate-400 focus:ring-2 focus:ring-white">
                        </div>

                        <div>
                            <h3 class="text-lg font-bold mb-3 border-b border-white/30 pb-2">Categories</h3>
                            <ul class="space-y-2">
                                <li>
                                    <button type="submit" name="category" value=""
                                            class="w-full text-left hover:text-white/80 {{ !request('category') ? 'font-bold underline' : '' }}">
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
                                <span>£200</span>
                            </div>
                            <input type="range" name="max_price" min="0" max="200" value="{{ request('max_price',200) }}"
                                   class="w-full accent-white cursor-pointer">
                            <div class="text-right text-sm font-bold mt-1">
                                Max: £{{ request('max_price',200) }}
                            </div>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="w-full bg-[#7FA82E] text-[#1f5b38] font-bold py-2 rounded-lg hover:bg-slate-100 transition">
                                Apply Filters
                            </button>
                            @if(request()->anyFilled(['search','category','max_price']))
                                <a href="{{ route('shop.index') }}"
                                   class="block text-center text-sm text-white/80 hover:text-white mt-3 underline">
                                    Clear All
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </aside>

            <div class="md:col-span-3 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($products as $product)
                    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden hover:shadow-lg flex flex-col">
                        <a href="{{ route('products.show', $product->product_id) }}" class="group">
                            <div class="h-56 flex items-center justify-center overflow-hidden bg-white p-6">
                                @if($product->product_image)
                                    <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}"
                                         class="w-full h-full object-contain group-hover:scale-105 transition duration-300">
                                @else
                                    <div class="text-slate-400 text-sm">No Image</div>
                                @endif
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-slate-900 mb-1">{{ $product->product_name }}</h3>
                                <p class="text-sm text-slate-500 line-clamp-2">{{ $product->product_description }}</p>
                            </div>
                        </a>

                        <div class="flex items-center justify-between p-5 pt-3 border-t border-slate-200 mt-auto">
                            <span class="text-xl font-bold text-[#7FA82E]">£{{ number_format($product->product_price,2) }}</span>

                            @if($product->product_stock_level > 0)
                                <form action="{{ route('basket.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit"
                                            class="bg-[#2B332A] text-white p-2 rounded-full hover:bg-black transition"
                                            title="Add to Basket">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                                        </svg>
                                    </button>
                                </form>
                            @else
                                <button disabled class="bg-gray-300 text-gray-500 p-2 rounded-full cursor-not-allowed">
                                    Out of Stock
                                </button>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20 bg-slate-50 rounded-2xl">
                        No products found.
                    </div>
                @endforelse
            </div>
        </div>
    </main>
</x-layout>
