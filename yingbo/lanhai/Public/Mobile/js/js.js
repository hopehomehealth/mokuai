
// muen导航
//导航
$(function(){
    var ul_node = $(".menu")[0];
    var num=0;
    for(var i=0;i<ul_node.children.length;i++){
        if(ul_node.children[i].nodeName=="LI"){
            num++;
        }
    }
    var a = $(".menu li").height()
    $(".nav").on("click",function(){
        var val = $(this).attr('class');
        if(val.indexOf('on') == -1){
            $(this).addClass('on');
            $(".menu").show(0).stop().animate({
                height:a*num+'px'
            },0);
        }else{
            $(this).removeClass('on');
            $(".menu").hide(200).stop().animate({
                height:0
            },0);
        }
    });
    $(".menu a").on("click",function(){
        $(this).parents(".menu").hide();
        $(".nav").removeClass('on');
    });
    //$(".menu_2").eq(0).show();
    $(".menu_1").click(function(){
        $(this).children(".xia").toggleClass("shang").parent().siblings().children("span").removeClass("shang");//切换图标
        $(this).parent().height("auto");
        $(this).next(".menu_2").stop().slideToggle(500).siblings(".menu_2").slideUp(500);
    });
});

//博客tab选项卡
$(function(){
    $(".for-t li").click(function(){
        $(this).addClass("cur").siblings().removeClass("cur");
        $(".for-con").eq($(this).index()).addClass("cur").siblings().removeClass("cur");
    })
});

// 顶文等操作
$(function () {
    $(".for-list-tb").click(function(){
        $(this).parent().parent().siblings(".hide-menu").show(50);
    })
    $(".delete").click(function () {
        $(".hide-menu").hide(50);
    });
});

$(function(){
    $(".find_nav_list").css("left",sessionStorage.left+"px");
    $(".find_nav_list li").each(function(){
        if($(this).find("a").text()==sessionStorage.pagecount){
            $(".sideline").css({left:$(this).position().left});
            $(".sideline").css({width:$(this).outerWidth()});
            $(this).addClass("find_nav_cur").siblings().removeClass("find_nav_cur");
            navName(sessionStorage.pagecount);
            return false
        }
        else{
            $(".sideline").css({left:0});
            $(".find_nav_list li").eq(0).addClass("find_nav_cur").siblings().removeClass("find_nav_cur");
        }
    });
    var nav_w=$(".find_nav_list li").first().width();
    $(".sideline").width(nav_w);
    $(".find_nav_list li").on('click', function(){
        nav_w=$(this).width();
        $(".sideline").stop(true);
        $(".sideline").animate({left:$(this).position().left},300);
        $(".sideline").animate({width:nav_w});
        $(this).addClass("find_nav_cur").siblings().removeClass("find_nav_cur");
        var fn_w = ($(".find_nav").width() - nav_w) / 2;
        var fnl_l;
        var fnl_x = parseInt($(this).position().left);
        if (fnl_x <= fn_w) {
            fnl_l = 0;
        } else if (fn_w - fnl_x <= flb_w - fl_w) {
            fnl_l = flb_w - fl_w;
        } else {
            fnl_l = fn_w - fnl_x;
        }
        $(".find_nav_list").animate({
            "left" : fnl_l
        }, 300);
        sessionStorage.left=fnl_l;
        var c_nav=$(this).find("a").text();
        navName(c_nav);
    });
    var fl_w=$(".find_nav_list").width();
    var flb_w=$(".find_nav_left").width();
    $(".find_nav_list").on('touchstart', function (e) {
        var touch1 = e.originalEvent.targetTouches[0];
        x1 = touch1.pageX;
        y1 = touch1.pageY;
        ty_left = parseInt($(this).css("left"));
    });
    $(".find_nav_list").on('touchmove', function (e) {
        var touch2 = e.originalEvent.targetTouches[0];
        var x2 = touch2.pageX;
        var y2 = touch2.pageY;
        if(ty_left + x2 - x1>=0){
            $(this).css("left", 0);
        }else if(ty_left + x2 - x1<=flb_w-fl_w){
            $(this).css("left", flb_w-fl_w);
        }else{
            $(this).css("left", ty_left + x2 - x1);
        }
        if(Math.abs(y2-y1)>0){
            e.preventDefault();
        }
    });
});
function navName(c_nav) {
    switch (c_nav) {
        case "资讯":
            sessionStorage.pagecount = "资讯";
            break;
        case "分析":
            sessionStorage.pagecount = "分析";
            break;
        case "黄页":
            sessionStorage.pagecount = "黄页";
            break;
        case "技术":
            sessionStorage.pagecount = "技术";
            break;
        case "项目":
            sessionStorage.pagecount = "项目";
            break;
        case "股市":
            sessionStorage.pagecount = "股市";
            break;
        case "原创":
            sessionStorage.pagecount = "原创";
            break;
        case "经济":
            sessionStorage.pagecount = "经济";
            break;
        case "评论":
            sessionStorage.pagecount = "评论";
            break;
    }
}
//返回顶部
$(function () {
    $(".ftop").hide();
    $(function () {
        $(window).scroll(function () {
            if ($(window).scrollTop() > 500) {
                $(".ftop").fadeIn(500);

            }
            else {
                $(".ftop").fadeOut(500);
            }
        });
        $(".ftop").click(function () {
            $('body,html').animate({scrollTop: 0}, 250);
            return false;
        });
    });
})



