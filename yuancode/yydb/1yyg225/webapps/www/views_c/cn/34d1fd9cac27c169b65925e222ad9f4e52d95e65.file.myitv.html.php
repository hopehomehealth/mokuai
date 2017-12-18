<?php /* Smarty version Smarty-3.1.13, created on 2016-03-23 13:42:28
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\member\myitv.html" */ ?>
<?php /*%%SmartyHeaderCode:712956cea496012f09-48516659%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34d1fd9cac27c169b65925e222ad9f4e52d95e65' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\member\\myitv.html',
      1 => 1458650126,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '712956cea496012f09-48516659',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56cea496388e73_73051828',
  'variables' => 
  array (
    'comment' => 0,
    'qrcode' => 0,
    'cmss' => 0,
    'm' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56cea496388e73_73051828')) {function content_56cea496388e73_73051828($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/css/member.css">
<link rel="stylesheet" href="<?php echo url('/style/css/refer.css');?>
">
<script src="<?php echo url('/style/jquery.ajaxContent.pack.js');?>
" type="text/javascript"></script>
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
                        <p class="p2"><textarea id="text" onfocus="this.style.borderColor='#777';this.select();" onblur="this.style.borderColor='#ccc'"><?php echo $_smarty_tpl->tpl_vars['comment']->value['text'];?>
 <?php echo $_smarty_tpl->tpl_vars['comment']->value['url'];?>
</textarea></p>
                        <p class="p5"><a class="hy-btn2" id="copybtn">复制链接</a><span style="margin-left:20px; font-size: 12px;">建议您写分享感受，获得最好邀请效果</span></p>
                        <label style="float:left;color:#339900;line-height: 1.8;">瞬间分享到：</label><?php echo share($_smarty_tpl->tpl_vars['comment']->value);?>

                    </div>
                    <div style="float: left; width: 420px;">
                        <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['qrcode']->value),$_smarty_tpl);?>
" style="float: left;" width="140"/>
                        <div style="float: left; width: 260px; margin-left: 5px; margin-top: 15px;">我的专属二维码，分享给好友，<br/>无论是微信、微博、QQ群、QQ空间……<br/>只要你乐于分享，<br/>就有收获，三重好礼等你来拿！</div>
                    </div>
                    <div style="clear: both; height: 15px;"></div>
                </div>
                <script type="text/javascript" src="<?php echo url('/style/ZeroClipboard.js');?>
"></script>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $("#copybtn").zclip( { path:'/style/ZeroClipboard.swf',copy:$('#text').html() } );
                    });
                </script>
            </div>
            <div class="fn-clear hy-tjxh hy-noborder">
                <div class="title" id="ivt_list">
                    <h2>已邀请注册人</h2>
                </div>
                <div class="hy-table" style="margin:10px auto;">
                    <style type="text/css">
                        .cmss_list_count{ font-size:16px; }
                        .cmss_list_count li{ padding-top: 10px; }
                        .cmss_list_count li p{ margin-bottom: 5px; color: #000; }
                        .cmss_list_count li p a{ color: #f30; font-weight: bold; text-decoration: underline; }
                        .load{ display:none; }
                        .hy-table td{ padding: 7px 5px; font-size: 14px; }
                    </style>
                    <ul class="cmss_list_count">
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cmss']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['f']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['f']['index']++;
?>
                        <li>
                            <p><?php echo num2char(($_smarty_tpl->getVariable('smarty')->value['foreach']['f']['index']+1));?>
级分销：<a href="javascript:;" onclick="mLoad('<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['f']['index'];?>
',true)"><?php echo $_smarty_tpl->tpl_vars['m']->value['count'];?>
</a> 人</p>
                            <div class="load" id="load_<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['f']['index'];?>
"><div class="loading">拼命加载中...</div></div>
                        </li>
                        <?php } ?>
                    </ul>
                    <script type="text/javascript">
                        function mLoad(hash, load){
                            var loadDiv = '#load_'+hash;
                            $(loadDiv).toggle();

                            load=load?load:false;
                            if(load==true){
                                $(loadDiv).load('/member/myivt?type='+hash);
                            }
                        }
                        function award_btn(mid){
                            $.layer({
                                shade: [0],
                                area: ['auto','auto'],
                                dialog: {
                                    msg: '确认领取此奖励吗？',
                                    type: 4,
                                    yes: function(){
                                        $.post('/member/award_ivt/',{ mid:mid },function(data){
                                            if(!data.error){
                                                layer.closeAll();
                                                $('#mid'+mid).addClass('hy-btn1').html('已领取');
                                            }else{
                                                layer.msg(data.msg,3);
                                            }
                                        },'json');
                                    }
                                }
                            });
                        }
                    </script>
                </div>
                <?php echo $_smarty_tpl->getSubTemplate ("public_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <div class="refer-box" style="width:900px;margin:0 auto; margin-bottom: 25px;">
                    <div class="rright" style="float:none;width:auto;">
                        <h4>温馨提示</h4>
                        <dl>
                            <dt>1、邀请注册能获得什么好处？</dt>
                            <dd>邀请会员注册，会员参拍后您将得到分销提成。</dd>
                        </dl>
                        <dl>
                            <dt>1、在哪里可以看到我的佣金？</dt>
                            <dd>在【会员中心】的【佣金明细】里可看到您的每次返现记录。佣金可申请提现，任何时候都可充值到账号中参与<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
。</dd>
                        </dl>
                        <dl>
                            <dt>2、哪些情况会导致佣金失效？</dt>
                            <dd>借助网站及其他平台，恶意获取佣金，一经查实，扣除一切佣金且封号。</dd>
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