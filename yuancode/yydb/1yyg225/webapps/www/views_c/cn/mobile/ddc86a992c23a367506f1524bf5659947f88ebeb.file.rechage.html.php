<?php /* Smarty version Smarty-3.1.13, created on 2015-12-03 10:46:17
         compiled from "F:\WWW\1yyg225\webapps\www\views\cn\mobile\member\rechage.html" */ ?>
<?php /*%%SmartyHeaderCode:4623565faa99bd43a9-94984387%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ddc86a992c23a367506f1524bf5659947f88ebeb' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\cn\\mobile\\member\\rechage.html',
      1 => 1449110776,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4623565faa99bd43a9-94984387',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565faa99c87ab6_01414549',
  'variables' => 
  array (
    'list' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565faa99c87ab6_01414549')) {function content_565faa99c87ab6_01414549($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/member.css">
<div id="content" class="container main">
    <form action="" method="post" target="_blank">
    <div class="nav-m ui-clr">
        <ul>
            <li class="on"><a href="<?php echo '/member/recchage';?>
">充值</a></li>
            <li><a href="<?php echo '/member/accountlog';?>
">充值/提现记录</a></li>
            <li><a href="<?php echo '/member/accountdetail';?>
">帐户明细</a></li>
        </ul>
    </div>

    <div class="title-m2">
        <span class="color01">请您选择充值金额：</span>
    </div>
    <div class="re-money">
        <ul class="ui-clr">
            <li class="on"><label><input type="radio" class="radio" name="amount" value="10" checked /> 10元</label></li>
            <li><label><input type="radio" class="radio" name="amount" value="50" /> 50元</label></li>
            <li><label><input type="radio" class="radio" name="amount" value="100" /> 100元</label></li>
            <li><label><input type="radio" class="radio" name="amount" value="200" /> 200元</label></li>
            <li><label><input type="radio" class="radio" name="amount" value="200" /> 500元</label></li>
            <li><label><input type="radio" class="radio" name="amount" value="1000" /> 1000元</label></li>
            <li>
                <label onclick="$(this).find('.input-m').focus();">
                    <input type="radio" class="radio" name="amount" value="0" />
                    <span>其它金额</span>
                    <input type="text" name="other" class="input-m" style="width:80px;vertical-align:top;margin-top:4px;" maxlength="7" />
                </label>
            </li>
        </ul>
    </div>

    <div class="title-m2">
        <span class="color01">请选择支付方式：</span>
    </div>
    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pay']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pay']['iteration']++;
?>
    <?php if ($_smarty_tpl->tpl_vars['m']->value['pay_code']=='chinabank'){?>
    <dl class="re-payment" style="display: none">
        <dt style="border-top:0;padding-top:10px;">银行支付：</dt>
        <dd>
            <ul class="pay-img-list banks ui-clr">
                <li><label>
                    <input type="radio" name="bank" value="ICBC-NET-B2C" />
                    <img src="/style/images/bank/gongshang.gif" />
                </label></li>
                <li><label>
                    <input type="radio" name="bank" value="CMBCHINA-NET-B2C" />
                    <img src="/style/images/bank/zhaohang.gif" />
                </label></li>
                <li><label>
                    <input type="radio" name="bank" value="ABC-NET-B2C" />
                    <img src="/style/images/bank/nongye.gif" />
                </label></li>
                <li><label>
                    <input type="radio" name="bank" value="CCB-NET-B2C" />
                    <img src="/style/images/bank/jianshe.gif" />
                </label></li>
                <li><label>
                    <input type="radio" name="bank" value="BCCB-NET-B2C" />
                    <img src="/style/images/bank/beijing.gif" />
                </label></li>
                <li><label>
                    <input type="radio" name="bank" value="BOCO-NET-B2C" />
                    <img src="/style/images/bank/jiaotong.gif" />
                </label></li>
                <li><label>
                    <input type="radio" name="bank" value="CMBC-NET-B2C" />
                    <img src="/style/images/bank/minsheng.gif" />
                </label></li>
                <li><label>
                    <input type="radio" name="bank" value="CEB-NET-B2C" />
                    <img src="/style/images/bank/guangda.gif" />
                </label></li>
                <li><label>
                    <input type="radio" name="bank" value="BOC-NET-B2C" />
                    <img src="/style/images/bank/zhongguo.gif" />
                </label></li>
                <li><label>
                    <input type="radio" name="bank" value="PINGANBANK-NET-B2C" />
                    <img src="/style/images/bank/pingan.gif" />
                </label></li>
                <li><label>
                    <input type="radio" name="bank" value="ECITIC-NET-B2C" />
                    <img src="/style/images/bank/zhongxin.gif" />
                </label></li>
                <li><label>
                    <input type="radio" name="bank" value="SDB-NET-B2C" />
                    <img src="/style/images/bank/shenfa.gif" />
                </label></li>
                <li><label>
                    <input type="radio" name="bank" value="GDB-NET-B2C" />
                    <img src="/style/images/bank/guangfa.gif" />
                </label></li>
                <li><label>
                    <input type="radio" name="bank" value="SHB-NET-B2CC" />
                    <img src="/style/images/bank/shanghaibank.gif" />
                </label></li>
                <li><label>
                    <input type="radio" name="bank" value="POST-NET-B2C" />
                    <img src="/style/images/bank/youzheng.gif" />
                </label></li>
                <li><label>
                    <input type="radio" name="bank" value="SPDB-NET-B2C" />
                    <img src="/style/images/bank/spdb.gif" />
                </label></li>
            </ul>
            <div class="fn-clear"></div>
        </dd>
    </dl>
    <?php }?>
    <?php } ?>

    <dl class="re-payment">
        <dt>支付平台支付：</dt>
        <dd>
            <ul class="pay-img-list pays ui-clr">
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pay']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['pay']['iteration']++;
?>
                <li><label>
                    <input name="pay_id" type="radio" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['pay_id'];?>
" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['pay']['iteration']==1){?>checked<?php }?> /> <?php if ($_smarty_tpl->tpl_vars['m']->value['thumb']){?><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['thumb'],'width'=>154,'type'=>0),$_smarty_tpl);?>
" style="border:1px solid #ccc;border-radius:5px;" /><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['m']->value['pay_name'];?>
<?php }?>
                </label></li>
                <?php } ?>
            </ul>
            <div class="fn-clear"></div>
        </dd>
    </dl>


    <div style="padding:20px 10px;background: #fff;"><input name="Submit" type="submit" value="提交申请" class="btn" /></div>
    </form>
</div>
<script type="text/javascript">
    $('.re-money li label').bind('click',function(){
        $('.re-money li').removeClass('on');
        $(this).parents('li').addClass('on');
    });
    $('.banks label').bind('click',function(){
        $(".pays label input[type='radio']").attr("checked", false);
    });
    $('.pays label').bind('click',function(){
        $(".banks label input[type='radio']").attr("checked", false);
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>