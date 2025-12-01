<!--reference to the layout file-->
<x-layout>
    
    <div class="-mx-8 -mt-8">
<section class="relative w-full m-0 p-0">
    <div class="relative min-h-[600px] md:h-screen w-full overflow-hidden flex flex-col justify-end">
        
        <img
            src="{{ asset('images/home-hero.png') }}"
            alt="WELLTH hero"
            class="absolute inset-0 w-full h-full object-cover"
        >

        <div class="absolute inset-0 bg-black/45"></div>

        <div class="relative z-10 flex justify-center px-4 pb-6 sm:pb-8 md:pb-10">
            <div class="text-center max-w-xl mx-auto">
                <p class="mb-4 text-sm sm:text-base md:text-lg text-slate-100">
                    Shop premium supplements and fitness essentials designed to help you
                    recover faster and perform better.
                </p>

                <a
                    href="#shop"
                    class="inline-flex items-center justify-center rounded-full bg-[#7FA82E] px-6 py-2.5 text-sm font-semibold text-white hover:bg-[#6d9126]"
                >
                    Shop Now
                </a>
            </div>
        </div>
    </div>
</section>
</div>
</section>
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-14 space-y-16 md:space-y-20">

        
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
                        href="#shop"
                        class="inline-flex items-center justify-center rounded-full bg-[#7FA82E] px-5 py-2 text-sm font-medium text-white hover:bg-[#6d9126]"
                    >
                        Shop
                    </a>
                    <a
                        href="#details"
                        class="inline-flex items-center justify-center rounded-full border border-slate-300 px-5 py-2 text-sm font-medium text-slate-800 hover:bg-slate-100"
                    >
                        Product Details
                    </a>
                </div>
            </div>

            <div class="flex justify-center md:justify-end">
                <img
                    src="{{ asset('images/product-main.png') }}"
                    alt="WELLTH main product"
                    class="w-full max-w-xs sm:max-w-sm md:max-w-md h-auto object-cover rounded-xl shadow-sm"
                >
            </div>
        </section>

        {{-- section quiz--}}
        <section class="grid gap-10 md:grid-cols-2 md:items-center">
            <div class="flex justify-center md:justify-start order-1 md:order-none">
                <img
                    src="{{ asset('images/product-quiz-new.png') }}"
                    alt="WELLTH quiz product"
                    class="w-full max-w-xs sm:max-w-sm md:max-w-md h-auto object-cover rounded-xl shadow-sm"
                >
            </div>

            <div class="space-y-4 md:space-y-5">
                <h2 class="text-2xl md:text-3xl font-semibold text-slate-900">
                    Find Your Perfect Fit.
                </h2>
                <p class="text-sm md:text-base text-slate-600 max-w-md">
                    Answer a few quick questions — we’ll match you with supplements that fit your goals.
                </p>

                <a
                    href="#quiz"
                    class="inline-flex items-center justify-center rounded-full bg-[#7FA82E] 0 px-5 py-2 text-sm font-medium text-white hover:bg-[#6d9126]"
                >
                    Quiz
                </a>
            </div>
        </section>

        <section id="shop" class="space-y-6 md:space-y-8">
    <h2 class="text-xl md:text-2xl font-semibold text-slate-900">
    Shop by Your Goals.
</h2>

<div class="grid gap-10 md:grid-cols-[1.6fr_1fr] items-start">

    
    <article class="space-y-4">
        <div class="rounded-2xl overflow-hidden shadow-sm bg-slate-50">
            <img
                src="{{ asset('images/goal-main-new.png') }}"
                alt="WELLTH Protein"
                class="w-full max-w-[420px] h-auto mx-auto object-contain"
            >
        </div>

        <div class="space-y-1">
            <h3 class="text-sm font-semibold text-slate-900">
                WELLTH Protein (Chocolate)
            </h3>
            <p class="text-xs md:text-sm text-slate-600">
                Fast-digesting whey blend that supports lean muscle and recovery.
            </p>
            <p class="text-sm font-semibold text-slate-900">£8.99</p>
        </div>
    </article>

    <article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
        <img
            src="{{ asset('images/goal-preworkout-new.png') }}"
            alt="Enduro Pre-Workout"
            class="w-full h-auto max-h-[260px] object-contain"
        >

        <div class="p-4 space-y-1">
            <h3 class="text-sm font-semibold text-slate-900">Enduro Pre-Workout</h3>
            <p class="text-xs md:text-sm text-slate-600">
                A focused boost of clean energy and endurance for intense sessions.
            </p>
            <p class="text-sm font-semibold text-slate-900">£20.99</p>
        </div>
    </article>

    
    <article class="space-y-4">
        <div class="rounded-2xl overflow-hidden shadow-sm bg-slate-50">
            <img
                src="{{ asset('images/goal-powercharge-new.png') }}"
                alt="WELLTH PowerCharge"
                class="w-full max-w-[420px] h-auto mx-auto object-contain"
            >
        </div>

        <div class="space-y-1">
            <h3 class="text-sm font-semibold text-slate-900">
                WELLTH PowerCharge
            </h3>
            <p class="text-xs md:text-sm text-slate-600">
                High-intensity formula designed to revive your energy and sharpen your focus.
            </p>
            <p class="text-sm font-semibold text-slate-900">£10.00</p>
        </div>
    </article>

    <article class="rounded-2xl bg-slate-50 overflow-hidden shadow-sm">
        <img
            src="{{ asset('images/goal-hydra-new.png') }}"
            alt="Hydra+ Electrolyte Mix"
            class="w-full h-auto max-h-[260px] object-contain"
        >

        <div class="p-4 space-y-1">
            <h3 class="text-sm font-semibold text-slate-900">Hydra+ Electrolyte Mix</h3>
            <p class="text-xs md:text-sm text-slate-600">
                Refreshing electrolyte formula to fuel workouts and recovery.
            </p>
            <p class="text-sm font-semibold text-slate-900">£15.99</p>
        </div>
    </article>

</div>
        {{--  info --}}
        <section id="details" class="space-y-6 md:space-y-8">
            <h2 class="text-xl md:text-2xl font-semibold text-slate-900">
                Information
            </h2>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4 text-sm">
                <div class="space-y-2">
                    <div class="text-2xl">🌍</div> <!--icons from emojipedia-->
                    <h3 class="font-semibold text-slate-900">
                        Worldwide shipping
                    </h3>
                    <p class="text-xs md:text-sm text-slate-600">
                        Body text for whatever you’d like to say. Add key details, notes, or a short benefit-focused line.
                    </p>
                </div>

                <div class="space-y-2">
                    <div class="text-2xl">🧪</div>
                    <h3 class="font-semibold text-slate-900">
                        Scientifically tested.
                    </h3>
                    <p class="text-xs md:text-sm text-slate-600">
                        Share how your products are formulated, tested, or reviewed so customers can trust what they’re taking.
                    </p>
                </div>

                <div class="space-y-2">
                    <div class="text-2xl">🔒</div> 
                    <h3 class="font-semibold text-slate-900">
                        Safety
                    </h3>
                    <p class="text-xs md:text-sm text-slate-600">
                        Highlight quality standards, certifications, or safety promises that matter to your community.
                    </p>
                </div>

                <div class="space-y-2">
                    <div class="text-2xl">⚡</div>
                    <h3 class="font-semibold text-slate-900">
                        Deliver in less than 1 week.
                    </h3>
                    <p class="text-xs md:text-sm text-slate-600">
                        Reassure your customers with clear delivery expectations and fast, reliable shipping.
                    </p>
                </div>
            </div>
        </section>

    </main>
</body>
</html>
</x-layout>
