<?php /* Smarty version Smarty-3.1.13, created on 2016-05-24 16:09:04
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\setting\config.html" */ ?>
<?php /*%%SmartyHeaderCode:3905660fd51c6bfd0-85209226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e709ce80872fb54c81ed9a6e4947480a2f22618' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\setting\\config.html',
      1 => 1464076079,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3905660fd51c6bfd0-85209226',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660fd51dcff79_93569272',
  'variables' => 
  array (
    'btnNo' => 0,
    'field_type' => 0,
    'btnMenu' => 0,
    'k' => 0,
    'm' => 0,
    'images_data' => 0,
    'L' => 0,
    'formInfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660fd51dcff79_93569272')) {function content_5660fd51dcff79_93569272($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

" enctype="multipart/form-data">

 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['btnMenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</option>
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['images_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
：</label></td>
" class="form-i w200" />
（规格:<?php echo $_smarty_tpl->tpl_vars['m']->value['guige'];?>
）</span>
" target="_blank"><?php if ($_smarty_tpl->tpl_vars['k']->value=='ico'){?>[请点击这里生成]<?php }else{ ?>[请点击这里查看位置]<?php }?></a><?php }else{ ?><a target="_blank">[<?php echo $_smarty_tpl->tpl_vars['m']->value['des'];?>
]</a><?php }?><a href="/<?php echo $_smarty_tpl->tpl_vars['m']->value['address'];?>
<?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
" target="_blank">[请点击查看图片]</a></div>
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['L']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
：</label></td>
]" value="<?php echo $_smarty_tpl->tpl_vars['m']->value;?>
" class="form-i w300" />
 $_from = $_smarty_tpl->tpl_vars['formInfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
：</label></td>

')" class='iconfont icon-a' title='删除'>&#xe606;</a><?php }?>
</span>
</div><?php }?>