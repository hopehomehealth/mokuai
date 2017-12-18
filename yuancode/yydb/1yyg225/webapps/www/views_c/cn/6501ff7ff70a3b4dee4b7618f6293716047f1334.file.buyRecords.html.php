<?php /* Smarty version Smarty-3.1.13, created on 2016-12-06 18:04:20
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/content/buyRecords.html" */ ?>
<?php /*%%SmartyHeaderCode:41986587958468d245fa092-64187413%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6501ff7ff70a3b4dee4b7618f6293716047f1334' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/content/buyRecords.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41986587958468d245fa092-64187413',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58468d2467f684_72340748',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58468d2467f684_72340748')) {function content_58468d2467f684_72340748($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
    <div class="records_title"><span>历史<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
记录</span></div>
    <div class="load" id="load_records"><div class="loading">拼命加载中...</div></div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
    mLoad();
    function mLoad(){
        $('#load_records').load('/content/recordsAjax/1');
    }
</script><?php }} ?>