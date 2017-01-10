var elixir = require('laravel-elixir');

// Include gulp
var gulp = require('gulp');

elixir(function(mix) {

    mix.sass('app.scss',  'public/css/style.css');

    mix.styles([
        'public/assets/pleasure-admin-panel/css/plugins.css',
        'public/assets/pleasure-admin-panel/css/elements.css',
        'node_modules/sweetalert/dist/sweetalert.css',
        'node_modules/chosen-js/chosen.css',
        'node_modules/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css',
        'node_modules/switchery/switchery.css',
        'node_modules/jasny-bootstrap/dist/css/jasny-bootstrap.min.css',
        'node_modules/rickshaw/rickshaw.min.css',
        'node_modules/bxslider/dist/jquery.bxslider.min.css',
        'node_modules/datatables/media/css/jquery.dataTables.min.css',
        'node_modules/icheck/skins/square/blue.css',
        'public/css/style.css'
    ], 'public/css/app.css', './');

    // var directories = {
    //     'node_modules/npm-modernizr': 'public/dist/npm-modernizr',
    //     'node_modules/chosen-js': 'public/dist/chosen-js',
    //     'public/assets/pleasure-admin-panel/js': 'public/dist/pleasure-admin-panel/js',
    //     'node_modules/bxslider': 'public/dist/bxslider',
    //     'node_modules/jquery-knob': 'public/dist/jquery-knob',
    //     'node_modules/html2canvas': 'public/dist/html2canvas',
    //     'node_modules/gauge-js': 'public/dist/gauge-js',
    //     'node_modules/jasny-bootstrap': 'public/dist/jasny-bootstrap',
    //     'node_modules/sweetalert': 'public/dist/sweetalert',
    //     'node_modules/datatables': 'public/dist/datatables',
    //     'node_modules/icheck': 'public/dist/icheck',
    //     'public/assets/pleasure-admin-panel/fonts': 'public/build/fonts'
    //
    // };
    //
    // for (var directory in directories) {
    //     mix.copy(directory, directories[directory]);
    // }

    mix.scripts([
        'node_modules/npm-modernizr/modernizr.js',
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/jquery-ui-dist/jquery-ui.min.js',
        'node_modules/chosen-js/chosen.jquery.js',
        'node_modules/bootstrap/dist/js/bootstrap.min.js',
        'node_modules/velocity-animate/velocity.min.js',
        'node_modules/moment/moment.js',
        'node_modules/toastr/toastr.js',
        'node_modules/scrollmonitor/scrollMonitor.js',
        'node_modules/textarea-autosize/dist/jquery.textarea_autosize.min.js',
        'node_modules/bootstrap-select/dist/js/bootstrap-select.min.js',
        'node_modules/fastclick/lib/fastclick.js',
        'node_modules/bxslider/dist/jquery.bxslider.min.js',
        'node_modules/jquery-knob/dist/jquery.knob.min.js',
        'node_modules/jquery-knob/excanvas.js',
        'node_modules/html2canvas/dist/html2canvas.min.js',
        'node_modules/html2canvas/dist/html2canvas.svg.min.js',
        'node_modules/jasny-bootstrap/dist/js/jasny-bootstrap.min.js',
        'node_modules/sweetalert/dist/sweetalert.min.js',
        'node_modules/datatables/media/js/jquery.dataTables.min.js',
        'node_modules/icheck/icheck.min.js',
        'public/assets/pleasure-admin-panel/js/sliders.js',
        'public/assets/pleasure-admin-panel/js/layout.js',
        'public/assets/pleasure-admin-panel/js/pleasure.js'
    ], 'public/js/app.js' , './')
        .scripts(['resources/assets/js/controllers/equivalenceSetsController.js'], 'public/js/controllers.js');


    //the parameter is relative to the public directory
    mix.version(['css/app.css', 'js/app.js', 'js/controllers.js']);

    // mix.sass('app.scss',
    //     'public/assets/css/app.css')
    //     .styles([
    //         'libs/sweetalert.css'
    //     ],  'public/assets/css/libs.css')
    //     .scripts([
    //         'bootstrap.js'
    //     ],  'public/assets/js/app.js')
    //     .scripts([
    //         'libs/sweetalert-dev.js'
    //     ],  'public/assets/js/libs.js');
});