$(function(){
    var $guideUl = $("#guide ul");
    var $navSpan = $("#nav span");
    $navSpan.on("tap",function(){
        $(this).addClass("active").siblings().removeClass("active");
        $guideUl.css({
            left:-$(this).index() * $guideUl.width() / 2
        });
    });
    $guideUl.on("swipeleft",function(){
        $navSpan.eq(1).addClass("active").siblings().removeClass("active");
        $guideUl.css({
            left:-$guideUl.width()/2
        });
}).on("swiperight",function() {
    $navSpan.eq(0).addClass("active").siblings().removeClass("active");
    $guideUl.css({
        left: 0
    });

});
});




