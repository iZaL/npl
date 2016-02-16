var elixir = require('laravel-elixir');

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

elixir(function (mix) {
    mix.styles([
        'css/bootstrap.min.css',
        'bower_components/fontawesome/css/font-awesome.min.css',
        'css/main.css',
        'css/owl.transitions.css',
        'css/animate.min.css',
        'css/triangle.css',
        'css/custom.css',
        'css/flaticon.css',
    ], 'public/css/all.css', 'public');

    mix.scripts([
        'bower_components/jquery/dist/jquery.min.js',
        'js/jquery.easing.1.3.min.js',
        'js/bootstrap.min.js',
        'js/bootstrap-hover-dropdown.min.js',
        'js/skrollr.min.js',
        'js/skrollr.stylesheets.min.js',
        'js/waypoints.min.js',
        'js/waypoints-sticky.min.js',
        'js/owl.carousel.min.js',
        'js/jquery.isotope.min.js',
        'js/jquery.easytabs.min.js',
        'js/viewport-units-buggyfill.js',
        'js/scripts.js',
    ], 'public/js/app.js', 'public')

    mix.copy('css/flaticon','public/build/css/flaticon');

    elixir(function (mix) {
        mix.version(['css/all.css', 'js/app.js']);
        //mix.version(['js/app.js']);
        //mix.version(['css/all.css']);
    });


});
