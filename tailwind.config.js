import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
const defaultTheme = require('tailwindcss/defaultTheme')


/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['InterVariable', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        forms,
        function ({ addBase }) {
            addBase({
                'ol': {
                    '@apply list-decimal pl-6 space-y-0 text-black': '',
                },
                'ul': {
                    '@apply list-disc pl-6 space-y-0 text-black': '',
                },
                'li': {
                    '@apply text-black': '',
                },
            });
        },
    ],
};
