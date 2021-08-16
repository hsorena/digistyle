const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js');

mix.scripts([
    'resources/assets/dropzone/dropzone.js',
], 'public/js/all.js');

mix.styles([
    'resources/assets/dropzone/dropzone.css',
], 'public/css/all.css');
