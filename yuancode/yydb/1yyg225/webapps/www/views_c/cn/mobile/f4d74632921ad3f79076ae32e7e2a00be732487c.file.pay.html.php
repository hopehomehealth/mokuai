<?php /* Smarty version Smarty-3.1.13, created on 2016-12-14 15:24:56
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/pay.html" */ ?>
<?php /*%%SmartyHeaderCode:3395021705850f3c8f01c71-83826454%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4d74632921ad3f79076ae32e7e2a00be732487c' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/pay.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3395021705850f3c8f01c71-83826454',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order' => 0,
    'payment_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5850f3c9029946_13263432',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5850f3c9029946_13263432')) {function content_5850f3c9029946_13263432($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/member.css">
<div id="content" class="container main">
    <div class="tips-m">
        <p>您的充值金额为：<span class="color01"><?php echo $_smarty_tpl->tpl_vars['order']->value['surplus_amount'];?>
</span></p>
        <?php if ($_smarty_tpl->tpl_vars['payment_info']->value['pay_fee']){?>
        <p>支付手续费用为：<?php echo $_smarty_tpl->tpl_vars['payment_info']->value['pay_fee'];?>
</p>
        <?php }?>
        <p style="margin-bottom: 10px;">您选择的支付方式为：<?php echo $_smarty_tpl->tpl_vars['payment_info']->value['pay_name'];?>
</p>
        <div class="pay_button"><?php echo $_smarty_tpl->tpl_vars['payment_info']->value['pay_button'];?>
</div>
    </div>
</div>
<style type="text/css">
    .pay_button{ text-align: center;}
    .pay_button input{ background: #e54048; border: 0; font-size: 14px; color: #fff; font-weight: bold; padding:10px 20px; margin: 10px 0; cursor: pointer }
</style>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>