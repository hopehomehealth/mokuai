<?php /* Smarty version Smarty-3.1.13, created on 2016-02-29 18:29:42
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\member\safe.html" */ ?>
<?php /*%%SmartyHeaderCode:963056d41d96d6c2b8-06825066%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb2200ffc02250b176ebc33db7f9ddb67bee91d8' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\member\\safe.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '963056d41d96d6c2b8-06825066',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'member' => 0,
    'site_config' => 0,
    'is_mobile' => 0,
    'is_banks' => 0,
    'is_address' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d41d96eef8f1_34415550',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d41d96eef8f1_34415550')) {function content_56d41d96eef8f1_34415550($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/member.css">
<style type="text/css">
    .list-address dl dd table th{ width: 30%; }
</style>
<div id="content" class="container main">
    <div class="tips-m">
        <div class="prompt">灰色代表已经绑定或设置</div>
    </div>
    <div class="list01 list-address">
        <dl>
            <dd>
                <table cellpadding="0" cellspcing="0">
                    <tr class="color03">
                        <th>手机号</th>
                        <td>
                            <b class="color01"><?php echo $_smarty_tpl->tpl_vars['member']->value['mobile'];?>
</b>(已绑定，您可享受<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
丰富的手机服务)<br/>
                            <a href="<?php echo url('/member/verifymobile');?>
">修改手机</a>
                        </td>
                    </tr>
                </table>
            </dd>
        </dl>
        <dl>
            <dd>
                <table cellpadding="0" cellspcing="0">
                    <tr class="color03">
                        <th>登录密码</th>
                        <td>
                            修改密码保护您的账户安全 <a href="<?php echo url('/member/info#pass');?>
" class="btn-small">修改密码</a>
                        </td>
                    </tr>
                </table>
            </dd>
        </dl>
        <dl>
            <dd>
                <table cellpadding="0" cellspcing="0">
                    <tr class="<?php if (!$_smarty_tpl->tpl_vars['is_mobile']->value){?>color03<?php }?>">
                        <th>资金密码</th>
                        <td>
                            修改资金密码保护您账户的资金安全，在出价的时候需要输入的密码(<?php if ($_smarty_tpl->tpl_vars['is_mobile']->value){?><span class="color01">未修改</span><?php }else{ ?>已修改<?php }?>，默认为注册手机后六位)。  <a href="<?php echo url('/member/chpaypass');?>
" class="btn-small">修改资金密码</a>
                        </td>
                    </tr>
                </table>
            </dd>
        </dl>
        <dl>
            <dd>
                <table cellpadding="0" cellspcing="0">
                    <tr class="<?php if ($_smarty_tpl->tpl_vars['member']->value['verify_email']){?>color03<?php }?>">
                        <th>电子邮箱</th>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['member']->value['email'];?>
<?php if ($_smarty_tpl->tpl_vars['member']->value['verify_email']){?>(已验证)<?php }else{ ?>(<span class="color01">未验证</span>)<?php }?>，邮箱验证后可通过邮箱找回密码。 <?php if ($_smarty_tpl->tpl_vars['member']->value['verify_email']){?><a href="<?php echo url('/member/info');?>
" class="btn-small">修改邮箱</a><?php }else{ ?><a href="<?php echo url('/member/verifyEmail');?>
" class="btn-small">验证邮箱</a><?php }?>
                        </td>
                    </tr>
                </table>
            </dd>
        </dl>
        <dl>
            <dd>
                <table cellpadding="0" cellspcing="0">
                    <tr class="<?php if ($_smarty_tpl->tpl_vars['member']->value['idcard']){?>color03<?php }?>">
                        <th>身份证</th>
                        <td>
                            设置用于提升账号的安全性和信任级别(<?php if ($_smarty_tpl->tpl_vars['member']->value['idcard']){?>已认证<?php }else{ ?><span class="color01">未认证</span><?php }?>，认证后不能修改)。 <a href="<?php echo url('/member/verifyidcard');?>
" class="btn-small"><?php if ($_smarty_tpl->tpl_vars['member']->value['idcard']){?>查看<?php }else{ ?>设置<?php }?></a>
                        </td>
                    </tr>
                </table>
            </dd>
        </dl>
        <dl>
            <dd>
                <table cellpadding="0" cellspcing="0">
                    <tr class="<?php if ($_smarty_tpl->tpl_vars['is_banks']->value){?>color03<?php }?>">
                        <th>银行卡</th>
                        <td>
                            银行卡用于提现，银行卡的户名必须与认证的身份证名字相同(<?php if ($_smarty_tpl->tpl_vars['is_banks']->value){?>已绑定<?php }else{ ?><span class="color01">未绑定</span><?php }?>)。 <a href="<?php echo url('/member/bankcard');?>
" class="btn-small">绑定</a>
                        </td>
                    </tr>
                </table>
            </dd>
        </dl>
        <dl>
            <dd>
                <table cellpadding="0" cellspcing="0">
                    <tr class="<?php if ($_smarty_tpl->tpl_vars['is_address']->value){?>color03<?php }?>">
                        <th>收货地址</th>
                        <td>
                            管理请认真填写，已保证您的商品能够及时签收 <a href="<?php echo url('/member/address');?>
" class="btn-small">管理</a>
                        </td>
                    </tr>
                </table>
            </dd>
        </dl>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>