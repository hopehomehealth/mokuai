<?php /* Smarty version Smarty-3.1.13, created on 2016-04-20 16:14:33
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\yunbuy\progress_cart_buy.html" */ ?>
<?php /*%%SmartyHeaderCode:352757173a69e4e1c5-03907538%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '106f692322d1f021993069f0df6346ee92e252b0' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\yunbuy\\progress_cart_buy.html',
      1 => 1461043313,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '352757173a69e4e1c5-03907538',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'progress' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_57173a69e8b254_19479559',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57173a69e8b254_19479559')) {function content_57173a69e8b254_19479559($_smarty_tpl) {?><div id="progress" class="progress-0<?php echo $_smarty_tpl->tpl_vars['progress']->value;?>
" style="width: 420px;">
    <ul class="fn-clear">
        <li<?php if ($_smarty_tpl->tpl_vars['progress']->value>=1){?> class="dq"<?php }?>><span>1</span><p>提交订单</p></li>
        <li<?php if ($_smarty_tpl->tpl_vars['progress']->value>=2){?> class="dq"<?php }?>><span>2</span><p>支付订单</p></li>
        <li style="background: url('/style/images/225-jdbg.png') no-repeat right 0;" <?php if ($_smarty_tpl->tpl_vars['progress']->value>=5){?> class="dq"<?php }?>><span>3</span><p>支付成功，等待发货</p></li>
    </ul>
</div><?php }} ?>