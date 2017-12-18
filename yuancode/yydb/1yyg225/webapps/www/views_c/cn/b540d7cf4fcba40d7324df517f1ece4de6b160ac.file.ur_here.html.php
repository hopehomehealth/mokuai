<?php /* Smarty version Smarty-3.1.13, created on 2016-06-24 15:40:47
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\cn\ur_here.html" */ ?>
<?php /*%%SmartyHeaderCode:5504576ce3ff3daf01-73593269%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b540d7cf4fcba40d7324df517f1ece4de6b160ac' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\cn\\ur_here.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5504576ce3ff3daf01-73593269',
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
  'unifunc' => 'content_576ce3ff3f9528_12684130',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576ce3ff3f9528_12684130')) {function content_576ce3ff3f9528_12684130($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['ur_here']->value){?>
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