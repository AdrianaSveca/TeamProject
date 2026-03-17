<!-- This file is for the Active Orders page in the user dashboard. 
    It displays a list of the user's current orders that are being processed, along with their details and status. 
    If there are no active orders, it shows a friendly message encouraging the user to start shopping. -->

<x-layout>
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            
            <div class="mb-8"> <!-- Dashboard navigation tabs -->
                <x-dashboard-tabs />
            </div>

            <div class="bg-white dark:bg-[#1a2920] rounded-3xl shadow-xl border border-gray-100 dark:border-[#2a4535] overflow-hidden transition-colors duration-300">
                <div class="p-8">
                    <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-8 flex items-center gap-3">
                        <span class="w-2 h-8 bg-[#7FA82E] rounded-full"></span>
                        Active <span class="text-[#7FA82E]">Orders</span>
                    </h2>

                    @if($orders->isEmpty()) <!-- If there are no active orders, show a message -->
                        <div class="text-center py-16">
                            <div class="mb-6 bg-gray-50 dark:bg-[#121e16] w-24 h-24 rounded-full flex items-center justify-center mx-auto shadow-inner">
                                <svg class="h-10 w-10 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">No active orders</h3>
                            <p class="text-gray-500 dark:text-gray-400 max-w-sm mx-auto mb-8">You don't have any orders being processed right now. Time to fuel up!</p>
                            
                            <a href="/shop" class="inline-flex items-center justify-center bg-[#7FA82E] hover:bg-[#6d9126] text-white font-bold py-3 px-8 rounded-full shadow-lg hover:shadow-[#7FA82E]/40 hover:-translate-y-1 transition-all duration-300">
                                Start Shopping
                            </a>
                        </div>
                    @else <!-- If there are active orders, display them in a table -->
                        <div class="overflow-x-auto rounded-2xl border border-gray-100 dark:border-[#2a4535]">
                            <table class="min-w-full text-left text-sm whitespace-nowrap">
                                <thead class="bg-gray-50 dark:bg-[#121e16] uppercase tracking-wider border-b border-gray-100 dark:border-[#2a4535]">
                                    <tr>
                                        <th class="px-6 py-5 font-bold text-gray-700 dark:text-gray-300">Order ID</th>
                                        <th class="px-6 py-5 font-bold text-gray-700 dark:text-gray-300">Date</th>
                                        <th class="px-6 py-5 font-bold text-gray-700 dark:text-gray-300">Total</th>
                                        <th class="px-6 py-5 font-bold text-gray-700 dark:text-gray-300">Status</th>
                                        <th class="px-6 py-5 font-bold text-gray-700 dark:text-gray-300 text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 dark:divide-[#2a4535]"> 
                                    @foreach($orders as $order)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-[#121e16]/50 transition-colors duration-200">
                                            <td class="px-6 py-5 font-bold text-gray-900 dark:text-white">
                                                #{{ $order->order_id }}
                                            </td>
                                            <td class="px-6 py-5 text-gray-600 dark:text-gray-400">
                                                {{ \Carbon\Carbon::parse($order->order_date)->format('M d, Y') }} <!-- Format the order date -->
                                            </td>
                                            <td class="px-6 py-5 font-bold text-[#7FA82E]">
                                                £{{ number_format($order->order_total, 2) }}
                                            </td>
                                            <td class="px-6 py-5">
                                                <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold uppercase tracking-wide border 
                                                    {{ $order->order_status === 'Delivered' 
                                                        ? 'bg-green-100 text-green-800 border-green-200 dark:bg-green-900/30 dark:text-green-300 dark:border-green-800' 
                                                        : 'bg-blue-100 text-blue-800 border-blue-200 dark:bg-blue-900/30 dark:text-blue-300 dark:border-blue-800' }}">
                                                    {{ $order->order_status }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-5 text-right">
                                                <a href="{{ route('dashboard.order-details', $order->order_id) }}" class="inline-flex items-center text-sm font-bold text-gray-500 dark:text-gray-400 hover:text-[#7FA82E] dark:hover:text-[#7FA82E] transition-colors">
                                                    View Details <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
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