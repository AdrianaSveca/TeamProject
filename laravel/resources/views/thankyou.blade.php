<x-layout>
    <div class="min-h-[60vh] flex items-center justify-center">
        <div class="bg-white p-8 rounded-xl shadow-lg border-4 border-[#7FA82E] max-w-lg w-full text-center">
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-[#7FA82E]/10 mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-[#7FA82E]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
            </div>

            <h1 class="text-2xl font-bold text-gray-900 mb-2">Thank you!</h1>
            <p class="text-gray-600 mb-8">
                Your message has been received. Our team has been notified and we will get back to you shortly.
            </p>

            <div class="space-y-3">
                <a href="{{ url('/') }}" class="block w-full rounded-md bg-[#7FA82E] px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#6d9126] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#7FA82E] transition-colors">
                    Back to Home
                </a>
                
                <a href="{{ url('/shop') }}" class="block w-full rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-[#7FA82E] border border-[#7FA82E] shadow-sm hover:bg-gray-50 transition-colors">
                    Continue Shopping
                </a>
            </div>
        </div>
    </div>
</x-layout>