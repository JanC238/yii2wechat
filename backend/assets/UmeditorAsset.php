<?php
/**
 * Created by PhpStorm.
 * User: zzzzz
 * Date: 2016-07-31
 * Time: 15:22
 */

namespace backend\assets;


use yii\web\AssetBundle;

class UmeditorAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'umeditor/themes/default/css/umeditor.min.css',
    ];
    public $js = [
        'umeditor/umeditor.config.js',
        'umeditor/umeditor.min.js',
        'umeditor/lang/zh-cn/zh-cn.js'
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    'backend\assets\AppAsset'
    ];
}