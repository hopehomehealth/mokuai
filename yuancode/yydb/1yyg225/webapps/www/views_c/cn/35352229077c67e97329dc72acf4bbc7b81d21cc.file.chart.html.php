<?php /* Smarty version Smarty-3.1.13, created on 2016-12-07 08:09:44
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/content/chart.html" */ ?>
<?php /*%%SmartyHeaderCode:47352718858475348188f02-75824903%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35352229077c67e97329dc72acf4bbc7b81d21cc' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/content/chart.html',
      1 => 1456367946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47352718858475348188f02-75824903',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'L' => 0,
    'site_config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58475348242f42_59766580',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58475348242f42_59766580')) {function content_58475348242f42_59766580($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/refer.css');?>
">
<style type="text/css">
    .chart-box{ border: 1px solid #ebebeb; width: 1180px; margin: 0 auto 30px; padding: 50px 0; overflow: hidden; line-height: 1.8; }
    .chart-c2{ width: 50%; float:left; overflow: visible;}
    .chart-c3{ width: 33%; float:left; overflow: visible;}
    .chart-c5{ width: 20%; float:left; overflow: visible;}

    .chart-home{ width:1248px; overflow: hidden; margin-left:-90px }
    .chart-home h3{ height: 95px; background: url('/style/images/chart/head_1.gif') no-repeat center; margin-bottom: 20px; }
    .chart-home h3 a{ display: block; width: 380px; height: 69px; overflow: hidden; margin: 0 auto; cursor: pointer; }

    .chart-category{ width:1248px; overflow: hidden; margin-left:-15px }
    .chart-category h3{ height: 95px; background: url('/style/images/chart/head_2.gif') no-repeat center; margin-bottom: 20px; }
    .chart-category h3 a{ display: block; width: 380px; height: 69px; overflow: hidden; margin: 0 auto; cursor: pointer; }

    .chart-box dd{ text-align: center; margin: 0; padding: 0; }
    .chart-box dd .txt{ display: inline-block; height: 38px; line-height: 38px; overflow: visible; text-align: center; font-size: 18px; color: #fff; margin:0 auto; padding: 0 20px; white-space: nowrap }
    .chart-box dd a{ color: #fff; }
    .chart-box dd a:hover{ color: #eee; }
    .chart-box .chart-c5 dd .txt{ height: 30px; line-height: 30px; padding: 0 10px; font-size: 16px; }
    .chart-box dd .txt-red{ background: #e54048; }
    .chart-box dd .txt-red.dis{ background: #f16d73; }
    .chart-box dd .txt-org{ background: #ef400c; }
    .chart-box dd .txt-org.dis{ background: #e86741; }
    .chart-box dd .txt-org2{ background: #e88e41; }
    .chart-box dd .txt-org2.dis{ background: #e8af41; }

    .chart-box dt{ margin: 10px 0 15px; background-position: center; background-repeat: no-repeat; }
    .arrow-d1 dt{ height: 63px; overflow: hidden; background-image: url('/style/images/chart/arrow_d1.gif'); }
    .arrow-d2{ width: 492px; overflow: hidden; margin: 0 auto; }
    .arrow-d2 dt{ height: 64px; overflow: hidden; background-image: url('/style/images/chart/arrow_d2.gif'); }
    .arrow-d3{ width: 492px; overflow: hidden; margin: 0 auto; }
    .arrow-d3 dt{ height: 63px; overflow: hidden; background-image: url('/style/images/chart/arrow_d3.gif'); }
    .arrow-u2-d5{ width: 590px; overflow: hidden; margin: 0 auto; }
    .arrow-u2-d5 dt{ height: 194px; overflow: hidden; background-image: url('/style/images/chart/arrow_u2_d5.gif'); }

    .arrow-u2{ width: 492px; overflow: hidden; margin: 0 auto; }
    .arrow-u2 dt{ height: 64px; overflow: hidden; background-image: url('/style/images/chart/arrow_u2.gif'); }
</style>
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="fn-clear chart-box">
    <div class="chart-home">
        <h3><a href="<?php echo url();?>
"></a></h3>
        <div class="chart-c2">
            <dl class="arrow-d1">
                <dd><a href="<?php echo url('/member/regist');?>
" target="_blank" class="txt txt-red dis">点击<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_gift'];?>
</a></dd>
            </dl>
            <dl class="arrow-d1">
                <dt></dt>
                <dd><a href="<?php echo url('/member/regist');?>
" target="_blank" class="txt txt-red dis">注册成为<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
会员</a></dd>
            </dl>
            <dl class="arrow-d1">
                <dt></dt>
                <dd><a href="<?php echo url('/member');?>
" target="_blank" class="txt txt-red dis">进入<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
会员主页</a></dd>
            </dl>
            <dl class="arrow-d1">
                <dt></dt>
                <dd><a href="<?php echo url('/content/index/78');?>
" target="_blank" class="txt txt-red dis">点击领取<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</a></dd>
            </dl>
            <dl class="arrow-d1">
                <dt></dt>
                <dd><a href="<?php echo url('/content/tiyan');?>
" target="_blank" class="txt txt-red dis">做任务 领<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</a></dd>
            </dl>
            <dl class="arrow-d2">
                <dt></dt>
                <dd>
                    <div class="chart-c2">
                        <dl>
                            <dd><a href="<?php echo url('/content/tiyan');?>
" target="_blank" class="txt txt-red dis">体验拍</a></dd>
                        </dl>
                    </div>
                    <div class="chart-c2">
                        <dl>
                            <dd><a href="<?php echo url('/content/tiyan/db');?>
" target="_blank" class="txt txt-red dis">免费<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</a></dd>
                        </dl>
                    </div>
                </dd>
            </dl>
        </div>
        <div class="chart-c2">
            <dl class="arrow-d1">
                <dd><a href="<?php echo url('/member/login');?>
" target="_blank" class="txt txt-org dis">点击请登录</a></dd>
            </dl>
            <dl class="arrow-d1">
                <dt></dt>
                <dd><a href="<?php echo url('/member');?>
" target="_blank" class="txt txt-org dis">进入<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
会员主页</a></dd>
            </dl>
            <dl class="arrow-d1">
                <dt></dt>
                <dd><a href="<?php echo url('/member');?>
" target="_blank" class="txt txt-org dis">点击我的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</a></dd>
            </dl>
            <dl class="arrow-d2">
                <dt></dt>
                <dd>
                    <div class="chart-c2">
                        <dl>
                            <dd><a href="<?php echo url('/member');?>
" target="_blank" class="txt txt-org dis">签到领<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</a></dd>
                        </dl>
                    </div>
                    <div class="chart-c2">
                        <dl>
                            <dd><span class="txt txt-org dis"><a href="<?php echo url('/member/change_db');?>
" target="_blank">兑换</a>、<a href="<?php echo url('/member/recchage');?>
" target="_blank">充值</a></span></dd>
                        </dl>
                    </div>
                </dd>
            </dl>
            <dl class="arrow-u2-d5">
                <dt></dt>
                <dd>
                    <div class="chart-c5">
                        <dl>
                            <dd><a href="<?php echo url('/yunbuy');?>
" target="_blank" class="txt txt-org dis"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_one'];?>
</a></dd>
                        </dl>
                    </div>
                    <div class="chart-c5">
                        <dl>
                            <dd><a href="<?php echo url('/content/tiyan/db');?>
" target="_blank" class="txt txt-org dis">免费<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</a></dd>
                        </dl>
                    </div>
                    <div class="chart-c5">
                        <dl>
                            <dd><a href="<?php echo url('/auction/lists/kaquan');?>
" target="_blank" class="txt txt-org dis">卡券<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
</a></dd>
                        </dl>
                    </div>
                    <div class="chart-c5">
                        <dl>
                            <dd><a href="<?php echo url('/auction/lists/jingpin');?>
" target="_blank" class="txt txt-org dis">精品<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
</a></dd>
                        </dl>
                    </div>
                    <div class="chart-c5">
                        <dl>
                            <dd><a href="<?php echo url('/content/tiyan');?>
" target="_blank" class="txt txt-org dis">体验<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
</a></dd>
                        </dl>
                    </div>
                </dd>
            </dl>
        </div>
    </div>
    <div class="chart-category" style="margin-top:100px;">
        <h3><a href="#"></a></h3>
        <div class="chart-c2">
            <dl class="arrow-d1">
                <dd><a href="<?php echo url('/auction/lists');?>
" target="_blank" class="txt txt-red dis"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
</a></dd>
            </dl>
            <dl class="arrow-d3">
                <dt></dt>
                <dd>
                    <div class="chart-c3">
                        <dl>
                            <dd><a href="<?php echo url('/auction/lists/kaquan');?>
" target="_blank" class="txt txt-red dis">卡券<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
</a></dd>
                        </dl>
                    </div>
                    <div class="chart-c3">
                        <dl>
                            <dd><a href="<?php echo url('/auction/lists/jingpin');?>
" target="_blank" class="txt txt-red dis">精品<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
</a></dd>
                        </dl>
                    </div>
                    <div class="chart-c3">
                        <dl>
                            <dd><a href="<?php echo url('/content/tiyan');?>
" target="_blank" class="txt txt-red dis">体验<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
</a></dd>
                        </dl>
                    </div>
                </dd>
            </dl>
            <dl class="arrow-u2">
                <dt></dt>
                <dd>
                    <div class="chart-c1">
                        <dl>
                            <dd><a href="<?php echo url('/content/index/44');?>
" target="_blank" class="txt txt-org2 dis"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
规则</a></dd>
                        </dl>
                    </div>
                </dd>
            </dl>
            <dl class="arrow-d2">
                <dt></dt>
                <dd>
                    <div class="chart-c2">
                        <dl>
                            <dd><a href="<?php echo url('/content/index/44');?>
" target="_blank" class="txt txt-org2 dis">价高者得</a></dd>
                        </dl>
                    </div>
                    <div class="chart-c2">
                        <dl>
                            <dd><a href="<?php echo url('/content/html/winrules');?>
" target="_blank" class="txt txt-org2 dis">按首次出价<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
率获得</a></dd>
                        </dl>
                    </div>
                </dd>
            </dl>
        </div>
        <div class="chart-c2">
            <dl class="arrow-d1">
                <dd><a href="<?php echo url('/yunbuy');?>
" target="_blank" class="txt txt-org dis"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</a></dd>
            </dl>
            <dl class="arrow-d2">
                <dt></dt>
                <dd>
                    <div class="chart-c2">
                        <dl>
                            <dd><a href="<?php echo url('/yunbuy');?>
" target="_blank" class="txt txt-org dis"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_one'];?>
</a></dd>
                        </dl>
                    </div>
                    <div class="chart-c2">
                        <dl>
                            <dd><a href="<?php echo url('/content/tiyan/db');?>
" target="_blank" class="txt txt-org dis">免费<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</a></dd>
                        </dl>
                    </div>
                </dd>
            </dl>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.chart-box dd .txt').bind('mouseover',function(){
        $(this).removeClass('dis');
    }).bind('mouseout',function(){
        $(this).addClass('dis');
    })
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>