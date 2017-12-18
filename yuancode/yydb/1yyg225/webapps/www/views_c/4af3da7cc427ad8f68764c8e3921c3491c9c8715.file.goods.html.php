<?php /* Smarty version Smarty-3.1.13, created on 2016-02-27 16:33:40
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\order\goods.html" */ ?>
<?php /*%%SmartyHeaderCode:2146456d15f64d94c64-69708156%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4af3da7cc427ad8f68764c8e3921c3491c9c8715' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\order\\goods.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2146456d15f64d94c64-69708156',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d15f64e22a31_65342174',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d15f64e22a31_65342174')) {function content_56d15f64e22a31_65342174($_smarty_tpl) {?><div class="html-box">
<form target="iframeNewsTarget" method="post" action="/manage/order/goods?id=<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
">
    <table class="table-list">
        <tbody>

        <tr>
            <td class="td-label"><label>商品名称：</label></td>
            <td class="td-input">
                <?php echo $_smarty_tpl->tpl_vars['row']->value['goods_name'];?>

            </td>
        </tr>

        <tr>
            <td class="td-label"><label>商品备注：</label></td>
            <td class="td-input">
                <textarea name="post[goods_info]"><?php echo $_smarty_tpl->tpl_vars['row']->value['goods_info'];?>
</textarea>
            </td>
        </tr>

        <tr class="tr-btn">
            <td class="td-label"></td>
            <td class="td-input td-button">
                <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>
                <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>
            </td>
        </tr>

        </tbody>
    </table>

</form>
</div>


<?php }} ?>