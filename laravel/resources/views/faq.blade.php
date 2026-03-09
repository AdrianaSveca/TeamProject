<!-- FAQ page for WELLTH: common questions about orders, shipping, products, returns, payments, and account. -->

<x-layout>
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto relative">
            <div class="absolute top-0 right-0 w-64 h-64 bg-[#7FA82E] rounded-full blur-[80px] opacity-10 pointer-events-none"></div>

            <section class="text-center mb-12 relative z-10">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white mb-4">
                    Frequently Asked <span class="text-[#7FA82E]">Questions</span>
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-300">
                    Find answers to common questions about orders, shipping, products, and more.
                </p>
            </section>

            <div class="space-y-4 relative z-10" x-data="{ open: null }">
                <!-- Orders & Account -->
                <div class="bg-white dark:bg-[#1a2920] rounded-2xl border border-gray-100 dark:border-[#2a4535] overflow-hidden transition-colors duration-300">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white px-6 py-4 border-b border-gray-100 dark:border-[#2a4535] flex items-center gap-2">
                        <span class="w-2 h-6 bg-[#7FA82E] rounded-full"></span>
                        Orders & Account
                    </h2>
                    <div class="divide-y divide-gray-100 dark:divide-[#2a4535]">
                        <div class="border-gray-100 dark:border-[#2a4535]">
                            <button type="button" @click="open = open === 1 ? null : 1" class="w-full text-left px-6 py-4 flex justify-between items-center text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-[#121e16]/50 transition-colors">
                                <span class="font-semibold">How do I track my order?</span>
                                <svg class="w-5 h-5 text-[#7FA82E] shrink-0 transition-transform" :class="{ 'rotate-180': open === 1 }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open === 1" x-transition class="px-6 pb-4 text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                Use our <a href="{{ route('track-order.form') }}" class="text-[#7FA82E] font-semibold hover:underline">Track your order</a> page with your Order ID and email. If you have an account, you can also log in and go to Dashboard → Active Orders to see current orders and view details.
                            </div>
                        </div>
                        <div class="border-gray-100 dark:border-[#2a4535]">
                            <button type="button" @click="open = open === 2 ? null : 2" class="w-full text-left px-6 py-4 flex justify-between items-center text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-[#121e16]/50 transition-colors">
                                <span class="font-semibold">How do I change or cancel my order?</span>
                                <svg class="w-5 h-5 text-[#7FA82E] shrink-0 transition-transform" :class="{ 'rotate-180': open === 2 }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open === 2" x-transition class="px-6 pb-4 text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                Contact us as soon as possible with your order number. We will try to modify or cancel your order before it ships. Once shipped, standard returns policy applies.
                            </div>
                        </div>
                        <div class="border-gray-100 dark:border-[#2a4535]">
                            <button type="button" @click="open = open === 3 ? null : 3" class="w-full text-left px-6 py-4 flex justify-between items-center text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-[#121e16]/50 transition-colors">
                                <span class="font-semibold">Do I need an account to place an order?</span>
                                <svg class="w-5 h-5 text-[#7FA82E] shrink-0 transition-transform" :class="{ 'rotate-180': open === 3 }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open === 3" x-transition class="px-6 pb-4 text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                Yes. Creating an account lets you track orders, save your quiz results for personalised recommendations, and manage your details easily.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shipping & Delivery -->
                <div class="bg-white dark:bg-[#1a2920] rounded-2xl border border-gray-100 dark:border-[#2a4535] overflow-hidden transition-colors duration-300">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white px-6 py-4 border-b border-gray-100 dark:border-[#2a4535] flex items-center gap-2">
                        <span class="w-2 h-6 bg-[#7FA82E] rounded-full"></span>
                        Shipping & Delivery
                    </h2>
                    <div class="divide-y divide-gray-100 dark:divide-[#2a4535]">
                        <div class="border-gray-100 dark:border-[#2a4535]">
                            <button type="button" @click="open = open === 4 ? null : 4" class="w-full text-left px-6 py-4 flex justify-between items-center text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-[#121e16]/50 transition-colors">
                                <span class="font-semibold">How long does delivery take?</span>
                                <svg class="w-5 h-5 text-[#7FA82E] shrink-0 transition-transform" :class="{ 'rotate-180': open === 4 }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open === 4" x-transition class="px-6 pb-4 text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                We aim to deliver within one week of ordering at no extra cost. Delivery times may vary by location.
                            </div>
                        </div>
                        <div class="border-gray-100 dark:border-[#2a4535]">
                            <button type="button" @click="open = open === 5 ? null : 5" class="w-full text-left px-6 py-4 flex justify-between items-center text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-[#121e16]/50 transition-colors">
                                <span class="font-semibold">Do you ship worldwide?</span>
                                <svg class="w-5 h-5 text-[#7FA82E] shrink-0 transition-transform" :class="{ 'rotate-180': open === 5 }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open === 5" x-transition class="px-6 pb-4 text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                Yes. We offer worldwide shipping so you can get WELLTH products wherever you are.
                            </div>
                        </div>
                        <div class="border-gray-100 dark:border-[#2a4535]">
                            <button type="button" @click="open = open === 6 ? null : 6" class="w-full text-left px-6 py-4 flex justify-between items-center text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-[#121e16]/50 transition-colors">
                                <span class="font-semibold">Is shipping free?</span>
                                <svg class="w-5 h-5 text-[#7FA82E] shrink-0 transition-transform" :class="{ 'rotate-180': open === 6 }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open === 6" x-transition class="px-6 pb-4 text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                Yes. We offer free worldwide shipping on your order.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products & Supplements -->
                <div class="bg-white dark:bg-[#1a2920] rounded-2xl border border-gray-100 dark:border-[#2a4535] overflow-hidden transition-colors duration-300">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white px-6 py-4 border-b border-gray-100 dark:border-[#2a4535] flex items-center gap-2">
                        <span class="w-2 h-6 bg-[#7FA82E] rounded-full"></span>
                        Products & Supplements
                    </h2>
                    <div class="divide-y divide-gray-100 dark:divide-[#2a4535]">
                        <div class="border-gray-100 dark:border-[#2a4535]">
                            <button type="button" @click="open = open === 7 ? null : 7" class="w-full text-left px-6 py-4 flex justify-between items-center text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-[#121e16]/50 transition-colors">
                                <span class="font-semibold">Are your products safe and tested?</span>
                                <svg class="w-5 h-5 text-[#7FA82E] shrink-0 transition-transform" :class="{ 'rotate-180': open === 7 }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open === 7" x-transition class="px-6 pb-4 text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                Yes. Our products are scientifically tested to ensure quality and reliability for our customers.
                            </div>
                        </div>
                        <div class="border-gray-100 dark:border-[#2a4535]">
                            <button type="button" @click="open = open === 8 ? null : 8" class="w-full text-left px-6 py-4 flex justify-between items-center text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-[#121e16]/50 transition-colors">
                                <span class="font-semibold">How do I know which product is right for me?</span>
                                <svg class="w-5 h-5 text-[#7FA82E] shrink-0 transition-transform" :class="{ 'rotate-180': open === 8 }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open === 8" x-transition class="px-6 pb-4 text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                Take our <a href="{{ route('quiz.index') }}" class="text-[#7FA82E] font-semibold hover:underline">Quiz</a> — answer a few questions about your goals and we’ll recommend supplements that fit you.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Returns & Refunds -->
                <div class="bg-white dark:bg-[#1a2920] rounded-2xl border border-gray-100 dark:border-[#2a4535] overflow-hidden transition-colors duration-300">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white px-6 py-4 border-b border-gray-100 dark:border-[#2a4535] flex items-center gap-2">
                        <span class="w-2 h-6 bg-[#7FA82E] rounded-full"></span>
                        Returns & Refunds
                    </h2>
                    <div class="divide-y divide-gray-100 dark:divide-[#2a4535]">
                        <div class="border-gray-100 dark:border-[#2a4535]">
                            <button type="button" @click="open = open === 9 ? null : 9" class="w-full text-left px-6 py-4 flex justify-between items-center text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-[#121e16]/50 transition-colors">
                                <span class="font-semibold">What is your returns policy?</span>
                                <svg class="w-5 h-5 text-[#7FA82E] shrink-0 transition-transform" :class="{ 'rotate-180': open === 9 }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open === 9" x-transition class="px-6 pb-4 text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                Unopened items can be returned within 30 days of delivery. Contact us with your order number to start a return. Refunds are processed once we receive the item.
                            </div>
                        </div>
                        <div class="border-gray-100 dark:border-[#2a4535]">
                            <button type="button" @click="open = open === 10 ? null : 10" class="w-full text-left px-6 py-4 flex justify-between items-center text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-[#121e16]/50 transition-colors">
                                <span class="font-semibold">How do I request a refund?</span>
                                <svg class="w-5 h-5 text-[#7FA82E] shrink-0 transition-transform" :class="{ 'rotate-180': open === 10 }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open === 10" x-transition class="px-6 pb-4 text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                <a href="{{ route('contact.index') }}" class="text-[#7FA82E] font-semibold hover:underline">Contact us</a> with your order ID and reason for the refund. We’ll guide you through the process.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Account & Data -->
                <div class="bg-white dark:bg-[#1a2920] rounded-2xl border border-gray-100 dark:border-[#2a4535] overflow-hidden transition-colors duration-300">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white px-6 py-4 border-b border-gray-100 dark:border-[#2a4535] flex items-center gap-2">
                        <span class="w-2 h-6 bg-[#7FA82E] rounded-full"></span>
                        Account & Data
                    </h2>
                    <div class="divide-y divide-gray-100 dark:divide-[#2a4535]">
                        <div class="border-gray-100 dark:border-[#2a4535]">
                            <button type="button" @click="open = open === 11 ? null : 11" class="w-full text-left px-6 py-4 flex justify-between items-center text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-[#121e16]/50 transition-colors">
                                <span class="font-semibold">How is my data used?</span>
                                <svg class="w-5 h-5 text-[#7FA82E] shrink-0 transition-transform" :class="{ 'rotate-180': open === 11 }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open === 11" x-transition class="px-6 pb-4 text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                Your details are stored in line with GDPR. We use your data to process orders, send updates, and improve your experience. We do not sell your data.
                            </div>
                        </div>
                        <div class="border-gray-100 dark:border-[#2a4535]">
                            <button type="button" @click="open = open === 12 ? null : 12" class="w-full text-left px-6 py-4 flex justify-between items-center text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-[#121e16]/50 transition-colors">
                                <span class="font-semibold">How do I update my details or delete my account?</span>
                                <svg class="w-5 h-5 text-[#7FA82E] shrink-0 transition-transform" :class="{ 'rotate-180': open === 12 }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open === 12" x-transition class="px-6 pb-4 text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                Log in and go to Dashboard (or click your name → Profile). There you can update your information or delete your account.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- General -->
                <div class="bg-white dark:bg-[#1a2920] rounded-2xl border border-gray-100 dark:border-[#2a4535] overflow-hidden transition-colors duration-300">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white px-6 py-4 border-b border-gray-100 dark:border-[#2a4535] flex items-center gap-2">
                        <span class="w-2 h-6 bg-[#7FA82E] rounded-full"></span>
                        General
                    </h2>
                    <div class="divide-y divide-gray-100 dark:divide-[#2a4535]">
                        <div class="border-gray-100 dark:border-[#2a4535]">
                            <button type="button" @click="open = open === 13 ? null : 13" class="w-full text-left px-6 py-4 flex justify-between items-center text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-[#121e16]/50 transition-colors">
                                <span class="font-semibold">What is WELLTH?</span>
                                <svg class="w-5 h-5 text-[#7FA82E] shrink-0 transition-transform" :class="{ 'rotate-180': open === 13 }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open === 13" x-transition class="px-6 pb-4 text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                WELLTH is your health and wellness brand. We sell premium supplements and fitness essentials to help you train harder, recover faster, and live stronger.
                            </div>
                        </div>
                        <div class="border-gray-100 dark:border-[#2a4535]">
                            <button type="button" @click="open = open === 14 ? null : 14" class="w-full text-left px-6 py-4 flex justify-between items-center text-gray-900 dark:text-white hover:bg-gray-50 dark:hover:bg-[#121e16]/50 transition-colors">
                                <span class="font-semibold">How do I contact you?</span>
                                <svg class="w-5 h-5 text-[#7FA82E] shrink-0 transition-transform" :class="{ 'rotate-180': open === 14 }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div x-show="open === 14" x-transition class="px-6 pb-4 text-gray-600 dark:text-gray-400 text-sm leading-relaxed">
                                Use our <a href="{{ route('contact.index') }}" class="text-[#7FA82E] font-semibold hover:underline">Contact</a> page to send a message. We aim to reply within 24–48 hours.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-10 text-center">
                <p class="text-gray-500 dark:text-gray-400 mb-4">Still have questions?</p>
                <a href="{{ route('contact.index') }}" class="inline-flex items-center justify-center rounded-full bg-[#7FA82E] px-6 py-3 text-sm font-semibold text-white hover:bg-[#6d9126] transition shadow-lg">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</x-layout>
