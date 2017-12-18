<?php /* Smarty version Smarty-3.1.13, created on 2016-02-29 18:36:54
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\member\verifyidcard.html" */ ?>
<?php /*%%SmartyHeaderCode:27456d41f46108b49-12645783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9836b85045a755dc4bc9bd7308bf51a64a0d1f5e' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\member\\verifyidcard.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27456d41f46108b49-12645783',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'site_config' => 0,
    'verify' => 0,
    'idcard' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d41f462d6ba5_64134544',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d41f462d6ba5_64134544')) {function content_56d41f462d6ba5_64134544($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/member.css">
<style type="text/css">
    .form-m .item dt{ width:100px; }
</style>
<div id="content" class="container main">
    <div class="tips-m">
        <div class="prompt">实名认证有利于提升账号的安全性和信任级别，请使用真实的身份证进行实名认证，<span class="color01">经验证身份证姓名和证号不符，有人为处理的，将扣十元保证金，</span>感谢您对<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
的支持！</div>
        <?php if ($_smarty_tpl->tpl_vars['verify']->value&&$_smarty_tpl->tpl_vars['verify']->value['status']!=3){?>
        <?php if ($_smarty_tpl->tpl_vars['verify']->value['status']==1){?><div class="prompt">您提交的认证身份证，我们正在审核中请耐心等待！</div><?php }?>
        <?php }else{ ?>
        <?php if ($_smarty_tpl->tpl_vars['verify']->value['remark']){?><div class="prompt">未通过审核，请重新提交认证(拒绝理由-<?php echo $_smarty_tpl->tpl_vars['verify']->value['remark'];?>
)！</div><?php }?>
        <?php }?>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['verify']->value&&$_smarty_tpl->tpl_vars['verify']->value['status']!=3){?>
    <div class="form-m">
        <div class="item ui-clr">
            <dl>
                <dt class="color03">姓 名：</dt>
                <dd><?php echo $_smarty_tpl->tpl_vars['verify']->value['realname'];?>
</dd>
            </dl>
        </div>
        <div class="item ui-clr">
            <dl>
                <dt class="color03">身份证号：</dt>
                <dd><?php echo $_smarty_tpl->tpl_vars['verify']->value['card'];?>
</dd>
            </dl>
        </div>
        <div class="item ui-clr">
            <dl>
                <dt class="color03">身份证正面照：</dt>
                <dd><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['verify']->value['card_image'],'width'=>150,'type'=>0,'dir'=>'idcard'),$_smarty_tpl);?>
" width="150" id="idcard"/></dd>
            </dl>
        </div>
        <div class="item ui-clr">
            <dl>
                <dt class="color03">身份证反面照：</dt>
                <dd><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['verify']->value['card_image2'],'width'=>150,'type'=>0,'dir'=>'idcard'),$_smarty_tpl);?>
" width="150" id="idcard"/></dd>
            </dl>
        </div>
        <input type="button" value="返回" class="btn" onclick="window.history.go(-1)" />
    </div>

    <?php }else{ ?>
    <div class="form-m">
        <form action="" target="iframeNews" method="post" id="submit_form">
        <div class="item ui-clr">
            <dl>
                <dt class="color03">姓 名：</dt>
                <dd>
                    <input type="text" class="input-m" name="realname" value="" />
                    <div class="tip-m">(请填写您身份证上的名字)</div>
                </dd>
            </dl>
        </div>
        <div class="item ui-clr">
            <dl>
                <dt class="color03">身份证号：</dt>
                <dd>
                    <input type="text" class="input-m" name="card" value="" />
                    <div class="tip-m">(请填写真实的身份证号码，身份证号码是18位)</div>
                </dd>
            </dl>
        </div>
        <div class="item ui-clr">
            <dl>
                <dt class="color03">身份证正面照：</dt>
                <dd>
                    <div class="fn-clear mt10">
                        <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['idcard']->value,'type'=>0,'nopic'=>'/upload/idcard.jpg','width'=>150,'dir'=>'idcard'),$_smarty_tpl);?>
" width="150" id="idcard" />
                    </div>
                    <?php echo upload_btn('idcard',500,500);?>

                    <div class="tip-m">(请确保身份证全部信息清晰)</div>
                </dd>
            </dl>
        </div>
        <div class="item ui-clr">
            <dl>
                <dt class="color03">身份证反面照：</dt>
                <dd>
                    <div class="fn-clear mt10">
                        <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['idcard']->value,'type'=>0,'nopic'=>'/upload/idcard2.jpg','width'=>150,'dir'=>'idcard'),$_smarty_tpl);?>
" width="150" id="idcard2" />
                    </div>
                    <div style="white-space: nowrap"><?php echo upload_btn('idcard2',500,500);?>
</div>
                    <div class="tip-m">(请确保身份证全部信息清晰)</div>
                    <div class="color01">如果身份证实名认证，审核不通过。再次审核，将被要求提供手持身份证正反面照。</div>
                </dd>
            </dl>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['site_config']->value['sms_open']==1&&statusTpl('sms_idcard')){?>
        <div class="item ui-clr">
            <dl>
                <dt class="color03">短信验证码：</dt>
                <dd>
                    <input type="text" name="sms_code" class="input-m" value="" style="width: 80px;" />
                    <input type="button" value="获取短信验证码" onclick="getSmsVerify('sms_idcard')" id="btnSms" />
                </dd>
            </dl>
        </div>
        <?php }?>
        <input type="hidden" name="Submit" value="1">
        <input type="submit" value="确定" class="btn" />
        </form>
    </div>
    <?php }?>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>