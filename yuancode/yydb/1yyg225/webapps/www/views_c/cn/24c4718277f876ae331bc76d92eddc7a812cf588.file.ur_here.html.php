<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 17:20:44
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\cn\ur_here.html" */ ?>
<?php /*%%SmartyHeaderCode:7908565971ec20d556-00304850%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24c4718277f876ae331bc76d92eddc7a812cf588' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\cn\\ur_here.html',
      1 => 1418283576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7908565971ec20d556-00304850',
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
  'unifunc' => 'content_565971ec22f4e8_51215716',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565971ec22f4e8_51215716')) {function content_565971ec22f4e8_51215716($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['ur_here']->value){?>
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