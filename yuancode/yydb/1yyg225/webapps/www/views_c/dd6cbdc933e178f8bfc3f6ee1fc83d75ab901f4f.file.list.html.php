<?php /* Smarty version Smarty-3.1.13, created on 2016-05-17 10:54:41
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\order\list.html" */ ?>
<?php /*%%SmartyHeaderCode:123445660fe829359e6-01890875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd6cbdc933e178f8bfc3f6ee1fc83d75ab901f4f' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\order\\list.html',
      1 => 1463453674,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123445660fe829359e6-01890875',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660fe82e85aa6_79627673',
  'variables' => 
  array (
    'btnMenu' => 0,
    'btnNo' => 0,
    'key' => 0,
    'm' => 0,
    'data' => 0,
    'list' => 0,
    'g' => 0,
    'goodsForm' => 0,
    'k' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660fe82e85aa6_79627673')) {function content_5660fe82e85aa6_79627673($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\test1yyg3.lnest.com\\system\\smarty\\plugins\\modifier.date_format.php';
?><h3 class="info-tag">
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['btnMenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
"<?php if ($_smarty_tpl->tpl_vars['m']->value['str']){?> <?php echo $_smarty_tpl->tpl_vars['m']->value['str'];?>
<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</a>

</b>
</b>
</b>
</b>
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
</span><span class="c-gray">（<?php echo $_smarty_tpl->tpl_vars['m']->value['order_code'];?>
<?php if ($_smarty_tpl->tpl_vars['m']->value['cod_time']){?> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['cod_time'],'Y-m-d H:i');?>
<?php }?>）</span> ，
</span>
?com=xshow|订单详情(<?php echo $_smarty_tpl->tpl_vars['m']->value['order_sn'];?>
)"><i class="iconfont">&#xe601;</i><span>订单详情</span></a>
</span>
</span><?php }?>
</b><?php }?>
</span>
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['m']->value['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
$_smarty_tpl->tpl_vars['g']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['g']->key;
?>
" style="width:70px" /></td>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['g']->value['goods_name'];?>
</a></div>
</div>

<br>
<br>
<br>
<br>
">
[<?php echo $_smarty_tpl->tpl_vars['m']->value['mobile'];?>
]</div>
 <?php echo $_smarty_tpl->tpl_vars['m']->value['deliver'];?>
</div><?php }?>
[<?php echo $_smarty_tpl->tpl_vars['m']->value['express_num'];?>
]</div><?php }?>
</div><?php }?>
" style="line-height:18px;">
<br />
</b>
','goods_order','ismoney')" class='iconfont icon-a c-green' title="点击设置为财务未确认">&#xe648;</a>-->
','goods_order','ismoney')" class='iconfont icon-a c-gray' title="点击财务确认">&#xe648;</a>-->
">调整价格</a>-->
">
#share#vid=<?php echo $_smarty_tpl->tpl_vars['m']->value['share_id'];?>
" target="_blank">已晒单</a><br>
<br>
">取消订单</a><br>
">收到货款</a>-->
<br>
?com=xshow|发货" class="uiBtn BtnGreen BtnXs">发货</a>
<br>
">查看物流</a>
&nu=<?php echo $_smarty_tpl->tpl_vars['m']->value['express_num'];?>
" target="_blank" class="uiBtn BtnOrange BtnXs">查看物流</a>
<br>
<br>
if (!$_smarty_tpl->tpl_vars['m']->_loop) {
?>
</div>