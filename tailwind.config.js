import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Plus Jakarta Sans', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    DEFAULT: '#1E3A8A',
                    50: '#EFF3FB',
                    100: '#DCE5F5',
                    200: '#B3C7E8',
                    300: '#8AA9DB',
                    400: '#5A80C8',
                    500: '#3159AD',
                    600: '#24428A',
                    700: '#1E3A8A',
                    800: '#172C68',
                    900: '#0F2557',
                    950: '#0A1B3F',
                },
                accent: {
                    DEFAULT: '#BA8759',
                    50: '#FAF4EE',
                    100: '#F2E4D4',
                    200: '#E3C8A8',
                    300: '#D4AC7C',
                    400: '#C79A68',
                    500: '#BA8759',
                    600: '#9C6D44',
                    700: '#7A5637',
                    800: '#583F28',
                    900: '#3A2A1B',
                },
            },
        },
    },
    plugins: [require('@tailwindcss/typography')],
};
