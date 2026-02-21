<!-- This is the admin user edit page. It provides a form to edit an existing user with all fields pre-filled. -->

<x-layout>
    @auth
        <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
                    <a href="{{ route('admin.users') }}" class="inline-flex items-center text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-[#7FA82E] transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Back to Users
                    </a>
                </div>

                <div class="bg-white dark:bg-[#1a2920] overflow-hidden shadow-2xl rounded-3xl border border-gray-100 dark:border-[#2a4535] transition-colors duration-300">
                    <div class="p-8 md:p-12">
                        <div class="flex items-center gap-6 mb-8">
                            <div class="w-16 h-16 rounded-full bg-purple-600/10 flex items-center justify-center border border-purple-600/20">
                                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </div>
                            <div>
                                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">Edit <span class="text-purple-600">User</span></h2>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">Update user information.</p>
                            </div>
                        </div>

                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Name *</label>
                                    <input type="text" name="name" required value="{{ old('name', $user->name) }}"
                                           class="w-full rounded-lg border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#121e16] text-gray-900 dark:text-white focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                    @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Email *</label>
                                    <input type="email" name="email" required value="{{ old('email', $user->email) }}"
                                           class="w-full rounded-lg border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#121e16] text-gray-900 dark:text-white focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                    @error('email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Password (leave blank to keep current)</label>
                                    <input type="password" name="password"
                                           class="w-full rounded-lg border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#121e16] text-gray-900 dark:text-white focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                    @error('password')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Confirm Password</label>
                                    <input type="password" name="password_confirmation"
                                           class="w-full rounded-lg border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#121e16] text-gray-900 dark:text-white focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Role</label>
                                    <select name="role"
                                            class="w-full rounded-lg border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#121e16] text-gray-900 dark:text-white focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                        <option value="customer" {{ old('role', $user->role) === 'customer' ? 'selected' : '' }}>Customer</option>
                                        <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                                    </select>
                                    @error('role')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Date of Birth</label>
                                    <input type="date" name="dob" value="{{ old('dob', $user->dob ? $user->dob->format('Y-m-d') : '') }}"
                                           class="w-full rounded-lg border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#121e16] text-gray-900 dark:text-white focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                    @error('dob')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Gender</label>
                                    <select name="gender"
                                            class="w-full rounded-lg border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#121e16] text-gray-900 dark:text-white focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                        <option value="">Select</option>
                                        <option value="Male" {{ old('gender', $user->gender) === 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ old('gender', $user->gender) === 'Female' ? 'selected' : '' }}>Female</option>
                                        <option value="Other" {{ old('gender', $user->gender) === 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('gender')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Phone</label>
                                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                                       class="w-full rounded-lg border-gray-300 dark:border-[#2a4535] bg-white dark:bg-[#121e16] text-gray-900 dark:text-white focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                                @error('phone')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>

                            <div class="flex gap-4 pt-4">
                                <button type="submit" class="flex-1 bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-xl transition-colors">
                                    Update User
                                </button>
                                <a href="{{ route('admin.users') }}" class="px-6 py-3 border border-gray-300 dark:border-[#2a4535] rounded-xl text-gray-700 dark:text-gray-300 font-bold hover:bg-gray-50 dark:hover:bg-[#121e16] transition-colors">
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
