<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 20:58:50
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\yunbuy\progress_cart.html" */ ?>
<?php /*%%SmartyHeaderCode:18030565d998a7a3b06-43698207%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66c72b2b9a8886d602b8371b814c91e9e2fd9731' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\yunbuy\\progress_cart.html',
      1 => 1418901816,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18030565d998a7a3b06-43698207',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'progress' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d998a7c6d99_97476012',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d998a7c6d99_97476012')) {function content_565d998a7c6d99_97476012($_smarty_tpl) {?><div id="progress" class="progress-0<?php echo $_smarty_tpl->tpl_vars['progress']->value;?>
">
    <ul class="fn-clear">
        <li<?php if ($_smarty_tpl->tpl_vars['progress']->value>=1){?> class="dq"<?php }?>><span>1</span><p>提交订单</p></li>
        <li<?php if ($_smarty_tpl->tpl_vars['progress']->value>=2){?> class="dq"<?php }?>><span>2</span><p>支付订单</p></li>
        <li<?php if ($_smarty_tpl->tpl_vars['progress']->value>=3){?> class="dq"<?php }?>><span>3</span><p>获取号码，等待开奖</p></li>
        <li<?php if ($_smarty_tpl->tpl_vars['progress']->value>=4){?> class="dq"<?php }?>><span>4</span><p>揭晓幸运码</p></li>
        <li<?php if ($_smarty_tpl->tpl_vars['progress']->value>=5){?> class="dq"<?php }?>><span>5</span><p>奖品派发</p></li>
    </ul>
</div><?php }} ?>