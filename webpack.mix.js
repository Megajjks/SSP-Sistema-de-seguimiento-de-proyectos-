let mix = require('laravel-mix');

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

mix.styles([
   'resources/assets/plantilla/css/settings.css',
   'resources/assets/plantilla/css/styles.css'
], 'public/css/plantilla.css');

mix.scripts([
   'resources/assets/plantilla/js/custom.min.js',
], 'public/js/plantilla.js')
.js(['resources/assets/js/app.js'], 'public/js/app.js');