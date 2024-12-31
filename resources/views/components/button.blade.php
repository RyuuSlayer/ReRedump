<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-discord-d-200 dark:bg-discord-l-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-discord-d-200 uppercase tracking-widest hover:bg-discord-d-300 dark:hover:bg-discord-l-300 focus:bg-discord-d-300 dark:focus:bg-discord-l-300 active:bg-discord-d-400 dark:active:bg-discord-l-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-discord-d-200 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
