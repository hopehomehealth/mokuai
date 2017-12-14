<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equivmetahttp-equiv="x-ua-compatible"content="IE=7"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
    <meta content="北京蓝海长青规划设计研究有限公司,蓝海资讯,蓝海头条,军民融合,长青论坛" name="keywords"/>
    <meta content="北京蓝海长青规划设计研究有限公司，是一家以军事和安全为主，涉及经济、科技、国际战略、管理科学、社会发展、政策研究等领域的商业化新型高端智库，也是一家军民融合产业发展规划设计、建设运营、战略投资、顾问管理公司。" name="description"/>
    <title><?php echo ($title); ?></title>
<!-- <base target="_blank"/> -->
    <link href="<?php echo (HCSS_URL); ?>basic.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo (HCSS_URL); ?>style.css" rel="stylesheet" type="text/css"/>
    <script type="text/jscript" src="<?php echo (HJS_URL); ?>jquery-1.8.3.min.js"></script>
    <script type="text/jscript" src="<?php echo (HJS_URL); ?>banner.js"></script>
   <script type="text/javascript">
try {
var urlhash = window.location.hash;
var url= "<?php echo U('Mobile/Index/index');?>";

if (!urlhash.match("fromapp"))
{
if ((navigator.userAgent.match(/(iPhone|iPod|Android|ios|iPad)/i)))
{

window.location=url;
}
}
}
catch(err)
{
}</script>


</head>
<body>
<!--header-->
<div class="header">
    <div class="column-c">
        <p class="header-hy fl">蓝海长青—强军梦  中国梦</p>
        <ul class="header-m fr">
            <li><a href="">收藏本站</a></li>
            <li><a href="">设为首页</a></li>
        </ul>
    </div>
</div>
<div class="column-c">
    <p class="logo fl"><a href="<?php echo U('Index/index');?>"><img src="<?php echo (HIMG_URL); ?>images_03.jpg" alt="蓝海长青" /></a></p>
    <form action="/index.php/Home/News/searchlist" method="post">
        <div class="search fr">
            <p class="search_tp" > <input id="search" name="search" class="search_k fl" type="text" placeholder="请输入您要搜索的内容" />
            <button type="submit" id="shou" class="search-an"></button></p>


        </div>
    </form>
</div>
<script type="text/javascript">

$(function(){
    $('#shou').click(function(){
    var name = $('#search').val();
    if(name == ''){
        alert('搜索内容不能为空');
        return false;
    }
    });

});
</script>

<!--header-->
<!--menu-->
<div class="menu">
    <ul class="menu_nr">
        <li <?php if(CONTROLLER_NAME == Index): ?>class="cur"<?php endif; ?>><a href="<?php echo U('Index/index');?>"><?php echo ($shouye[0]['lan_title']); ?></a></li>
        <li <?php if((ACTION_NAME == gongsijianjie) OR (ACTION_NAME == qiyejingshen) OR (ACTION_NAME == yewufanwei) OR (ACTION_NAME == zuzhijiagou) OR (ACTION_NAME == zhuanjiaduiwu) OR (ACTION_NAME == rencaizhaopin)): ?>class="cur"<?php endif; ?>><a href="<?php echo U('News/gongsijianjie');?>"><?php echo ($guanyu1[0]['lan_title']); ?></a>
            <div class="childnavin">
                <img src="<?php echo (HIMG_URL); ?>images_01.png" />
