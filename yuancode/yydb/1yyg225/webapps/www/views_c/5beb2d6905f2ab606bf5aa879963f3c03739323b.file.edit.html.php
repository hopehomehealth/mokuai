<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 22:39:45
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\share\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:1545956cf123105c1e4-83575809%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5beb2d6905f2ab606bf5aa879963f3c03739323b' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\share\\edit.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1545956cf123105c1e4-83575809',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56cf123113bce6_01166938',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cf123113bce6_01166938')) {function content_56cf123113bce6_01166938($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/share/edit">
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />

    <table class="table-list">
    <tbody>

        <tr>
            <td class="td-label"><label>会员名称：</label></td>
            <td class="td-input">
                <?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
(<?php echo $_smarty_tpl->tpl_vars['row']->value['mid'];?>
)
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>商品名称：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w360" name="post[obj_name]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['obj_name'];?>
" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>晒单标题：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w360" name="post[title]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
" />
            </td>
        </tr>

        <tr class="s h0">
            <td class="td-label"><label>晒单内容：</label></td>
            <td class="td-input">
                <textarea name="post[content]" style="width:500px;height:100px;"><?php echo $_smarty_tpl->tpl_vars['row']->value['content'];?>
</textarea>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>晒单图片：</label></td>
            <td class="td-input">
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = unserialize($_smarty_tpl->tpl_vars['row']->value['thumbs']); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <p style="margin-bottom: 10px"><img src="<?php echo $_smarty_tpl->tpl_vars['m']->value;?>
" style="max-width:100%" /></p>
                <?php } ?>
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

<script type="text/javascript">
    $.loadJs('/admin/js/manage/auction.js',function(){ });
</script>


<?php }} ?>