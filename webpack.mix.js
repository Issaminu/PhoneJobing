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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]);
// mix.css('resources/css/volt.css', 'public/css/volt.css');
mix.js('resources/js/searchAndFilterTeamTable.js', 'public/js/searchAndFilterTeamTable.js');
mix.js('resources/js/searchProductsTable.js', 'public/js/searchProductsTable.js');
mix.js('resources/js/addClientRadio.js', 'public/js/addClientRadio.js');
mix.js('resources/js/accountTypeSelection.js', 'public/js/accountTypeSelection.js');

mix.webpackConfig({
    stats: {
        children: true
    }
});
mix.disableNotifications();