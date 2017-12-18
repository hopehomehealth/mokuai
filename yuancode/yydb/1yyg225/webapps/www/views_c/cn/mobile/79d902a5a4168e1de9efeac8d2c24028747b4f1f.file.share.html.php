<?php /* Smarty version Smarty-3.1.13, created on 2017-01-05 13:40:45
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/content/share.html" */ ?>
<?php /*%%SmartyHeaderCode:1134923575586ddc5dc1c185-55096543%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79d902a5a4168e1de9efeac8d2c24028747b4f1f' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/content/share.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1134923575586ddc5dc1c185-55096543',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_586ddc5dc67747_84689950',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586ddc5dc67747_84689950')) {function content_586ddc5dc67747_84689950($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="content" class="container">
    <?php echo $_smarty_tpl->getSubTemplate ("nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="shareList">
        <div class="item"></div>
    </div>
    <div class="loading getMore"></div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/mobile/js/jquery.more.js"></script>
<script type="text/javascript">
    $(function(){
        $('.shareList').more({
            'address': '/content/share_ajax/all',
            'amount' : 10
        })
    });
</script><?php }} ?>