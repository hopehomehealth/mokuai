<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 10:48:31
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\module\list.html" */ ?>
<?php /*%%SmartyHeaderCode:105815660ff50ae7e74-99664276%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c89446b6600d1e2db5f9e3142dc3892d2201dc9' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\module\\list.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105815660ff50ae7e74-99664276',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660ff50c1d144_11349920',
  'variables' => 
  array (
    'data' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660ff50c1d144_11349920')) {function content_5660ff50c1d144_11349920($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
]' value='<?php echo $_smarty_tpl->tpl_vars['m']->value['listorder'];?>
' /></td>
</td>
</td>
</td>
</td>
</td>
','module')" class="c-green" title="点击禁用">开启</a>
','module')" class="c-red" title="点击开启">禁用</a>
" class='iconfont icon-a' title='字段管理'>&#xe605;</a>
&com=xshow|编辑模型' class='iconfont icon-a' title='编辑'>&#xe603;</a>
')" class='iconfont icon-a' title='删除'>&#xe606;</a>