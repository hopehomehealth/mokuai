<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 11:47:55
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\order\send.html" */ ?>
<?php /*%%SmartyHeaderCode:1059356ce796bbdb4b3-45153710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd54840d93a84db790be301cd6dc8660dabb68f4' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\order\\send.html',
      1 => 1456367947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1059356ce796bbdb4b3-45153710',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order' => 0,
    'g' => 0,
    'k' => 0,
    'express' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56ce796bdb1739_88575371',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ce796bdb1739_88575371')) {function content_56ce796bdb1739_88575371($_smarty_tpl) {?><h3 class="info-tag">    <a class="uiBtn r" href="javascript:history.go(-1);void(0)">返回</a>    发货设置<span></span></h3><div class="html-box">    <table class="tb-goods" style="width:100%">        <tr class="order-head">            <td colspan="8">                订单编号：<span class="order-no"><?php echo $_smarty_tpl->tpl_vars['order']->value['order_sn'];?>
</span>，                下单时间：<span class="order-date"><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['order']->value['c_time']);?>
</span>            </td>        </tr>        <?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['g']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['order']->value['goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
$_smarty_tpl->tpl_vars['g']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['g']->key;
?>        <tr>            <td class="bdl w5"></td>            <td class="w70"><img src="<?php echo $_smarty_tpl->tpl_vars['g']->value['imgurl_thumb'];?>
" style="width:70px" /></td>            <td>                <div class="oi-name"><?php echo $_smarty_tpl->tpl_vars['g']->value['goods_name'];?>
</div>                <?php if ($_smarty_tpl->tpl_vars['g']->value['goods_info']){?>                <div class="c-gray"><?php echo $_smarty_tpl->tpl_vars['g']->value['goods_info'];?>
</div>                <?php }?>            </td>            <?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>            <td class="ac bdr" rowspan="<?php echo count($_smarty_tpl->tpl_vars['order']->value['goods']);?>
">                <b style="color:#f60">￥<?php echo $_smarty_tpl->tpl_vars['order']->value['order_price'];?>
</b>            </td>            <?php }?>        </tr>        <?php } ?>        <tr>            <td colspan="8" class="bdl bdr">                收货信息：                <div><?php echo $_smarty_tpl->tpl_vars['order']->value['name'];?>
[<?php echo $_smarty_tpl->tpl_vars['order']->value['mobile'];?>
]</div>                <?php if ($_smarty_tpl->tpl_vars['order']->value['area']){?><div><?php echo $_smarty_tpl->tpl_vars['order']->value['area'];?>
 <?php echo $_smarty_tpl->tpl_vars['order']->value['deliver'];?>
</div><?php }?>            </td>        </tr>    </table>    <form target="iframeNewsTarget" method="post" action="/manage/order/doSendPre" style="padding-top:20px; padding-bottom:10px">        <input type="hidden" name="order_id" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" />        <div class="f-unit">            <label class="ui-label w80">采购价格：</label>            <input class="form-i w200" type="text" name="oldprice" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['oldprice'];?>
" id="oldprice"/>        </div>        <div class="f-unit">            <label class="ui-label w80">采购备注：</label>            <textarea name="fou" id="fou"><?php echo $_smarty_tpl->tpl_vars['order']->value['fou'];?>
</textarea>        </div>        <div class="f-unit">            <label class="ui-label w80">&nbsp;</label>            <button type="submit" name="Submit" class="uiBtn BtnBlue">备 货</button>        </div>    </form>    <form id="order-send-form" style="padding-bottom:10px">        <input type="hidden" name="order_id" id="order_id" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" />        <div class="f-unit">            <label class="ui-label w80">快递公司：</label>            <select name="express" id="express" onchange="send.chang_field(this.value);">                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['express']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>                <option value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['order']->value['express_id']==$_smarty_tpl->tpl_vars['m']->value['id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value['name'];?>
</option>                <?php } ?>                <option value="0">-快速添加-</option>            </select>            <input class="form-i w150 hideTr" type="text" name="express_name" value="" style="display: none;" />        </div>        <div class="f-unit hideTr" style="display: none;">            <label class="ui-label w80">快递标识：</label>            <input class="form-i w150" type="text" name="pinyin" value="" />            <div class="form-tip" style="clear: both">                标识获取地址：<a href="http://www.kuaidi100.com/all/index.shtml" target="_blank">http://www.kuaidi100.com/all/index.shtml</a><br>如顺风快递：http://www.kuaidi100.com/all/sf.shtml，标识为sf            </div>        </div>        <div class="f-unit">            <label class="ui-label w80">快递单号：</label>            <input class="form-i w200" type="text" name="express_no" value="<?php echo $_smarty_tpl->tpl_vars['order']->value['express_num'];?>
" id="express_no"/>        </div>        <div class="f-unit">            <label class="ui-label w80">发货备忘：</label>            <textarea class="form-area" name="state_info" id="state_info"></textarea>        </div>        <div class="f-unit">            <label class="ui-label w80">&nbsp;</label>            <a href="javascript:;" class="uiBtn BtnGreen BtnLg e2-order-send w60">发货</a>        </div>    </form></div><script type="text/javascript">    var send=function(){ };    send.prototype={        //根据字段类型更新字段配置表单        chang_field:function(value){            if(value=='0'){                $('.hideTr').css('display','');            }else{                $('.hideTr').hide();            }        }    };send = new send;</script><?php }} ?>