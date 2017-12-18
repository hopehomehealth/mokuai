<?php /* Smarty version Smarty-3.1.13, created on 2016-03-02 16:46:21
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\order\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:1147956d6a85dac24e9-35599453%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '337ecff2df4cee4cfb0b5fd690b860b7ccfd3db7' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\order\\edit.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1147956d6a85dac24e9-35599453',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'goodsForm' => 0,
    'k' => 0,
    'm' => 0,
    'express' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d6a85dd035c0_56955848',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d6a85dd035c0_56955848')) {function content_56d6a85dd035c0_56955848($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/order/edit">
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
" />
    <input type="hidden" name="post[order_sn]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['order_sn'];?>
" />

    <table class="table-list">
    <tbody>

        <tr>
            <td class="td-label"><label>订单号：</label></td>
            <td class="td-input">
                <?php echo $_smarty_tpl->tpl_vars['row']->value['order_sn'];?>

            </td>
        </tr>

        <tr class="table-h3">
            <td colspan="2">采购相关</td>
        </tr>

        <tr>
            <td class="td-label"><label>采购价格：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w140" name="post[oldprice]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['oldprice'])===null||$tmp==='' ? 0 : $tmp);?>
" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>采购来源：</label></td>
            <td class="td-input">
                <select name="post[fow]">
                    <option value="">请选择...</option>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['goodsForm']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['k']->value==$_smarty_tpl->tpl_vars['row']->value['fow']){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</option>
                    <?php } ?>
                </select>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>采购网址：</label></td>
            <td class="td-input">
                <input class="form-i w200" type="text" name="post[fou]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['fou'];?>
" id="fou" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>采购订单号：</label></td>
            <td class="td-input">
                <input class="form-i w200" type="text" name="post[fono]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['fono'];?>
" id="fono" />
            </td>
        </tr>

        <tr class="table-h3">
            <td colspan="2">物流相关</td>
        </tr>

        <tr>
            <td class="td-label"><label>收货人：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w140" name="post[name]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>联系电话：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w140" name="post[mobile]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['mobile'];?>
" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>收货地址：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w300" name="post[deliver]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['deliver'];?>
" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>物流公司：</label></td>
            <td class="td-input">
                <select name="post[express]">
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['express']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['row']->value['express']==$_smarty_tpl->tpl_vars['m']->value['id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</option>
                    <?php } ?>
                </select>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>物流单号：</label></td>
            <td class="td-input">
                <input class="form-i w140" type="text" name="post[express_num]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['express_num'];?>
" />
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