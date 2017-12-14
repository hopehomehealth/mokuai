//乐护菜单
var mst;
			jQuery(".menu_nr li").hover(function(){
			var curItem = jQuery(this);
			mst = setTimeout(function(){//延时触发
				curItem.find(".childnavin").slideDown('fast');
				mst = null;
			});
			}, function(){
			if(mst!=null)clearTimeout(mst);
			jQuery(this).find(".childnavin").slideUp('fast');
			});

//乐护更多服务
$(".showMore_t").click(function(){
    var imgPath=$(".showMore_t").css("background-image");
    $(".xzfw_list1").slideToggle("slow");
    if(imgPath.indexOf("close.png")>0){
        $(".showMore_t").css("background","url(/Public/Home/images/open.png) 0 no-repeat");
    }else{
        $(".showMore_t").css("background","url(/Public/Home/images/close.png) 0 no-repeat");
    }
});

//服务流程
$(function(){
	var lc_con = 0; // 默认值为0，二级菜单向下滑动显示；值为1，则二级菜单向上滑动显示
	if(lc_con ==0){
		$('.lc_con li').hover(function(){
			$('.second,.third',this).css('top','158px').show();
		},function(){
			$('.second,.third',this).hide();
		});
	}else if(lc_con ==1){
		$('.lc_con li').hover(function(){
			$('.second,.third',this).css('bottom','158px').show();
		},function(){
			$('.second,.third',this).hide();
		});
	}
});

$(function(){
	var lc_con = 1; // 默认值为0，二级菜单向下滑动显示；值为1，则二级菜单向上滑动显示
	if(lc_con ==1){
		$('.lc_con li').hover(function(){
			$('.fourth',this).css('top','-157px').show();
		},function(){
			$('.fourth',this).hide();
		});
	}else if(lc_con ==1){
		$('.lc_con li').hover(function(){
			$('.fourth',this).css('bottom','-157px').show();
		},function(){
			$('.fourth',this).hide();
		});
	}
});

//关于乐护
$(".about_con_tit li").mouseover(function(){
	   $(this).addClass("current").siblings().removeClass("current");
	   $(".about_con_txt ").eq($(this).index()).addClass("current").siblings().removeClass("current");	
	})
	
//乐护服务
	$(".modmore").hover(function(){
  $(this).find(".ser_erm").stop().animate({top: '0px'},200);
},function(){
  $(this).find(".ser_erm").stop().animate({top: '280px'},200);
})