<?php if(is_array($guanyu2)): foreach($guanyu2 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 10)): ?><a href="<?php echo U('News/gongsijianjie',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 11)): ?>
<a href="<?php echo U('News/qiyejingshen',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 12)): ?>
<a href="<?php echo U('News/yewufanwei',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 13)): ?>
<a href="<?php echo U('News/zuzhijiagou',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 14)): ?>
<a href="<?php echo U('News/zhuanjiaduiwu',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 15)): ?>
<a href="<?php echo U('News/rencaizhaopin',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] > 40)): ?>
<a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif($v['url'] != ''): ?>
<a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a><?php endif; endforeach; endif; ?>




            </div>
        </li>
        <li <?php if((CONTROLLER_NAME == News) AND ($lan_id == 3)): ?>class="cur"<?php endif; ?>><a href="<?php echo U('News/newslist',array('lan_id'=>3));?>"><?php echo ($toutiao1[0]['lan_title']); ?></a></li>
        <li <?php if((ACTION_NAME == lanhaizixun) OR ($lan_id == 4) OR ($lan_id == 18) OR ($lan_id == 19) OR ($lan_id == 20) OR ($lan_id == 21) OR ($lan_id == 22) OR ($lan_id == 23)): ?>class="cur"<?php endif; ?>>            <a href="<?php echo U('News/lanhaizixun');?>"><?php echo ($lanhaizixun1[0]['lan_title']); ?></a>
            <div class="childnavin">
                <img src="<?php echo (HIMG_URL); ?>images_01.png" />
 <?php if(is_array($lanhaizixun2)): foreach($lanhaizixun2 as $key=>$v): if($v["url"] == ''): ?><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif($v['url'] != ''): ?>
<a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a><?php endif; endforeach; endif; ?>
                </div>
        </li>
        <li <?php if((ACTION_NAME == junminronghe) OR ($lan_id == 5) OR ($lan_id == 24) OR ($lan_id == 25) OR ($lan_id == 26) OR ($lan_id == 27) OR ($lan_id == 28)): ?>class="cur"<?php endif; ?>><a href="<?php echo U('News/junminronghe');?>"><?php echo ($junminronghe1[0]['lan_title']); ?></a>
            <div class="childnavin">
                <img src="<?php echo (HIMG_URL); ?>images_01.png" />
    <?php if(is_array($junminronghe2)): foreach($junminronghe2 as $key=>$v): if($v["url"] == ''): ?><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif($v['url'] != ''): ?>
<a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a><?php endif; endforeach; endif; ?>


                </div>
        </li>
        <li <?php if((ACTION_NAME == zixunfuwu) OR ($lan_id == 6) OR ($lan_id == 29) OR ($lan_id == 30) OR ($lan_id == 31) OR ($lan_id == 32) OR ($lan_id == 33) OR ($lan_id == 38) OR (CONTROLLER_NAME == Tushu) OR (CONTROLLER_NAME == Advice)): ?>class="cur"<?php endif; ?>><a href="<?php echo U('News/zixunfuwu');?>"><?php echo ($zixunfuwu1[0]['lan_title']); ?></a>
            <div class="childnavin">
                <img src="<?php echo (HIMG_URL); ?>images_01.png" />
                    <?php if(is_array($zixunfuwu2)): foreach($zixunfuwu2 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 29)): ?><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 30)): ?>
<a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 31)): ?>
<a href="<?php echo U('Fagui/falvfagui',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 32)): ?>
<a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 38)): ?>
<a href="<?php echo U('Tushu/tushulist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 33)): ?>
<a href="<?php echo U('Advice/showlist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] > 40)): ?>
<a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif($v['url'] != ''): ?>
<a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a><?php endif; endforeach; endif; ?></div>
        </li>
        <li <?php if((CONTROLLER_NAME == 'Bbs') OR (CONTROLLER_NAME == 'Blog') OR (CONTROLLER_NAME == 'Posts') OR (CONTROLLER_NAME == 'Famous')): ?>class="cur"<?php endif; ?>><a href="<?php echo U('Bbs/index',array('lan_id'=>7));?>"><?php echo ($changqingluntan1[0]['lan_title']); ?></a>
            <div class="childnavin">
                <img src="<?php echo (HIMG_URL); ?>images_01.png" />
    <?php if(is_array($changqingluntan2)): foreach($changqingluntan2 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 34)): ?><a href="<?php echo U('Blog/index',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 35)): ?>
