const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    mode: 'jit',
    purge: {
        content: [
            './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
            './storage/framework/views/*.php',
            './resources/views/**/*.blade.php',
            "./resources/js/**/*.js",
            './resources/views/hiperpreciostemplate/**/*.blade.php',
            './resources/views/hiperpreciostemplate/**/**/*.blade.php',
            './resources/views/hiperpreciostemplate/**/**/**/*.blade.php',
        ],
        options: {
            // defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
        },
    },
    theme: {
        extend: {
            fontFamily: {
                sans: ['Amiko', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                'xxs': ['0.625rem', '0.75rem'],
            },
            inset: {
                '76': '18.75rem',
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            backgroundColor: ['active'],
        },
    },

    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms')
    ],
};
