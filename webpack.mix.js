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

mix.copy('resources/angularjs/angular.min.js', 'public/angularjs/angular.min.js');
mix.copy('resources/plugins/jquery/jquery.min.js', 'public/jquery/jquery.min.js');
mix.copy('resources/plugins/bootstrap/js/bootstrap.bundle.min.js', 'public/bootstrap/js/bootstrap.bundle.min.js');
mix.copy('resources/dist/js/adminlte.min.js', 'public/js/adminlte.min.js');
mix.copy('resources/dist/js/animate-kontext.js', 'public/js/animate-kontext.js');
mix.copy('resources/dist/js/tabs.js', 'public/js/tabs.js');
mix.copy('resources/dist/js/loader.js', 'public/js/loader.js');

mix.js('resources/js/app.js', 'public/js/app.js').version();
mix.js('resources/js/register.js', 'public/js/register.js').version();
mix.js('resources/js/napanam.js', 'public/js/napanam.js').version();
mix.js('resources/js/survey.js', 'public/js/survey.js').version();

mix.copy('resources/plugins/fontawesome-free/css/all.min.css', 'public/css/all.min.css');
mix.copy('resources/dist/css/adminlte.min.css', 'public/css/adminlte.min.css');
mix.copy('resources/dist/css/animate-kontext.css', 'public/css/animate-kontext.css');

mix.copyDirectory('resources/dist/img','public/img');
mix.copyDirectory('resources/plugins/fontawesome-free/webfonts','public/webfonts');

/**
 * Homepage | SPA | Vue3
 */
mix.js('resources/js/home.js', 'public/js/home.js').vue();
mix.copyDirectory('resources/assets/layout/images', 'public/assets/images');
