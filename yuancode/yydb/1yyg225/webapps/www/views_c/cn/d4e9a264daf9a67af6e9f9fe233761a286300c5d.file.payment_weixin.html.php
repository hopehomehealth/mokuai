<?php /* Smarty version Smarty-3.1.13, created on 2016-05-30 12:18:55
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\yunbuy\payment_weixin.html" */ ?>
<?php /*%%SmartyHeaderCode:6580574bbf2fcdfe64-28983900%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4e9a264daf9a67af6e9f9fe233761a286300c5d' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\yunbuy\\payment_weixin.html',
      1 => 1461240595,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6580574bbf2fcdfe64-28983900',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_574bbf2fd59f88_24206160',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574bbf2fd59f88_24206160')) {function content_574bbf2fd59f88_24206160($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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