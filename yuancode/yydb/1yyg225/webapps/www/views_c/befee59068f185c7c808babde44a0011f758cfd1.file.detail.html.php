<?php /* Smarty version Smarty-3.1.13, created on 2016-05-18 11:21:01
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\order\detail.html" */ ?>
<?php /*%%SmartyHeaderCode:650056d10bf40a0204-24562778%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'befee59068f185c7c808babde44a0011f758cfd1' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\order\\detail.html',
      1 => 1463453674,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '650056d10bf40a0204-24562778',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d10bf42a8b77_57107003',
  'variables' => 
  array (
    'order' => 0,
    'g' => 0,
    'k' => 0,
    'order_logs' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d10bf42a8b77_57107003')) {function content_56d10bf42a8b77_57107003($_smarty_tpl) {?><h3 class="info-tag">
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