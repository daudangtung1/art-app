const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: theme => ({
                'gallery': "url('/img/wallpaper1.jpg')",
            }),
            colors: {
                gray: {
                    83: '#838592',
                    b1: '#b1b1b9',
                },

                customBlack: {
                    16: '#161a1f',
                }
            },
            zIndex: {
                '-10': '-10',
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'), require('@tailwindcss/custom-forms')],
};
