const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    purge: [
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans]
            },
            colors: {
                green: "#1aae9f",
                yellow: "#F7C325",
                purple: "#730FC3"
            },
            minWidth: {
                '0': '0',
                '25': '25%',
                '50': '50%',
                '75': '75%',
                'full': '100%',
            },
            height: {
                128: '28em'
            }
        },

    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [require("@tailwindcss/ui")]
};
