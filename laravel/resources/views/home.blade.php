<!-- This is the Home page (landing page), showcasing featured products, a quiz, and information about the brand. -->

<x-layout>
    
    <!-- Hero Section -->
    <div class="relative w-screen left-[calc(-50vw+50%)] -mt-8 h-auto">
        <section class="relative w-full mt-[8px] p-0">
            <div class="relative min-h-[600px] md:h-screen w-full overflow-hidden flex flex-col justify-end">
        
                <img
                     src="{{ asset('images/home-hero.png') }}"
                    alt="WELLTH hero"
                    class="absolute inset-0 w-full h-full object-cover"
                >

                <div class="absolute inset-0 bg-black/45"></div>

                <div class="relative z-10 flex justify-center px-4 pb-6 sm:pb-8 md:pb-10">
                    <div class="text-center max-w-xl mx-auto">
                        <p class="mb-4 text-sm sm:text-base md:text-lg text-slate-200">
                            Shop premium supplements and fitness essentials designed to help you
                            recover faster and perform better.
                        </p>

                        <a
                            href="/shop"
                            class="inline-flex items-center justify-center rounded-full bg-[#7FA82E] px-6 py-2.5 text-sm font-semibold text-white hover:bg-[#6d9126]"
                        >
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-14 space-y-16 md:space-y-20">
        <!-- Featured Sections -->
        <section class="grid gap-10 md:grid-cols-2 md:items-center">
            <div class="space-y-4 md:space-y-5">
                <h2 class="text-2xl md:text-3xl font-semibold text-slate-900">
                    Your Wellness, Simplified.
                </h2>
                <p class="text-sm md:text-base text-slate-600">
                    Shop essentials that help you train harder, recover faster, and live stronger.
                </p>

                <div class="flex flex-wrap gap-3">
                    <a
                        href="/shop"
                        class="inline-flex items-center justify-center rounded-full bg-[#7FA82E] px-5 py-2 text-sm font-medium text-white hover:bg-[#6d9126]"
                    >
                        Shop All
                    </a>
                </div>
            </div>

            <div class="flex justify-center md:justify-end">
                <a href="{{ route('products.show', 1) }}" class="block transform hover:scale-105 transition duration-300 cursor-pointer">
                    <img
                        src="{{ asset('products/Creatine_Monohydrate.png') }}"
                        alt="WELLTH main product"
                        class="w-full max-w-xs sm:max-w-sm md:max-w-md h-auto object-cover rounded-xl shadow-sm hover:shadow-md"
                    >
                </a>
            </div>
        </section>
        <!-- Quiz Promotion Section -->
        <section class="grid gap-10 md:grid-cols-2 md:items-center">
            <div class="flex justify-center md:justify-start order-1 md:order-none">
                <a href="{{ route('products.show', 4) }}" class="block transform hover:scale-105 transition duration-300 cursor-pointer">
                    <img
                        src="{{ asset('products/Pre_Workout_Energy_Blast.png') }}"
                        alt="WELLTH quiz product"
                        class="w-full max-w-xs sm:max-w-sm md:max-w-md h-auto object-cover rounded-xl shadow-sm hover:shadow-md"
                    >
                </a>
            </div>
            <!-- Quiz Call-to-Action -->
            <div class="space-y-4 md:space-y-5">
                <h2 class="text-2xl md:text-3xl font-semibold text-slate-900">
                    Find Your Perfect Fit.
                </h2>
                <p class="text-sm md:text-base text-slate-600 max-w-md">
                    Answer a few quick questions — we’ll match you with supplements that fit your goals.
                </p>

                <a
                    href="/quiz"
                    class="inline-flex items-center justify-center rounded-full bg-[#7FA82E] 0 px-5 py-2 text-sm font-medium text-white hover:bg-[#6d9126]"
                >
                    Take the Quiz
                </a>
            </div>
        </section>

        <!-- Call to Action Section -->
        <section class="relative isolate overflow-hidden bg-[#2B332A] px-6 py-16 shadow-2xl sm:rounded-3xl sm:px-16 md:pt-24 lg:flex lg:gap-x-20 lg:px-24 lg:pt-0">
            <div class="mx-auto max-w-md text-center lg:mx-0 lg:flex-auto lg:py-24 lg:text-left">
                <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">
                    Unlock Your Full Potential.<br>Join WELLTH Today.
                </h2>
                <p class="mt-6 text-lg leading-8 text-gray-300">
                    Create an account to track your orders, save your quiz results for personalized plans, and get exclusive access to new product drops.
                </p>
                <div class="mt-10 flex items-center justify-center lg:justify-start gap-x-6">
                    <a href="/register" class="rounded-full bg-[#7FA82E] px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-[#6d9126] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                        Get Started
                    </a>
                    <a href="/about" class="text-sm font-semibold leading-6 text-white hover:text-[#7FA82E] transition">
                        Learn more <span aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
            <div class="relative mt-16 h-80 lg:mt-8">
                <svg viewBox="0 0 1024 1024" class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-x-1/2 [mask-image:radial-gradient(closest-side,white,transparent)]" aria-hidden="true">
                    <circle cx="512" cy="512" r="512" fill="url(#gradient)" fill-opacity="0.25" />
                    <defs>
                        <radialGradient id="gradient">
                            <stop stop-color="#7FA82E" />
                            <stop offset="1" stop-color="#7FA82E" />
                        </radialGradient>
                    </defs>
                </svg>
            </div>
        </section>
        <!-- Information Section -->
        <section id="details" class="space-y-6 md:space-y-8">
            <h2 class="text-xl md:text-2xl font-semibold text-slate-900">
                Information
            </h2>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4 text-sm">
                <div class="space-y-2">
                    <div class="text-2xl">🌍</div>
                    <h3 class="font-semibold text-slate-900">
                        Worldwide shipping
                    </h3>
                    <p class="text-xs md:text-sm text-slate-600">
                        We offer worldwide shipping for free!
                    </p>
                </div>

                <div class="space-y-2">
                    <div class="text-2xl">🧪</div>
                    <h3 class="font-semibold text-slate-900">
                        Scientifically tested.
                    </h3>
                    <p class="text-xs md:text-sm text-slate-600">
                        All relevant products are heavily tested, ensuring quality and reliability for our customers
                    </p>
                </div>

                <div class="space-y-2">
                    <div class="text-2xl">🔒</div> 
                    <h3 class="font-semibold text-slate-900">
                        Safety
                    </h3>
                    <p class="text-xs md:text-sm text-slate-600">
                        Your details are stored under GDPR Law, keeping your privacy at the top of our priority
                    </p>
                </div>

                <div class="space-y-2">
                    <div class="text-2xl">⚡</div>
                    <h3 class="font-semibold text-slate-900">
                        Deliver in less than 1 week.
                    </h3>
                    <p class="text-xs md:text-sm text-slate-600">
                        We guarantee your delivery withing 1 week of ordering without any extra cost!
                    </p>
                </div>
            </div>
        </section>

    </main>
</x-layout>