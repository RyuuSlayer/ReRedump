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
                discord: {
                    100: '#424549',  // Lightest
                    200: '#36393e',  // Light
                    300: '#282b30',  // Dark
                    400: '#1e2124',  // Darkest
                },
                ui: {
                    border: '#d1d5db',     // gray-300
                    text: {
                        primary: '#374151', // gray-700
                        secondary: '#6b7280', // gray-500
                        light: '#9ca3af',   // gray-400
                    },
                    bg: {
                        primary: '#f9fafb', // gray-50
                        secondary: '#f3f4f6', // gray-100
                    },
                    accent: {
                        DEFAULT: '#6366f1', // indigo-500
                        hover: '#4f46e5',   // indigo-600
                        focus: '#4338ca',   // indigo-700
                    }
                }
            },
        },
    },

    darkMode: 'media',
    plugins: [forms, typography],
};
