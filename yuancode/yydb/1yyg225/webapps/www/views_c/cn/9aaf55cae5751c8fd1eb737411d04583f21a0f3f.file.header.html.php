<?php /* Smarty version Smarty-3.1.13, created on 2016-06-21 10:34:49
         compiled from "E:\projects\web\1yyg\1yyg225_0016\webapps\www\views\cn\header.html" */ ?>
<?php /*%%SmartyHeaderCode:125765768a7c92d3e01-78112372%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9aaf55cae5751c8fd1eb737411d04583f21a0f3f' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_0016\\webapps\\www\\views\\cn\\header.html',
      1 => 1464595851,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125765768a7c92d3e01-78112372',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tagAdw' => 0,
    'tagAds' => 0,
    'm' => 0,
    'site_config' => 0,
    'L' => 0,
    'nav' => 0,
    'main' => 0,
    'cartNum' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5768a7c93ea0b1_78232359',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5768a7c93ea0b1_78232359')) {function content_5768a7c93ea0b1_78232359($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
                <?php if ($_SESSION['oauth']['type']=='qq'&&$_SESSION['oauth']['nickname']){?>
                <a href="<?php echo url('/member/verifymobile');?>
" class="color"><img src="/style/images/qq.png" style="vertical-align: middle" /> <?php echo $_SESSION['oauth']['nickname'];?>
</a>
                <?php }else{ ?>
                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['qq_login']){?>
                <a href="javascript:;" onclick="oauth('<?php echo url('/member/oauth/qq?open=1');?>
')" class="color"><img src="/style/images/qq.png" style="vertical-align: middle" /> 使用QQ登录</a>
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
				<span> | </span>
				<a href="/disk/login"  class="topa-hot">我的网盘</a>
            </div>
        </div>
    </div>
    <div class="container head">
        <h1 class="logo-bd ui-left">
            <a href="<?php echo url();?>
" target="_self" style="text-indent:0;"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['site_config']->value['logo']),$_smarty_tpl);?>
"/></a>
        </h1>
        <dl class="logo1">
            <dd>
                <form onsubmit="return searchWord();">
                    <input class="logo1_i1" id="SEARCHQ" name="q" value="<?php if ($_GET['q']){?><?php echo $_GET['q'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['main']->value['search'];?>
<?php }?>" onfocus="if(this.value=='<?php echo $_smarty_tpl->tpl_vars['main']->value['search'];?>
'){ this.value=''; }"  onblur="if(this.value==''){ this.value='<?php echo $_smarty_tpl->tpl_vars['main']->value['search'];?>
'; }" />
                    <input type="submit" class="logo1_i2" />
                </form>
                <script type="text/javascript">
                    function searchWord(){
                        location.href='/yunbuy?q='+encodeURIComponent($('#SEARCHQ').val());
                        return false;
                    }
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
        <a class="buyers" onclick="location.href='/content/buyRecords'">
            <label>累计参与</label>
            <span id="BIDNUMBER"></span>
            <label class="rc">人次<b><s></s></b></label>
        </a>
    </div>
</div>

<div class="header">
    <div class="nav-wrap">
        <div class="container nav">
            <div class="nav-title ui-left"><a href="/yunbuy"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
分类</a></div>
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
            </ul>
        </div>
    </div>
</div><?php }} ?>