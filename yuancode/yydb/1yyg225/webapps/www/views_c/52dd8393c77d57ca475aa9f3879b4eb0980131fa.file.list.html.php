<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:06:35
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/module/list.html" */ ?>
<?php /*%%SmartyHeaderCode:15497956765845200b66d420-09278151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52dd8393c77d57ca475aa9f3879b4eb0980131fa' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/module/list.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15497956765845200b66d420-09278151',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5845200b6dc0f1_65988182',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5845200b6dc0f1_65988182')) {function content_5845200b6dc0f1_65988182($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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