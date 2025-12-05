@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-[#7FA82E] dark:focus:border-[#7FA82E] focus:ring-[#7FA82E] dark:focus:ring-[#7FA82E] rounded-md shadow-sm']) }}>