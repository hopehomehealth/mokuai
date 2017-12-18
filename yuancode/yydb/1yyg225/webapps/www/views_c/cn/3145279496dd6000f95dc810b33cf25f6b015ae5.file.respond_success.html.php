<?php /* Smarty version Smarty-3.1.13, created on 2016-12-17 19:35:08
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/respond_success.html" */ ?>
<?php /*%%SmartyHeaderCode:1896213311585522ec0c6df0-85206950%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3145279496dd6000f95dc810b33cf25f6b015ae5' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/respond_success.html',
      1 => 1462413256,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1896213311585522ec0c6df0-85206950',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_585522ec1526b1_72898150',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_585522ec1526b1_72898150')) {function content_585522ec1526b1_72898150($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
    a{ cursor: pointer; }
    .body{ position: relative; margin: 80px 0 150px 350px; padding-left: 60px; }
    .body i{ position: absolute; left: 0; top: 0; background: url('/style/images/pay_icon.png') no-repeat -40px 0; display: block; width: 44px; height: 44px; }
    h3{ font-size: 18px; line-height: 44px; color: #333; padding:0; }
    .msg{ color: #999; padding: 5px 0 10px; }
    .btn-box{ line-height: 34px; }
    .btn{ background: #e53d09; color: #fff; width: 140px; height: 24px; line-height: 24px; text-align: center; padding: 5px 0; font-size: 18px; border-radius: 5px; display: block; margin-bottom: 10px; float: left; }
    .btn:hover{ background: #ff4e00; color: #fff; }
    .back{ color: #DD344F; }
    .back:hover{ text-decoration: underline; }
    .btn-box span{ padding-left: 15px; color: #DD344F; }
    .btn-box span a{ color: #DD344F; font-size: 14px; }
    .btn-box span a:hover{ text-decoration: underline; }
    .btn-box span font{ padding: 0 5px; }
    .clear{ clear:both; }
</style>

<div class="container">
    <div class="body">
        <i></i>
        <h3>恭喜您，参与成功啦~请等待幸运号码揭晓</h3>
        <div class="msg st">揭晓并成功获得后，将发送短信和邮件通知您领取！</div>
        <div class="btn-box">
            <a id="j_finish" class="btn" href="/yunbuy">继续<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</a>
            <span>
                <a href="/member/address">完善收货地址</a>
                <font> | </font>
                <a href="/member/db?return">查看夺宝记录</a>
            </span>
            <div class="clear"></div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>