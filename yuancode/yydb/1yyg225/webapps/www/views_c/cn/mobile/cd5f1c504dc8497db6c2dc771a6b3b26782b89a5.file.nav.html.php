<?php /* Smarty version Smarty-3.1.13, created on 2015-12-11 15:50:56
         compiled from "F:\WWW\1yyg225\webapps\www\views\cn\mobile\nav.html" */ ?>
<?php /*%%SmartyHeaderCode:26171565d6498f038c5-98377033%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd5f1c504dc8497db6c2dc771a6b3b26782b89a5' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\cn\\mobile\\nav.html',
      1 => 1449740465,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26171565d6498f038c5-98377033',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d6498f3c627_99805957',
  'variables' => 
  array (
    'navMark' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d6498f3c627_99805957')) {function content_565d6498f3c627_99805957($_smarty_tpl) {?><nav class="nav">
    <ul class="ui-clr">
        <li<?php if ($_smarty_tpl->tpl_vars['navMark']->value=='index'){?> class="selected"<?php }?>><a href="<?php echo url();?>
"><span>首页</span></a></li>
        <li<?php if ($_smarty_tpl->tpl_vars['navMark']->value=='yunbuy'){?> class="selected"<?php }?>><a href="<?php echo url('/yunbuy');?>
"><span>一元云购</span></a></li>
        <?php if (@constant('IsAuction')){?>
        <li<?php if ($_smarty_tpl->tpl_vars['navMark']->value=='auction'){?> class="selected"<?php }?>><a href="<?php echo url('/auction/lists');?>
"><span>所有竞拍</span></a></li>
        <style type="text/css">
            .nav li{ width: 20%;}
        </style>
        <?php }?>
        <li<?php if ($_smarty_tpl->tpl_vars['navMark']->value=='win'){?> class="selected"<?php }?>><a href="<?php echo url('/content/win');?>
"><span>最新揭晓</span></a></li>
        <li<?php if ($_smarty_tpl->tpl_vars['navMark']->value=='share'){?> class="selected"<?php }?>><a href="<?php echo url('/content/share');?>
"><span>晒单</span></a></li>
    </ul>
</nav>
<div class="clear"></div><?php }} ?>