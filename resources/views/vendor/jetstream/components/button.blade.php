<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-100 border border-transparent rounded-md font-semibold text-xs text-white dark:text-black uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 active:bg-gray-900 active:bg-gray-200 focus:outline-none focus:border-gray-900 focus:border-gray-300 focus:ring focus:ring-gray-300 dark:focus:ring-gray-700 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
