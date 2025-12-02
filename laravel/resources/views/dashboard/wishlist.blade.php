<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <x-dashboard-tabs />

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6 text-[#7FA82E]">Saved Items</h2>

                    {{-- Grid of Items --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        
                        {{-- Example Item Card --}}
                        <div class="border rounded-lg p-4 hover:shadow-lg transition">
                            <div class="h-40 bg-gray-200 rounded mb-4 flex items-center justify-center">
                                <span class="text-gray-400">Image</span>
                            </div>
                            <h3 class="font-bold text-lg">Whey Protein</h3>
                            <p class="text-gray-500 text-sm mb-3">£24.99</p>
                            <button class="w-full bg-[#2B332A] text-white py-2 rounded text-sm font-bold hover:bg-black">
                                Move to Basket
                            </button>
                        </div>

                        {{-- Example Empty State (Use logic to show this if list is empty) --}}
                        {{-- 
                        <p class="col-span-full text-center text-gray-500 py-10">
                            You haven't saved any items yet. <a href="/shop" class="text-[#7FA82E]">Go Shopping</a>
                        </p> 
                        --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>