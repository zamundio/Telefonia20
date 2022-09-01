const mix  = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
mix.js('bower_components/lobilist/lib/jquery/jquery.min.js', 'public/js')

/*
 |--------------------------------------------------------------------------
 |Lobilist TODOLIST
 |--------------------------------------------------------------------------
 */
mix.js('bower_components/lobilist/lib/jquery/jquery.ui.touch-punch-improved.js', 'public/js')
mix.js('bower_components/lobilist/lib/bootstrap/js/bootstrap.min.js', 'public/js')
mix.js('bower_components/lobilist/dist/lobilist.js', 'public/js')
mix.js('bower_components/lobilist/lib/lobibox/js/lobibox.min.js', 'public/js')

mix.js('bower_components/lobilist/demo/demo.js', 'public/js')
mix.postCss('bower_components/lobilist/demo/demo.css', 'public/css')
mix.postCss('bower_components/lobilist/dist/lobilist.css', 'public/css');
mix.postCss('bower_components/lobilist/lib/lobibox/css/lobibox.min.css', 'public/css');


/*
 |--------------------------------------------------------------------------
 |JsTree
 |--------------------------------------------------------------------------
 */

mix.scripts([
    'node_modules/jstree/dist/jstree.min.js',
    // You can add more JS files here.

], 'public/js/jstree.min.js')
/*
 |--------------------------------------------------------------------------
 |HandleBars
 |--------------------------------------------------------------------------
*/
mix.js('bower_components/handlebars/handlebars.js', 'public/js');


/*
 |--------------------------------------------------------------------------
 |Toast
 |--------------------------------------------------------------------------
*/
mix.js('node_modules/toastr/toastr.js', 'public/js');
/*
 |--------------------------------------------------------------------------
 |Boostrap Timepicker
 |--------------------------------------------------------------------------
*/
mix.js('resources/assets/bootstrap-datepicker/js/bootstrap-datepicker.js', 'public/js/bootstrap-datepicker/js')
mix.js('resources/assets/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js', 'public/js/bootstrap-datepicker/locales')
mix.postCss('resources/assets/bootstrap-datepicker/css/bootstrap-datepicker3.css','public/css/bootstrap-datepicker/css');
mix.postCss('resources/assets/bootstrap-datepicker/css/bootstrap-datepicker3.standalone.css','public/css/bootstrap-datepicker/css');
 /*
 |--------------------------------------------------------------------------
 |SlimScroll
 |--------------------------------------------------------------------------
*/
mix.js('bower_components/jquery-slimscroll/jquery.slimscroll.js', 'public/js');
 
  /*
 |--------------------------------------------------------------------------
 |InputMask
 |--------------------------------------------------------------------------
*/
mix.js('node_modules/inputmask/dist/jquery.inputmask.min.js', 'public/js');

 /*
 |--------------------------------------------------------------------------
 |Estilos propios y javascript por views
 |--------------------------------------------------------------------------
 */
mix.js('resources/assets/js/home/index.js', 'public/js/home');
mix.copy('resources/assets/js/helper.js', 'public/js/helper.js');
mix.js('resources/assets/js/estructura/index.js', 'public/js/estructura');
mix.js('resources/assets/js/estructura/form.js', 'public/js/estructura');
mix.postCss('resources/assets/css/custom.css', 'public/css');
mix.postCss('resources/assets/css/custom3.css', 'public/css');
mix.postCss('resources/assets/css/bootstrap-multiselect.min.css','public/css');

