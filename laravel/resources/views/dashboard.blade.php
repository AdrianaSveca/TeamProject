<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <x-dashboard-tabs />

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-4">Welcome back, {{ Auth::user()->name }}!</h2>
                    <p class="mb-4">This is your account overview.</p>
                    
                    </div>
            </div>

        </div>
    </div>
</x-layout>