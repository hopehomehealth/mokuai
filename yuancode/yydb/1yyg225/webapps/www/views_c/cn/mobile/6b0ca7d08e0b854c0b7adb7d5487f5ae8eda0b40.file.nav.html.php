<?php /* Smarty version Smarty-3.1.13, created on 2016-12-10 13:25:01
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/nav.html" */ ?>
<?php /*%%SmartyHeaderCode:158214207158451d3a43d3b2-83510206%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b0ca7d08e0b854c0b7adb7d5487f5ae8eda0b40' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/nav.html',
      1 => 1481177938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158214207158451d3a43d3b2-83510206',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58451d3a4b7155_07559788',
  'variables' => 
  array (
    'site_config' => 0,
    'navMark' => 0,
    'L' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451d3a4b7155_07559788')) {function content_58451d3a4b7155_07559788($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['site_config']->value['index_skin']==2){?><?php }else{ ?>
<nav class="nav">
    <ul class="ui-clr">
        <li<?php if ($_smarty_tpl->tpl_vars['navMark']->value=='index'){?> class="selected"<?php }?>><a href="<?php echo url();?>
"><span>首页</span></a></li>
        <?php if ($_smarty_tpl->tpl_vars['navMark']->value=='free'){?>
        <li class="selected"><a href="<?php echo url('/yunbuy/free');?>
"><span>免费<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</span></a></li>
        <?php }elseif(!empty($_GET['zq'])){?>
        <li class="selected"><a href="/yunbuy?zq=<?php echo $_GET['zq'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</span></a></li>
        <?php }else{ ?>
        <li<?php if ($_smarty_tpl->tpl_vars['navMark']->value=='yunbuy'){?> class="selected"<?php }?>><a href="<?php echo url('/yunbuy');?>
"><span><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_one'];?>
</span></a></li>
        <?php }?>
        <?php if (@constant('IsAuction')){?>
        <li<?php if ($_smarty_tpl->tpl_vars['navMark']->value=='auction'){?> class="selected"<?php }?>><a href="<?php echo url('/auction/lists');?>
"><span>所有<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
</span></a></li>
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
<div class="clear"></div>
<?php }?><?php }} ?>