<a href="<?php echo U('Posts/postlist',array('lan_id'=>35));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 36)): ?>
<a href="<?php echo U('Famous/famousbbs',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 37)): ?>
<a href="<?php echo U('Famous/character',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] > 40)): ?>
<a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a>
<?php elseif($v['url'] != ''): ?>
<a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a><?php endif; endforeach; endif; ?>


            </div>
        </li>
        <li <?php if($lan_id == 8): ?>class="cur"<?php endif; ?>><a href="<?php echo U('News/newslist',array('lan_id'=>8));?>"><?php echo ($gongyi[0]['lan_title']); ?></a></li>
        <li id="zuih" <?php if($lan_id == 9): ?>class="cur"<?php endif; ?>><a href="<?php echo U('News/newslist',array('lan_id'=>9));?>"><?php echo ($lanhaifabu[0]['lan_title']); ?></a></li>
    </ul>
</div>
<!--menu-->

<script type="text/jscript" src="<?php echo (HJS_URL); ?>jquery.range.js"></script>
<script>
$(function(){
	$('.single-slider').jRange({
		from: 0,
		to:1000,
		step: 1,
		scale: [0,100,200,300,400,500,600,700,800,900,1000],
		format: '%s',
		width:695,
		showLabels: true,
		showScale: true
	});
	$("#g1").click(function(){
		var aa = $(".single-slider").val();
		alert(aa);
	});

});
</script>
<style>
  .mypagestyle{width: 530px;margin: 0px auto;float:left;overflow: hidden;margin-top:20px;}
  .mypagestyle > li{width:auto;padding-bottom:0;}
  .zhiding{color:#950909;height:26px;line-height:26px;padding:2px;display:inline-block;border:2px solid #950909;transform:rotate(-7deg);-ms-transform:rotate(-7deg);   /* IE 9 */-moz-transform:rotate(-7deg);  /* Firefox */-webkit-transform:rotate(-7deg); /* Safari 和 Chrome */-o-transform:rotate(-7deg); }
  .jinghua{color:#c27a4a;height:26px;line-height:26px;padding:2px;display:inline-block;border:2px solid #c27a4a;transform:rotate(-7deg);-ms-transform:rotate(-7deg);   /* IE 9 */-moz-transform:rotate(-7deg);  /* Firefox */-webkit-transform:rotate(-7deg); /* Safari 和 Chrome */-o-transform:rotate(-7deg); }
  .xintie{color:#eb0909;height:26px;line-height:26px;padding:2px;display:inline-block;border:2px solid #eb0909;transform:rotate(-7deg);-ms-transform:rotate(-7deg);   /* IE 9 */-moz-transform:rotate(-7deg);  /* Firefox */-webkit-transform:rotate(-7deg); /* Safari 和 Chrome */-o-transform:rotate(-7deg); }
  .putong{color:#999;height:26px;line-height:26px;padding:2px;display:inline-block;border:2px solid #999; }
</style>
<link href="<?php echo (HCSS_URL); ?>lyz.calendar.css" rel="stylesheet" type="text/css" />


<!--第一通栏-->
<div class="column-c pt10 ser">
  <div class="ser-left fl">
    <p class="ser-tit fl"><a href="index.html"><img src="<?php echo (HIMG_URL); ?>images_44.jpg" alt="首页" /></a><a href="/index.php/Home/Bbs/index/lan_id/7"><img src="<?php echo (HIMG_URL); ?>images_96.jpg" alt="" />长青论坛</a><a href="/index.php/Home/User/ucenter"><img src="<?php echo (HIMG_URL); ?>images_96.jpg" alt="" />个人中心</a></p>
    <p class="ser-tit fl"><img src="<?php echo (HIMG_URL); ?>images_45.jpg" alt="" /><span class="l-gray">今日：</span><?php echo ((isset($today) && ($today !== ""))?($today):0); ?>&nbsp;<img src="<?php echo (HIMG_URL); ?>images_104.jpg" />&nbsp;<img src="<?php echo (HIMG_URL); ?>images_98.jpg" alt="" /><span class="l-gray">昨日：</span><?php echo ((isset($yesterday) && ($yesterday !== ""))?($yesterday):0); ?>&nbsp;<img src="<?php echo (HIMG_URL); ?>images_104.jpg" />&nbsp;<img src="<?php echo (HIMG_URL); ?>images_98.jpg" alt="" /><span class="l-gray">主题：</span><?php echo ((isset($totalcount) && ($totalcount !== ""))?($totalcount):0); ?>&nbsp;&nbsp;<img src="<?php echo (HIMG_URL); ?>images_98.jpg" alt="" /><span class="l-gray">会员：</span><?php echo ((isset($members) && ($members !== ""))?($members):0); ?></p>
  </div>
</div>
<!--第二通栏-->
<div class="column-c pt10 pb30">
  <!--****左边通栏****-->
  <div class="set-lis-l fl">
    <!--****左边第一通栏****-->
    <ul class="core-tit fl">
      <li class="current"><a href="javascript:void(0)">个人资料</a></li>
      <li><a href="javascript:void(0)">设置管理</a></li>
      <li><a href="javascript:void(0)">我的积分</a></li>
      <li><a href="javascript:void(0)">我的收藏</a></li>
      <li><a href="javascript:void(0)">我的帖子</a></li>
      <li><a href="javascript:void(0)">我的关注</a></li>
      <li><a href="javascript:void(0)">邀请好友</a></li>
      <li><a href="/index.php/Home/Blog/myblog">我的博客</a></li>
    </ul>
    <!--****左边第二通栏****-->
    <ul class="advice fl usertable">
      <form action="" method="post" id="udataform">
        <li>
          <p class="dat-t fl">用户名：</p>
          <?php echo ($detail["username"]); ?><span class="red pl10" style="line-height:34px;"></span>
        </li>
        <li>
          <p class="dat-t fl">用户级别：</p>
          <p class="fl lh34"><b style="color:orange"><?php echo ($detail["level"]); ?></b></p>&nbsp;<img src="<?php echo ($detail["level_img"]); ?>">
        </li>
        <li>
          <p class="dat-t fl">个性签名：</p>
          <input name="mysign" class="advice-k w385 fl" value="<?php echo ($detail["mysign"]); ?>" onblur="checkmysign(this.value)" placeholder="梦想还是要有的，万一实现了呢！" type="text" />
          <span class="pl10" style="line-height:34px;">最多不可超过20个字！</span>
          </p>
        </li>
        <li>
          <p class="dat-t fl">性别：</p>
          <p class="fl lh34">
            <label>
              <input type="radio" name="sex" value="1" <?php echo ($detail['sex']?"checked":""); ?> id="RadioGroup1_0" />
              男</label>
            <label>
              <input type="radio" name="sex" value="0" <?php echo ($detail['sex']?"":"checked"); ?> id="RadioGroup1_1" />
              女</label>
          </p>
        </li>
        <!--<li>
          <p class="dat-t fl">生日：</p>
          <p class="fl">
            <input name="birth" id="txtBeginDate" class="dat-t-k" value="<?php echo ($detail["birth"]); ?>" style="padding-left:32px;background:url(<?php echo (HIMG_URL); ?>rili.png) left no-repeat;background-size:15%;width:120px" type="text" />
          </p>
        </li>-->
        <li>
          <p class="dat-t fl"><span class="red">*</span>&nbsp;居住地：</p>
          <input name="address" class="advice-k w385 fl" value="<?php echo ($detail["address"]); ?>" placeholder="请输入您现在住居地址" type="text" />
        </li>
        <li>
          <p class="dat-t fl">联系方式：</p>
          <input name="phone" class="logon-list-k fl" value="<?php echo ($detail["phone"]); ?>" placeholder="手机/固话" type="text" />
          </p>
        </li>
        <li>
          <p class="dat-t fl">QQ：</p>
          <input name="qq" class="logon-list-k fl" value="<?php echo ($detail["qq"]); ?>" placeholder="" type="text" />
          </p>
        </li>
        <!-- <li>
          <p class="dat-t fl">邮箱：</p>
          <input name="" class="logon-list-k fl" placeholder="" type="text" />
          <span class="red pl10">请填写正确的邮箱格式</span></li>
        <li> -->
        <li>
          <p class="dat-t fl">上次登录：</p>
          <p class="fl lh34"><?php echo (date("Y-m-d H:i:s",$detail["lastlogin"])); ?></p>
        </li>
        <li>
          <p class="dat-t fl">兴趣爱好：</p>
          <textarea name="hobby" class="advice-k w385 fl h150" placeholder=""><?php echo ($detail["hobby"]); ?></textarea>
        </li>
        <li>
          <p class="dat-t fl">&nbsp;</p>
          <p class="advice-an fl"><a onclick="subziliaoform()" href="javascript:void(0)">保&nbsp;存</a></p>
        </li>
      </form>
    </ul>
    <!--设置-->
    <ul class="advice fl h445 usertable" style="display:none">
      <form action="/index.php/Home/User/modpsword" method="post" id="modpwdform">
        <li>
          <p class="dat-t fl"><span class="red">*</span>旧密码：</p>
          <input name="oldpwd" class="logon-list-k fl" placeholder="请输入原密码" onblur="checkoldpwd(this.value)" type="password" <?php if($detail["openid"] != ''): ?>disabled=true<?php endif; ?> />
        </li>
        <li>
          <p class="dat-t fl"><span class="red">*</span>新密码：</p>
          <input name="newpwd" class="logon-list-k fl" placeholder="" onblur="checknewpwd(this.value)" type="password" <?php if($detail["openid"] != ''): ?>disabled=true<?php endif; ?> />
        </li>
        <li>
          <p class="dat-t fl"><span class="red">*</span>确认新密码：</p>
          <input name="renewpwd" class="logon-list-k fl" placeholder="" onblur="checkrenewpwd(this.value)" type="password" <?php if($detail["openid"] != ''): ?>disabled=true<?php endif; ?> />
        </li>
        <!-- <li>
          <p class="dat-t fl">邮箱：</p>
          <input name="" class="logon-list-k fl" placeholder="" type="text" />
          <p class="fl w418 pl10"><span class="red pl10">*</span><span class="l-gray pl10">系统会向您的邮箱发送了一封验证激活邮件，请查收邮件，进行验证激活。如果没有收到验证邮件，您可以更换一个邮箱，或者<br />
            </span> <a href="" class="bule">重新接收验证邮件</a></p>
        </li> -->
        <?php if($detail["openid"] == ''): ?><li>
          <p class="dat-t fl">&nbsp;</p>
          <p class="advice-an fl"><a href="javascript:void(0)" onclick="subnewpwdform()">提&nbsp;交</a></p>
        </li>
        <?php else: ?>
          <li>
          <p style="color:red">（快捷登录不可操作）</p>
        </li><?php endif; ?>
      </form>
    </ul>
    <!--积分-->
    <ul class="set-lis_lb fl usertable" style="display:none">
      <li>
        <table class="int-c fl" width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th class="red">总积分</th>
            <th>登录</th>
            <th>签到</th>
            <th>发帖</th>
            <th>回帖</th>
            <th>点赞</th>
            <th>博文</th>
            <th>评论</th>
            <th>注册</th>
          </tr>
          <tr>
            <td class="bdr red"><?php echo ($detail["score"]); ?></td>
            <td><?php echo ($detail["login"]); ?></td>
            <td><?php echo ($detail["signature"]); ?></td>
            <td><?php echo ($detail["sendpost"]); ?></td>
            <td><?php echo ($detail["replypost"]); ?></td>
            <td><?php echo ($detail["giveup"]); ?></td>
            <td><?php echo ($detail["sendart"]); ?></td>
            <td><?php echo ($detail["comments"]); ?></td>
            <td><?php echo ($detail["register"]); ?></td>
          </tr>
        </table>
      </li>
      <li>
        <table class="int-c-a fl" width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th colspan="4" align="left">积分规则</th>
          </tr>
          <tr class="b-gray" id="tit-scorerule">
            <th>动作名称</th>
            <th>周期范围</th>
            <th>周期内最多奖励范围</th>
            <th>积分</th>
          </tr>
          <tr class="l-gray">
            <td colspan="4">注：以上事件动作，会得到积分奖励。不过，在一个周期内，您最多得到的奖励次数有限制。</td>
          </tr>
        </table>
      </li>
      <li>
        <table class="int-c-b fl" width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
		    <?php if(is_array($ranklist)): foreach($ranklist as $key=>$rankinfo): ?><th><?php echo ($rankinfo["rank_name"]); ?><br />
              （<?php echo ($rankinfo["score"]); ?>）</th><?php endforeach; endif; ?>
          </tr>
          <tr>
            <td colspan="11" class="pt30"><div class="demo">
	<input type="hidden" class="single-slider" value="<?php echo ($detail["score"]); ?>" />
</div></td>
          </tr>
        </table>
      </li>
    </ul>
  <!--我的收藏-->
  <ul class="set-lis_lb fl usertable" style="display:none" id="mycollect-list">


  </ul>
  <!--我的帖子-->
  <ul class="set-lis_lb fl usertable" id="myposts-list" style="display:none">

  </ul>
  <!--我的关注-->
  <ul class="set-lis_lb fl usertable" style="display:none" id="myfollows-list">

  </ul>
  <!--邀请好友-->
  <div class="advice inv usertable" style="display:none">
      <p class="inv-t fs22">邀请好友</p>
      <p class="inv-c"><img src="<?php echo (HIMG_URL); ?>inviteregqr.png" /></p>
      <div class="set-fi-fx fs12 pt15 pb10"><span class="fl pt5">分享到：</span><span class="fl pt5 pr15"><a href="javascript:void(0)" id="sharetoqq"><img src="<?php echo (HIMG_URL); ?>images_117.jpg" />QQ好友</a></span><span class="fl pt5 pr15"><a href="javascript:void(0)" onclick="window.open('http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+encodeURIComponent('http://'+location.host+'/index.php/Home/User/register')+'&title='+encodeURIComponent('蓝海长青注册邀请')+'&pics='+'http://'+location.host+'/Public/Home/images/images_155.jpg');return false;"><img src="<?php echo (HIMG_URL); ?>images_118.jpg" />QQ空间</a></span><span class="fl pt5 pr15"></span><span class="fl pt5 pr15 fxrw"  style="cursor:pointer"><img src="<?php echo (HIMG_URL); ?>images_120.jpg" />微信</span>
	  <p class="dj_xhk fr" style="bottom: 10px; right: 160px;"><span class="w100 fl">打微"扫一扫"</span><img src="<?php echo (HIMG_URL); ?>inviteqrcode.png"><span class="w100 fl">打开网页后点击屏幕右上角分享按妞</span></p>
    <script type="text/javascript">
        $(".fxrw").click(function(){
            $(".dj_xhk").slideToggle("1000");
        });
    </script>
      </div>
  </div>
  <!--编辑图像-->
  <form action="" method="post" class="userheadedit usertable" id="editimgform" style="display:none">
     <p class="data-t pt30 fl">当前我的头像<br />如果您还没有设置自己的头像，系统会显示为默认头像，您需要自己上传一张新照片来作为自己的个人头像</p>
     <p class="fl"><div style="width:168px;height:168px;overflow:hidden" id="localImag"><img style="width:168px;" id="preview" src="<?php echo ($_SESSION['userInfo']['userhead']); ?>" alt="" /></div></p>
     <p class="data-t pt30 fl">设置我的新头像<br />请选择一个新照片进行上传编辑。</p>
     <p class="fl w100"><a class="ace-input">
              <input type="hidden" name="olduserhead" value="<?php echo ($_SESSION['userInfo']['userhead']); ?>">
              <input type="file" id="selectpic" onchange="javascript:setImagePreview();" name="userhead"><img src="<?php echo (HIMG_URL); ?>images_157.jpg" /></a></p>
     <p class="advice-an fl mt20"><a href="javascript:void(0)" onclick="edituserhead()">提&nbsp;交</a></p>
  </form>
  </div>
  <!--****右边通栏****-->
  <div class="set-lis-r fr pt10">
    <!--****右边第一通栏****-->
    <dl class="core-r fl">
      <dt style="position:relative;height:168px;overflow:hidden"><img id="rightuserhead" src="<?php echo ($_SESSION['userInfo']['userhead']); ?>" alt="" /><div style="position:absolute;right:0;bottom:0;padding:0 10px;font-weight:bolder;height:25px;border-radius:4px;background:rgba(205,55,0,0.7);text-align:center;line-height:25px;color:white;"><?php echo ($detail["level"]); ?></div></dt>
      <dd>
        <p class="fs22 pt10" id="rightusername"><?php echo ($_SESSION['userInfo']['username']); ?></p>
        <p class="fl pb10"><span class="fl pt10 pr10"><a id="tit-edit" onclick="userheadedit()" href="javascript:void(0)"><img src="<?php echo (HIMG_URL); ?>images_149.jpg" alt="编辑头像" />&nbsp;编辑头像</a></span> <span class="fl pt10"><a id="tit-updata" onclick="userdataedit()" href="javascript:void(0)"><img src="<?php echo (HIMG_URL); ?>images_151.jpg" alt="更新资料" />&nbsp;更新资料</a></span></p>
        <p class="core-r-q fl ml28"><?php if($signature["status"] == '0'): ?><a href="javascript:void(0)" id="signatured" style="display:none;background:#ccc">已签到</a><a href="javascript:void(0)" id="signature">签到</a><?php else: ?><a href="javascript:void(0)" id="signatured" style="background:#ccc">已签到</a><a href="javascript:void(0)" id="signature" style="display:none">签到</a><?php endif; ?></p>
      </dd>
    </dl>
  </div>
</div>
<script type="text/jscript" src="<?php echo (HJS_URL); ?>ad1.js"></script>
<script type="text/javascript">
  $(function(){
    changetable();
  })
</script>
<script type="text/javascript" src="<?php echo (HJS_URL); ?>jquery-1.5.1.js"></script>
<script type="text/javascript">
  var jQuery151 = jQuery.noConflict(true);
</script>
<script src="<?php echo (HJS_URL); ?>lyz.calendar.min.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery151(function(){
    jQuery151("#txtBeginDate").calendar({
        controlId: "divDate",                                 // 弹出的日期控件ID，默认: $(this).attr("id") + "Calendar"
        speed: 200,                                           // 三种预定速度之一的字符串("slow", "normal", or "fast")或表示动画时长的毫秒数值(如：1000),默认：200
        complement: true,                                     // 是否显示日期或年空白处的前后月的补充,默认：true
        readonly: true,                                       // 目标对象是否设为只读，默认：true
        upperLimit: new Date(),                               // 日期上限，默认：NaN(不限制)
        lowerLimit: new Date("2011/01/01"),                   // 日期下限，默认：NaN(不限制)
        callback: function () {                               // 点击选择日期后的回调函数
            /*alert("您选择的日期是：" + $("#txtBeginDate").val());*/
        }
    });
  })
</script>
<script type="text/javascript" src="<?php echo (HJS_URL); ?>famous.js"></script>
<script type="text/javascript" src="<?php echo (HJS_URL); ?>msgbox.js"></script>
<script type="text/javascript" src='<?php echo (HJS_URL); ?>ucenter.js' ></script>
<script src="<?php echo (HJS_URL); ?>jquery.form.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function(){
      $("#signature").click(function(){
        $.get("/index.php/Home/User/signature",function(data){
          if(data == 'success'){
              $("#signatured").fadeIn();
              $("#signature").hide();
              myalertbox('签到成功');
          }else{
              myalertbox('签到失败');
          }
        })
      })
    })
