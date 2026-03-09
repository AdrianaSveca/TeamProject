<!-- This is the admin dashboard view -->
<x-layout>
    @auth
        <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                
                <div class="bg-white dark:bg-[#1a2920] overflow-hidden shadow-2xl rounded-3xl border border-gray-100 dark:border-[#2a4535] transition-colors duration-300">
                    <div class="p-8 md:p-12">
                        
                        <div class="flex items-center gap-6 mb-8">
                            <div class="w-16 h-16 rounded-full bg-[#7FA82E]/10 flex items-center justify-center border border-[#7FA82E]/20"> <!-- Admin  Settings Icon. Dividing by 20 the border color is to define the colour's transparency to 20% (80% opacity) -->
                                <svg class="w-8 h-8 text-[#7FA82E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            
                            <div>
                                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">
                                    Admin <span class="text-[#7FA82E]">Dashboard</span>
                                </h2>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">Control Panel</p>
                            </div>
                        </div>

                        <div class="bg-[#2B332A] dark:bg-[#1a2920] rounded-3xl shadow-xl p-8 mb-10 text-white flex flex-col md:flex-row justify-between items-center relative overflow-hidden border border-gray-700 dark:border-[#2a4535]">
                            <div class="absolute top-0 right-0 w-64 h-64 bg-[#7FA82E] rounded-full blur-[80px] opacity-10 pointer-events-none"></div>
                            
                            <div class="relative z-10 text-center md:text-left mb-6 md:mb-0">
                                <h2 class="text-3xl md:text-4xl font-extrabold mb-2">Welcome, <span class="text-[#7FA82E]">{{ Auth::user()->name }}</span>!</h2>
                                <p class="text-gray-300 text-lg">Here is what's happening with your store today.</p>
                            </div>
                        </div>

                        <!-- Overview Statistics Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                            <!-- Total Orders -->
                            <div class="bg-white dark:bg-[#1a2920] rounded-2xl p-6 shadow-lg border-l-4 border-[#7FA82E] dark:border-[#7FA82E] transition-all duration-300 hover:shadow-xl hover:-translate-y-1 group">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <p class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Total Orders</p>
                                        <p class="text-4xl font-extrabold text-gray-900 dark:text-white mt-1">{{ $totalOrders }}</p>
                                    </div>
                                    <div class="p-3 bg-green-50 dark:bg-[#7FA82E]/10 rounded-full group-hover:bg-[#7FA82E] transition-colors duration-300">
                                        <svg class="w-8 h-8 text-[#7FA82E] group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('admin.orders') }}" class="text-sm font-bold text-[#7FA82E] hover:underline flex items-center gap-1">
                                        View All Orders <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                    </a>
                                </div>
                            </div>

                            <!-- Total Revenue -->
                            <div class="bg-white dark:bg-[#1a2920] rounded-2xl p-6 shadow-lg border-l-4 border-blue-600 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 group">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <p class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Total Revenue</p>
                                        <p class="text-4xl font-extrabold text-gray-900 dark:text-white mt-1">£{{ number_format($totalRevenue, 2) }}</p>
                                    </div>
                                    <div class="p-3 bg-blue-50 dark:bg-blue-900/20 rounded-full group-hover:bg-blue-600 transition-colors duration-300">
                                        <svg class="w-8 h-8 text-blue-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Users -->
                            <div class="bg-white dark:bg-[#1a2920] rounded-2xl p-6 shadow-lg border-l-4 border-purple-600 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 group">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <p class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Total Customers</p>
                                        <p class="text-4xl font-extrabold text-gray-900 dark:text-white mt-1">{{ $totalUsers }}</p>
                                    </div>
                                    <div class="p-3 bg-purple-50 dark:bg-purple-900/20 rounded-full group-hover:bg-purple-600 transition-colors duration-300">
                                        <svg class="w-8 h-8 text-purple-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('admin.users') }}" class="text-sm font-bold text-purple-600 hover:underline flex items-center gap-1">
                                        Manage Users <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                    </a>
                                </div>
                            </div>

                            <!-- Total Products -->
                            <div class="bg-white dark:bg-[#1a2920] rounded-2xl p-6 shadow-lg border-l-4 border-[#1F5B38] dark:border-[#2a4535] transition-all duration-300 hover:shadow-xl hover:-translate-y-1 group">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <p class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Total Products</p>
                                        <p class="text-4xl font-extrabold text-gray-900 dark:text-white mt-1">{{ $totalProducts }}</p>
                                    </div>
                                    <div class="p-3 bg-gray-100 dark:bg-gray-700/30 rounded-full group-hover:bg-[#1F5B38] transition-colors duration-300">
                                        <svg class="w-8 h-8 text-[#1F5B38] dark:text-gray-300 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('admin.products') }}" class="text-sm font-bold text-[#1F5B38] dark:text-gray-300 hover:underline flex items-center gap-1">
                                        Manage Products <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                    </a>
                                </div>
                            </div>

                            <!-- Pending Orders -->
                            <div class="bg-white dark:bg-[#1a2920] rounded-2xl p-6 shadow-lg border-l-4 border-yellow-600 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 group">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <p class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Pending Orders</p>
                                        <p class="text-4xl font-extrabold text-gray-900 dark:text-white mt-1">{{ $pendingOrders }}</p>
                                    </div>
                                    <div class="p-3 bg-yellow-50 dark:bg-yellow-900/20 rounded-full group-hover:bg-yellow-600 transition-colors duration-300">
                                        <svg class="w-8 h-8 text-yellow-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('admin.orders') }}?status=Pending" class="text-sm font-bold text-yellow-600 hover:underline flex items-center gap-1">
                                        Review Pending <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                    </a>
                                </div>
                            </div>

                            <!-- Active Discount Codes -->
                            <div class="bg-white dark:bg-[#1a2920] rounded-2xl p-6 shadow-lg border-l-4 border-indigo-600 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 group">
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <p class="text-sm font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wide">Active Codes</p>
                                        <p class="text-4xl font-extrabold text-gray-900 dark:text-white mt-1">{{ $activeDiscountCodes }}</p>
                                    </div>
                                    <div class="p-3 bg-indigo-50 dark:bg-indigo-900/20 rounded-full group-hover:bg-indigo-600 transition-colors duration-300">
                                        <svg class="w-8 h-8 text-indigo-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7a2 2 0 010-2.828l7-7A1.994 1.994 0 0112 3h5"></path></svg>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('admin.discount-codes') }}" class="text-sm font-bold text-indigo-600 hover:underline flex items-center gap-1">
                                        Manage Codes <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- KPIs Section -->
                        <div class="bg-white dark:bg-[#1a2920] rounded-3xl shadow-lg p-8 mb-10 border border-gray-100 dark:border-[#2a4535]">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Key Performance Indicators</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                                <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-xl p-6 border border-blue-200 dark:border-blue-800">
                                    <p class="text-sm font-bold text-blue-600 dark:text-blue-400 uppercase tracking-wide mb-2">Average Order Value</p>
                                    <p class="text-3xl font-extrabold text-blue-900 dark:text-blue-100">£{{ number_format($averageOrderValue, 2) }}</p>
                                </div>
                                <div class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 rounded-xl p-6 border border-green-200 dark:border-green-800">
                                    <p class="text-sm font-bold text-green-600 dark:text-green-400 uppercase tracking-wide mb-2">Orders This Month</p>
                                    <p class="text-3xl font-extrabold text-green-900 dark:text-green-100">{{ $ordersThisMonth }}</p>
                                </div>
                                <div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 rounded-xl p-6 border border-purple-200 dark:border-purple-800">
                                    <p class="text-sm font-bold text-purple-600 dark:text-purple-400 uppercase tracking-wide mb-2">Revenue This Month</p>
                                    <p class="text-3xl font-extrabold text-purple-900 dark:text-purple-100">£{{ number_format($revenueThisMonth, 2) }}</p>
                                </div>
                                <div class="bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 rounded-xl p-6 border border-orange-200 dark:border-orange-800">
                                    <p class="text-sm font-bold text-orange-600 dark:text-orange-400 uppercase tracking-wide mb-2">Low Stock Products</p>
                                    <p class="text-3xl font-extrabold text-orange-900 dark:text-orange-100">{{ $lowStockProducts }}</p>
                                </div>
                                <div class="bg-gradient-to-br from-teal-50 to-teal-100 dark:from-teal-900/20 dark:to-teal-800/20 rounded-xl p-6 border border-teal-200 dark:border-teal-800">
                                    <p class="text-sm font-bold text-teal-600 dark:text-teal-400 uppercase tracking-wide mb-2">Shipped Orders</p>
                                    <p class="text-3xl font-extrabold text-teal-900 dark:text-teal-100">{{ $shippedOrders }}</p>
                                </div>
                                <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 dark:from-emerald-900/20 dark:to-emerald-800/20 rounded-xl p-6 border border-emerald-200 dark:border-emerald-800">
                                    <p class="text-sm font-bold text-emerald-600 dark:text-emerald-400 uppercase tracking-wide mb-2">Delivered Orders</p>
                                    <p class="text-3xl font-extrabold text-emerald-900 dark:text-emerald-100">{{ $deliveredOrders }}</p>
                                </div>
                                <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 dark:from-indigo-900/20 dark:to-indigo-800/20 rounded-xl p-6 border border-indigo-200 dark:border-indigo-800">
                                    <p class="text-sm font-bold text-indigo-600 dark:text-indigo-400 uppercase tracking-wide mb-2">New Users This Month</p>
                                    <p class="text-3xl font-extrabold text-indigo-900 dark:text-indigo-100">{{ $newUsersThisMonth }}</p>
                                </div>
                                <div class="bg-gradient-to-br from-pink-50 to-pink-100 dark:from-pink-900/20 dark:to-pink-800/20 rounded-xl p-6 border border-pink-200 dark:border-pink-800">
                                    <p class="text-sm font-bold text-pink-600 dark:text-pink-400 uppercase tracking-wide mb-2">Completion Rate</p>
                                    <p class="text-3xl font-extrabold text-pink-900 dark:text-pink-100">
                                        {{ $totalOrders > 0 ? number_format(($deliveredOrders / $totalOrders) * 100, 1) : 0 }}%
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Orders Section -->
                        <div class="bg-white dark:bg-[#1a2920] rounded-3xl shadow-lg p-8 mb-10 border border-gray-100 dark:border-[#2a4535]">
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Recent Orders</h3>
                                <a href="{{ route('admin.orders') }}" class="text-sm font-bold text-[#7FA82E] hover:underline flex items-center gap-1">
                                    View All <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </a>
                            </div>
                            
                            @if($recentOrders->isEmpty())
                                <div class="text-center py-8">
                                    <p class="text-gray-500 dark:text-gray-400 italic">No orders yet.</p>
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
                                            @foreach($recentOrders as $order)
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
                            @endif
                        </div>

                        <!-- Quick Actions / Management Links -->
                        <div class="bg-white dark:bg-[#1a2920] rounded-3xl shadow-lg p-8 border border-gray-100 dark:border-[#2a4535]">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Quick Actions</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                <a href="{{ route('admin.products') }}" class="inline-flex items-center rounded-xl bg-[#7FA82E]/10 dark:bg-[#7FA82E]/20 border border-[#7FA82E]/30 px-5 py-3 text-[#7FA82E] font-semibold hover:bg-[#7FA82E]/20 dark:hover:bg-[#7FA82E]/30 transition-colors">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                                    Manage Products
                                </a>
                                <a href="{{ route('admin.orders') }}" class="inline-flex items-center rounded-xl bg-blue-600/10 dark:bg-blue-600/20 border border-blue-600/30 px-5 py-3 text-blue-600 dark:text-blue-400 font-semibold hover:bg-blue-600/20 dark:hover:bg-blue-600/30 transition-colors">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                    Manage Orders
                                </a>
                                <a href="{{ route('admin.users') }}" class="inline-flex items-center rounded-xl bg-purple-600/10 dark:bg-purple-600/20 border border-purple-600/30 px-5 py-3 text-purple-600 dark:text-purple-400 font-semibold hover:bg-purple-600/20 dark:hover:bg-purple-600/30 transition-colors">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                    Manage Users
                                </a>
                                <a href="{{ route('admin.discount-codes') }}" class="inline-flex items-center rounded-xl bg-indigo-600/10 dark:bg-indigo-600/20 border border-indigo-600/30 px-5 py-3 text-indigo-600 dark:text-indigo-400 font-semibold hover:bg-indigo-600/20 dark:hover:bg-indigo-600/30 transition-colors">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7a2 2 0 010-2.828l7-7A1.994 1.994 0 0112 3h5"></path></svg>
                                    Manage Discount Codes
                                </a>
                                <a href="{{ route('shop.index') }}" class="inline-flex items-center rounded-xl bg-gray-200 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 px-5 py-3 text-gray-700 dark:text-gray-300 font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                    View Shop
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endauth
</x-layout>