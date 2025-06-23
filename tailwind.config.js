import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/views/**/*.blade.php',       // All Blade views
        './resources/js/**/*.js',                 // JS files (Alpine, Vue, etc.)
        './resources/css/**/*.css',               // Custom CSS if needed
        './storage/framework/views/*.php',        // Cached views (only if needed)
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php', // Laravel's pagination views
    ],

    darkMode: 'class',

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                poppins: ['Poppins', 'sans-serif'], // ✅ added Poppins
            },
            animation: {
                fadeIn: 'fadeIn 1s ease-out forwards',
                fadeInUp: 'fadeInUp 1s ease-out forwards', // ✅ Added this
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                fadeInUp: { // ✅ Added this
                    '0%': {
                        opacity: '0',
                        transform: 'translateY(20px)',
                    },
                    '100%': {
                        opacity: '1',
                        transform: 'translateY(0)',
                    },
                },
            },
        },
    },

    plugins: [forms],
};
