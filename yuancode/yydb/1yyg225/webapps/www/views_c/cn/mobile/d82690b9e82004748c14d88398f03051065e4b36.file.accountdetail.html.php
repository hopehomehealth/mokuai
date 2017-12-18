<?php /* Smarty version Smarty-3.1.13, created on 2016-05-24 14:16:37
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\member\accountdetail.html" */ ?>
<?php /*%%SmartyHeaderCode:2307256d41d851bd821-42964322%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd82690b9e82004748c14d88398f03051065e4b36' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\member\\accountdetail.html',
      1 => 1463475809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2307256d41d851bd821-42964322',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d41d852f6aa3_99380127',
  'variables' => 
  array (
    'data' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d41d852f6aa3_99380127')) {function content_56d41d852f6aa3_99380127($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/member.css">
<div id="content" class="container main">
    <div class="nav-m ui-clr">
        <ul>
            <li><a href="<?php echo '/member/recchage';?>
">充值</a></li>
            <li><a href="<?php echo '/member/withdraw';?>
">提现</a></li>
            <li><a href="<?php echo '/member/accountlog';?>
">充值/提现记录</a></li>
            <li class="on"><a href="<?php echo '/member/accountdetail';?>
">帐户明细</a></li>
        </ul>
    </div>

    <div class="list01 list-address">
        <dl class="item"></dl>
    </div>
    <div class="loading getMore"></div>
    <div class="list_foot" style="text-align: right">
        第三方支付总计：<span class="color01"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['amount_in'])===null||$tmp==='' ? 0 : $tmp);?>
</span><br>
        余额统计：收入<span class="color02"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['user_money_in'])===null||$tmp==='' ? 0 : $tmp);?>
</span> 支出<span class="color01"><?php echo (($tmp = @abs($_smarty_tpl->tpl_vars['data']->value['user_money_out']))===null||$tmp==='' ? 0 : $tmp);?>
</span><br>
        <?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
统计：收入<span class="color02"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['db_points_in'])===null||$tmp==='' ? 0 : $tmp);?>
</span> 支出<span class="color01"><?php echo (($tmp = @abs($_smarty_tpl->tpl_vars['data']->value['db_points_out']))===null||$tmp==='' ? 0 : $tmp);?>
</span><br>
        <?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
统计：收入<span class="color02"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value['pay_points_in'])===null||$tmp==='' ? 0 : $tmp);?>
</span> 支出<span class="color01"><?php echo (($tmp = @abs($_smarty_tpl->tpl_vars['data']->value['pay_points_out']))===null||$tmp==='' ? 0 : $tmp);?>
</span><br>
    </div>
</div>
<script src="/style/mobile/js/jquery.more.js"></script>
<script type="text/javascript">
    $(function(){
        $('.list-address').more({
            'address': '/member/accountdetail',
            'amount' : 10
        })
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>