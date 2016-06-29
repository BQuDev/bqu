var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */


//Main Page
elixir(function(mix) {
    mix.styles([
        ///*Global styles START*/
        'global/plugins/font-awesome/css/font-awesome.min.css',
        'global/plugins/simple-line-icons/simple-line-icons.min.css',
        'global/plugins/bootstrap/css/bootstrap.min.css',
        'global/plugins/uniform/css/uniform.default.css',
        ///*Global styles END */
        ///*Theme styles START*/
        'global/css/components-rounded.css',
        'global/css/plugins.css',
        'admin/layout3/css/layout.css',
        'admin/layout3/css/themes/default.css',
        'admin/layout3/css/custom.css'
        /*Theme styles END*/
    ],
        'public/css/app.min.css');
});


//Main Page
elixir(function(mix) {
    mix.styles([
        ///*Global styles START*/
        'global/plugins/font-awesome/css/font-awesome.min.css',
        'global/plugins/simple-line-icons/simple-line-icons.min.css',
        'global/plugins/bootstrap/css/bootstrap.min.css',
        'global/plugins/uniform/css/uniform.default.css',
        ///*Global styles END */
        ///*Theme styles START*/
        'global/plugins/select2/select2.css',
        'global/css/components-rounded.css',
        'global/css/plugins.css',
        'admin/layout3/css/layout.css',
        'admin/layout3/css/themes/default.css',
        'admin/layout3/css/custom.css'
        /*Theme styles END*/
    ],
        'public/css/a1.min.css');
});

elixir(function(mix) {
    mix.scripts([

            /////* BEGIN CORE PLUGINS  */
            'global/plugins/jquery.min.js',
            'global/plugins/jquery-migrate.min.js',
            'global/plugins/jquery-ui/jquery-ui.min.js',
            'global/plugins/bootstrap/js/bootstrap.min.js',
            'global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
            'global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
            'global/plugins/jquery.blockui.min.js',
            'global/plugins/jquery.cokie.min.js',
            'global/plugins/uniform/jquery.uniform.min.js',
            ///* END CORE PLUGINS*/

            'global/scripts/metronic.js',
            'admin/layout3/scripts/layout.js',
            'admin/layout3/scripts/demo.js'

        ],
        'public/scripts/app.js');
});

elixir(function(mix) {
    mix.scripts([

            /////* BEGIN CORE PLUGINS  */
            'global/plugins/jquery.min.js',
            'global/plugins/jquery-migrate.min.js',
            'global/plugins/jquery-ui/jquery-ui.min.js',
            'global/plugins/bootstrap/js/bootstrap.min.js',
            'global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js',
            'global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
            'global/plugins/jquery.blockui.min.js',
            'global/plugins/jquery.cokie.min.js',
            'global/plugins/uniform/jquery.uniform.min.js',
            ///* END CORE PLUGINS*/
            'global/plugins/select2/select2.min.js',
            'global/scripts/metronic.js',
            'admin/layout3/scripts/layout.js',
            'admin/layout3/scripts/demo.js'

        ],
        'public/scripts/a1.js');
});