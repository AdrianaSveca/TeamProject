<x-layout>
    @auth
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-red-600">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-4 text-red-600">User Dashboard</h2>
                    <p>Welcome back, {{ Auth::user()->name }}. Here you can manage inventory and orders.</p>
                    </div>
            </div>
        </div>
    </div>
    @endauth
</x-layout>