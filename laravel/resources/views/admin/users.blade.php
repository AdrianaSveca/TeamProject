<!-- This is the admin users page. It lists all users with their details (name, email, role, registration date) for admin management. -->

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
                            <div class="w-16 h-16 rounded-full bg-purple-600/10 flex items-center justify-center border border-purple-600/20">
                                <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            </div>
                            <div>
                                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">Manage <span class="text-purple-600">Users</span></h2>
                                <p class="text-gray-500 dark:text-gray-400 text-sm">View and manage all registered users.</p>
                            </div>
                        </div>

                        @if(session('status'))
                            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 dark:bg-emerald-900/30 dark:border-emerald-800 px-4 py-3 text-sm text-emerald-800 dark:text-emerald-200">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 dark:bg-red-900/30 dark:border-red-800 px-4 py-3 text-sm text-red-800 dark:text-red-200">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="mb-6">
                            <a href="{{ route('admin.users.create') }}" class="inline-flex items-center rounded-xl bg-purple-600 hover:bg-purple-700 text-white font-semibold px-5 py-3 transition-colors">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                Add New User
                            </a>
                        </div>

                        @if($users->isEmpty())
                            <p class="text-gray-500 dark:text-gray-400">No users found.</p>
                        @else
                            <div class="overflow-x-auto rounded-2xl border border-gray-100 dark:border-[#2a4535]">
                                <table class="min-w-full text-left text-sm">
                                    <thead class="bg-gray-50 dark:bg-[#121e16] uppercase tracking-wider border-b border-gray-100 dark:border-[#2a4535]">
                                        <tr>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300">Name</th>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300">Email</th>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300">Role</th>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300">Registered</th>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300">Orders</th>
                                            <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-300 text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100 dark:divide-[#2a4535]">
                                        @foreach($users as $user)
                                            <tr class="hover:bg-gray-50 dark:hover:bg-[#121e16]/50 transition-colors duration-200">
                                                <td class="px-6 py-4 font-bold text-gray-900 dark:text-white">{{ $user->name }}</td>
                                                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $user->email }}</td>
                                                <td class="px-6 py-4">
                                                    @if($user->role === 'admin')
                                                        <span class="px-2 py-1 rounded-full text-xs font-bold bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300">Admin</span>
                                                    @else
                                                        <span class="px-2 py-1 rounded-full text-xs font-bold bg-gray-200 text-gray-700 dark:bg-gray-700 dark:text-gray-300">Customer</span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ \Carbon\Carbon::parse($user->created_at)->format('M d, Y') }}</td>
                                                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">{{ $user->orders()->count() }}</td>
                                                <td class="px-6 py-4 text-right">
                                                    <div class="flex items-center justify-end gap-2">
                                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-sm font-bold text-blue-600 hover:underline">Edit</a>
                                                        @if($user->id !== Auth::id())
                                                            <span class="text-gray-300 dark:text-gray-600">|</span>
                                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="text-sm font-bold text-red-600 hover:underline">Delete</button>
                                                            </form>
                                                        @endif
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
