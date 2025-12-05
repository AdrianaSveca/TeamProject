<head>
    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none; 
            scrollbar-width: none;
        }

        nav{
            background-color: rgb(45,50,44);
        }

        .-mb-px flex space-x-8 px-6 overflow-x-auto {
            background-color: rgb(45,50,44);
            border-radius: 50%;
        }
    </style>
</head>


<!-- Dashboard Tabs, -->
<div class="bg-white shadow mb-5 rounded-lg">
    <div class="border-b border-gray-200">
        <nav class="-mb-px flex space-between space-x-8 px-6 overflow-x-auto" aria-label="Tabs">
            
            <!-- First page (default), Overview -->
            <a href="{{ route('dashboard') }}" 
               class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition duration-150
               {{ request()->routeIs('dashboard') 
                    ? 'border-[#7FA82E] text-[#7FA82E]' 
                    : 'border-transparent text-gray-500 hover:text-[#7FA82E] hover:border-gray-300' }}">
                Overview
            </a>

            <!-- 2nd tab Active Orders -->
            <a href="{{ route('dashboard.active-orders') }}" 
               class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition duration-150
               {{ request()->routeIs('dashboard.active-orders') 
                    ? 'border-[#7FA82E] text-[#7FA82E]' 
                    : 'border-transparent text-gray-500 hover:text-[#7FA82E] hover:border-gray-300' }}">
                Active Orders
            </a>

            <!-- 3rd tab Order History -->
            <a href="{{ route('dashboard.order-history') }}" 
               class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition duration-150
               {{ request()->routeIs('dashboard.order-history') 
                    ? 'border-[#7FA82E] text-[#7FA82E]' 
                    : 'border-transparent text-gray-500 hover:text-[#7FA82E] hover:border-gray-300' }}">
                Order History
            </a>

            <!-- 4th tab Chatbot -->
            <a href="{{ route('dashboard.chatbot') }}" 
               class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition duration-150
               {{ request()->routeIs('dashboard.chatbot') 
                    ? 'border-[#7FA82E] text-[#7FA82E]' 
                    : 'border-transparent text-gray-500 hover:text-[#7FA82E] hover:border-gray-300' }}">
                Personal Trainer
            </a>

        </nav>
    </div>
</div>