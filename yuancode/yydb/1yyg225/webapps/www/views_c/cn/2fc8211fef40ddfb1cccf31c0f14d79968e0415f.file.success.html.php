<?php /* Smarty version Smarty-3.1.13, created on 2016-05-04 17:13:17
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\yunbuy\success.html" */ ?>
<?php /*%%SmartyHeaderCode:22516566100365202b9-03299920%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2fc8211fef40ddfb1cccf31c0f14d79968e0415f' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\yunbuy\\success.html',
      1 => 1461296447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22516566100365202b9-03299920',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56610036639350_09021795',
  'variables' => 
  array (
    'L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56610036639350_09021795')) {function content_56610036639350_09021795($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/yiyuanbao.css');?>
">
<style type="text/css">
    .g-body{ border:1px solid #ccc; width: 1150px; margin:20px auto 0; padding: 60px 0 70px; }
    #progress{ float: none; margin:0 auto; display: block; }
    .pay_success{ width: 1000px; min-height:300px; margin:30px auto 0; background: #f6f6f6 url('/style/images/yes.gif') 50px center no-repeat; }
    .pay_success h2{ font-size: 50px;}
    .pay_success .txt{ padding: 70px 0 70px 320px; }
    .pay_success .p1{ font-weight: bold; font-size: 30px; }
    .pay_success .p2{ font-size: 18px; }
    .share_box{ width: 360px; margin: 10px 0 0; padding:10px;background:#ececec;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius:10px; }
</style>
<div class="g-body blue">
    <div class="m-header">
        <div class="g-wrap">
            <?php if (isset($_smarty_tpl->tpl_vars["progress"])) {$_smarty_tpl->tpl_vars["progress"] = clone $_smarty_tpl->tpl_vars["progress"];
$_smarty_tpl->tpl_vars["progress"]->value = "3"; $_smarty_tpl->tpl_vars["progress"]->nocache = null; $_smarty_tpl->tpl_vars["progress"]->scope = 0;
} else $_smarty_tpl->tpl_vars["progress"] = new Smarty_variable("3", null, 0);?>
            <?php echo $_smarty_tpl->getSubTemplate ("yunbuy/progress_cart.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
    <div class="clear"></div>
    <dl class="pay_success">
        <div class="txt">
            <h2 class="color01">恭喜您，支付成功！</h2>
            <p class="p1">请等待系统为您揭晓！</p>
            <p class="p2">您现在可以<a href="<?php echo url('/member/db');?>
" class="color01">查看<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
记录</a>或<a href="<?php echo url('/yunbuy');?>
" class="color01">继续<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</a></p>
        </div>
    </dl>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>