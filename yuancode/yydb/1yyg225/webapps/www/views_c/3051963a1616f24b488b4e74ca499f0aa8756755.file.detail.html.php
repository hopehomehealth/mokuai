<?php /* Smarty version Smarty-3.1.13, created on 2016-12-19 17:58:31
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/order/detail.html" */ ?>
<?php /*%%SmartyHeaderCode:9332645695857af470dc262-49491044%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3051963a1616f24b488b4e74ca499f0aa8756755' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/order/detail.html',
      1 => 1481178229,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9332645695857af470dc262-49491044',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order' => 0,
    'g' => 0,
    'k' => 0,
    'order_logs' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5857af471b71a1_48656938',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5857af471b71a1_48656938')) {function content_5857af471b71a1_48656938($_smarty_tpl) {?><h3 class="info-tag">
</span>，下单时间：<span class="order-date"><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['order']->value['c_time']);?>
</span>
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['order']->value['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
$_smarty_tpl->tpl_vars['g']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['g']->key;
?>
" style="width:70px" /></td>
</div>

&com=xshow|修改订单商品(<?php echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
)' class='uiBtn'>修改商品备注</a></p>
</div>
</td>
</td>
">售后/投诉</td>
">买家：<?php echo $_smarty_tpl->tpl_vars['order']->value['m_username'];?>


">
</b>
<?php echo $_smarty_tpl->tpl_vars['order']->value['deliver']['city_name'];?>
<?php echo $_smarty_tpl->tpl_vars['order']->value['deliver']['district_name'];?>
</span>
</span>
-<?php echo $_smarty_tpl->tpl_vars['order']->value['deliver']['mobile'];?>
(<?php echo $_smarty_tpl->tpl_vars['order']->value['deliver']['zipcode'];?>
)</span>
<br>
<br>

&nu=<?php echo $_smarty_tpl->tpl_vars['order']->value['express_num'];?>
" target="_blank" class="uiBtn BtnOrange BtnXs">查看物流</a><br>
<br><?php }?>
 $_from = $_smarty_tpl->tpl_vars['order_logs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
:</span>
</span>
</span></div>
">取消订单</a>
&com=xshow|修改订单信息(<?php echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
)" class="uiBtn">修改订单</a>
">确认收货</a>