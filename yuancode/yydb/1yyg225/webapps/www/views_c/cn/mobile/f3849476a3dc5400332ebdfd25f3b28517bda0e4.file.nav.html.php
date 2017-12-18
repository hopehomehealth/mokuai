<?php /* Smarty version Smarty-3.1.13, created on 2015-12-02 15:34:06
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\mobile\nav.html" */ ?>
<?php /*%%SmartyHeaderCode:27564565e9eee7e16a2-18216626%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3849476a3dc5400332ebdfd25f3b28517bda0e4' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\mobile\\nav.html',
      1 => 1446428874,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27564565e9eee7e16a2-18216626',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'navMark' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565e9eee8087b8_50985968',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565e9eee8087b8_50985968')) {function content_565e9eee8087b8_50985968($_smarty_tpl) {?><nav class="nav">
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