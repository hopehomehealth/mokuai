<?php /* Smarty version Smarty-3.1.13, created on 2017-02-14 11:17:17
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/content/windjxajaxindex.html" */ ?>
<?php /*%%SmartyHeaderCode:70927952658579a7249bbc0-15248760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25a35d6c11dc23631a6820e18e59e61e466b1f66' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/content/windjxajaxindex.html',
      1 => 1484103638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70927952658579a7249bbc0-15248760',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58579a72508465_71704829',
  'variables' => 
  array (
    'listDjx' => 0,
    'm' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58579a72508465_71704829')) {function content_58579a72508465_71704829($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['listDjx']->value['list']){?>
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['listDjx']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
">
"><img width="93" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>93,'type'=>0),$_smarty_tpl);?>
"></a></em>
">
"></font></font>
计算中...</font>
<?php if ($_smarty_tpl->tpl_vars['m']->value['title']){?><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
<?php }?>
',"<?php echo $_smarty_tpl->tpl_vars['m']->value['has_time'];?>
",'index_mobile');