# GATurntable
A turntable for lottery activity.
#The GATurntable has two scroll types.
##1.POINTER_SCROLL

![pointer.gif](https://github.com/liuzexin/Image/blob/master/pointer.gif)

##2.TURNTABLE_SCROLL

![turntable.gif](https://github.com/liuzexin/Image/blob/master/turntable.gif)

#How to useage
In the view file you should include following code:
```PHP

<?php
use ga\turntable\TurntableWidget;
use ga\turntable\TurntableAsset;
TurntableAsset::register($this);
?>
<?= TurntableWidget::widget(['scrollType'=>TurntableWidget::TURNTABLE_SCROLL])?>
```
#Configuration params

The configuartion is very easy,we can set the public property:
* `$deg` animate degree
* `$animationTime` in the other word it's the speed of animation
* `$pointerCallback` js code in here.If the pointer complete animation will trigger this function.
* `$turntableCallback` js code in here.If the turntable complete animation will trigger this function.
* `$scrollType` self::POINTER_SCROLL or self::TURNTABLE_SCROLL
* `$pointerImagePath` custom pointer image path
* `$turntableImagePath` custom turntable image path
* `$turntableBGImagePath` custom turntable background image path


#How to install

`composer require ga/turntable dev-master`

