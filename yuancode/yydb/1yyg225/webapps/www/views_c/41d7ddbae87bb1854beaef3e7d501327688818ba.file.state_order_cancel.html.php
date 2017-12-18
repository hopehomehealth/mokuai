<?php /* Smarty version Smarty-3.1.13, created on 2017-01-04 18:26:57
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/order/state_order_cancel.html" */ ?>
<?php /*%%SmartyHeaderCode:441984785586ccdf1961bb7-28304835%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41d7ddbae87bb1854beaef3e7d501327688818ba' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/order/state_order_cancel.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '441984785586ccdf1961bb7-28304835',
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
  'unifunc' => 'content_586ccdf19dd217_21793763',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586ccdf19dd217_21793763')) {function content_586ccdf19dd217_21793763($_smarty_tpl) {?><form id="order-cancel-form" style="padding:30px">


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