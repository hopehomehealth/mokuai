<?php /* Smarty version Smarty-3.1.13, created on 2015-12-02 17:49:35
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\member\chpaypass.html" */ ?>
<?php /*%%SmartyHeaderCode:11608565ebeaf368a24-26842189%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bbdbceffaa5e42f72dc1f0d76a5904e0fc7180f4' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\member\\chpaypass.html',
      1 => 1422264982,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11608565ebeaf368a24-26842189',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'site_config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565ebeaf40cb44_96333127',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565ebeaf40cb44_96333127')) {function content_565ebeaf40cb44_96333127($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">
            <div class="fn-clear hy-tjxh">
                <div class="title">
                    <h2>资金密码</h2>
                </div>
                <div class="hy-box">
                    <div class="hy-yhk">
                        <form action="" target="iframeNews" method="post">
                            <table>
                                <tr>
                                    <th>新资金密码：</th>
                                    <td><input name="pass1" type="password" value=""></td>
                                </tr>
                                <tr>
                                    <th>确认密码：</th>
                                    <td><input name="pass2" type="password" value=""></td>
                                </tr>
                                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['sms_open']==1&&statusTpl('sms_chpaypass')){?>
                                <tr>
                                    <th>短信验证码</th>
                                    <td><input type="text" name="sms_code" value=""><input type="button" value="获取短信验证码" onclick="getSmsVerify('sms_chpaypass')" id="btnSms" /></td>
                                </tr>
                                <?php }?>
                                <tr>
                                    <th> &nbsp;</th>
                                    <td class="">
                                        <input name="Submit" type="submit" value="确定修改" class="hy-btn2 fn-left" />
                                        <input type="hidden" id="mobile" value="" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>