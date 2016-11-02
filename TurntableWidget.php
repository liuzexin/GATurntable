<?php

namespace ga\turntable;

use yii\base\Widget;
use ga\turntable\TurntableAsset;

class TurntableWidget extends Widget{

    const POINTER_SCROLL = 'POINTER_SCROLL';
    const TURNTABLE_SCROLL = 'TURNTABLE_SCROLL';
    public $deg = 6000;
    public $scrollType = self::POINTER_SCROLL;
    public $animateTime = 5000;//microseconds not seconds;
    public $pointerCallback = null ;//important JS callback code here.If the pointer complete animation will trigger this function.
    public $turntableCallback = null;//important JS callback code here.If the turntable complete animation will trigger this function.

    /*
     * !Very important!
     * In order to better UE,please accroding to the given image scale to design your image, except pointer image size.
     *
     * */
    public $pointerImagePath = 'image/pointer.png'; //650 * 600
    public $turntableImagePath = 'image/turntable.png';//450 * 450
    public $turntableBGImagePath = 'image/turntable-bg.png';//228 * 228

    public function run()
    {
        $view = $this->getView();
        $js[] = "$(document).ready(function(){";
        $js[] = "$('.ga-pointer').click(function(){";
        if($this->scrollType == self::TURNTABLE_SCROLL){
            $callback = $this->turntableCallback?$this->turntableCallback:'null';
            $js[] = "$('.ga-turntable').animateRotate($this->deg,$this->animateTime,'swing',$callback);";
            $js[] = "$('.ga-pointer').animateRotate(-$this->deg,$this->animateTime,'swing');";
        }else{
            $callback = $this->pointerCallback?$this->pointerCallback:'null';
            $js[] = "$('.ga-pointer').animateRotate($this->deg,$this->animateTime,'swing',$callback);";
        }

        $js[] = "}); });";
        $jsCode = implode(' ',$js);
        $view->registerJS($jsCode);
        return $this->render('turntable');
    }


    function getViewPath()
    {
        return dirname(__FILE__).DIRECTORY_SEPARATOR.'assets';
    }
}