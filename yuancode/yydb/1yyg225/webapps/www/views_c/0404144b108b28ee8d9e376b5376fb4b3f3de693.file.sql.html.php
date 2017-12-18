<?php /* Smarty version Smarty-3.1.13, created on 2016-04-14 20:19:07
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\databases\sql.html" */ ?>
<?php /*%%SmartyHeaderCode:23979570f8abb66ff32-04898462%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0404144b108b28ee8d9e376b5376fb4b3f3de693' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\databases\\sql.html',
      1 => 1460635149,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23979570f8abb66ff32-04898462',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_570f8abb6acfc8_58722164',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_570f8abb6acfc8_58722164')) {function content_570f8abb6acfc8_58722164($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <table class="table-list">        <tbody>        <tr>            <td class="td-input">                <div class="form-tip">请输入SQL命令（<b class="c-red">执行SQL将直接操作数据库，请谨慎使用！</b>）：</div>                <textarea id="sql" style="width: 600px;height: 100px;"></textarea>                <div class="form-tip">注意：执行前请先备份好数据库！</div>            </td>        </tr>        <tr class="tr-btn">            <td class="td-input">                <button type="button" class="uiBtn BtnGreen" onclick="database.query_sql();">执行SQL命令</button>            </td>        </tr>        </tbody>    </table>    <div id="result" style="padding-top: 10px;"></div></div><script type="text/javascript">    $.loadJs('/admin/js/manage/database.js',function(){    });</script><?php }} ?>