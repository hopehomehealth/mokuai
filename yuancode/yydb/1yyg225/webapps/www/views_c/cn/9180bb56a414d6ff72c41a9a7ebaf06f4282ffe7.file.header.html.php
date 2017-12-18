<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 19:10:53
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\header.html" */ ?>
<?php /*%%SmartyHeaderCode:14188565d803d52cf06-50894383%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9180bb56a414d6ff72c41a9a7ebaf06f4282ffe7' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\header.html',
      1 => 1448879697,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14188565d803d52cf06-50894383',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main' => 0,
    'site_config' => 0,
    'nav' => 0,
    'm' => 0,
    'cartNum' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d803d6230c0_39256845',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d803d6230c0_39256845')) {function content_565d803d6230c0_39256845($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php if ($_smarty_tpl->tpl_vars['main']->value['banner']['src']){?>
<div class="full top-banner" <?php if ($_smarty_tpl->tpl_vars['main']->value['banner']['url']){?>onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['main']->value['banner']['url'];?>
'"<?php }?> style="<?php if ($_smarty_tpl->tpl_vars['main']->value['banner']['url']){?>cursor: pointer;<?php }?><?php if ($_smarty_tpl->tpl_vars['main']->value['banner']['src']){?>background-image: url('/style/images/<?php echo $_smarty_tpl->tpl_vars['main']->value['banner']['src'];?>
');<?php }?>"></div>
<?php }?>
<div class="full headbg">
    <div class="site-nav">
        <div class="container site-nav-bd">
            <div class="site-nav-bd-l ui-left">多一个选择，多一份惊喜，天天<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
！</div>
            <div class="site-nav-bd-r ui-right">
                <?php if (!$_SESSION['mid']){?>
                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['qq_login']){?>
                <a href="javascript:;" onclick="oauth('<?php echo url('/member/oauth/qq?open=1');?>
')" class="color"><img src="/style/images/qq.png" style="vertical-align: middle" /> 使用QQ登录</a>
                <span></span>
                <?php }?>
                <a href="<?php echo url('/member/login');?>
" class="color">请登录</a>
                <span></span>
                <a href="<?php echo url('/member/regist');?>
"><i class="color" style="font-style: normal">注册有礼</i></a>
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
            </div>
        </div>
    </div>
    <div class="container head">
        <h1 class="logo-bd ui-left">
            <a href="<?php echo url();?>
" target="_self" style="text-indent:0;"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['site_config']->value['logo']),$_smarty_tpl);?>
"/></a>
        </h1>
        <h2 class="sub ui-left"><a href="<?php echo url('/content/newbie/yunbuy');?>
"></a></h2>
        <div class="head-r ui-right">
            <div class="search ui-left">
                <div class="search-combobox">
                    <form onsubmit="return searchWord();">
                    <input class="search-input" type="text" placeholder="<?php echo $_smarty_tpl->tpl_vars['main']->value['search'];?>
" id="SEARCHQ" name="q" value="" />
                    <input class="btn-search" type="submit" value="" />
                    </form>
                    <script type="text/javascript">
                        function searchWord(){
                            location.href='/yunbuy?q='+encodeURIComponent($('#SEARCHQ').val());
                            return false;
                        }
                    </script>
                </div>
            </div>
            <div class="load_cart ui-left">
                <div class="cart">
                    <a href="<?php echo url('/yunbuy/cart');?>
" title="购物车">
                        <span class="txt st">清单</span>
                        <strong id="cartNum" class="cartNum"><?php echo $_smarty_tpl->tpl_vars['cartNum']->value;?>
</strong>
                    </a>
                </div>
                <div class="cart-box" id="cart_info"></div>
            </div>
            
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
            
        </div>
    </div>
</div>

<div class="header">
    <div class="nav-wrap">
        <div class="container nav">
            <div class="nav-title ui-left"><a>夺宝分类</a></div>
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
            <div class="buyers" onclick="location.href='/content/buyRecords'">
                <span id="BIDNUMBER"></span>
                人参与
            </div>
        </div>
    </div>
</div><?php }} ?>