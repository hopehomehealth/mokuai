<?php /* Smarty version Smarty-3.1.13, created on 2016-03-08 20:59:20
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\member\commission.html" */ ?>
<?php /*%%SmartyHeaderCode:2096656decca896ce03-47600172%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ca014eb3f990cab8cccffaa83d480de3e73cb15' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\member\\commission.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2096656decca896ce03-47600172',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'commission_total' => 0,
    'member' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56decca8afcad7_74610187',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56decca8afcad7_74610187')) {function content_56decca8afcad7_74610187($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/member.css">
<div id="content" class="container main">
    <div class="tips-m" style="padding:10px;text-align: center;color:#333;">
        <a>累计收入<span class="color01">（<?php echo $_smarty_tpl->tpl_vars['commission_total']->value;?>
元）</span></a>
        <a>累计(充值/提现)<span class="color01">（<?php echo $_smarty_tpl->tpl_vars['member']->value['deduct_commission'];?>
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