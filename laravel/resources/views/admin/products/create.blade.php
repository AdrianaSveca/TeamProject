<!-- This is the admin product creation page. It provides a form to create a new product with all required fields (name, description, price, stock, category, image). -->

<x-layout>
    @auth
        <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
                    <a href="{{ route('admin.products') }}" class="inline-flex items-center text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-[#7FA82E] transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Back to Products
                    </a>
                </div>

                <div class="bg-white dark:bg-[#1a2920] overflow-hidden shadow-2xl rounded-3xl border border-gray-100 dark:border-[#2a4535] transition-colors duration-300">
                    <div class="p-8 md:p-12">
                        <div class="flex items-center gap-6 mb-8">
                            <div class="w-16 h-16 rounded-full bg-[#7FA82E]/10 flex items-center justify-center border border-[#7FA82E]/20">
                                <svg class="w-8 h-8 text-[#7FA82E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            </div>
                            <div>
                                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">Create New <span class="text-[#7FA82E]">Product</span></h2>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">Add a new product to your store.</p>
                            </div>
                        </div>

                        <form action="{{ route('admin.products.store') }}" method="POST" class="space-y-6">
                            @csrf

                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Product Name *</label>
                                <input type="text" name="product_name" required value="{{ old('product_name') }}"
                                       class="w-full rounded-lg border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#121e16] text-gray-900 dark:text-white focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                @error('product_name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Description *</label>
                                <textarea name="product_description" required rows="4"
                                          class="w-full rounded-lg border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#121e16] text-gray-900 dark:text-white focus:border-[#7FA82E] focus:ring-[#7FA82E]">{{ old('product_description') }}</textarea>
                                @error('product_description')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Price (£) *</label>
                                    <input type="number" name="product_price" required step="0.01" min="0" value="{{ old('product_price') }}"
                                           class="w-full rounded-lg border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#121e16] text-gray-900 dark:text-white focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                    @error('product_price')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Stock Level *</label>
                                    <input type="number" name="product_stock_level" required min="0" value="{{ old('product_stock_level', 0) }}"
                                           class="w-full rounded-lg border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#121e16] text-gray-900 dark:text-white focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                    @error('product_stock_level')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Category *</label>
                                <select name="category_id" required
                                        class="w-full rounded-lg border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#121e16] text-gray-900 dark:text-white focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                    <option value="">Select a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->category_id }}" {{ old('category_id') == $category->category_id ? 'selected' : '' }}>
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Image URL (optional)</label>
                                <input type="text" name="product_image" value="{{ old('product_image') }}"
                                       placeholder="e.g., images/product.jpg"
                                       class="w-full rounded-lg border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#121e16] text-gray-900 dark:text-white focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                @error('product_image')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>

                            <div class="flex gap-4 pt-4">
                                <button type="submit" class="flex-1 bg-[#7FA82E] hover:bg-[#6d9126] text-white font-bold py-3 px-6 rounded-xl transition-colors">
                                    Create Product
                                </button>
                                <a href="{{ route('admin.products') }}" class="px-6 py-3 border border-gray-300 dark:border-[#2a4535] rounded-xl text-gray-700 dark:text-gray-300 font-bold hover:bg-gray-50 dark:hover:bg-[#121e16] transition-colors">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endauth
</x-layout>
