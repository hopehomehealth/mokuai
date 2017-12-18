<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 13:08:11
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\content\windbajax.html" */ ?>
<?php /*%%SmartyHeaderCode:194905660faff3a89d4-36449110%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa1b48141de1e38c98418cc2c8bc6af020f59e5a' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\content\\windbajax.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194905660faff3a89d4-36449110',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660faff474f04_98833496',
  'variables' => 
  array (
    'L' => 0,
    'data' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660faff474f04_98833496')) {function content_5660faff474f04_98833496($_smarty_tpl) {?><div class="win-list" id="win-list">
    <div class="winCount">
        截至目前共揭晓<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
商品<b class="color01"><?php echo $_smarty_tpl->tpl_vars['data']->value['count'];?>
</b>个
    </div>
    <div class="fn-clear">
        <div id="list-djx"></div>
        <div id="list-win">
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
            <?php echo $_smarty_tpl->getSubTemplate ("content/windbitem.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <?php } ?>
        </div>
    </div>
</div>
<input type="hidden" name="ids" id="ids" value="" />

<?php echo $_smarty_tpl->getSubTemplate ("ajax_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
    $(document).ready(function(){
        $('#load_db').find('.demo').ajaxContent({
            event:'click', //mouseover
            loaderType:"text",
            loadingMsg:"<span class='loading'>拼命加载中...</span>",
            target:'#load_db',
            success:function(){
                scrollLoading();
            }
        }).bind('click',function(){
            $('html').animate({ scrollTop: '0' }, 500);
        });
    });
</script><?php }} ?>