<?php /* Smarty version Smarty-3.1.13, created on 2015-12-11 15:50:54
         compiled from "F:\WWW\1yyg225\webapps\www\views\cn\mobile\index.html" */ ?>
<?php /*%%SmartyHeaderCode:451565d6495433431-94913344%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e89a688177d9f6040bddb9d623993d7d4d944076' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\cn\\mobile\\index.html',
      1 => 1449796525,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '451565d6495433431-94913344',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d64955bc1d7_69770508',
  'variables' => 
  array (
    'tagAdw' => 0,
    'tagAds' => 0,
    'm' => 0,
    'luck_db' => 0,
    'data' => 0,
    'cartNum' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d64955bc1d7_69770508')) {function content_565d64955bc1d7_69770508($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/font/iconfont.css">
<link rel="stylesheet" href="/style/mobile/css/bootstrap.css">
<link rel="stylesheet" href="/style/mobile/css/new_index.css">
<script src="/js/lefttime.js"></script>
<script src="/js/lefttime_jx.js"></script>
<style type="text/css">
    *{ box-sizing: border-box; }
</style>
<div class="new_banner">
    <div class="slider" id="single-item">
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
</div>
<ul class="new-nav">
    <li>
        <a href="<?php echo url();?>
">
            <em><i class="iconfont">&#xe60b;</i></em>
            <p>首页</p>
        </a>
    </li>
    <li>
        <a href="<?php echo url('/yunbuy');?>
">
            <em><i class="iconfont">&#xe604;</i></em>
            <p>夺宝区</p>
        </a>
    </li>
    <?php if (@constant('IsAuction')){?>
    <li>
        <a href="<?php echo url('/auction/lists');?>
">
            <em><i class="iconfont">&#xe60a;</i></em>
            <p>竞拍区</p>
        </a>
    </li>
    <style type="text/css">
        .new-nav li{ width: 20%; }
    </style>
    <?php }?>
    <li>
        <a href="<?php echo url('/content/win');?>
">
            <em><i class="iconfont">&#xe602;</i></em>
            <p>最新揭奖</p>
        </a>
    </li>
    <li>
        <a href="<?php echo url('/content/share');?>
">
            <em><i class="iconfont">&#xe601;</i></em>
            <p>晒单</p>
        </a>
    </li>
</ul>
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
        <li onclick="window.location.href='<?php echo url();?>
'" <?php if (!$_GET['order']){?>class="hover"<?php }?>>最新</li>
        <li onclick="window.location.href='?order=end_num#buy_nav'" <?php if ($_GET['order']=='end_num'){?>class="hover"<?php }?>>最快</li>
        <li onclick="window.location.href='?order=count#buy_nav'" <?php if ($_GET['order']=='count'){?>class="hover"<?php }?>>最热</li>
        <li onclick="window.location.href='?order=price&sort=ASC#buy_nav'" <?php if ($_GET['order']=='price'&&$_GET['sort']=='ASC'){?>class="hover"<?php }?>>价格<i class="iconfont">&#xe609;</i></li>
        <li onclick="window.location.href='?order=price&sort=DESC#buy_nav'" <?php if ($_GET['order']=='price'&&$_GET['sort']=='DESC'){?>class="hover"<?php }?>>价格<i class="iconfont">&#xe608;</i></li>
    </ul>
    <div id="container" class="transitions-enabled infinite-scroll clearfix new-index2">
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['yunbuy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
        <div class="new-box">
            <em><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
"><img alt="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>180,'type'=>0),$_smarty_tpl);?>
" id="buy_img_<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
"></a></em>
            <h5><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
"><span>(第<?php echo $_smarty_tpl->tpl_vars['m']->value['qishu'];?>
期)</span><p><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</p></a></h5>
            <div class="new-index2-1">
                <p><span style="width:<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_num']/$_smarty_tpl->tpl_vars['m']->value['need_num']*100;?>
%"></span></p>
                <dl>
                    <dt><span><?php echo $_smarty_tpl->tpl_vars['m']->value['buy_num'];?>
</span><i>已参与人次</i></dt>
                    <dd class="new-index_zx"><span><?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
</span><i>总需人次</i></dd>
                    <dd class="new-index_zx1"><span><?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
</span><i>剩余人次</i></dd>
                </dl>
                <div class="new-index-one" >
                    <a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
">立即云购</a><a onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
','<?php if ($_smarty_tpl->tpl_vars['m']->value['type']==2){?>free<?php }?>',this)" class="new-index-two"></a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <div id="page-nav"><a href="yunbuy/index/2?ajaxcontent=1&order=<?php if ($_GET['order']){?><?php echo $_GET['order'];?>
<?php }else{ ?>new<?php }?>&sort=<?php if ($_GET['sort']){?><?php echo $_GET['sort'];?>
<?php }else{ ?>desc<?php }?>&skin=2&size=4"></a></div>

</div>
<div class="new-foot1"></div>
<ul class="new-foot">
    <li>
        <a href="<?php echo url();?>
" class="hover">
            <em><i class="iconfont">&#xe60b;</i></em>
            <p>首页</p>
        </a>
    </li>
    <li>
        <a href="<?php echo url('/yunbuy');?>
">
            <em><i class="iconfont">&#xe604;</i></em>
            <p>一元夺宝</p>
        </a>
    </li>
    <li>
        <a href="<?php echo url('/content/win');?>
">
            <em><i class="iconfont">&#xe602;</i></em>
            <p>最新揭奖</p>
        </a>
    </li>
    <li>
        <a href="<?php echo url('/yunbuy/cart');?>
">
            <em><i class="iconfont">&#xe600;</i></em>
            <p>购物车</p>
            <span class=" cartNum" id="cartNum"><?php echo $_smarty_tpl->tpl_vars['cartNum']->value;?>
</span>
        </a>
    </li>
    <li>
        <a href="<?php echo url('/member');?>
">
            <em><i class="iconfont">&#xe603;</i></em>
            <p>我的云购</p>
        </a>
    </li>
</ul>
<script src="/style/mobile/js/slick.min.js"></script>
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
    $(function(){
        $('.new_banner #single-item').slick({
            autoplay: true,
            arrows:false,
            dots: true
        });
    });
    $(".new-index-1 li:odd").addClass("new-odd")
</script>

<script type="text/javascript" src="/style/mobile/js/jquery.masonry.min.js"></script>
<script type="text/javascript" src="/style/mobile/js/jquery.infinitescroll.min.js"></script>
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

    });
</script>

<script src="/style/mobile/js/script.js"></script><?php }} ?>