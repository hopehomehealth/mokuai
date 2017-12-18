<?php /* Smarty version Smarty-3.1.13, created on 2016-12-13 22:53:34
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/content/win.html" */ ?>
<?php /*%%SmartyHeaderCode:18069378058451d4f0283b4-83282511%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c072cda4f4d6de9d3e68acb482bcf6affd08cef' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/content/win.html',
      1 => 1481178229,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18069378058451d4f0283b4-83282511',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58451d4f0a11e6_12064045',
  'variables' => 
  array (
    'main' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451d4f0a11e6_12064045')) {function content_58451d4f0a11e6_12064045($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/lefttime_jx.js?v=<?php echo $_smarty_tpl->tpl_vars['main']->value['vjs'];?>
"></script>
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