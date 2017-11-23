<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>京西商城</title>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>base.css" type="text/css">
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>global.css" type="text/css">
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>header.css" type="text/css">
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>index.css" type="text/css">
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>bottomnav.css" type="text/css">
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>footer.css" type="text/css">

    <script type="text/javascript" src="<?php echo C('JS_URL');?>jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?php echo C('JS_URL');?>header.js"></script>
    <script type="text/javascript" src="<?php echo C('JS_URL');?>index.js"></script>
</head>
<body>
    <!-- 顶部导航 start -->
    <div class="topnav">
        <div class="topnav_bd w1210 bc">
            <div class="topnav_left">
            </div>
            <div class="topnav_right fr">
    <ul>
        <?php if(!empty($_SESSION['user_name'])): ?><li>您好，<span style='font-size:25px;color:blue;'>【<?php echo (session('user_name')); ?>】</span>欢迎来到京西！[<a href="<?php echo U('User/logout');?>">[安全退出]</a>] </li>
        <?php else: ?>
            <li>您好，欢迎来到京西！[<a href="<?php echo U('User/login');?>">登录</a>] [<a href="<?php echo U('User/register');?>">免费注册</a>] </li><?php endif; ?>
        <li class="line">|</li>
        <li>我的订单</li>
        <li class="line">|</li>
        <li>客户服务</li>

    </ul>
            </div>
        </div>
    </div>
    <!-- 顶部导航 end -->
    
    <div style="clear:both;"></div>

    <!-- 头部 start -->
    <div class="header w1210 bc mt15">
        <!-- 头部上半部分 start 包括 logo、搜索、用户中心和购物车结算 -->
        <div class="logo w1210">
            <h1 class="fl"><a href="index.html"><img src="<?php echo C('IMG_URL');?>logo.png" alt="京西商城"></a></h1>
            <!-- 头部搜索 start -->
            <div class="search fl">
                <div class="search_form">
                    <div class="form_left fl"></div>
<form action="/index.php/Home/Goods/detail/goods_id/25.html" name="serarch" method="get" class="fl">
    <?php if(!empty($_GET['search_name'])): ?><input type="text" class="txt" value="<?php echo ($_GET['search_name']); ?>" name="search_name"/>
    <?php else: ?>
    <input type="text" class="txt" value="请输入商品关键字" name="search_name"/><?php endif; ?>
    <input type="submit" class="btn" value="搜索" />
</form>
                    <div class="form_right fl"></div>
                </div>
                
                <div style="clear:both;"></div>

                <div class="hot_search">
                    <strong>热门搜索:</strong>
                    <a href="">D-Link无线路由</a>
                    <a href="">休闲男鞋</a>
                    <a href="">TCL空调</a>
                    <a href="">耐克篮球鞋</a>
                </div>
            </div>
            <!-- 头部搜索 end -->

            <!-- 用户中心 start-->
            <div class="user fl">
                <dl>
                    <dt>
                        <em></em>
                        <a href="">用户中心</a>
                        <b></b>
                    </dt>
                    <dd>
                        <div class="prompt">
                            您好，请<a href="">登录</a>
                        </div>
                        <div class="uclist mt10">
                            <ul class="list1 fl">
                                <li><a href="">用户信息></a></li>
                                <li><a href="">我的订单></a></li>
                                <li><a href="">收货地址></a></li>
                                <li><a href="">我的收藏></a></li>
                            </ul>

                            <ul class="fl">
                                <li><a href="">我的留言></a></li>
                                <li><a href="">我的红包></a></li>
                                <li><a href="">我的评论></a></li>
                                <li><a href="">资金管理></a></li>
                            </ul>

                        </div>
                        <div style="clear:both;"></div>
                        <div class="viewlist mt10">
                            <h3>最近浏览的商品：</h3>
                            <ul>
                                <li><a href=""><img src="<?php echo C('IMG_URL');?>view_list1.jpg" alt="" /></a></li>
                                <li><a href=""><img src="<?php echo C('IMG_URL');?>view_list2.jpg" alt="" /></a></li>
                                <li><a href=""><img src="<?php echo C('IMG_URL');?>view_list3.jpg" alt="" /></a></li>
                            </ul>
                        </div>
                    </dd>
                </dl>
            </div>
            <!-- 用户中心 end-->

            <!-- 购物车 start -->
            <div class="cart fl">
                <dl>
                    <dt>
                        <a href="<?php echo U('Shop/flow1');?>" target="_blank">去购物车结算</a>
                        <b></b>
                    </dt>
                    <dd>
                        <div class="prompt">
                            购物车中还没有商品，赶紧选购吧！
                        </div>
                    </dd>
                </dl>
            </div>
            <!-- 购物车 end -->
        </div>
        <!-- 头部上半部分 end -->
        
        <div style="clear:both;"></div>

        <!-- 导航条部分 start -->
        <div class="nav w1210 bc mt10">
            <!--  商品分类部分 start-->
            
            <?php if(CONTROLLER_NAME == 'Index' and ACTION_NAME == 'index'): ?><div class="category fl"> <!-- 非首页，需要添加cat1类 -->
                <div class="cat_hd">  <!-- 注意，首页在此div上只需要添加cat_hd类，非首页，默认收缩分类时添加上off类，鼠标滑过时展开菜单则将off类换成on类 -->
                    <h2>全部商品分类</h2>
                    <em></em>
                </div>
                <div class="cat_bd"><!--非首页收起，添加none的class属性值-->
            <?php else: ?>
                <div class="category fl cat1"> <!-- 非首页，需要添加cat1类 -->
                <div class="cat_hd cat_hd">  <!-- 注意，首页在此div上只需要添加cat_hd类，非首页，默认收缩分类时添加上off类，鼠标滑过时展开菜单则将off类换成on类 -->
                    <h2>全部商品分类</h2>
                    <em></em>
                </div>
                <div class="cat_bd none"><!--非首页收起，添加none的class属性值--><?php endif; ?>
                    
