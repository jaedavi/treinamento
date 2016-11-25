const elixir = require('laravel-elixir');

// require('laravel-elixir-vue-2');

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

// elixir(mix => {
//     mix.sass('app.scss')
//        .webpack('app.js');
// });

elixir(function(mix) {
    //css
    mix.styles([
        'bootstrap.css',
        ],
            'public/css/main.css'
    );

    mix.scripts([
        'jquery.js',
        'bootstrap.js',
        'jquery-ui.js',
        ],
            'public/js/main.js'
    );

    mix.copy('resources/assets/fonts', 'public/fonts');
});
