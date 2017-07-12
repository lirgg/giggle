/**
 * Created by Administrator on 2017/7/12.
 */

$(document).on("pageinit",function(){
    $("#register_page").on("tap",function(){
        location.href = "welcome/register_page";
    });
    $("#login_page").on("tap", function(){
        location.href = "welcome/login_page";
    });
});