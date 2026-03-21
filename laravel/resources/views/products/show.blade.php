<!-- This is the product details page where users can view information about a specific product and add it to their basket. -->

<x-layout>
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8 transition-colors duration-300">
        <div class="max-w-7xl mx-auto">

            <div class="mb-8">
                @if(isset($fromAdmin) && $fromAdmin || (Auth::check() && Auth::user()->role === 'admin'))
                    <a href="{{ route('admin.products') }}" class="inline-flex items-center text-sm font-bold text-gray-500 hover:text-[#7FA82E] transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Admin Products
                    </a>
                @else
                    <a href="{{ route('shop.index') }}" class="inline-flex items-center text-sm font-bold text-gray-500 hover:text-[#7FA82E] transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Shop
                    </a>
                @endif
            </div>

            <!-- Product Details Card -->
            <div class="bg-white dark:bg-[#1a2920] rounded-3xl shadow-2xl border border-gray-100 dark:border-[#2a4535] overflow-hidden transition-colors duration-300">
                <div class="grid grid-cols-1 md:grid-cols-2">

                    <!-- Swipeable Gallery Section -->
                    <div class="bg-gray-50 dark:bg-[#121e16] h-[400px] md:h-auto flex items-center justify-center p-8 relative overflow-hidden group">

                        @php
                            $images = [$product->product_image];
                            if(!empty($product->product_image_2)) $images[] = $product->product_image_2;
                            if(!empty($product->product_image_3)) $images[] = $product->product_image_3;
                        @endphp

                        @if(count($images))
                        <div class="relative w-full h-full">
                            @foreach($images as $index => $img)
                                <img src="{{ asset($img) }}" alt="{{ $product->product_name }}"
                                     class="gallery-image absolute inset-0 w-full h-full object-contain drop-shadow-xl z-0 @if($index===0) z-10 @else hidden @endif transition-transform duration-500 ease-in-out group-hover:scale-110">
                            @endforeach

                            @if(count($images) > 1)
                                <!-- Arrows -->
                                <button id="prevBtn" class="absolute left-2 top-1/2 -translate-y-1/2 bg-gray-700/50 text-white rounded-full p-2 hover:bg-gray-700/80 transition-colors z-20">
                                    &#10094;
                                </button>
                                <button id="nextBtn" class="absolute right-2 top-1/2 -translate-y-1/2 bg-gray-700/50 text-white rounded-full p-2 hover:bg-gray-700/80 transition-colors z-20">
                                    &#10095;
                                </button>

                                <!-- Clickable Dots -->
                                <div class="absolute bottom-2 left-1/2 -translate-x-1/2 flex gap-2 z-20">
                                    @foreach($images as $i => $img)
                                        <span class="dot w-3 h-3 rounded-full bg-gray-400 dark:bg-gray-600 @if($i===0) bg-[#7FA82E] @endif cursor-pointer" data-index="{{ $i }}"></span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        @else
                            <div class="flex flex-col items-center justify-center text-gray-400 dark:text-gray-600">
                                <svg class="w-16 h-16 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="font-medium">No Image Available</span>
                            </div>
                        @endif

                        <div class="absolute inset-0 bg-radial-gradient from-[#7FA82E]/5 to-transparent pointer-events-none"></div>

                    </div>

                    <!-- Product Info Section -->
                    <div class="p-8 md:p-12 flex flex-col justify-center">
                        <div class="flex items-center justify-between mb-6">
                            <span class="inline-block bg-[#7FA82E]/10 text-[#7FA82E] text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider border border-[#7FA82E]/20">
                                {{ $product->category->category_name ?? 'General' }}
                            </span>

                            @if($product->product_stock_level > 0)
                                <span class="flex items-center text-green-600 dark:text-green-400 text-sm font-bold gap-2">
                                    <span class="relative flex h-3 w-3">
                                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                      <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                                    </span>
                                    In Stock
                                </span>
                            @else
                                <span class="flex items-center text-red-500 text-sm font-bold gap-2">
                                    <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                                    Out of Stock
                                </span>
                            @endif
                        </div>

                        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white mb-4 leading-tight">
                            {{ $product->product_name }}
                        </h1>

                        <div class="text-3xl font-black text-[#7FA82E] mb-6 flex items-center gap-3">
                            £{{ number_format($product->product_price, 2) }}
                        </div>

                        <div class="prose prose-lg text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                            <p>{{ $product->product_description }}</p>
                        </div>

                        @if($product->product_stock_level > 0 && $product->product_stock_level < 5)
                            <div class="mb-8 bg-orange-50 dark:bg-orange-900/20 border border-orange-200 dark:border-orange-800 rounded-xl p-4 flex items-start gap-3">
                                <svg class="w-5 h-5 text-orange-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                                <div>
                                    <span class="text-sm font-bold text-orange-700 dark:text-orange-300 block">Low Stock Alert</span>
                                    <span class="text-xs text-orange-600 dark:text-orange-400">Only {{ $product->product_stock_level }} left! Grab yours before it's gone.</span>
                                </div>
                            </div>
                        @endif

                        <div class="mt-auto pt-6 border-t border-gray-100 dark:border-[#2a4535]">
                            @if($product->product_stock_level > 0)
                                <form action="{{ route('basket.add') }}" method="POST" class="flex flex-col sm:flex-row gap-4">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                    
                                    <div class="w-full sm:w-32">
                                        <label for="quantity" class="sr-only">Quantity</label>
                                        <input type="number" name="quantity" value="1" min="1" max="{{ $product->product_stock_level }}"
                                               class="block w-full rounded-full border-gray-300 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E] py-4 px-4 text-center font-bold text-lg">
                                    </div>

                                    <button type="submit"
                                            class="flex-1 bg-[#7FA82E] hover:bg-[#6d9126] text-white font-extrabold py-4 px-8 rounded-full shadow-lg hover:shadow-[#7FA82E]/40 hover:-translate-y-1 transition-all duration-300 text-lg flex items-center justify-center gap-2">
                                        <span>Add to Basket</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                    </button>
                                </form>
                            @else
                                <button disabled class="w-full bg-gray-200 dark:bg-gray-700 text-gray-400 dark:text-gray-500 font-bold py-4 rounded-full cursor-not-allowed">
                                    Currently Out of Stock
                                </button>
                            @endif
                        </div>

                        <!-- Product Benefits Section -->
                        <div class="mt-8 flex gap-6 text-gray-400 dark:text-gray-500 justify-center md:justify-start border-t border-transparent pt-2">
                            <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Fast Delivery
                            </div>
                            <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Verified Quality
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS for Gallery -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const images = document.querySelectorAll('.gallery-image');
            const dots = document.querySelectorAll('.dot');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            let current = 0;

            function showSlide(index) {
                images.forEach((img)=> img.classList.add('hidden'));
                dots.forEach((dot)=> dot.classList.remove('bg-[#7FA82E]'));
                images[index].classList.remove('hidden');
                dots[index].classList.add('bg-[#7FA82E]');
                current = index;
            }

            if(prevBtn && nextBtn){
                prevBtn.addEventListener('click', ()=> showSlide((current-1+images.length)%images.length));
                nextBtn.addEventListener('click', ()=> showSlide((current+1)%images.length));
            }

            dots.forEach(dot=>{
                dot.addEventListener('click',()=> showSlide(parseInt(dot.dataset.index)));
            });
        });
    </script>
</x-layout>