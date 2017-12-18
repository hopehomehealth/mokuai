<?php /* Smarty version Smarty-3.1.13, created on 2016-12-08 14:20:40
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/setting/clearCaches.html" */ ?>
<?php /*%%SmartyHeaderCode:97720636358452770def688-39304507%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77e6b0633d07b8d609f18cdede1eeb00cde60d8b' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/setting/clearCaches.html',
      1 => 1481177860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97720636358452770def688-39304507',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5845277100c8e4_00413004',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5845277100c8e4_00413004')) {function content_5845277100c8e4_00413004($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form target="iframeNewsTarget" method="post" action="/manage/setting/clearCaches" enctype="multipart/form-data">    <table class="table-list">    <tbody>        <tr>            <td class="td-label"><label>常用清理：</label></td>            <td class="td-input" colspan="2">                <label><input type="checkbox" name="post[]" value="static" checked /> 站点配置</label>                <label><input type="checkbox" name="post[]" value="yun_cats" checked /> 云购分类</label>                <label><input type="checkbox" name="post[]" value="mobile_cats" checked /> 移动端分类</label>                <label><input type="checkbox" name="post[]" value="auction_cats" checked /> 商品分类</label>                <!--<label><input type="checkbox" name="post[]" value="smarty" /> 模板缓存</label>-->                <label><input type="checkbox" name="post[]" value="crowd_cats" checked/> 众筹分类</label>            </td>        </tr>        <tr>            <td class="td-label"><label>专业清理：</label></td>            <td class="td-input" colspan="2">                <label><input type="checkbox" name="post[]" value="bidCount" /> 总参拍人次</label>                <label><input type="checkbox" name="post[]" value="dbDjx" /> 待揭晓商品</label>                <label><input type="checkbox" name="post[]" value="yun_info" /> 云购商品缓存</label>                <div class="form-tip">非专业勿选（清理后可能会影响页面首次打开加载速度，问题不大）</div>            </td>        </tr>        <tr class="tr-btn">            <td class="td-label"></td>            <td class="td-input">                <button type="submit" name="Submit" class="uiBtn BtnGreen">执行清理</button>            </td>        </tr>    </tbody>    </table>    </form></div><?php }} ?>