<?php

namespace ga\turntable;

use yii\base\Widget;

class TurntableWidget extends Widget{



    public function run()
    {
        return $this->render('turntable');
    }

    function getViewPath()
    {
        return dirname(__FILE__).DIRECTORY_SEPARATOR.'assets';
    }
}