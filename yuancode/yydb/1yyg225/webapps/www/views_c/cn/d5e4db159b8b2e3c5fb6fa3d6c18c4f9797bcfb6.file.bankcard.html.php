<?php /* Smarty version Smarty-3.1.13, created on 2016-03-11 13:34:02
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\member\bankcard.html" */ ?>
<?php /*%%SmartyHeaderCode:30229566103f5e00071-42672656%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5e4db159b8b2e3c5fb6fa3d6c18c4f9797bcfb6' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\member\\bankcard.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30229566103f5e00071-42672656',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_566103f61b2656_51541182',
  'variables' => 
  array (
    'member' => 0,
    'row' => 0,
    'site_config' => 0,
    'bankcard' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566103f61b2656_51541182')) {function content_566103f61b2656_51541182($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">

            <div class="fn-clear hy-tjxh">
                <div class="title">
                    <h2>绑定银行卡</h2>
                </div>
                <div class="hy-box">
                    <div class="hy-yhk">
                        <p class="hy-ts1">请先进行身份证实名认证且<strong class="color01">银行帐户名必须写实名认证的姓名一致</strong>。</p>
                        <form action="" method="post" id="bankcard_form" target="iframeNews">
                        <table>
                            <tr>
                                <th>银行卡持卡人：</th>
                                <td><?php echo $_smarty_tpl->tpl_vars['member']->value['realname'];?>
</td>
                            </tr>
                            <tr>
                                <th>银行名称：</th>
                                <td><input name="bankname" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['bankname'];?>
" type="text" class="inpt-style2 w330" /></td>
                            </tr>
                            <tr>
                                <th>银行卡号：</th>
                                <td><input name="bankcard" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['bankcard'];?>
" type="text" class="inpt-style2 w330" /></td>
                            </tr>
                            <tr>
                                <th>银行开户地：</th>
                                <td><input name="bankaddress" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['bankaddress'];?>
" type="text" class="inpt-style2 w330" /></td>
                            </tr>
                            <tr>
                                <th>设为默认: </th>
                                <td><input type="checkbox" name="is_default" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['is_default']){?>checked<?php }?>></td>
                            </tr>
                            <?php if ($_smarty_tpl->tpl_vars['site_config']->value['sms_open']==1&&statusTpl('sms_bankcard')){?>
                            <tr>
                                <th> 短信验证码：</th>
                                <td><input type="text" name="sms_code" value=""><input type="button" value="获取短信验证码" onclick="getSmsVerify('sms_bankcard')" id="btnSms" /></td>
                            </tr>
                            <?php }?>
                            <tr>
                                <th> &nbsp;</th>
                                <td class="">
                                    <input name="Submit" type="submit" value="确定" class="hy-btn2 fn-left" />
                                    <input type="button" value="返回" class="hy-btn2" onclick="window.history.go(-1);" />
                                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"/>
                                </td>
                            </tr>
                        </table>
                        </form>
                    </div>
                    <div class="mt15 hy-table">
                        <table>
                            <tr>
                                <th class="td_left" width="10%">持卡人</th>
                                <th class="td_left" width="15%">银行名称</th>
                                <th class="td_left" width="30%">银行卡号</th>
                                <th width="30%">开户行所在地</th>
                                <th width="5%">默认</th>
                                <th>操作</th>
                            </tr>
                            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bankcard']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                            <tr>
                                <td class="td_left"><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</td>
                                <td class="td_left"><?php echo $_smarty_tpl->tpl_vars['m']->value['bankname'];?>
</td>
                                <td class="td_left"><?php echo $_smarty_tpl->tpl_vars['m']->value['bankcard'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['m']->value['bankaddress'];?>
</td>
                                <td><?php if ($_smarty_tpl->tpl_vars['m']->value['is_default']){?><span class="color01">默认</span><?php }?></td>
                                <td class="hy-rza"><a href="<?php echo url('/member/bankcard/');?>
<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
">编辑</a> <a href="javascript:zz_confirm('您确定要删除该银行账户?','<?php echo url('/member/bankcard_del/');?>
<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
');">删除</a></td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>