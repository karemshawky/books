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

mix
    /*Front-End assets*/
    .scripts(['resources/front/js/jquery.js',
              'resources/front/js/bootstrap.min.js',
              'resources/front/js/bs-navbar.js',
              'resources/front/js/vendors/isotope/isotope.pkgd.js',
              'resources/front/js/vendors/slick/slick.min.js',
              'resources/front/js/vendors/tweets/tweecool.min.js',
              'resources/front/js/vendors/rs-plugin/js/jquery.themepunch.revolution.min.js',
              'resources/front/js/vendors/rs-plugin/js/jquery.themepunch.tools.min.js',
              'resources/front/js/jquery.sticky.js',
              'resources/front/js/jquery.subscribe-better.js',
              'resources/front/js/jquery-ui.min.js',
              'resources/front/js/vendors/select/jquery.selectBoxIt.min.js',
              'resources/front/js/main.js',
              'resources/front/plugin/owl-carousel/owl.carousel.min.js',
            ],'public/front/js/front.js')
    .js('resources/js/app.js', 'public/front/js').vue()
    .sass('resources/front/app.scss', 'public/front/css/app.css')

   /*Back-End assets*/
   /** For Login */
   .js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
   ])
   /** ------- */
   /** For Dashboard */
   .scripts(['resources/backend/js/vendors.bundle.js',
             'resources/backend/js/scripts.bundle.js',
             'resources/backend/js/datatables.bundle.js',
             'resources/backend/js/actions.js',
             'resources/backend/js/dashboard.js',
             'resources/backend/js/multiple-controls.js',
             'resources/backend/js/select2.js',
           ],'public/backend/js/admin.js')
   .js('resources/js/app.js', 'public/backend/js').vue()
   .sass('resources/backend/app.scss', 'public/backend/css/admin.css')
   .options({
      fileLoaderDirs: {
        images: 'images/',
        fonts: 'fonts/'
      }
    });
