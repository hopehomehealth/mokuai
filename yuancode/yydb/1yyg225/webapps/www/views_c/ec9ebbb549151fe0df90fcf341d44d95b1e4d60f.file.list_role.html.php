<?php /* Smarty version Smarty-3.1.13, created on 2016-07-22 16:38:06
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\manage\admin\list_role.html" */ ?>
<?php /*%%SmartyHeaderCode:78815791db6e77aaf9-88630416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec9ebbb549151fe0df90fcf341d44d95b1e4d60f' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\manage\\admin\\list_role.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78815791db6e77aaf9-88630416',
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
  'unifunc' => 'content_5791db6e7f3c96_13993223',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5791db6e7f3c96_13993223')) {function content_5791db6e7f3c96_13993223($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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