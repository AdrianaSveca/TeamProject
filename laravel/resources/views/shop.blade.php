<!-- This is the Shop page, displaying products with filtering options such as search, categories, and price range. -->

<x-layout>
    <style> /* Inside this style tag, we define a slide-in animation for the Shop heading. With the -50px (basically the top) we define the animation to move from -50 to 0 on the Y axis. */
        @keyframes slideInDown {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <div class="relative w-screen left-[calc(-50vw+50%)] -mt-6 h-auto">
        <div class="relative min-h-[300px] md:min-h-[350px] w-full overflow-hidden flex flex-col justify-end bg-green-900">
            
            <img src="{{ asset('images/banner2-bg.jpg') }}" alt="WELLTH Shop" class="absolute inset-0 w-full h-full object-cover opacity-60">
            
            <div class="absolute inset-0 bg-black/40"></div>
            
            <div class="relative z-10 flex flex-col justify-center items-center px-4 pb-16 h-full w-full">
                <div class="text-center mt-10">
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-0 drop-shadow-md">Our</h1>
                    <h1 class="text-7xl md:text-9xl font-bold text-[#7FA82E] leading-tight opacity-0 animate-[slideInDown_1s_ease-out_forwards] drop-shadow-lg">
                        Shop
                    </h1> <!-- This heading (Shop) has the animation applied to it -->
                    <p class="text-lg text-white/90 font-medium drop-shadow-sm mt-4 max-w-lg mx-auto">
                        Discover premium supplements to fuel your journey.
                    </p>
                </div>
            </div>

            </div>
    </div>
    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            
            <aside class="md:col-span-1">
                <div class="bg-[#1f5b38] dark:bg-[#121e16] rounded-2xl p-6 shadow-[10px_10px_0_#2d322c] dark:shadow-none dark:border dark:border-[#1f3629] text-white sticky top-24 transition-colors duration-300">
                    <form action="{{ route('shop.index') }}" method="GET" class="space-y-8">
                        
                        <div>
                            <h3 class="text-lg font-bold mb-3 border-b border-green-400/30 dark:border-[#2a4535] pb-2">Search</h3>
                            <input 
                                type="text" 
                                name="search" 
                                value="{{ request('search') }}"
                                placeholder="Find a product..." 
                                class="w-full rounded-lg border-none text-[#1f5b38] dark:text-[#0f1510] placeholder-slate-400 focus:ring-2 focus:ring-[#7FA82E] dark:bg-gray-100"
                            >
                        </div> 

                        <div> <!-- Categories Filter -->
                            <h3 class="text-lg font-bold mb-3 border-b border-green-400/30 dark:border-[#2a4535] pb-2">Categories</h3>
                            <ul class="space-y-2">
                                <li>
                                    <button type="submit" name="category" value=""
                                            class="w-full text-left hover:text-[#7FA82E] transition-colors {{ !request('category') ? 'font-bold text-[#7FA82E] underline' : '' }}">
                                        All Products
                                    </button>
                                </li>
                                @forelse($categories as $category) <!-- Loop through categories -->
                                    <li>
                                        <button type="submit" name="category" value="{{ $category->category_id }}"
                                                class="w-full text-left hover:text-[#7FA82E] transition-colors {{ request('category') == $category->category_id ? 'font-bold text-[#7FA82E] underline' : '' }}">
                                            {{ $category->category_name }}
                                        </button>
                                    </li>
                                @empty
                                    <li class="text-sm opacity-80">No categories found.</li>
                                @endforelse
                            </ul>
                        </div>

                        <div> <!-- Price Range Filter -->
                            <h3 class="text-lg font-bold mb-3 border-b border-green-400/30 dark:border-[#2a4535] pb-2">Price Range</h3>
                            <div class="flex justify-between text-xs mb-2">
                                <span>£0</span>
                                <span>£200</span>
                            </div>
                            <input type="range" name="max_price" min="0" max="200" 
                                   value="{{ request('max_price', 200) }}" 
                                   class="w-full accent-[#7FA82E] cursor-pointer">
                            <div class="text-right text-[#7FA82E] text-sm font-bold mt-1">
                                Max: £{{ request('max_price', 200) }}
                            </div>
                        </div>
                        <!-- Apply Filters Button -->
                        <div class="pt-2"> 
                            <button type="submit" class="w-full bg-[#7FA82E] text-white font-bold py-2 rounded-lg hover:bg-[#6d9126] transition-all duration-300 shadow-md">
                                Apply Filters
                            </button>
                            @if(request()->anyFilled(['search','category','max_price']))
                                <a href="{{ route('shop.index') }}"
                                   class="block text-center text-sm text-white/70 hover:text-white mt-3 underline decoration-white/50 hover:decoration-white">
                                    Clear All
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </aside>
            <!-- Products Grid -->
            <div class="md:col-span-3 flex flex-col"> 
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($products as $product) <!-- Loop through all products -->
                        <div class="bg-white dark:bg-[#121e16] border border-slate-200 dark:border-[#1f3629] rounded-2xl overflow-hidden hover:shadow-lg dark:hover:shadow-[#7FA82E]/10 flex flex-col transition-all duration-300 group">
                            
                            <a href="{{ route('products.show', $product->product_id) }}">
                                <div class="h-56 flex items-center justify-center overflow-hidden bg-white dark:bg-[#1a2920] p-6 relative">
                                    @if($product->product_image)
                                        <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}"
                                             class="w-full h-full object-contain group-hover:scale-105 transition duration-300 drop-shadow-sm">
                                    @else
                                        <div class="text-slate-400 text-sm">No Image</div>
                                    @endif
                                </div>
                                
                                <div class="p-5"> <!-- Product Details -->
                                    <h3 class="text-lg font-bold text-slate-900 dark:text-gray-100 mb-1 leading-tight group-hover:text-[#7FA82E] transition-colors">{{ $product->product_name }}</h3> <!-- Product name -->
                                    <p class="text-sm text-slate-500 dark:text-gray-400 line-clamp-2 mt-1">{{ $product->product_description }}</p> <!-- Product description -->
                                </div>
                            </a>

                            <div class="flex items-center justify-between p-5 pt-2 border-t border-slate-200 dark:border-[#1f3629] mt-auto">
                                <span class="text-xl font-bold text-[#7FA82E]">£{{ number_format($product->product_price,2) }}</span>

                                @if($product->product_stock_level > 0) <!-- Add to basket button, this if statement checks stock level -->
                                    <form action="{{ route('basket.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit"
                                                class="bg-[#2B332A] dark:bg-[#7FA82E] text-white p-2.5 rounded-full hover:bg-black dark:hover:bg-[#6d9126] transition shadow-md"
                                                title="Add to Basket">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                                            </svg>
                                        </button>
                                    </form>
                                @else <!-- Out of stock -->
                                    <span class="text-xs font-bold text-red-500 bg-red-100 dark:bg-red-900/20 px-2 py-1 rounded">
                                        Out of Stock
                                    </span>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-20 bg-slate-50 dark:bg-[#121e16] rounded-2xl border border-dashed border-slate-300 dark:border-[#1f3629]">  <!-- No products found message -->
                            <p class="text-slate-500 dark:text-gray-400 text-lg">No products found matching your criteria.</p>
                            <a href="{{ route('shop.index') }}" class="text-[#7FA82E] font-bold hover:underline mt-2 inline-block">View all products</a>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination Controls -->
                <div class="mt-8 flex justify-between items-center border-t border-gray-200 dark:border-[#1f3629] pt-6"> 
                    <div class="text-sm text-slate-600 dark:text-gray-400">
                        Showing <span class="font-bold text-slate-900 dark:text-white">{{ $products->firstItem() }}</span> - <span class="font-bold text-slate-900 dark:text-white">{{ $products->lastItem() }}</span> of <span class="font-bold text-slate-900 dark:text-white">{{ $products->total() }}</span> results
                    </div>

                    <div class="dark:text-white">
                        {{ $products->links() }} 
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>