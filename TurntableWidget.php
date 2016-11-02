<?php

namespace gaturntable;

use yii\base\Widget;

class TurntableWidget extends Widget{



    public function run()
    {
        return $this->render('turntable');
    }

    function getViewPath()
    {
        return '@vendor/assets';
    }
}