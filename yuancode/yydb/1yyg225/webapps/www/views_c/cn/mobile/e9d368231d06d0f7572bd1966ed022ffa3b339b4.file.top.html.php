<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 20:19:29
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\cn\mobile\top.html" */ ?>
<?php /*%%SmartyHeaderCode:2845456599bd16e6204-88074648%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9d368231d06d0f7572bd1966ed022ffa3b339b4' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\cn\\mobile\\top.html',
      1 => 1448713000,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2845456599bd16e6204-88074648',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'seo' => 0,
    'viewport' => 0,
    'header' => 0,
    'row' => 0,
    'mod' => 0,
    'cartNum' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56599bd17374d6_71986946',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56599bd17374d6_71986946')) {function content_56599bd17374d6_71986946($_smarty_tpl) {?><!doctype html>
<html lang="zh-cn" xml:lang="zh-cn">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title><?php echo $_smarty_tpl->tpl_vars['seo']->value['title'];?>
</title>
    <meta charset="utf-8">
    <meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['keywords'];?>
" />
    <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['seo']->value['description'];?>
" />
    <meta name="viewport" content="width=device-width,initial-scale=1<?php if ($_smarty_tpl->tpl_vars['viewport']->value=='pc'){?>,user-scalable=yes,maximum-scale=3<?php }else{ ?>,maximum-scale=2,user-scalable=no<?php }?>">
    <link rel="stylesheet" href="/style/mobile/css/common.css">
    <script src="/style/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/style/layer/layer.min.js"></script>
    <script type="text/javascript" src="/style/common.js"></script>
</head>
<body>

<?php if ($_smarty_tpl->tpl_vars['header']->value=='header2'){?>
<header id="header2">
    <h1><?php if ($_smarty_tpl->tpl_vars['row']->value['head']){?><?php echo $_smarty_tpl->tpl_vars['row']->value['head'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['seo']->value['head'];?>
<?php }?></h1>
    <div class="back"><a class="ap-icon" href="<?php if ($_smarty_tpl->tpl_vars['mod']->value=='member'){?><?php echo url('/member');?>
<?php }else{ ?>javascript:history.back();<?php }?>"></a></div>
    <div class="menu">
        <!--<a class="icon-cart ap-icon" href="<?php echo url('/yunbuy/cart');?>
"><em class="cartNum"><?php echo $_smarty_tpl->tpl_vars['cartNum']->value;?>
</em></a>-->
        <a class="icon-home ap-icon" href="<?php echo url();?>
"></a>
    </div>
</header>
<?php }else{ ?>

<?php }?><?php }} ?>