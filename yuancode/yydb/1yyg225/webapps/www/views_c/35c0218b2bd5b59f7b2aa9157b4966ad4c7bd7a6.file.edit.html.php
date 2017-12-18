<?php /* Smarty version Smarty-3.1.13, created on 2016-12-10 21:27:49
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/payment/edit.html" */ ?>
<?php /*%%SmartyHeaderCode:1393197474584c02d549dae1-10437267%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35c0218b2bd5b59f7b2aa9157b4966ad4c7bd7a6' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/payment/edit.html',
      1 => 1456367948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1393197474584c02d549dae1-10437267',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'config' => 0,
    'lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584c02d5582f01_47920895',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584c02d5582f01_47920895')) {function content_584c02d5582f01_47920895($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/data/01/html/1yyg225/system/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="html-box">
    <form target="iframeNewsTarget" method="post" action="/manage/payment/submit">
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['pay_id'];?>
" />
    <input type="hidden" name="post[pay_code]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['pay_code'];?>
" />

    <table class="table-list">
    <tbody>

        <tr>
            <td class="td-label"><label>支付方式名称：</label></td>
            <td class="td-input">
                <input type="text" class="form-i w300" name="post[pay_name]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['pay_name'];?>
" />
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>支付方式描述：</label></td>
            <td class="td-input">
                <textarea name="post[pay_desc]"><?php echo stripcslashes($_smarty_tpl->tpl_vars['row']->value['pay_desc']);?>
</textarea>
            </td>
        </tr>

        <tr>
            <td class="td-label"><label>支付方式图片：</label></td>
            <td class="td-input">
                <?php echo $_smarty_tpl->tpl_vars['row']->value['html_thumb'];?>

            </td>
        </tr>

        <tr>
            <td class="td-label">支付手续费：</td>
            <td class="td-input">
                <?php if ($_smarty_tpl->tpl_vars['row']->value['is_cod']){?><input name="post[pay_fee]" type="hidden" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['pay_fee'])===null||$tmp==='' ? 0 : $tmp);?>
" />配送决定
                <?php }else{ ?><input name="post[pay_fee]" type="text" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['pay_fee'])===null||$tmp==='' ? 0 : $tmp);?>
" class="form-i" /><?php }?>
            </td>
        </tr>

        <tr>
            <td class="td-label">货到付款？</td>
            <td class="td-input">
                <?php if ($_smarty_tpl->tpl_vars['row']->value['is_cod']=="1"){?>是<?php }else{ ?>否<?php }?>
                <input type="hidden"  name="post[is_cod]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['is_cod'];?>
" />
            </td>
        </tr>

        <tr>
            <td class="td-label">在线支付？</td>
            <td class="td-input">
                <?php if ($_smarty_tpl->tpl_vars['row']->value['is_online']=="1"){?>是<?php }else{ ?>否<?php }?>
                <input type="hidden" name="post[is_online]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['is_online'];?>
" />
            </td>
        </tr>

        <?php if ($_smarty_tpl->tpl_vars['row']->value['pay_config']){?>
        <tr class="table-h3">
            <td colspan="2">接口配置</td>
        </tr>

        <?php  $_smarty_tpl->tpl_vars['config'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['config']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['row']->value['pay_config']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['config']->key => $_smarty_tpl->tpl_vars['config']->value){
$_smarty_tpl->tpl_vars['config']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['config']->key;
?>
        <tr>
            <td class="td-label"><label><?php echo $_smarty_tpl->tpl_vars['config']->value['label'];?>
：</label></td>
            <td class="td-input">
                <!-- <?php if ($_smarty_tpl->tpl_vars['config']->value['type']=="text"){?> -->
                <input name="cfg_value[]" type="<?php echo $_smarty_tpl->tpl_vars['config']->value['type'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['value'];?>
" class="form-i w300" />
                <?php if ($_smarty_tpl->tpl_vars['config']->value['name']=="alipay_partner"){?>
                <a href="javascript:void(0)" style="font-weight:bold; color:#F00;"  onclick="show();return false;"> &nbsp; <?php echo $_smarty_tpl->tpl_vars['lang']->value['getPid'];?>
</a>

                <?php }?>
                <!-- <?php }elseif($_smarty_tpl->tpl_vars['config']->value['type']=="textarea"){?> -->
                <textarea name="cfg_value[]" cols="80" rows="5"><?php echo $_smarty_tpl->tpl_vars['config']->value['value'];?>
</textarea>
                <!-- <?php }elseif($_smarty_tpl->tpl_vars['config']->value['type']=="select"){?> -->
                <select name="cfg_value[]"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['config']->value['range'],'selected'=>$_smarty_tpl->tpl_vars['config']->value['value']),$_smarty_tpl);?>
</select>
                <!-- <?php }?> -->
                <input name="cfg_name[]" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['name'];?>
" />
                <input name="cfg_type[]" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['type'];?>
" />
                <input name="cfg_lang[]" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['lang'];?>
" />
            </td>
        </tr>
        <?php } ?>
        <?php }?>

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