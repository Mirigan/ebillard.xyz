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


elixir(function(mix) {
    mix.styles([
        "font-awesome.min.css",
        "main.css"
    ], 'public/css/app.css');
    mix.scripts([
        'jquery.min.js',
        'jquery.dropotron.min.js',
        'jquery.scrollgress.min.js',
        'skel.min.js',
        'util.js',
        'main.js'
    ], 'public/js/app.js');

    mix.version(['css/app.css', 'js/app.js']);
});
