<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Navigation Tabs --}}
            <x-dashboard-tabs />

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6 text-[#7FA82E]">Order History</h2>

                    {{-- Orders Table --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-left text-sm whitespace-nowrap">
                            <thead class="uppercase tracking-wider border-b-2 border-gray-200">
                                <tr>
                                    <th scope="col" class="px-6 py-4">Order #</th>
                                    <th scope="col" class="px-6 py-4">Date</th>
                                    <th scope="col" class="px-6 py-4">Total</th>
                                    <th scope="col" class="px-6 py-4">Status</th>
                                    <th scope="col" class="px-6 py-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Example Static Row (You will loop this later) --}}
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium">#ORD-001</td>
                                    <td class="px-6 py-4">Nov 20, 2025</td>
                                    <td class="px-6 py-4">£45.00</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Delivered</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="text-[#7FA82E] hover:underline font-semibold">Return Item</a>
                                    </td>
                                </tr>
                                
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium">#ORD-002</td>
                                    <td class="px-6 py-4">Oct 15, 2025</td>
                                    <td class="px-6 py-4">£120.50</td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Delivered</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-gray-400">Return Expired</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layout>