<?php /* Smarty version Smarty-3.1.13, created on 2016-05-14 14:27:42
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\content\windjxajax.html" */ ?>
<?php /*%%SmartyHeaderCode:623356610b46e425b0-98224456%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be160a6bd1260cbe87bc1505fb30f50ca3af8b43' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\content\\windjxajax.html',
      1 => 1462849536,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '623356610b46e425b0-98224456',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56610b47094172_70367126',
  'variables' => 
  array (
    'listDjx' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56610b47094172_70367126')) {function content_56610b47094172_70367126($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['listDjx']->value['list']){?>
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['listDjx']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
" q="<?php echo $_smarty_tpl->tpl_vars['m']->value['qihao'];?>
">
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>110,'type'=>0),$_smarty_tpl);?>
" /></a><em></em>
">(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></p>
<?php }else{ ?><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['g_price']);?>
<?php }?></span>
"></font>
',"<?php echo $_smarty_tpl->tpl_vars['m']->value['has_time'];?>
",'mobile');