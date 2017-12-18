<?php /* Smarty version Smarty-3.1.13, created on 2016-12-19 18:32:54
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/member/safe.html" */ ?>
<?php /*%%SmartyHeaderCode:8722589675857b7569f4645-81454309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '094cf6908da72dd4a8adace20995af6aa9ecf238' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/member/safe.html',
      1 => 1457608734,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8722589675857b7569f4645-81454309',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'member' => 0,
    'site_config' => 0,
    'is_mobile' => 0,
    'is_banks' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5857b756ad6153_80187229',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5857b756ad6153_80187229')) {function content_5857b756ad6153_80187229($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">
            <div class="fn-clear hy-tjxh">
                <div class="title">
                    <h2>安全信息</h2>
                </div>
                <div class="hy-box">
                    <div class="hy-aqtable">
                        <table>
                            <tr>
                                <th>手机号：</th>
                                <td><?php echo $_smarty_tpl->tpl_vars['member']->value['mobile'];?>
(已绑定，您可享受<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
丰富的手机服务) </td>
                                <td class="hy-rza"><a href="<?php echo url('/member/verifymobile');?>
">修改手机</a></td>
                            </tr>
                            <tr>
                                <th>登录密码：</th>
                                <td>修改密码保护您的账户安全</td>
                                <td class="hy-rza"><a href="<?php echo url('/member/info');?>
">修改密码</a></td>
                            </tr>
                            <tr>
                                <th>资金密码：</th>
                                <td>修改资金密码保护您账户的资金安全，在出价的时候需要输入的密码(<?php if ($_smarty_tpl->tpl_vars['is_mobile']->value){?>已修改<?php }else{ ?><span class="color01">未修改</span><?php }?>，默认为注册手机后六位)。 </td>
                                <td class="hy-rza"><a href="<?php echo url('/member/chpaypass');?>
">修改资金密码</a></td>
                            </tr>
                            <tr>
                                <th>电子邮箱：</th>
                                <td><?php echo $_smarty_tpl->tpl_vars['member']->value['email'];?>
<?php if ($_smarty_tpl->tpl_vars['member']->value['verify_email']){?>(已验证)<?php }else{ ?>(<span class="color01">未验证</span>)<?php }?>，邮箱验证后可通过邮箱找回密码。</td>
                                <td class="hy-rza"><?php if ($_smarty_tpl->tpl_vars['member']->value['verify_email']){?><a href="<?php echo url('/member/info');?>
">修改邮箱</a><?php }else{ ?><a href="<?php echo url('/member/verifyEmail');?>
">验证邮箱</a><?php }?></td>
                            </tr>
                            <tr>
                                <th>身份证：</th>
                                <td>设置用于提升账号的安全性和信任级别(<?php if ($_smarty_tpl->tpl_vars['member']->value['idcard']){?>已认证<?php }else{ ?><span class="color01">未认证</span><?php }?>，认证后不能修改)。</td>
                                <td class="hy-rza"><a href="<?php echo url('/member/verifyidcard');?>
"><?php if ($_smarty_tpl->tpl_vars['member']->value['idcard']){?>查看<?php }else{ ?>设置<?php }?></a></td>
                            </tr>
                            <tr>
                                <th>银行卡：</th>
                                <td>银行卡用于提现，银行卡的户名必须与认证的身份证名字相同(<?php if ($_smarty_tpl->tpl_vars['is_banks']->value){?>已绑定<?php }else{ ?><span class="color01">未绑定</span><?php }?>)。</td>
                                <td class="hy-rza"><a href="<?php echo url('/member/bankcard');?>
">绑定</a></td>
                            </tr>
                            <tr>
                                <th>收货地址：</th>
                                <td>管理请认真填写，已保证您的商品能够及时签收  </td>
                                <td class="hy-rza"><a href="<?php echo url('/member/address');?>
">管理</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>