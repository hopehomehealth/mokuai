//菜单
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
			
//tab选项卡
$(".Links-tit li").mouseover(function(){
	   $(this).addClass("current").siblings().removeClass("current");
	   $(".Links-txt").eq($(this).index()-1).addClass("current").siblings().removeClass("current");	
	})
	
 /*---------返回顶部----------*/
   $(function() {
	    $(".btn_top").hide();
		$(".btn_top").live("click",function(){
			$('html, body').animate({scrollTop: 0},300);return false;
		})
		$(window).bind('scroll resize',function(){
			if($(window).scrollTop()<=300){
				$(".btn_top").hide();
			}else{
				$(".btn_top").show();
			}
		})
   })
   /*---------返回顶部 end----------*/
//论坛选项卡
$(".set-tit-a li").mouseover(function(){
	   $(this).addClass("current").siblings().removeClass("current");
	   $(".set-txt-a").eq($(this).index()).addClass("current").siblings().removeClass("current");	
	})
	
//论坛收缩
$(".showMore-t").toggle(function(){
		$(this).parent().next().show();
		$(this).removeClass("jia");
		$(this).addClass("jian");
	},function(){
		$(this).parent().next().hide();
		$(this).removeClass("jian");
		$(this).addClass("jia");
	});


   