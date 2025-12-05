<!-- In this Blade template, we display the user's active orders in their dashboard. If there are no active orders, an empty state message is shown with a call-to-action to start shopping. If there are active orders, they are displayed in a table format with relevant details and a link to view more information about each order. -->
<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-dashboard-tabs />

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6 text-[#7FA82E]">Active Orders</h2>

                    @if($orders->isEmpty())
                        <!-- Empty orders tabs -->
                        <div class="text-center py-12">
                            <div class="mb-4">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                            </div>
                            <h3 class="mt-2 text-sm font-semibold text-gray-900">No active orders</h3>
                            <p class="mt-1 text-sm text-gray-500">You don't have any orders being processed right now.</p>
                            <div class="mt-6">
                                <a href="/shop" class="inline-flex items-center rounded-md bg-[#2B332A] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-black">
                                    Start Shopping
                                </a>
                            </div>
                        </div>
                    @else
                        <!-- Orders table displaying active orders -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-left text-sm whitespace-nowrap">
                                <thead class="uppercase tracking-wider border-b-2 border-gray-200 bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-4 font-semibold text-gray-700">Order ID</th>
                                        <th class="px-6 py-4 font-semibold text-gray-700">Date</th>
                                        <th class="px-6 py-4 font-semibold text-gray-700">Total</th>
                                        <th class="px-6 py-4 font-semibold text-gray-700">Status</th>
                                        <th class="px-6 py-4 font-semibold text-gray-700">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100"> <!-- Loop through each order and display its details -->
                                    @foreach($orders as $order)
                                        <tr class="hover:bg-gray-50 transition">
                                            <td class="px-6 py-4 font-medium text-gray-900">#{{ $order->order_id }}</td>
                                            <td class="px-6 py-4 text-gray-500">{{ \Carbon\Carbon::parse($order->order_date)->format('M d, Y') }}</td> <!-- Format date -->
                                            <td class="px-6 py-4 font-bold text-gray-900">£{{ $order->order_total }}</td>
                                            <td class="px-6 py-4">
                                                <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                                    {{ $order->order_status }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="{{ route('dashboard.order-details', $order->order_id) }}" class="text-[#7FA82E] hover:underline font-bold">View Details</a>
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