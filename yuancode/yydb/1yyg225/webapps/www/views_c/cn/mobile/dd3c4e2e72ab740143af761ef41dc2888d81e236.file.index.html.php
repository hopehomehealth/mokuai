<?php /* Smarty version Smarty-3.1.13, created on 2016-06-22 15:49:17
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\cn\mobile\index.html" */ ?>
<?php /*%%SmartyHeaderCode:20491576a42fd689b00-24226619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd3c4e2e72ab740143af761ef41dc2888d81e236' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\cn\\mobile\\index.html',
      1 => 1466512208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20491576a42fd689b00-24226619',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'site_config' => 0,
    'wechat' => 0,
    'subscribe' => 0,
    'tagAdw' => 0,
    'tagAds' => 0,
    'm' => 0,
    'mobileCat' => 0,
    'luck_db' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_576a42fd82a502_78085723',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576a42fd82a502_78085723')) {function content_576a42fd82a502_78085723($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css_02/font/iconfont.css">
<link rel="stylesheet" href="/style/mobile/css/bootstrap.css">
<link rel="stylesheet" href="/style/mobile/css/new_index.css">
<link rel="stylesheet" href="/style/mobile/css_02/index.css">
<script src="/js/lefttime.js"></script>
<script src="/js/lefttime_jx.js"></script>
<style type="text/css">
    *{ box-sizing: border-box; }
</style>
<header id="header" style="display: none;">
    <a href="<?php echo url();?>
" class="logo"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['site_config']->value['mobile_logo']),$_smarty_tpl);?>
" /></a>
    <div class="u-nav">
        <a class="ap-icon" href="/yunbuy"><img src="/style/mobile/images/search2.png" /></a>
    </div>
</header>
<?php if ($_smarty_tpl->tpl_vars['wechat']->value&&$_smarty_tpl->tpl_vars['subscribe']->value){?>
<dl class="subscribe">
    <dt>
        <button id="btn_subscribe">立即关注</button>
        <p>欢迎进入<span><?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
</span><br>关注公众号，享专属服务</p>
    </dt>
    <dd>
        <p class="p1"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['site_config']->value['weixin_logo']),$_smarty_tpl);?>
" /></p>
        <p class="p2">长按二维码图片，识别图中二维码 关注</p>
        <p class="p3">关注我们 获取更多服务</p>
    </dd>
</dl>
<script type="text/javascript">
    $(function(){
        $('#btn_subscribe').click(function(){
            $('.subscribe').toggleClass('subscribe_toggle');
            if($('.subscribe').hasClass('subscribe_toggle')){
                $(this).html('关闭');
            }else{
                $(this).html('立即关注');
            }
        })
    })
</script>
<?php }?>
<div class="new_banner" id="new_banner">
    <div class="slider">
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'content','var'=>'tagAdw','module'=>'ad','id'=>10),$_smarty_tpl);?>

        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','var'=>'tagAds','source'=>$_smarty_tpl->tpl_vars['tagAdw']->value['images'],'num'=>10),$_smarty_tpl);?>

        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tagAds']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <div><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"<?php if ($_smarty_tpl->tpl_vars['m']->value['isblank']){?> target="_blank"<?php }?>><img src="<?php echo $_smarty_tpl->tpl_vars['m']->value['path'];?>
"/></a></div>
        <?php } ?>
    </div>
    <ul class="slick-dots">
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tagAds']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <li><button type="button"></button></li>
        <?php } ?>
    </ul>
</div>
<div class="menu">
    <div class="slider">
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mobileCat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <div>
            <a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
">
                <em><img src="<?php echo $_smarty_tpl->tpl_vars['m']->value['pic'];?>
" /></em>
                <p><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
</p>
            </a>
        </div>
        <?php } ?>
    </div>
</div>
<div class="new-index">
    <div class="new-index-top"><a href="<?php echo url('/content/win');?>
">最新揭晓</a></div>
    <ul class="new-index-1" id="win-list">
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['luck_db']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <?php echo $_smarty_tpl->getSubTemplate ("content/windbitemindex.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php } ?>
        <input type="hidden" name="ids" id="ids" value="" />
    </ul>
</div>
<div class="new-inex1 demo" id="buy_nav">
    <ul class="new-index1-top">
        <li onclick="window.location.href='?order=end_num&sort=asc#buy_nav'" <?php if (!$_GET['order']||$_GET['order']=='end_num'){?>class="hover"<?php }?>>最快</li>
        <li onclick="window.location.href='?order=buy_num&sort=desc#buy_nav'" <?php if ($_GET['order']=='buy_num'){?>class="hover"<?php }?>>最热</li>
        <li onclick="window.location.href='?order=buy_id&sort=desc#buy_nav'" <?php if ($_GET['order']=='buy_id'){?>class="hover"<?php }?>>最新</li>
        <li onclick="window.location.href='?order=need_num&sort=ASC#buy_nav'" <?php if ($_GET['order']=='need_num'&&$_GET['sort']=='ASC'){?>class="hover"<?php }?>>价格<i class="iconfont">&#xe609;</i></li>
        <li onclick="window.location.href='?order=need_num&sort=DESC#buy_nav'" <?php if ($_GET['order']=='need_num'&&$_GET['sort']=='DESC'){?>class="hover"<?php }?>>价格<i class="iconfont">&#xe608;</i></li>
    </ul>
    <div id="container" class="transitions-enabled infinite-scroll clearfix new-index2">
        <?php echo $_smarty_tpl->getSubTemplate ("yunbuy/lbi/list2.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
    <div id="page-nav"><a href="yunbuy/index/2?ajaxcontent=1&order=<?php if ($_GET['order']=='goods_click'){?>count<?php }elseif($_GET['order']=='buy_id'){?>new<?php }elseif($_GET['order']=='need_num'){?>need_num<?php }elseif($_GET['order']=='end_num'){?>end_num<?php }else{ ?>end_num<?php }?>&sort=<?php if ($_GET['sort']){?><?php echo $_GET['sort'];?>
<?php }else{ ?><?php if (!$_GET['order']){?>asc<?php }else{ ?>desc<?php }?><?php }?>&skin=2&size=4"></a></div>

</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/TouchSlide.1.1.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        compaceIds();
        setInterval('compaceIds()',5*1000);
    });
    function compaceIds(){
        $.post('/content/ajaxIds','skin=index_mobile&ids='+$('#ids').val(),function(data){
            if(data.error==1){
                $('#ids').val(data.ids);
                $('#win-list').prepend(data.html);
            }
        },'json');
    }
</script>
<script>
    TouchSlide({ slideCell:"#new_banner", mainCell:".slider", titCell:".slick-dots li", titOnClassName:"slick-active" });
    $(".new-index-1 li:odd").addClass("new-odd")
</script>

<script type="text/javascript" src="/style/mobile/js/jquery.masonry.min.js"></script>
<script type="text/javascript" src="/style/mobile/js/jquery.infinitescroll.min.js"></script>
<script type="text/javascript" src="/style/mobile/js/slick.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".new-index2 .new-box:odd").addClass("new-nr")
        var $container = $('#container');

        $container.infinitescroll({
                navSelector  : '#page-nav',    // 选择的分页导航
                nextSelector : '#page-nav a',  // 选择的下一个链接到（第2页）
                itemSelector : '.new-box',     // 选择检索所有项目
                loading: {
                    finishedMsg: '没有更多的页面加载。',
                    img: 'images/loading.gif'
                }
            },function(newElements){

                // 隐藏新的项目，而他们正在加载
                var $newElems = $( newElements ).css({ opacity: 0 });

                // 确保的图像装载增加砖石布局
                $newElems.imagesLoaded(function(){

                    // 元素展示准备
                    $newElems.animate({opacity:1});
                    $container.masonry( 'appended', $newElems, true );
                    $(".new-index2 .new-box:odd").addClass("new-nr")

                });
            }
        );

        $('.menu .slider').slick({
            autoplay: true,
            dots:true,
            arrows:false,
            slidesToShow: 5,
            slidesToScroll:5,
            responsive: [
                {
                    breakpoint:480,
                    settings: {
                        autoplay:true,
                        arrows:false,
                        dots:true,
                        slidesToShow: 4,
                        slidesToScroll:4
                    }
                }
            ]
        });
    });
</script>
<?php }} ?>