</script>
<script type="text/javascript">
  $(function(){
    var p = {
		url:'http://'+location.host+'/index.php/Home/User/register', /*获取URL，可加上来自分享到QQ标识，方便统计*/
		desc:'', /*分享理由(风格应模拟用户对话),支持多分享语随机展现（使用|分隔）*/
		title:'蓝海长青注册邀请', /*分享标题(可选)*/
		summary:'', /*分享摘要(可选)*/
		pics:'http://'+location.host+'/Public/Home/images/images_155.jpg', /*分享图片(可选)*/
		flash: '', /*视频地址(可选)*/
		site:'', /*分享来源(可选) 如：QQ分享*/
		style:'201',
		width:32,
		height:32
	};
	var s = [];
	for(var i in p){
		s.push(i + '=' + encodeURIComponent(p[i]||''));
	}
	$("#sharetoqq").attr('href',"http://connect.qq.com/widget/shareqq/index.html?"+s.join('&'));
  })
</script>
<script src="http://connect.qq.com/widget/loader/loader.js" widget="shareqq" charset="utf-8"></script>

<!--footer-->
<div class="footer">
    <div class="column-c">
        <p class="rwm fl"><img src="<?php echo (HIMG_URL); ?>images_109.jpg" alt="二维码" /></p>
        <div class="fr w848">
            <ul class="subnav fl w285">
                <p class="subnav_t fl"><?php echo ($lanhaizixun1[0]['lan_title']); ?></p>
				 <?php if(is_array($lanhaizixun3)): foreach($lanhaizixun3 as $key=>$v): if($v["url"] == ''): ?><li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>

            </ul>
            <ul class="subnav fl w285">
                <p class="subnav_t fl"><?php echo ($guanyu1[0]['lan_title']); ?></p>
             <?php if(is_array($guanyu3)): foreach($guanyu3 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 10)): ?><li><a href="<?php echo U('News/gongsijianjie',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 11)): ?>
