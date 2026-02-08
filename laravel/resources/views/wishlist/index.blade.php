<!-- the wishlist page
    displays all products the authenticated user has added to their wishlist & allows users to remove items and go to product pages-->
<x-layout>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- heading for the page -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-slate-900 mb-2">My Wishlist</h1>
            <p class="text-slate-600">Products you’ve saved for later.</p>
        </div>

        @if ($products->isEmpty())
            <!-- Empty Wishlist -->
            <div class="bg-slate-50 rounded-2xl p-12 text-center">
                <p class="text-lg text-slate-600 mb-4">
                    Your wishlist is empty
                </p>
                <a href="{{ route('shop.index') }}"
                    class="inline-block bg-[#1f5b38] text-white px-6 py-3 rounded-lg hover:bg-[#163f27] transition">
                    Browse Products
                </a>
            </div>
        @else
            <!-- wishlist grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($products as $product)
                    <div
                        class="bg-white border border-slate-200 rounded-2xl overflow-hidden hover:shadow-lg flex flex-col">

                        <a href="{{ route('products.show', $product->product_id) }}" class="group">
                            <div class="relative h-56 flex items-center justify-center overflow-hidden bg-white p-6">

                                <!-- remove from the wishlist  -->
                                <form method="POST" action="{{ route('wishlist.destroy', $product->product_id) }}"
                                    class="absolute top-3 right-3 z-10">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="bg-white rounded-full p-2 shadow hover:scale-105 transition"
                                        title="Remove from wishlist">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            stroke="currentColor" stroke-width="1.5" class="w-5 h-5 text-red-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5
                                                     -1.935 0-3.597 1.126-4.312 2.733
                                                     -.715-1.607-2.377-2.733-4.313-2.733
                                                     C5.1 3.75 3 5.765 3 8.25
                                                     c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                        </svg>
                                    </button>
                                </form>

                                @if ($product->product_image)
                                    <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}"
                                        class="w-full h-full object-contain group-hover:scale-105 transition duration-300">
                                @else
                                    <div class="text-slate-400 text-sm">No Image</div>
                                @endif
                            </div>

                            <div class="p-5">
                                <h3 class="text-lg font-bold text-slate-900 mb-1">
                                    {{ $product->product_name }}
                                </h3>
                                <p class="text-sm text-slate-500 line-clamp-2">
                                    {{ $product->product_description }}
                                </p>
                            </div>
                        </a>

                        <div class="flex items-center justify-between p-5 pt-2 border-t border-slate-200 mt-auto">
                            <span class="text-xl font-bold text-[#7FA82E]">
                                £{{ number_format($product->product_price, 2) }}
                            </span>

                            @if ($product->product_stock_level > 0)
                                <form action="{{ route('basket.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                    <input type="hidden" name="quantity" value="1">

                                    <button type="submit"
                                        class="bg-[#2B332A] text-white p-2 rounded-full hover:bg-black transition"
                                        title="Add to Basket">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 4.5v15m7.5-7.5h-15" />
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
                @endforeach
            </div>
        @endif

    </main>
</x-layout>
