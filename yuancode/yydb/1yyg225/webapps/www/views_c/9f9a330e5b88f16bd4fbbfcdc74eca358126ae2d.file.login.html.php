<?php /* Smarty version Smarty-3.1.13, created on 2016-05-30 09:31:01
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\manage\login\login.html" */ ?>
<?php /*%%SmartyHeaderCode:50575660f630b632c3-96431119%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f9a330e5b88f16bd4fbbfcdc74eca358126ae2d' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\manage\\login\\login.html',
      1 => 1464571739,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50575660f630b632c3-96431119',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660f630c482c9_98720562',
  'variables' => 
  array (
    'L' => 0,
    'favicon' => 0,
    'common' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660f630c482c9_98720562')) {function content_5660f630c482c9_98720562($_smarty_tpl) {?><!doctype html><html><head>    <meta charset="UTF-8">    <title><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_one'];?>
后台管理</title>    <?php echo $_smarty_tpl->tpl_vars['favicon']->value;?>
    <link rel="stylesheet" href="/admin/css/manage/login.css" type="text/css" />    <script src="/admin/js/g.js"></script>    <script src="/admin/js/ipost.js"></script>    <script src="/admin/js/ulogin.js"></script></head><body><style type="text/css">    body{ overflow: auto; }    #foot{height:24px; position:absolute; bottom:10px; left:10px; z-index:1; line-height:24px; color:#888; right:10px}    #foot div{padding:0 10px; text-align:right}    #foot span{display:inline-block; vertical-align:top; line-height:24px}    #foot a{color:#999}    #foot a:hover{color:#f60; text-decoration:underline}    #login{ display: none; }    .text{ width: 800px; overflow: visible; margin: 0 auto; font-size: 14px; padding: 50px 0;  }    .text h3{ font-size: 18px; margin-bottom: 20px; }    .text .btn{ background: #c79f96; height: 35px; line-height: 35px; font-size: 14px; color: #fff; border: 0; border-radius: 5px; padding: 0 15px; cursor: pointer; font-family: '微软雅黑','\5B8B\4F53',Tahoma; }</style><div id="text">    <div class="text">        <h3>关于合法合规运营商城网站系统的告知函</h3>        致商城网站系统使用者：<br>        尊敬的客户，感谢您使用我司开发的商城网站系统！<br>        为避免您违法使用商城网站系统，促使您能够合法合规的运营商城网站系统，我司现根据相关部门的要求并结合商城网站系统的性能特告知如下，望予以遵守并执行：<br><br>        一、若客户上架销售【汽车类商品】，请客户按照《汽车品牌销售管理实施办法》的规定进行自查，以落实“是否具备企业法人资格、是否获得品牌汽车销售授权”等相关准入资质要求，若客户不符合《汽车品牌销售管理实施办法》等相关法规/政策要求的，建议客户对汽车类商品采取下架处理。<br><br>        二、客户上架销售【商品房类商品】的，若商品房为一手房的，请客户按照《城市商品房预售管理办法》核查“所售商品房是否已经取得《商品房预售许可证》、是否获得开发商或房产销售代理商的授权”；若商品房为二手房的，请客户核查“是否获得房屋所有权人的授权、是否拥有房产中介资质”。若客户未能按照相关法律法规取得相关资质和授权的，建议客户对商品房类商品采取下架处理。<br><br>        三、若客户上架销售【食品、保健品类商品】的，请客户按照《食品经营许可管理办法》、《互联网药品交易服务审批暂行规定》的规定进行自查，以落实客户是否取得经营食品、保健品的相关资质，若客户未能取得相关资质的，建议客户对食品、保健品采取下架处理。<br><br>        四、根据《中华人民共和国反不正当竞争法》第十三条“抽奖式的有奖销售，最高奖的金额超过五千元”的法律规定，建议上架商品价格不宜超过人民币5000元；若客户对超过5000元的商品采用出售使用权方式进行销售的，建议客户对使用权年限等影响消费者权益的事项加注醒目标识，并明确进行风险提示，确保商城网站公平，公正，合规，合法的营运。<br><br>        五、客户在进行销售时，不得采取“故意让内定人员中奖、销售质次价高的商品、虚拟参加活动的人数、上架电子钱包及网络货币类”等违法违规的经营手段，建议客户进行自查自纠，并参照法律规定制订、建立严格的商城网站运营规范/制度。<br><br>        请您在接到本函后，秉承合法营运，廉洁从业，诚实守信的经营理念，按照上述要求进行自查自纠，并请您在收到本文件后10天内停止运营过程中的违法违规行为，并将相关商品下架；若您拒绝执行上述建议的，一经发现，我司将立即终止售后服务且不承担任何违约责任；因您商城网站系统运营中的违法违规行为所造成的法律后果（刑事责任、行政责任、民事责任）均由您自行承担，与我司无关。<br><br>        顺祝商祺！！<br><br>        <button class="btn" onclick="login.agree();">同意并登陆后台管理系统</button>    </div></div><div class="login-bg" id="login">    <div style="height:24px; line-height:24px;">        <div id="tips" style="display:none; height:24px; line-height:24px; text-align:center; color:#090">载入中,请稍等...</div>    </div>    <form class="loginform" action="/manage/login/submit" method="post" target="subform" onsubmit="return login.submit()">        <h4><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_one'];?>
后台管理系统</h4>        <div class="form-unit">            <input type="text" class="form-input" id="username" placeholder="用户名">            <i class="iconfont">&#xe61a;</i>        </div>        <div class="form-unit">            <input type="password" class="form-input" id="password" placeholder="密码">            <i class="iconfont">&#xe618;</i>        </div>        <?php if (isset($_smarty_tpl->tpl_vars['common']->value['verify_admin'])&&$_smarty_tpl->tpl_vars['common']->value['verify_admin']){?>        <div class="clear"></div>        <div class="form-unit verify-code">            <i class="iconfont">&#xe624;</i>            <input class="form-input codebox" type="text" id="scode" placeholder="验证码">        </div>        <div class="verify-image">            <img src="/welcome/scode" class="imgcode" onclick="login.reloadScode(this)" width="65" height="26">        </div>        <?php }?>        <div class="login-btn">            <input class="sub-btn" type="submit" value="提交">            <a href="javascript:;" class="form-btn" onclick="login.submit()">登录</a>        </div>    </form></div><div id="foot">    <div>        <span><a href="/" target="_blank"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_one'];?>
</a></span>    </div></div><script type="text/javascript" src="/style/foot.js"></script></body></html><?php }} ?>