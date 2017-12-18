<?php /* Smarty version Smarty-3.1.13, created on 2016-02-26 14:07:27
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\auction\public_qujia.html" */ ?>
<?php /*%%SmartyHeaderCode:289705660fb74e83df1-22395509%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48c4e6c3b071b601b6a9c79c128c10fd4944141b' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\auction\\public_qujia.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '289705660fb74e83df1-22395509',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660fb74f0fd69_50959938',
  'variables' => 
  array (
    'data' => 0,
    'm' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660fb74f0fd69_50959938')) {function content_5660fb74f0fd69_50959938($_smarty_tpl) {?><div id="qujia" style="display:none;">
    <div class="qujia_box yh">
        <form id="qujiaForm" onsubmit="return false">
            <div class="form-box fn-clear">
                <label><font class="label">剩 余</font>： </label>
                <b id="leftTime_qujia" class="color01">请稍等, 正在载入中...</b>
            </div>

            <div class="form-box fn-clear">
                <label><font class="label">出 价</font>： </label>
                <select name="price" id="price">
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['priceList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['m']->value;?>
"><?php echo price_format($_smarty_tpl->tpl_vars['m']->value);?>
</option>
                    <?php } ?>
                </select>
                <label style="font-size:12px;"><input type="checkbox" name="auto" id="auto" value="1" />系统自动配价</label>
            </div>

            <div class="form-box fn-clear">
                <label><font class="label">资金密码</font>： </label>
                <input type="password" id="password_pay" name="password_pay" class="input" tabIndex="1" />
                <span class="tips_password"><a href="<?php echo url('/member/chpaypass');?>
">
                    <?php if ($_smarty_tpl->tpl_vars['data']->value['is_mobile']){?>
                    手机后六位
                    <?php }else{ ?>
                    忘记资金密码？
                    <?php }?>
                </a></span>
            </div>

            <div class="form-box fn-clear">
                <label><font class="label">安全验证</font>： </label>
                <input type="text" name="scode" id="scode" class="input" maxlength="4" tabIndex="2" />
                <img src="/welcome/scode" class="imgcode" onclick="this.src='/welcome/scode?xrand='+Math.random();" style="vertical-align: middle" />
            </div>

            <div class="pujia-button">
                <a href="javascript:;" onclick="submitQj()">确 定</a>
            </div>

            <input name="id" id="id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['act_id'];?>
" />
        </form>
    </div>
</div>

<script type="text/javascript" src="/style/jquery.form.js"></script>
<script type="text/javascript">
    onload_leftTime('_qujia',"<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['diff_time'];?>
","<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['status'];?>
");

    //自动配价
    $('#auto').bind('click',function(){
        if($(this).is(':checked')){
            $('#price').hide();
        }else{
            $('#price').show();
        }
    }).click();

    //出价弹窗
    $('#qjA').click(function(){
        art.dialog({
            id: 'art_qujia',
            fixed: true,
            lock: true,
            ok: false,
            padding: '20px 30px',
            title: "<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
出价",
            content: document.getElementById('qujia')
        });
        if($('#password_pay').length>0) $('#password_pay').focus().val('');
        if($('.imgcode').length>0) $('.imgcode').click();
    });

    //提交
    function submitQj(){
        if($.trim($('#password_pay').val())==''){
            layer.msg('请输入资金密码',1);
            return false;
        }
        art.dialog.list['art_qujia'].close();

        var D = $('#qujiaForm').formSerialize();
        $.post("/auction/bid", D,
            function(data){
                if(data.msg){
                    var params = ' ';
                    if(data.url){
                        params = function(){
                            location.href=data.url;
                        };
                    }
                    layer.alert(data.msg,data.type?data.type:8,params);
                }
                if(data.count>0) $('#BidCount').html(data.count);
                if(data.price>0){
                    $('#CurPrice').html(data.price);
                    load_log(true);
                }
            },"json");
        return false;
    }
</script><?php }} ?>