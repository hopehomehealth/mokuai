<?php /* Smarty version Smarty-3.1.13, created on 2016-02-26 22:46:17
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\content\win.html" */ ?>
<?php /*%%SmartyHeaderCode:1445556610b45d6f067-72264295%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22826582291e89bde5f0b7a01d4293aaf35a4501' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\content\\win.html',
      1 => 1456367943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1445556610b45d6f067-72264295',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56610b45e024e4_46206407',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56610b45e024e4_46206407')) {function content_56610b45e024e4_46206407($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/js/lefttime_jx.js"></script>
<style type="text/css">
    .count{ background: #f60;font-size: 14px;color: #fff; display: inline-block; padding: 2px 10px; }
    .count b{ color: #fff; }
    .icon-count:after{ color: #fff; }
</style>
<div class="container">
    <?php echo $_smarty_tpl->getSubTemplate ("nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="pro-view shareList">
        <ul class="goodList" id="win-list">
            <li class="item ui-clr item-db"></li>
        </ul>
    </div>
    <a class="loading getMore">点击获取更多...</a>
</div>
<input type="hidden" name="ids" id="ids" value="" />
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/mobile/js/jquery.more.js"></script>
<script type="text/javascript">
    $(function(){
        $('.goodList').more({
            'address': '/content/win/1',
            'amount' : 10
        })
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        compaceIds();
        setInterval('compaceIds()',5*1000);
    });
    function compaceIds(){
        $.post('/content/ajaxIds','skin=mobile&ids='+$('#ids').val(),function(data){
            if(data.error==1){
                $('#ids').val(data.ids);
                $('#win-list').prepend(data.html);
            }
        },'json');
    }
</script><?php }} ?>