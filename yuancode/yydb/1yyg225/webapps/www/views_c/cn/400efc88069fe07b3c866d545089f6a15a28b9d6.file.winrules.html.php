<?php /* Smarty version Smarty-3.1.13, created on 2016-12-14 09:08:20
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/html/winrules.html" */ ?>
<?php /*%%SmartyHeaderCode:16827684735847d1b9792738-83655765%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '400efc88069fe07b3c866d545089f6a15a28b9d6' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/html/winrules.html',
      1 => 1481177860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16827684735847d1b9792738-83655765',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5847d1b97fb925_83012201',
  'variables' => 
  array (
    'L' => 0,
    'site_config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5847d1b97fb925_83012201')) {function content_5847d1b97fb925_83012201($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
    .winrules-box{ padding-bottom: 0; font-size: 14px; color: #333; }
    .d1{ width: 1226px; height: 634px; margin:0 auto; background: url('/style/images/winrules/01.gif') no-repeat; margin-bottom: 40px; position: relative;}
    .d1 .text1{ position: absolute; left: 70px; top: 346px; color: #96000b; }
    .d1 .text1 a{ color: #96000b; }
    .d1 .text1 a:hover{ color: #e54048; }
    .d1 .text2{ position: absolute; left: 780px; top: 33px; width: 380px;}
    .d1 .text2 dl{ margin-bottom: 10px;}
    .d1 .text2 dt{ color: #fcff00; font-size: 16px; }
    .d1 .text2 dd{ color: #fff; }
    .d1 .text3{ position: absolute; left: 60px; top: 470px; width: 708px; }
    .d1 .text3 dt{ font-size: 24px; color: #e54048; margin-bottom: 10px; }
    .d1 .text3 dd{ font-size: 20px; }
    .d2{ height: 292px; background: url('/style/images/winrules/02.gif') repeat-x; margin-bottom: 18px; }
    .d2 dl{ width: 1059px; height: 241px; margin:0 auto; background: url('/style/images/winrules/03.gif') no-repeat right 24px; padding-top:24px; position: relative; }
    .d2 dl dt{ font-size: 20px; color: #fff; margin-bottom: 5px; padding-top:30px; }
    .d2 dl .text01{ padding-right:250px; }
    .d2 dl .text01 li{ float:left; color: #fffc00; font-size: 22px; margin:10px 0 0 0; width: 25%; }
    .d2 dl .tip{ position: absolute; right: 280px; top:200px; font-size: 20px; color: #ffff00; }
    .d3{ width: 1152px; height: auto; margin:0 auto; }
    .d3 h4{ height: 101px; background: url('/style/images/winrules/04.gif') no-repeat; margin-bottom: 13px; }
    .d3 ul li{ float:left; }
</style>
<div class="fn-clear winrules-box">
    <div class="d1">
        <div class="text1">
            上证收盘指数参考以下三个网站，如出现不一致，采用两个相同的作为<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
的参考数据：<br>
            <a href="http://cj.gw.com.cn/news/index/000001.shtml">http://cj.gw.com.cn/news/index/000001.shtml</a> 大智慧财经<br>
            <a href="http://finance.ifeng.com/app/hq/stock/sh000001">http://finance.ifeng.com/app/hq/stock/sh000001</a> 凤凰网财经<br>
            <a href="http://www.10jqka.com.cn">http://www.10jqka.com.cn</a> 同花顺网站
        </div>
        <div class="text2">
            <dl>
                <dt>首次出价后，什么时候<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_duijiang'];?>
呢？</dt>
                <dd>当天14点前首次出价随机码参考当天的上证收盘指数，14点之后参考次日的，因周末或节假日无上证指数，或由系统时间导致的不可预计的误差，故<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
参考日期以会员中心活动领取为准。</dd>
            </dl>
            <dl>
                <dt>我怎么知道我<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
了？</dt>
                <dd>如果<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
了，请在16点过后登录【会员中心】-【<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
领取】中点领取即可。</dd>
            </dl>
            <dl>
                <dt><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
商品有什么支付规则呢？</dt>
                <dd>首先，<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
商品直接使用参缴<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_baozheng'];?>
直接抵扣，<br>需在<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_duijiang'];?>
有效期内额外充值购买<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
商品；<br>其次，<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
商品不能使用<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
抵扣，<br><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
只能成功<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
的时候使用。</dd>
            </dl>
            <dl>
                <dt>我<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
了，又不需要了，<br>会扣<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_baozheng'];?>
吗？</dt>
                <dd>不会，<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
商品没有领取，<br>拍卖结束后<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_baozheng'];?>
将会<br>定期解冻。</dd>
            </dl>
        </div>
        <div class="text3">
            <dl>
                <dt>精品拍、卡券拍任意一个商品均有机会按首次出价成交。</dt>
                <dd>什么是首次出价10%<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
呢？<br>您在<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
上的精品拍和卡券拍中任意一个商品首次出价，系统将发送一组六位数字的随机码，随机码的个位若与上证指数收盘个位数字相同，您可以按你首次出价的价格获得商品。</dd>
            </dl>
        </div>
    </div>
    <div class="d2">
        <dl>
            <dt>为了满足广大拍友的要求，对首次出价10%<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
活动做进一步拓展，拟定商品<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
比例分为:</dt>
            <dd class="text01">
                <ul class="fn-clear">
                    <li>10%(百分之十)</li>
                    <li>1%(百分之一)</li>
                    <li>0.1%(千分之一)</li>
                    <li>0.01%(万分之一)</li>
                    <li>50%(百分之五十)</li>
                    <li>5%(百分之五)</li>
                    <li>0.5%(千分之五)</li>
                    <li>0.05%(万分之五)</li>
                </ul>
            </dd>
            <dd class="tip">具体比例详见商品列表页面此处</dd>
        </dl>
    </div>
    <div class="d3">
        <h4></h4>
        <ul class="fn-clear">
            <li><img src="/style/images/winrules/win10.gif" /></li>
            <li><img src="/style/images/winrules/win1.gif" /></li>
            <li><img src="/style/images/winrules/win0.1.gif" /></li>
            <li><img src="/style/images/winrules/win0.01.gif" /></li>
            <li><img src="/style/images/winrules/win50.gif" /></li>
            <li><img src="/style/images/winrules/win5.gif" /></li>
            <li><img src="/style/images/winrules/win0.5.gif" /></li>
            <li><img src="/style/images/winrules/win0.05.gif" /></li>
            <li><img src="/style/images/winrules/win20.gif" /></li>
        </ul>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>