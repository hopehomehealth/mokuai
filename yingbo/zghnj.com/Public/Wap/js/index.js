
//搜索
$(function () {
    $(".search").click(function () {
        $(".search-con").toggleClass("show")
    });
});

//导航
$(".navico").unbind("click").bind("click", function () {
    if ($('.nav').is(':visible')) {
        $('.nav').slideUp();
        $(this).removeClass('cur')
    } else {
        $('.nav').slideDown();
        $(this).addClass('cur')
    }
})
$(".nav ul li h3 span").unbind("click").bind("click", function () {
    if ($(this).parent('h3').siblings('.navlist').is(':visible')) {
        $(this).parent('h3').siblings('.navlist').slideUp();
        $(this).parent('h3').removeClass('cur')
    } else {
        $(this).parent('h3').siblings('.navlist').slideDown();
        $(this).parent('h3').addClass('cur')
        $(this).parents('li').siblings().find('.navlist').slideUp();
        $(this).parents('li').siblings('li').find('h3').removeClass('cur')
    }
});

//banner
if ($(".wwindexbanner").length > 0) {
    var mySwiper = new Swiper('.wwindexbanner', {
        loop: true,
        autoplay: 5000,
        speed: 1000,
        pagination: '.wwindexbannerbtn',
        paginationClickable: true,
        autoplayDisableOnInteraction: false,
        grabCursor: false,
        parallax: true

    });

};

// 注册
$(".inputlabel").click(function () {
    var ischeck = $("input[name='isallow']").prop('checked');
    $(".register-xz").toggleClass("register-xz-a");
    $("input[name='isallow']").prop('checked',!ischeck)
});

// 应用案例
$(".su-case-more").click(function () {
    $(".su-case-list").addClass("h-a");
});

