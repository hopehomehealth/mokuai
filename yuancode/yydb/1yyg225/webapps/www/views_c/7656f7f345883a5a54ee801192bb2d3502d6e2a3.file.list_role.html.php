<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 16:23:50
         compiled from "F:\WWW\1yyg225\webapps\www\views\manage\admin\list_role.html" */ ?>
<?php /*%%SmartyHeaderCode:22595565d5916beff54-35292380%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7656f7f345883a5a54ee801192bb2d3502d6e2a3' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\manage\\admin\\list_role.html',
      1 => 1435210411,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22595565d5916beff54-35292380',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d5916ccbb28_28217509',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d5916ccbb28_28217509')) {function content_565d5916ccbb28_28217509($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
]' value='<?php echo $_smarty_tpl->tpl_vars['m']->value['listorder'];?>
' /></td>
</td>
</td>
&com=xshow|编辑角色(<?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
)' class='iconfont icon-a' title='编辑'>&#xe603;</a>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>
</div>