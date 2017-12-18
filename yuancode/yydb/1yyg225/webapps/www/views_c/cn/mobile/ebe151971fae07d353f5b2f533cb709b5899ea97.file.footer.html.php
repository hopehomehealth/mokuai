<?php /* Smarty version Smarty-3.1.13, created on 2016-12-08 23:20:41
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/footer.html" */ ?>
<?php /*%%SmartyHeaderCode:9480765258451d2b61d3c2-38326493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebe151971fae07d353f5b2f533cb709b5899ea97' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/footer.html',
      1 => 1481177938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9480765258451d2b61d3c2-38326493',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58451d2b652448_21436232',
  'variables' => 
  array (
    'site_config' => 0,
    'mod' => 0,
    'L' => 0,
    'cartNum' => 0,
    'main' => 0,
    'wechat' => 0,
    'wx_config_false' => 0,
    'nav' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451d2b652448_21436232')) {function content_58451d2b652448_21436232($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['site_config']->value['index_skin']==2){?>
<head>
    <style type="text/css">
        .new-foot li{ width: 25%; }
    </style>
</head>
<?php }?>
<div class="new-foot1"></div>
<ul class="new-foot">
    <li>
        <a href="<?php echo url();?>
"<?php if ($_smarty_tpl->tpl_vars['mod']->value=='home'){?> class="hover"<?php }?>>
            <em><i class="iconfont icon-zhuye"></i></em>
            <p>首页</p>
        </a>
    </li>
    <?php if ($_smarty_tpl->tpl_vars['site_config']->value['index_skin']==2){?>
    <li>
        <a href="<?php echo url('/yunbuy?zq=buy');?>
"<?php if ($_smarty_tpl->tpl_vars['mod']->value=='yunbuy'){?> class="hover"<?php }?>>
        <em><i class="iconfont icon-suoyou"></i></em>
        <p>所有商品</p>
        </a>
    </li>
    <?php }else{ ?>
    <li>
        <a href="<?php echo url('/yunbuy');?>
"<?php if ($_smarty_tpl->tpl_vars['mod']->value=='yunbuy'){?> class="hover"<?php }?>>
        <em><i class="iconfont icon-yiyuangoujilu"></i></em>
        <p><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun_one'];?>
</p>
        </a>
    </li>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['site_config']->value['index_skin']==2){?><?php }else{ ?>
    <li>
        <a href="<?php echo url('/content/win');?>
"<?php if ($_smarty_tpl->tpl_vars['mod']->value=='content'){?> class="hover"<?php }?>>
            <em><i class="iconfont icon-sfsiconyidongduankaijiang"></i></em>
            <p>最新揭晓</p>
        </a>
    </li>
    <?php }?>
    <li>
        <a href="<?php echo url('/yunbuy/cart');?>
"<?php if ($_smarty_tpl->tpl_vars['mod']->value=='home'){?> class="hover"<?php }?>>
            <em><i class="iconfont icon-gouwuche"></i></em>
            <p>购物车</p>
            <span class=" cartNum" id="cartNum"><?php echo $_smarty_tpl->tpl_vars['cartNum']->value;?>
</span>
        </a>
    </li>
    <li>
        <a href="<?php echo url('/member');?>
"<?php if ($_smarty_tpl->tpl_vars['mod']->value=='member'){?> class="hover"<?php }?>>
            <em><i class="iconfont icon-01huiyuanzhongxin"></i></em>
            <?php if ($_smarty_tpl->tpl_vars['site_config']->value['index_skin']==2){?>
            <p>会员中心</p>
            <?php }else{ ?>
            <p>我的<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</p>
            <?php }?>
        </a>
    </li>
</ul>

<ul class="foot-fix">
    <?php if (trim($_smarty_tpl->tpl_vars['site_config']->value['ios_url'])||trim($_smarty_tpl->tpl_vars['site_config']->value['and_url'])){?>
    <li class="fix-app"><a href="/content/download">APP</a></li>
    <?php }?>
    <li class="fix-top"><a id="top">TOP</a></li>
</ul>

<iframe name="iframeNews" style="display:none;"></iframe>
<span id="BIDNUMBER" style="display:none;"></span>
<script type="text/javascript">
    var logCount = '<?php echo $_smarty_tpl->tpl_vars['main']->value['logCount'];?>
';
</script>
<script src="/style/mobile/js/script.js"></script>
<?php if ($_smarty_tpl->tpl_vars['wechat']->value&&$_SESSION['mid']){?>
<?php if (!$_smarty_tpl->tpl_vars['wx_config_false']->value){?>
<script type="text/javascript">
    $(function(){
        <?php if ($_smarty_tpl->tpl_vars['nav']->value!='myivt'){?>
        var oSearch = this.location.search.toString();
        oSearch = oSearch.replace(eval('/(code=)([^&]*)&/gi'),'');
        oSearch = oSearch.replace(eval('/(code=)([^&]*)/gi'),'');
        oSearch = oSearch.replace(eval('/(state=)([^&]*)&/gi'),'');
        oSearch = oSearch.replace(eval('/(state=)([^&]*)/gi'),'');
        if(oSearch.trim() == '?'){ oSearch = ''; }

        if(oSearch.indexOf('?')>=0){ oSearch += '&'; }
        else{ oSearch += '?'; }
        oSearch += 'iv=<?php echo $_SESSION['mid'];?>
';

        var href = location.origin+location.pathname+oSearch+location.hash;
        var title = $("title").eq(0).html();
        var desc = $("meta[name='description']").eq(0).attr('content');
        var pic = $('img').eq(0).attr('src');
        pic = pic != 'undefined' ? pic : '';

        wx.ready(function () {
            //分享给朋友
            wx.onMenuShareAppMessage({
                title: title,
                desc: desc,
                link: href,
                imgUrl: pic,
                success: function (res) {
                    layer.msg('分享成功',3,{ type:1 })
                },
                cancel: function (res) {
                    layer.msg('已取消');
                }
            });
            //分享到朋友圈
            wx.onMenuShareTimeline({
                title: title,
                link: href,
                imgUrl: pic,
                success: function (res) {
                    layer.msg('分享成功',3,{ type:1 })
                },
                cancel: function (res) {
                    layer.msg('已取消');
                }
            });
            wx.error(function (res) {
                alert(res.errMsg);
            });
        })
        <?php }?>
        })
</script>
<?php }?>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("cnzz.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("stat.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>