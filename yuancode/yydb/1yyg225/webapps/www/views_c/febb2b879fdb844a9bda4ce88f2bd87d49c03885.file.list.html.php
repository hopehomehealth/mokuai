<?php /* Smarty version Smarty-3.1.13, created on 2015-12-04 15:25:50
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\posid\list.html" */ ?>
<?php /*%%SmartyHeaderCode:2567656613ffe7edf75-95138896%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'febb2b879fdb844a9bda4ce88f2bd87d49c03885' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\posid\\list.html',
      1 => 1435210672,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2567656613ffe7edf75-95138896',
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
  'unifunc' => 'content_56613ffe8c4803_75764797',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56613ffe8c4803_75764797')) {function content_56613ffe8c4803_75764797($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
]' value='<?php echo $_smarty_tpl->tpl_vars['m']->value['listorder'];?>
' /></td>
</td>
</td>
&com=xshow|编辑推荐位' class='iconfont icon-a' title='编辑'>&#xe603;</a>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>
</div>