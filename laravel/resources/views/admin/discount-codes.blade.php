<!-- This is the admin discount codes page. It lists all existing discount codes and provides a form to create new ones (code, type, value, min order, validity dates, usage limit, active). Admins can also delete codes from the list. -->

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
                                <svg class="w-8 h-8 text-[#7FA82E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7a2 2 0 010-2.828l7-7A1.994 1.994 0 0112 3h5"></path></svg>
                            </div>
                            <div>
                                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">Discount <span class="text-[#7FA82E]">Codes</span></h2>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">Create and manage codes for checkout.</p>
                            </div>
                        </div>

                        @if(session('status'))
                            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 dark:bg-emerald-900/30 dark:border-emerald-800 px-4 py-3 text-sm text-emerald-800 dark:text-emerald-200">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('admin.discount-codes.store') }}" method="POST" class="bg-gray-50 dark:bg-[#121e16] rounded-2xl p-6 mb-10 border border-gray-100 dark:border-[#2a4535]">
                            @csrf
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Add new code</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">Code</label>
                                    <input type="text" name="code" required maxlength="64" placeholder="e.g. SAVE10" value="{{ old('code') }}"
                                           class="w-full rounded-lg border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#1a2920] text-gray-900 dark:text-white focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                    @error('code')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">Type</label>
                                    <select name="type" required class="w-full rounded-lg border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#1a2920] text-gray-900 dark:text-white focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                        <option value="percent" {{ old('type') === 'percent' ? 'selected' : '' }}>Percent</option>
                                        <option value="fixed" {{ old('type') === 'fixed' ? 'selected' : '' }}>Fixed amount</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">Value</label>
                                    <input type="number" name="value" required min="0" step="0.01" placeholder="10 or 5.00" value="{{ old('value') }}"
                                           class="w-full rounded-lg border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#1a2920] text-gray-900 dark:text-white focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                    @error('value')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">Min. order (£)</label>
                                    <input type="number" name="min_order" min="0" step="0.01" placeholder="Optional" value="{{ old('min_order') }}"
                                           class="w-full rounded-lg border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#1a2920] text-gray-900 dark:text-white focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">Valid from</label>
                                    <input type="datetime-local" name="valid_from" value="{{ old('valid_from') }}"
                                           class="w-full rounded-lg border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#1a2920] text-gray-900 dark:text-white focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">Valid until</label>
                                    <input type="datetime-local" name="valid_until" value="{{ old('valid_until') }}"
                                           class="w-full rounded-lg border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#1a2920] text-gray-900 dark:text-white focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-1">Usage limit</label>
                                    <input type="number" name="usage_limit" min="1" placeholder="Unlimited" value="{{ old('usage_limit') }}"
                                           class="w-full rounded-lg border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#1a2920] text-gray-900 dark:text-white focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                </div>
                            </div>
                            <div class="mt-4 flex items-center gap-2">
                                <input type="checkbox" name="active" id="active" value="1" {{ old('active', true) ? 'checked' : '' }}
                                       class="rounded border-gray-300 dark:border-[#2a4535] text-[#7FA82E] focus:ring-[#7FA82E]">
                                <label for="active" class="text-sm font-medium text-gray-700 dark:text-gray-300">Active</label>
                            </div>
                            <button type="submit" class="mt-6 bg-[#7FA82E] hover:bg-[#6d9126] text-white font-bold py-2.5 px-6 rounded-full transition">
                                Create code
                            </button>
                        </form>

                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Existing codes</h3>
                        @if($codes->isEmpty())
                            <p class="text-gray-500 dark:text-gray-400">No discount codes yet. Create one above.</p>
                        @else
                            <div class="overflow-x-auto rounded-2xl border border-gray-100 dark:border-[#2a4535]">
                                <table class="min-w-full text-left text-sm">
                                    <thead class="bg-gray-50 dark:bg-[#121e16] uppercase tracking-wider border-b border-gray-100 dark:border-[#2a4535]">
                                        <tr>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300">Code</th>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300">Type</th>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300">Value</th>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300">Min order</th>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300">Used</th>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300">Active</th>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300 text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 dark:divide-[#2a4535]">
                                        @foreach($codes as $c)
                                            <tr class="hover:bg-gray-50 dark:hover:bg-[#121e16]/50">
                                                <td class="px-6 py-4 font-mono font-bold text-gray-900 dark:text-white">{{ $c->code }}</td>
                                                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $c->type }}</td>
                                                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $c->type === 'percent' ? $c->value . '%' : '£' . number_format($c->value, 2) }}</td>
                                                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $c->min_order ? '£' . number_format($c->min_order, 2) : '—' }}</td>
                                                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $c->times_used }}{{ $c->usage_limit ? ' / ' . $c->usage_limit : '' }}</td>
                                                <td class="px-6 py-4">
                                                    @if($c->active)
                                                        <span class="px-2 py-1 rounded-full text-xs font-bold bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300">Yes</span>
                                                    @else
                                                        <span class="px-2 py-1 rounded-full text-xs font-bold bg-gray-200 text-gray-600 dark:bg-gray-700 dark:text-gray-400">No</span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 text-right">
                                                    <form action="{{ route('admin.discount-codes.destroy', $c->id) }}" method="POST" class="inline" onsubmit="return confirm('Remove this discount code?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 dark:text-red-400 hover:underline text-sm font-medium">Delete</button>
                                                    </form>
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
