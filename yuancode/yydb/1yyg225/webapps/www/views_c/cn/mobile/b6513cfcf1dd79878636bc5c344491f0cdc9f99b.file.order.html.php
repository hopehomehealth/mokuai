<?php /* Smarty version Smarty-3.1.13, created on 2016-02-29 18:29:16
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\member\order.html" */ ?>
<?php /*%%SmartyHeaderCode:1712056d41d7cf15cd9-80855062%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6513cfcf1dd79878636bc5c344491f0cdc9f99b' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\member\\order.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1712056d41d7cf15cd9-80855062',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'total' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d41d7d1ef124_75020434',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d41d7d1ef124_75020434')) {function content_56d41d7d1ef124_75020434($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/member.css">
<div id="content" class="container main">
    <div class="tips-m" style="padding:10px;text-align: center;color:#333;">
        <a href="<?php echo url('/member/order');?>
?status=1"<?php if ($_GET['status']==1){?> class="color01"<?php }?>>待付款<span class="color01">（<?php echo $_smarty_tpl->tpl_vars['total']->value['notpay'];?>
）</span></a>
        <a href="<?php echo url('/member/order');?>
?status=2"<?php if ($_GET['status']==2){?> class="color01"<?php }?>>待发货<span class="color01">（<?php echo $_smarty_tpl->tpl_vars['total']->value['wait'];?>
）</span></a>
        <a href="<?php echo url('/member/order');?>
?status=3"<?php if ($_GET['status']==3){?> class="color01"<?php }?>>已发货<span class="color01">（<?php echo $_smarty_tpl->tpl_vars['total']->value['shiped'];?>
）</span></a>
        <a href="<?php echo url('/member/order');?>
?status=4"<?php if ($_GET['status']==4){?> class="color01"<?php }?>>已完成<span class="color01">（<?php echo $_smarty_tpl->tpl_vars['total']->value['finish'];?>
）</span></a>
    </div>

    <ul class="tab-cell tab-cell-5 ui-clr">
        <li<?php if ($_GET['time']==''){?> class="on"<?php }?>><a href="<?php echo url('/member/order');?>
<?php if (isset($_GET['order'])){?>?order<?php }?>">全部</a></li>
        <li<?php if ($_GET['time']==1){?> class="on"<?php }?>><a href="<?php echo url('/member/order');?>
?time=1<?php if (isset($_GET['order'])){?>&order<?php }?>">今天</a></li>
        <li<?php if ($_GET['time']==2){?> class="on"<?php }?>><a href="<?php echo url('/member/order');?>
?time=2<?php if (isset($_GET['order'])){?>&order<?php }?>">本周</a></li>
        <li<?php if ($_GET['time']==3){?> class="on"<?php }?>><a href="<?php echo url('/member/order');?>
?time=3<?php if (isset($_GET['order'])){?>&order<?php }?>">本月</a></li>
        <li class="last <?php if ($_GET['time']==4){?> on<?php }?>"><a href="<?php echo url('/member/order');?>
?time=4<?php if (isset($_GET['order'])){?>&order<?php }?>">最近三月</a></li>
    </ul>

    <div class="list01 list-db">
        <dl class="item ui-clr"></dl>
    </div>
    <div class="loading getMore" style="background: #fff;"></div>
</div>
<script src="/style/mobile/js/jquery.more.js"></script>
<script type="text/javascript">
    $(function(){
        $('.list-db').more({
            'address': '/member/order?1<?php if (isset($_GET['order'])){?>&order<?php }?><?php if ($_GET['time']){?>&time=<?php echo $_GET['time'];?>
<?php }?><?php if ($_GET['status']){?>&status=<?php echo $_GET['status'];?>
<?php }?>',
            'amount' : 10
        })
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>