<?php if(is_array($catinfoA)): foreach($catinfoA as $key=>$v): ?><div class="cat item1">
    <h3><a href="/index.php/Home/Goods/showlist/cat_id/<?php echo ($v['cat_id']); ?>" target="_blank"><?php echo ($v["cat_name"]); ?></a> <b></b></h3>
    <div class="cat_detail">
        <?php if(is_array($catinfoB)): foreach($catinfoB as $key=>$vv): if(($vv["cat_pid"]) == $v["cat_id"]): ?><dl class="dl_1st">
            <dt><a href="/index.php/Home/Goods/showlist/cat_id/<?php echo ($vv['cat_id']); ?>" target="_blank"><?php echo ($vv["cat_name"]); ?></a></dt>
            <dd>
                <?php if(is_array($catinfoC)): foreach($catinfoC as $key=>$vvv): if(($vvv["cat_pid"]) == $vv["cat_id"]): ?><a href="/index.php/Home/Goods/showlist/cat_id/<?php echo ($vvv['cat_id']); ?>" target="_blank"><?php echo ($vvv["cat_name"]); ?></a><?php endif; endforeach; endif; ?>
            </dd>
        </dl><?php endif; endforeach; endif; ?>
    </div>
</div><?php endforeach; endif; ?>

                </div>

            </div>
            <!--  商品分类部分 end--> 

            <div class="navitems fl">
                <ul class="fl">
                    <li class="current"><a href="">首页</a></li>
                    <li><a href="">电脑频道</a></li>
                    <li><a href="">家用电器</a></li>
                    <li><a href="">品牌大全</a></li>
                    <li><a href="">团购</a></li>
                    <li><a href="">积分商城</a></li>
                    <li><a href="">夺宝奇兵</a></li>
                </ul>
                <div class="right_corner fl"></div>
            </div>
        </div>
        <!-- 导航条部分 end -->
    </div>
    <!-- 头部 end-->

<link rel="stylesheet" href="<?php echo C('CSS_URL');?>goods.css" type="text/css">
<link rel="stylesheet" href="<?php echo C('CSS_URL');?>common.css" type="text/css">
<!--引入jqzoom css -->
<link rel="stylesheet" href="<?php echo C('CSS_URL');?>jqzoom.css" type="text/css">
<script type="text/javascript" src="<?php echo C('JS_URL');?>goods.js"></script>
<script type="text/javascript" src="<?php echo C('JS_URL');?>jqzoom-core.js"></script>

<!--为使用富文本编辑器，引入3个js文件-->
<script type="text/javascript" src="<?php echo C('PLUGIN_URL');?>ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="<?php echo C('PLUGIN_URL');?>ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="<?php echo C('PLUGIN_URL');?>ueditor/lang/zh-cn/zh-cn.js"></script>

<!--引入分页的插件文件-->
<script type="text/javascript" src="<?php echo C('JS_URL');?>jquery-page.js"></script>

<!-- jqzoom 效果 -->
<script type="text/javascript">
	$(function(){
		$('.jqzoom').jqzoom({
            zoomType: 'standard',
            lens:true,
            preloadImages: false,
            alwaysOn:false,
            title:false,
            zoomWidth:400,
            zoomHeight:400
        });
	})
</script>

<div style="clear:both;"></div>

