<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 11:49:43
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\payment\list.html" */ ?>
<?php /*%%SmartyHeaderCode:183255660fd5dd9d499-19370734%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c4020b0f807acfc72145c5ce35b48bd01234416' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\payment\\list.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183255660fd5dd9d499-19370734',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660fd5e005914_25396457',
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660fd5e005914_25396457')) {function content_5660fd5e005914_25396457($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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