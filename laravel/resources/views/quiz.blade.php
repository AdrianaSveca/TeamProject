<!-- This is the Quiz page where users can answer questions to receive personalized product recommendations. -->

<x-layout>
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        
        <div class="max-w-3xl w-full space-y-8 bg-white dark:bg-[#1a2920] p-10 rounded-3xl shadow-2xl border border-gray-100 dark:border-[#2a4535] relative overflow-hidden transition-colors duration-300">
            
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-[#7FA82E]  rounded-full blur-[80px] opacity-20 pointer-events-none"></div>

            <div class="text-center relative z-10">
                <h2 class="text-[#7FA82E] font-bold tracking-wide uppercase text-sm mb-2">Personalized Nutrition</h2>
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white mb-4">
                    Find Your Perfect <span class="text-[#7FA82E]">Match</span>
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-xl mx-auto">
                    Answer 5 quick questions and our algorithm will build the perfect supplement stack for your body type and goals.
                </p>
            </div>

            <form action="{{ route('quiz.submit') }}" method="POST" class="mt-8 space-y-8 relative z-10">
                @csrf
                <!-- Goals of the user --> 
                <div>
                    <label class="block text-xl font-bold text-gray-900 dark:text-white mb-4">
                        1. What is your main goal?
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        
                        <label class="relative cursor-pointer group">
                            <input type="radio" name="goal" value="muscle" class="peer sr-only" required>
                            <div class="p-6 rounded-2xl border-2 border-gray-200 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] hover:border-[#7FA82E] dark:hover:border-[#7FA82E] peer-checked:border-[#7FA82E] peer-checked:bg-[#7FA82E]/10 peer-checked:dark:bg-[#7FA82E]/20 transition-all duration-200 h-full flex flex-col items-center justify-center text-center">
                                <span class="text-4xl mb-3 transform group-hover:scale-110 transition-transform duration-200">💪</span>
                                <span class="font-bold text-gray-800 dark:text-gray-200 peer-checked:text-[#7FA82E]">Build Muscle</span>
                            </div>
                            <div class="absolute top-3 right-3 opacity-0 peer-checked:opacity-100 text-[#7FA82E] transition-opacity">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            </div>
                        </label>

                        <label class="relative cursor-pointer group">
                            <input type="radio" name="goal" value="weight_loss" class="peer sr-only">
                            <div class="p-6 rounded-2xl border-2 border-gray-200 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] hover:border-[#7FA82E] dark:hover:border-[#7FA82E] peer-checked:border-[#7FA82E] peer-checked:bg-[#7FA82E]/10 peer-checked:dark:bg-[#7FA82E]/20 transition-all duration-200 h-full flex flex-col items-center justify-center text-center">
                                <span class="text-4xl mb-3 transform group-hover:scale-110 transition-transform duration-200">🏃</span>
                                <span class="font-bold text-gray-800 dark:text-gray-200 peer-checked:text-[#7FA82E]">Lose Weight</span>
                            </div>
                            <div class="absolute top-3 right-3 opacity-0 peer-checked:opacity-100 text-[#7FA82E] transition-opacity">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            </div>
                        </label>
  
                        <label class="relative cursor-pointer group">
                            <input type="radio" name="goal" value="general_health" class="peer sr-only">
                            <div class="p-6 rounded-2xl border-2 border-gray-200 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] hover:border-[#7FA82E] dark:hover:border-[#7FA82E] peer-checked:border-[#7FA82E] peer-checked:bg-[#7FA82E]/10 peer-checked:dark:bg-[#7FA82E]/20 transition-all duration-200 h-full flex flex-col items-center justify-center text-center">
                                <span class="text-4xl mb-3 transform group-hover:scale-110 transition-transform duration-200">❤️</span>
                                <span class="font-bold text-gray-800 dark:text-gray-200 peer-checked:text-[#7FA82E]">General Health</span>
                            </div>
                            <div class="absolute top-3 right-3 opacity-0 peer-checked:opacity-100 text-[#7FA82E] transition-opacity">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            </div>
                        </label>
                    </div>
                </div>
                <!-- Gender -->
                <div>
                    <label class="block text-lg font-bold text-gray-900 dark:text-white mb-2">2. Gender</label>
                    <div class="relative">
                        <select name="gender" class="block w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring focus:ring-[#7FA82E] focus:ring-opacity-50 py-3 px-4 appearance-none transition-colors">
                            <option value="" disabled selected>Select your gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>
                <!-- Age -->
                <div>
                    <label class="block text-lg font-bold text-gray-900 dark:text-white mb-2">3. Age</label>
                    <input type="number" name="age" min="16" max="100" required placeholder="e.g., 25" 
                           class="block w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring focus:ring-[#7FA82E] focus:ring-opacity-50 py-3 px-4 placeholder-gray-400 transition-colors">
                </div>
                <!--Height -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-lg font-bold text-gray-900 dark:text-white mb-2">4. Height (cm)</label>
                        <input type="number" name="height" min="100" max="250" required placeholder="e.g., 175" 
                               class="block w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring focus:ring-[#7FA82E] focus:ring-opacity-50 py-3 px-4 placeholder-gray-400 transition-colors">
                    </div>
                    <!-- Weight -->
                    <div>
                        <label class="block text-lg font-bold text-gray-900 dark:text-white mb-2">5. Weight (kg)</label>
                        <input type="number" name="weight" min="30" max="300" required placeholder="e.g., 70" 
                               class="block w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring focus:ring-[#7FA82E] focus:ring-opacity-50 py-3 px-4 placeholder-gray-400 transition-colors">
                    </div>
                </div>
                <!-- Submit button -->
                <div class="pt-6">
                    <button type="submit" class="w-full bg-[#7FA82E] hover:bg-[#6d9126] text-white font-extrabold py-4 rounded-full transition-all duration-300 text-lg shadow-lg hover:shadow-[#7FA82E]/40 transform hover:-translate-y-1 flex items-center justify-center gap-2">
                        Get My Personalized Plan
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                    </button>
                    <p class="text-center text-xs text-gray-500 dark:text-gray-400 mt-4">
                        By continuing, you agree to receive recommendations based on your input.
                    </p>
                </div>

            </form>
        </div>
    </div>
</x-layout>