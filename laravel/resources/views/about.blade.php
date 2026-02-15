<!-- This is the About Us page for the WELLTH website, providing information about the company's mission, story, and key statistics. -->

<x-layout>
    
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-[#7FA82E] rounded-full blur-[120px] opacity-10 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-[#7FA82E] rounded-full blur-[100px] opacity-10 pointer-events-none"></div>

        <section class="max-w-4xl mx-auto text-center mb-20 relative z-10">
            <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 dark:text-white mb-6">
                About <span class="text-[#7FA82E]">Us</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-600 dark:text-gray-300 leading-relaxed max-w-3xl mx-auto">
                At <span class="font-bold text-[#7FA82E]">WELLTH</span>, our culture and products are crafted for real people
                who want real results. No gimmicks. No hype. Just honest performance — built to fuel your body with what it truly needs.
            </p>
        </section>

        <section class="max-w-7xl mx-auto mb-20 relative z-10">
            <div class="bg-white dark:bg-[#1a2920] rounded-3xl shadow-xl border border-gray-100 dark:border-[#2a4535] overflow-hidden p-8 md:p-12 transition-colors duration-300">
                <div class="grid gap-12 lg:grid-cols-2 lg:items-center">
                    
                    <div class="flex justify-center lg:justify-start order-1 lg:order-none">
                        <div class="relative rounded-2xl overflow-hidden shadow-lg border-2 border-gray-100 dark:border-[#2a4535] w-full max-w-md">
                            <img
                                src="{{ asset('images/about-mission.png') }}"
                                alt="People training and recovering"
                                class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-700"
                            >
                        </div>
                    </div>

                    <div class="space-y-6">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                            Our Mission: <br>
                            <span class="text-[#7FA82E]">Helping Millions Build Real Wellness</span>
                        </h2>
                        <p class="text-base text-gray-600 dark:text-gray-300 leading-relaxed">
                            We believe wellness isn’t about chasing extremes — it’s about balance, consistency, and sustainable strength.
                            Our mission is simple: make high-quality nutrition and fitness essentials accessible, transparent, and built
                            for real-life performance.
                        </p>
                        <p class="text-base text-gray-600 dark:text-gray-300 leading-relaxed font-semibold border-l-4 border-[#7FA82E] pl-4">
                            Your growth is our goal — and when you thrive, we thrive. Win-win.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto mb-20 relative z-10">
            <div class="bg-white dark:bg-[#1a2920] rounded-3xl shadow-xl border border-gray-100 dark:border-[#2a4535] overflow-hidden p-8 md:p-12 transition-colors duration-300">
                <div class="grid gap-12 lg:grid-cols-2 lg:items-center">
                    
                    <div class="space-y-6">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white">
                            Our Story
                        </h2>
                        <p class="text-base text-gray-600 dark:text-gray-300 leading-relaxed">
                            <span class="font-bold text-[#7FA82E]">WELLTH</span> began with one idea: wellness is the real wealth.
                        </p>
                        <p class="text-base text-gray-600 dark:text-gray-300 leading-relaxed">
                            We were tired of seeing the supplement industry filled with misleading claims, hidden ingredients,
                            and overpriced “miracle” products. Real people deserved better — products rooted in science,
                            honesty, and results.
                        </p>
                        <p class="text-base text-gray-600 dark:text-gray-300 leading-relaxed">
                            So we created WELLTH: a brand committed to clean formulations, quality you can trust, and tools that help
                            you move, recover, and live stronger without compromise.
                        </p>
                        <p class="text-base text-gray-600 dark:text-gray-300 leading-relaxed italic">
                            And we’re just getting started.
                        </p>
                    </div>

                    <div class="flex justify-center lg:justify-end">
                        <div class="relative rounded-2xl overflow-hidden shadow-lg border-2 border-gray-100 dark:border-[#2a4535] w-full max-w-md">
                            <img
                                src="{{ asset('images/about-story.png') }}"
                                alt="WELLTH founders and community"
                                class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-700"
                            >
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto relative z-10">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                    <span class="text-[#7FA82E]">WELLTH</span> By the Numbers
                </h2>
            </div>

            <div class="grid gap-6 md:grid-cols-3">
                
                <div class="bg-white dark:bg-[#1a2920] rounded-2xl shadow-lg border border-gray-100 dark:border-[#2a4535] px-8 py-10 flex flex-col items-center text-center hover:shadow-[#7FA82E]/20 hover:-translate-y-1 transition-all duration-300 group">
                    <div class="mb-5 h-16 w-16 rounded-full bg-emerald-50 dark:bg-[#7FA82E]/10 flex items-center justify-center group-hover:bg-[#7FA82E] transition-colors duration-300">
                        <span class="text-3xl group-hover:text-white transition-colors duration-300">🌍</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                        12+ Countries
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Bringing honest wellness worldwide.
                    </p>
                </div>

                <div class="bg-white dark:bg-[#1a2920] rounded-2xl shadow-lg border border-gray-100 dark:border-[#2a4535] px-8 py-10 flex flex-col items-center text-center hover:shadow-[#7FA82E]/20 hover:-translate-y-1 transition-all duration-300 group">
                    <div class="mb-5 h-16 w-16 rounded-full bg-emerald-50 dark:bg-[#7FA82E]/10 flex items-center justify-center group-hover:bg-[#7FA82E] transition-colors duration-300">
                        <span class="text-3xl group-hover:text-white transition-colors duration-300">🤝</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                        Thousands of Athletes
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        A community committed to real health.
                    </p>
                </div>

                <div class="bg-white dark:bg-[#1a2920] rounded-2xl shadow-lg border border-gray-100 dark:border-[#2a4535] px-8 py-10 flex flex-col items-center text-center hover:shadow-[#7FA82E]/20 hover:-translate-y-1 transition-all duration-300 group">
                    <div class="mb-5 h-16 w-16 rounded-full bg-emerald-50 dark:bg-[#7FA82E]/10 flex items-center justify-center group-hover:bg-[#7FA82E] transition-colors duration-300">
                        <span class="text-3xl group-hover:text-white transition-colors duration-300">⚡</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                        Growing Product Line
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Nutrition • Performance • Recovery.
                    </p>
                </div>
            </div>
        </section>

    </div>
</x-layout>