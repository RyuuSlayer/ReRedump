<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-theme-d-200 dark:bg-theme-l-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-theme-d-200 uppercase tracking-widest hover:bg-theme-d-300 dark:hover:bg-theme-l-300 focus:bg-theme-d-300 dark:focus:bg-theme-l-300 active:bg-theme-d-400 dark:active:bg-theme-l-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-theme-d-200 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
