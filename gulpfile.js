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

    // Compile sass.
    mix.sass('app.scss', 'resources/assets/css');

    // Compile bower packages.
    mix.copy('vendor/bower_components/bootstrap-sass-official/assets/stylesheets',
              'resources/assets/sass/bootstrap')
        // javascript
        .copy('vendor/bower_components/jquery/dist/jquery.min.js',
              'resources/assets/js/libs/jquery.min.js')
        .copy('vendor/bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js',
              'resources/assets/js/libs/bootstrap.js')

        // css
        .copy('vendor/bower_components/font-awesome/css/font-awesome.min.css',
              'resources/assets/css/libs/font-awesome.min.css')

    mix.styles([
        'app.css',
        'libs/select2.min.css',
        'libs/font-awesome.min.css'
    ]);

    mix.scripts([
        'libs/jquery.min.js',
        'libs/select2.min.js',
        'libs/bootstrap.js'
    ]);


    // Build css and javascript with version number to overcome caching on client machines.
    mix.version(['public/css/all.css', 'public/js/all.js']);
});
