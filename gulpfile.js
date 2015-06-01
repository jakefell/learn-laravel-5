var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    // Compile sass. Outputs to public/css/app.css.
    mix.sass('app.scss');

    // Compile bower packages.
    mix.copy('vendor/bower_components/jquery/dist/jquery.min.js',
            'public/js/vendor/jquery.js')
        .copy('vendor/bower_components/bootstrap-sass-official/assets/stylesheets',
              'resources/assets/sass/bootstrap')
        .copy('vendor/bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js',
            'public/js/vendor/bootstrap.js')
        .copy('vendor/bower_components/font-awesome/css/font-awesome.min.css',
              'public/css/vendor/font-awesome.css');

    // Build css with version number to overcome css caching on client machines.
    mix.version('public/css/app.css');

});
