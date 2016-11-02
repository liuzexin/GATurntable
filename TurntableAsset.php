<?php
/**
 * Created by PhpStorm.
 * User: xin
 * Date: 16/10/31
 * Time: 下午4:21
 */

namespace ga\turntable;

use yii\web\AssetBundle;

class TurntableAsset extends  AssetBundle
{
    public $sourcePath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets';
    public $css = [
      'css/turntable.css'
    ];

    public $js = [
      'js/ga-turntable.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}