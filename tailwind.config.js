import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Outfit', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'bauhaus-bg': '#F0F0F0',
                'bauhaus-foreground': '#121212',
                'bauhaus-red': '#D02020',
                'bauhaus-blue': '#1040C0',
                'bauhaus-yellow': '#F0C020',
                'bauhaus-border': '#121212',
                'bauhaus-muted': '#E0E0E0',
            },
            boxShadow: {
                'bauhaus-sm': '3px 3px 0px 0px #121212',
                'bauhaus-md': '6px 6px 0px 0px #121212',
                'bauhaus-lg': '8px 8px 0px 0px #121212',
            },
        },
    },

    plugins: [forms],
};
