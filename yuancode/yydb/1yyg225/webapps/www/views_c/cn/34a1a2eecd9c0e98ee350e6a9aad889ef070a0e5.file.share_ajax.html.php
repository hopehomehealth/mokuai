<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:03:55
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/content/share_ajax.html" */ ?>
<?php /*%%SmartyHeaderCode:100292637558451f6b149f47-48119154%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34a1a2eecd9c0e98ee350e6a9aad889ef070a0e5' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/content/share_ajax.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100292637558451f6b149f47-48119154',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58451f6b1ecce0_25391793',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451f6b1ecce0_25391793')) {function content_58451f6b1ecce0_25391793($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.truncate.php';
?><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
<div class="item">
    <div class="pic">
        <a href="<?php echo url(((('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid'])).('#share#vid=')).($_smarty_tpl->tpl_vars['m']->value['id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
">
            <img alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['thumb'],'width'=>255,'type'=>0),$_smarty_tpl);?>
" />
        </a>
    </div>
    <div class="name">
        <a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
" target="_blank">
            <?php if ($_smarty_tpl->tpl_vars['m']->value['extension_code']==@constant('CART_DB')){?>(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)<?php }?>
            <?php echo $_smarty_tpl->tpl_vars['m']->value['obj_name'];?>

            <span class="color01" style="white-space: nowrap">【<?php if ($_smarty_tpl->tpl_vars['m']->value['extension_code']==@constant('CART_DB')){?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_one'];?>
<?php }elseif($_smarty_tpl->tpl_vars['m']->value['extension_code']==@constant('CART_WIN')){?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
<?php }elseif($_smarty_tpl->tpl_vars['m']->value['extension_AUC']==@constant('CART_DB')){?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
获得<?php }?>】</span>
        </a>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['m']->value['extension_code']==@constant('CART_DB')){?>
    <div class="code">
        幸运号码：<strong class="txt-impt"><?php echo $_smarty_tpl->tpl_vars['m']->value['luck_code'];?>
</strong>
    </div>
    <?php }?>
    <div class="post">
        <div class="title">
            <a href="<?php echo url(((('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid'])).('#share#vid=')).($_smarty_tpl->tpl_vars['m']->value['id']));?>
" target="_blank"><strong><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</strong></a></div>
        <div class="author">
            <a href="<?php echo url(((('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid'])).('#share#vid=')).($_smarty_tpl->tpl_vars['m']->value['id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a><span class="time"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['addtime'],'m-d H:i');?>
</span></div>
        <div class="abbr">
            <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['m']->value['content'],120);?>

        </div>
    </div>
</div>
<?php } ?><?php }} ?>