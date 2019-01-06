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

mix
   /*Backend-End assets*/
   .scripts(['resources/backend/js/vendors.bundle.js', 
             'resources/backend/js/scripts.bundle.js',
             'resources/backend/js/datatables.bundle.js',
             'resources/backend/js/actions.js',
             'resources/backend/js/dashboard.js',
             'resources/backend/js/multiple-controls.js',
             'resources/backend/js/select2.js',
           ],'public/backend/js/admin.js')
   .scripts(['resources/backend/js/vendors.bundle.js', 
             'resources/backend/js/scripts.js',
           ],'public/backend/js/login.js')         
   .sass('resources/backend/app.scss', 'public/backend/css/admin.css')
   .options({
      fileLoaderDirs: {
        images: 'backend/images',
        fonts: 'backend/fonts'
      }
    });
