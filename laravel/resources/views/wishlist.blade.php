<x-layout>

    <div class="bg-gray-50 min-h-screen py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <h1 class="text-4xl font-bold text-[#1f5b38] mb-8">
                Your Wishlist
            </h1>

            @if($items->count())

                <div class="space-y-6">

                    @foreach($items as $item)

                        @php
                            $firstVariant = $item->product->variants->first();
                        @endphp

                        <div
                            class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex flex-col sm:flex-row items-center gap-6 hover:shadow-md transition">

                            <!-- IMAGE -->
                            <div class="w-32 h-32 flex-shrink-0 bg-gray-100 rounded-xl overflow-hidden">

                                @if($item->product->product_image)
                                    <img src="{{ asset($item->product->product_image) }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs">
                                        No Image
                                    </div>
                                @endif

                            </div>


                            <!-- PRODUCT INFO -->
                            <div class="flex-1 text-center sm:text-left">

                                <h3 class="text-xl font-bold text-gray-900">
                                    <a href="{{ route('products.show', $item->product->product_id) }}">
                                        {{ $item->product->product_name }}
                                    </a>
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    {{ $item->product->product_description }}
                                </p>

                                @if($firstVariant)
                                    <p class="text-sm text-gray-400 mt-1">
                                        From £{{ number_format($firstVariant->price, 2) }}
                                    </p>
                                @endif

                            </div>


                            <!-- ACTIONS -->
                            <div class="flex items-center gap-4">

                                <!-- ADD TO BASKET -->
                                @if($firstVariant)

                                    <form action="{{ route('basket.add') }}" method="POST">
                                        @csrf

                                        <input type="hidden" name="product_id" value="{{ $item->product->product_id }}">
                                        <input type="hidden" name="variant_id" value="{{ $firstVariant->id }}">
                                        <input type="hidden" name="quantity" value="1">

                                        <button type="submit" class="bg-[#2B332A] text-white px-4 py-2 rounded-md hover:bg-black">
                                            Add to Basket
                                        </button>

                                    </form>

                                @endif


                                <!-- REMOVE FROM WISHLIST -->
                                <form action="{{ route('wishlist.remove') }}" method="POST">
                                    @csrf

                                    <input type="hidden" name="product_id" value="{{ $item->product->product_id }}">

                                    <button type="submit" class="text-red-500 text-xl hover:scale-110 transition">
                                        ❤️
                                    </button>

                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="text-center py-20 bg-white rounded-2xl">

                    <h2 class="text-2xl font-bold mb-2">
                        Your wishlist is empty
                    </h2>

                    <a href="{{ route('shop.index') }}" class="text-[#1f5b38] underline">
                        Start Shopping
                    </a>

                </div>

            @endif

        </div>
    </div>

</x-layout>