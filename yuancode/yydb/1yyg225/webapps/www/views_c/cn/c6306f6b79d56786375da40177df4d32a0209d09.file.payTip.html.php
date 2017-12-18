<?php /* Smarty version Smarty-3.1.13, created on 2016-04-25 15:25:26
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\yunbuy\payTip.html" */ ?>
<?php /*%%SmartyHeaderCode:30669571dc666e11136-59713866%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6306f6b79d56786375da40177df4d32a0209d09' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\yunbuy\\payTip.html',
      1 => 1461293215,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30669571dc666e11136-59713866',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_571dc666e4e1c3_30861223',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571dc666e4e1c3_30861223')) {function content_571dc666e4e1c3_30861223($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
    a{ cursor: pointer; }
    body{ padding:30px 0 0 60px; }
    .body{ position: relative; padding-left: 40px; }
    .body i{ position: absolute; left: 0; top: 0; background: url('/style/images/icons.png') no-repeat -160px -36px; display: block; width: 32px; height: 32px; }
    h3{ font-size: 18px; line-height: 26px; font-weight: normal; color: #333; padding:0; }
    .msg{ color: #999; padding: 10px 0 15px; }
    .btn{ background: #e53d09; color: #fff; width: 160px; height: 24px; text-align: center; padding: 5px 0; font-size: 18px; border-radius: 5px; display: block; margin-bottom: 10px; }
    .btn:hover{ background: #ff4e00; color: #fff; }
    .back{ color: #DD344F; }
    .back:hover{ text-decoration: underline; }
</style>

<div class="body">
    <i></i>
    <h3>请您在新打开页面完成支付</h3>
    <div class="msg">付款完成前请不要关闭此窗口</div>
    <div class="btn-box">
        <a id="j_finish" class="btn">已完成付款</a>
        <a onclick="top.layer.closeAll()" class="back st">支付遇到问题？返回重新选择</a>
    </div>
</div>


<script type="text/javascript">
    $(function(){
        $('#j_finish').bind('click',function(){
            top.location.href='/member/db?return';
            top.layer.closeAll();
        });
    })
</script>


</body>
</html><?php }} ?>