<?php /* Smarty version Smarty-3.1.13, created on 2016-12-26 18:46:02
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/block/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:14500725855860f4eab2c731-34465512%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8cb6c0bcb8a8589d40c9513acd98d473c78d1f19' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/block/edit.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14500725855860f4eab2c731-34465512',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5860f4eab68487_26665216',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5860f4eab68487_26665216')) {function content_5860f4eab68487_26665216($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/block/edit">
    <input type="hidden" name="post[id]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />

    <table class="table-list">
    <tbody>

        <tr>
            <td class="td-label"><label>碎片名称：<span class="c-red">*</span></label></td>
            <td class="td-input">
                <input type="text" class="form-i w200" name="post[name]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>碎片标识：<span class="c-red">*</span></label></td>
            <td class="td-input">
                <input type="text" class="form-i w200" name="post[mark]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['mark'];?>
" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>碎片内容：<span class="c-red">*</span></label></td>
            <td class="td-input">
                <?php echo $_smarty_tpl->tpl_vars['row']->value['html_content'];?>

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