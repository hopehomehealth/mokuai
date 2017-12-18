<?php /* Smarty version Smarty-3.1.13, created on 2016-12-14 13:32:45
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/payment_weixin.html" */ ?>
<?php /*%%SmartyHeaderCode:10671576035850d97dd55652-03821070%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5959446113da190e533436f1b673cb9f99328812' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/payment_weixin.html',
      1 => 1461240596,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10671576035850d97dd55652-03821070',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5850d97ddf3464_10984819',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5850d97ddf3464_10984819')) {function content_5850d97ddf3464_10984819($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
    a{ cursor: pointer; }
    .body{ position: relative; width: 260px; margin: 80px auto 150px; text-align: center; }
    .body .i{ position: absolute; right: -215px; top: 0; }
    .msg{ color: #333; font-size: 18px; }
    .price{ font-size: 28px; color: #DF334F; margin-bottom: 30px; }
    .qr{ margin-bottom: 20px; height: 260px; }
</style>

<div class="container">
    <ul class="body">
        <li class="i"><img src="/style/images/weixin_0.png" /></li>
        <li class="msg">微信扫一扫付款</li>
        <li class="price"><?php echo price_format($_smarty_tpl->tpl_vars['data']->value['money']);?>
</li>
        <li class="qr"><img src="/welcome/build_qrcode?data=<?php echo $_smarty_tpl->tpl_vars['data']->value['url'];?>
" width="260" /></li>
        <li class="tip"><img src="/style/images/weixin_1.png" /></li>
    </ul>
</div>

<script type="text/javascript">
    function respond(){
        $.get("/welcome/respond/<?php echo $_smarty_tpl->tpl_vars['data']->value['log_id'];?>
", { ajax:1 },
            function(data){
                if(data.is_success>0) window.location.href="/welcome/respond/<?php echo $_smarty_tpl->tpl_vars['data']->value['log_id'];?>
";
            }, "json");
    }
    window.setInterval(respond,1000);
</script>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>