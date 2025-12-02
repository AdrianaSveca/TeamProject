<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELLTH</title>
    <script src ="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.jpeg') }}?">
</head>
<body class="h-full">
    <!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> -->
<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-900">
  <body class="h-full">
  ```
-->
<div class="min-h-full">
  <nav class="bg-green-900/95 border-b border-white/10">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center">
            <div class="flex items-center">
                <div class="shrink-0">
                    <!-- Logo placeholder -->
                     <a href="/"><span class="text-2xl font-semibold tracking-widest text-white hover:text-[#7FA82E] transition duration-150 ease-in-out">WELLTH</span></a>
                </div>
            </div>
            <div class="hidden md:block ml-auto">
                <div class="flex items-center justify-between items-baseline space-x-4">
                    <a href="/shop" class="rounded-md px-3 py-2 font-medium transition duration-150 ease-in-out {{ request()->is('shop') ? 'text-[#7FA82E] font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]' }}">Shop</a>
                    <a href="/quiz" class="rounded-md px-3 py-2 font-medium transition duration-150 ease-in-out {{ request()->is('quiz') ? 'text-[#7FA82E] font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]' }}">Quiz</a>
                    <a href="/contact" class="rounded-md px-3 py-2 font-medium transition duration-150 ease-in-out {{ request()->is('contact') ? 'text-[#7FA82E] font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]' }}">Contact</a>
                    <a href="/about" class="rounded-md px-3 py-2 font-medium transition duration-150 ease-in-out {{ request()->is('about') ? 'text-[#7FA82E] font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]' }}">About Us</a>
                    <!-- Basket -->
                    <a href="/basket" class="self-center group flex items-center rounded-md px-3 py-2 font-medium transition duration-150 ease-in-out {{ request()->is('basket') ? 'text-[#7FA82E] font-bold' : 'text-gray-300 hover:text-[#7FA82E]' }}"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-1 {{ request()->is('basket') ? 'text-[#7FA82E]' : 'text-gray-300 group-hover:text-[#7FA82E]' }}"> <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" /></svg></a>

                    @auth
                      <!-- Dashboard Link (Green Branding) -->
                      <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 font-bold transition duration-150 ease-in-out {{ request()->is('dashboard') ? 'bg-[#7FA82E] text-white' : 'text-gray-300 hover:text-[#7FA82E]' }}">
                        Dashboard
                      </a>

                      <!-- 2. Admin Panel (Custom Branding) -->
                      @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="ml-4 rounded-md px-3 py-2 font-bold transition duration-150 ease-in-out {{ request()->routeIs('admin.dashboard')  ? 'bg-[#2B332A] text-[#7FA82E]' : 'text-gray-300 hover:text-[#7FA82E]' }}">
                          Admin Panel
                        </a>
                      @endif

                      {{-- 3. User Dropdown (Profile/Logout) --}}
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
                              <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                              </x-dropdown-link>
                            </form>
                          </x-slot>
                        </x-dropdown>
                      </div>

                    @else
                      {{-- Guest Links --}}
                      <a href="{{ route('login') }}" class="text-white hover:text-[#7FA82E] font-bold transition duration-150">
                        Log in
                      </a>
                      <a href="{{ route('register') }}" class="ml-4 bg-[#7FA82E] text-white px-4 py-2 rounded-md font-bold hover:bg-[#6d9126] transition duration-150">
                        Join Us
                      </a>
                    @endauth
                </div>
              </div>
        
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" command="--toggle" commandfor="mobile-menu" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 in-aria-expanded:hidden">
              <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
              <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <el-disclosure id="mobile-menu" hidden class="block md:hidden">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
        
        <!-- STANDARD LINKS  -->

        <a href="/shop" class="block rounded-md px-3 py-2 text-base font-medium transition duration-150 ease-in-out {{ request()->is('shop') ? 'text-[#7FA82E] font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]' }}">
          Shop
        </a>

        <a href="/quiz" class="block rounded-md px-3 py-2 text-base font-medium transition duration-150 ease-in-out {{ request()->is('quiz') ? 'text-[#7FA82E] font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]' }}">
          Quiz
        </a>

        <a href="/about" class="block rounded-md px-3 py-2 text-base font-medium transition duration-150 ease-in-out {{ request()->is('about') ? 'text-[#7FA82E] font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]' }}">
          About
        </a>

        <a href="/contact" class="block rounded-md px-3 py-2 text-base font-medium transition duration-150 ease-in-out {{ request()->is('contact') ? 'text-[#7FA82E] font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]' }}">
          Contact
        </a>

        <a href="{{ url('/basket') }}" class="block rounded-md px-3 py-2 text-base font-medium transition duration-150 ease-in-out flex items-center {{ request()->is('basket') ? 'text-[#7FA82E] font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]' }}">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
          </svg> Basket
        </a>

        <!-- AUTHENTICATION LINKS (Mobile Version) -->
        
        @auth
            <!-- Dashboard: Green Background when Active -->
            <a href="{{ url('/dashboard') }}" class="block rounded-md px-3 py-2 text-base font-medium transition duration-150 ease-in-out {{ request()->is('dashboard') ? 'bg-[#7FA82E] text-white font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]' }}">
              Dashboard
            </a>

            <!-- Admin Panel: Black Background when Active -->
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="block rounded-md px-3 py-2 text-base font-medium transition duration-150 ease-in-out {{ request()->routeIs('admin.dashboard') ? 'bg-[#2B332A] text-[#7FA82E] font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]' }}">
                  Admin Panel
                </a>
            @endif

        @else
            <!-- Guest: Log In -->
            <a href="{{ route('login') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-[#7FA82E] transition duration-150 ease-in-out">
              Log in
            </a>

            <!-- Guest: Join Us -->
            <a href="{{ route('register') }}" class="block rounded-md px-3 py-2 text-base font-medium transition duration-150 ease-in-out {{ request()->is('register') ? 'text-[#7FA82E] font-bold' : 'text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]' }}">
              Join Us
            </a>
        @endauth

      </div>

      <!-- 3. USER PROFILE SECTION (Only visible when logged in) -->
      @auth
      <div class="border-t border-white/10 pt-4 pb-3">
        <div class="flex items-center px-5">
          <div class="shrink-0">
            <div class="h-10 w-10 rounded-full bg-gray-700 flex items-center justify-center text-white">
                <span class="font-bold text-lg">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
            </div>
          </div>
          <div class="ml-3">
            <div class="text-base font-medium leading-none text-white">{{ Auth::user()->name }}</div>
            <div class="text-sm font-medium leading-none text-gray-400 mt-1">{{ Auth::user()->email }}</div>
          </div>
        </div>
        <div class="mt-3 space-y-1 px-2">
            {{-- Profile Link --}}
            <a href="{{ route('profile.edit') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]">
              Your Profile
            </a>

            <!-- Log Out -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-[#7FA82E]">
                  Log Out
                </a>
            </form>
        </div>
      </div>
      @endauth

    </el-disclosure>
  </nav>
  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <!-- Your content -->
       {{ $slot }}
    </div>
  </main>
</div>


                                                                    <!-- Footer -->
<footer id="join" class="bg-green-900 text-gray-300 mt-20">
    <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between gap-10">
        <div class="space-y-4">
            <div class="text-white text-2xl font-semibold tracking-widest">
                WELLTH
            </div>
        </div>
        <!-- Moves the columns to the right -->
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



</body>
</html>
