<?php /* Smarty version Smarty-3.1.13, created on 2016-03-02 17:11:45
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\order\state_order_cancel.html" */ ?>
<?php /*%%SmartyHeaderCode:1014156d6ae514dd2f7-88407888%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7dba777c39bb28c72aa35207d0b6c94e33168abc' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\order\\state_order_cancel.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1014156d6ae514dd2f7-88407888',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_no' => 0,
    'order_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d6ae51597ae2_71104116',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d6ae51597ae2_71104116')) {function content_56d6ae51597ae2_71104116($_smarty_tpl) {?><form id="order-cancel-form" style="padding:30px">


    <div class="f-unit">
        <label class="ui-label w60">订单号：</label>
        <div class="form-tip">
            <?php echo $_smarty_tpl->tpl_vars['order_no']->value;?>

        </div>
        <input type="hidden" name="order_id" id="order_id" value="<?php echo $_smarty_tpl->tpl_vars['order_id']->value;?>
"/>
    </div>

    <div class="f-unit">
        <label class="ui-label w60">取消原因：</label>
        <div class="l" style="width:380px">
            <div>
                <label class="e0-order-selCancelType"><input type="radio" name="cancel_type" checked value="1"><span>&nbsp;缺货</span></label>
            </div>
            <div>
                <label class="e0-order-selCancelType"><input type="radio" name="cancel_type" value="2"><span>&nbsp;订单无效</span></label>
            </div>
            <div>
                <label class="e0-order-selCancelType"><input type="radio" name="cancel_type" value="3"><span>&nbsp;买家要求</span></label>
            </div>
            <div>
                <label class="e0-order-selCancelType"><input type="radio" name="cancel_type" value="0"><span>&nbsp;其他原因</span></label>
            </div>
            <div id="other_cancel_reason" style="display:none">
                <textarea class="form-area w300" name="state_info" id="state_info"></textarea>
            </div>

        </div>

    </div>
</form><?php }} ?>