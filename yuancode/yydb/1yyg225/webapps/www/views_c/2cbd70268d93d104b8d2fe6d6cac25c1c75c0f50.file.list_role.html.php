<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 11:50:55
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\admin\list_role.html" */ ?>
<?php /*%%SmartyHeaderCode:5525660fbfa6bc8d2-04222217%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2cbd70268d93d104b8d2fe6d6cac25c1c75c0f50' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\admin\\list_role.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5525660fbfa6bc8d2-04222217',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660fbfa7d5b63_62056660',
  'variables' => 
  array (
    'data' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660fbfa7d5b63_62056660')) {function content_5660fbfa7d5b63_62056660($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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