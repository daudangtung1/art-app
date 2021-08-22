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
            })
        },
        color: {
            gray: {
                gal: '#b1b1b9',
            },

            black: {

            }
        }
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
