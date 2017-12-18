<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 19:24:00
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\ur_here.html" */ ?>
<?php /*%%SmartyHeaderCode:22321565d8350855a27-81096009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbbc1e2835f4fec2a0ab97549ef6ed1abd8181b5' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\ur_here.html',
      1 => 1418283576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22321565d8350855a27-81096009',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ur_here' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d835086d129_14675569',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d835086d129_14675569')) {function content_565d835086d129_14675569($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['ur_here']->value){?>
<div id="breadCrumb">
    <div class="breadCrumb-txt">
        <a href="<?php echo url();?>
">首页</a> <?php echo $_smarty_tpl->tpl_vars['ur_here']->value;?>

    </div>
</div>
<?php }else{ ?>
<div id="breadCrumb">
    <div class="breadCrumb-txt">
        <a href="<?php echo url();?>
">首页</a><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'catpos','catid'=>$_smarty_tpl->tpl_vars['data']->value['cat']['id'],'space'=>' > ###','end'=>' > <span class="end">###</span>'),$_smarty_tpl);?>

    </div>
</div>
<?php }?><?php }} ?>