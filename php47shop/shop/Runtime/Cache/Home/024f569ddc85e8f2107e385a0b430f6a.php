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
<form action="/index.php/Home/Goods/showlist/cat_id/18" name="serarch" method="get" class="fl">
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

<link rel="stylesheet" href="<?php echo C('CSS_URL');?>list.css" type="text/css">
<script type="text/javascript" src="<?php echo C('JS_URL');?>list.js"></script>

<div style="clear:both;"></div>

<!-- 列表主体 start -->
<div class="list w1210 bc mt10">
	<!-- 面包屑导航 start -->
	<div class="breadcrumb">
		<h2>当前位置：<a href="">首页</a> > <a href="">电脑、办公</a></h2>
	</div>
	<!-- 面包屑导航 end -->

	<!-- 左侧内容 start -->
	<div class="list_left fl mt10">
		<!-- 分类列表 start -->
		<div class="catlist">
			<h2>电脑、办公</h2>
			<div class="catlist_wrap">
				<div class="child">
					<h3 class="on"><b></b>电脑整机</h3>
					<ul>
						<li><a href="">笔记本</a></li>
						<li><a href="">超极本</a></li>
						<li><a href="">平板电脑</a></li>
					</ul>
				</div>

				<div class="child">
					<h3><b></b>电脑配件</h3>
					<ul class="none">
						<li><a href="">CPU</a></li>
						<li><a href="">主板</a></li>
						<li><a href="">显卡</a></li>
					</ul>
				</div>

				<div class="child">
					<h3><b></b>办公打印</h3>
					<ul class="none">
						<li><a href="">打印机</a></li>
						<li><a href="">一体机</a></li>
						<li><a href="">投影机</a></li>
						</li>
					</ul>
				</div>

				<div class="child">
					<h3><b></b>网络产品</h3>
					<ul class="none">
						<li><a href="">路由器</a></li>
						<li><a href="">网卡</a></li>
						<li><a href="">交换机</a></li>
						</li>
					</ul>
				</div>

				<div class="child">
					<h3><b></b>外设产品</h3>
					<ul class="none">
						<li><a href="">鼠标</a></li>
						<li><a href="">键盘</a></li>
						<li><a href="">U盘</a></li>
					</ul>
				</div>
			</div>
			
			<div style="clear:both; height:1px;"></div>
		</div>
		<!-- 分类列表 end -->
			
		<div style="clear:both;"></div>	

		<!-- 新品推荐 start -->
		<div class="newgoods leftbar mt10">
			<h2><strong>新品推荐</strong></h2>
			<div class="leftbar_wrap">
				<ul>
					<li>
						<dl>
							<dt><a href=""><img src="<?php echo C('IMG_URL');?>list_hot1.jpg" alt="" /></a></dt>
							<dd><a href="">美即流金丝语悦白美颜新年装4送3</a></dd>
							<dd><strong>￥777.50</strong></dd>
						</dl>
					</li>

					<li>
						<dl>
							<dt><a href=""><img src="<?php echo C('IMG_URL');?>list_hot2.jpg" alt="" /></a></dt>
							<dd><a href="">领券满399减50 金斯利安多维片</a></dd>
							<dd><strong>￥239.00</strong></dd>
						</dl>
					</li>

					<li class="last">
						<dl>
							<dt><a href=""><img src="<?php echo C('IMG_URL');?>list_hot3.jpg" alt="" /></a></dt>
							<dd><a href="">皮尔卡丹pierrecardin 男士长...</a></dd>
							<dd><strong>￥1240.50</strong></dd>
						</dl>
					</li>
				</ul>
			</div>
		</div>
		<!-- 新品推荐 end -->

		<!--热销排行 start -->
		<div class="hotgoods leftbar mt10">
			<h2><strong>热销排行榜</strong></h2>
			<div class="leftbar_wrap">
				<ul>
					<li></li>
				</ul>
			</div>
		</div>
		<!--热销排行 end -->

		<!-- 最近浏览 start -->
		<div class="viewd leftbar mt10">
			<h2><a href="">清空</a><strong>最近浏览过的商品</strong></h2>
			<div class="leftbar_wrap">
				<dl>
					<dt><a href=""><img src="<?php echo C('IMG_URL');?>hpG4.jpg" alt="" /></a></dt>
					<dd><a href="">惠普G4-1332TX 14英寸笔记...</a></dd>
				</dl>

				<dl class="last">
					<dt><a href=""><img src="<?php echo C('IMG_URL');?>crazy4.jpg" alt="" /></a></dt>
					<dd><a href="">直降200元！TCL正1.5匹空调</a></dd>
				</dl>
			</div>
		</div>
		<!-- 最近浏览 end -->
	</div>
	<!-- 左侧内容 end -->

	<!-- 列表内容 start -->
	<div class="list_bd fl ml10 mt10">
		<!-- 热卖、促销 start -->
		<div class="list_top">
			<!-- 热卖推荐 start -->
			<div class="hotsale fl">
				<h2><strong><span class="none">热卖推荐</span></strong></h2>
				<ul>
					<li>
						<dl>
							<dt><a href=""><img src="<?php echo C('IMG_URL');?>hpG4.jpg" alt="" /></a></dt>
							<dd class="name"><a href="">惠普G4-1332TX 14英寸笔记本电脑 （i5-2450M 2G 5</a></dd>
							<dd class="price">特价：<strong>￥2999.00</strong></dd>
							<dd class="buy"><span>立即抢购</span></dd>
						</dl>
					</li>

					<li>
						<dl>
							<dt><a href=""><img src="<?php echo C('IMG_URL');?>list_hot3.jpg" alt="" /></a></dt>
							<dd class="name"><a href="">ThinkPad E42014英寸笔记本电脑</a></dd>
							<dd class="price">特价：<strong>￥4199.00</strong></dd>
							<dd class="buy"><span>立即抢购</span></dd>
						</dl>
					</li>

					<li>
						<dl>
							<dt><a href=""><img src="<?php echo C('IMG_URL');?>acer4739.jpg" alt="" /></a></dt>
							<dd class="name"><a href="">宏碁AS4739-382G32Mnkk 14英寸笔记本电脑</a></dd>
							<dd class="price">特价：<strong>￥2799.00</strong></dd>
							<dd class="buy"><span>立即抢购</span></dd>
						</dl>
					</li>
				</ul>
			</div>
			<!-- 热卖推荐 end -->

			<!-- 促销活动 start -->
			<div class="promote fl">
				<h2><strong><span class="none">促销活动</span></strong></h2>
				<ul>
					<li><b>.</b><a href="">DIY装机之向雷锋同志学习！</a></li>
					<li><b>.</b><a href="">京东宏碁联合促销送好礼！</a></li>
					<li><b>.</b><a href="">台式机笔记本三月巨惠！</a></li>
					<li><b>.</b><a href="">富勒A53g智能人手识别鼠标</a></li>
					<li><b>.</b><a href="">希捷硬盘白色情人节专场</a></li>
				</ul>

			</div>
			<!-- 促销活动 end -->
		</div>
		<!-- 热卖、促销 end -->
		
		<div style="clear:both;"></div>

		<?php
 echo implode('',$condition_mark); ?>

		<div style="clear:both;"></div>
		
		<!-- 商品筛选 start -->
		<div class="filter mt10">
			<h2><a href="">重置筛选条件</a> <strong>商品筛选</strong></h2>
			<div class="filter_wrap">
				<dl>
					<dt>品牌：</dt>
					<dd class="cur"><a href="">不限</a></dd>
					<dd><a href="">联想（ThinkPad）</a></dd>
					<dd><a href="">联想（Lenovo）</a></dd>
					<dd><a href="">宏碁（acer）</a></dd>
					<dd><a href="">华硕（ASUS）</a></dd>
					<dd><a href="">戴尔（DELL）</a></dd>
					<dd><a href="">索尼（SONY）</a></dd>
					<dd><a href="">惠普（HP）</a></dd>
					<dd><a href="">三星（SAMSUNG）</a></dd>
					<dd><a href="">优派（ViewSonic）</a></dd>
					<dd><a href="">苹果（Apple）</a></dd>
					<dd><a href="">富士通（Fujitsu）</a></dd>
				</dl>

