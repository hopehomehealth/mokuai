<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 17:50:35
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\manage\yunbuy\order.html" */ ?>
<?php /*%%SmartyHeaderCode:21425565978eb821534-35199816%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7aad77ae183ea56d6c4c0d11b900103bbc170369' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\manage\\yunbuy\\order.html',
      1 => 1446429849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21425565978eb821534-35199816',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'k' => 0,
    'q' => 0,
    'status' => 0,
    'is_award' => 0,
    'total' => 0,
    'data' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565978eb976712_66473643',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565978eb976712_66473643')) {function content_565978eb976712_66473643($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'H:\\projects\\web\\lnest02\\1yyg\\system\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

" type="text">
" type="text" onclick="WdatePicker()">
" type="text" onclick="WdatePicker()">
</b> 商品总价: ￥<b><?php echo $_smarty_tpl->tpl_vars['total']->value['price_amount'];?>
</b>
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
</td>
" width="50" /></td>
期) <a href="<?php echo ('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']);?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
</a> <?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?><span style="background: #00A47C; color: #fff; padding: 0 3px;">赠币专区</span><?php }?></td>
</td>
</td>
</td>
</td>
</td>
&com=xshow|订单详细'>详情</a>
","yundb","is_show","id")' title='点击设为隐藏'>显示</a>
","yundb","is_show","id")' title='点击设为显示'>隐藏</a>
","yundb","fdis","id")' title='点击设为允许'>永不失效</a>
","yundb","fdis","id")' title='点击设为永不失效'>允许失效</a>
</div>