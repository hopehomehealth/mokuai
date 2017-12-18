<?php /* Smarty version Smarty-3.1.13, created on 2016-12-19 16:11:46
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/myitv.html" */ ?>
<?php /*%%SmartyHeaderCode:6188375775857964277a067-05903772%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30aaa1d358d5cff04c9eb9755e8932b4a8582cab' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/member/myitv.html',
      1 => 1481177938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6188375775857964277a067-05903772',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'qrcode' => 0,
    'comment' => 0,
    'wechat' => 0,
    'site_config' => 0,
    'cmss' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5857964284a378_12875541',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5857964284a378_12875541')) {function content_5857964284a378_12875541($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/member.css">
<script src="<?php echo url('/style/jquery.ajaxContent.pack.js');?>
" type="text/javascript"></script>
<style type="text/css">
    .form-itv{ font-size: 1.4rem; padding: 0 10px 15px; }
    .form-itv p{ margin-bottom: 5px; }

    .clr{ clear: both; }
    .itv-share{ overflow: hidden; height: 80px; position: relative; margin: 15px 10px; }
    .itv-share dt{ position: absolute; left: 0; top:0; width: 80px; }
    .itv-share dt img{ height: 80px; }
    .itv-share dd{ margin-left: 90px; }
</style>
<div id="content" class="container main">
    <div class="tab-m-a">
        <ul class="ui-clr">
            <li class="ta">邀请好友</li>
            <li class="ta last">我的邀请</li>
        </ul>
    </div>

    <div class="tab-m-c" style="display: none;">
        <div class="tips-m">
            <ul>
                <li>
                    <dl class="prompt">
                        <dt style="font-weight: bold;">邀请会员注册，会员参拍后您将得到分销提成。</dt>
                    </dl>
                </li>
            </ul>
        </div>

        <dl class="itv-share">
            <dt><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['qrcode']->value),$_smarty_tpl);?>
" /></dt>
            <dd><textarea id="text" style="border:0;width:100%;height:80px;background:none;overflow:visible"><?php echo $_smarty_tpl->tpl_vars['comment']->value['text'];?>
 <?php echo $_smarty_tpl->tpl_vars['comment']->value['url'];?>
</textarea></dd>
            <div class="clr"></div>
        </dl>

        <?php if ($_smarty_tpl->tpl_vars['wechat']->value){?>
        <div id="mess_share">
            <div id="share_1">
                <button class="button2" id="onMenuShareAppMessage" onclick="_system._guide(true)">
                    <img src="/style/images/wxshare/icon_msg.png" width="64" height="64" />
                    &nbsp;发送给朋友
                </button>
            </div>
            <div id="share_2">
                <button class="button2" id="onMenuShareTimeline" onclick="_system._guide(true)">
                    <img src="/style/images/wxshare/icon_timeline.png" width="64" height="64" />
                    &nbsp;分享到朋友圈
                </button>
            </div>
            <div class="clr"></div>
        </div>
        <script type="text/javascript">
            $(function(){
                $('#onMenuShareAppMessage,#onMenuShareTimeline').bind('click',function(){
                    wxShare();
                });
                wx.ready(function () {
                    wxShare();
                });
            })

            function wxShare(){
                //分享给朋友
                wx.onMenuShareAppMessage({
                    title: '<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
',
                    desc: $('#text').val(),
                    link: '<?php echo $_smarty_tpl->tpl_vars['comment']->value['url'];?>
',
                    imgUrl: '<?php echo $_smarty_tpl->tpl_vars['comment']->value['pic'];?>
',
                    trigger: function (res) {
                        //不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
                        //alert('用户点击发送给朋友');
                    },
                    success: function (res) {
                        layer.msg('分享成功',3,{ type:1 })
                    },
                    cancel: function (res) {
                        layer.msg('已取消');
                    },
                    fail: function (res) {
                        //alert(JSON.stringify(res));
                    }
                });
                //分享到朋友圈
                wx.onMenuShareTimeline({
                    title: $('#text').val(),
                    link: '<?php echo $_smarty_tpl->tpl_vars['comment']->value['url'];?>
',
                    imgUrl: '<?php echo $_smarty_tpl->tpl_vars['comment']->value['pic'];?>
',
                    trigger: function (res) {
                        // 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
                        //alert('用户点击分享到朋友圈');
                    },
                    success: function (res) {
                        layer.msg('分享成功',3,{ type:1 })
                    },
                    cancel: function (res) {
                        layer.msg('已取消');
                    },
                    fail: function (res) {
                        alert(JSON.stringify(res));
                    }
                });
                //分享到QQ
                wx.onMenuShareQQ({
                    title: '<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
',
                    desc: $('#text').val(),
                    link: '<?php echo $_smarty_tpl->tpl_vars['comment']->value['url'];?>
',
                    imgUrl: '<?php echo $_smarty_tpl->tpl_vars['comment']->value['pic'];?>
',
                    success: function () {
                        layer.msg('分享成功',3,{ type:1 })
                    },
                    cancel: function () {
                        layer.msg('已取消');
                    }
                });
                wx.error(function (res) {
                    alert(res.errMsg);
                });
            }
        </script>
        <?php }else{ ?>
        <div class="form-itv">
            <p><a class="btn-small" id="allselect">全选</a></p>
            <label style="color:#339900;line-height: 1.8;">瞬间分享到：</label><?php echo share($_smarty_tpl->tpl_vars['comment']->value);?>

            <script type="text/javascript">
                $(function(){
                    $('#allselect').click(function(){
                        $('#text').select();
                    });
                });
            </script>
            <div style="clear: both;height: 10px;"></div>
        </div>
        <?php }?>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['wechat']->value){?>
    <?php echo $_smarty_tpl->getSubTemplate ("public_share.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php }?>

    <div class="tab-m-c" style="display: none;">
        <div class="tips-m">
            <div class="prompt">
                <b>邀请会员注册，会员参拍后您将得到分销提成。</b>
            </div>
        </div>

        <style type="text/css">
            .list-address dl dt a{ text-decoration: underline; color: #f30; font-weight: bold; }
            .load_myitv{ display: none; }
        </style>
        <div class="list01 list-address">
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cmss']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['f']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['f']['index']++;
?>
            <dl>
                <dt><?php echo $_smarty_tpl->tpl_vars['m']->value['levelName'];?>
：<?php echo $_smarty_tpl->tpl_vars['m']->value['count'];?>
 人 <a href="javascript:;" onclick="mLoad('<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['f']['index'];?>
',true)">点击查看</a></dt>
                <dd class="load_myitv" id="load_<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['f']['index'];?>
"><div class="loading">拼命加载中...</div></dd>
            </dl>
            <?php } ?>
        </div>
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
                                    $('#mid'+mid).addClass('btn-disable').html('已领取');
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
</div>
<script type="text/javascript">
    $(function(){
        tabs('#content','.tab-m-a li','.tab-m-c','on','click')
    });
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>