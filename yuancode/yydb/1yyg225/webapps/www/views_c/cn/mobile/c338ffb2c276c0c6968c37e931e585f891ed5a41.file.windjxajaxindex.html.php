<?php /* Smarty version Smarty-3.1.13, created on 2016-04-19 10:37:55
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\content\windjxajaxindex.html" */ ?>
<?php /*%%SmartyHeaderCode:2498956610234627473-42294348%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c338ffb2c276c0c6968c37e931e585f891ed5a41' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\content\\windjxajaxindex.html',
      1 => 1461032854,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2498956610234627473-42294348',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56610234740c12_87742319',
  'variables' => 
  array (
    'listDjx' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56610234740c12_87742319')) {function content_56610234740c12_87742319($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['listDjx']->value['list']){?>
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
期)<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>

',"<?php echo $_smarty_tpl->tpl_vars['m']->value['has_time'];?>
",'index_mobile');