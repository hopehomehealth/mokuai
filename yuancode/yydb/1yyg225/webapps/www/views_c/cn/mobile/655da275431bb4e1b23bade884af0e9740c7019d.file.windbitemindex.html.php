<?php /* Smarty version Smarty-3.1.13, created on 2017-02-24 03:50:44
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/content/windbitemindex.html" */ ?>
<?php /*%%SmartyHeaderCode:208011896584e00fa6fcfc7-78950009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '655da275431bb4e1b23bade884af0e9740c7019d' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/content/windbitemindex.html',
      1 => 1487749810,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208011896584e00fa6fcfc7-78950009',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584e00fa766a97_43871787',
  'variables' => 
  array (
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584e00fa766a97_43871787')) {function content_584e00fa766a97_43871787($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.truncate.php';
?><li class="item-db">
    <em><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
"><img width="93" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>93,'type'=>0),$_smarty_tpl);?>
"></a></em>
    <div class="new-index-2">
        <span><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
"><?php if ($_smarty_tpl->tpl_vars['m']->value['title']){?><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['m']->value['title'],26);?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
<?php }?></a></span>
        <p>获得者：<a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
#dbCod"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a></p>
    </div>
</li><?php }} ?>