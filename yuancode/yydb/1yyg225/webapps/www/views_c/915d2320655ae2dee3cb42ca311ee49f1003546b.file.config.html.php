<?php /* Smarty version Smarty-3.1.13, created on 2016-07-22 16:37:51
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\manage\setting\config.html" */ ?>
<?php /*%%SmartyHeaderCode:17647576a3ed92ae4a1-39737209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '915d2320655ae2dee3cb42ca311ee49f1003546b' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\manage\\setting\\config.html',
      1 => 1469086295,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17647576a3ed92ae4a1-39737209',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_576a3ed94010f7_93730887',
  'variables' => 
  array (
    'btnNo' => 0,
    'field_type' => 0,
    'btnMenu' => 0,
    'k' => 0,
    'm' => 0,
    'images_data' => 0,
    'L' => 0,
    'pc_list' => 0,
    'skin' => 0,
    'mobile_list' => 0,
    'formInfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576a3ed94010f7_93730887')) {function content_576a3ed94010f7_93730887($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
" target="_blank"><?php if ($_smarty_tpl->tpl_vars['m']->value['des']){?>[<?php echo $_smarty_tpl->tpl_vars['m']->value['des'];?>
]<?php }else{ ?>[请点击这里查看位置]<?php }?></a><?php }else{ ?><a target="_blank">[<?php echo $_smarty_tpl->tpl_vars['m']->value['des'];?>
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
 $_from = $_smarty_tpl->tpl_vars['pc_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
"<?php if ($_smarty_tpl->tpl_vars['skin']->value['pc_skin']==$_smarty_tpl->tpl_vars['m']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</option>
 $_from = $_smarty_tpl->tpl_vars['mobile_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
"<?php if ($_smarty_tpl->tpl_vars['skin']->value['mobile_skin']==$_smarty_tpl->tpl_vars['m']->value){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</option>
 $_from = $_smarty_tpl->tpl_vars['formInfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
：</label></td>

')" class='iconfont icon-a' title='删除'>&#xe606;</a><?php }?>
</span>
</div><?php }?>