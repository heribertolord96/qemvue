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
      'resources/plantilla/css/estilo2.css',
      'resources/plantilla/css/cards.css',
      'resources/plantilla/css/w3.css',
      'resources/plantilla/css/ionicons.min.css',
      'resources/plantilla/css/toastr.min.css',
      'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
      'https://demos.creative-tim.com/vue-light-bootstrap-dashboard/static/css/nucleo-icons.css',
      'https://demos.creative-tim.com/vue-light-bootstrap-dashboard/static/css/app.f637e9e6c19ce63f0094c086bedef65b.css'

  ], 'public/css/plantilla.css')

  .scripts([
   'resources/plantilla/js/jquery-nestable/jquery.nestable.js',
], 'public/js/jquery.nestable.js')

.scripts([
   'resources/plantilla/js/plugins/jquery/jquery.min.js',
   'resources/plantilla/js/plugins/bootstrap/js/bootstrap.bundle.min.js',
   'resources/plantilla/js/bootstrap.min.js',
   
   'resources/plantilla/js/plugins/fastclick/fastclick.js',
   'resources/plantilla/css/lte/dist/js/adminlte.min.js',
   'resources/plantilla/js/jqery-validation/core.js',   
'resources/plantilla/js/sweetalert.min.js',
'resources/plantilla/js/toastr.min.js',
   'resources/plantilla/lte/dist/js/demo.js',

   'https://demos.creative-tim.com/vue-light-bootstrap-dashboard/static/js/manifest.f85f24d2f5c676842790.js',
   'https://demos.creative-tim.com/vue-light-bootstrap-dashboard/static/js/vendor.80a4b9af77e816b44b5f.js',
   'https://demos.creative-tim.com/vue-light-bootstrap-dashboard/static/js/app.b9f64045ed4f0cfb1cb8.js'
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
