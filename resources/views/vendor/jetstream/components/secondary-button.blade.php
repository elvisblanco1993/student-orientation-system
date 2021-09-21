<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-700 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-200 uppercase tracking-widest shadow-sm hover:text-gray-500 dark:hover:text-gray-300 focus:outline-none focus:border-blue-300 dark:focus:border-blue-700 focus:ring focus:ring-blue-200 dark:focus:ring-blue-600 active:text-gray-800 active:bg-gray-50 dark:active:text-gray-200 dark:active:bg-gray-800 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
