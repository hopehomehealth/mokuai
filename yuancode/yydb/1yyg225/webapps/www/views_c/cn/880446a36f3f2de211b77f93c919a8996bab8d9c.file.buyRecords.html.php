<?php /* Smarty version Smarty-3.1.13, created on 2015-12-01 19:45:27
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\content\buyRecords.html" */ ?>
<?php /*%%SmartyHeaderCode:10375565d8857c539d7-42180911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '880446a36f3f2de211b77f93c919a8996bab8d9c' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\content\\buyRecords.html',
      1 => 1448879560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10375565d8857c539d7-42180911',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d8857c921e3_34689141',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d8857c921e3_34689141')) {function content_565d8857c921e3_34689141($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="<?php echo url('/js/jquery.ajaxContent.pack.js');?>
" type="text/javascript"></script>
<style type="text/css">
    .records{ padding-top:0; width: 1200px; margin:10px auto 0; }
    .records_title{ height: 37px; overflow: hidden; line-height: 37px;  }
    .records_title span{ display: block; padding-left:50px; font-size: 14px; color: #F60; font-weight: bold; background: #f6f6f6 url('/images/Record.png') no-repeat 20px -70px; }
    .records_list{ border: 1px solid #dadada; width: 100%; background: #f6f6f6;  }
    .records_list td{ padding: 9px 20px 7px; border-top: 1px solid #f1f1f1; }
    .records_list thead td{ height: 33px; line-height: 33px; padding: 0 20px; background: url('/images/Record.png') repeat-x 0 -30px; color: #C2C2C2; white-space: nowrap; overflow: hidden; border: 0; }
    .records_list .odd td{ background: #fbfbfb; }
    .records_list a.a1{ color: #22aaff}
    .records_list a.a2{ color: #4a91d4}
    .records_list a:hover{ color: #f60}
</style>
<div class="beijing records">
    <div class="records_title"><span>历史云购记录</span></div>
    <div class="load" id="load_records"><div class="loading">拼命加载中...</div></div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
    mLoad();
    function mLoad(){
        $('#load_records').load('/content/recordsAjax/1');
    }
</script><?php }} ?>