<li><a href="<?php echo U('News/qiyejingshen',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 12)): ?>
<li><a href="<?php echo U('News/yewufanwei',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 13)): ?>
<li><a href="<?php echo U('News/zuzhijiagou',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 14)): ?>
<li><a href="<?php echo U('News/zhuanjiaduiwu',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] == 15)): ?>
<li><a href="<?php echo U('News/rencaizhaopin',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
				<?php elseif(($v["url"] == '') AND ($v["lan_id"] > 40)): ?>
<li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>
            </ul>
            <ul class="subnav fl w190" id="br-n">
                <p class="subnav_t fl"><?php echo ($changqingluntan1[0]['lan_title']); ?></p>

				    <?php if(is_array($changqingluntan3)): foreach($changqingluntan3 as $key=>$v): if(($v["url"] == '') AND ($v["lan_id"] == 34)): ?><li><a href="<?php echo U('Blog/index',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 35)): ?>
<li><a href="<?php echo U('Posts/postlist',array('lan_id'=>35));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 36)): ?>
<li><a href="<?php echo U('Famous/famousbbs',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] == 37)): ?>
<li><a href="<?php echo U('Famous/character',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif(($v['url'] == '') AND ($v["lan_id"] > 40)): ?>
<li><a href="<?php echo U('News/newslist',array('lan_id'=>$v['lan_id']));?>"><?php echo ($v["lan_title"]); ?></a></li>
<?php elseif($v['url'] != ''): ?>
<li><a href="<?php echo ($v["url"]); ?>"><?php echo ($v["lan_title"]); ?></a></li><?php endif; endforeach; endif; ?>

            </ul>
            <p class="copyright fl">Copyright © 2016 <?php echo (substr(SITE_URL,7,50)); ?> All Rights Reserved. 蓝海长青 版权所有<br />
                京ICP备16050700号-1</p>
        </div>
    </div>
</div>
<div class="izl-rmenu">
    <a class="consult" target="_blank"><div class="phone" style="display:none;">联系电话：010-83671790</div></a>
    <a class="cart"><div class="pic"></div></a>
    <a href="javascript:void(0)" class="btn_top" style="display: block;"></a>
</div>
<!--footer-->
<script src="<?php echo (HJS_URL); ?>jquery.hiSlider.min.js"></script>
<script>
	$('.hiSlider1').hiSlider();
</script>
<script type="text/jscript" src="<?php echo (HJS_URL); ?>index.js"></script>
</body>
</html>