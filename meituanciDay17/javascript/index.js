/**
 * Created by xiecheng on 2017/7/6.
 */
$(document).on("pageinit",function(event){
    var $guideUl = $("#guide ul");
    var $navSpan = $("#nav span");
    //click tap
    $navSpan.on("tap", function(){
        swipeGuide($(this).index());
    });
    $guideUl.on("swipeleft", function(){
        swipeGuide(1);
    }).on("swiperight", function(){
        swipeGuide(0);
    });

    $("#go-top").on("tap", function(){
        if($(window).scrollTop() <= 1){
            return false;
        }
        $("body").animate({
            scrollTop : 0
        }, 500);
        var top = $(this).css("top");
        $(this).animate({
            top: 0
        }, 500, function(){
            $(this).css("top", top);
        });
    });

    $("#menu li").on("tap", function(){
        var productId = $(this).children('.product-id').val();
        location.href = "welcome/detail/"+productId;
    });

    $("#login").on("tap", function(){
        location.href = "user/login_page";
    });

    $("#user-detail").on("tap", function(){
        location.href = "user/user_detail";
    });

    $("#logout").on("tap", function(){
        location.href = "user/logout";
    });


    function swipeGuide(index){
        $navSpan.eq(index).addClass("active").siblings().removeClass("active");
        $guideUl.css({
            left: -index * $guideUl.width() / 2
        });
    }
});


/*$(document).ready(function(){

});
width()
innerWidth()
outerWidth(true)


*/






