<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Navigation Tabs --}}
            <x-dashboard-tabs />

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6 text-[#7FA82E]">Order History</h2>

                    @if($orders->isEmpty())
                        {{-- EMPTY STATE (If no past orders found) --}}
                        <div class="text-center py-12">
                            <div class="mb-4">
                                {{-- History Icon --}}
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="mt-2 text-sm font-semibold text-gray-900">No order history</h3>
                            <p class="mt-1 text-sm text-gray-500">You haven't completed any orders yet.</p>
                            <div class="mt-6">
                                <a href="/shop" class="inline-flex items-center rounded-md bg-[#2B332A] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-black transition">
                                    Browse Products
                                </a>
                            </div>
                        </div>
                    @else
                        {{-- REAL DATA TABLE --}}
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-left text-sm whitespace-nowrap">
                                <thead class="uppercase tracking-wider border-b-2 border-gray-200 bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 font-semibold text-gray-700">Order ID</th>
                                        <th scope="col" class="px-6 py-4 font-semibold text-gray-700">Date Delivered</th>
                                        <th scope="col" class="px-6 py-4 font-semibold text-gray-700">Total</th>
                                        <th scope="col" class="px-6 py-4 font-semibold text-gray-700">Status</th>
                                        <th scope="col" class="px-6 py-4 font-semibold text-gray-700">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($orders as $order)
                                        <tr class="hover:bg-gray-50 transition">
                                            <td class="px-6 py-4 font-medium text-gray-900">
                                                #{{ $order->order_id ?? $order->id }}
                                            </td>
                                            <td class="px-6 py-4 text-gray-500">
                                                {{ \Carbon\Carbon::parse($order->order_date)->format('M d, Y') }}
                                            </td>
                                            <td class="px-6 py-4 font-bold text-gray-900">
                                                £{{ number_format($order->order_total, 2) }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                                    {{ $order->order_status }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 flex space-x-3">
                                                {{-- View Invoice (Placeholder link) --}}
                                                <a href="#" class="text-gray-600 hover:text-[#2B332A] font-medium">
                                                    View Invoice
                                                </a>
                                                <span class="text-gray-300">|</span>
                                                {{-- Return Item Button --}}
                                                <a href="#" class="text-[#7FA82E] hover:text-[#6d9126] font-bold">
                                                    Return Item
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-layout>