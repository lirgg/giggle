/**
 * Created by Administrator on 2017/7/18.
 */

$(document).on("pageinit", function(){
    $('.add').on('tap',function(){
        var val = $('.count').val();
        var price = $('.price').text();
        $('.count').val(parseInt(val) + 1);
        $('.total-price').text(price * $('.count').val());
    });

    $('.minus').on('tap',function(){
        var val = $('.count').val();
        if(val > 1){
            var price = $('.price').text();
            $('.count').val(parseInt(val) - 1);
            $('.total-price').text(price * $('.count').val());
        }
    });
});

//.text()������ȡ���޸�Ԫ�صĴ��ı����ݣ�.val()������ȡ���޸ı�Ԫ�ص�valueֵ