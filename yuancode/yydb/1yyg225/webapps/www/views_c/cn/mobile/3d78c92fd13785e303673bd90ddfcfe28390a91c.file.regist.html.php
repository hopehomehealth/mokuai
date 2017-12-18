<?php /* Smarty version Smarty-3.1.13, created on 2016-12-09 16:32:15
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/regist.html" */ ?>
<?php /*%%SmartyHeaderCode:1380528727584a6c0feee899-77890275%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d78c92fd13785e303673bd90ddfcfe28390a91c' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/regist.html',
      1 => 1481177906,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1380528727584a6c0feee899-77890275',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'html_code' => 0,
    'site_config' => 0,
    'icon' => 0,
    'back_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584a6c10055f86_17152514',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584a6c10055f86_17152514')) {function content_584a6c10055f86_17152514($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="content" class="container main">
    <div class="user-box">
        <form id="regForm" method="post">
            <div id="step1">
                <?php if ($_SESSION['oauth']){?>
                <div class="form-box">
                    <div class="Validform_checktip color01"></div>
                    <div class="input">
                        <i class="ap-icon icon-name"></i>
                        <input class="txt" type="text" name="username" placeholder="用户名" value="<?php echo $_SESSION['oauth']['nickname'];?>
" autocomplete="false" datatype="*2-40" ajaxurl="/member/check_username" />
                    </div>
                </div>
                <?php }else{ ?>
                <div class="form-box">
                    <div class="Validform_checktip color01"></div>
                    <div class="input">
                        <i class="ap-icon icon-name"></i>
                        <input class="txt" type="text" name="username" placeholder="手机/邮箱" autocomplete="false" datatype="m|e,*2-40" ajaxurl="/member/check_username" nullmsg="请填写邮箱或手机号" errormsg="邮箱或手机格式不正确" />
                    </div>
                </div>
                <?php }?>
                <div class="form-box">
                    <div class="Validform_checktip color01"></div>
                    <div class="input">
                        <i class="ap-icon icon-psw"></i>
                        <input class="txt" type="password" id="password" name="password" placeholder="请输入密码" datatype="*" nullmsg="请设置密码" />
                    </div>
                </div>
                <div class="form-box">
                    <div class="Validform_checktip color01"></div>
                    <div class="input">
                        <i class="ap-icon icon-psw"></i>
                        <input class="txt" type="password" name="confirm_password" placeholder="确认密码" recheck="password" datatype="*" nullmsg="请确认密码" errormsg="两次输入的密码不一致" />
                    </div>
                </div>
            </div>
            <div id="step2" style="display: none;">
                <div class="input">
                    <i class="ap-icon icon-phone"></i>
                    <input class="txt" type="text" placeholder="请输入手机号" name="mobile" id="mobile" value="" />
                </div>

                <?php echo $_smarty_tpl->tpl_vars['html_code']->value;?>


                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['sms_open']==1&&statusTpl('sms_register')){?>
                <div class="input code">
                    <i class="ap-icon icon-code"></i>
                    <input class="txt" type="text" placeholder="请输入验证码" name="sms_code" id="sms_code" />
                </div>
                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['voice_open']&&$_smarty_tpl->tpl_vars['site_config']->value['voice_sid']){?>
                <input type="button" value="获取语音" onclick="getVoiceVerify('#btnVoice')" id="btnVoice" style="font-size:12px;" />
                <?php }else{ ?>
                <input type="button" value="获取短信" onclick="getSmsVerify('sms_register')" id="btnSms" style="font-size:12px;" />
                <?php }?>
                <?php }?>
            </div>

            <input class="btn" type="submit" value="提 交 注 册" />
            <div class="ubox-b ui-clr">
                <p class="ui-right">
                    <a href="<?php echo url('/member/login');?>
">已有账号？立即登录</a>
                </p>
            </div>
        </form>

        <div id="regSuc" style="display: none;">
            <div style="text-align:center; padding:30px 0 0;">
                <h2 style="font-size:20px;" class="msg_<?php echo $_smarty_tpl->tpl_vars['icon']->value;?>
">恭喜您成为<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
尊贵的会员！</h2>
                <div style="text-align:center; padding: 10px 0; font-size:14px;" class="msg_link">
                    <a href="<?php echo url('/member');?>
#free" class="color02" style="margin:0 5px;">会员中心</a>
                    <?php if ($_smarty_tpl->tpl_vars['back_url']->value){?>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['back_url']->value;?>
" class="color02" style="margin:0 5px;">返回上一页</a>
                    <?php }?>
                </div>
            </div>
        </div>

    </div>
</div>


<script type="text/javascript" src="/style/jquery.form.js"></script>
<script type="text/javascript" src="/style/Validform_min.js"></script>
<script type="text/javascript" src="/style/mobile/js/script.js"></script>
<script type="text/javascript">
    var step = 1;
    //触点验证码
    var typeCod = "{$smarty.const.TYPE_CODE}";

    $(function(){
        $("#regForm").Validform({
            tiptype:function(msg,o,cssctl){ validTip(msg,o,cssctl); },
            showAllError:true,
            beforeSubmit:function(){
                //触点验证码
                if(typeCod=='tou' && step==2 && tou_submit('regForm')==false){ return false; }

                var D = $('#regForm').formSerialize();
                D=D+'&step='+step;
                $.post("/member/submit", D,
                    function(data){
                        if(data.error==1){
                            layer.alert(data.msg,8);
                        }
                        else{
                            if(step == 1){
                                step = 2;
                                $('#step1').hide();
                                $('#step2').show();
                                $('#mobile').val(data.mobile);
                            }else if(step == 2){
                                step = 2;
                                $('#regForm').hide();
                                $('#regSuc').show();
                            }
                        }
                    },"json"
                );
                return false;
            }
        });
    })
</script>

</body>
</html><?php }} ?>