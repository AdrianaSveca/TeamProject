<x-layout>
    {{-- Page wrapper --}}
    <div class="min-h-[60vh] flex flex-col gap-8">

        {{-- Heading + intro --}}
        <section>
            <h1 class="text-3xl font-semibold text-gray-900 mb-2">
                Contact Us
            </h1>
            <p class="text-gray-600 max-w-2xl">
                Have any enquires about WELLTH, your orders, or even your account?  
                Fill in the following form and our team will get back to you with a swift response regarding any of your troubles.
            </p>

            {{-- Flash & validation messages (optional) --}}
            @if (session('status'))
                <div class="mt-4 rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mt-4 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </section>

        {{-- Main grid: form + info --}}
        <section class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            {{-- CONTACT FORM --}}
            <div class="lg:col-span-2 bg-white rounded-xl border-4 border-[#7FA82E] hover:shadow-[5px_5px_0_#2d322c] transition-all duration-300 shadow-sm p-6 lg:p-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">
                    Send us a message
                </h2>

                <form method="POST" action="{{ url('/contact') }}" class="space-y-5">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">
                                First name
                            </label>
                            <input
                                type="text"
                                id="first_name"
                                name="first_name"
                                value="{{ old('first_name') }}"
                                required
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E] text-sm"
                            >
                        </div>

                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">
                                Last name
                            </label>
                            <input
                                type="text"
                                id="last_name"
                                name="last_name"
                                value="{{ old('last_name') }}"
                                required
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E] text-sm"
                            >
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                            Email address
                        </label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="e.g. 240080721@aston.ac.uk"
                            required
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E] text-sm"
                        >
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">
                            Subject
                        </label>
                        <input
                            type="text"
                            id="subject"
                            name="subject"
                            value="{{ old('subject') }}"
                            placeholder="e.g. Question about my order"
                            required
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E] text-sm"
                        >
                    </div>

                    <div>
                        <label for="topic" class="block text-sm font-medium text-gray-700 mb-1">
                            Topic
                        </label>
                        <select
                            id="topic"
                            name="topic"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E] text-sm"
                        >
                            <option value="">Select a topic</option>
                            <option value="general"   {{ old('topic') === 'general' ? 'selected' : '' }}>General enquiry</option>
                            <option value="orders"    {{ old('topic') === 'orders' ? 'selected' : '' }}>Orders &amp; payments</option>
                            <option value="quiz"      {{ old('topic') === 'quiz' ? 'selected' : '' }}>Quiz &amp; account</option>
                            <option value="technical" {{ old('topic') === 'technical' ? 'selected' : '' }}>Technical issue</option>
                        </select>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">
                            Message
                        </label>
                        <textarea
                            id="message"
                            name="message"
                            rows="5"
                            required
                            placeholder="Tell us how we can help…"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E] text-sm"
                        >{{ old('message') }}</textarea>
                    </div>

                    <div>
                        <span class="block text-sm font-medium text-gray-700 mb-1">
                            Preferred contact method
                        </span>
                        <div class="flex flex-wrap gap-4 text-sm text-gray-700">
                            <label class="inline-flex items-center gap-2">
                                <input
                                    type="radio"
                                    name="contact_method"
                                    value="email"
                                    class="rounded border-gray-300 text-[#7FA82E] focus:ring-[#7FA82E]"
                                    {{ old('contact_method', 'email') === 'email' ? 'checked' : '' }}
                                >
                                <span>Email</span>
                            </label>

                            <label class="inline-flex items-center gap-2">
                                <input
                                    type="radio"
                                    name="contact_method"
                                    value="phone"
                                    class="rounded border-gray-300 text-[#7FA82E] focus:ring-[#7FA82E]"
                                    {{ old('contact_method') === 'phone' ? 'checked' : '' }}
                                >
                                <span>Mobile (if applicable)</span>
                            </label>
                        </div>
                    </div>

                    <div class="pt-2">
                        <button
                            type="submit"
                            class="inline-flex items-center justify-center rounded-md bg-[#7FA82E] px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#6d9126] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#7FA82E]"
                        >
                            Send Message
                        </button>
                    </div>
                </form>
            </div>

            {{-- INFO SIDEBAR --}}
            <aside class="bg-[#1f5b38] text-gray-100 rounded-xl shadow-[10px_10px_0_#2d322c] p-6 lg:p-8 space-y-5">
                <h2 class="text-xl font-semibold">
                    Alternative Contact Methods
                </h2>

                <p class="text-sm text-gray-100/80">
                    Our support team are available from 7am-7pm (GMT).
                </p>

                <div class="space-y-1">
                    <h3 class="text-sm font-semibold">Email</h3>
                    <p class="text-sm">
                        <a href="mailto:240080721@aston.ac.uk" class="hover:underline">
                            240080721@aston.ac.uk
                        </a>
                    </p>
                </div>

                <div class="space-y-1">
                    <h3 class="text-sm font-semibold">Phone</h3>
                    <p class="text-sm">
                        <a href="tel:0121 204 3000" class="hover:underline">
                            0121 204 3000
                        </a>
                    </p>
                </div>

                <div class="space-y-1">
                    <h3 class="text-sm font-semibold">Address</h3>
                    <p class="text-sm">
                        WELLTH<br>
                        1 Aston Street<br>
                        Birmingham, B4 7ET<br>    
                        United Kingdom
                    </p>
                </div>

                <div class="space-y-1">
                    <h3 class="text-sm font-semibold">Already a member?</h3>
                    <p class="text-sm text-gray-100/80">
                        Log into your account and locate
                        <span class="font-semibold">Dashbord</span> for a more responsive and prompt result for quizzes along with updates on orders.
                    </p>
                </div>
            </aside>
        </section>
    </div>
</x-layout>