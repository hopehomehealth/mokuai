<?php /* Smarty version Smarty-3.1.13, created on 2015-12-02 10:03:19
         compiled from "E:\projects\web\lnest\1yyg225\webapps\www\views\cn\member\myitv.html" */ ?>
<?php /*%%SmartyHeaderCode:17414565e51674d7502-03659958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21ea11e4ceeaf186063d5b4658c258107b925e6c' => 
    array (
      0 => 'E:\\projects\\web\\lnest\\1yyg225\\webapps\\www\\views\\cn\\member\\myitv.html',
      1 => 1448848598,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17414565e51674d7502-03659958',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'comment' => 0,
    'site_config' => 0,
    'qrcode' => 0,
    'award_ivt' => 0,
    'list' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565e51676523d9_25440454',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565e51676523d9_25440454')) {function content_565e51676523d9_25440454($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/css/member.css">
<link rel="stylesheet" href="<?php echo url('/style/css/refer.css');?>
">
<style type="text/css">
    .refer-box .rleft ul li{ width:420px;}
    .username img{ vertical-align:bottom;}
</style>
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="container">
    <div class="fn-clear mt20 pb20">
        <?php echo $_smarty_tpl->getSubTemplate ("member/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class="fn-right hy-r">
            <div class="fn-clear hy-tjxh">
                <div class="title"><h2>邀请好友注册</h2></div>
                <div class="hy-box" style="padding-bottom: 0;">
                    <div class="regMytiv" style="width: 450px; float: left;">
                        <p class="p1 color01">复制邀请链接：</p>
                        <p class="p2"><textarea id="text" onfocus="this.style.borderColor='#777';this.select();" onblur="this.style.borderColor='#ccc'">我在买肾6，<?php echo $_smarty_tpl->tpl_vars['comment']->value['url'];?>
 <?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
来了，给你发红包！</textarea></p>
                        <p class="p5"><a class="hy-btn2" id="copybtn">复制链接</a><span style="margin-left:20px; font-size: 12px;">建议您写分享感受，获得最好邀请效果</span></p>
                        <label style="float:left;color:#339900;line-height: 1.8;">瞬间分享到：</label><?php echo share($_smarty_tpl->tpl_vars['comment']->value);?>

                    </div>
                    <div style="float: left; width: 420px;">
                        <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['qrcode']->value),$_smarty_tpl);?>
" style="float: left;" width="140"/>
                        <div style="float: left; width: 260px; margin-left: 5px; margin-top: 15px;">我的专属二维码，分享给好友，<br/>无论是微信、微博、QQ群、QQ空间……<br/>只要你乐于分享，<br/>就有收获，三重好礼等你来拿！</div>
                    </div>

                </div>
                <script type="text/javascript" src="<?php echo url('/style/ZeroClipboard.js');?>
"></script>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $("#copybtn").zclip( { path:'/style/ZeroClipboard.swf',copy:$('#text').html() } );
                    });
                </script>
                <div class="hy-box">
                    <div class="refer-box" style="width:900px;margin:0">
                        <div class="rleft" style="width: 860px;border:0;padding:0;">
                            <ul class="fn-clear">
                                <li class="lli li02">
                                    <dl>
                                        <dt>一重礼 送送送</dt>
                                        <dd style="font-size: 12px;">
                                            邀请一位，送<b>5-25</b>拍币或<b>1</b>夺宝币 <a class="<?php if ($_smarty_tpl->tpl_vars['award_ivt']->value[1]==0||$_smarty_tpl->tpl_vars['award_ivt']->value[1]==2){?>hy-btn1<?php }else{ ?>hy-btn2<?php }?>" href="#ivt_list" >领取</a> <br>
                                            <!--
                                            邀请三位并认证，加送<b><?php echo $_smarty_tpl->tpl_vars['site_config']->value['ivt3'];?>
</b>夺宝币 <a id="ivt3" class="<?php if ($_smarty_tpl->tpl_vars['award_ivt']->value[3]==0||$_smarty_tpl->tpl_vars['award_ivt']->value[3]==2){?>hy-btn1<?php }else{ ?>hy-btn2<?php }?>" href="javascript:;" onclick="<?php if ($_smarty_tpl->tpl_vars['award_ivt']->value[3]==0){?>show_tip(3,'尚未达到领取条件,被邀请会员需通过实名认证或充值即可领取奖励')<?php }elseif($_smarty_tpl->tpl_vars['award_ivt']->value[3]==1){?>award_ivt(3,0)<?php }else{ ?>show_tip(3,'已领取')<?php }?>">领取</a><br>
                                            邀请五位并认证，加送<b>10</b>夺宝币 <a id="ivt5" class="<?php if ($_smarty_tpl->tpl_vars['award_ivt']->value[5]==0||$_smarty_tpl->tpl_vars['award_ivt']->value[5]==2){?>hy-btn1<?php }else{ ?>hy-btn2<?php }?>" href="javascript:;" onclick="<?php if ($_smarty_tpl->tpl_vars['award_ivt']->value[5]==0){?>show_tip(5,'尚未达到领取条件,被邀请会员需通过实名认证或充值即可领取奖励')<?php }elseif($_smarty_tpl->tpl_vars['award_ivt']->value[5]==1){?>award_ivt(5,0)<?php }else{ ?>show_tip(5,'已领取')<?php }?>">领取</a>-->
                                        </dd>
                                    </dl>
                                </li>
                                <li class="rli li02">
                                    <dl>
                                        <dt>二重礼 <?php echo $_smarty_tpl->tpl_vars['site_config']->value['ivtreg_db'];?>
的夺宝币提成佣金</dt>
                                        <dd>经您邀请，成功参与夺宝的好友，你都可以获得<?php echo $_smarty_tpl->tpl_vars['site_config']->value['ivtreg_db'];?>
夺宝币给您，永久有效 <a class="hy-btn2" href="<?php echo url('/member/commission');?>
">查看佣金</a> </dd>
                                    </dl>
                                </li>
                                <li class="lli li02">
                                    <dl>
                                        <dt>同时享第三重礼</dt>
                                        <dd>
                                            经您邀请，成功参与竞拍的好友，参与一件竞拍，你都可以获得<?php echo $_smarty_tpl->tpl_vars['site_config']->value['ivtreg_auction'];?>
个拍币，365天有效（不含体验区）
                                        </dd>
                                    </dl>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    function award_ivt(num,mid){
                        $.post('/member/award_ivt/'+num,{ num:num,mid:mid },function(data){
                            layer.alert(data.msg,1,function(){
                                location.reload();
                            });
                        },'json');
                    };
                    function show_tip(num,msg){
                        layer.tips(msg, "#ivt"+num, { type: 1,time: 3});
                    }
                    function show_mtip(mid,msg){
                        layer.tips(msg, "#mid"+mid, { type: 1,time: 3});
                    }
                    function award_btn(mid){
                        var pb =$('#mid'+mid).attr('pb');
                        var db =$('#mid'+mid).attr('db');
                        $.layer({
                            shade: [0],
                            area: ['auto','auto'],
                            dialog: {
                                msg: '您可以选择要领取的奖励？',
                                btns: 2,
                                type: 4,
                                btn: [db+'个夺宝币',pb+'个拍币'],
                                yes: function(){
                                    $.post('/member/award_ivt/',{ type:'2',mid:mid },function(data){
                                        layer.alert(data.msg,1,function(){
                                            location.reload();
                                        });
                                    },'json');
                                }, no: function(){
                                    $.post('/member/award_ivt/',{ type:'1',mid:mid},function(data){
                                        layer.alert(data.msg,1,function(){
                                            location.reload();
                                        });
                                    },'json');
                                }
                            }
                        });
                    }

                    function award_btn2(mid){
                        var pb =$('#mid'+mid).attr('pb');
                        var db =$('#mid'+mid).attr('db');
                        layer.alert('您确定领取1夺宝币邀请奖励？',4,function(){
                            $.post('/member/award_ivt/',{ type:'2',mid:mid },function(data){
                                layer.alert(data.msg,1,function(){
                                    location.reload();
                                });
                            },'json');
                        });
                    }

                </script>
            </div>
            <div class="fn-clear hy-tjxh hy-noborder">
                <div class="title" id="ivt_list">
                    <h2>已邀请注册人</h2>
                </div>
                <div class="hy-table" style="margin:10px auto;">
                    <p style="font-size: 14px; padding-bottom:10px; ">
                            1.邀请第1个送5拍币，第2个送10拍币，第3个送15拍币，第4个送20拍币，5个以上每个送25拍币。<br/>
                            2.被邀请人需通过<span  class="color01">语音认证、实名认证、充值</span>3种方式之1后，您才能领取奖励。<br/>
                            3.若邀请的会员大量电话无法打通，推荐人将扣回已领拍币，其拍中的商品无效，同时会被封号。
                    </p>
                    <table>
                        <tbody>
                        <tr>
                            <th colspan="2">注册会员</th>
                            <th>注册时间</th>
                        </tr>
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                          <tr>
                              <td width="5" style="padding:0px;"><?php echo $_smarty_tpl->tpl_vars['m']->value['num'];?>
、</td>
                              <td class="username"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
<?php if ($_smarty_tpl->tpl_vars['m']->value['realname']){?><img src="/style/images/idcard.gif" alt="身份证验证" /><?php }?><?php if ($_smarty_tpl->tpl_vars['m']->value['is_voice']){?><img src="/style/images/voice.gif" alt="语音认证" /><?php }?><?php if ($_smarty_tpl->tpl_vars['m']->value['rechage']){?><img src="/style/images/rechage.gif" alt="充值记录" /><?php }?></td>
                              <td>
                                  <?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['m']->value['c_time']);?>

                                  <?php if ($_smarty_tpl->tpl_vars['m']->value['realname']||$_smarty_tpl->tpl_vars['m']->value['rechage']||$_smarty_tpl->tpl_vars['m']->value['is_voice']){?>
                                  <a id="mid<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
" class="<?php if ($_smarty_tpl->tpl_vars['m']->value['is_award']==0){?>hy-btn2<?php }else{ ?>hy-btn1<?php }?>" href="javascript:;" pb="<?php echo $_smarty_tpl->tpl_vars['m']->value['pb'];?>
" db="<?php echo $_smarty_tpl->tpl_vars['m']->value['db'];?>
" onclick="<?php if ($_smarty_tpl->tpl_vars['m']->value['is_award']==0){?><?php if ($_smarty_tpl->tpl_vars['m']->value['pb']!='25'){?>award_btn(<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
)<?php }else{ ?>award_btn2(<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
)<?php }?><?php }else{ ?>show_mtip(<?php echo $_smarty_tpl->tpl_vars['m']->value['mid'];?>
,'已领取')<?php }?>">领取</a>
                                  <?php }?>
                              </td>
                          </tr>
                        <?php } ?>
                        </tbody>
                     </table>
                 </div>
                <?php echo $_smarty_tpl->getSubTemplate ("public_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <div class="refer-box" style="width:900px;margin:0 auto; margin-bottom: 25px;">
                    <div class="rright" style="float:none;width:auto;">
                        <h4>温馨提示</h4>
                        <dl>
                            <dt>1、在哪里可以看到我的佣金？</dt>
                            <dd>在【会员中心】的【佣金明细】里可看到您的每次返现记录。佣金满100及以上可申请提现，任何时候都可充值到账号中参与夺宝。</dd>
                        </dl>
                        <dl>
                            <dt>2、哪些情况会导致佣金失效？</dt>
                            <dd>借助网站及其他平台，恶意获取佣金，一经查实，扣除一切佣金且封号。</dd>
                        </dl>
                        <dl>
                            <dt>3、自己邀请自己也能获得佣金吗？</dt>
                            <dd>不可以。我们会人工核查，对于查实的作弊行为，扣除一切佣金，取消邀请佣金的资格且封号。</dd>
                        </dl>
                        <dl>
                            <dt>4、如何知道我有没有邀请成功</dt>
                            <dd>您可以在【会员中心】的【我的邀请】里面查看。</dd>
                        </dl>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>