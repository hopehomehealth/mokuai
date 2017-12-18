<?php /* Smarty version Smarty-3.1.13, created on 2017-01-26 09:42:05
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/business/menu.html" */ ?>
<?php /*%%SmartyHeaderCode:451283542584af2ba8ba821-84360923%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7ba37a9e455f06f1f906f5e64ee606295b7dca1' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/business/menu.html',
      1 => 1484103638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '451283542584af2ba8ba821-84360923',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584af2ba956749_56388398',
  'variables' => 
  array (
    'member' => 0,
    'L' => 0,
    'bonus_count' => 0,
    'business_row' => 0,
    'site_config' => 0,
    'nav' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584af2ba956749_56388398')) {function content_584af2ba956749_56388398($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.truncate.php';
?><dl class="shop-center">
    <dd>
        <em><a href="<?php echo url('/member/photo#m');?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['member']->value['photo'],'nopic'=>$_smarty_tpl->tpl_vars['member']->value['defaultPic']),$_smarty_tpl);?>
" /></a></em>
        <div class="shop-center-1">
            <big><strong><?php if ($_smarty_tpl->tpl_vars['member']->value['nickname']){?><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['member']->value['nickname'],6);?>
<?php }else{ ?><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['member']->value['username'],6);?>
<?php }?></strong><span id="hello">下午好！</span></big>
            <p>当前/最近<span>登录IP</span>：<?php echo $_smarty_tpl->tpl_vars['member']->value['ip'];?>
/<?php echo $_smarty_tpl->tpl_vars['member']->value['lastip'];?>
</p>
            <p>当前/最近<span>登录时间</span>：<?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['member']->value['login']);?>
/<?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['member']->value['lastlogin']);?>
</p>
            <p class="shop-a">
                <a href="<?php echo url('/business/info#m');?>
" class="a2">店铺设置</a>
                <span>|</span>
                <a href="<?php echo url('/member');?>
" class="a1">会员中心</a>
            </p>
        </div>
    </dd>
    <dt>
    <ul class="shop-center-ul1">
        <li class="shop-center-li1">
            <strong><a href="<?php echo url('/member/accountdetail');?>
#m"><?php echo price_format($_smarty_tpl->tpl_vars['member']->value['user_money']);?>
</a></strong>
            <p>可用余额</p>
        </li>
        <?php if (@constant('IsAuction')){?>
        <li>
            <strong><a href="<?php echo url('/member/accountdetail');?>
#m"><?php echo $_smarty_tpl->tpl_vars['member']->value['frozen_money'];?>
</a></strong>
            <p>冻结余额</p>
        </li>
        <?php }?>
        <li>
            <strong><a href="<?php echo url('/member/accountdetail');?>
#m"><?php echo $_smarty_tpl->tpl_vars['member']->value['pay_points'];?>
</a></strong>
            <p><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</p>
        </li>
        <li>
            <strong><a href="<?php echo url('/member/accountdetail');?>
#m">0</a></strong>
            <p><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
</p>
        </li>
        <li>
            <strong><a href="<?php echo url('/member/bonus');?>
#m"><?php echo $_smarty_tpl->tpl_vars['bonus_count']->value['money'];?>
</a></strong>
            <p>限时<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
</p>
        </li>
    </ul>
    <ul class="shop-center-ul2">
        <li><a href="/store/index/<?php echo $_smarty_tpl->tpl_vars['business_row']->value['mid'];?>
" target="_blank" class="shop-a1">我的店铺</a></li>
        <li><a href="/business/yunbuy_edit#m" class="shop-a2">发布商品</a></li>
        <?php if ($_smarty_tpl->tpl_vars['site_config']->value['apply_jufu']!=1){?>
        <li><a href="<?php echo url('/member/withdraw#m');?>
" target="_blank" class="shop-a3">提现</a></li>
        <?php }?>
    </ul>
    </dt>
</dl>
<script type="text/javascript">
    $(function(){
        welcome_time();
    })
</script>
<div class="fn-left hy-l">
    <h2>商家中心</h2>
    <div class="hy-lnav">
        <h3 class="fn-clear">我的店铺</h3>
        <ul>
            <li class="<?php if ($_smarty_tpl->tpl_vars['nav']->value=='info'){?>dq<?php }?>"><a href="/business/info#m">店铺设置</a></li>
            <li class="<?php if ($_smarty_tpl->tpl_vars['nav']->value=='introduction'){?>dq<?php }?>"><a href="/business/introduction#m">店铺介绍</a></li>
            <li class="<?php if ($_smarty_tpl->tpl_vars['nav']->value=='ad'){?>dq<?php }?>"><a href="/business/ad#m">店铺广告图</a></li>
        </ul>
        <h3 class="fn-clear">运营管理</h3>
        <ul>
            <li class="<?php if ($_smarty_tpl->tpl_vars['nav']->value=='yunbuy'){?>dq<?php }?>"><a href="/business/yunbuy#m">商品管理</a></li>
            <li class="<?php if ($_smarty_tpl->tpl_vars['nav']->value=='order'){?>dq<?php }?>"><a href="/business/order#m">订单管理</a></li>
        </ul>
        <h3 class="fn-clear">资金记录</h3>
        <ul>
            <li class="<?php if ($_smarty_tpl->tpl_vars['nav']->value=='account'){?>dq<?php }?>"><a href="/business/account#m">分润记录</a></li>
        </ul>
    </div>
</div><?php }} ?>