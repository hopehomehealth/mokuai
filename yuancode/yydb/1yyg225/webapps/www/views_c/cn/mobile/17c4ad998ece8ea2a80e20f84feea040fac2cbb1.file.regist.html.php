<?php /* Smarty version Smarty-3.1.13, created on 2016-05-13 21:19:58
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\code\regist.html" */ ?>
<?php /*%%SmartyHeaderCode:32434566105365b9bf8-48406765%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17c4ad998ece8ea2a80e20f84feea040fac2cbb1' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\code\\regist.html',
      1 => 1463129542,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32434566105365b9bf8-48406765',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_566105367d4722_16853739',
  'variables' => 
  array (
    'gee' => 0,
    'geeJs' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_566105367d4722_16853739')) {function content_566105367d4722_16853739($_smarty_tpl) {?><?php if (@constant('TYPE_CODE')=='tou'){?>
<script type='text/javascript' charset='utf-8' src='http://js.touclick.com/js.touclick?b=<?php echo @constant('PUBLIC_KEY_CODE');?>
&pf=api&v=v2-2'></script>
<script type="text/javascript">
    var is_checked = false; //表示是否验证成功
    function tou_submit(formObj){
        if(is_checked === true){ return true; }
        else{
            window.TouClick.Start({
                website_key: '<?php echo @constant('PUBLIC_KEY_CODE');?>
',
                position_code: 0,
                args: { 'this_form': document.getElementById(formObj) },
                captcha_style: { 'margin-left':'50px', 'margin-top':'100px' },
                onSuccess: function (args, check_obj){
                    is_checked = true;
                    var this_form = args.this_form;
                    var hidden_input_key = document.createElement('input');
                    hidden_input_key.name = 'check_key';
                    hidden_input_key.value = check_obj.check_key;
                    hidden_input_key.type = 'hidden';
                    //将二次验证口令赋值到隐藏域
                    this_form.appendChild(hidden_input_key);
                    var hidden_input_address = document.createElement('input');
                    hidden_input_address.name = 'check_address';
                    hidden_input_address.value = check_obj.check_address;
                    hidden_input_address.type = 'hidden';
                    this_form.appendChild(hidden_input_address);
                    //this_form.submit();
                    return true;
                },
                onError: function (args){
                    //启用备用方案
                    return false;
                }
            });
            return false;
        }
    }
</script>

<?php }elseif(@constant('TYPE_CODE')=='gee'&&@constant('GEE_CODE')=='ok'){?>
    <?php if ($_smarty_tpl->tpl_vars['gee']->value==2){?>
    <script async type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['geeJs']->value;?>
"></script>
    <?php }else{ ?>
    <div class="form-box fn-clear" style="height:auto;">
        <span style="margin:0">
        <label><font class="label color01">滑动验证</font>：</label>
        <script async type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['geeJs']->value;?>
"></script>
        </span>
    </div>
    <?php }?>

<?php }else{ ?>
    <?php if (@constant('STPL')=='mobile'){?>
    <div class="ui-clr"></div>
    <div class="input code">
        <i class="ap-icon icon-code"></i>
        <input class="txt" type="text" placeholder="请输入答案" name="scode" id="scode" style="width: 80px;" />
    </div>
    <img src="/welcome/scode" class="imgcode" onclick="this.src='/welcome/scode?xrand='+Math.random();" style="vertical-align: middle" />
    <?php }else{ ?>
    <div class="form-box fn-clear" style="height:auto;">
        <label><font class="label">验证码</font>：</label>
        <input type="text" id="scode" name="scode" value="" class="inpt-style" style="width:190px" />
        <img src="/welcome/scode" class="imgcode" onclick="this.src='/welcome/scode?xrand='+Math.random();" />
        <div class="Validform_info"><span class="Validform_checktip"></span><span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
    </div>
    <?php }?>
<?php }?><?php }} ?>