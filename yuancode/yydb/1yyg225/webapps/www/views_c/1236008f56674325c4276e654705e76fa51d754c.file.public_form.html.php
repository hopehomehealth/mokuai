<?php /* Smarty version Smarty-3.1.13, created on 2016-12-10 01:56:50
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/order/public_form.html" */ ?>
<?php /*%%SmartyHeaderCode:168355041158452028212353-29314090%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1236008f56674325c4276e654705e76fa51d754c' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/order/public_form.html',
      1 => 1481177938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168355041158452028212353-29314090',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584520282537b4_67021289',
  'variables' => 
  array (
    'k' => 0,
    'business_power' => 0,
    'q' => 0,
    'orderstatus' => 0,
    'm' => 0,
    'publish' => 0,
    'total' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584520282537b4_67021289')) {function content_584520282537b4_67021289($_smarty_tpl) {?><div class="f-unit">    <select name="k" id="k">        <option value="go.order_sn" <?php if ($_smarty_tpl->tpl_vars['k']->value=='go.order_sn'){?>selected<?php }?>>订单号</option>        <option value="goi.goods_name" <?php if ($_smarty_tpl->tpl_vars['k']->value=='goi.goods_name'){?>selected<?php }?>>商品名称</option>        <option value="username" <?php if ($_smarty_tpl->tpl_vars['k']->value=='username'){?>selected<?php }?>>会员名</option>        <option value="nickname" <?php if ($_smarty_tpl->tpl_vars['k']->value=='nickname'){?>selected<?php }?>>昵称</option>        <option value="realname" <?php if ($_smarty_tpl->tpl_vars['k']->value=='realname'){?>selected<?php }?>>真实姓名</option>        <option value="name" <?php if ($_smarty_tpl->tpl_vars['k']->value=='name'){?>selected<?php }?>>收货人</option>        <?php if ($_smarty_tpl->tpl_vars['business_power']->value){?>        <option value="bus_name" <?php if ($_smarty_tpl->tpl_vars['k']->value=='bus_name'){?>selected<?php }?>>商家名称</option>        <?php }?>    </select>    <input id="q" class="form-i w160 sitem" name="q" value="<?php echo $_smarty_tpl->tpl_vars['q']->value;?>
" type="text">    <!--<select name="ismoney" id="ismoney">        <option value="">-财务确认-</option>        <option value="1"<?php if (get('ismoney')==1){?> selected="selected"<?php }?>>已确认</option>        <option value="99"<?php if (get('ismoney')==99){?> selected="selected"<?php }?>>未确认</option>    </select>-->    <select name="order_status" id="order_status">        <option value="">-订单状态-</option>        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['orderstatus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>        <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"<?php if (get('order_status')==$_smarty_tpl->tpl_vars['k']->value){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</option>        <?php } ?>    </select>    <select name="publish">        <option value="">订单来源</option>        <option value="1" <?php if ($_smarty_tpl->tpl_vars['publish']->value==1){?> selected<?php }?>>后台订单</option>        <option value="2" <?php if ($_smarty_tpl->tpl_vars['publish']->value==2){?> selected<?php }?>>商家订单</option>    </select>    <label class="ui-label">下单时间：</label>    <input class="form-i w80 sitem" name="start_time" value="<?php echo get('start_time');?>
" type="text" onclick="WdatePicker()">    <input style="margin-left:-1px" class="form-i w80 sitem" name="end_time" value="<?php echo get('end_time');?>
" type="text" onclick="WdatePicker()">    <label>&nbsp;<input type="checkbox" name="total" value="1" <?php if ($_smarty_tpl->tpl_vars['total']->value==1){?>checked<?php }?> /> 统计</label>    <button type="submit" style="margin-left:10px; margin-top:1px" class="uiBtn BtnBlue">搜索</button></div><?php }} ?>