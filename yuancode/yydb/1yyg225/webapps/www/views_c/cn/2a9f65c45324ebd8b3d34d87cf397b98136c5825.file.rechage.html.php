<?php /* Smarty version Smarty-3.1.13, created on 2016-02-25 14:52:03
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\member\rechage.html" */ ?>
<?php /*%%SmartyHeaderCode:56505661033a0b0489-78251739%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a9f65c45324ebd8b3d34d87cf397b98136c5825' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\member\\rechage.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56505661033a0b0489-78251739',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5661033a229ce5_60426628',
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5661033a229ce5_60426628')) {function content_5661033a229ce5_60426628($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
"><style type="text/css">    h4{ color: #666; font-size: 14px; font-weight: normal; margin-bottom: 10px; padding: 20px 30px 0; }    .re-money{ padding: 0 30px 0; }    .re-money li{ float:left; margin-right:10px; font-size: 15px; font-weight: bold; }    .re-money li label{ float:left; display: block; height: 45px; line-height: 45px; padding: 0 35px 0 20px; background:#f2f2f2; border:1px solid #ebebeb; }    .re-money li.on label{ border:1px solid #f01f46; background: #f01f46; color: #fff; }    /*.re-money dd li input.radio{ display: none; }*/    .re-money .w-input-input {        padding: 0 2px;        border: 1px solid #d5d5d5;    }    .re-payment{ padding: 0 30px 0; }    .re-payment dt{ font-size: 14px; color: #666; position: relative; z-index: 2; height: 30px; line-height: 30px; overflow:hidden; float: left; border:1px solid #ebebeb; border-bottom-color: #fff; padding:0 15px; }    .re-payment dt label{ display: block; background: url('/style/images/icon01.gif') no-repeat right 13px; padding-right:20px; }    .re-payment dd{ border: 1px solid #ebebeb; position: relative; top:-1px; z-index: 1; padding:10px 0 10px 15px; }    .pay-img-list li{ float:left; padding: 10px 30px 10px 0; }    .pay-img-list li img{ vertical-align: middle; }</style><?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div id="container">    <div class="fn-clear mt20 pb20">        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
        <div class="fn-right hy-r">            <div>                <form action="" method="post" target="_blank">                    <div class="fn-clear hy-tjxh">                        <div class="title">                            <h2>充值</h2>                            <span><a href="<?php echo '/member/accountlog?type=1#m';?>
" class="color02">-查看充值记录-</a></span>                        </div>                        <h4>请您选择充值金额：</h4>                        <div class="re-money">                            <ul>                                <li class="on"><label><input type="radio" name="amount" value="10" checked /> 10元</label></li>                                <li><label><input type="radio" name="amount" value="50" /> 50元</label></li>                                <li><label><input type="radio" name="amount" value="100" /> 100元</label></li>                                <li><label><input type="radio" name="amount" value="200" /> 200元</label></li>                                <li><label><input type="radio" name="amount" value="500" /> 500元</label></li>                                <li>                                    <label onclick="$(this).find('.w-input-input').focus();" style="padding: 0 20px;font-weight: normal;">                                        <input type="radio" name="amount" value="0" />                                        <span>其它金额</span>                                        <input type="text" name="other" class="w-input-input" style="width: 50px;" maxlength="6" />                                    </label>                                </li>                            </ul>                        </div>                        <div class="fn-clear"></div>                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pay']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pay']['iteration']++;
?>                        <?php if ($_smarty_tpl->tpl_vars['m']->value['pay_code']=='chinabank'){?>                        <dl class="re-payment" style="margin-top:20px;">                            <dt><label>网银在线（银行直连）</label></dt>                            <dd class="clear">                                <ul class="pay-img-list banks">                                    <li><label>                                        <input type="radio" name="bank" value="1025" title="工商银行" />                                        <img src="/style/images/bank/gongshang.gif" />                                    </label></li>                                    <li><label>                                        <input type="radio" name="bank" value="1051" title="建设银行" />                                        <img src="/style/images/bank/jianshe.gif" />                                    </label></li>                                    <li><label>                                        <input type="radio" name="bank" value="104" />                                        <img src="/style/images/bank/zhongguo.gif"  title="中国银行" />                                    </label></li>                                    <li><label>                                        <input type="radio" name="bank" value="103" />                                        <img src="/style/images/bank/nongye.gif" title="农业银行" />                                    </label></li>                                    <li><label>                                        <input type="radio" name="bank" value="301" />                                        <img src="/style/images/bank/jiaotong.gif" title="交通银行" />                                    </label></li>                                    <li><label>                                        <input type="radio" name="bank" value="3230" />                                        <img src="/style/images/bank/youzheng.gif" title="中国邮政" />                                    </label></li>                                    <li><label>                                        <input type="radio" name="bank" value="3080" />                                        <img src="/style/images/bank/zhaohang.gif"  title="招商银行" />                                    </label></li>                                    <li><label>                                        <input type="radio" name="bank" value="313" />                                        <img src="/style/images/bank/zhongxin.gif" title="中信银行" />                                    </label></li>                                    <li><label>                                        <input type="radio" name="bank" value="314" />                                        <img src="/style/images/bank/spdb.gif" title="浦发银行" />                                    </label></li>                                    <li><label>                                        <input type="radio" name="bank" value="309" />                                        <img src="/style/images/bank/xingye.gif" title="兴业银行" />                                    </label></li>                                    <li><label>                                        <input type="radio" name="bank" value="305" />                                        <img src="/style/images/bank/minsheng.gif" title="民生银行" />                                    </label></li>                                    <li><label>                                        <input type="radio" name="bank" value="312" />                                        <img src="/style/images/bank/guangda.gif" title="光大银行" />                                    </label></li>                                    <li><label>                                        <input type="radio" name="bank" value="307" />                                        <img src="/style/images/bank/pingan.gif" title="平安银行" />                                    </label></li>                                    <li><label>                                        <input type="radio" name="bank" value="311" />                                        <img src="/style/images/bank/huaxia.gif" title="华夏银行" />                                    </label></li>                                    <li><label>                                        <input type="radio" name="bank" value="310" />                                        <img src="/style/images/bank/beijing.gif" title="北京银行" />                                    </label></li>                                    <li><label>                                        <input type="radio" name="bank" value="3061" />                                        <img src="/style/images/bank/guangfa.gif" title="广发银行" />                                    </label></li>                                    <li><label>                                        <input type="radio" name="bank" value="326" />                                        <img src="/style/images/bank/shanghaibank.gif" title="上海银行" />                                    </label></li>                                </ul>                                <div class="fn-clear"></div>                            </dd>                        </dl>                        <?php }?>                        <?php } ?>                        <dl class="re-payment" style="margin-top:20px;float:left;padding-right:0;">                            <dt><label>支付平台支付</label></dt>                            <dd class="clear">                                <ul class="pay-img-list pays">                                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pay']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pay']['iteration']++;
?>                                    <li><label>                                        <input name="pay_id" type="radio" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['pay_id'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['pay']['iteration']==1){?>checked<?php }?> /> <?php if ($_smarty_tpl->tpl_vars['m']->value['thumb']){?><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['thumb'],'height'=>40,'type'=>0),$_smarty_tpl);?>
" style="border:1px solid #ccc;" /><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['m']->value['pay_name'];?>
<?php }?>                                    </label></li>                                    <?php } ?>                                </ul>                                <div class="fn-clear"></div>                            </dd>                        </dl>                        <div class="clear"></div>                        <div class="hy-box">                            <div class="mb15" style="padding-left:5px;">                                <button type="submit" class="w-button w-button-main" style="font-size: 22px;height:55px; line-height: 50px;padding:0 30px;background-color: #e54048;border:0;border-radius: 0"><span>前往充值</span></button>                                <input name="Submit" type="hidden" value="1" />                            </div>                        </div>                    </div>                </form>            </div>        </div>    </div></div><script type="text/javascript">    $('.re-money li label').bind('click',function(){        $('.re-money li').removeClass('on');        $(this).parents('li').addClass('on');    });    $('.banks label').bind('click',function(){        $(".pays label input[type='radio']").attr("checked", false);    });    $('.pays label').bind('click',function(){        $(".banks label input[type='radio']").attr("checked", false);    });</script><?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>