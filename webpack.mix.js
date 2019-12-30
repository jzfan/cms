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

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');

mix.scripts([
   "public/assets/vendor/jquery/jquery.min.js",
   "public/assets/vendor/jquery-migrate/jquery-migrate.min.js",
   "public/assets/vendor/popper.js/popper.min.js",
   "public/assets/vendor/bootstrap/bootstrap.min.js",
   "public/assets/vendor/appear.js",
   "public/assets/vendor/slick-carousel/slick/slick.js",
   "public/assets/js/hs.core.js",
   "public/assets/js/components/hs.header.js",
   "public/assets/js/helpers/hs.hamburgers.js",
   "public/assets/js/components/hs.scroll-nav.js",
   "public/assets/js/components/hs.carousel.js",
   "public/assets/js/components/hs.go-to.js",
   "public/assets/js/custom.js",
], 'public/js/all.js')
   .styles([
      "public/assets/vendor/bootstrap/bootstrap.min.css",
      "public/assets/vendor/icon-awesome/css/font-awesome.min.css",
      "public/assets/vendor/icon-line/css/simple-line-icons.css",
      "public/assets/vendor/icon-hs/style.css",
      "public/assets/vendor/hamburgers/hamburgers.min.css",
      "public/assets/vendor/animate.css",
      "public/assets/vendor/slick-carousel/slick/slick.css",
      "public/assets/css/styles.op-business.css",
      "public/assets/css/custom.css",
   ], 'public/css/all.css')
