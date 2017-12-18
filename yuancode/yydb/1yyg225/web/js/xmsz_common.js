//添加边框
$('.most1 li').hover(function(){
	$(this).toggleClass("bor_hover");
})
$('.one li').hover(function(){
	$(this).toggleClass("bor_hover");
})
$('.kqjp_list li').hover(function(){
	$(this).toggleClass("bor_hover");
})
$('.tyjp1 li').hover(function(){
	$(this).toggleClass("bor_hover");
})
$('.index_hot li').hover(function(){
	$(this).toggleClass("bor_hover");
})
$('.index_fx').hover(function(){
	$(this).toggleClass("bor_hover");
})
$('.index_fx1 li').hover(function(){
	$(this).toggleClass("bor_hover");
})
$(".index_hot").find("li:first").addClass("index_hot_f");
$(".index_hot").find("li:eq(4)").addClass("index_hot_f");

$('.index_left2 li').hover(function(){
	$(this).toggleClass("on");
    if($(this).find(".index_c").children('a').length>0)
        $(this).find(".index_c").stop(true,true).slideToggle(0);
})
$('.main_menu1 li').hover(function(){
	$(this).toggleClass("on");
    if($(this).find(".index_c").children('a').length>0)
	    $(this).find(".index_c").stop(true,true).slideToggle(0);
})

$(function(){
	$(".most1 li").hover(function(){
		$(this).css("z-index","9999");
	},function(){
		$(this).css("z-index","10");
	});
	$(".index_hot li").hover(function(){
		$(this).css("z-index","9999");
	},function(){
		$(this).css("z-index","10");
	});
	$(".kqjp_list li").hover(function(){
		$(this).css("z-index","9999");
	},function(){
		$(this).css("z-index","10");
	});
	$(".index_fx").hover(function(){
		$(this).css("z-index","9999");
	},function(){
		$(this).css("z-index","10");
	});
	$(".index_fx1 li").hover(function(){
		$(this).css("z-index","9999");
	},function(){
		$(this).css("z-index","10");
	});
});
  $(".main_menu2").hover(function(){
    $(this).find('.main_menu i').stop().animate({ top:'-17px'},300);
    $(this).find('.main_menu em').stop().animate({ top:'0'},300);
  },function(){
    $(this).find('.main_menu i').stop().animate({ top:'0'},300);
    $(this).find('.main_menu em').stop().animate({ top:'17px'},300);
  });


$('.index_right4_1').hover(function(){
	$(this).find(".prev").stop(true,true).slideToggle(0);
	$(this).find(".next").stop(true,true).slideToggle(0);
})
$('.main_menu2').hover(function(){
	$(this).find(".main_menu1").stop(true,true).slideToggle(300);
})
//head

$('header dl dt span').click(function(){

	$(this).next("p").stop(true,true).slideToggle(300);

})

$('.head3').hover(function(){

	$(this).find("p").stop(true,true).slideToggle(300);

})



$(".index_left2").find("li:last").addClass("nb1");

$(".menu1 dd").find("a:last").addClass("nb1");

$('.menu1 dt').click(function(){

	$(this).next("dd").stop(true,true).slideToggle(300);

})


$(function(){
	$(".register_1 span:eq(0)").addClass("hover")
	$(".register2 .register2_1:eq(0)").show()
	$('.register_1 span').click(function(){
		$(this).addClass('hover').siblings().removeClass('hover');
		$('.register2 .register2_1:eq('+$(this).index()+')').show().siblings().hide();	
	})
})



//foot

$(".approve").find("li:last").addClass("approve_r");

$(".approve").find("li:eq(1)").addClass("approve_r1");

$(".most1").find("li:last").addClass("most1_2");





//卡券竞拍

$(".join1").find("li:first").addClass("jion_b");





$(function(){

	$(".kx_top p a:eq(0)").addClass("hover")

	$(".kx_top1 .kx_n:eq(0)").show()

	$('.kx_top p a').click(function(){

		$(this).addClass('hover').siblings().removeClass('hover');

		$('.kx_top1 .kx_n:eq('+$(this).index()+')').show().siblings().hide();	

	})

})



$('.pay2_2 dd span').click(function(){

	$(this).addClass("hover").siblings().removeClass('hover');

})

//个人空间

$(".center_3 dt").find("span:last").addClass("nob");

$('.center_left2 li big').click(function(){

	$(this).parent().find("p").stop(true,true).slideToggle(300);

})



$(".y_select p span").text($(".y_select ul li.hover a").text())

$('.y_select p').click(function(){

	$(this).next("ul").stop(true,true).slideToggle(300);

})

$('.y_select ul li a').click(function(){

	$(this).parent("li").parent("ul").stop(true,true).slideUp(300);

	//$(this).next("ul").stop(true,true).slideToggle(300);

})

$(".y_right1").find("li:last").addClass("y_rn")



//购物车

$(".car").find("span:last").addClass("noc");
$(function(){
	$('.one_top li').each(function(i){
		i=$(this).find(".one_top1").height();
		if(i<56)//如果遍历到第四个时候
		{$(this).find(".one_more").addClass("none")}		
		})
	})

$('.one_more .om1').click(function(){
	$(this).parent().prev(".one_top1").addClass("show1");
	$(this).parent().addClass("show");
})
$('.one_more .om2').click(function(){
	$(this).parent().prev(".one_top1").removeClass("show1");
	$(this).parent().removeClass("show");
})

$(function(){
	$('.index_left2 li').each(function(i){
		var a=$(this).find(".index_c").height()+60*i;
		if( a>420){
		{$(this).find(".index_c").addClass("index_bot")}		
		}
	})
})


jQuery(".k_time_1").slide({mainCell:" ul.bd",effect:"left",autoPlay:false,pnLoop:false,vis:1,scroll:1});
jQuery(".index_right4_1").slide({mainCell:" ul.bd",effect:"leftLoop",autoPlay:true});
jQuery(".index_right2 dd").slide({mainCell:" ul.bd",effect:"topLoop",autoPlay:true,vis:3});
jQuery(".y_right1").slide({mainCell:" ul.bd",effect:"topLoop",autoPlay:true,vis:7});

