<?php /* Smarty version Smarty-3.1.13, created on 2016-12-08 09:38:45
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/block/list.html" */ ?>
<?php /*%%SmartyHeaderCode:1864096055848b9a51862b4-34577890%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19ab9b7841c0b7afc39e22f6e5a95f1b69aebdfb' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/block/list.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1864096055848b9a51862b4-34577890',
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
  'unifunc' => 'content_5848b9a51ff320_21167813',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5848b9a51ff320_21167813')) {function content_5848b9a51ff320_21167813($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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