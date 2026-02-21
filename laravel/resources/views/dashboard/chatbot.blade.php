<!-- This is the chatbot view in the user dashboard. It displays a chat interface with a personal trainer AI assistant.
    The chatbot is currently a placeholder for a future AI integration.
-->

<x-layout>
    <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto h-[80vh] flex flex-col"> 
            
            <div class="mb-6">
                <x-dashboard-tabs />
            </div>
            <!-- In this container, we have the chat interface. The header contains the chatbot's name and status, the main section displays the conversation, and the footer has an input field for the user to type messages. -->
            <div class="flex-1 bg-white dark:bg-[#1a2920] rounded-3xl shadow-2xl border border-gray-100 dark:border-[#2a4535] overflow-hidden flex flex-col transition-colors duration-300 relative">

                <div class="p-6 border-b border-gray-100 dark:border-[#2a4535] flex items-center justify-between bg-white dark:bg-[#1a2920] z-10">
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            <div class="w-12 h-12 rounded-full bg-[#7FA82E]/10 flex items-center justify-center border border-[#7FA82E]/20">
                                <svg class="w-7 h-7 text-[#7FA82E]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <span class="absolute bottom-0 right-0 block h-3 w-3 rounded-full bg-green-500 ring-2 ring-white dark:ring-[#1a2920]"></span>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white">WELLTH Personal Trainer</h2>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Always online • Ready to help</p>
                        </div>
                    </div>
                </div>

                <div class="flex-1 overflow-y-auto p-6 space-y-6 bg-gray-50 dark:bg-[#121e16] custom-scrollbar"> <!-- Example conversation. -->
                    
                    <div class="flex justify-start">
                        <div class="flex-shrink-0 mr-3">
                            <div class="w-8 h-8 rounded-full bg-[#7FA82E] flex items-center justify-center text-white text-xs font-bold">AI</div>
                        </div>
                        <div class="bg-white dark:bg-[#1a2920] text-gray-800 dark:text-gray-200 rounded-2xl rounded-tl-none border border-gray-200 dark:border-[#2a4535] px-5 py-3 shadow-sm max-w-[85%] text-sm leading-relaxed">
                            <p>Hello! How can I help you reach your fitness goals today?</p>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <div class="bg-[#7FA82E] text-white rounded-2xl rounded-tr-none px-5 py-3 shadow-md max-w-[85%] text-sm leading-relaxed">
                            <p>I need a protein powder for weight loss.</p>
                        </div>
                    </div>

                    <div class="flex justify-center my-4"> <!-- Warning message -> chatbot feature is still under development. -->
                        <div class="bg-gray-200 dark:bg-[#2a4535] text-gray-600 dark:text-gray-300 rounded-full px-4 py-1.5 text-xs font-bold uppercase tracking-wide flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            System: Feature Under Development
                        </div>
                    </div>
                </div>

                <div class="p-4 bg-white dark:bg-[#1a2920] border-t border-gray-100 dark:border-[#2a4535]"> <!-- Input field for user messages. -->
                    <form class="relative flex items-center gap-2">
                        
                        <input type="text" 
                               placeholder="Type your message..." 
                               class="w-full pl-6 pr-14 py-4 rounded-full border-gray-200 dark:border-[#2a4535] bg-gray-50 dark:bg-[#121e16] text-gray-900 dark:text-white shadow-inner focus:border-[#7FA82E] focus:ring focus:ring-[#7FA82E] focus:ring-opacity-50 transition-colors"
                        >
                        
                        <button type="submit" class="absolute right-2 top-2 bottom-2 bg-[#2B332A] dark:bg-[#7FA82E] text-white rounded-full w-10 h-10 flex items-center justify-center hover:bg-black dark:hover:bg-[#6d9126] transition-colors shadow-md">
                            <svg class="w-5 h-5 ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        </button>
                    </form>
                    <p class="text-center text-[10px] text-gray-400 mt-2"> <!-- Disclaimer about the chatbot's AI nature. -->
                        AI can make mistakes. Please check important info.
                    </p>
                </div>

            </div>
        </div>
    </div>
</x-layout>