<?php if(empty($_GET['shai_price'])): ?><dl>
	<dt>价格：</dt>
	<dd class="cur"><a href="">不限</a></dd>
	<?php if(is_array($duan_price)): foreach($duan_price as $key=>$v): ?><dd><a href="/index.php/Home/Goods/showlist/cat_id/18/shai_price/<?php echo ($v); ?>" target="_self"><?php echo ($v); ?></a></dd><?php endforeach; endif; ?>
</dl><?php endif; ?>

<!--多选属性展示-->
<?php if(is_array($duo_attrinfo)): foreach($duo_attrinfo as $key=>$v): ?><!--多选属性栏目显示条件：attr_id不在$shai_attrids筛选的attr_ids里边出现-->
<?php if(!in_array(($v['attr_id']), is_array($shai_attrids)?$shai_attrids:explode(',',$shai_attrids))): ?><dl>
	<dt><?php echo ($v["attr_name"]); ?>：</dt>
	<dd class="cur"><a href="">不限</a></dd>
	<?php if(is_array($v["attrval"])): foreach($v["attrval"] as $key=>$vv): ?><dd><a href="/index.php/Home/Goods/showlist/cat_id/18/attrid_<?php echo ($v["attr_id"]); ?>/<?php echo ($vv); ?>"><?php echo ($vv); ?></a></dd><?php endforeach; endif; ?>
