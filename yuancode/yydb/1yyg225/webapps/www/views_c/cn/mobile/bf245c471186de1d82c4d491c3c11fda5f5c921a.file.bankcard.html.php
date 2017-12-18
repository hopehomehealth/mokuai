<?php /* Smarty version Smarty-3.1.13, created on 2016-03-11 13:34:44
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\member\bankcard.html" */ ?>
<?php /*%%SmartyHeaderCode:1961156e258f49db088-13698208%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf245c471186de1d82c4d491c3c11fda5f5c921a' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\member\\bankcard.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1961156e258f49db088-13698208',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'member' => 0,
    'site_config' => 0,
    'bankcard' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56e258f4c30f19_67630415',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e258f4c30f19_67630415')) {function content_56e258f4c30f19_67630415($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/member.css">
<div id="content" class="container main">
    <div class="tips-m">
        <?php if ($_smarty_tpl->tpl_vars['row']->value['id']){?>编辑<?php }else{ ?>新增<?php }?>银行卡信息
        <?php if ($_smarty_tpl->tpl_vars['row']->value['id']){?>
        <a href="/member/bankcard" class="color02">[新增]</a>
        <?php }?>
        <div class="prompt">银行卡主要用于申请提现，<span class="color01">请先进行身份证实名认证，否则无法使用取现功能。</span></div>
    </div>

    <div class="form-m">
        <form action="" method="post" id="bankcard_form" target="iframeNews">
            <div class="item ui-clr">
                <dl>
                    <dt class="color03">银行卡持卡人：</dt>
                    <dd>
                        <?php echo $_smarty_tpl->tpl_vars['member']->value['realname'];?>

                    </dd>
                </dl>
            </div>
            <div class="item ui-clr">
                <dl>
                    <dt class="color03">银行名称：</dt>
                    <dd>
                        <input name="bankname" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['bankname'];?>
" type="text" class="input-m">
                    </dd>
                </dl>
            </div>
            <div class="item ui-clr">
                <dl>
                    <dt class="color03">银行卡号：</dt>
                    <dd>
                        <input name="bankcard" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['bankcard'];?>
" type="text" class="input-m">
                    </dd>
                </dl>
            </div>
            <div class="item ui-clr">
                <dl>
                    <dt class="color03">银行开户地：</dt>
                    <dd>
                        <input name="bankaddress" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['bankaddress'];?>
" type="text" class="input-m">
                    </dd>
                </dl>
            </div>
            <div class="item ui-clr">
                <dl>
                    <dt class="color03">设为默认：</dt>
                    <dd>
                        <input type="checkbox" name="is_default" value="1" <?php if ($_smarty_tpl->tpl_vars['row']->value['is_default']){?>checked<?php }?>>
                    </dd>
                </dl>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['site_config']->value['sms_open']==1&&statusTpl('sms_bankcard')){?>
            <div class="item ui-clr">
                <dl>
                    <dt class="color03">短信验证码：</dt>
                    <dd>
                        <input type="text" name="sms_code" class="input-m" value="" style="width: 80px;" />
                        <input type="button" value="获取短信验证码" onclick="getSmsVerify('sms_bankcard')" id="btnSms" />
                    </dd>
                </dl>
            </div>
            <?php }?>
            <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
"/>
            <input name="Submit" type="submit" value="保 存" class="btn" />
        </form>
    </div>

    <div class="list01 list-address">
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['bankcard']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <dl class="item">
            <dt><b><?php echo $_smarty_tpl->tpl_vars['m']->value['bankname'];?>
（<?php echo $_smarty_tpl->tpl_vars['m']->value['bankcard'];?>
）</b> </dt>
            <dd>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th>持卡人</th>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>

                        </td>
                    </tr>
                    <tr>
                        <th nowrap>开户行所在地</th>
                        <td>
                            <?php echo $_smarty_tpl->tpl_vars['m']->value['bankaddress'];?>

                        </td>
                    </tr>
                    <tr>
                        <th>操作</th>
                        <td>
                            <a href="<?php echo url('/member/bankcard/');?>
<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" class="color02">编辑</a>&nbsp;&nbsp;
                            <a href="javascript:zz_confirm('您确定要删除该银行账户?','<?php echo url('/member/bankcard_del/');?>
<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
');" class="color02">删除</a>
                            <?php if ($_smarty_tpl->tpl_vars['m']->value['is_default']){?>&nbsp;&nbsp;<span class="color01">默认</span><?php }?>
                        </td>
                    </tr>
                </table>
            </dd>
        </dl>
        <?php } ?>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>