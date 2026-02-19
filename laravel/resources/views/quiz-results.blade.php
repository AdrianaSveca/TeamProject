<!-- This is the Quiz Results page, displaying personalized product recommendations based on the user's BMI score. -->
<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- This is the header of the quiz results page -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-[#2B332A] mb-4">Your Personalized Plan</h1>
                <p class="text-lg text-gray-600">Based on your BMI of <span class="font-bold text-[#7FA82E]">{{ number_format($bmiScore, 1) }}</span> ({{ $bmiScore }}).</p>
            </div>

            <!-- Recommended Products -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($recommendations as $product) <!-- Loop through recommended products -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300 border border-gray-100">
                        {{-- Product Image --}}
                        <div class="h-56 bg-gray-100 flex items-center justify-center p-4">
                            @if($product->product_image)
                                <img src="{{ asset($product->product_image) }}" class="h-full object-contain">
                            @else
                                <span class="text-gray-400">No Image</span>
                            @endif
                        </div>

                        <div class="p-6">
                            <h3 class="font-bold text-xl text-gray-900 mb-2">{{ $product->product_name }}</h3>
                            <p class="text-[#7FA82E] font-bold text-2xl mb-4">£{{ number_format($product->product_price, 2) }}</p>
                            
                            <form action="{{ route('basket.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                <button class="w-full bg-[#2B332A] text-white font-bold py-3 rounded-lg hover:bg-black transition">
                                    Add to Basket
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12 bg-white rounded-lg">
                        <p class="text-gray-500">No specific products found for your goal. <a href="/shop" class="text-[#7FA82E] font-bold">Browse Shop</a></p>
                    </div>
                @endforelse
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('quiz.index') }}" class="text-gray-500 hover:text-[#2B332A] underline">Retake Quiz</a>
            </div>

        </div>
    </div>
</x-layout>