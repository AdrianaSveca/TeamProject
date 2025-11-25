<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 h-[600px]"> {{-- Fixed height for chat --}}
            
            <x-dashboard-tabs />

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-full flex flex-col">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-2xl font-bold text-[#7FA82E]">WELLTH Personal Trainer</h2>
                    <p class="text-sm text-gray-500">Ask me anything about workouts, diet, or our products!</p>
                </div>

                {{-- Chat Messages Area --}}
                <div class="flex-1 overflow-y-auto p-6 space-y-4 bg-gray-50">
                    {{-- Bot Message --}}
                    <div class="flex justify-start">
                        <div class="bg-[#7FA82E] text-white rounded-lg py-2 px-4 max-w-xs shadow">
                            Hello! How can I help you reach your fitness goals today?
                        </div>
                    </div>

                    {{-- User Message Example --}}
                    <div class="flex justify-end">
                        <div class="bg-white border border-gray-200 text-gray-800 rounded-lg py-2 px-4 max-w-xs shadow">
                            I need a protein powder for weight loss.
                        </div>
                    </div>
                </div>

                {{-- Input Area --}}
                <div class="p-4 border-t border-gray-200 bg-white">
                    <form class="flex gap-4">
                        <input type="text" placeholder="Type your message..." class="flex-1 rounded-full border-gray-300 focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                        <button type="submit" class="bg-[#2B332A] text-white rounded-full px-6 py-2 font-bold hover:bg-black transition">
                            Send
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>