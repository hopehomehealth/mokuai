<?php /* Smarty version Smarty-3.1.13, created on 2016-12-08 14:07:52
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/yuncat/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:4277238775848f8b8761f11-60726012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82530d15ad16c5352249f5101b4754fb84122947' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/yuncat/edit.html',
      1 => 1468926724,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4277238775848f8b8761f11-60726012',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'select_categorys' => 0,
    'iconfontYC' => 0,
    'k' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5848f8b885ca17_92652870',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5848f8b885ca17_92652870')) {function content_5848f8b885ca17_92652870($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

" />

" />
" />
" />

 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['iconfontYC']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
"><label><input type="radio" name="post[iconfont]" value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['k']->value==$_smarty_tpl->tpl_vars['row']->value['iconfont']){?> checked<?php }?> /> <i class="iconfontYC"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</i></label></li>
" />
" />
</textarea>