<?php /* Smarty version Smarty-3.1.13, created on 2017-01-11 11:00:48
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/setting/config.html" */ ?>
<?php /*%%SmartyHeaderCode:10006543858452119594ef9-04372946%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd249910f72ed3221eee4df90323ed1970d72fc5' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/setting/config.html',
      1 => 1484103638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10006543858452119594ef9-04372946',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58452119835e60_59267536',
  'variables' => 
  array (
    'btnNo' => 0,
    'field_type' => 0,
    'btnMenu' => 0,
    'k' => 0,
    'm' => 0,
    'images_data' => 0,
    'LC' => 0,
    'L' => 0,
    'pc_list' => 0,
    'skin' => 0,
    'mobile_list' => 0,
    'formInfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58452119835e60_59267536')) {function content_58452119835e60_59267536($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
<?php }?>" target="_blank"><?php if ($_smarty_tpl->tpl_vars['m']->value['des']){?>[<?php echo $_smarty_tpl->tpl_vars['m']->value['des'];?>
]<?php }else{ ?>[请点击这里查看位置]<?php }?></a><?php }else{ ?><a target="_blank">[<?php echo $_smarty_tpl->tpl_vars['m']->value['des'];?>
]</a><?php }?><a href="<?php echo @constant('RootUrl');?>
<?php echo $_smarty_tpl->tpl_vars['m']->value['address'];?>
<?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
" target="_blank">[请点击查看图片]</a></div>
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['LC']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
：</label></td>
]" value="<?php if ($_smarty_tpl->tpl_vars['L']->value[$_smarty_tpl->tpl_vars['k']->value]){?><?php echo $_smarty_tpl->tpl_vars['L']->value[$_smarty_tpl->tpl_vars['k']->value];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
<?php }?>" class="form-i w300" />
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
?skin=theme_01‘可临时切换模板，theme_01为切换的模板名称</span>
 $_from = $_smarty_tpl->tpl_vars['formInfo']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
：</label></td>

')" class='iconfont icon-a' title='删除'>&#xe606;</a><?php }?>
</span>
</div><?php }?>