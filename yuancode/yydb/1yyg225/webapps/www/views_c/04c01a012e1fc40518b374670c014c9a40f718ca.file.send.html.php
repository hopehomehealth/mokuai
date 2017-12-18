<?php /* Smarty version Smarty-3.1.13, created on 2016-02-26 10:54:10
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\bonus\send.html" */ ?>
<?php /*%%SmartyHeaderCode:1711056cfbe526c1a34-73012291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04c01a012e1fc40518b374670c014c9a40f718ca' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\bonus\\send.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1711056cfbe526c1a34-73012291',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56cfbe5279e675_95147995',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cfbe5279e675_95147995')) {function content_56cfbe5279e675_95147995($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/bonus/send">
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />

    <table class="table-list">
    <tbody>

        <tr>
            <td class="td-label"><label><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
名称：</label></td>
            <td class="td-input">
                <?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>

            </td>
        </tr>

        <tr>
            <td class="td-label"><label>发放数量：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w200" name="post[number]" value="1" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>发放给会员：<span class="c-red">*</span></label></td>
            <td class="td-input">
                <textarea name="post[users]"></textarea>
                <div class="form-tip">一行表示一个会员名</div>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>发放备注：</label></td>
            <td class="td-input">
                <textarea name="post[desc]"></textarea>
            </td>
        </tr>

        <tr class="tr-btn">
            <td class="td-label"></td>
            <td class="td-input">
                <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>
                <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>
            </td>
        </tr>

    </tbody>
    </table>

    </form>
</div>

<?php }} ?>