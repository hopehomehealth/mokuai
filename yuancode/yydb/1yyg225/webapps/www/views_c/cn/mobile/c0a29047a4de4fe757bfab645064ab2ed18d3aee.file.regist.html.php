<?php /* Smarty version Smarty-3.1.13, created on 2016-03-24 19:59:47
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\member\regist.html" */ ?>
<?php /*%%SmartyHeaderCode:1430956611a49a062e5-98682506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0a29047a4de4fe757bfab645064ab2ed18d3aee' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\member\\regist.html',
      1 => 1458797536,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1430956611a49a062e5-98682506',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56611a49c2c055_49635265',
  'variables' => 
  array (
    'html_code' => 0,
    'site_config' => 0,
    'icon' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56611a49c2c055_49635265')) {function content_56611a49c2c055_49635265($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
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
                <div class="input" style="margin-bottom:5px;">
                    <i class="ap-icon icon-phone"></i>
                    <input class="txt" type="text" placeholder="请输入手机号" name="mobile" id="mobile" value="" />
                </div>
                <div style="padding: 0 0 10px 0;">保持通话，畅通无阻，<b class="color01" style="font-size: 12px;">发货验证</b>，准确送达！</div>

                <?php echo $_smarty_tpl->tpl_vars['html_code']->value;?>


                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['sms_open']==1&&statusTpl('sms_register')){?>
                <div class="input code">
                    <i class="ap-icon icon-code"></i>
                    <input class="txt" type="text" placeholder="请输入验证码" name="sms_code" id="sms_code" />
                </div>
                <input type="button" value="获取短信" onclick="getSmsVerify('sms_register')" id="btnSms" style="font-size:12px;" />
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
                <div style="text-align:center; padding: 10px 0;" class="msg_link">
                    <a href="<?php echo url('/member');?>
#free" class="color02" style="font-size:14px;">进入会员中心</a>
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