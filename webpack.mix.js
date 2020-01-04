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

/*mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');*/

   mix.styles([
      'resources/plantilla/css/lte/custom.css',
      'resources/plantilla/css/lte/dist/css/adminlte.css',
      'resources/plantilla/css/lte/dist/css/adminlte.css.map',
      'resources/plantilla/css/lte/dist/css/adminlte.min.css',      
      'resources/plantilla/css/lte/dist/css/adminlte.min.css.map',      
      'resources/plantilla/js/jquery-nestable/jquery.nestable.css',
      'resources/plantilla/css/ionicons.min.css',
      'resources/plantilla/css/toastr.min.css',

  ], 'public/css/plantilla.css')

  .scripts([
   'resources/plantilla/js/jquery-nestable/jquery.nestable.js',
], 'public/js/jquery.nestable.js')

.scripts([
   'resources/plantilla/js/plugins/jquery/jquery.min.js',
   'resources/plantilla/js/plugins/bootstrap/js/bootstrap.bundle.min.js',
   'resources/plantilla/js/plugins/fastclick/fastclick.js',
   'resources/plantilla/css/lte/dist/js/adminlte.min.js',
   'resources/plantilla/js/jqery-validation/core.js',   
'resources/plantilla/js/sweetalert.min.js',
'resources/plantilla/js/toastr.min.js',
   'resources/plantilla/lte/dist/js/demo.js',
],'public/js/plantilla.js')
.js([
   'resources/js/app.js'
],'public/js/app.js')

.scripts([
'resources/plantilla/js/jqery-validation/core.js',
'resources/plantilla/js/jqery-validation/localization/messages_es.js',
'resources/plantilla/js/scripts.js',
'resources/plantilla/js/sweetalert.min.js',
'resources/plantilla/js/toastr.min.js',
'resources/plantilla/js/funciones.js'
],'public/js/scripts.js');
