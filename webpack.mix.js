const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;
const mix = require('laravel-mix');

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

mix.webpackConfig({
    plugins: [
        new BundleAnalyzerPlugin(),
    ],
    externals: {
        'locutus': 'locutus',
    }
}).js('resources/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');
