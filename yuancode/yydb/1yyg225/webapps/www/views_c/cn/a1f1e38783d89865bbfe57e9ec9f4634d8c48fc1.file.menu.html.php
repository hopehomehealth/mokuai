<?php /* Smarty version Smarty-3.1.13, created on 2016-06-01 11:05:03
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\member\menu.html" */ ?>
<?php /*%%SmartyHeaderCode:215355660f768d7b8c4-38504517%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1f1e38783d89865bbfe57e9ec9f4634d8c48fc1' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\member\\menu.html',
      1 => 1464681019,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '215355660f768d7b8c4-38504517',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660f7690f7263_55517487',
  'variables' => 
  array (
    'member' => 0,
    'safe_level' => 0,
    'L' => 0,
    'bonus_count' => 0,
    'site_config' => 0,
    'is_signin' => 0,
    'nav' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660f7690f7263_55517487')) {function content_5660f7690f7263_55517487($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\test1yyg3.lnest.com\\system\\smarty\\plugins\\modifier.truncate.php';
?><div class="hy-txx fn-clear mb15">
    <a href="<?php echo url('/member/photo#m');?>
" class="hy-txa"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['member']->value['photo'],'nopic'=>$_smarty_tpl->tpl_vars['member']->value['defaultPic']),$_smarty_tpl);?>
" alt="" /></a>
    <div class="fn-left hy-txx-l">
        <div class="hy-txx-name">
            <a href="<?php echo url('/member');?>
" class="hy-username"><strong><?php if ($_smarty_tpl->tpl_vars['member']->value['nickname']){?><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['member']->value['nickname'],6);?>
<?php }else{ ?><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['member']->value['username'],6);?>
<?php }?></strong></a>
            <span id="hello">下午好！</span>
            <a href="<?php echo url('/content/index/43');?>
" class="color02">[<?php echo (($tmp = @$_smarty_tpl->tpl_vars['member']->value['rank_name'])===null||$tmp==='' ? '普通会员' : $tmp);?>
]</a> 经验值<a title="距下次升级还需<?php echo $_smarty_tpl->tpl_vars['member']->value['level_upgrade'];?>
经验" style="cursor:pointer;" class="color01">(<?php echo $_smarty_tpl->tpl_vars['member']->value['rank_points'];?>
)</a>

            &nbsp;&nbsp;
            <?php if ($_smarty_tpl->tpl_vars['member']->value['idcard']){?>
            <a title="实名认证已通过"><img src="/style/images/hy-ico2-1.png" alt="身份证验证" /></a>
            <?php }else{ ?>
            <a href="<?php echo url('/member/verifyidcard#m');?>
" title="点击实名认证"><img src="/style/images/hy-ico2.png" /></a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['member']->value['verify_email']){?>
            <a title="邮箱验证已通过"><img src="/style/images/hy-ico3-1.png" /></a>
            <?php }else{ ?>
            <a href="<?php echo url('/member/verifyEmail#m');?>
" title="点击验证邮箱"><img src="/style/images/hy-ico3.png" /></a>
            <?php }?>
        </div>
        <div class="mb10">
            <span class="fn-left">账户安全等级：</span>
            <ul class="hy-mmqd fn-clear">
                <li <?php if ($_smarty_tpl->tpl_vars['safe_level']->value==1){?>class="dq"<?php }?>>弱</li>
                <li <?php if ($_smarty_tpl->tpl_vars['safe_level']->value==2){?>class="dq"<?php }?>>中</li>
                <li <?php if ($_smarty_tpl->tpl_vars['safe_level']->value==3){?>class="dq"<?php }?>>强</li>
            </ul>
            <div class="fn-clear"></div>
        </div>
        <p class="color03 clear">当前/最近<span class="color01">登录IP</span>：<?php echo $_smarty_tpl->tpl_vars['member']->value['ip'];?>
/<?php echo $_smarty_tpl->tpl_vars['member']->value['lastip'];?>
</p>
        <p class="color03">当前/最近<span class="color01">登录时间</span>：<?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['member']->value['login']);?>
/<?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['member']->value['lastlogin']);?>
</p>
        <p class="hy-ltx">
            <a href="<?php echo url('/member/photo#m');?>
" class="a1">修改头像</a>
            <span>|</span>
            <a href="<?php echo url('/member/info#m');?>
" class="a2">完善资料</a>
        </p>
    </div>

    <div class="fn-right hy-txx-r">
        <table>
            <thead>
            <tr>
                <td>
                    <a href="<?php echo url('/member/accountdetail');?>
#m"><strong class="color01">￥<?php echo $_smarty_tpl->tpl_vars['member']->value['user_money'];?>
</strong></a><br /><span>可用余额</span>
                </td>
                <?php if (@constant('IsAuction')){?>
                <td>
                    <a href="<?php echo url('/member/accountdetail');?>
#m"><strong class="color01">￥<?php echo $_smarty_tpl->tpl_vars['member']->value['frozen_money'];?>
</strong></a><br /><span>冻结余额</span>
                </td>
                <?php }?>
                <td>
                    <a href="<?php echo url('/member/accountdetail');?>
#m"><strong class="color01"><?php echo $_smarty_tpl->tpl_vars['member']->value['pay_points'];?>
</strong></a><br /><span><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</span>
                </td>
                <td>
                    <a href="<?php echo url('/member/accountdetail');?>
#m"><strong class="color01"><?php echo $_smarty_tpl->tpl_vars['member']->value['db_points'];?>
</strong></a><br /><span><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
</span>
                </td>
                <td style="border-right: 0;">
                    <a href="<?php echo url('/member/bonus');?>
#m" id="layerTip-bonus"><strong class="color01"><?php echo $_smarty_tpl->tpl_vars['bonus_count']->value['money'];?>
</strong></a><br /><span>限时<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
</span>
                </td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="5" class="hy-txx-rbtn">
                	<?php if ($_smarty_tpl->tpl_vars['site_config']->value['apply_jufu']!=1){?>
                    <a href="<?php echo url('/member/change_db#m');?>
" class="zc-a">兑换<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
</a>
                    <a href="<?php echo url('/member/recchage#m');?>
" class="zc-a">充值</a>
                    <?php if (@constant('IsAuction')){?>
                    <?php if ($_smarty_tpl->tpl_vars['site_config']->value['withdraw_status']==1){?>
                    <a href="<?php echo url('/member/withdraw#m');?>
" class="tx-a">提现</a>
                    <?php }?>
                    <?php }?>
					<?php }?>
                    <a href="<?php echo url('/member/myivt#m');?>
" class="zc-a">邀请得现金奖励</a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="fn-left hy-l">
    <div class="singer">
        <div class="singer_l_cont">
            <span>签到<br/>领<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</span>
        </div>
        <div class="singer_r_r">
            <a class="singer_r_img <?php if ($_smarty_tpl->tpl_vars['is_signin']->value){?>current<?php }?>" href="javascript:;">
                <span id="sing_for_number"></span>
            </a>
        </div>
    </div>
    <div class="hy-lnav">
        <h3 class="fn-clear"><span></span>我的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</h3>
        <ul>
            <li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='db'){?>class="dq"<?php }?>><a href="<?php echo url('/member/db');?>
"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
记录</a></li>
            <li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='luck'){?>class="dq"<?php }?>><a href="<?php echo url('/member/luck');?>
"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
记录</a></li>
        </ul>
        <?php if (@constant('IsAuction')){?>
        <h3 class="fn-clear"><span></span>我的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
</h3>
        <ul class="fn-clear">
            <li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='auction'){?>class="dq"<?php }?>><a href="<?php echo url('/member/auction');?>
"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
记录</a></li>
            <li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='cod'){?>class="dq"<?php }?>><a href="<?php echo url('/member/cod');?>
"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
领取</a></li>
        </ul>
        <?php }?>
        <h3 class="fn-clear"><span></span>我的订单</h3>
        <ul>
            <li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='order'){?>class="dq"<?php }?>><a href="<?php echo url('/member/order');?>
">订单管理</a></li>
            <li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='address'){?>class="dq"<?php }?>><a href="<?php echo url('/member/address');?>
">收货地址</a></li>
            <li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='share'){?>class="dq"<?php }?>><a href="<?php echo url(('/minfo?id=').(@constant('MID')));?>
#share" target="_blank">我的晒单</a></li>
        </ul>
        <h3 class="fn-clear"><span></span>我的资金</h3>
        <ul>
            <li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='account'){?>class="dq"<?php }?>><a href="<?php echo url('/member/accountdetail');?>
">资金明细</a></li>
            <li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='bonus'){?>class="dq"<?php }?>><a href="<?php echo url('/member/bonus');?>
">我的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
</a></li>
            <li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='commission'){?>class="dq"<?php }?>><a href="<?php echo url('/member/commission');?>
">佣金明细</a></li>
            <?php if ($_smarty_tpl->tpl_vars['site_config']->value['withdraw_status']==1){?>
            <li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='withdraw_commission_log'){?>class="dq"<?php }?>><a href="<?php echo url('/member/withdraw_commission_log');?>
">佣金提现记录</a></li>
        	<?php }?>
        </ul>
        <h3 class="fn-clear"><span></span>我的帐户</h3>
        <ul>
            <li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='info'){?>class="dq"<?php }?>><a href="<?php echo url('/member/info');?>
">个人信息</a></li>
            <li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='safe'){?>class="dq"<?php }?>><a href="<?php echo url('/member/safe');?>
">账户安全</a></li>
            <li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='myivt'){?>class="dq"<?php }?>><a href="<?php echo url('/member/myivt');?>
">我的邀请</a></li>
            <li <?php if ($_smarty_tpl->tpl_vars['nav']->value=='message'){?>class="dq"<?php }?>><a href="<?php echo url('/member/message');?>
">站内信</a></li>
        </ul>
    </div>
</div>
<div id="m"></div>
<script type="text/javascript">
    /*签到模块日期捕捉：*/
    function week(){
        var objDate= new Date();
        var week = objDate.getDay();
        switch(week)
        {
            case 0:
                week="周日";
                break;
            case 1:
                week="周一";
                break;
            case 2:
                week="周二";
                break;
            case 3:
                week="周三";
                break;
            case 4:
                week="周四";
                break;
            case 5:
                week="周五";
                break;
            case 6:
                week="周六";
                break;
        }
        $("#sing_for_number").html( week );
    }

    $(function(){
        week();

        <?php if ($_smarty_tpl->tpl_vars['bonus_count']->value['count_dis']>0){?>
        $("#layerTip-bonus").each(function(){
            layer.tips('您有<?php echo $_smarty_tpl->tpl_vars['bonus_count']->value['count_dis'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus_unit'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_db_points'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_bonus'];?>
快过期', $(this), { time:0 });
        });
        <?php }?>

        $(".singer_r_img,.btn-sing").click(function(){
            $.post('/member/ajax_signin',{},function(data){
                if(data.error==1){
                    var params = ' ';
                    if(data.url){
                        params = function(){
                            location.href=data.url;
                        };
                    }
                    layer.alert(data.msg,8,params);
                }else{
                    $(".singer_r_img").addClass("current");
                    layer.alert(data.msg,1,function(){ location.reload(); });
                }
            },'json');
        });

    });
</script><?php }} ?>