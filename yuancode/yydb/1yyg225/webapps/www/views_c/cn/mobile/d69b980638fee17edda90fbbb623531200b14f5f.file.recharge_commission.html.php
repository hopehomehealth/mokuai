<?php /* Smarty version Smarty-3.1.13, created on 2017-01-11 20:52:37
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/recharge_commission.html" */ ?>
<?php /*%%SmartyHeaderCode:194490728458762a953032c2-82682854%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd69b980638fee17edda90fbbb623531200b14f5f' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/recharge_commission.html',
      1 => 1481177906,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194490728458762a953032c2-82682854',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'site_config' => 0,
    'member' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58762a95353db1_11702529',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58762a95353db1_11702529')) {function content_58762a95353db1_11702529($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
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
            <li class="on"><a>充值到账户</a></li>
            <?php if ($_smarty_tpl->tpl_vars['site_config']->value['withdraw_status']==1){?>
            <li><a href="<?php echo url('/member/commission');?>
">佣金明细</a></li>
            <li><a href="<?php echo url('/member/withdraw_commission_log');?>
">佣金提现记录</a></li>
            <?php }?>
            <?php }?>
        </ul>
    </div>

    <div class="title-m2">
        <b>可充值佣金：<span class="color01"><?php echo price_format($_smarty_tpl->tpl_vars['member']->value['commission']);?>
</span></b>
    </div>

    <div class="form-m" style="background: #fff;border-top:1px solid #e6e6e6;">
        <form action="" method="post" target="iframeNews">
            <div class="item ui-clr">
                <dl>
                    <dt class="color03"><span class="color01">*</span> 充值金额：</dt>
                    <dd>
                        <input name="change_money" type="text" class="input-m" />
                    </dd>
                </dl>
                <div style="line-height: 2em;" id="withdraw_tip"></div>
            </div>
            <input name="Submit" type="submit" value="充值" class="btn" />
        </form>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>