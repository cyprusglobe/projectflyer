var elixir = require('laravel-elixir');
var bootstrap = require('bootstrap-styl');

require('laravel-elixir-stylus');

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
    mix
        .copy(
            'node_modules/jquery/dist/jquery.js',
            'resources/assets/js/jquery.js'
        )
        .copy(
            'node_modules/sweetalert/dist/sweetalert-dev.js',
            'resources/assets/js/sweetalert-dev.js'
        )
        .copy(
            'node_modules/sweetalert/dist/sweetalert.css',
            'resources/assets/css/sweetalert.css'
        )
        .copy(
            'node_modules/dropzone/dist/dropzone.js',
            'resources/assets/js/dropzone.js'
        )
        .copy(
            'node_modules/dropzone/dist/dropzone.css',
            'resources/assets/css/dropzone.css'
        )
        .copy(
            'node_modules/lity/dist/lity.js',
            'resources/assets/js/lity.js'
        )
        .copy(
            'node_modules/lity/dist/lity.css',
            'resources/assets/css/lity.css'
        )

        .stylus('app.styl', './public/css/app.css')
        .stylus('libs.styl', './public/css/libs.css', { use: [ bootstrap() ], 'include css': true })
        .scripts([
            'jquery.js',
            'sweetalert-dev.js',
            'dropzone.js',
            'lity.js'

        ], './public/js/libs.js');

    mix.browserSync({
        proxy: 'projectflyer.dev',
        notify: false,
        online: true
    });

});
