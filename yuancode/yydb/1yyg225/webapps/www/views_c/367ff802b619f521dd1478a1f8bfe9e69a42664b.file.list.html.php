<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 10:49:02
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\linkage\list.html" */ ?>
<?php /*%%SmartyHeaderCode:1310556ce6b9e4b17f7-60469321%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '367ff802b619f521dd1478a1f8bfe9e69a42664b' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\linkage\\list.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1310556ce6b9e4b17f7-60469321',
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
  'unifunc' => 'content_56ce6b9e6066d9_66687362',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ce6b9e6066d9_66687362')) {function content_56ce6b9e6066d9_66687362($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</h3>
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
]' value='<?php echo $_smarty_tpl->tpl_vars['m']->value['listorder'];?>
' /></td>
</td>
</td>
</td>
' class='iconfont icon-a' title='管理子菜单'>&#xe605;</a>
&com=xshow|编辑联动菜单' class='iconfont icon-a' title='编辑'>&#xe603;</a>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>
</div>