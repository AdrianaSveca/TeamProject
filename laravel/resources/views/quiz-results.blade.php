<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-[#2B332A] mb-4">
                    Your Personalized Plan
                </h1>
                <p class="text-lg text-gray-600">
                    Based on your BMI of 
                    <span class="font-bold text-[#7FA82E]">
                        {{ number_format($bmiScore, 1) }}
                    </span>
                    ({{ $bmiStatus }}).
                </p>
            </div>

            <!-- RECOMMENDED PRODUCTS SECTION -->
            <div class="mb-16">
                <h2 class="text-2xl font-bold text-[#2B332A] mb-8 text-center">
                    Recommended Products
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @forelse($recommendations as $product)

                        <div class="bg-white rounded-xl shadow-md overflow-hidden 
                                    hover:shadow-xl transition duration-300 border border-gray-100">

                            <!-- Product Image -->
                            <div class="h-56 bg-gray-100 flex items-center justify-center p-4">
                                @if($product->product_image)
                                    <img src="{{ asset($product->product_image) }}" 
                                         class="h-full object-contain">
                                @else
                                    <span class="text-gray-400">No Image</span>
                                @endif
                            </div>

                            <div class="p-6">
                                <h3 class="font-bold text-xl text-gray-900 mb-2">
                                    {{ $product->product_name }}
                                </h3>

                                <p class="text-[#7FA82E] font-bold text-2xl mb-4">
                                    £{{ number_format($product->product_price, 2) }}
                                </p>
                                
                                <form action="{{ route('basket.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" 
                                           value="{{ $product->product_id }}">
                                    <button class="w-full bg-[#2B332A] text-white 
                                                   font-bold py-3 rounded-lg 
                                                   hover:bg-black transition">
                                        Add to Basket
                                    </button>
                                </form>
                            </div>
                        </div>

                    @empty
                        <div class="col-span-3 text-center py-12 bg-white rounded-lg">
                            <p class="text-gray-500">
                                No specific products found for your goal.
                                <a href="/shop" 
                                   class="text-[#7FA82E] font-bold">
                                   Browse Shop
                                </a>
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- FITNESS BREAKDOWN SECTION -->
            <div class="bg-white rounded-xl shadow-md p-8 mb-16 border border-gray-100">
    
    <h2 class="text-2xl font-bold text-[#2B332A] mb-8 text-center">
        Your Fitness Breakdown
    </h2>

    <!-- BMI PROGRESS BAR -->
<div class="mb-12">

    <!-- User BMI Number -->
    <div class="text-center mb-4">
        <span class="text-lg font-semibold text-[#2B332A]">
            Your BMI: {{ number_format($bmiScore, 1) }}
        </span>
    </div>

    <div class="relative w-full h-8 rounded-full overflow-hidden">

        <!-- Underweight (0 - 18.5) -->
        <div class="absolute left-0 top-0 h-full bg-blue-400"
             style="width: 46.25%;"></div>

        <!-- Healthy (18.5 - 25) -->
        <div class="absolute top-0 h-full bg-green-500"
             style="left:46.25%; width: 16.25%;"></div>

        <!-- Overweight (25 - 30) -->
        <div class="absolute top-0 h-full bg-yellow-400"
             style="left:62.5%; width: 12.5%;"></div>

        <!-- Obese (30 - 40) -->
        <div class="absolute top-0 h-full bg-red-500"
             style="left:75%; width: 25%;"></div>

        <!-- Marker -->
        <div class="absolute top-0 h-full"
             style="left: {{ min(max(($bmiScore / 40) * 100, 0), 100) }}%;">
            <div class="w-1 h-8 bg-black"></div>
        </div>

    </div>

    <!-- Bar labels-->
<div class="flex justify-between text-xs mt-3 text-gray-600">

    <span class="text-left">
        0
    </span>

    <span class="text-center">
        18.5<br>
        <span class="text-xs text-blue-500">Underweight</span>
    </span>

    <span class="text-center">
        25<br>
        <span class="text-xs text-green-600">Healthy</span>
    </span>

    <span class="text-center">
        30<br>
        <span class="text-xs text-yellow-600">Overweight</span>
    </span>

    <span class="text-right">
        40<br>
        <span class="text-xs text-red-600">Obese</span>
    </span>

</div>


</div>

    <!-- CALORIES -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        
        <div class="bg-gray-50 p-6 rounded-lg text-center">
            <p class="text-gray-500 text-sm">Maintenance Calories</p>
            <p class="text-2xl font-bold text-[#7FA82E]">
                {{ round($maintenance) }} kcal/day
            </p>
        </div>

        <div class="bg-gray-50 p-6 rounded-lg text-center">
            <p class="text-gray-500 text-sm">Daily Calories For Goal</p>
            <p class="text-2xl font-bold text-[#7FA82E]">
                {{ round($goalCalories) }} kcal/day
            </p>
        </div>

        <div class="bg-gray-50 p-6 rounded-lg text-center">
            <p class="text-gray-500 text-sm">BMI Category</p>
            <p class="text-2xl font-bold text-[#7FA82E]">
                {{ $bmiStatus }}
            </p>
        </div>

    </div>

    <!-- MACROs -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">

        <div class="bg-gray-50 p-6 rounded-lg text-center">

            <p class="text-gray-500 text-sm">Recommended Protein Intake</p>
            <p class="text-2xl font-bold text-[#7FA82E]">
                {{ round($proteinGrams) }} g/day
            </p>
        </div>

        <div class="bg-gray-50 p-6 rounded-lg text-center">
            <p class="text-gray-500 text-sm">Recommended Fat Intake</p>
            <p class="text-2xl font-bold text-[#7FA82E]">
                {{ round($fatGrams) }} g/day
            </p>
        </div>

        <div class="bg-gray-50 p-6 rounded-lg text-center">
            <p class="text-gray-500 text-sm">Recommended Carbohydrates Intake</p>
            <p class="text-2xl font-bold text-[#7FA82E]">
                {{ round($carbGrams) }} g/day
            </p>
        </div>

    </div>

    <!-- TRAINING PLAN -->
    <div>
        <h3 class="text-xl font-bold text-[#2B332A] mb-4 text-center">
            Your Training Plan
        </h3>

        <div class="bg-gray-50 p-6 rounded-lg text-gray-700 leading-relaxed">
            {!! $plan !!}
        </div>
    </div>

</div>

<!-- Retake Quiz Button -->
<div class="mt-12 text-center">
    <a href="{{ route('quiz.index') }}"
       class="inline-block px-6 py-3 bg-[#7FA82E] text-white font-semibold rounded-lg hover:bg-[#6e9628] transition duration-200">
        Retake Quiz
    </a>
</div>

</x-layout>
