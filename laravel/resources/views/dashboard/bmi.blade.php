<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <x-dashboard-tabs />

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Calculator Form --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h2 class="text-2xl font-bold mb-4 text-[#7FA82E]">Update Your Stats</h2>
                    <p class="text-gray-600 mb-6">Enter your details to get personalized product recommendations.</p>

                    <form action="#" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Height (cm)</label>
                            <input type="number" name="height" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Weight (kg)</label>
                            <input type="number" name="weight" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Goal</label>
                            <select name="goal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                <option>Lose Weight</option>
                                <option>Build Muscle</option>
                                <option>Maintain Health</option>
                            </select>
                        </div>
                        <button type="submit" class="w-full bg-[#7FA82E] text-white font-bold py-2 px-4 rounded hover:bg-[#6d9126] transition">
                            Calculate & Save
                        </button>
                    </form>
                </div>

                {{-- Results / Recommendations Placeholder --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col justify-center items-center text-center">
                    <div class="bg-gray-100 p-4 rounded-full mb-4">
                        <svg class="w-12 h-12 text-[#7FA82E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Your Current BMI: <span class="text-[#7FA82E]">22.5</span></h3>
                    <p class="text-gray-500 mt-2">You are in the healthy range! Based on your goal to "Build Muscle", we recommend these supplements:</p>
                    <a href="/shop" class="mt-4 text-[#7FA82E] font-bold hover:underline">View Recommendations &rarr;</a>
                </div>
            </div>

        </div>
    </div>
</x-layout>