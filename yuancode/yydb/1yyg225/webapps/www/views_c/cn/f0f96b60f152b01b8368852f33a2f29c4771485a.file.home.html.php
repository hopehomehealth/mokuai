<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 11:07:23
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\newbie\yunbuy\home.html" */ ?>
<?php /*%%SmartyHeaderCode:22097566129ac93b1f9-33200682%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0f96b60f152b01b8368852f33a2f29c4771485a' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\newbie\\yunbuy\\home.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22097566129ac93b1f9-33200682',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_566129aca12ec4_13801655',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566129aca12ec4_13801655')) {function content_566129aca12ec4_13801655($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/addcss.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="add-bg">
    <div class="add-xszn fn-clear">
        <img src="<?php echo url('/style/images/newbie/2014-11-xs1.jpg');?>
" align="" />
        <img src="<?php echo url('/style/images/newbie/2014-11-xs2.jpg');?>
" align="" />
        <img src="<?php echo url('/style/images/newbie/2014-11-xs3.jpg');?>
" align="" />
        <img src="<?php echo url('/style/images/newbie/2014-11-xs4.jpg');?>
" align="" />
        <img src="<?php echo url('/style/images/newbie/2014-11-xs5.jpg');?>
" align="" />
        <div class="add-yxp-btn fn-clear">
            <a href="<?php echo url('/yunbuy');?>
"><img src="<?php echo url('/style/images/newbie/2014-11-xs7.png');?>
" alt="" /></a>

        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>