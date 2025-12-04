<x-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden hover:shadow-[5px_5px_0_#2d322c] transition-all duration-300 sm:rounded-lg p-8 border-4 border-[#7FA82E]">
                
                <div class="text-center mb-10">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">Find Your Perfect Match</h1>
                    <p class="text-gray-600">Answer 5 quick questions to get personalized product recommendations.</p>
                </div>

                <form action="{{ route('quiz.submit') }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- Goals of the user -->
                    <div>
                        <label class="block text-lg font-bold text-gray-900 mb-4">1. What is your main goal?</label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                            <label class="relative cursor-pointer">
                                <input type="radio" name="goal" value="muscle" class="peer sr-only" required>
                                <div class="p-4 rounded-lg border-2 border-gray-200 hover:border-[#7FA82E] peer-checked:border-[#7FA82E] peer-checked:bg-green-50 transition">
                                    <div class="text-center">
                                        <span class="text-2xl block mb-2">💪</span>
                                        <span class="font-bold text-gray-800">Build Muscle</span>
                                    </div>
                                </div>
                            </label>

                            <label class="relative cursor-pointer">
                                <input type="radio" name="goal" value="weight_loss" class="peer sr-only">
                                <div class="p-4 rounded-lg border-2 border-gray-200 hover:border-[#7FA82E] peer-checked:border-[#7FA82E] peer-checked:bg-green-50 transition">
                                    <div class="text-center">
                                        <span class="text-2xl block mb-2">🏃</span>
                                        <span class="font-bold text-gray-800">Lose Weight</span>
                                    </div>
                                </div>
                            </label>
  
                            <label class="relative cursor-pointer">
                                <input type="radio" name="goal" value="general_health" class="peer sr-only">
                                <div class="p-4 rounded-lg border-2 border-gray-200 hover:border-[#7FA82E] peer-checked:border-[#7FA82E] peer-checked:bg-green-50 transition">
                                    <div class="text-center">
                                        <span class="text-2xl block mb-2">❤️</span>
                                        <span class="font-bold text-gray-800">General Health</span>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Gender -->
                    <div>
                        <label class="block text-lg font-bold text-gray-900 mb-2">2. Gender</label>
                        <select name="gender" class="w-full h-10 rounded-md border-gray-300 shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                            <option value="Male" class="text-center"> Male</option>
                            <option value="Female" class="text-center"> Female</option>
                            <option value="Other" class="text-center"> Other</option>
                        </select>
                    </div>

                    <!-- Age -->
                    <div>
                        <label class="block text-lg font-bold text-gray-900 mb-2">3. Age</label>
                        <input type="number" name="age" min="16" max="100" required placeholder="e.g., 25" 
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!--Height -->
                        <div>
                            <label class="block text-lg font-bold text-gray-900 mb-2">4. Height (cm)</label>
                            <input type="number" name="height" min="100" max="250" required placeholder="e.g., 175" 
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                        </div>

                        <!-- Weight -->
                        <div>
                            <label class="block text-lg font-bold text-gray-900 mb-2">5. Weight (kg)</label>
                            <input type="number" name="weight" min="30" max="300" required placeholder="e.g., 70" 
                                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                        </div>
                    </div>

                    <!-- Submit button -->
                    <div class="pt-4">
                        <button type="submit" class="w-full bg-[#2B332A] text-white font-bold py-4 rounded-lg hover:bg-black transition text-lg shadow-lg">
                            Get My Plan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-layout>