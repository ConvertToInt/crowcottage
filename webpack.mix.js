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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/scss/app.scss', 'public/css', [
        // require('postcss-import'),
        // require('tailwindcss'),
    ])
    .copy('node_modules/bulma-carousel/dist/js/bulma-carousel.js', 'public/js');

if (mix.inProduction()) {
    mix.version();
}
