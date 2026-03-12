<!-- This is the product detail page that displays comprehensive information about a specific product -->
<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 md:p-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                    <!-- IMAGE -->
                    <div class="bg-gray-100 rounded-lg overflow-hidden h-[590px] flex items-center justify-center">
                        @if($product->product_image)
                            <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}"
                                class="w-full h-full object-contain">
                        @else
                            <span class="text-gray-400">No Image Available</span>
                        @endif
                    </div>

                    <!-- PRODUCT INFO -->
                    <div class="flex flex-col justify-center">

                        <span
                            class="inline-block bg-[#1f5b38] text-white text-xs px-2 py-1 rounded-full w-fit mb-2 shadow-[3px_3px_0_#2d322c]">
                            {{ $product->category->category_name ?? 'General' }}
                        </span>

                        <h1 class="text-4xl font-bold text-gray-900 mb-4">
                            {{ $product->product_name }}
                        </h1>

                        @php
                            $avgRating = round($product->reviews->avg('rating'), 1);
                            $totalReviews = $product->reviews->count();
                        @endphp

                        <div class="flex items-center gap-2 mb-4">

                            <span class="text-gray-700 text-sm font-semibold">
                                {{ number_format($avgRating, 1) }}
                            </span>

                            <div class="text-yellow-500 text-sm">
                                {{ str_repeat('★', round($avgRating)) }}
                            </div>

                            <a href="#reviews" class="text-sm text-gray-500 underline">
                                ({{ $totalReviews }} Reviews)
                            </a>

                        </div>

                        <div id="price" class="text-2xl font-bold text-[#7FA82E] mb-6">
                            £{{ number_format($product->product_price, 2) }}
                        </div>


                        <div id="servingPrice" class="text-sm text-gray-500 mb-4">
                            £0.00 / serving
                        </div>

                        <div class="prose text-gray-600 mb-8">
                            <p>{{ $product->product_description }}</p>
                        </div>

                        <!-- STOCK -->
                        <div class="mb-6">
                            <span
                                class="font-bold {{ $product->product_stock_level > 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $product->product_stock_level }} Left in Stock
                            </span>

                            @if($product->product_stock_level > 0 && $product->product_stock_level < 5)
                                <span class="text-sm text-red-500 ml-2">
                                    Only {{ $product->product_stock_level }} left!
                                </span>
                            @endif
                        </div>

                        <!--SERVING SIZE-->
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Size
                            </label>

                            <div class="flex gap-2 flex-wrap">
                                @foreach($product->variants as $variant)
                                    <button type="button"
                                        onclick="selectVariant({{ $variant->id }}, {{ $variant->price }}, {{ $variant->servings }}, this)"
                                        class="variant-btn px-4 py-2 border rounded-md hover:bg-gray-100">
                                        {{ $variant->size }}
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <!-- ADD TO BASKET -->
                        @if($product->product_stock_level > 0)

                                <form action="{{ route('basket.add') }}" method="POST" class="flex flex-col gap-4">
                                    @csrf

                                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                    <input type="hidden" id="variant_id" name="variant_id" required>

                                    {{-- FLAVOURS --}}
                                    @if(!empty($product->flavours))
                                        @php
                                            $flavours = json_decode($product->flavours, true);
                                        @endphp

                                        @if(is_array($flavours) && count($flavours))
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                                    Select Flavour
                                                </label>

                                                <select name="flavour" required
                                                    class="w-full h-12 px-4 text-sm rounded-md border border-gray-300 shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                                    <option disabled selected>Select a flavour</option>

                                                    @foreach($flavours as $flavour)
                                                        <option value="{{ $flavour }}">
                                                            {{ $flavour }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        @endif
                                    @endif


                                    <div class="flex gap-4">

                                        <input type="number" name="quantity" value="1" min="1"
                                            max="{{ $product->product_stock_level }}" class="w-20 rounded-md border-gray-300">

                                        <button type="submit"
                                            class="flex-1 bg-[#2B332A] text-white font-bold py-3 rounded-md hover:bg-black">
                                            Add to Basket
                                        </button>

                                </form>


                                <!-- WISHLIST -->
                                <form action="{{ route('wishlist.add') }}" method="POST">
                                    @csrf

                                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">

                                    <button type="submit" class="px-6 py-3 border border-gray-300 rounded-md hover:bg-gray-100">
                                        ♡ Wishlist
                                    </button>

                                </form>

                            </div>

                        @else

                        <button disabled class="w-full bg-gray-300 text-gray-500 font-bold py-3 rounded-md">
                            Out of Stock
                        </button>

                    @endif

                    <!-- 🔥 PRODUCT SECTIONS -->
                    <div class="border-t pt-6 mt-6 space-y-2 text-sm">

                        @php
                            $sections = [
                                'Information' => $product->information ?? null,
                                'Directions' => $product->directions ?? null,
                                'Ingredients' => $product->ingredients ?? null,
                                'Nutrition' => $product->nutrition ?? null,
                                'FAQs' => $product->faqs ?? null,
                                'Reviews' => true,
                            ];
                        @endphp

                        @foreach($sections as $title => $content)

                            {{-- NUTRITION --}}
                            @if($title === 'Nutrition' && $content)

                                @php
                                    $nutrition = json_decode($content, true);
                                @endphp

                                <details class="group border-b pb-2">
                                    <summary
                                        class="flex justify-between items-center cursor-pointer font-medium text-gray-800 py-3">
                                        Nutrition
                                        <span class="group-open:rotate-180 text-xs">▼</span>
                                    </summary>

                                    <div class="mt-2">

                                        @if(is_array($nutrition))
                                            <div class="border rounded-lg overflow-hidden">

                                                <div class="grid grid-cols-3 bg-gray-100 p-3 font-semibold text-sm">
                                                    <div></div>
                                                    <div class="text-center">per 100g</div>
                                                    <div class="text-center">per serving</div>
                                                </div>

                                                @foreach($nutrition as $item)
                                                    <div class="grid grid-cols-3 p-3 border-t">
                                                        <div class="font-medium">
                                                            {{ $item['name'] }}
                                                            @if(isset($item['sub']))
                                                                <div class="text-xs text-gray-500 italic">
                                                                    {{ $item['sub'] }}
                                                                </div>
                                                            @endif
                                                        </div>

                                                        <div class="text-center">
                                                            {{ $item['per_100g'] ?? '-' }}
                                                        </div>

                                                        <div class="text-center">
                                                            {{ $item['per_serving'] ?? '-' }}
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        @endif

                                    </div>
                                </details>

                            @elseif($title === 'Reviews')

                                <details id="reviews" class="group border-b pb-2">
                                    <summary
                                        class="flex justify-between items-center cursor-pointer font-medium text-gray-800 py-3">
                                        Customer Reviews
                                        <span class="group-open:rotate-180 text-xs">▼</span>
                                    </summary>

                                    <div class="mt-4 space-y-6">

                                        @php
                                            $avgRating = round($product->reviews->avg('rating'), 1);
                                            $totalReviews = $product->reviews->count();

                                            $ratings = [
                                                5 => $product->reviews->where('rating', 5)->count(),
                                                4 => $product->reviews->where('rating', 4)->count(),
                                                3 => $product->reviews->where('rating', 3)->count(),
                                                2 => $product->reviews->where('rating', 2)->count(),
                                                1 => $product->reviews->where('rating', 1)->count(),
                                            ];
                                        @endphp

                                        <div class="flex items-center gap-2 mb-4">

                                            @if($totalReviews > 0)

                                                <span class="text-gray-700 text-sm font-semibold">
                                                    {{ number_format($avgRating, 1) }}
                                                </span>


                                                <div class="text-yellow-500 text-sm">
                                                    {{ $totalReviews > 0 ? str_repeat('★', round($avgRating)) : '★★★★★' }}
                                                </div>

                                                <span class="text-gray-500 text-sm">
                                                    ({{ $totalReviews }} Reviews)
                                                </span>

                                            @else

                                                <span class="text-gray-500 text-sm">
                                                    No reviews yet
                                                </span>

                                            @endif

                                        </div>


                                        <!-- Rating Bars -->
                                        <div class="space-y-2 max-w-sm">

                                            @foreach($ratings as $stars => $count)

                                                <div class="flex items-center gap-3 text-sm">

                                                    <span class="w-6">{{ $stars }}★</span>

                                                    <div class="flex-1 bg-gray-200 rounded h-2">
                                                        <div class="bg-yellow-400 h-2 rounded"
                                                            style="width: {{ $totalReviews ? ($count / $totalReviews) * 100 : 0 }}%">
                                                        </div>
                                                    </div>

                                                    <span class="w-6 text-gray-500">
                                                        {{ $count }}
                                                    </span>

                                                </div>

                                            @endforeach

                                        </div>


                                        <!-- Individual Reviews -->
                                        @if($product->reviews->count())

                                            @foreach($product->reviews as $review)

                                                <div class="border-t pt-4">

                                                    <div class="flex justify-between text-sm mb-1">

                                                        <strong>{{ $review->name }}</strong>

                                                        <span class="text-gray-400">
                                                            {{ $review->created_at->format('d/m/y') }}
                                                        </span>
                                                    </div>

                                                    <div class="text-yellow-500">
                                                        {{ str_repeat('★', $review->rating) }}
                                                    </div>

                                                    <p class="text-gray-600 mt-2 text-sm">
                                                        {{ $review->review }}
                                                    </p>

                                                </div>

                                            @endforeach

                                        @endif

                                        <button onclick="toggleReviewForm()"
                                            class="text-sm border border-gray-300 px-4 py-2 rounded-md hover:bg-gray-100">
                                            Write a Review
                                        </button>

                                        <div id="reviewForm" class="hidden mt-6">
                                            <form action="{{ route('reviews.store') }}" method="POST" class="mt-4 space-y-3">
                                                @csrf

                                                <input type="hidden" name="product_id" value="{{ $product->product_id }}">

                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700">Your Name</label>
                                                    <input type="text" name="name" required
                                                        class="w-full border rounded px-3 py-2">
                                                </div>

                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700">Email</label>
                                                    <input type="email" name="email" required
                                                        class="w-full border rounded px-3 py-2">
                                                </div>

                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700">Rating</label>
                                                    <select name="rating" required class="w-full border rounded px-3 py-2">
                                                        <option value="5">★★★★★</option>
                                                        <option value="4">★★★★</option>
                                                        <option value="3">★★★</option>
                                                        <option value="2">★★</option>
                                                        <option value="1">★</option>
                                                    </select>
                                                </div>

                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700">Review</label>
                                                    <textarea name="review" required
                                                        class="w-full border rounded px-3 py-2"></textarea>
                                                </div>

                                                <button type="submit"
                                                    class="text-sm border border-gray-300 px-4 py-2 rounded-md hover:bg-gray-100">
                                                    Submit Review
                                                </button>

                                            </form>
                                        </div>

                                    </div>
                                </details>

                                {{-- FAQ --}}
                            @elseif($content)

                                <details class="group border-b pb-2">
                                    <summary
                                        class="flex justify-between items-center cursor-pointer font-medium text-gray-800 py-3">
                                        {{ $title }}
                                        <span class="group-open:rotate-180 text-xs">▼</span>
                                    </summary>

                                    <div class="mt-2 text-gray-600">

                                        {{-- FAQs --}}
                                        @if($title === 'FAQs')

                                            @foreach(array_filter(explode("\n\n", $content)) as $faq)
                                                @php $lines = explode("\n", trim($faq)); @endphp

                                                <div class="mb-4">
                                                    @foreach($lines as $line)
                                                        <p>
                                                            <span class="font-semibold">
                                                                {{ str_starts_with($line, 'Q:') ? 'Q:' : 'A:' }}
                                                            </span>
                                                            {{ trim(substr($line, 2)) }}
                                                        </p>
                                                    @endforeach
                                                </div>
                                            @endforeach

                                            {{-- NORMAL TEXT --}}
                                        @else

                                            @foreach(array_filter(explode("\n\n", $content)) as $paragraph)
                                                <p class="mb-3">{{ trim($paragraph) }}</p>
                                            @endforeach

                                        @endif

                                    </div>
                                </details>

                            @endif

                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

    <script>

        function toggleReviewForm() {
            const form = document.getElementById('reviewForm');
            form.classList.toggle('hidden');
        }

        function selectVariant(id, price, servings, button) {

            // store variant id for basket
            document.getElementById('variant_id').value = id;

            // update price
            document.getElementById('price').innerText =
                "£" + price.toFixed(2);

            // calculate cost per serving
            const perServing = price / servings;

            document.getElementById('servingPrice').innerText =
                "£" + perServing.toFixed(2) + " / serving";

            // highlight selected size
            document.querySelectorAll('.variant-btn')
                .forEach(btn => btn.classList.remove('bg-black', 'text-white'));

            button.classList.add('bg-black', 'text-white');
        }

        window.onload = function () {
            const firstVariant = document.querySelector('.variant-btn');
            if (firstVariant) {
                firstVariant.click();
            }
        }

    </script>

</x-layout>