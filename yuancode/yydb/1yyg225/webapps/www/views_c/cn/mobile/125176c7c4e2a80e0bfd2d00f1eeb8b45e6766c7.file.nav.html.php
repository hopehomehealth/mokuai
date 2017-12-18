<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 20:19:37
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\cn\mobile\nav.html" */ ?>
<?php /*%%SmartyHeaderCode:1545656599bd9a80aa7-83099641%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '125176c7c4e2a80e0bfd2d00f1eeb8b45e6766c7' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\cn\\mobile\\nav.html',
      1 => 1446428874,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1545656599bd9a80aa7-83099641',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'navMark' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56599bd9ace840_81904675',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56599bd9ace840_81904675')) {function content_56599bd9ace840_81904675($_smarty_tpl) {?><nav class="nav">
    <ul class="ui-clr">
        <li<?php if ($_smarty_tpl->tpl_vars['navMark']->value=='index'){?> class="selected"<?php }?>><a href="<?php echo url();?>
"><span>首页</span></a></li>
        <li<?php if ($_smarty_tpl->tpl_vars['navMark']->value=='win'){?> class="selected"<?php }?>><a href="<?php echo url('/content/win');?>
"><span>最新揭晓</span></a></li>
        <li<?php if ($_smarty_tpl->tpl_vars['navMark']->value=='yunbuy'){?> class="selected"<?php }?>><a href="<?php echo url('/yunbuy');?>
"><span>一元云购</span></a></li>
        <li<?php if ($_smarty_tpl->tpl_vars['navMark']->value=='share'){?> class="selected"<?php }?>><a href="<?php echo url('/content/share');?>
"><span>晒单</span></a></li>
    </ul>
</nav>
<div class="clear"></div><?php }} ?>