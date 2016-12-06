const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
       .scripts([
       	'vendor/custom.min.js'
       	], 'public/js/admin.js')
       .styles([
       		'vendor/custom.min.css'
       ], 'public/css/admin.css');
    mix.webpack('app.js');
});
