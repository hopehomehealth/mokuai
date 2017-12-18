<?php /* Smarty version Smarty-3.1.13, created on 2016-02-26 22:34:09
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\member\pay.html" */ ?>
<?php /*%%SmartyHeaderCode:1020756d06261165a98-20094421%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44aff263ef03541cc6eda11410dd9e77e8f66760' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\member\\pay.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1020756d06261165a98-20094421',
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
  'unifunc' => 'content_56d06261241e40_99798762',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d06261241e40_99798762')) {function content_56d06261241e40_99798762($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
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