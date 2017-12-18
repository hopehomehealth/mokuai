<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 10:45:57
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\order\public_form.html" */ ?>
<?php /*%%SmartyHeaderCode:184495660fe82ed10b0-49254492%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c040a546d48c32245e86ca4b3a4f39e126043e4a' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\order\\public_form.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184495660fe82ed10b0-49254492',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660fe8302bf69_17861918',
  'variables' => 
  array (
    'k' => 0,
    'q' => 0,
    'orderstatus' => 0,
    'm' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660fe8302bf69_17861918')) {function content_5660fe8302bf69_17861918($_smarty_tpl) {?><div class="f-unit">    <select name="k" id="k">        <option value="go.order_sn" <?php if ($_smarty_tpl->tpl_vars['k']->value=='go.order_sn'){?>selected<?php }?>>订单号</option>        <option value="goi.goods_name" <?php if ($_smarty_tpl->tpl_vars['k']->value=='goi.goods_name'){?>selected<?php }?>>商品名称</option>        <option value="username" <?php if ($_smarty_tpl->tpl_vars['k']->value=='username'){?>selected<?php }?>>会员名</option>        <option value="nickname" <?php if ($_smarty_tpl->tpl_vars['k']->value=='nickname'){?>selected<?php }?>>昵称</option>        <option value="realname" <?php if ($_smarty_tpl->tpl_vars['k']->value=='realname'){?>selected<?php }?>>真实姓名</option>        <option value="name" <?php if ($_smarty_tpl->tpl_vars['k']->value=='name'){?>selected<?php }?>>收货人</option>    </select>    <input id="q" class="form-i w160 sitem" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" type="text">    <select name="ismoney" id="ismoney">        <option value="">-财务确认-</option>        <option value="1"<?php if (get('ismoney')==1){?> selected="selected"<?php }?>>已确认</option>        <option value="99"<?php if (get('ismoney')==99){?> selected="selected"<?php }?>>未确认</option>    </select>    <select name="order_status" id="order_status">        <option value="">-订单状态-</option>        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['orderstatus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>        <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"<?php if (get('order_status')==$_smarty_tpl->tpl_vars['k']->value){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</option>        <?php } ?>    </select>    <label class="ui-label">下单时间：</label>    <input class="form-i w80 sitem" name="start_time" value="<?php echo get('start_time');?>
" type="text" onclick="WdatePicker()">    <input style="margin-left:-1px" class="form-i w80 sitem" name="end_time" value="<?php echo get('end_time');?>
" type="text" onclick="WdatePicker()">    <label>&nbsp;<input type="checkbox" name="total" value="1" <?php if ($_smarty_tpl->tpl_vars['total']->value==1){?>checked<?php }?> /> 统计</label>    <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue">搜索</button></div><?php }} ?>