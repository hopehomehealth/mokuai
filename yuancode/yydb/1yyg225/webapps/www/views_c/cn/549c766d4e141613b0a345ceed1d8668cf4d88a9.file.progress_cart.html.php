<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 18:11:46
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\cn\yunbuy\progress_cart.html" */ ?>
<?php /*%%SmartyHeaderCode:568356597de2b50cc6-32989978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '549c766d4e141613b0a345ceed1d8668cf4d88a9' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\cn\\yunbuy\\progress_cart.html',
      1 => 1418901816,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '568356597de2b50cc6-32989978',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'progress' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56597de2b83f29_54289504',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56597de2b83f29_54289504')) {function content_56597de2b83f29_54289504($_smarty_tpl) {?><div id="progress" class="progress-0<?php echo $_smarty_tpl->tpl_vars['progress']->value;?>
">
    <ul class="fn-clear">
        <li<?php if ($_smarty_tpl->tpl_vars['progress']->value>=1){?> class="dq"<?php }?>><span>1</span><p>提交订单</p></li>
        <li<?php if ($_smarty_tpl->tpl_vars['progress']->value>=2){?> class="dq"<?php }?>><span>2</span><p>支付订单</p></li>
        <li<?php if ($_smarty_tpl->tpl_vars['progress']->value>=3){?> class="dq"<?php }?>><span>3</span><p>获取号码，等待开奖</p></li>
        <li<?php if ($_smarty_tpl->tpl_vars['progress']->value>=4){?> class="dq"<?php }?>><span>4</span><p>揭晓幸运码</p></li>
        <li<?php if ($_smarty_tpl->tpl_vars['progress']->value>=5){?> class="dq"<?php }?>><span>5</span><p>奖品派发</p></li>
    </ul>
</div><?php }} ?>