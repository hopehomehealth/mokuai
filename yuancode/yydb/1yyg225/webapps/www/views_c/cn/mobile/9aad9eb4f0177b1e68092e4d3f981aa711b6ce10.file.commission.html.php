<?php /* Smarty version Smarty-3.1.13, created on 2017-01-11 20:52:31
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/commission.html" */ ?>
<?php /*%%SmartyHeaderCode:65139122258762a8f824d85-51225970%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9aad9eb4f0177b1e68092e4d3f981aa711b6ce10' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/commission.html',
      1 => 1481177906,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65139122258762a8f824d85-51225970',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'site_config' => 0,
    'commission_total' => 0,
    'member' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58762a8f89b697_55919795',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58762a8f89b697_55919795')) {function content_58762a8f89b697_55919795($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/member.css">
<div id="content" class="container main">
	<div class="nav-m ui-clr">
        <ul>
            <?php if ($_smarty_tpl->tpl_vars['site_config']->value['withdraw_status']==1){?>
            <li><a href="<?php echo '/member/withdraw_commission';?>
">提现</a></li>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['site_config']->value['apply_jufu']!=1){?>
            <li><a href="<?php echo '/member/recharge_commission';?>
">充值到账户</a></li>
            <?php if ($_smarty_tpl->tpl_vars['site_config']->value['withdraw_status']==1){?>
            <li class="on"><a href="<?php echo url('/member/commission');?>
">佣金明细</a></li>
            <li><a href="<?php echo url('/member/withdraw_commission_log');?>
">佣金提现记录</a></li>
        	<?php }?>
            <?php }?>
        </ul>
    </div>
    
    <div class="tips-m" style="padding:10px;text-align: center;color:#333;">
        <a>累计收入<span class="color01">（<?php echo $_smarty_tpl->tpl_vars['commission_total']->value;?>
元）</span></a>
        <a>累计(充值<?php if ($_smarty_tpl->tpl_vars['site_config']->value['withdraw_status']==1){?>/提现<?php }?>)<span class="color01">（<?php echo $_smarty_tpl->tpl_vars['member']->value['deduct_commission'];?>
元）</span></a>
        <a>佣金余额<span class="color01">（<?php echo $_smarty_tpl->tpl_vars['member']->value['commission'];?>
元）</span></a>
    </div>

    <ul class="tab-cell tab-cell-5 ui-clr">
        <li<?php if ($_GET['time']==''){?> class="on"<?php }?>><a href="<?php echo url('/member/commission');?>
">全部</a></li>
        <li<?php if ($_GET['time']==1){?> class="on"<?php }?>><a href="<?php echo url('/member/commission');?>
?time=1">今天</a></li>
        <li<?php if ($_GET['time']==2){?> class="on"<?php }?>><a href="<?php echo url('/member/commission');?>
?time=2">本周</a></li>
        <li<?php if ($_GET['time']==3){?> class="on"<?php }?>><a href="<?php echo url('/member/commission');?>
?time=3">本月</a></li>
        <li class="last <?php if ($_GET['time']==4){?> on<?php }?>"><a href="<?php echo url('/member/commission');?>
?time=4">最近三月</a></li>
    </ul>

    <div class="list01 list-address">
        <dl class="item"></dl>
    </div>
    <div class="loading getMore" style="background: #fff;"></div>
</div>
<script src="/style/mobile/js/jquery.more.js"></script>
<script type="text/javascript">
    $(function(){
        $('.list-address').more({
            'address': '/member/commission?1<?php if ($_GET['time']){?>&time=<?php echo $_GET['time'];?>
<?php }?>',
            'amount' : 10
        })
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>