/**
 * Created by xin on 16/11/1.
 */
$.fn.animateRotate = function(angle, duration, easing, complete) {
    var args = $.speed(duration, easing, complete);
    var step = args.step;
    return this.each(function(i, e) {
        args.complete = $.proxy(args.complete, e);
        args.step = function(now) {
            $.style(e, 'transform', 'rotate(' + now + 'deg)');
            if (step) return step.apply(e, arguments);
        };

        $({deg: 0}).animate({deg: angle}, args);
    });
};

$(document).ready(function(){
    //纯随机不做手脚
    $('.ga-pointer').click(function(){
        $('.ga-turntable').animateRotate(6000,5000,'swing',function(){
            console.log('123123');
        });
        $('.ga-pointer').animateRotate(-6000,5000,'swing',function(){

        });
    });
});
