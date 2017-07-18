/**
 * Created by xiecheng on 2017/7/12.
 */
$(document).on("pageinit", function(){

    var $username = $("#username");
    var $password = $("#password");
    $("#username").on("blur", function(){
        if($username.val() == ""){
            return false;
        }
        $.post("user/check_username", {
            "username" : $(this).val()
        }, function(res){
            if(res == "no"){//用户名不可用
                $("#is-use").html("用户名已存在，你换一个");
            }else{
                $("#is-use").html("用户名可用");
            }
        });
    });

    $("#login-form").on("submit", function(){
        if($username.val() == ""){
            return false;
        }
        if($password.val() == ""){
            return false;
        }
    });
});