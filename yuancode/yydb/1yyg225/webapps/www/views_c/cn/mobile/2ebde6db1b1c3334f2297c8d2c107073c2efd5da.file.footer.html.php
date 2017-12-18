<?php /* Smarty version Smarty-3.1.13, created on 2016-06-22 15:49:17
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\cn\mobile\footer.html" */ ?>
<?php /*%%SmartyHeaderCode:21414576a42fd94f6b7-01207386%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ebde6db1b1c3334f2297c8d2c107073c2efd5da' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\cn\\mobile\\footer.html',
      1 => 1466233889,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21414576a42fd94f6b7-01207386',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mod' => 0,
    'L' => 0,
    'cartNum' => 0,
    'site_config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_576a42fd9c9505_35867934',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576a42fd9c9505_35867934')) {function content_576a42fd9c9505_35867934($_smarty_tpl) {?><div class="new-foot1"></div>
<ul class="new-foot">
    <li>
        <a href="<?php echo url();?>
"<?php if ($_smarty_tpl->tpl_vars['mod']->value=='home'){?> class="hover"<?php }?>>
            <em><i class="iconfont icon-zhuye"></i></em>
            <p>首页</p>
        </a>
    </li>
    <li>
        <a href="<?php echo url('/yunbuy');?>
"<?php if ($_smarty_tpl->tpl_vars['mod']->value=='yunbuy'){?> class="hover"<?php }?>>
            <em><i class="iconfont icon-yiyuangoujilu"></i></em>
            <p><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_one'];?>
</p>
        </a>
    </li>
    <li>
        <a href="<?php echo url('/content/win');?>
"<?php if ($_smarty_tpl->tpl_vars['mod']->value=='content'){?> class="hover"<?php }?>>
            <em><i class="iconfont icon-sfsiconyidongduankaijiang"></i></em>
            <p>最新揭奖</p>
        </a>
    </li>
    <li>
        <a href="<?php echo url('/yunbuy/cart');?>
"<?php if ($_smarty_tpl->tpl_vars['mod']->value=='home'){?> class="hover"<?php }?>>
            <em><i class="iconfont icon-gouwuche"></i></em>
            <p>购物车</p>
            <span class=" cartNum" id="cartNum"><?php echo $_smarty_tpl->tpl_vars['cartNum']->value;?>
</span>
        </a>
    </li>
    <li>
        <a href="<?php echo url('/member');?>
"<?php if ($_smarty_tpl->tpl_vars['mod']->value=='member'){?> class="hover"<?php }?>>
            <em><i class="iconfont icon-01huiyuanzhongxin"></i></em>
            <p>我的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</p>
        </a>
    </li>
</ul>

<ul class="foot-fix">
    <?php if (trim($_smarty_tpl->tpl_vars['site_config']->value['ios_url'])||trim($_smarty_tpl->tpl_vars['site_config']->value['and_url'])){?>
    <li class="fix-app"><a href="/content/download">APP</a></li>
    <?php }?>
    <li class="fix-top"><a id="top">TOP</a></li>
</ul>

<iframe name="iframeNews" style="display:none;"></iframe>
<script src="/style/mobile/js/script.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("stat.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>