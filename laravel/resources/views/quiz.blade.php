<x-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden hover:shadow-[5px_5px_0_#2d322c] transition-all duration-300 sm:rounded-lg p-8 border-4 border-[#7FA82E]">
                
                <div class="text-center mb-10">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">
                        Find Your Perfect Match
                    </h1>
                    <p class="text-gray-600">
                        Answer a few quick questions to get personalized recommendations.
                    </p>
                </div>

                <form action="{{ route('quiz.submit') }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- 1. Goal -->
                    <div>
                        <label class="block text-lg font-bold text-gray-900 mb-4">
                            1. What is your main goal?
                        </label>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-stretch">

                            <!-- Build Muscle -->
                            <label class="relative cursor-pointer">
                                <input type="radio" name="goal" value="muscle" class="peer sr-only" required>
                                <div class="h-32 flex flex-col justify-center items-center p-4 rounded-lg border-2 border-gray-200 hover:border-[#7FA82E] peer-checked:border-[#7FA82E] peer-checked:bg-green-50 transition text-center">
                                    <span class="text-2xl">💪</span>
                                    <div class="font-bold text-gray-800 mt-2">
                                        Build Muscle
                                    </div>
                                </div>
                            </label>

                            <!-- Lose Weight -->
                            <label class="relative cursor-pointer">
                                <input type="radio" name="goal" value="weight_loss" class="peer sr-only">
                                <div class="h-32 flex flex-col justify-center items-center p-4 rounded-lg border-2 border-gray-200 hover:border-[#7FA82E] peer-checked:border-[#7FA82E] peer-checked:bg-green-50 transition text-center">
                                    <span class="text-2xl">🏃</span>
                                    <div class="font-bold text-gray-800 mt-2">
                                        Lose Weight
                                    </div>
                                </div>
                            </label>

                            <!-- General Health / Body Recomp -->
                            <label class="relative cursor-pointer">
                                <input type="radio" name="goal" value="general_health" class="peer sr-only">
                                <div class="h-32 flex flex-col justify-center items-center p-4 rounded-lg border-2 border-gray-200 hover:border-[#7FA82E] peer-checked:border-[#7FA82E] peer-checked:bg-green-50 transition text-center">
                                    <span class="text-2xl">❤️</span>
                                    <div class="font-bold text-gray-800 mt-2 leading-tight">
                                        General Health/<br>
                                        Body Recomp
                                    </div>
                                </div>
                            </label>

                        </div>
                    </div>

                    @php
                        $fieldClass = "w-full h-12 px-4 text-sm rounded-md border border-gray-300 shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E] focus:ring-1 transition";
                    @endphp

                    <!-- 2. Gender -->
                    <div>
                        <label class="block text-lg font-bold text-gray-900 mb-2">
                            2. Gender
                        </label>

                        <select name="gender" required class="{{ $fieldClass }} text-gray-500">
                            <option value="" disabled selected hidden>
                                Select your gender
                            </option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <!-- 3. Age -->
                    <div>
                        <label class="block text-lg font-bold text-gray-900 mb-2">
                            3. Age
                        </label>
                        <input type="number"
                               name="age"
                               min="16"
                               max="100"
                               required
                               placeholder="e.g., 25"
                               class="{{ $fieldClass }}">
                    </div>

                    <!-- Height & Weight -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label class="block text-lg font-bold text-gray-900 mb-2">
                                4. Height (cm)
                            </label>
                            <input type="number"
                                   name="height"
                                   min="100"
                                   max="250"
                                   required
                                   placeholder="e.g., 175"
                                   class="{{ $fieldClass }}">
                        </div>

                        <div>
                            <label class="block text-lg font-bold text-gray-900 mb-2">
                                5. Weight (kg)
                            </label>
                            <input type="number"
                                   name="weight"
                                   min="30"
                                   max="300"
                                   required
                                   placeholder="e.g., 70"
                                   class="{{ $fieldClass }}">
                        </div>

                    </div>

                    <!-- 6. Experience -->
                    <div>
                        <label class="block text-lg font-bold text-gray-900 mb-2">
                            6. Experience Level
                        </label>

                        <select name="experience" required class="{{ $fieldClass }} text-gray-500">
                            <option value="" disabled selected hidden>
                                Select your experience level
                            </option>
                            <option value="beginner">Beginner</option>
                            <option value="intermediate">Intermediate</option>
                            <option value="advanced">Advanced</option>
                            <option value="expert">Expert</option>
                        </select>
                    </div>

                    <!-- 7. Activity -->
                    <div>
                        <label class="block text-lg font-bold text-gray-900 mb-2">
                            7. Activity Level
                        </label>

                        <select name="activity" required class="{{ $fieldClass }} text-gray-500">
                            <option value="" disabled selected hidden>
                                Select your activity level
                            </option>
                            <option value="1.2">Sedentary (little/no exercise)</option>
                            <option value="1.375">Lightly Active (1-3 days)</option>
                            <option value="1.55">Moderately Active (3-5 days)</option>
                            <option value="1.725">Very Active (6-7 days)</option>
                            <option value="1.9">Extremely Active</option>
                        </select>
                    </div>

                    <!-- 8. Training Days -->
                    <div>
                        <label class="block text-lg font-bold text-gray-900 mb-2">
                            8. Training Days Per Week
                        </label>

                        <select name="days" required class="{{ $fieldClass }} text-gray-500">
                            <option value="" disabled selected hidden>
                                Select training days per week
                            </option>
                            <option value="2">2 Days</option>
                            <option value="3">3 Days</option>
                            <option value="4">4 Days</option>
                            <option value="5">5 Days</option>
                            <option value="6">6 Days</option>
                        </select>
                    </div>

                    <!-- Submit -->
                    <div class="pt-4">
                        <button type="submit"
                                class="w-full bg-[#2B332A] text-white font-bold py-4 rounded-lg hover:bg-black transition text-lg shadow-lg">
                            Get My Plan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-layout>
