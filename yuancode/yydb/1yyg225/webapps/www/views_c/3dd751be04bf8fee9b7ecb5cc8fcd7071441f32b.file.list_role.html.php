<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:14:39
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/admin/list_role.html" */ ?>
<?php /*%%SmartyHeaderCode:706654107584521efed5162-77137428%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3dd751be04bf8fee9b7ecb5cc8fcd7071441f32b' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/admin/list_role.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '706654107584521efed5162-77137428',
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
  'unifunc' => 'content_584521eff1f108_32931133',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584521eff1f108_32931133')) {function content_584521eff1f108_32931133($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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