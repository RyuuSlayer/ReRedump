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
                    'd-100': '#424549',  // Light
                    'd-200': '#36393e',  // Light
                    'd-300': '#282b30',  // Dark
                    'd-400': '#1e2124',  // Darkest
                    'l-100': '#ffffff',
                    'l-200': '#e6e6e6',
                    'l-300': '#d9d9d9',
                    'l-400': '#cccccc',
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
                        DEFAULT: '#424549', // discord-d-100
                        hover: '#36393e',   // discord-d-200
                        focus: '#282b30',   // discord-d-300
                    }
                }
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
