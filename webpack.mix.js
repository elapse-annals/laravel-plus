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
mix.webpackConfig({
    resolve: {
        alias: {
            'vue$': 'vue/dist/vue.esm.js'
        }
    }
})

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/jet-stream.js', 'public/js')
    .js('resources/js/plus.js', 'public/js')
    .postCss('resources/css/jet-stream.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ]).postCss('resources/css/app.css', 'public/css');

if (mix.inProduction()) {
    mix.version();
}
