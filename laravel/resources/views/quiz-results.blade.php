<!-- This page displays the quiz results and personalized product recommendations based on the user's BMI score and fitness goals. -->

<x-layout>
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-[#7FA82E] rounded-full blur-[120px] opacity-10 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto relative z-10">
            
            <div class="text-center mb-16">
                <span class="text-[#7FA82E] font-bold tracking-widest uppercase text-sm mb-2 block">Results Ready</span>
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white mb-6">
                    Your Personalized <span class="text-[#7FA82E]">Plan</span>
                </h1>
                <!-- This section displays the user's BMI score prominently, along with a brief explanation. -->
                <div class="inline-flex flex-col items-center justify-center p-6 bg-white dark:bg-[#1a2920] rounded-3xl shadow-xl border border-gray-100 dark:border-[#2a4535] transform hover:scale-105 transition-transform duration-300">
                    <p class="text-sm text-gray-500 dark:text-gray-400 uppercase tracking-wide font-bold mb-1">Your BMI Score</p>
                    <div class="text-5xl font-black text-[#7FA82E]">
                        {{ number_format($bmiScore, 1) }}
                    </div>
                    <p class="text-xs text-gray-400 mt-2 font-medium">
                        Based on your input
                    </p>
                </div>
            </div>

            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-8 text-center md:text-left">
                Recommended for <span class="underline decoration-[#7FA82E]">You</span>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8"> <!-- This grid layout displays the recommended products. -->
                @forelse($recommendations as $product) 
                    <div class="bg-white dark:bg-[#1a2920] rounded-3xl shadow-lg border border-gray-100 dark:border-[#2a4535] overflow-hidden hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col group">
                        
                        <div class="h-64 bg-gray-50 dark:bg-[#121e16] flex items-center justify-center p-6 relative">
                            @if($product->product_image)
                                <img src="{{ asset($product->product_image) }}" 
                                     alt="{{ $product->product_name }}" 
                                     class="h-full w-full object-contain drop-shadow-sm group-hover:scale-110 transition-transform duration-500">
                            @else
                                <span class="text-gray-400 text-sm font-medium">No Image Available</span>
                            @endif
                            
                            <div class="absolute top-4 right-4 bg-[#7FA82E] text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                                Recommended
                            </div>
                        </div>

                        <div class="p-6 flex-1 flex flex-col">
                            <h3 class="font-bold text-xl text-gray-900 dark:text-white mb-2 leading-tight">
                                {{ $product->product_name }}
                            </h3>
                            
                            <div class="mt-auto pt-4 flex items-center justify-between">
                                <span class="text-2xl font-extrabold text-[#7FA82E]">
                                    £{{ number_format($product->product_price, 2) }}
                                </span>
                                
                                <form action="{{ route('basket.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                    <button class="bg-[#2B332A] dark:bg-[#7FA82E] text-white p-3 rounded-full hover:bg-black dark:hover:bg-[#6d9126] transition-colors shadow-lg flex items-center justify-center" title="Add to Basket">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty <!-- This section is displayed if there are no recommendations available for the user's goal. -->
                    <div class="col-span-3 text-center py-16 bg-white dark:bg-[#1a2920] rounded-3xl border border-dashed border-gray-300 dark:border-[#2a4535]">
                        <div class="inline-block p-4 rounded-full bg-gray-100 dark:bg-[#121e16] mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-gray-500 dark:text-gray-400 text-lg mb-6">No specific products found for your goal yet.</p>
                        <a href="/shop" class="inline-block bg-[#7FA82E] text-white font-bold py-3 px-8 rounded-full hover:bg-[#6d9126] transition shadow-lg">
                            Browse Shop
                        </a>
                    </div>
                @endforelse
            </div>

            <div class="mt-16 text-center">
                <p class="text-gray-500 dark:text-gray-400 mb-4">Want to try again or explore more?</p>
                <div class="flex justify-center gap-6">
                    <a href="{{ route('quiz.index') }}" class="text-gray-500 hover:text-[#2B332A] dark:text-gray-400 dark:hover:text-white font-semibold underline transition-colors">
                        Retake Quiz
                    </a>
                    <span class="text-gray-300">|</span>
                    <a href="{{ route('shop.index') }}" class="text-[#7FA82E] font-bold hover:underline">
                        View All Products
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-layout>