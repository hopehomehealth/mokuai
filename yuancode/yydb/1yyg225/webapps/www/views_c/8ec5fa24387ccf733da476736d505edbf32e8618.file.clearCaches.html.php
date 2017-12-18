<?php /* Smarty version Smarty-3.1.13, created on 2016-06-22 15:49:15
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\manage\setting\clearCaches.html" */ ?>
<?php /*%%SmartyHeaderCode:32634576a42fb22dc51-59308177%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ec5fa24387ccf733da476736d505edbf32e8618' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\manage\\setting\\clearCaches.html',
      1 => 1466152557,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32634576a42fb22dc51-59308177',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_576a42fb270069_39098699',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576a42fb270069_39098699')) {function content_576a42fb270069_39098699($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form target="iframeNewsTarget" method="post" action="/manage/setting/clearCaches" enctype="multipart/form-data">    <table class="table-list">    <tbody>        <tr>            <td class="td-label"><label>常用清理：</label></td>            <td class="td-input" colspan="2">                <label><input type="checkbox" name="post[]" value="static" checked /> 站点配置</label>                <label><input type="checkbox" name="post[]" value="yun_cats" checked /> 云购分类</label>                <label><input type="checkbox" name="post[]" value="mobile_cats" checked /> 移动端分类</label>                <label><input type="checkbox" name="post[]" value="auction_cats" checked /> 商品分类</label>                <!--<label><input type="checkbox" name="post[]" value="smarty" /> 模板缓存</label>-->            </td>        </tr>        <tr>            <td class="td-label"><label>专业清理：</label></td>            <td class="td-input" colspan="2">                <label><input type="checkbox" name="post[]" value="bidCount" /> 总参拍人次</label>                <label><input type="checkbox" name="post[]" value="dbDjx" /> 待揭晓商品</label>                <label><input type="checkbox" name="post[]" value="yunWin" /> 最新揭晓商品</label>                <label><input type="checkbox" name="post[]" value="yun_info" /> 云购商品缓存</label>                <div class="form-tip">非专业勿选（清理后可能会影响页面首次打开加载速度，问题不大）</div>            </td>        </tr>        <tr class="tr-btn">            <td class="td-label"></td>            <td class="td-input">                <button type="submit" name="Submit" class="uiBtn BtnGreen">执行清理</button>            </td>        </tr>    </tbody>    </table>    </form></div><?php }} ?>