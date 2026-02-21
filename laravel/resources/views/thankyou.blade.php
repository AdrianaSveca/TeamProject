<!-- In this file, we create a simple thank you page that is displayed after a user submits the contact form. 
    The page includes a message confirming that the message has been sent and provides links to return to the home page or continue shopping.
-->

<x-layout>
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-[#7FA82E] rounded-full blur-[120px] opacity-10 pointer-events-none"></div> <!-- This is the large blurred green circle in the background -->

        <div class="max-w-md w-full bg-white dark:bg-[#1a2920] p-10 rounded-3xl shadow-2xl border border-gray-100 dark:border-[#2a4535] relative z-10 text-center transition-colors duration-300">
            
            <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-green-50 dark:bg-[#7FA82E]/10 mb-6 shadow-inner"> <!-- This is the green circle with the checkmark icon inside it -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-10 h-10 text-[#7FA82E]">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
            </div>

            <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-4"> <!-- This is the main heading of the thank you page -->
                Thank <span class="text-[#7FA82E]">You!</span>
            </h1>
            
            <p class="text-gray-600 dark:text-gray-300 mb-8 leading-relaxed text-lg">
                Your message has been successfully sent. Our support team has been notified and will get back to you shortly.
            </p>

            <div class="space-y-4">
                <a href="{{ url('/') }}" class="block w-full rounded-full bg-[#7FA82E] px-6 py-3.5 text-base font-bold text-white shadow-lg hover:bg-[#6d9126] hover:shadow-[#7FA82E]/40 hover:-translate-y-1 transition-all duration-300">
                    Back to Home
                </a>
                
                <a href="{{ url('/shop') }}" class="block w-full rounded-full bg-white dark:bg-transparent px-6 py-3.5 text-base font-bold text-gray-700 dark:text-gray-200 border-2 border-gray-100 dark:border-[#2a4535] hover:border-[#7FA82E] dark:hover:border-[#7FA82E] hover:text-[#7FA82E] dark:hover:text-[#7FA82E] transition-all duration-300">
                    Continue Shopping
                </a>
            </div>
        </div>
    </div>
</x-layout>