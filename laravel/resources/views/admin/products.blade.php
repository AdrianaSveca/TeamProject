<!-- This is the admin products page. It lists all products with their details (name, price, stock, category) for admin management. -->

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
                            <div class="w-16 h-16 rounded-full bg-[#7FA82E]/10 flex items-center justify-center border border-[#7FA82E]/20">
                                <svg class="w-8 h-8 text-[#7FA82E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                            </div>
                            <div>
                                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">Manage <span class="text-[#7FA82E]">Products</span></h2>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">View and manage all products in your store.</p>
                            </div>
                        </div>

                        @if(session('status'))
                            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 dark:bg-emerald-900/30 dark:border-emerald-800 px-4 py-3 text-sm text-emerald-800 dark:text-emerald-200">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="mb-6">
                            <a href="{{ route('admin.products.create') }}" class="inline-flex items-center rounded-xl bg-[#7FA82E] hover:bg-[#6d9126] text-white font-semibold px-5 py-3 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                Add New Product
                            </a>
                        </div>

                        @if($products->isEmpty())
                            <p class="text-gray-500 dark:text-gray-400">No products found.</p>
                        @else
                            <div class="overflow-x-auto rounded-2xl border border-gray-100 dark:border-[#2a4535]">
                                <table class="min-w-full text-left text-sm">
                                    <thead class="bg-gray-50 dark:bg-[#121e16] uppercase tracking-wider border-b border-gray-100 dark:border-[#2a4535]">
                                        <tr>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300">Product</th>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300">Category</th>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300">Price</th>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300">Stock</th>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300 text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 dark:divide-[#2a4535]">
                                        @foreach($products as $product)
                                            <tr class="hover:bg-gray-50 dark:hover:bg-[#121e16]/50">
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center gap-3">
                                                        @if($product->product_image)
                                                            <img src="{{ asset($product->product_image) }}" alt="{{ $product->product_name }}" class="w-12 h-12 object-contain rounded-lg">
                                                        @endif
                                                        <div>
                                                            <p class="font-bold text-gray-900 dark:text-white">{{ $product->product_name }}</p>
                                                            <p class="text-xs text-gray-500 dark:text-gray-400 line-clamp-1">{{ $product->product_description }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $product->category ? $product->category->category_name : '—' }}</td>
                                                <td class="px-6 py-4 font-bold text-[#7FA82E]">£{{ number_format($product->product_price, 2) }}</td>
                                                <td class="px-6 py-4">
                                                    <span class="px-2 py-1 rounded-full text-xs font-bold {{ ($product->product_stock_level ?? 0) > 0 ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300' : 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300' }}">
                                                        {{ $product->product_stock_level ?? 0 }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 text-right">
                                                    <div class="flex items-center justify-end gap-2">
                                                        <a href="{{ route('products.show', ['id' => $product->product_id, 'admin' => 1]) }}" class="text-sm font-bold text-[#7FA82E] hover:underline">View</a>
                                                        <span class="text-gray-300 dark:text-gray-600">|</span>
                                                        <a href="{{ route('admin.products.edit', $product->product_id) }}" class="text-sm font-bold text-blue-600 hover:underline">Edit</a>
                                                        <span class="text-gray-300 dark:text-gray-600">|</span>
                                                        <form action="{{ route('admin.products.destroy', $product->product_id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-sm font-bold text-red-600 hover:underline">Delete</button>
                                                        </form>
                                                    </div>
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
    @endauth
</x-layout>
