<?php /* Smarty version Smarty-3.1.13, created on 2016-06-01 15:06:07
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\order\pay.html" */ ?>
<?php /*%%SmartyHeaderCode:30178574e895fbebc20-16254542%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48710f815c9881d025d7cfc043ed56bf441e0fa2' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\order\\pay.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30178574e895fbebc20-16254542',
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
  'unifunc' => 'content_574e895fc65d42_82429726',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574e895fc65d42_82429726')) {function content_574e895fc65d42_82429726($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/member.css">
<div id="content" class="container main">
    <div class="tips-m">
        <p>您的支付金额为：<span class="color01"><?php echo $_smarty_tpl->tpl_vars['order']->value['surplus_amount'];?>
</span></p>
        <?php if ($_smarty_tpl->tpl_vars['payment_info']->value['pay_fee']){?>
        <p>支付手续费用为：<?php echo $_smarty_tpl->tpl_vars['payment_info']->value['pay_fee'];?>
</p>
        <?php }?>
        <p style="margin-bottom: 10px;">您选择的支付方式为：<?php echo $_smarty_tpl->tpl_vars['payment_info']->value['pay_name'];?>
</p>
        <?php echo $_smarty_tpl->tpl_vars['payment_info']->value['pay_button'];?>

    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>