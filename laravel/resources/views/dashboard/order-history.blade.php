<!-- In this file, we display the user's order history. 
    If there are no orders, we show a button to take them back to browse products. 
    If there are orders, we list them in a table with details and actions. -->

<x-layout>
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            
            <div class="mb-8">
                <x-dashboard-tabs />
            </div>

            <div class="bg-white dark:bg-[#1a2920] rounded-3xl shadow-xl border border-gray-100 dark:border-[#2a4535] overflow-hidden transition-colors duration-300">
                <div class="p-8">
                    <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-8 flex items-center gap-3">
                        <span class="w-2 h-8 bg-[#7FA82E] rounded-full"></span>
                        Order <span class="text-[#7FA82E]">History</span>
                    </h2>

                    @if($orders->isEmpty()) <!-- If there are no orders, show this message and button -->
                        <div class="text-center py-16">
                            <div class="mb-6 bg-gray-50 dark:bg-[#121e16] w-24 h-24 rounded-full flex items-center justify-center mx-auto shadow-inner">
                                <svg class="h-10 w-10 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">No order history</h3>
                            <p class="text-gray-500 dark:text-gray-400 max-w-sm mx-auto mb-8">You haven't completed any orders yet. Once you do, they will appear here.</p>
                            
                            <a href="/shop" class="inline-flex items-center justify-center bg-[#7FA82E] hover:bg-black dark:bg-[#7FA82E] dark:hover:bg-[#6d9126] text-white font-bold py-3 px-8 rounded-full shadow-lg transition-all duration-300">
                                Browse Products
                            </a>
                        </div>
                    @else <!-- If there are orders, show them in a table -->
                        <div class="overflow-x-auto rounded-2xl border border-gray-100 dark:border-[#2a4535]">
                            <table class="min-w-full text-left text-sm whitespace-nowrap">
                                <thead class="bg-gray-50 dark:bg-[#121e16] uppercase tracking-wider border-b border-gray-100 dark:border-[#2a4535]">
                                    <tr>
                                        <th scope="col" class="px-6 py-5 font-bold text-gray-700 dark:text-gray-300">Order ID</th>
                                        <th scope="col" class="px-6 py-5 font-bold text-gray-700 dark:text-gray-300">Date Delivered</th>
                                        <th scope="col" class="px-6 py-5 font-bold text-gray-700 dark:text-gray-300">Total</th>
                                        <th scope="col" class="px-6 py-5 font-bold text-gray-700 dark:text-gray-300">Status</th>
                                        <th scope="col" class="px-6 py-5 font-bold text-gray-700 dark:text-gray-300">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 dark:divide-[#2a4535]">
                                    @foreach($orders as $order)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-[#121e16]/50 transition-colors duration-200">
                                            <td class="px-6 py-5 font-bold text-gray-900 dark:text-white">
                                                #{{ $order->order_id ?? $order->id }}
                                            </td>
                                            <td class="px-6 py-5 text-gray-600 dark:text-gray-400">
                                                {{ \Carbon\Carbon::parse($order->order_date)->format('M d, Y') }}
                                            </td>
                                            <td class="px-6 py-5 font-bold text-[#7FA82E]">
                                                £{{ number_format($order->order_total, 2) }}
                                            </td>
                                            <td class="px-6 py-5">
                                                <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold uppercase tracking-wide border bg-green-100 text-green-800 border-green-200 dark:bg-green-900/30 dark:text-green-300 dark:border-green-800">
                                                    {{ $order->order_status }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-5 flex items-center gap-4">
                                                <a href="#" class="flex items-center gap-1 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors font-medium text-xs uppercase tracking-wide">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                                    Invoice
                                                </a>
                                                
                                                <span class="text-gray-300 dark:text-gray-600">|</span>
                                                
                                                <a href="#" class="flex items-center gap-1 text-[#7FA82E] hover:text-[#6d9126] transition-colors font-bold text-xs uppercase tracking-wide">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path></svg>
                                                    Return
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