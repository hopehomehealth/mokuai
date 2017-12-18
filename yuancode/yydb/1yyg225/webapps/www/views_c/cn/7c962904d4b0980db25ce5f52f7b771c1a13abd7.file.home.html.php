<?php /* Smarty version Smarty-3.1.13, created on 2016-03-17 17:02:59
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\newbie\home.html" */ ?>
<?php /*%%SmartyHeaderCode:2900556ea72c3d84640-13292873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c962904d4b0980db25ce5f52f7b771c1a13abd7' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\newbie\\home.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2900556ea72c3d84640-13292873',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56ea72c3eeeee3_71785155',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ea72c3eeeee3_71785155')) {function content_56ea72c3eeeee3_71785155($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
    .newbieBg{ margin:0 auto 20px; width: 1160px; height: 580px; background: url('/style/images/newbie/newbiebg.png') no-repeat; position: relative; }
    .newbieBg a{ display: block; position: absolute; width: 196px; height: 61px; }
    .newbieBg a.a1{ top: 343px; left: 266px; }
    .newbieBg a.a2{ top: 343px; left: 867px; }
</style>
<div id="container">

    <div class="newbieBg">
        <a href="<?php echo url('/content/newbie/auction');?>
" class="a1"></a>
        <a href="<?php echo url('/content/newbie/yunbuy');?>
" class="a2"></a>
    </div>

</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>