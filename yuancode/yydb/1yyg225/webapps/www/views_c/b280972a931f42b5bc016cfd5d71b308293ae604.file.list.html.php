<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 10:48:32
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\block\list.html" */ ?>
<?php /*%%SmartyHeaderCode:13531566120ff748425-49087349%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b280972a931f42b5bc016cfd5d71b308293ae604' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\block\\list.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13531566120ff748425-49087349',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_566120ff820161_94566956',
  'variables' => 
  array (
    'data' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566120ff820161_94566956')) {function content_566120ff820161_94566956($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
]' value='<?php echo $_smarty_tpl->tpl_vars['m']->value['listorder'];?>
' /></td>
</td>
</td>
</td>
&com=xshow|编辑碎片' class='iconfont icon-a' title='编辑'>&#xe603;</a>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>
</div>