<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 15:56:24
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/ur_here.html" */ ?>
<?php /*%%SmartyHeaderCode:49970370858451da81304a7-89509112%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c8a5eff1d5ffc056f9ede12296186d209c1c322' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/ur_here.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '49970370858451da81304a7-89509112',
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
  'unifunc' => 'content_58451da8157a91_51114911',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451da8157a91_51114911')) {function content_58451da8157a91_51114911($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['ur_here']->value){?>
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