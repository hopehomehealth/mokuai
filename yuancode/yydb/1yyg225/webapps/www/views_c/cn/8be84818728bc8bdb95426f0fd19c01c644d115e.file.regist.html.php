<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 17:36:59
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\cn\member\regist.html" */ ?>
<?php /*%%SmartyHeaderCode:14059565975bb4112e2-80397222%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8be84818728bc8bdb95426f0fd19c01c644d115e' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\cn\\member\\regist.html',
      1 => 1425277952,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14059565975bb4112e2-80397222',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'html_code' => 0,
    'site_config' => 0,
    'icon' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565975bb4d2cb2_08821228',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565975bb4d2cb2_08821228')) {function content_565975bb4d2cb2_08821228($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['mod'])) {$_smarty_tpl->tpl_vars['mod'] = clone $_smarty_tpl->tpl_vars['mod'];
$_smarty_tpl->tpl_vars['mod']->value = 'login'; $_smarty_tpl->tpl_vars['mod']->nocache = null; $_smarty_tpl->tpl_vars['mod']->scope = 0;
} else $_smarty_tpl->tpl_vars['mod'] = new Smarty_variable('login', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript" src="/style/jquery.form.js"></script>
<link type="text/css" rel="stylesheet" href="/style/css/member.css" />
<link type="text/css" rel="stylesheet" href="/style/css/validform.css" />
<div class="dl-box regist-box fn-clear">
    <a href="<?php echo url('/content/chart');?>
" class="atip" title="【导购流程、了解商城】"></a>
    <div class="regnav fn-clear">
        <ul class="ul1">
            <li class="li0"><i></i><span>欢迎注册爱我拍</span></li>
            <li class="li1 hover"><i></i><span>填写帐户信息</span></li>
            <li class="li2"><i></i><span>验证帐户信息</span></li>
            <li class="li3"><i></i><span>注册成功</span></li>
        </ul>
    </div>

    <form id="regForm" method="post">
        <div class="fn-left dl-boxl" id="step1">
            <?php if ($_SESSION['oauth']){?>
            <h2 class="color01" style="font-size: 16px;padding: 0 0 15px 60px;">尊敬的<?php if ($_SESSION['oauth']['type']=='qq'){?>QQ<?php }else{ ?>新浪<?php }?>用户请完善您的信息</h2>
            <div class="form-box fn-clear">
                <label><font class="label">用户名</font>：</label><input type="text" class="inpt-style icon-user" id="username" name="username" value="<?php echo $_SESSION['oauth']['nickname'];?>
" autocomplete="false" datatype="*4-40" ajaxurl="/member/check_username" />
                <div class="Validform_info"><span class="Validform_checktip"></span><span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
            </div>
            <?php }else{ ?>
            <div class="form-box fn-clear">
                <label><font class="label">邮箱/手机</font>：</label><input type="text" class="inpt-style icon-user" id="username" name="username" value="" autocomplete="false" datatype="m|e,*2-40" ajaxurl="/member/check_username" nullmsg="请填写邮箱或手机号" errormsg="邮箱或手机格式不正确" /><span>*</span>
                <div class="Validform_info"><span class="Validform_checktip"></span><span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
            </div>
            <div class="form-box fn-clear">
                <label><font class="label">设置密码</font>：</label><input type="password" id="password" name="password" value="" datatype="*" class="inpt-style icon-pass" nullmsg="请设置密码" /><span>*</span>
                <div class="Validform_info"><span class="Validform_checktip"></span><span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
            </div>
            <div class="form-box fn-clear">
                <label><font class="label">确认密码</font>：</label><input  type="password" id="confirm_password" name="confirm_password" value="" recheck="password" datatype="*" class="inpt-style icon-pass" /><span>*</span>
                <div class="Validform_info"><span class="Validform_checktip"></span><span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
            </div>
            <?php }?>
            <div class="fn-clear hy-zcxy">
                <input name="agree" type="checkbox" value="1" datatype="*"  nullmsg="请同意服务协议" checked/>我已阅读并同意《<a href="javascript:;" id="Agree">爱我拍用户服务协议</a>》
            </div>
            <div class="form-box fn-clear">
                <label>&nbsp;</label><input name="Submit" type="submit" value="立即注册" class="hy-btn" />
            </div>
        </div>
        <div class="fn-left dl-boxl" id="step2" style="display: none;">
            <div class="form-box fn-clear" style="padding-bottom: 5px;">
                <label><font class="label">手机号</font>：</label><input name="mobile" id="mobile" value="" type="text" class="inpt-style" /><span>*</span>
            </div>
            <div class="fn-clear" style="padding: 0 0 10px 90px;font-size:12px;">保持通话，畅通无阻，<b class="color01" style="font-size: 14px;">发货验证</b>，准确送达！</div>
            <?php echo $_smarty_tpl->tpl_vars['html_code']->value;?>

            <?php if ($_smarty_tpl->tpl_vars['site_config']->value['sms_open']==1&&statusTpl('sms_register')){?>
            <div class="form-box fn-clear">
                <label>手机验证码：</label><input type="text" name="sms_code" id="sms_code" class="inpt-style" value="" style="width: 170px;" /><br/>
                <p style="padding:5px 0 0 75px;">
                    <input type="button" value="获取短信验证码" onclick="getSmsVerify('sms_register')" id="btnSms"  class="inpt2 hy-btn2" /> <input type="button" value="获取语音验证码" onclick="getVoiceVerify('#btnVoice')" id="btnVoice"  class="inpt2 hy-btn2" />
                </p>
            </div>
            <div class="fn-clear" style="margin-bottom:10px;"></div>
            <?php }?>

            <div class="form-box fn-clear">
                <label>&nbsp;</label>
                <input name="Submit" type="submit" value="确认注册" class="hy-btn" id="submit-button" />
            </div>
        </div>
    </form>
    <div id="regSuc" style="display: none;">
        <div style="text-align:center; padding:20px 0;">
            <h2 style="font-size:30px;" class="msg_<?php echo $_smarty_tpl->tpl_vars['icon']->value;?>
">恭喜您成为爱我拍尊贵的会员！</h2>
            <div style="text-align:center; padding: 10px 0;" class="msg_link">
                <a href="<?php echo url('/member');?>
#free" target="_blank" class="color02" style="margin:0 5px; font-size:24px;">会员中心领拍币</a>
                <a href="<?php echo url('/content/chart');?>
" target="_blank" class="color02" style="margin:0 5px; font-size:24px;">爱我拍网站流程</a>
            </div>
        </div>
    </div>
</div>
<div class="layer_agree"><div class="con"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'block','mark'=>'agree'),$_smarty_tpl);?>
</div></div>

<script type="text/javascript" src="/style/Validform_min.js"></script>
<script type="text/javascript">
    var step = 1;
    //触点验证码
    var typeCod = "<?php echo @constant('TYPE_CODE');?>
";

    $(function(){
        $("#regForm").Validform({
            tiptype:function(msg,o,cssctl){ validTip(msg,o,cssctl); },
            showAllError:true,
            label:".label",
            beforeSubmit:function(){
                //触点验证码
                if(typeCod=='tou' && step==2 && tou_submit('regForm')==false){ return false; }

                var D = $('#regForm').formSerialize();
                D=D+'&step='+step;
                $.post("/member/submit", D,
                    function(data){
                        if(data.error==1){
                            if(typeCod=='tou') is_checked = false;
                            layer.alert(data.msg,8);
                        }
                        else{
                            if(step == 1){
                                step = 2;
                                $('#step1').hide();
                                $('#step2').show();
                                $('#mobile').val(data.mobile);
                                $('.regnav ul li').removeClass('hover');
                                $('.regnav ul .li2').addClass('hover');
                            }else if(step == 2){
                                $('#step1_form').hide();
                                $('#step2').hide();
                                $('.regist-box').css('background','none');
                                $('#regSuc').show();
                                $('.regnav ul li').removeClass('hover');
                                $('.regnav ul .li3').addClass('hover');
                            }
                        }
                    },"json"
                );
                return false;
            }
        });
        $('#Agree').bind('click',function(){
            $.layer({
                type: 1,
                shade: [0.5, '#000'],
                shadeClose: true,
                fix: true,
                area: ['auto', 'auto'],
                title: false,
                border: [0],
                page: { dom: '.layer_agree' }
            });
        })
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>