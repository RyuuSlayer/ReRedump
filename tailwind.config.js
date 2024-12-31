import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                theme: {
                    'd-100': '#424549',  // Light dark
                    'd-200': '#36393e',  // Medium dark
                    'd-300': '#282b30',  // Dark
                    'd-400': '#1e2124',  // Darkest
                    'l-100': '#ffffff',  // Pure white
                    'l-200': '#f0f0f0',  // Light gray (matches d-100 to d-200 step)
                    'l-300': '#dedede',  // Medium gray (matches d-200 to d-300 step)
                    'l-400': '#d0d0d0',  // Dark gray (matches d-300 to d-400 step)
                },
            },
        },
    },

    darkMode: 'media',
    plugins: [forms, typography, function({ addBase }) {
        addBase({
            '*': {
                '&::-webkit-scrollbar': {
                    display: 'none'
                },
                '-ms-overflow-style': 'none',
                'scrollbar-width': 'none'
            }
        });
    }],
};
