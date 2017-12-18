<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 10:51:28
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\timing\cod_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:32215661401e6b86c5-99296831%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f7070c59bc7c73c095a015af4e6e12b14997efc' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\timing\\cod_edit.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32215661401e6b86c5-99296831',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5661401e73b351_61550646',
  'variables' => 
  array (
    'L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5661401e73b351_61550646')) {function content_5661401e73b351_61550646($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/timing/editCod">

    <table class="table-list">
    <tbody>

        <tr>
            <td class="td-label"><label>开奖号：<span class="c-red">*</span></label></td>
            <td class="td-input">
                <input type="text" class="form-i w200" name="post[cod]" value="" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>下期开奖日：</label></td>
            <td class="td-input">
                <input class="form-i Wdate" name="post[nexttime]" id="nexttime" value="" type="text" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd', minDate:'%y-%M-%d' })" readonly />
                <div class="form-tip">默认为次日</div>
            </td>
        </tr>

        <tr class="tr-btn">
            <td class="td-label"></td>
            <td class="td-input">
                <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>
                <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>
            </td>
        </tr>

        <tr>
            <td class="td-input" colspan="2">
                <div class="form-tip">
                    开奖网址：<br>
                    <a href="http://cj.gw.com.cn/news/index/000001.shtml" target="_blank">http://cj.gw.com.cn/news/index/000001.shtml</a> 大智慧财经<br>
                    <a href="http://finance.ifeng.com/app/hq/stock/sh000001/" target="_blank">http://finance.ifeng.com/app/hq/stock/sh000001/</a> 凤凰网财经<br>
                    <a href="http://www.10jqka.com.cn/" target="_blank">http://www.10jqka.com.cn/</a> 同花顺网站<br>
                    注意事项：<br>
                    - 开奖号：以上三个网址的上证指数，出现率最高的设置为开奖号<br>
                    - 处理<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
信息：当天14点前所有未开奖的出价信息<br>
                    - 最佳发布时间：每天15点30分待指数稳定后<br>
                    - 每天只能发布一期，发布后不可更改，请仔细确认后发布<br>
                    - 双休日没有指数时，可以设置下期开奖日
                </div>
            </td>
        </tr>

    </tbody>
    </table>

    </form>
</div>

<?php }} ?>