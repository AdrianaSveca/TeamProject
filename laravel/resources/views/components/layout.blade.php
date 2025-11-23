<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELLTH</title>
    <script src ="https://cdn.tailwindcss.com"></script>
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
                     <span class="text-white text-2xl font-semibold tracking-widest">WELLTH</span>
                </div>
            </div>
            <div class="hidden md:block ml-auto">
                <div class="flex items-baseline space-x-4">
                    <a href="/" class="{{ request()->is('/') ? 'bg-gray-500/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} rounded-md px-3 py-2">Home</a>
                    <a href="/shop" class="{{ request()->is('shop') ? 'bg-gray-500/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} rounded-md px-3 py-2">Shop</a>
                    <a href="/quiz" class="{{ request()->is('quiz') ? 'bg-gray-500/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} rounded-md px-3 py-2">Quiz</a>
                    <a href="/about" class="{{ request()->is('about') ? 'bg-gray-500/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} rounded-md px-3 py-2">About</a>
                    <a href="/joinus" class="{{ request()->is('joinus') ? 'bg-gray-500/50 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }} rounded-md px-3 py-2">Join Us</a>
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
        <!-- Current: "bg-gray-950/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
        <a href="/" aria-current="page" class="block rounded-md bg-gray-950/50 px-3 py-2 text-base font-medium text-white">Home</a>
        <a href="/shop" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">Shop</a>
        <a href="/quiz" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">Quiz</a>
        <a href="/about" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">About</a>
        <a href="/joinus" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/5 hover:text-white">Join Us</a>
      </div>
      <div class="border-t border-white/10 pt-4 pb-3">
        <div class="flex items-center px-5">
          <div class="shrink-0">
            
          </div>
          <div class="ml-3">
            <!-- Possible User info placeholder -->
          </div>
          
        </div>
      </div>
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
