import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            colors: {
                'shop-rgba': 'rgba(50,222,27,.2470588235)',
            },
            fontFamily: {
                sans: ['Titillium', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
