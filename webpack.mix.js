const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/hiperprecios.js', 'public/js')
    .extract(['lodash', 'axios'])
    .sass('resources/scss/hiperprecios.scss', 'public/css')
    .sass('resources/scss/theme.scss', 'public/css')
    .sass('resources/scss/theme_print.scss', 'public/css')
    .options({
        fileLoaderDirs: {
            images: 'images',
            fonts: 'fonts'
        },
        postCss: [
            require('postcss-import'),
            require('tailwindcss'),
            require('autoprefixer'),
        ]
    })
    .version();
