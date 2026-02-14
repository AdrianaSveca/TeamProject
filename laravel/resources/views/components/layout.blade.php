<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELLTH</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Vite for Laravel -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.jpeg') }}?">
</head>

<!-- Layout Blade View-->
<body class="h-full overflow-x-hidden bg-gray-50 text-gray-900 dark:bg-[#121e16] dark:text-gray-200 transition-colors duration-300">
    <div class="min-h-full flex flex-col">
        <!-- Navigation Bar -->
        <nav x-data="{ open: false }" class="bg-green-900/95 border-b border-white/10 transition-colors duration-300">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center">
                    <!-- Logo (with link to homepage)  -->
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <a href="/">
                                <span class="text-2xl font-extrabold tracking-widest text-white dark:text-[#121e16] hover:text-[#7FA82E] transition duration-150 ease-in-out">
                                    WELLTH
                                </span>
                            </a>
                        </div>
                    </div>
                    <!-- Navigation Links -->
                    <div class="hidden md:block ml-auto">
                        <div class="flex items-center justify-between items-baseline space-x-4">
                            <a href="/shop" class="rounded-md px-3 py-2 font-medium transition duration-150 ease-in-out {{ request()->is('shop') ? 'text-[#7FA82E] font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]' }}">Shop</a>
                            <a href="/quiz" class="rounded-md px-3 py-2 font-medium transition duration-150 ease-in-out {{ request()->is('quiz') ? 'text-[#7FA82E] font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]' }}">Quiz</a>
                            <a href="/contact" class="rounded-md px-3 py-2 font-medium transition duration-150 ease-in-out {{ request()->is('contact') ? 'text-[#7FA82E] font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]' }}">Contact</a>
                            <a href="/about" class="rounded-md px-3 py-2 font-medium transition duration-150 ease-in-out {{ request()->is('about') ? 'text-[#7FA82E] font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]' }}">About Us</a>
                            
                            <a href="/basket" class="self-center group flex items-center rounded-md px-3 py-2 font-medium transition duration-150 ease-in-out {{ request()->is('basket') ? 'text-[#7FA82E] font-bold' : 'text-gray-300 hover:text-[#7FA82E]' }}"> 
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1 {{ request()->is('basket') ? 'text-[#7FA82E]' : 'text-gray-300 group-hover:text-[#7FA82E]' }}"> 
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>
                            </a>
                            <!-- Dark/Light Theme Toggle Button -->
                            <button 
                                id="theme-toggle" 
                                type="button" 
                                class="text-gray-300 hover:bg-white/10 hover:text-[#7FA82E] focus:outline-none rounded-lg text-sm p-2.5 ml-2 self-center group flex items-center rounded-md px-3 py-2 font-medium transition duration-150 ease-in-out"
                                x-data="{ darkMode: localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) }"
                                @click="
                                    darkMode = !darkMode;
                                    if (darkMode) {
                                        document.documentElement.classList.add('dark');
                                        localStorage.setItem('color-theme', 'dark');
                                    } else {
                                        document.documentElement.classList.remove('dark');
                                        localStorage.setItem('color-theme', 'light'); 
                                }">
                                <svg x-show="!darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                                <svg x-show="darkMode" style="display: none;" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 100 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                            </button>
                            <!-- Logged in user menu / Authentication Links -->
                            @auth
                                <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 font-bold transition duration-150 ease-in-out {{ request()->is('dashboard') ? 'bg-[#7FA82E] text-white' : 'text-gray-300 hover:text-[#7FA82E]' }}">Dashboard</a>
                                @if(Auth::user()->role === 'admin') 
                                    <a href="{{ route('admin.dashboard') }}" class="ml-4 rounded-md px-3 py-2 font-bold transition duration-150 ease-in-out {{ request()->routeIs('admin.dashboard') ? 'bg-[#2B332A] text-[#7FA82E]' : 'text-gray-300 hover:text-[#7FA82E]' }}">Admin Panel</a>
                                @endif
                                <!-- Dropdown Menu for logged in user -->
                                <div class="relative ml-3">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="inline-flex items-center px-3 py-2 text-sm font-bold text-white bg-transparent hover:text-[#7FA82E] focus:outline-none transition duration-150">
                                                <div>{{ Auth::user()->name }}</div>
                                                <div class="ml-1">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            @else <!-- Login and Register Links for guests -->
                                <a href="{{ route('login') }}" class="text-white hover:text-[#7FA82E] font-bold transition duration-150">Log in</a>
                                <a href="{{ route('register') }}" class="ml-4 bg-[#7FA82E] text-white px-4 py-2 rounded-md font-bold hover:bg-[#6d9126] transition duration-150">Join Us</a>
                            @endauth
                        </div>
                    </div>
                    <!-- Mobile menu button -->
                    <div class="-mr-2 flex md:hidden">
                        <button @click="open = ! open" type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-none">
                            <span class="sr-only">Open main menu</span>
                            <svg class="h-6 w-6" :class="{'hidden': open, 'block': ! open }" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                            <svg class="h-6 w-6 hidden" :class="{'hidden': ! open, 'block': open }" stroke="currentColor" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Responsive Mobile Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden bg-green-900">
                <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                    <a href="/shop" class="block rounded-md px-3 py-2 text-base font-medium transition duration-150 ease-in-out {{ request()->is('shop') ? 'text-[#7FA82E] font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]' }}">Shop</a>
                    <a href="/quiz" class="block rounded-md px-3 py-2 text-base font-medium transition duration-150 ease-in-out {{ request()->is('quiz') ? 'text-[#7FA82E] font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]' }}">Quiz</a>
                    <a href="/about" class="block rounded-md px-3 py-2 text-base font-medium transition duration-150 ease-in-out {{ request()->is('about') ? 'text-[#7FA82E] font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]' }}">About</a>
                    <a href="/contact" class="block rounded-md px-3 py-2 text-base font-medium transition duration-150 ease-in-out {{ request()->is('contact') ? 'text-[#7FA82E] font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]' }}">Contact</a>
                    <a href="/basket" class="block rounded-md px-3 py-2 text-base font-medium transition duration-150 ease-in-out flex items-center {{ request()->is('basket') ? 'text-[#7FA82E] font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" /></svg> Basket
                    </a>
                    
                    <button @click="darkMode = !darkMode; if (darkMode) { document.documentElement.classList.add('dark'); localStorage.setItem('color-theme', 'dark'); } else { document.documentElement.classList.remove('dark'); localStorage.setItem('color-theme', 'light'); }" class="flex w-full items-center rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]">
                        <span x-text="darkMode ? 'Switch to Light Mode' : 'Switch to Dark Mode'" class="mr-2"></span>
                        <svg x-show="!darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg x-show="darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 100 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    </button>

                    @auth
                        
                    @endauth
                </div>
            </div>
        </nav>
        <main class="flex-grow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
        <!-- Footer Section -->
        <footer id="join" class="bg-green-900 text-gray-300 mt-auto transition-colors duration-300">
            <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between gap-10">
                <div class="space-y-4">
                    <div class="text-white text-2xl font-semibold tracking-widest">WELLTH</div>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-10">
                    <div class="space-y-2">
                        <h4 class="text-white font-semibold">Learn</h4>
                        <a href="/about" class="block hover:text-white">About Us</a>
                    </div>
                    <div class="space-y-2">
                        <h4 class="text-white font-semibold">Support</h4>
                        <a href="/contact" class="block hover:text-white">Contact Us</a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 py-4 text-center text-sm text-gray-200">
                © {{ date('Y') }} WELLTH. All rights reserved.
            </div>
        </footer>
    </div>
</body>
</html>