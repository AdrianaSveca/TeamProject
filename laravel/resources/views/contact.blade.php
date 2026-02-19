<x-layout>
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        
        <div class="max-w-7xl mx-auto flex flex-col gap-10">

            <section class="text-center sm:text-left">
                <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-4">
                    Contact <span class="text-[#7FA82E]">Us</span>
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl">
                    Have any enquires about WELLTH, your orders, or even your account?  
                    Fill in the form below and our team will get back to you with a swift response.
                </p>
                
                @if (session('status'))
                    <div class="mt-6 rounded-xl border border-emerald-200 bg-emerald-50 dark:bg-emerald-900/30 dark:border-emerald-800 px-4 py-3 text-sm text-emerald-800 dark:text-emerald-200">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mt-6 rounded-xl border border-red-200 bg-red-50 dark:bg-red-900/30 dark:border-red-800 px-4 py-3 text-sm text-red-800 dark:text-red-200">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </section>

            <section class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                
                <div class="lg:col-span-2 bg-white dark:bg-[#1a2920] rounded-3xl shadow-2xl border border-gray-100 dark:border-[#2a4535] relative overflow-hidden p-8 transition-colors duration-300">
                    
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-[#7FA82E] rounded-full blur-[80px] opacity-20 pointer-events-none"></div>

                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 relative z-10">
                        Send us a message
                    </h2>

                    <form method="POST" action="{{ route('contact.submit') }}" class="space-y-6 relative z-10">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="first_name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                                    First name
                                </label>
                                <input
                                    type="text"
                                    id="first_name"
                                    name="first_name"
                                    value="{{ old('first_name') }}"
                                    required
                                    class="block w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring focus:ring-[#7FA82E] focus:ring-opacity-50 py-3 px-4 transition-colors"
                                >
                            </div>

                            <div>
                                <label for="last_name" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                                    Last name
                                </label>
                                <input
                                    type="text"
                                    id="last_name"
                                    name="last_name"
                                    value="{{ old('last_name') }}"
                                    required
                                    class="block w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring focus:ring-[#7FA82E] focus:ring-opacity-50 py-3 px-4 transition-colors"
                                >
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                                Email address
                            </label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="e.g. 240080721@aston.ac.uk"
                                required
                                class="block w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring focus:ring-[#7FA82E] focus:ring-opacity-50 py-3 px-4 transition-colors"
                            >
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                                Subject
                            </label>
                            <input
                                type="text"
                                id="subject"
                                name="subject"
                                value="{{ old('subject') }}"
                                placeholder="e.g. Question about my order"
                                required
                                class="block w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring focus:ring-[#7FA82E] focus:ring-opacity-50 py-3 px-4 transition-colors"
                            >
                        </div>

                        <div>
                            <label for="topic" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                                Topic
                            </label>
                            <div class="relative">
                                <select
                                    id="topic"
                                    name="topic"
                                    class="block w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring focus:ring-[#7FA82E] focus:ring-opacity-50 py-3 px-4 appearance-none transition-colors"
                                >
                                    <option value="">Select a topic</option>
                                    <option value="General enquiry"   {{ old('topic') === 'General enquiry' ? 'selected' : '' }}>General enquiry</option>
                                    <option value="Orders & payments" {{ old('topic') === 'Orders & payments' ? 'selected' : '' }}>Orders &amp; payments</option>
                                    <option value="Quiz & account"    {{ old('topic') === 'Quiz & account' ? 'selected' : '' }}>Quiz &amp; account</option>
                                    <option value="Technical issue"   {{ old('topic') === 'Technical issue' ? 'selected' : '' }}>Technical issue</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                                Message
                            </label>
                            <textarea
                                id="message"
                                name="message"
                                rows="5"
                                required
                                placeholder="Tell us how we can help…"
                                class="block w-full rounded-xl border-gray-300 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white shadow-sm focus:border-[#7FA82E] focus:ring focus:ring-[#7FA82E] focus:ring-opacity-50 py-3 px-4 transition-colors"
                            >{{ old('message') }}</textarea>
                        </div>

                        <div class="pt-4">
                            <button
                                type="submit"
                                class="w-full sm:w-auto inline-flex items-center justify-center rounded-full bg-[#7FA82E] px-8 py-3 text-base font-bold text-white shadow-lg hover:shadow-[#7FA82E]/40 hover:bg-[#6d9126] hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#7FA82E]"
                            >
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>

                <aside class="bg-[#1f5b38] dark:bg-[#1a2920] border border-transparent dark:border-[#2a4535] text-gray-100 rounded-3xl shadow-xl p-8 space-y-8 transition-colors duration-300">
                    <div>
                        <h2 class="text-xl font-bold text-white mb-2">
                            Alternative Contact
                        </h2>
                        <p class="text-sm text-gray-200 dark:text-gray-400">
                            Our support team are available from 7am-7pm (GMT).
                        </p>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-start gap-4">
                            <div class="mt-1 bg-white/10 p-2 rounded-lg text-[#7FA82E]">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-white">Email</h3>
                                <a href="mailto:240080721@aston.ac.uk" class="text-sm hover:text-[#7FA82E] transition-colors">
                                    240080721@aston.ac.uk
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="mt-1 bg-white/10 p-2 rounded-lg text-[#7FA82E]">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-white">Phone</h3>
                                <a href="tel:0121 204 3000" class="text-sm hover:text-[#7FA82E] transition-colors">
                                    0121 204 3000
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="mt-1 bg-white/10 p-2 rounded-lg text-[#7FA82E]">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-white">Address</h3>
                                <p class="text-sm text-gray-200 dark:text-gray-400 leading-relaxed">
                                    WELLTH<br>
                                    1 Aston Street<br>
                                    Birmingham, B4 7ET<br>    
                                    United Kingdom
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-white/10 pt-6">
                        <h3 class="text-sm font-bold text-white mb-2">Already a member?</h3>
                        <p class="text-sm text-gray-200 dark:text-gray-400">
                            Log into your account and check your
                            <span class="font-bold text-white">Dashboard</span> for faster support and order updates.
                        </p>
                    </div>
                </aside>
            </section>
        </div>
    </div>
</x-layout>