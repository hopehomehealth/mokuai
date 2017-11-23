<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>登录商城</title>
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>base.css" type="text/css">
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>global.css" type="text/css">
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>header.css" type="text/css">
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>login.css" type="text/css">
    <link rel="stylesheet" href="<?php echo C('CSS_URL');?>footer.css" type="text/css">

    <script type="text/javascript" src="<?php echo C('JS_URL');?>jquery-1.8.3.min.js"></script>
</head>
<body>
    <!-- 顶部导航 start -->
    <div class="topnav">
        <div class="topnav_bd w990 bc">
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

    <!-- 页面头部 start -->
    <div class="header w990 bc mt15">
        <div class="logo w990">
            <h2 class="fl"><a href="index.html"><img src="<?php echo C('IMG_URL');?>logo.png" alt="京西商城"></a></h2>

            <?php if((CONTROLLER_NAME) == "Shop"): ?><div class="flow fr <?php echo (ACTION_NAME); ?>">
    <ul>
        <li <?php if((ACTION_NAME) == "flow1"): ?>class="cur"<?php endif; ?>>1.我的购物车</li>
        <li <?php if((ACTION_NAME) == "flow2"): ?>class="cur"<?php endif; ?>>2.填写核对订单信息</li>
        <li <?php if((ACTION_NAME) == "flow3"): ?>class="cur"<?php endif; ?>>3.成功提交订单</li>
    </ul>
</div><?php endif; ?>

        </div>
    </div>
    <!-- 页面头部 end -->





	<link rel="stylesheet" href="<?php echo C('CSS_URL');?>cart.css" type="text/css">
	
	<div style="clear:both;"></div>

	<!-- 主体部分 start -->
	<div class="mycart w990 mt10 bc">
		<h2><span>我的购物车</span></h2>
		<table>
			<thead>
				<tr>
					<th class="col1">商品名称</th>
					<th class="col3">单价</th>
					<th class="col4">数量</th>	
					<th class="col5">小计</th>
					<th class="col6">操作</th>
				</tr>
			</thead>
			<tbody>

<?php if(is_array($cartinfo)): foreach($cartinfo as $key=>$v): ?><tr>
	<td class="col1"><a href=""><img src="<?php echo C('SITE_URL'); echo ($picTmp[$v['goods_id']]); ?>" alt="" /></a>  <strong><a href=""><?php echo ($v["goods_name"]); ?></a></strong></td>
	<td class="col3">￥<span><?php echo ($v["goods_price"]); ?></span></td>
	<td class="col4"> 
		<a href="javascript:;" class="reduce_num" onclick="change_number('red',<?php echo ($v["goods_id"]); ?>)"></a>
		<input type="text" id="shuliang_<?php echo ($v["goods_id"]); ?>" name="amount" value="<?php echo ($v["goods_buy_number"]); ?>" class="amount"  onblur="change_number('mod',<?php echo ($v["goods_id"]); ?>)" />
		<a href="javascript:;" class="add_num" onclick="change_number('add',<?php echo ($v["goods_id"]); ?>)"></a>
	</td>
	<td class="col5">￥<span id="xiaoji_<?php echo ($v["goods_id"]); ?>"><?php echo ($v["goods_total_price"]); ?></span></td>
	<td class="col6"><a href="">删除</a></td>
</tr><?php endforeach; endif; ?>


			</tbody>
			<tfoot>
				<tr>
					<td colspan="6">购物金额总计： <strong>￥ <span id="total"><?php echo ($numberprice["price"]); ?></span></strong></td>
				</tr>
			</tfoot>
		</table>
		<div class="cart_btn w990 bc mt10">
			<a href="" class="continue">继续购物</a>
			<a href="<?php echo U('Shop/flow2');?>" class="checkout">结 算</a>
		</div>
	</div>
	<!-- 主体部分 end -->

	<div style="clear:both;"></div>

<script type="text/javascript">
//购物车单个商品数量发生变化
//参数：
//flag = red数量减少   add增加数量  mod手动修改数量
//goods_id  被修改数量的商品id
function change_number(flag,goods_id){
	var num = $('#shuliang_'+goods_id).val();//获取原数量
	if(flag==='add'){
		//数量增减
		num++;
	}else if(flag==='red'){
		//数量增减
		if(num<2){
			alert('商品数量必须大于1个，否则请删除之');
			return false;
		}
		num--;
	}else if(flag==='mod'){
		//手动修改数量,数量介于1-20之间
		var reg = /^([1-9]|1\d|20)$/;
		if(num.match(reg)===null){
			alert('手动修改的数量不合法');
			window.location.href = window.location.href; //浏览器更新
			return false;
		}
	}else{
		alert('参数错误，请联系系统管理员');
		return false;
	}

	//调用Ajax实现数量修改
	$.ajax({
		url:"<?php echo U('Shop/changeNumber');?>",
		data:{'num':num,'goods_id':goods_id},
		dataType:'json',
		Type:'get',
		success:function(msg){
			//把小计价格 和 总价格 显示给页面
			$('#xiaoji_'+goods_id).html(msg.xiaoji);
			$('#total').html(msg.zongji);
			$('#shuliang_'+goods_id).val(num);//更新商品的数量
		}
	});
}
</script>

    <!-- 底部版权 start -->
    <div class="footer w1210 bc mt15">
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