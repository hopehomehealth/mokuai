<?php /* Smarty version Smarty-3.1.13, created on 2016-03-20 14:53:25
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\member\change_db.html" */ ?>
<?php /*%%SmartyHeaderCode:2815256d530b11353e0-72125000%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '658179ad0e919ca19b75c8a10ce869aba3c190c5' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\member\\change_db.html',
      1 => 1457939665,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2815256d530b11353e0-72125000',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d530b12dfd63_03021203',
  'variables' => 
  array (
    'L' => 0,
    'bonus_money' => 0,
    'site_config' => 0,
    'discount' => 0,
    'm' => 0,
    'key' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d530b12dfd63_03021203')) {function content_56d530b12dfd63_03021203($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!-- 引用pc端样式 -->
<link rel="stylesheet" href="<?php echo url('/style/css/member.css');?>
">

<link rel="stylesheet" href="/style/mobile/css/member.css">
<div id="content" class="container main">
    <div class="user-summary">
        <form action="" method="post" target="iframeNews">
            <div class="hy-tjxh" style="padding-bottom: 15px;">
                <div class="title"><h2>购买网盘，获得<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
</h2></div>
                <div class="change_bar">
                <div>
                    <?php if ($_smarty_tpl->tpl_vars['bonus_money']->value*2>=$_smarty_tpl->tpl_vars['site_config']->value['change_db_limit']){?>
                    <div style="padding:10px 0 20px;font-size:14px;">
                        今日已赠送<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
数量<b class="color01"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['bonus_money']->value)===null||$tmp==='' ? 0 : $tmp);?>
</b>/
                        限额<b class="color01"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['site_config']->value['change_db_limit'])===null||$tmp==='' ? 0 : $tmp);?>
</b>/
                        剩余<b class="color01"><?php echo (($tmp = @($_smarty_tpl->tpl_vars['site_config']->value['change_db_limit']-$_smarty_tpl->tpl_vars['bonus_money']->value))===null||$tmp==='' ? 0 : $tmp);?>
</b>
                        <?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>

                    </div>
                    <?php }?>
                    <div class="ui-left fwb" style="line-height: 44px; font-size: 14px;margin-right: 15px;">兑换金额:</div>
                    <div class="w-pay-selector">
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['discount']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['discount']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['discount']['iteration']++;
?>
                        <div class="w-pay-money <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['discount']['iteration']==1){?>w-pay-money-selected<?php }?>"><?php if ($_smarty_tpl->tpl_vars['m']->value){?><span class="discount">首次兑换送<?php echo $_smarty_tpl->tpl_vars['m']->value;?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
</span><?php }?><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
元<input type="radio" name="amount" <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['discount']['iteration']==1){?>checked<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" style="display: none"></div>
                        <?php } ?>
                        <div class="w-pay-money otherbar"><span>其他金额</span>&nbsp;&nbsp;<input maxlength="6" style="width: 50px;" class="w-input-input" name="other" type="text"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div>每支付1元购买<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
云盘，系统将会赠送1个<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
（即1次抽奖机会），兑换1<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
＝1M云盘   <span class="color01"> (<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
云盘自动开通功能在开发中，请<a class="color01" href="<?php echo url('/content/index/');?>
35" target="_blank">联系客服</a>手动开通，云盘资源1年内开通使用有效)</span>，兑换的款项将无法退回。</div>
                </div>
                <div class="btn2">
                    <input name="Submit" type="submit" value="确认兑换" class="hy-btn2" /><input type="reset" value="重置表单" class="hy-btn2" />
                </div>
            </div>
            </form>
    </div>
</div>

<script type="text/javascript">
$(function(){
    $("input[name=other]").blur(function(){
        var amount = $(this).val();
        $('.other_dis').remove();
        $.post('/member/ajax_discount_db',{amount:amount},function(data){
            var html = '<span class="discount other_dis">送'+data+'</span>';
            if(data>0){
                $('.otherbar').prepend(html);
            }

        });
    });
    $(".w-pay-money").click(function(){
        $(this).addClass("w-pay-money-selected").siblings().removeClass("w-pay-money-selected");
        $(this).children("input").prop('checked',true);
    });
});
</script>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>