<?php
namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ColorAdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'template/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css',
        'template/plugins/font-awesome/css/font-awesome.min.css',
        'template/css/animate.min.css',
        'template/css/style.min.css',
        'template/css/style-responsive.min.css',
        'template/css/theme/default.css',
	    'template/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css',
	    'template/plugins/bootstrap-datepicker/css/datepicker.css',
	    'template/plugins/bootstrap-datepicker/css/datepicker3.css',
        'template/plugins/gritter/css/jquery.gritter.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public $js = [
        //'template/plugins/jquery/jquery-1.9.1.min.js',
        'template/plugins/jquery/jquery-migrate-1.1.0.min.js',
        'template/plugins/jquery-ui/ui/minified/jquery-ui.min.js',
        //'template/plugins/bootstrap/js/bootstrap.min.js',
        'template/plugins/slimscroll/jquery.slimscroll.min.js',
        'template/plugins/jquery-cookie/jquery.cookie.js',
        'template/js/login-v2.demo.min.js',

        'template/crossbrowserjs/html5shiv.js',
        'template/crossbrowserjs/respond.min.js',
        'template/crossbrowserjs/excanvas.min.js',
        'template/plugins/gritter/js/jquery.gritter.js',
        'template/plugins/flot/jquery.flot.min.js',
        'template/plugins/flot/jquery.flot.time.min.js',
        'template/plugins/flot/jquery.flot.resize.min.js',
        'template/plugins/flot/jquery.flot.pie.min.js',
        'template/plugins/sparkline/jquery.sparkline.js',
        'template/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js',
        'template/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js',
        'template/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js',
        'template/js/dashboard.min.js',
        'template/js/apps.js',

    ];
}
