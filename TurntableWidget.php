<?php

namespace ga\turntable;

use yii\base\Widget;
use ga\turntable\TurntableAsset;

class TurntableWidget extends Widget{

    const POINTER_SCROLL = 'POINTER_SCROLL';
    const TURNTABLE_SCROLL = 'TURNTABLE_SCROLL';
    public $deg = 6000;
    public $scrollType = self::POINTER_SCROLL;
    public $animationTime = 5000;//microseconds not seconds;
    public $pointerCallback = null ;//important JS callback code here.If the pointer complete animation will trigger this function.
    public $turntableCallback = null;//important JS callback code here.If the turntable complete animation will trigger this function.

    /*
     * !Very important!
     * In order to better UE,please according to the given image scale to design your image, except pointer image size.
     *
     * */
    public $pointerImagePath = 'image/pointer.png'; //650 * 600
    public $turntableImagePath = 'image/turntable.png';//450 * 450
    public $turntableBGImagePath = 'image/turntable-bg.jpg';//228 * 228

    public function run()
    {
        $view = $this->getView();
        if($this->scrollType == self::TURNTABLE_SCROLL){
            $callback = $this->turntableCallback?$this->turntableCallback:'null';
            $clickJS = <<<JS
jQuery('.ga-turntable').animateRotate({$this->deg},{$this->animationTime},'swing',$callback);
jQuery('.ga-pointer').animateRotate(-{$this->deg},{$this->animationTime},'swing');
JS;
        }else{
            $callback = $this->pointerCallback?$this->pointerCallback:'null';
            $clickJS = <<<JS
jQuery('.ga-pointer').animateRotate({$this->deg},{$this->animationTime},'swing',$callback);
JS;
        }
        $js=<<<JS
$('.ga-pointer').css('background','url({$this->pointerImagePath}) no-repeat center');
$('.ga-turntable-bg').css('background','url({$this->turntableBGImagePath}) no-repeat center');
$('.ga-turntable').css('background','url({$this->turntableImagePath}) no-repeat center');
$(document).ready(function(){ $('.ga-pointer').click(function(){
{$clickJS}
});});
JS;
        $view->registerJS($js);
        return $this->render('turntable');
    }


    function getViewPath()
    {
        return dirname(__FILE__).DIRECTORY_SEPARATOR.'assets';
    }
}