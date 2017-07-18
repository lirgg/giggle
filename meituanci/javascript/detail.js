

$(document).on("pageinit", function(){
    $("#left img").on("tap", function(){
        location.href = "welcome/index";
    });

  $('.buy').on('tap',function () {
      var product_id = $('#hidden-product-id').val();
      $.get('user/check_logined', {}, function (data) {
          if (data == 'yes') {
              location.href = 'welcome/submit_order?productId=' + product_id;
          } else {
              location.href = "user/login_page";
          }
      }, 'text');

  });


    $('#collect-btn').on('tap',function(){
        //将收藏信息插入数据库
        // user_id  product_id
        var _that = $(this);
        var productId = $('#hidden-product-id').val();
            if(!_that.hasClass('active')) {
                //做收藏
                $.get('user/check_logined', {}, function (data) {
                    if (data == 'yes') {
                        //做收藏
                        $.get('user/collect', {'productId': productId}, function (data) {
                            if (data == 'success') {
                                _that.text('取消');
                                _that.addClass('active');
                            }
                        }, 'text');
                    } else {
                        //跳到登录页
                        location.href = "user/login_page";
                    }
                }, 'text');
            }else{
                //做取消
                $.get('user/cancel_collect', {
                    'productId': productId
                },function(data){
                    if(data=='success'){
                        _that.text('收藏');
                        _that.removeClass('active');
                    }
                },'text');
            }




        // location.href = "user/check_logined";
    });


});

