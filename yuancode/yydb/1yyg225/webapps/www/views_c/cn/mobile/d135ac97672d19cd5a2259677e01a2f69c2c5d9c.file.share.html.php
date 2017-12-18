<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 13:05:12
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\content\share.html" */ ?>
<?php /*%%SmartyHeaderCode:2907456610b404681b3-77240569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd135ac97672d19cd5a2259677e01a2f69c2c5d9c' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\content\\share.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2907456610b404681b3-77240569',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56610b405056b2_29305794',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56610b405056b2_29305794')) {function content_56610b405056b2_29305794($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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