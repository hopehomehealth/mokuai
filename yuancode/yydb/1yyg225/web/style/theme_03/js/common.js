$(function(){
    $('.load_cart').hover(function(){
        loadCart();
        $('#cart_info').show();
    },function(){
        $('#cart_info').hide();
    });
});
