<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 17:12:57
         compiled from "F:\WWW\1yyg225\webapps\www\views\cn\mobile\footer.html" */ ?>
<?php /*%%SmartyHeaderCode:12632565d6499009bb8-62511883%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b7f27fec736ef322f4a0be21433cb0021c9386b' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\cn\\mobile\\footer.html',
      1 => 1435071292,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12632565d6499009bb8-62511883',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'site_config' => 0,
    'cartNum' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d64990612a6_05953538',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d64990612a6_05953538')) {function content_565d64990612a6_05953538($_smarty_tpl) {?><footer id="footer" class="container">
    <div class="f-nav ui-clr">
        <ul>
            <li><a href="<?php echo url('');?>
">首页</a></li>
            <li><a href="<?php echo url('/content/index/42');?>
">新手指南</a></li>
            <?php if (!$_SESSION['mid']){?>
            <li><a href="<?php echo url('/member/login');?>
">登录</a></li>
            <li><a href="<?php echo url('/member/regist');?>
">注册</a></li>
            <?php }else{ ?>
            <li><a href="<?php echo url('/member');?>
">会员中心</a></li>
            <li><a href="<?php echo url('/member/doexit');?>
">退出登录</a></li>
            <?php }?>
        </ul>
    </div>
    <div class="copyright">
        <p class="fmenu">
            <a href="http://m.<?php echo @constant('Domain');?>
">触屏版</a>
            <a href="http://<?php echo @constant('Domain');?>
?tpl=pc">电脑版</a>
        </p>
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'block','mark'=>'footer_mobile'),$_smarty_tpl);?>

        <p>客服电话：<span class="color"><?php echo $_smarty_tpl->tpl_vars['site_config']->value['tel'];?>
</span></p>
        <?php echo $_smarty_tpl->getSubTemplate ("cnzz.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</footer>

<button id="top" class="ap-icon icon-top"></button>
<a class="mini-cart" href="<?php echo url('/yunbuy/cart');?>
">
    <span class="miniCart-txt"></span>
    <i class="ap-icon icon-cart-max"></i>
    <b class="miniCart-count cartNum" id="cartNum"><?php echo $_smarty_tpl->tpl_vars['cartNum']->value;?>
</b>
</a>

<iframe name="iframeNews" style="display:none;"></iframe>
<script src="/style/mobile/js/script.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("stat.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>