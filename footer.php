<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Courrier-mobile
 */

?>

	</div><!-- #content -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
var swiper = new Swiper('.swiper-container', {
    paginationClickable: true
});

var swiper = new Swiper('.swiper-container', {
    paginationClickable: true
});

jQuery(function($) {
$(function() {
  var touch_x    = 0;     //最初にタップしたXの位置
  var touch_y    = 0;     //最初にタップしたYの位置
  var slide_x    = 0;     //移動したXの位置
  var slide_y    = 0;     //移動したYの位置

/*
 * タップ、スワイプ、指を離した時のイベントハンドラ
 */
  $(".swiper-slide").bind("touchstart", TouchStart);
  $(".swiper-slide").bind("touchmove" , TouchMove);
  $(".swiper-slide").bind("touchend"  , TouchLeave);

/*
 * タップ
 */
  function TouchStart( event ) {
    var pos = Position(event);
    touch_x = pos.x;
    touch_y = pos.y;

    $("#pos-x").html(pos.x);
    $("#pos-y").html(pos.y);
  }

/*
 * スワイプ
 */
  function TouchMove( event ) {

    var pos = Position(event); //X,Yを得る

    //移動した位置から最初の位置を引く
    slide_x = pos.x - touch_x;
    slide_y = pos.y - touch_y;

    //マイナスの値をプラスに変更
    slide_x = Math.sqrt(Math.pow(slide_x,2));
    slide_y = Math.sqrt(Math.pow(slide_y,2));


    $("#leave-x").html(pos.x);
    $("#leave-y").html(pos.y);
    $("#slide-x").html(slide_x);
    $("#slide-y").html(slide_y);
  }

/*
 * 指を離す
 */
  function TouchLeave( event ) {
    if (slide_y > 100){
        /*
        * ここでURLをクリックする
        */
				window.location.replace($(this).attr('data-url'));

    }
  }

/*
 * 現在位置を得る
 */
  function Position(e){
    var x   = e.originalEvent.touches[0].pageX;
    var y   = e.originalEvent.touches[0].pageY;
    x = Math.floor(x);
    y = Math.floor(y);
    var pos = {'x':x , 'y':y};
    return pos;
  }

});


});
</script>


</body>
</html>
