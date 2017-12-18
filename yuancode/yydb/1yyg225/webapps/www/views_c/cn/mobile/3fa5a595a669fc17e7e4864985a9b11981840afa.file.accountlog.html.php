<?php /* Smarty version Smarty-3.1.13, created on 2016-02-29 18:36:44
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\member\accountlog.html" */ ?>
<?php /*%%SmartyHeaderCode:2703356d41f3c213831-62664666%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3fa5a595a669fc17e7e4864985a9b11981840afa' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\member\\accountlog.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2703356d41f3c213831-62664666',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'member' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d41f3c30ad95_35653310',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d41f3c30ad95_35653310')) {function content_56d41f3c30ad95_35653310($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
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
            <li class="on"><a href="<?php echo '/member/accountlog';?>
">充值/提现记录</a></li>
            <li><a href="<?php echo '/member/accountdetail';?>
">帐户明细</a></li>
        </ul>
    </div>

    <div class="list01 list-address">
        <dl class="item"></dl>
    </div>
    <div class="loading getMore"></div>
    <div class="list_foot">
        您当前的可用保证金为：<span class="color01"><?php echo price_format($_smarty_tpl->tpl_vars['member']->value['user_money']);?>
</span>
        冻结保证金：<span class="color02"><?php echo price_format($_smarty_tpl->tpl_vars['member']->value['frozen_money']);?>
</span>
    </div>
</div>
<script src="/style/mobile/js/jquery.more.js"></script>
<script type="text/javascript">
    $(function(){
        $('.list-address').more({
            'address': '/member/accountlog',
            'amount' : 10
        })
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>