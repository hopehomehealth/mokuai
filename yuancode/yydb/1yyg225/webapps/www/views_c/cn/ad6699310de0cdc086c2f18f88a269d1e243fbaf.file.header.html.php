<?php /* Smarty version Smarty-3.1.13, created on 2017-05-09 09:05:11
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/header.html" */ ?>
<?php /*%%SmartyHeaderCode:183378970058451769e50e75-01337767%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad6699310de0cdc086c2f18f88a269d1e243fbaf' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/header.html',
      1 => 1494231582,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183378970058451769e50e75-01337767',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58451769ef6a59_07400269',
  'variables' => 
  array (
    'tagAdw' => 0,
    'tagAds' => 0,
    'm' => 0,
    'site_config' => 0,
    'mobile' => 0,
    'L' => 0,
    'nav' => 0,
    'main' => 0,
    'cartNum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451769ef6a59_07400269')) {function content_58451769ef6a59_07400269($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'content','var'=>'tagAdw','module'=>'ad','id'=>14),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','var'=>'tagAds','source'=>$_smarty_tpl->tpl_vars['tagAdw']->value['images'],'num'=>2),$_smarty_tpl);?>

<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tagAds']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
<div class="full top-banner" <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1){?>onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
'"<?php }?> style="<?php if ($_smarty_tpl->tpl_vars['m']->value['title']){?>cursor: pointer;<?php }?><?php if ($_smarty_tpl->tpl_vars['m']->value['path']){?>background-image: url('<?php echo $_smarty_tpl->tpl_vars['m']->value['path'];?>
');<?php }?>"></div>
<?php } ?>
<div class="full headbg">
    <div class="site-nav">
        <div class="container site-nav-bd">
            <div class="site-nav-bd-l ui-left">多一个选择，多一份惊喜，天天<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
！</div>
            <div class="site-nav-bd-r ui-right">
                <?php if (!$_SESSION['mid']){?>
                <?php if ($_SESSION['oauth']['nickname']){?>
                <a href="<?php echo url('/member/verifymobile');?>
" class="color"><?php echo $_SESSION['oauth']['nickname'];?>
</a>
                [<a href="<?php echo url('/member/doexit');?>
">退出</a>]
                <?php }else{ ?>
                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['wxpc_login']&&$_smarty_tpl->tpl_vars['mobile']->value!=1){?>
                <a href="https://open.weixin.qq.com/connect/qrconnect?appid=<?php echo $_smarty_tpl->tpl_vars['site_config']->value['wxpc_appid'];?>
&redirect_uri=<?php echo urlencode(url(''));?>
&response_type=code&scope=snsapi_login&state=22138#wechat_redirect" class="color"><img src="/style/images/wechat.png" style="vertical-align: middle" /> 微信登录</a>
                <span></span>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['qq_login']){?>
                <a href="javascript:;" onclick="oauth('<?php echo url('/member/oauth/qq?open=1');?>
')" class="color"><img src="/style/images/qq.png" style="vertical-align: middle" /> QQ登录</a>
                <span></span>
                <?php }?>
                <a href="<?php echo url('/member/login');?>
" class="color">请登录</a>
                <span></span>
                <a href="<?php echo url('/member/regist');?>
"><i class="color" style="font-style: normal"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_gift'];?>
</i></a>
                <?php }?>
                <?php }else{ ?>
                <a href="<?php echo url('/member');?>
" class="color"><?php echo $_SESSION['username'];?>
</a>
                [<a href="<?php echo url('/member/doexit');?>
">退出</a>]
                <span></span>
                <a href="<?php echo url('/member');?>
" class="color abg">会员中心</a>
                <span></span>
                <a href="<?php echo url('/member/message');?>
" class="color">站内信（<em id="readNum" style="font-style:normal;">0</em>）</a>
		<?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars["nav"])) {$_smarty_tpl->tpl_vars["nav"] = clone $_smarty_tpl->tpl_vars["nav"];
$_smarty_tpl->tpl_vars["nav"]->value = nav(1); $_smarty_tpl->tpl_vars["nav"]->nocache = null; $_smarty_tpl->tpl_vars["nav"]->scope = 0;
} else $_smarty_tpl->tpl_vars["nav"] = new Smarty_variable(nav(1), null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['nav']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <span> | </span>
                <a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['linkurl'];?>
"<?php if ($_smarty_tpl->tpl_vars['m']->value['isblank']){?> target="_blank"<?php }?><?php if ($_smarty_tpl->tpl_vars['m']->value['rec']==1){?> class="color01"<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a>
                <?php } ?>
                
                <span> | </span>
                <a href="javascript:;" onclick="AddFavorites(document.title, '<?php echo url();?>
')">收藏网站</a>
				<?php if ($_smarty_tpl->tpl_vars['site_config']->value['disk_status']==1){?>
				<span> | </span>
				<a href="/disk/login"  class="topa-hot">我的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_skydrive'];?>
</a>
				<?php }?>
            </div>
        </div>
    </div>
    <div class="container head">
        <h1 class="logo-bd ui-left">
            <a href="<?php echo url();?>
" target="_self" style="text-indent:0;"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['site_config']->value['logo']),$_smarty_tpl);?>
"/></a>
        </h1>
        <div style="float:left;padding:20px 0 0 10px;">
          <img src="/upload/images/app-qrcode.jpg" alt="">
        </div>
        <dl class="logo1">
            <dd>
                <form onsubmit="return searchWord();">
                    <input class="logo1_i1" id="SEARCHQ" name="q" value="<?php if ($_GET['q']){?><?php echo $_GET['q'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['main']->value['search'];?>
<?php }?>" onfocus="if(this.value=='<?php echo $_smarty_tpl->tpl_vars['main']->value['search'];?>
'){ this.value=''; }"  onblur="if(this.value==''){ this.value='<?php echo $_smarty_tpl->tpl_vars['main']->value['search'];?>
'; }" />
                    <button type="submit" class="logo1_i2">搜索</button>
                    <input type="hidden" id="zq" value="<?php echo $_GET['zq'];?>
" />
                </form>
                <script type="text/javascript">
                    function searchWord(){
                        location.href='/yunbuy?zq='+$('#zq').val()+'&q='+encodeURIComponent($('#SEARCHQ').val());
                        return false;
                    }
 		    $(function(){
			var ll=$('#readNum').val();
			if(ll!=undefined){
                    	mread();
                    	window.setInterval(mread, 60000); 
                    	function mread(){
	                    	$.get('/member/ajax_message_read',{},function(data){
	                    		var obj=JSON.parse(data)
	                    		
	                    		$('#readNum').text(obj.num);
	                    	});
                    	}
			}
                    });
                </script>
            </dd>
            <dt class="load_cart">
                <a href="<?php echo url('/yunbuy/cart');?>
" class="logo1_1"><span>购物车</span><em class="cartNumber" id="cartNum"><?php echo $_smarty_tpl->tpl_vars['cartNum']->value;?>
</em></a>
            <div class="cart-box" id="cart_info"></div>
            </dt>
            
            <script>
                $(function(){
                    $('.load_cart').hover(function(){
                        loadCart();
                        $('#cart_info').show();
                    },function(){
                        $('#cart_info').hide();
                    });
                });
            </script>
            
        </dl>
        <!-- <span class="buyers" onclick="location.href='/content/buyRecords'" <?php if ($_smarty_tpl->tpl_vars['site_config']->value['hide_bidCount']||$_smarty_tpl->tpl_vars['site_config']->value['index_skin']==2){?>style="display:none;"<?php }?>>
            <label>累计参与</label>
            <span id="BIDNUMBER"></span>
            <label class="rc">人次<b><s></s></b></label>
        </span> -->
    </div>
</div>

<div class="header">
    <div class="nav-wrap">
        <div class="container nav">
<!--
            <?php if ($_smarty_tpl->tpl_vars['site_config']->value['index_skin']==2){?>
            <div class="nav-title ui-left"><a href="/yunbuy?zq=buy">商品分类</a></div>
            <?php }else{ ?>
            <div class="nav-title ui-left"><a href="/yunbuy"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
分类</a></div>
            <?php }?>
-->
            <div class="nav-title ui-left"><a href="/yunbuy">全部商品</a></div>
            <ul class="nav-main ui-left">
                <?php if (isset($_smarty_tpl->tpl_vars["nav"])) {$_smarty_tpl->tpl_vars["nav"] = clone $_smarty_tpl->tpl_vars["nav"];
$_smarty_tpl->tpl_vars["nav"]->value = nav(3); $_smarty_tpl->tpl_vars["nav"]->nocache = null; $_smarty_tpl->tpl_vars["nav"]->scope = 0;
} else $_smarty_tpl->tpl_vars["nav"] = new Smarty_variable(nav(3), null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['nav']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <li><a href="<?php echo url($_smarty_tpl->tpl_vars['m']->value['linkurl']);?>
"<?php if ($_smarty_tpl->tpl_vars['m']->value['isblank']){?> target="_blank"<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
<?php if ($_smarty_tpl->tpl_vars['m']->value['rec']==1){?><img src="/style/images/t-hot.gif" /><?php }?></a></li>
                <?php } ?>
                <li><a id="contact" href="javascript:;">联系客服</a></li>
            </ul>
        </div>
    </div>
</div>
<div id="contact-customer" style="position: fixed;top: 40%; right: 0; width:74px;height:210px;z-index:999;" class="hidden">
   <a href="javascript:;"><img src="http://www.i1y8.com/upload/images/head.png" alt=""></a>
   <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=1453476146&amp;site=qq&amp;menu=yes" target="_blank"><img src="http://www.i1y8.com/upload/images/1.png" alt="客服咨询" style=""></a>
   <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=2301545830&amp;site=qq&amp;menu=yes" target="_blank"><img src="http://www.i1y8.com/upload/images/2.png" alt="客服咨询" style=""></a>
   <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=1453476146&amp;site=qq&amp;menu=yes" target="_blank"><img src="http://www.i1y8.com/upload/images/3.png" alt="技术服务" style=""></a>
</div>
<script>
$(document).ready(function(){
  $("#contact").click(function(){
    $("#contact-customer").toggleClass("hidden");
  })
})
</script>
<?php }} ?>