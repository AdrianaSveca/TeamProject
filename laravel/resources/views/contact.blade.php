<x-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                
                <h1 class="text-3xl font-bold text-center text-[#7FA82E] mb-6">Contact Us</h1>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    
                    {{-- Contact Info --}}
                    <div>
                        <h2 class="text-xl font-bold text-gray-900 mb-4">Get in Touch</h2>
                        <p class="text-gray-600 mb-4">
                            Have a question about our products or your order? We're here to help!
                        </p>
                        
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-[#7FA82E] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                <span>support@wellth.com</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-[#7FA82E] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                <span>+44 123 456 7890</span>
                            </div>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-[#7FA82E] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span>Aston University, Birmingham, UK</span>
                            </div>
                        </div>
                    </div>

                    {{-- Contact Form --}}
                    <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                        <form action="#" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Message</label>
                                <textarea name="message" rows="4" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#7FA82E] focus:ring-[#7FA82E]"></textarea>
                            </div>
                            <button type="button" class="w-full bg-[#2B332A] text-white font-bold py-2 px-4 rounded hover:bg-black transition">
                                Send Message
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layout>