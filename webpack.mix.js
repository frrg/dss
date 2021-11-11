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


//**************** CSS ******************** 
//css
//main css
// mix.sass('resources/sass/style.scss', 'public/css');

mix.copy('node_modules/@coreui/coreui/dist/css/coreui.min.css', 'public/css');
mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
//************** SCRIPTS ****************** 
// general scripts
// mix.copy('node_modules/@coreui/utils/dist/coreui-utils.js', 'public/js');
mix.copy('node_modules/axios/dist/axios.min.js', 'public/js');
mix.copy('node_modules/@coreui/coreui/dist/js/coreui.bundle.min.js', 'public/js');
// views scripts

// details scripts
//*************** OTHER ****************** 
//fonts
mix.copy('node_modules/@coreui/icons/fonts', 'public/fonts');
//icons
mix.copy('node_modules/@coreui/icons/css/free.min.css', 'public/css');
mix.copy('node_modules/@coreui/icons/css/brand.min.css', 'public/css');
mix.copy('node_modules/@coreui/icons/css/flag.min.css', 'public/css');
mix.copy('node_modules/@coreui/icons/svg/flag', 'public/svg/flag');

mix.copy('node_modules/@coreui/icons/sprites/', 'public/icons/sprites');