<!-- 商品页面主体 start -->
<div class="main w1210 mt10 bc">
	<!-- 面包屑导航 start -->
	<div class="breadcrumb">
		<h2>当前位置：<a href="">首页</a> > <a href="">电脑、办公</a> > <a href="">笔记本</a> > ThinkPad X230(23063T4）12.5英寸笔记本</h2>
	</div>
	<!-- 面包屑导航 end -->
	
	<!-- 主体页面左侧内容 start -->
	<div class="goods_left fl">
		<!-- 相关分类 start -->
		<div class="related_cat leftbar mt10">
			<h2><strong>相关分类</strong></h2>
			<div class="leftbar_wrap">
				<ul>
					<li><a href="">笔记本</a></li>
					<li><a href="">超极本</a></li>
					<li><a href="">平板电脑</a></li>
				</ul>
			</div>
		</div>
		<!-- 相关分类 end -->

		<!-- 相关品牌 start -->
		<div class="related_cat	leftbar mt10">
			<h2><strong>同类品牌</strong></h2>
			<div class="leftbar_wrap">
				<ul>
					<li><a href="">D-Link</a></li>
					<li><a href="">戴尔</a></li>
					<li><a href="">惠普</a></li>
					<li><a href="">苹果</a></li>
					<li><a href="">华硕</a></li>
					<li><a href="">宏基</a></li>
					<li><a href="">神舟</a></li>
				</ul>
			</div>
		</div>
		<!-- 相关品牌 end -->

		<!-- 热销排行 start -->
		<div class="hotgoods leftbar mt10">
			<h2><strong>热销排行榜</strong></h2>
			<div class="leftbar_wrap">
				<ul>
					<li></li>
				</ul>
			</div>
		</div>
		<!-- 热销排行 end -->


		<!-- 浏览过该商品的人还浏览了  start 注：因为和list页面newgoods样式相同，故加入了该class -->
		<div class="related_view newgoods leftbar mt10">
			<h2><strong>浏览了该商品的用户还浏览了</strong></h2>
			<div class="leftbar_wrap">
				<ul>
					<li>
						<dl>
							<dt><a href=""><img src="<?php echo C('IMG_URL');?>relate_view1.jpg" alt="" /></a></dt>
							<dd><a href="">ThinkPad E431(62771A7) 14英寸笔记本电脑 (i5-3230 4G 1TB 2G独显 蓝牙 win8)</a></dd>
							<dd><strong>￥5199.00</strong></dd>
						</dl>
					</li>

					<li>
						<dl>
							<dt><a href=""><img src="<?php echo C('IMG_URL');?>relate_view2.jpg" alt="" /></a></dt>
							<dd><a href="">ThinkPad X230i(2306-3V9） 12.5英寸笔记本电脑 （i3-3120M 4GB 500GB 7200转 蓝牙 摄像头 Win8）</a></dd>
							<dd><strong>￥5199.00</strong></dd>
						</dl>
					</li>

					<li>
						<dl>
							<dt><a href=""><img src="<?php echo C('IMG_URL');?>relate_view3.jpg" alt="" /></a></dt>
							<dd><a href="">T联想（Lenovo） Yoga13 II-Pro 13.3英寸超极本 （i5-4200U 4G 128G固态硬盘 摄像头 蓝牙 Win8）晧月银</a></dd>
							<dd><strong>￥7999.00</strong></dd>
						</dl>
					</li>

					<li>
						<dl>
							<dt><a href=""><img src="<?php echo C('IMG_URL');?>relate_view4.jpg" alt="" /></a></dt>
							<dd><a href="">联想（Lenovo） Y510p 15.6英寸笔记本电脑（i5-4200M 4G 1T 2G独显 摄像头 DVD刻录 Win8）黑色</a></dd>
							<dd><strong>￥6199.00</strong></dd>
						</dl>
					</li>

					<li class="last">
						<dl>
							<dt><a href=""><img src="<?php echo C('IMG_URL');?>relate_view5.jpg" alt="" /></a></dt>
							<dd><a href="">ThinkPad E530c(33662D0) 15.6英寸笔记本电脑 （i5-3210M 4G 500G NV610M 1G独显 摄像头 Win8）</a></dd>
							<dd><strong>￥4399.00</strong></dd>
						</dl>
					</li>					
				</ul>
			</div>
		</div>
		<!-- 浏览过该商品的人还浏览了  end -->

		<!-- 最近浏览 start -->
		<div class="viewd leftbar mt10">
			<h2><a href="">清空</a><strong>最近浏览过的商品</strong></h2>
			<div class="leftbar_wrap">

<?php if(is_array($recentlygoods)): foreach($recentlygoods as $key=>$v): ?><dl>
	<dt><a href=""><img src="<?php echo C('SITE_URL'); echo (substr($v["goods_small_logo"],2)); ?>" alt="" /></a></dt>
	<dd><a href=""><?php echo ($v["goods_name"]); ?></a></dd>
</dl><?php endforeach; endif; ?>


			</div>
		</div>
		<!-- 最近浏览 end -->

	</div>
	<!-- 主体页面左侧内容 end -->
	
	<!-- 商品信息内容 start -->
	<div class="goods_content fl mt10 ml10">
		<!-- 商品概要信息 start -->
		<div class="summary">
			<h3><strong><?php echo ($info["goods_name"]); ?></strong></h3>
			
			<!-- 图片预览区域 start -->
			<div class="preview fl">
				<div class="midpic">
					<a href="<?php echo C('SITE_URL'); echo (substr($picsinfo[0]['goods_pics_b'],2)); ?>" class="jqzoom" rel="gal1">   <!-- 第一幅图片的大图 class 和 rel属性不能更改 -->
						<img src="<?php echo C('SITE_URL'); echo (substr($picsinfo[0]['goods_pics_m'],2)); ?>" alt="" />               <!-- 第一幅图片的中图 -->
					</a>
				</div>

				<!--使用说明：此处的预览图效果有三种类型的图片，大图，中图，和小图，取得图片之后，分配到模板的时候，把第一幅图片分配到 上面的midpic 中，其中大图分配到 a 标签的href属性，中图分配到 img 的src上。 下面的smallpic 则表示小图区域，格式固定，在 a 标签的 rel属性中，分别指定了中图（smallimage）和大图（largeimage），img标签则显示小图，按此格式循环生成即可，但在第一个li上，要加上cur类，同时在第一个li 的a标签中，添加类 zoomThumbActive  -->

				<div class="smallpic">
					<a href="javascript:;" id="backward" class="off"></a>
					<a href="javascript:;" id="forward" class="on"></a>
					<div class="smallpic_wrap">
						<ul>

<?php if(is_array($picsinfo)): foreach($picsinfo as $k=>$v): ?><li <?php if(($k) == "0"): ?>class="cur"<?php endif; ?> >
	<a <?php if(($k) == "0"): ?>class="zoomThumbActive"<?php endif; ?>
	href="javascript:void(0);" rel="{gallery: 'gal1', smallimage: '<?php echo C('SITE_URL'); echo (substr($v['goods_pics_m'],2)); ?>',largeimage: '<?php echo C('SITE_URL'); echo (substr($v['goods_pics_b'],2)); ?>'}"><img src="<?php echo C('SITE_URL'); echo (substr($v['goods_pics_s'],2)); ?>"></a>
</li><?php endforeach; endif; ?>
							
						</ul>
					</div>
					
				</div>
			</div>
			<!-- 图片预览区域 end -->

			<!-- 商品基本信息区域 start -->
			<div class="goodsinfo fl ml10">
<ul>
	<li><span>商品编号： </span><?php echo ($info["goods_id"]); ?></li>
	<li class="market_price"><span>定价：</span><em>￥<?php echo ($info['goods_price']+500); ?></em></li>
	<li class="shop_price"><span>本店价：</span> <strong>￥<?php echo ($info["goods_price"]); ?></strong> <a href="">(降价通知)</a></li>
	<li><span>上架时间：</span><?php echo (date("Y-m-d",$info["add_time"])); ?></li>
	<li class="star"><span>商品评分：</span> <strong></strong><a href="">(已有21人评价)</a></li> <!-- 此处的星级切换css即可 默认为5星 star4 表示4星 star3 表示3星 star2表示2星 star1表示1星 -->
</ul>
				<form action="" method="post" class="choose">
					<ul>
<?php if(is_array($manyinfo)): foreach($manyinfo as $key=>$v): ?><li class="product">
	<dl>
		<dt><?php echo ($v["attr_name"]); ?>：</dt>
		<dd>
			<?php if(is_array($v["attrvals"])): foreach($v["attrvals"] as $kk=>$vv): ?><a <?php if(($kk) == "0"): ?>class='selected'<?php endif; ?>
			href="javascript:;"><?php echo ($vv); ?> <input type="radio" name="attr_id_<?php echo ($v["attr_id"]); ?>" value="<?php echo ($vv); ?>"  <?php if(($kk) == "0"): ?>checked='checked'<?php endif; ?>  /></a><?php endforeach; endif; ?>
		</dd>
	</dl>
</li><?php endforeach; endif; ?>
						
						<li>
							<dl>
								<dt>购买数量：</dt>
								<dd>
									<a href="javascript:;" id="reduce_num"></a>
									<input type="text" name="amount" value="1" class="amount"/>
									<a href="javascript:;" id="add_num"></a>
								</dd>
							</dl>
						</li>

						<li>
							<dl>
								<dt>&nbsp;</dt>
<dd>
	<input type="button" value="" id="add_btn" class="add_btn" onclick="add_cart(<?php echo ($info["goods_id"]); ?>)"/>
	<input type="hidden" id="goods_id" value="<?php echo ($info["goods_id"]); ?>" />
</dd>
							</dl>
						</li>

					</ul>
				</form>
			</div>
			<!-- 商品基本信息区域 end -->
		</div>
		<!-- 商品概要信息 end -->
<script type="text/javascript">
function add_cart(goods_id){
	//给购物车添加商品
	$.ajax({
		//url请求地址可以如下设置
		//① 在html模板文件中--> {U(控制器/操作方法)}  U函数可以被tp模板引擎解析
		//② 在纯js文件里边 ---> "/index.php/Home/Shop/addCart"
		url:"<?php echo U('Shop/addCart');?>",  //U函数可以被tp解析
		data:{'goods_id':goods_id},
		dataType:'json',
		type:'get',
		success:function(msg){
			//把购物车“总数量、总价格”显示给购物车弹框
			$('#goods_number').html(msg.number);
			$('#goods_totalprice').html(msg.price);

			//① 获得"加入购物车"按钮位置
			var btn_x_y = getElementPos('add_btn');
			//② 显示弹出框，位置相对 ① 的按钮进行设置
			$('#cartBox').css('left',btn_x_y.x+50);
			$('#cartBox').css('top',btn_x_y.y+30);
			$("#cartBox").show();
		}
	});
}

/*
 * 根据元素的id获得其坐标(x轴和y轴)
 */
function getElementPos(elementId) {
    var ua = navigator.userAgent.toLowerCase();
    var isOpera = (ua.indexOf('opera') != -1);
    var isIE = (ua.indexOf('msie') != -1 && !isOpera); // not opera spoof
    var el = document.getElementById(elementId);
    if(el.parentNode === null || el.style.display == 'none') {
        return false;
    }
    var parent = null;
    var pos = [];
    var box;
    if(el.getBoundingClientRect) {   //IE
        box = el.getBoundingClientRect();
        var scrollTop = Math.max(document.documentElement.scrollTop, document.body.scrollTop);
        var scrollLeft = Math.max(document.documentElement.scrollLeft, document.body.scrollLeft);
        return {
            x:box.left + scrollLeft, 
            y:box.top + scrollTop
        };
    }else if(document.getBoxObjectFor) {   // gecko
        box = document.getBoxObjectFor(el);
        var borderLeft = (el.style.borderLeftWidth)?parseInt(el.style.borderLeftWidth):0;
        var borderTop = (el.style.borderTopWidth)?parseInt(el.style.borderTopWidth):0;
        pos = [box.x - borderLeft, box.y - borderTop];
    }else {   // safari & opera
        pos = [el.offsetLeft, el.offsetTop];
        parent = el.offsetParent;
        if (parent != el) {
            while (parent) {
                pos[0] += parent.offsetLeft;
                pos[1] += parent.offsetTop;
                parent = parent.offsetParent;
            }
        }
        if (ua.indexOf('opera') != -1 || ( ua.indexOf('safari') != -1 && el.style.position == 'absolute' )) {
            pos[0] -= document.body.offsetLeft;
            pos[1] -= document.body.offsetTop;
        }
    }
    if (el.parentNode) {
        parent = el.parentNode;
    } else {
        parent = null;
    }
    while (parent && parent.tagName != 'BODY' && parent.tagName != 'HTML') { // account for any scrolled ancestors
        pos[0] -= parent.scrollLeft;
        pos[1] -= parent.scrollTop;
        if (parent.parentNode) {
            parent = parent.parentNode;
        } else {
            parent = null;
        }
    }
    return {
        x:pos[0], 
        y:pos[1]
    };
}
</script>

		<div style="clear:both;"></div>

		<!-- 商品详情 start -->
		<div class="detail">
			<div class="detail_hd">
				<ul>
					<li class="first"><span>商品介绍</span></li>
					<li class="on"><span>商品评价</span></li>
					<li><span>售后保障</span></li>
				</ul>
			</div>
			<div class="detail_bd">
				<!-- 商品介绍 start -->
				<div class="introduce detail_div none">
					<div class="attr mt15">
<ul>
	<?php if(is_array($singleinfo)): foreach($singleinfo as $key=>$v): ?><li><span><?php echo ($v["attr_name"]); ?>：</span><?php echo ($v["attr_value"]); ?></li><?php endforeach; endif; ?>
</ul>
					</div>

					<div class="desc mt10">
						<!-- 此处的内容 一般是通过在线编辑器添加保存到数据库，然后直接从数据库中读出 -->
						<?php echo ($info["goods_introduce"]); ?>
					</div>
				</div>
				<!-- 商品介绍 end -->
				
				<!-- 商品评论 start -->
				<div class="comment detail_div mt10">
					<div class="comment_summary">
						<div class="rate fl">
							<strong><em>90</em>%</strong> <br />
							<span>好评度</span>
						</div>
						<div class="percent fl">
							<dl>
								<dt>好评（90%）</dt>
								<dd><div style="width:90px;"></div></dd>
							</dl>
							<dl>
								<dt>中评（5%）</dt>
								<dd><div style="width:5px;"></div></dd>
							</dl>
							<dl>
								<dt>差评（5%）</dt>
								<dd><div style="width:5px;" ></div></dd>
							</dl>
						</div>
						<div class="buyer fl">
							<dl>
								<dt>买家印象：</dt>
								<dd><span>屏幕大</span><em>(1953)</em></dd>
								<dd><span>外观漂亮</span><em>(786)</em></dd>
								<dd><span>系统流畅</span><em>(1091)</em></dd>
								<dd><span>功能齐全</span><em>(1109)</em></dd>
								<dd><span>反应快</span><em>(659)</em></dd>
								<dd><span>分辨率高</span><em>(824)</em></dd>
							</dl>
						</div>
					</div>
<input type="hidden" id="cmtcount" value="<?php echo ($cmtcount); ?>" /><!--评论总条数-->
<script type="text/javascript">
//给评论实现ajax无刷新分页效果
$(function(){
	var initPagination = function() {
		var num_entries = $("#cmtcount").val();//记录总条数
		// 创建分页页码列表
		$("#Pagination").pagination(num_entries, {
			num_edge_entries: 1, //边缘页数
			num_display_entries: 4, //主体页数
			callback: pageselectCallback,
			items_per_page:3 //每页显示1条记录信息
		});
	 }();
	 
	function pageselectCallback(page_index, jq){
		//page_index:当前页码-1  的信息
		//根据page_index去获得指定页码的信息  limit  偏移量,长度
		//偏移量：(当前页码-1)*每页显示条数

		var goods_id = $('#goods_id').val();
//通过ajax去服务器端获得"第page_index+1页"评论信息回来
$.ajax({
	url:"/index.php/Home/Comment/getCmtList",
	data:{'page_index':page_index,'goods_id':goods_id},
	dataType:'json',
	type:'get',
	success:function(msg){
		//console.log(msg);
		//遍历msg 使其与html标签结合 并追加给页面
		var s = "";
		$.each(msg,function(n,v){

s += '<div class="comment_items mt10" style="clear:both;"> <div class="user_pic"> <dl> <dt><a href=""><img alt="" src="/Public/Home/images/user1.gif"></a></dt> <dd><a href="">'+v.user_name+'</a></dd> </dl> </div> <div class="item"> <div class="title"> <span>'+v.cmttime+'</span> <strong class="star star'+v.cmt_star+'"></strong> </div> <div class="comment_content"> <dl> <dd>'+v.cmt_msg+'</dd> </dl> </div>'; 

if(typeof v.backinfo !== 'undefined'){
	//判断当前评论有回复信息
	$.each(v.backinfo,function(nn,vv){
	s += '<div style="width:750px; height:40px; background-color:lightblue;margin:auto; padding:2px 3px 0px 3px"> <ul> <li><span style="float:right;">回复时间：'+vv.backtime+'</span><span style="float:left;">回复人：'+vv.user_name+'</span></li> <li style="clear:both;">回复内容：'+vv.back_msg+'</li> </ul> </div> ';
	});
}

s += '<div class="btns" id="btns_'+v.cmt_id+'"> <a id="reply_'+v.cmt_id+'" class="reply" onclick="add_back('+v.cmt_id+')" href="javascript:void(0);">回复(0)</a> <a class="useful" href="">有用(0)</a> </div><div id="cmt_back_box_'+v.cmt_id+'" style="width:350px; height:120px; background-color:pink;float:right;clear:both; display:none;"> <ul style="margin-top:5px;margin-left:3px;"> <li><textarea id="back_msg_'+v.cmt_id+'" style="width:340px;height:80px;"></textarea></li> <li><input type="button" value="提交回复" onclick="send_back('+v.cmt_id+')" /></li> </ul> </div> </div><div class="cornor"></div> </div>';

		});
		//清除旧的div
		$('.comment_items').remove();
		//追加评论(回复)信息新div到页面
		$('.comment_summary').after(s); //给后边追加兄弟节点
	}
});
	}
});


//提交回复 存储给数据库
function send_back(cmt_id){
	//获得“回复”内容
	var back_msg = $('#back_msg_'+cmt_id).val();
	
	//ajax提交回复内容到服务器端存储
	$.ajax({
		url:"/index.php/Home/Comment/sendBack",
		data:{'cmt_id':cmt_id,'back_msg':back_msg},
		dataType:'json',
		type:'post',
		success:function(msg){
			//通过msg回显回复内容到页面
			//使得"msg  与 回复模板标签内容" 结合并显示给页面
			var s = '<div style="width:750px; height:40px; background-color:lightblue;margin:auto; padding:2px 3px 0px 3px;margin-top:2px;"> <ul> <li><span style="float:right;">回复时间：'+msg.backtime+'</span><span style="float:left;">回复人：'+msg.user_name+'</span></li> <li style="clear:both;">回复内容：'+msg.back_msg+'</li> </ul> </div>';
			//追加s到页面(对应的btns的上边)
			$('#btns_'+cmt_id).before(s); //给btns_cmt_id上边追加兄弟节点

			//表单域信息归位
			$('#back_msg_'+cmt_id).val('');
			//隐藏表单域
			$('#cmt_back_box_'+cmt_id).hide();
		}
	});
}

//"回复"操作事件定义
function add_back(cmt_id){
	//判断用户是否的登录系统，具体是ajax去服务器端判断
	$.ajax({
		url:"/index.php/Home/User/isLogin",
		dataType:'json',
		success:function(msg){
			if(msg.flag=='1'){
				//展示回复表单域(用户有登录)
				$('#cmt_back_box_'+cmt_id).show();
			}else{
				//没有登录系统,弹出一个登录页面
				//计算当前“回复”按钮的坐标
				var back_pos = getElementPos('reply_'+cmt_id);//{x:10,y:20}

				//给登录页面设置显示的位置
				$('#login_box').css({'left':back_pos.x-640,'top':back_pos.y-120});
				$('#login_box').show();
			}
		}
	});
}


//实现用户登录系统
function login_back(){
	//① 收集用户信息
	//② ajax传递用户信息到服务器端，判断 并session持久化
	//③ 本页面刷新
	var user_name = $('#user_name').val();
	var user_pwd = $('#user_pwd').val();

	$.ajax({
		url:"/index.php/Home/User/loginBack",
		data:{'user_name':user_name,'user_pwd':user_pwd},
		dataType:'json',
		type:'post',
		success:function(msg){
			if(msg.flag==1){
				//登录系统成功,页面刷新即可
				window.location.href=window.location.href;
			}else{
				//用户名 或 密码有问题
				alert(msg.cont);
			}
		}
	});
}
</script>
<!--制作一个登录的弹出页面-->
<div id="login_box" style="width:590px; height:400px;position:absolute;z-index:9999; 
background-color:lightgreen;display:none;">
	<p>用户名：<input type="text" id="user_name" /></p>
	<p>密码：<input type="password" id="user_pwd" /></p>
	<p><input type="button" value='登录' onclick='login_back()' /></p>
</div>

					<!-- 分页信息 start -->
					<div id="Pagination" class="page mt20">

					</div>
					<!-- 分页信息 end -->

					<!--  评论表单 start-->
					<div class="comment_form mt20">
					<?php if(!empty($_SESSION['user_name'])): ?><ul>
	<li>
		<label for=""> 评分：</label>
		<input type="radio" name="cmt_star" value='5' checked='checked'/> 
		<strong class="star star5"></strong>
		<input type="radio" name="cmt_star" value='4'/> 
		<strong class="star star4"></strong>
		<input type="radio" name="cmt_star" value='3'/> 
		<strong class="star star3"></strong>
		<input type="radio" name="cmt_star" value='2'/> 
		<strong class="star star2"></strong>
		<input type="radio" name="cmt_star" value='1'/> 
		<strong class="star star1"></strong>
	</li>
	<li>
		<label for="">评价内容：</label>
		<textarea name="cmt_msg" id="cmt_msg" style="width:610px;height:130px;"></textarea>
	</li>
	<li>
		<label for="">&nbsp;</label>
		<input type="button" value="提交评论" onclick="add_cmt()" class="comment_btn"/>										
	</li>
</ul>
	<script type="text/javascript">
	//定义事件函数发表评论
	function add_cmt(){
		//① 获得用户的 评论星级、内容、商品id
		var cmt_star = $('[name=cmt_star]:checked').val();
		//富文本编辑器通过以下方式获得内容
		var cmt_msg = UE.getEditor('cmt_msg').getContent();
		var goods_id = $('#goods_id').val();

		//② 通过ajax传递内容到服务器端存储
		$.ajax({
			url:"/index.php/Home/Comment/addCmt",
			data:{'cmt_star':cmt_star,'cmt_msg':cmt_msg,'goods_id':goods_id},
			dataType:'json',
			type:'post',
			success:function(msg){
				//console.log(msg);
				//msg信息 与 html标签 合并 并追加给页面
				var s ='<div class="comment_items mt10"> <div class="user_pic"> <dl> <dt><a href=""><img alt="" src="/Public/Home/images/user1.gif"></a></dt> <dd><a href="">'+msg.user_name+'</a></dd> </dl> </div> <div class="item"> <div class="title"> <span>'+msg.cmttime+'</span> <strong class="star star'+msg.cmt_star+'"></strong> </div> <div class="comment_content"> <dl> <dd>'+msg.cmt_msg+'</dd> </dl> </div> <div class="btns"> <a class="reply" href="">回复(0)</a> <a class="useful" href="">有用(0)</a> </div> </div> <div class="cornor"></div> </div>';

				//追加s到页面
				$('.comment_summary').after(s); //兄弟追加

				//表单信息归位
				$('[name=cmt_star]').val(['5']); //设置value='5'的单选按钮选中
				UE.getEditor('cmt_msg').setContent(''); //富文本编辑器内容清空

				//控制器浏览器滚动条，使得可以立即查看添加的评论内容
				$(document).scrollTop(706);
			}
		});
	}

  	var ue = UE.getEditor('cmt_msg',{toolbars: [[
            'fullscreen', 'source', '|', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|','simpleupload', 'insertimage','rowspacingtop'
        ]]});
	</script>
<?php else: ?>
	请先<a href="<?php echo U('User/login');?>" style='font-size:20px;color:blue;'>登录</a>系统才可以发表评论<?php endif; ?>
					</div>
					<!--  评论表单 end-->
					
				</div>
				<!-- 商品评论 end -->

				<!-- 售后保障 start -->
				<div class="after_sale mt15 none detail_div">
					<div>
						<p>本产品全国联保，享受三包服务，质保期为：一年质保 <br />如因质量问题或故障，凭厂商维修中心或特约维修点的质量检测证明，享受7日内退货，15日内换货，15日以上在质保期内享受免费保修等三包服务！</p>
						<p>售后服务电话：800-898-9006 <br />品牌官方网站：http://www.lenovo.com.cn/</p>

					</div>

					<div>
						<h3>服务承诺：</h3>
						<p>本商城向您保证所售商品均为正品行货，京东自营商品自带机打发票，与商品一起寄送。凭质保证书及京东商城发票，可享受全国联保服务（奢侈品、钟表除外；奢侈品、钟表由本商城联系保修，享受法定三包售后服务），与您亲临商场选购的商品享受相同的质量保证。本商城还为您提供具有竞争力的商品价格和运费政策，请您放心购买！</p> 
						
						<p>注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！</p>

					</div>
					
					<div>
						<h3>权利声明：</h3>
						<p>本商城上的所有商品信息、客户评价、商品咨询、网友讨论等内容，是京东商城重要的经营资源，未经许可，禁止非法转载使用。</p>
						<p>注：本站商品信息均来自于厂商，其真实性、准确性和合法性由信息拥有者（厂商）负责。本站不提供任何保证，并不承担任何法律责任。</p>

					</div>
				</div>
				<!-- 售后保障 end -->

			</div>
		</div>
		<!-- 商品详情 end -->

		
	</div>
	<!-- 商品信息内容 end -->
	

</div>
<!-- 商品页面主体 end -->


<div style="clear:both;"></div>

<script type="text/javascript">
	document.execCommand("BackgroundImageCache", false, true);
</script>


<!--购物车弹出框 样式-->
<style type="text/css">
/*购物车弹出框*/
.orange{color: #CC0000;}
a.bt_orange:link,a.bt_orange:visited{color:#FFFFFF;width:107px; height:27px; line-height:27px;background:url(<?php echo C('IMG_URL');?>chakanBtn.jpg) no-repeat; text-align:center; font-weight:bold;cursor:pointer; display:block; _display:inline; float:left; margin-left:60px;}
a.bt_blue:link,a.bt_blue:visited{color:#FFFFFF;width:107px; height:27px; line-height:27px;background:url(<?php echo C('IMG_URL');?>tiaoxuannBtn.jpg) no-repeat; text-align:center; font-weight:bold;cursor:pointer;display:block;_display:inline; float:right; margin-right:60px;}
.buy_blank{ width:350px; height:115px; border:3px solid #AAAAAA; position:absolute; background-color:#FFFFFF;}
.buy_blank p{ line-height:30px;}
.buy_blank h4{ border-bottom:2px solid #D0D0D0; font-weight:normal; height:30px; line-height:30px;background:url(<?php echo C('IMG_URL');?>buyicon.jpg) no-repeat 10px center; text-indent:28px; margin-bottom:10px; padding-left:20px;}
.buy_blank h4 span{ float:right; margin:10px 10px 0 0}
img, fieldset {border:0 none;}

.number_change{cursor:pointer;}
</style>
<!--购物车弹出框 样式-->
<script type="text/javascript">
function hideElement(idname){
	$("#"+idname).hide();
}
</script>
<!-- 购物车弹出框 -->
<div class="buy_blank" id="cartBox" style="display:none;z-index:99;">
    <h4>
        <span><a href="javascript:;" onclick="hideElement('cartBox')"><img src="<?php echo C('IMG_URL');?>close.jpg" title="点击关闭"/></a></span>
        该商品已成功添加到购物车
    </h4>
    <p style="padding-left:60px;">
        购物车共计 <span class="orange"><strong id="goods_number"><!--<?php echo ($number_price["number"]); ?>--></strong></span> 个商品&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        合计：<span class="orange"><strong id="goods_totalprice"><!--<?php echo ($number_price["price"]); ?>--></strong></span> 元
    </p>
    <p>
        <a href="<?php echo U('Shop/flow1');?>" onclick="javascript:hideElement('cartBox')" class="bt_orange" target="_blank"></a>
        <a href="javascript:hideElement('cartBox')" class="bt_blue"></a>
    </p>
</div>


    <!-- 底部导航 start -->
    <div class="bottomnav w1210 bc mt10">
        <div class="bnav1">
            <h3><b></b> <em>购物指南</em></h3>
            <ul>
                <li><a href="">购物流程</a></li>
                <li><a href="">会员介绍</a></li>
                <li><a href="">团购/机票/充值/点卡</a></li>
                <li><a href="">常见问题</a></li>
                <li><a href="">大家电</a></li>
                <li><a href="">联系客服</a></li>
            </ul>
        </div>
        
        <div class="bnav2">
            <h3><b></b> <em>配送方式</em></h3>
            <ul>
                <li><a href="">上门自提</a></li>
                <li><a href="">快速运输</a></li>
                <li><a href="">特快专递（EMS）</a></li>
                <li><a href="">如何送礼</a></li>
                <li><a href="">海外购物</a></li>
            </ul>
        </div>

        
        <div class="bnav3">
            <h3><b></b> <em>支付方式</em></h3>
            <ul>
                <li><a href="">货到付款</a></li>
                <li><a href="">在线支付</a></li>
                <li><a href="">分期付款</a></li>
                <li><a href="">邮局汇款</a></li>
                <li><a href="">公司转账</a></li>
            </ul>
        </div>

        <div class="bnav4">
            <h3><b></b> <em>售后服务</em></h3>
            <ul>
                <li><a href="">退换货政策</a></li>
                <li><a href="">退换货流程</a></li>
                <li><a href="">价格保护</a></li>
                <li><a href="">退款说明</a></li>
                <li><a href="">返修/退换货</a></li>
                <li><a href="">退款申请</a></li>
            </ul>
        </div>

        <div class="bnav5">
            <h3><b></b> <em>特色服务</em></h3>
            <ul>
                <li><a href="">夺宝岛</a></li>
                <li><a href="">DIY装机</a></li>
                <li><a href="">延保服务</a></li>
                <li><a href="">家电下乡</a></li>
                <li><a href="">京东礼品卡</a></li>
                <li><a href="">能效补贴</a></li>
            </ul>
        </div>
    </div>
    <!-- 底部导航 end -->

    <div style="clear:both;"></div>
    <!-- 底部版权 start -->
    <div class="footer w1210 bc mt10">
        <p class="links">
            <a href="">关于我们</a> |
            <a href="">联系我们</a> |
            <a href="">人才招聘</a> |
            <a href="">商家入驻</a> |
            <a href="">千寻网</a> |
            <a href="">奢侈品网</a> |
            <a href="">广告服务</a> |
            <a href="">移动终端</a> |
            <a href="">友情链接</a> |
            <a href="">销售联盟</a> |
            <a href="">京西论坛</a>
        </p>
        <p class="copyright">
             © 2005-2013 京东网上商城 版权所有，并保留所有权利。  ICP备案证书号:京ICP证070359号 
        </p>
        <p class="auth">
            <a href=""><img src="<?php echo C('IMG_URL');?>xin.png" alt="" /></a>
            <a href=""><img src="<?php echo C('IMG_URL');?>kexin.jpg" alt="" /></a>
            <a href=""><img src="<?php echo C('IMG_URL');?>police.jpg" alt="" /></a>
            <a href=""><img src="<?php echo C('IMG_URL');?>beian.gif" alt="" /></a>
        </p>
    </div>
    <!-- 底部版权 end -->

</body>
</html>