</dl><?php endif; endforeach; endif; ?>

			</div>
		</div>
		<!-- 商品筛选 end -->
		
		<div style="clear:both;"></div>

<!-- 排序 start -->
<div class="sort mt10">
	<dl>
		<dt>排序：</dt>
		<dd <?php if(($pai) == "xl"): ?>class="cur"<?php endif; ?> >
			<a href="<?php echo unsetUrlParam('pai,xu');?>/pai/xl">销量</a></dd>
		
		<?php if($pai != 'goods_price'): ?><dd><a href="<?php echo unsetUrlParam('pai,xu');?>/pai/goods_price/xu/desc">价格</a></dd>
		<?php elseif(($pai == 'goods_price') and ($xu == 'asc')): ?>
		<dd class="cur"><a href="<?php echo unsetUrlParam('pai,xu');?>/pai/goods_price/xu/desc">价格(降)</a></dd>
		<?php elseif(($pai == 'goods_price') and ($xu == 'desc')): ?>
		<dd class="cur"><a href="<?php echo unsetUrlParam('pai,xu');?>/pai/goods_price/xu/asc">价格(升)</a></dd><?php endif; ?>

		<dd <?php if(($pai) == "pl"): ?>class="cur"<?php endif; ?>>
			<a href="<?php echo unsetUrlParam('pai,xu');?>/pai/pl">评论数</a></dd>

		<?php if($pai != 'add_time'): ?><dd><a href="<?php echo unsetUrlParam('pai,xu');?>/pai/add_time/xu/desc">上架时间</a></dd>
		<?php elseif(($pai == 'add_time') and ($xu == 'asc')): ?>
		<dd class="cur"><a href="<?php echo unsetUrlParam('pai,xu');?>/pai/add_time/xu/desc">上架时间(降)</a></dd>
		<?php elseif(($pai == 'add_time') and ($xu == 'desc')): ?>
		<dd class="cur"><a href="<?php echo unsetUrlParam('pai,xu');?>/pai/add_time/xu/asc">上架时间(升)</a></dd><?php endif; ?>
	</dl>
</div>
<!-- 排序 end -->
		
		<div style="clear:both;"></div>

		<!-- 商品列表 start-->
		<div class="goodslist mt10">
			<ul>
<?php if(is_array($info)): foreach($info as $key=>$v): ?><li>
	<dl>
		<dt><a href="<?php echo U('detail',array('goods_id'=>$v['goods_id']));?>" target="_blank"><img src="<?php echo C('SITE_URL'); echo (substr($v["goods_small_logo"],2)); ?>" alt="" /></a></dt>
		<dd><a href="<?php echo U('detail',array('goods_id'=>$v['goods_id']));?>" target="_blank"><?php echo ($v["goods_name"]); ?></a></dt>
		<dd><strong>￥<?php echo ($v["goods_price"]); ?></strong></dt>
		<dd><a href=""><em>销量(<?php echo ($v["xl"]); ?>)</em></a></dt>
		<dd><a href=""><em>已有<?php echo ($v["pl"]); ?>个评论</em></a></dt>
		<dd><a href=""><em>时间：<?php echo ($v["add_time"]); ?></em></a></dt>
	</dl>
</li><?php endforeach; endif; ?>
				
			</ul>
		</div>
		<!-- 商品列表 end-->

		<!-- 分页信息 start -->
		<div class="page mt20">
			<a href="">首页</a>
			<a href="">上一页</a>
			<a href="">1</a>
			<a href="">2</a>
			<a href="" class="cur">3</a>
			<a href="">4</a>
			<a href="">5</a>
			<a href="">下一页</a>
			<a href="">尾页</a>&nbsp;&nbsp; 
			<span>
				<em>共8页&nbsp;&nbsp;到第 <input type="text" class="page_num" value="3"/> 页</em>
				<a href="" class="skipsearch" href="javascript:;">确定</a>
			</span>
		</div>
		<!-- 分页信息 end -->

	</div>
	<!-- 列表内容 end -->
</div>
<!-- 列表主体 end-->

<div style="clear:both;"></div>


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