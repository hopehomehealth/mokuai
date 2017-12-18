<?php /* Smarty version Smarty-3.1.13, created on 2016-12-09 13:06:05
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/newbie/yunbuy/home.html" */ ?>
<?php /*%%SmartyHeaderCode:1817558671584752ed89e912-72497239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d431301aceb30603bd848a65f6daf113a2b09d7' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/newbie/yunbuy/home.html',
      1 => 1481177938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1817558671584752ed89e912-72497239',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584752ed8fe6b8_79516956',
  'variables' => 
  array (
    'site_config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584752ed8fe6b8_79516956')) {function content_584752ed8fe6b8_79516956($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php if ($_smarty_tpl->tpl_vars['site_config']->value['index_skin']==2){?>
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'block','mark'=>'new_gobuy'),$_smarty_tpl);?>

        <?php }else{ ?>
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'block','mark'=>'new_yunbuy'),$_smarty_tpl);?>

        <?php }?>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>