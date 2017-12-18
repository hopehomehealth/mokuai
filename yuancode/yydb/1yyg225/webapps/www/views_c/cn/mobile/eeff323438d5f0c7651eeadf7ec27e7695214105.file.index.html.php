<?php /* Smarty version Smarty-3.1.13, created on 2017-04-08 10:45:40
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/index.html" */ ?>
<?php /*%%SmartyHeaderCode:196954128758451d2b28cc78-55213442%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eeff323438d5f0c7651eeadf7ec27e7695214105' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/index.html',
      1 => 1491554392,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196954128758451d2b28cc78-55213442',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58451d2b47de44_17113126',
  'variables' => 
  array (
    'main' => 0,
    'site_config' => 0,
    'wechat' => 0,
    'subscribe' => 0,
    'tagAdw' => 0,
    'tagAds' => 0,
    'm' => 0,
    'mobileCat' => 0,
    'luck_db' => 0,
    'size' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451d2b47de44_17113126')) {function content_58451d2b47de44_17113126($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css_02/font/iconfont.css">
<link rel="stylesheet" href="/style/mobile/css/bootstrap.css">
<link rel="stylesheet" href="/style/mobile/css/new_index.css">
<link rel="stylesheet" href="/style/mobile/css_02/index.css">
<script src="/style/lefttime.js?v=<?php echo $_smarty_tpl->tpl_vars['main']->value['vjs'];?>
"></script>
<script src="/style/lefttime_jx.js?v=<?php echo $_smarty_tpl->tpl_vars['main']->value['vjs'];?>
"></script>
<style type="text/css">
    *{ box-sizing: border-box; }
    #horn{ width:90%; float:left; font-size:12px; height:32px;}
    #horn li{ height:32px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
    #horn a{ display:inline; background:url(); }
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
<div class="menu" style="padding:5px 0;">
    <div class="slider">
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mobileCat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['m']->value['ismenu']==1){?>
        <div style="float:left; width:16.6%;">
            <a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
">
                <em><img src="<?php echo $_smarty_tpl->tpl_vars['m']->value['pic'];?>
" /></em>
                <p style="font-size:10px; margin:7px -10px 0;"><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
</p>
            </a>
        </div>
        <?php }?>
        <?php } ?>
    </div>
</div>
<div class="new-index">
    <div class="new-index-top">
        <div id="horn">
          <ul>
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['luck_db']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
               <li>
                 <i><img src="/upload/images/horn.png"></i>
                 <span>
                   恭喜<a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
#dbCod"><b class="color01"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</b></a>
                   获得<a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
"><?php if ($_smarty_tpl->tpl_vars['m']->value['goods_name']){?><?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
<?php }?></a></span>
               </li>
            <?php } ?>
          </ul>
        </div>
        <a href="<?php echo url('/content/win');?>
" style="width:10%;height:32px;float:right;"><!-- 最新揭晓 --></a>
    </div>
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
        <li onclick="location.href='?order=ratio&sort=desc#buy_nav'" <?php if ($_GET['order']=='ratio'){?>class="hover"<?php }?>>最快</li>
        <li onclick="location.href='?order=end_num&sort=asc#buy_nav'" <?php if ($_GET['order']=='end_num'){?>class="hover"<?php }?>>最热</li>
        <li onclick="location.href='?order=buy_id&sort=desc#buy_nav'" <?php if ($_GET['order']=='buy_id'){?>class="hover"<?php }?>>最新</li>
        <li onclick="location.href='?order=need_num&sort=asc#buy_nav'" <?php if ($_GET['order']=='need_num'&&$_GET['sort']=='asc'){?>class="hover"<?php }?>>价格<i class="iconfont">&#xe609;</i></li>
        <li onclick="location.href='?order=need_num&sort=desc#buy_nav'" <?php if ($_GET['order']=='need_num'&&$_GET['sort']=='desc'){?>class="hover"<?php }?>>价格<i class="iconfont">&#xe608;</i></li>
    </ul>
    <div id="container" class="clearfix new-index2 list">
        <?php echo $_smarty_tpl->getSubTemplate ("yunbuy/lbi/list2.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</div>
<script type="text/javascript">
    var order = "<?php if ($_GET['order']){?><?php echo $_GET['order'];?>
<?php }else{ ?><?php }?>";
    var sort = "<?php if ($_GET['sort']){?><?php echo $_GET['sort'];?>
<?php }else{ ?>desc<?php }?>";
    var ExtendOptions = {
        itemSelector: 'div.new-box',
        path: function(index) {
            return "/yunbuy/index/"+index+"?order="+order+"&sort="+sort+"&load&skin=2&size=<?php echo $_smarty_tpl->tpl_vars['size']->value;?>
";
        }
    };
</script>
<?php echo $_smarty_tpl->getSubTemplate ("public_scroll.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/TouchSlide.1.1.js"></script>
<script src="/style/jquery.SuperSlide.2.1.1.js"></script>
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
    TouchSlide({ slideCell:"#new_banner", mainCell:".slider", titCell:".slick-dots li", titOnClassName:"slick-active", autoPlay:true, interTime:5000 });
    jQuery("#horn").slide({ mainCell:"ul",autoPage:true,effect:"topLoop",autoPlay:true,vis:1,interTime:"2500",delayTime:"1000",opp:true });
    $(".new-index-1 li:odd").addClass("new-odd")
</script>

<script type="text/javascript" src="/style/mobile/js/slick.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".new-index2 .new-box:odd").addClass("new-nr")
        //$('.menu .slider').slick({
            //autoplay: true,
            //dots:true,
            //arrows:false,
            //slidesToShow: 5,
            //slidesToScroll:5,
            //responsive: [
                //{
                    //breakpoint:480,
                    //settings: {
                        //autoplay:true,
                        //arrows:false,
                        //dots:true,
                        //slidesToShow: 4,
                        //slidesToScroll:4
                    //}
                //}
            //]
        //});
    });
</script>

<?php }} ?>