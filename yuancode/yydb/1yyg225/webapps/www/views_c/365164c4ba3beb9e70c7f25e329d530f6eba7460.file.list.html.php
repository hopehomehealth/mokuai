<?php /* Smarty version Smarty-3.1.13, created on 2016-07-11 17:39:09
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\manage\payment\list.html" */ ?>
<?php /*%%SmartyHeaderCode:47635783693d696280-34274988%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '365164c4ba3beb9e70c7f25e329d530f6eba7460' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\manage\\payment\\list.html',
      1 => 1467796711,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47635783693d696280-34274988',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5783693d7a65b2_19051531',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5783693d7a65b2_19051531')) {function content_5783693d7a65b2_19051531($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

 $_smarty_tpl->tpl_vars['cod'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['cod']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
]' value='<?php echo $_smarty_tpl->tpl_vars['m']->value['pay_order'];?>
' /></td>
</td>
</td>
</td>

?&com=xshow|编辑<?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
">编辑</a>
','确认卸载<?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
吗？')">卸载</a>
?com=xshow|安装<?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
">安装</a>