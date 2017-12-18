<?php /* Smarty version Smarty-3.1.13, created on 2016-12-10 01:43:59
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/progress_cart.html" */ ?>
<?php /*%%SmartyHeaderCode:1087134415584aed5f732105-42903755%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f550e6c7c68ed2db0609039207bc5f16bcfdabed' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/progress_cart.html',
      1 => 1461032856,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1087134415584aed5f732105-42903755',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'progress' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584aed5f791c37_75390945',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584aed5f791c37_75390945')) {function content_584aed5f791c37_75390945($_smarty_tpl) {?><div id="progress" class="progress-0<?php echo $_smarty_tpl->tpl_vars['progress']->value;?>
">
    <ul class="fn-clear">
        <li<?php if ($_smarty_tpl->tpl_vars['progress']->value>=1){?> class="dq"<?php }?>><span>1</span><p>提交订单</p></li>
        <li<?php if ($_smarty_tpl->tpl_vars['progress']->value>=2){?> class="dq"<?php }?>><span>2</span><p>支付订单</p></li>
        <li<?php if ($_smarty_tpl->tpl_vars['progress']->value>=3){?> class="dq"<?php }?>><span>3</span><p>支付成功，等待揭晓</p></li>
        <li<?php if ($_smarty_tpl->tpl_vars['progress']->value>=4){?> class="dq"<?php }?>><span>4</span><p>揭晓幸运码</p></li>
        <li<?php if ($_smarty_tpl->tpl_vars['progress']->value>=5){?> class="dq"<?php }?>><span>5</span><p><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_price'];?>
派发</p></li>
    </ul>
</div><?php }} ?>