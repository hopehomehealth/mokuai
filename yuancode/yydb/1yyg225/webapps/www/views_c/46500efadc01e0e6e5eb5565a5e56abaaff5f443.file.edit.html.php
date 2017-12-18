<?php /* Smarty version Smarty-3.1.13, created on 2016-05-17 10:50:29
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\express\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:2298556ced15f330ff8-65657828%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46500efadc01e0e6e5eb5565a5e56abaaff5f443' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\express\\edit.html',
      1 => 1463453424,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2298556ced15f330ff8-65657828',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56ced15f3ddc28_10837932',
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ced15f3ddc28_10837932')) {function content_56ced15f3ddc28_10837932($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form target="iframeNewsTarget" method="post" action="/manage/express/edit">    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />    <table class="table-list">    <tbody>        <tr>            <td class="td-label"><label>快递公司：<span class="c-red">*</span></label></td>            <td class="td-input">                <input type="text" class="form-i w200" name="post[name]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" />            </td>        </tr>        <tr>            <td class="td-label"><label>快递编码：<span class="c-red">*</span></label></td>            <td class="td-input">                <input type="text" class="form-i w200" name="post[pinyin]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['pinyin'];?>
" />                <div class="form-tip">                    查询物流状态时需要用到此编码<br><a href="//www.kuaidi100.com/download/chaxun(20140729).doc" target="_blank">下载快递编码文档</a><br>                    (如顺风快递：标识为shunfeng)                </div>            </td>        </tr>        <tr class="tr-btn">            <td class="td-label"></td>            <td class="td-input">                <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>                <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>            </td>        </tr>    </tbody>    </table>    </form></div><?php }} ?>