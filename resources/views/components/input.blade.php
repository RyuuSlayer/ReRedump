@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-ui-border dark:border-discord-400 dark:bg-discord-100 text-ui-text-primary dark:text-gray-300 focus:border-ui-accent focus:ring-ui-accent dark:focus:border-ui-accent-hover dark:focus:ring-ui-accent-hover rounded-md shadow-sm']) !!}>
