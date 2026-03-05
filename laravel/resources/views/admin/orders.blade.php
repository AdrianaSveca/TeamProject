<!-- This is the admin orders page. It lists all orders with their details (order ID, customer, date, total, status) for admin management. Orders can be filtered by status. -->

<x-layout>
    @auth
        <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
                    <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-[#7FA82E] transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Back to Admin
                    </a>
                </div>

                <div class="bg-white dark:bg-[#1a2920] overflow-hidden shadow-2xl rounded-3xl border border-gray-100 dark:border-[#2a4535] transition-colors duration-300">
                    <div class="p-8 md:p-12">
                        <div class="flex items-center gap-6 mb-8">
                            <div class="w-16 h-16 rounded-full bg-blue-600/10 flex items-center justify-center border border-blue-600/20">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                            </div>
                            <div>
                                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">Manage <span class="text-blue-600">Orders</span></h2>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">View and manage all customer orders.</p>
                            </div>
                        </div>

                        <!-- Filter by status -->
                        <div class="mb-6 flex gap-2 flex-wrap">
                            <a href="{{ route('admin.orders') }}" class="px-4 py-2 rounded-lg text-sm font-semibold {{ !request('status') ? 'bg-[#7FA82E] text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600' }} transition-colors">
                                All
                            </a>
                            <a href="{{ route('admin.orders', ['status' => 'Pending']) }}" class="px-4 py-2 rounded-lg text-sm font-semibold {{ request('status') === 'Pending' ? 'bg-yellow-600 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600' }} transition-colors">
                                Pending
                            </a>
                            <a href="{{ route('admin.orders', ['status' => 'Shipped']) }}" class="px-4 py-2 rounded-lg text-sm font-semibold {{ request('status') === 'Shipped' ? 'bg-blue-600 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600' }} transition-colors">
                                Shipped
                            </a>
                            <a href="{{ route('admin.orders', ['status' => 'Delivered']) }}" class="px-4 py-2 rounded-lg text-sm font-semibold {{ request('status') === 'Delivered' ? 'bg-green-600 text-white' : 'bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600' }} transition-colors">
                                Delivered
                            </a>
                        </div>

                        @if($orders->isEmpty())
                            <div class="text-center py-16">
                                <p class="text-gray-500 dark:text-gray-400">No orders found.</p>
                            </div>
                        @else
                            <div class="overflow-x-auto rounded-2xl border border-gray-100 dark:border-[#2a4535]">
                                <table class="min-w-full text-left text-sm">
                                    <thead class="bg-gray-50 dark:bg-[#121e16] uppercase tracking-wider border-b border-gray-100 dark:border-[#2a4535]">
                                        <tr>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300">Order ID</th>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300">Customer</th>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300">Date</th>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300">Total</th>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300">Status</th>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300 text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 dark:divide-[#2a4535]">
                                        @foreach($orders as $order)
                                            <tr class="hover:bg-gray-50 dark:hover:bg-[#121e16]/50 transition-colors duration-200">
                                                <td class="px-6 py-4 font-bold text-gray-900 dark:text-white">#{{ $order->order_id }}</td>
                                                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $order->user ? $order->user->name : 'Unknown' }}</td>
                                                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ \Carbon\Carbon::parse($order->order_date)->format('M d, Y') }}</td>
                                                <td class="px-6 py-4 font-bold text-[#7FA82E]">£{{ number_format($order->order_total, 2) }}</td>
                                                <td class="px-6 py-4">
                                                    <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-bold uppercase tracking-wide border 
                                                        {{ $order->order_status === 'Delivered' 
                                                            ? 'bg-green-100 text-green-800 border-green-200 dark:bg-green-900/30 dark:text-green-300 dark:border-green-800' 
                                                            : ($order->order_status === 'Shipped'
                                                                ? 'bg-blue-100 text-blue-800 border-blue-200 dark:bg-blue-900/30 dark:text-blue-300 dark:border-blue-800'
                                                                : 'bg-yellow-100 text-yellow-800 border-yellow-200 dark:bg-yellow-900/30 dark:text-yellow-300 dark:border-yellow-800') }}">
                                                        {{ $order->order_status }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 text-right">
                                                    <a href="{{ route('admin.order-details', $order->order_id) }}" class="inline-flex items-center text-sm font-bold text-gray-500 dark:text-gray-400 hover:text-[#7FA82E] dark:hover:text-[#7FA82E] transition-colors">
                                                        View Details <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            @if($orders->hasPages())
                                <div class="mt-6">
                                    {{ $orders->links() }}
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endauth
</x-layout>
