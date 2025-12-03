<x-layout>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About | WELLTH</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="bg-white text-slate-900 antialiased">

    
  <section class="bg-slate-50">
    <div class="max-w-4xl mx-auto px-6 py-20 text-center">

        <h1 class="text-3xl md:text-4xl font-bold text-emerald-600 mb-4">
            About Us
        </h1>

        <p class="text-base md:text-lg text-slate-700 leading-relaxed">
            At <span class="font-semibold text-emerald-600">WELLTH</span>, our culture and products are crafted for real people
            who want real results. No gimmicks. No hype. Just honest performance — built to fuel your body with what it truly needs.
        </p>

    </div>
</section>

   
    <section class="bg-white">
        <div class="max-w-6xl mx-auto px-6 py-14 md:py-20 grid gap-10 lg:grid-cols-2 lg:items-center">

            {{-- left imaage --}}
            <div class="flex justify-center lg:justify-start order-1 lg:order-none">
                <div class="rounded-3xl overflow-hidden shadow-sm max-w-xs sm:max-w-sm md:max-w-md w-full">
                    <img
                        src="{{ asset('images/about-mission.png') }}"
                        alt="People training and recovering"
                        class="w-full h-auto object-cover"
                    >
                </div>
            </div>

            
            <div class="space-y-4 md:space-y-5">
                <h2 class="text-2xl md:text-3xl font-bold text-emerald-600">
                    Our Mission: Helping Millions Build Real Wellness
                </h2>
                <p class="text-sm md:text-base text-slate-700 leading-relaxed">
                    We believe wellness isn’t about chasing extremes — it’s about balance, consistency, and sustainable strength.
                    Our mission is simple: make high-quality nutrition and fitness essentials accessible, transparent, and built
                    for real-life performance.
                </p>
                <p class="text-sm md:text-base text-slate-700 leading-relaxed">
                    Your growth is our goal — and when you thrive, we thrive. Win-win.
                </p>
            </div>
        </div>
    </section>

    
    <section class="bg-white">
        <div class="max-w-6xl mx-auto px-6 pb-14 md:pb-20 grid gap-10 lg:grid-cols-2 lg:items-start">

            
            <div class="space-y-4 md:space-y-5">
                <h2 class="text-2xl md:text-3xl font-bold text-emerald-600">
                    Our Story
                </h2>

                <p class="text-sm md:text-base text-slate-700 leading-relaxed">
                    <span class="font-semibold text-emerald-600">WELLTH</span> began with one idea: wellness is the real wealth.
                </p>

                <p class="text-sm md:text-base text-slate-700 leading-relaxed">
                    We were tired of seeing the supplement industry filled with misleading claims, hidden ingredients,
                    and overpriced “miracle” products. Real people deserved better — products rooted in science,
                    honesty, and results.
                </p>

                <p class="text-sm md:text-base text-slate-700 leading-relaxed">
                    So we created WELLTH: a brand committed to clean formulations, quality you can trust, and tools that help
                    you move, recover, and live stronger without compromise.
                </p>

                <p class="text-sm md:text-base text-slate-700 leading-relaxed">
                    From our first protein formula to the range of nutrition, gear, and recovery essentials we offer today,
                    every WELLTH product exists for one purpose: to support your journey to becoming the strongest,
                    healthiest version of yourself.
                </p>

                <p class="text-sm md:text-base text-slate-700 leading-relaxed">
                    And we’re just getting started.
                </p>
            </div>

            
            <div class="flex justify-center lg:justify-end">
                <div class="rounded-3xl overflow-hidden shadow-sm max-w-xs sm:max-w-sm md:max-w-md w-full">
                    <img
                        src="{{ asset('images/about-story.png') }}"
                        alt="WELLTH founders and community"
                        class="w-full h-auto object-cover"
                    >
                </div>
            </div>
        </div>
    </section>

    
    <section class="bg-slate-50">
        <div class="max-w-6xl mx-auto px-6 py-14 md:py-20">
            <div class="text-center mb-10 md:mb-12">
                <h2 class="text-2xl md:text-3xl font-bold text-emerald-600">
                    WELLTH By the Numbers
                </h2>
            </div>

           
            <div class="grid gap-6 md:grid-cols-3">
                
                
                <div class="bg-white rounded-2xl shadow-sm px-6 py-8 flex flex-col items-start">
                    <div class="mb-4 h-10 w-10 rounded-full bg-emerald-100 flex items-center justify-center">
                        <span class="text-emerald-700 text-lg font-semibold">🌍</span>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-900 mb-1">
                        12+ Countries Reached
                    </h3>
                    <p class="text-sm text-slate-600">
                        Bringing honest wellness worldwide.
                    </p>
                </div>

                
                <div class="bg-white rounded-2xl shadow-sm px-6 py-8 flex flex-col items-start">
                    <div class="mb-4 h-10 w-10 rounded-full bg-emerald-100 flex items-center justify-center">
                        <span class="text-emerald-600 text-lg font-semibold">🤝</span>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-900 mb-1">
                        Thousands of WELLTH Athletes &amp; Customers
                    </h3>
                    <p class="text-sm text-slate-600">
                        A community committed to real health.
                    </p>
                </div>

                
                <div class="bg-white rounded-2xl shadow-sm px-6 py-8 flex flex-col items-start">
                    <div class="mb-4 h-10 w-10 rounded-full bg-emerald-100 flex items-center justify-center">
                        <span class="text-emerald-600 text-lg font-semibold">⚡</span> <!-- icons from emojipedia-->
                    </div>
                    <h3 class="text-lg font-semibold text-slate-900 mb-1">
                        A Growing Product Line, Built with Care
                    </h3>
                    <p class="text-sm text-slate-600">
                        Nutrition • Performance • Recovery.
                    </p>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
</x-layout>