<?php /* Smarty version Smarty-3.1.13, created on 2016-03-11 16:20:15
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\templates\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:819356ce7a0cb19311-30029614%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b6fd7dc50c795df441dc9e83ac673dc77c168b8' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\templates\\edit.html',
      1 => 1457684399,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '819356ce7a0cb19311-30029614',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56ce7a0cc4da16_56408834',
  'variables' => 
  array (
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ce7a0cc4da16_56408834')) {function content_56ce7a0cc4da16_56408834($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form target="iframeNewsTarget" method="post" action="/manage/templates/edit">    <input type="hidden" name="code" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['template_code'];?>
" />    <table class="table-list">    <tbody>        <tr>            <td class="td-label"><label>模板类别：</label></td>            <td class="td-input">                <?php if ($_smarty_tpl->tpl_vars['row']->value['type']){?>                <?php if ($_smarty_tpl->tpl_vars['row']->value['type']=='sms'){?>短信<?php }else{ ?>邮件<?php }?>                <?php }else{ ?>                <select name="post[type]">                    <option value="sms">短信模板</option>                    <option value="mail">邮件模板</option>                </select>                <?php }?>            </td>        </tr>        <tr>            <td class="td-label"><label>模板标识：</label></td>            <td class="td-input">                <?php if ($_smarty_tpl->tpl_vars['row']->value['template_code']){?>                <?php echo $_smarty_tpl->tpl_vars['row']->value['template_code'];?>
                <?php }else{ ?>                <input type="text" class="form-i w300" name="post[template_code]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['template_code'];?>
" />                <?php }?>            </td>        </tr>        <tr>            <td class="td-label"><label>模板名称：</label></td>            <td class="td-input">                <input type="text" class="form-i w300" id="template_subject" name="post[template_subject]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['template_subject'];?>
" />            </td>        </tr>        <tr>            <td class="td-label"><label>模板内容：</label></td>            <td class="td-input">                <textarea name="post[template_content]" style="width:600px;height:200px;"><?php echo stripcslashes($_smarty_tpl->tpl_vars['row']->value['template_content']);?>
</textarea>                <div class="form-tip">                                        邮件模板：支持html结构<br>                    短信模板：不支持html结构<br>                    验证码短信模板（云通讯）格式：1|verify_code<br>                    中奖短信（云通讯）报备模板：亲 {1}，你已获得领取商品资格，请登陆我们的官网！<br>                    竞拍随机码短信（云通讯）报备模板：亲：{1}，您的竞拍首次出价的随机码是：{2}。                                    </div>            </td>        </tr>        <tr class="tr-btn">            <td class="td-label"></td>            <td class="td-input td-button">                <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>                <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>            </td>        </tr>    </tbody>    </table>    </form></div><?php }} ?>