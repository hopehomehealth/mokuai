<?php /* Smarty version Smarty-3.1.13, created on 2016-03-25 22:01:23
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\page_index_spec.html" */ ?>
<?php /*%%SmartyHeaderCode:448856f544b3d34e09-43160547%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '774611a15d8026784fd411657ebd9074f260b0fc' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\page_index_spec.html',
      1 => 1456367942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '448856f544b3d34e09-43160547',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56f544b3dfa8f8_08023479',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56f544b3dfa8f8_08023479')) {function content_56f544b3dfa8f8_08023479($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo stripcslashes($_smarty_tpl->tpl_vars['data']->value['page']['content']);?>

    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>