//选项卡
$(function(){
    $(".txt").click(function(){
        $(this).addClass("txtclick").siblings().removeClass("txtclick");
        var index=$(this).index();
        $(".tab_box > div").eq(index).fadeIn(250).siblings().fadeOut(250);
    });
});
//导航
//显示个人信息
$(function () {
    $(".banner_3 dt").click(function () {
        if($("aside").css("display")=="none"){
            $("aside").slideDown(300);
        }else{
            $("aside").slideUp(300);
        }
    });
    $("aside .clo").click(function () {
        $("aside").slideUp(300);
    });
});
// mybolg新闻弹出条
$(function () {
    $(".ion9").click(function () {
        // alert(this);
        $(this).parent().parent().parent().next(".fenxiang").fadeIn("slow").parent().siblings().children(".fenxiang").fadeOut("slow");
    })
    $(".fenxiang .clo").click(function () {
        $(".fenxiang").fadeOut("slow");;
    })
});


// settingsmanage
$(function(){
// 隐藏导航栏
    $("header nav").click(function(){
        $(this).siblings(".hidenav").toggle();
    });

// 滑动菜单
    $("#menu .slide li").click(function(){
        var index1 = $("#menu .slide li").index(this);
        $(this).addClass("current").siblings().removeClass("current");
        $(".tab .settmain:eq("+index1+")").addClass("show")
            .siblings().removeClass("show");
    });

// 删除博文
    $("table td a:last-child").click(function(){
        $(this).parents("tr").remove();
    });

// 关闭评论
    $(".comment .row .close").click(function(){
        $(this).parents(".row").remove();
    });

// 评论切换
    $(".comment .bar span").click(function(){
        var index2 = $(".comment .bar span").index(this);
        $(this).addClass("on").siblings().removeClass("on");
        $(".comment .pinglun:eq("+index2+")").addClass("show")
            .siblings().removeClass("show");
    });

// 顶文等操作
    $(".collect em.more").click(function(){
        $(this).parents(".layer").siblings('.hide').show();
    });
    $(".hide .close").click(function(){
        $(this).parent(".hide").hide();
    });
    $(".hide .delete").click(function(){
        $(this).parents(".row").remove();
    });
});

// index  benner

function banner(){
    var bn_id = 0;
    var bn_id2= 1;
    var speed33=5000;
    var qhjg = 1;
    var MyMar33;
    $("#banner .d1").hide();
    $("#banner .d1").eq(0).fadeIn("slow");
    if($("#banner .d1").length>1)
    {
        $("#banner_id li").eq(0).addClass("nuw");
        function Marquee33(){
            bn_id2 = bn_id+1;
            if(bn_id2>$("#banner .d1").length-1)
            {
                bn_id2 = 0;
            }
            $("#banner .d1").eq(bn_id).css("z-index","2");
            $("#banner .d1").eq(bn_id2).css("z-index","1");
            $("#banner .d1").eq(bn_id2).show();
            $("#banner .d1").eq(bn_id).fadeOut("slow");
            $("#banner_id li").removeClass("nuw");
            $("#banner_id li").eq(bn_id2).addClass("nuw");
            bn_id=bn_id2;
        };

        MyMar33=setInterval(Marquee33,speed33);

        $("#banner_id li").click(function(){
            var bn_id3 = $("#banner_id li").index(this);
            if(bn_id3!=bn_id&&qhjg==1)
            {
                qhjg = 0;
                $("#banner .d1").eq(bn_id).css("z-index","2");
                $("#banner .d1").eq(bn_id3).css("z-index","1");
                $("#banner .d1").eq(bn_id3).show();
                $("#banner .d1").eq(bn_id).fadeOut("slow",function(){qhjg = 1;});
                $("#banner_id li").removeClass("nuw");
                $("#banner_id li").eq(bn_id3).addClass("nuw");
                bn_id=bn_id3;
            }
        })
        $("#banner_id").hover(
            function(){
                clearInterval(MyMar33);
            }
            ,
            function(){
                MyMar33=setInterval(Marquee33,speed33);
            }
        )
    }
    else
    {
        $("#banner_id").hide();
    }
}



// 顶文等操作
   $(".for-list-tb").click(function(){
    $(this).parent().parent().siblings(".hide-menu").show(50);
    })
    $(".delete").click(function () {
        $(".hide-menu").hide(50);
    })
	
// 设置管理
 $('.set-cd').on('click', function(event){
            event.preventDefault();
            $('.set-szgl').addClass('is-vis');
            //$(".dialog-addquxiao").hide()
        });
        //关闭窗口
        /*$('.set-szgl').on('click', function(event){
            if( $(event.target).is('.set-close') || $(event.target).is('.set-szgl') ) {
                event.preventDefault();
                $(this).removeClass('is-vis');
            }
        });*/
        //ESC关闭
        $(document).keyup(function(event){
            if(event.which=='27'){
                $('.set-szgl').removeClass('is-vis');
            }
        });
		
 $('.set-cdx').on('click', function(event){
            event.preventDefault();
            $('.set-szglx').addClass('is-vis');
            //$(".dialog-addquxiao").hide()
        });
        //关闭窗口
        $('.set-szglx').on('click', function(event){
            if( $(event.target).is('.set-closex') || $(event.target).is('.set-szglx') ) {
                event.preventDefault();
                $(this).removeClass('is-vis');
            }
        });
        //ESC关闭
        $(document).keyup(function(event){
            if(event.which=='27'){
                $('.set-szglx').removeClass('is-vis');
            }
        });
		
		