
//漂浮
$(function(){
    //获取要定位元素距离浏览器顶部的距离
    var navH = $(".new-inex1").offset().top;
    var navH1 = $(window).height()/2;
    
    //滚动条事件
    $(window).scroll(function(){
        //获取滚动条的滑动距离
        var scroH = $(this).scrollTop();
        //滚动条的滑动距离大于等于定位元素距离浏览器顶部的距离，就固定，反之就不固定
        if(scroH>navH){
            $(".new-inex1").addClass("new-fixed");
        }else{
            $(".new-inex1").removeClass("new-fixed");
            
        }
        if(scroH>navH1){
            $(".bodyright").show();
        }else{
            $(".bodyright").hide();
            
        }
    });
});
$('.bodyright span').click(function () {
    $('html,body').animate({
        scrollTop : '0px'
    }, 500);//返回顶部所用的时间 返回顶部也可调用goto()函数
});

//地址
$('.center-award2 li .center-award3').click(function(){
    $(this).parent("li").addClass("hover").siblings().removeClass("hover")
});
$('.center-addr2').click(function(){
    $(this).toggleClass("hover")
});
if($(".center-invite3-2").height()>54){
    $(".center-invite3-2").addClass("center-invite3-3")  
}
$('.center-brank li').click(function(){
    $(this).addClass("hover").siblings().removeClass("hover")
});