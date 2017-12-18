<?php /* Smarty version Smarty-3.1.13, created on 2017-05-09 09:05:10
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/index.html" */ ?>
<?php /*%%SmartyHeaderCode:184761957158451769baa527-72062964%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0c384285d866b4bedda139ba2fb459e0077f8a3' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/index.html',
      1 => 1494235182,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184761957158451769baa527-72062964',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58451769e3f735_99201699',
  'variables' => 
  array (
    'main' => 0,
    'yuncat' => 0,
    'key' => 0,
    'm' => 0,
    'n' => 0,
    'site_config' => 0,
    'tagData' => 0,
    'tagAdw' => 0,
    'tagAds' => 0,
    'data' => 0,
    'recbuy' => 0,
    'L' => 0,
    'luck_db' => 0,
    'yunbuy' => 0,
    'hotCrowd' => 0,
    'row' => 0,
    'digitalyunbuy' => 0,
    'caryunbuy' => 0,
    'fashionyunbuy' => 0,
    'lifeyunbuy' => 0,
    'outdooryunbuy' => 0,
    'cardyunbuy' => 0,
    'newyunbuy' => 0,
    'auction' => 0,
    'share' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451769e3f735_99201699')) {function content_58451769e3f735_99201699($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include '/data/01/html/1yyg225/system/smarty/plugins/modifier.truncate.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/index.css');?>
">
<script src="/style/lefttime.js?v=<?php echo $_smarty_tpl->tpl_vars['main']->value['vjs'];?>
"></script>
<script src="/style/lefttime_jx.js?v=<?php echo $_smarty_tpl->tpl_vars['main']->value['vjs'];?>
"></script>
<style>
  .hidden{ display: none !important; }
  .home-ad{ position:fixed; top:0; width:100%; height:100%; background-color: rgba(56, 47, 107, 0.701961); z-index:9999; display: -webkit-flex;  
              display: flex;  -webkit-align-items: center;  align-items: center;  -webkit-justify-content: center;  justify-content: center; }
</style>
<div class="container">
<div class="ui-clr first-screen">
    <div class="screen-left ui-left">
        <ul class="nav-sub">
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['yuncat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['yuncat']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['yuncat']['index']++;
?>
            <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['yuncat']['index']<6){?>
            <li class="n<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
"><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
</a>
                <div class="nav-child">
                    <!--<div class="nc-title"><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
</div>-->
                    <div class="nc-content clearfix">
                        <?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['n']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['yuncat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
$_smarty_tpl->tpl_vars['n']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['n']->value['parentid']==$_smarty_tpl->tpl_vars['m']->value['id']){?>
                        <p><a href="<?php echo $_smarty_tpl->tpl_vars['n']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['n']->value['catname'];?>
</a></p>
                        <?php }?>
                        <?php } ?>
                    </div>
                </div>
            </li>
            <?php }?>
            <?php } ?>
        </ul>
        <div class="active">
<!--
            <h3><?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
公告</h3>
-->
            <h3 style="text-align: center; padding: 0;">公&nbsp;&nbsp;&nbsp;&nbsp;告</h3>
            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'content','module'=>'article','field'=>'id,title,url','catid'=>@constant('REC_ID'),'limit'=>3),$_smarty_tpl);?>

            <ul>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tagData']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['rec']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['rec']['iteration']++;
?>
                <li class="a<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['rec']['iteration'];?>
"><b><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['rec']['iteration'];?>
</b><a href="<?php if ($_smarty_tpl->tpl_vars['m']->value['link']){?><?php echo $_smarty_tpl->tpl_vars['m']->value['link'];?>
<?php }else{ ?><?php echo url($_smarty_tpl->tpl_vars['m']->value['url']);?>
<?php }?>" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="screen-center ui-left">
        <div id="slideBox" class="slideBox">
            <div class="bd">
                <ul>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'content','var'=>'tagAdw','module'=>'ad','id'=>1),$_smarty_tpl);?>

                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','var'=>'tagAds','source'=>$_smarty_tpl->tpl_vars['tagAdw']->value['images'],'num'=>10),$_smarty_tpl);?>

                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tagAds']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <li class="scrollLoadingDiv"><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"<?php if ($_smarty_tpl->tpl_vars['m']->value['isblank']){?> target="_blank"<?php }?>><img class="scrollLoading" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->tpl_vars['m']->value['path'];?>
" /></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="hd">
                <ul><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tagAds']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?><li><?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</li><?php } ?></ul>
            </div>
        </div>

        <div id="scroll" class="scroll">
            <div class="scroll-box">
                <div class="bd" id="win-list">
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['jxdb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <?php echo $_smarty_tpl->getSubTemplate ("content/windbitemindex.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    <?php } ?>
                </div>
            </div>
            <a class="prev" href="javascript:void(0)"></a>
            <a class="next" href="javascript:void(0)"></a>
            <span class="bor"></span>
        </div>
        <input type="hidden" name="ids" id="ids" value="" />

    </div>

    <div class="screen-right ui-right">
        <?php if ($_smarty_tpl->tpl_vars['recbuy']->value){?>
        <div class="recduobao">
            <div class="bd">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recbuy']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <li>
                        <div class="title"><i></i><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
</a></div>
                        <div class="pic v"><a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>200,'height'=>150,'type'=>0),$_smarty_tpl);?>
"></a><span></span></div>
                        <div class="progressBar">
                            <p class="progressBar-wrap">
                                <span style="width:<?php echo $_smarty_tpl->tpl_vars['m']->value['jindu'];?>
%"></span>
                            </p>
                            <div class="progressBar-txt">
                                <div class="txt-l">
                                    <p><b><?php echo $_smarty_tpl->tpl_vars['m']->value['buy_num'];?>
</b></p>
                                    <p>已参与人次</p>
                                </div>
                                <div class="txt-r">
                                    <p><b><?php echo $_smarty_tpl->tpl_vars['m']->value['end_num'];?>
</b></p>
                                    <p>剩余人次</p>
                                </div>
                            </div>
                        </div>
                        <a class="btn-btn" href="javascript:void(0)" onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['m']->value['buy_id'];?>
,'buy')"></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php }?>
        <?php if (@constant('IsAuction')){?>
        <a class="index-com" href="<?php echo url('/content/newbie/yunbuy');?>
"></a>
        <div class="stock">
            <div class="tip">上证<br>指数</div>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['cod']){?>
            <div class="today">
                <a href="http://cj.gw.com.cn/news/index/000001.shtml" target="_blank"><strong><?php echo $_smarty_tpl->tpl_vars['data']->value['cod']['cod'];?>
</strong></a><br>[<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['cod']['addtime'],'Y-m-d');?>
]
            </div>
            <?php }?>
            <div class="latest">
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['codlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <p>[<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['addtime'],'m-d');?>
] <a><?php echo $_smarty_tpl->tpl_vars['m']->value['cod'];?>
</a></p>
                <?php } ?>
            </div>
        </div>
        <?php }else{ ?>
        <a class="index-com" style="height: 162px; margin-top: 10px; background: url('style/images/index1_1.jpg');" href="<?php echo url('/content/newbie/yunbuy');?>
"></a>
        <?php }?>

    </div>
</div>
<div class="screen-bot"></div>

<div class="section">
    <div class="s-hd">
        <h3>正在<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</h3>
        <ul class="s-nav">
           <!--  <li><a href="<?php echo url('/content/share');?>
" target="_blank">查看<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
</a></li> -->
           <li><a href="http://www.i1y8.com/yunbuy/?cid=0&bid=0&k=ratio&type=&" target="_blank">人气商品</a></li>
        </ul>
    </div>
    <div class="s-bd ui-clr">
        <div class="s-aside ui-left">
            <div class="win-t"><img src="/style/images/a-pic.png"></div>
            <div class="win-bd">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['luck_db']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <li>
                        <div class="pic"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['m']->value['photo'],'size'=>'80','nopic'=>'/upload/default.gif'),$_smarty_tpl);?>
" width="50" height="50"></div>
                        <div class="info">
                            <p class="p1"><span>于<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['db_time'],'m月d日');?>
</span><a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']));?>
" target="_blank" title="<?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
"><strong><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</strong></a></p>
                            <p class="p2"><b class="color01"><?php echo $_smarty_tpl->tpl_vars['m']->value['qty'];?>
人次</b>参与<a href="<?php echo url(('/yunbuy/detail/').($_smarty_tpl->tpl_vars['m']->value['buy_id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['goods_name'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['m']->value['goods_name'],10,'');?>
</a></p>
                            <p>总需：<?php echo $_smarty_tpl->tpl_vars['m']->value['need_num'];?>
 人次</p>
                        </div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <div class="s-main">
            <ul class="win-list ui-clr">
                <?php if (isset($_smarty_tpl->tpl_vars['pre'])) {$_smarty_tpl->tpl_vars['pre'] = clone $_smarty_tpl->tpl_vars['pre'];
$_smarty_tpl->tpl_vars['pre']->value = '02'; $_smarty_tpl->tpl_vars['pre']->nocache = null; $_smarty_tpl->tpl_vars['pre']->scope = 0;
} else $_smarty_tpl->tpl_vars['pre'] = new Smarty_variable('02', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['yunbuy']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <?php echo $_smarty_tpl->getSubTemplate ("yunbuy/lbi_yunbuy_index.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<?php if ($_smarty_tpl->tpl_vars['site_config']->value['index_crowd']){?>
<link rel="stylesheet" href="<?php echo url('/style/css/index-zhongchou.css');?>
">
<div class="section">
<div class="s-hd">
    <h3>热门众筹</h3>
</div>
<div class="s-bd ui-clr">
<div class="fn-clear">
<ul class="index-zhongcou win-list ui-clr">
<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['hotCrowd']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
<li>
    <div class="pic v scrollLoadingDiv"><a href="<?php echo url('/crowd/detail/');?>
<?php echo $_smarty_tpl->tpl_vars['row']->value['cd_id'];?>
"target="_blank"><img class="scrollLoading" src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['row']->value['thumb'],'width'=>285,'height'=>224),$_smarty_tpl);?>
" /></a><span></span></div>
    <p class="title"><a href="<?php echo url('/crowd/detail/');?>
<?php echo $_smarty_tpl->tpl_vars['row']->value['cd_id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['row']->value['cd_name'];?>
" target="_blank"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['row']->value['cd_name'],16,'');?>
</a></p>
    <div class="progressBar">
        <p class="progressBar-wrap">
            <span style="width:<?php echo progress($_smarty_tpl->tpl_vars['row']->value['cd_total'],$_smarty_tpl->tpl_vars['row']->value['cd_price']);?>
%"></span>
        </p>
        <div class="progressBar-txt">
            <div class="txt-l">
                <span><?php echo progress($_smarty_tpl->tpl_vars['row']->value['cd_total'],$_smarty_tpl->tpl_vars['row']->value['cd_price']);?>
%</span>
                <p>已达</p>
            </div>
            <div class="txt-r">
                <span><?php echo endDay($_smarty_tpl->tpl_vars['row']->value['end_time']);?>
</span>
                <p>剩余</p>
            </div>
            <div class="txt-m">
                <span><?php echo price_format($_smarty_tpl->tpl_vars['row']->value['cd_total'],1);?>
</span>
                <p>已筹</p>
            </div>
        </div>
    </div>
</li>
<?php } ?>
</ul>
</div>
</div>
</div>
<?php }?>

<div class="section">
    <div class="s-hd">
        <h3>数码电器</h3>
        <a href="/yunbuy/index/?cid=1" class="s-nav" style="float:right;cursor:pointer;" target="_blank">查看更多</a>
    </div>
    <div class="s-bd ui-clr">
        <div class="fn-clear">
            <ul class="win-list ui-clr">
                <?php if (isset($_smarty_tpl->tpl_vars['pre'])) {$_smarty_tpl->tpl_vars['pre'] = clone $_smarty_tpl->tpl_vars['pre'];
$_smarty_tpl->tpl_vars['pre']->value = '03'; $_smarty_tpl->tpl_vars['pre']->nocache = null; $_smarty_tpl->tpl_vars['pre']->scope = 0;
} else $_smarty_tpl->tpl_vars['pre'] = new Smarty_variable('03', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['digitalyunbuy']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <?php echo $_smarty_tpl->getSubTemplate ("yunbuy/lbi_yunbuy_index.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <?php } ?>
            </ul>
        </div>
    </div>
</div>

<div class="section">
    <div class="s-hd">
        <h3>汽车专区</h3>
        <a href="/yunbuy/index/?cid=35" class="s-nav" style="float:right;cursor:pointer;" target="_blank">查看更多</a>
    </div>
    <div class="s-bd ui-clr">
        <div class="fn-clear">
            <ul class="win-list ui-clr">
                <?php if (isset($_smarty_tpl->tpl_vars['pre'])) {$_smarty_tpl->tpl_vars['pre'] = clone $_smarty_tpl->tpl_vars['pre'];
$_smarty_tpl->tpl_vars['pre']->value = '03'; $_smarty_tpl->tpl_vars['pre']->nocache = null; $_smarty_tpl->tpl_vars['pre']->scope = 0;
} else $_smarty_tpl->tpl_vars['pre'] = new Smarty_variable('03', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['caryunbuy']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <?php echo $_smarty_tpl->getSubTemplate ("yunbuy/lbi_yunbuy_index.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <?php } ?>
            </ul>
        </div>
    </div>
</div>

<div class="section">
    <div class="s-hd">
        <h3>时尚潮流</h3>
        <a href="/yunbuy/index/?cid=4" class="s-nav" style="float:right;cursor:pointer;" target="_blank">查看更多</a>
    </div>
    <div class="s-bd ui-clr">
        <div class="fn-clear">
            <ul class="win-list ui-clr">
                <?php if (isset($_smarty_tpl->tpl_vars['pre'])) {$_smarty_tpl->tpl_vars['pre'] = clone $_smarty_tpl->tpl_vars['pre'];
$_smarty_tpl->tpl_vars['pre']->value = '03'; $_smarty_tpl->tpl_vars['pre']->nocache = null; $_smarty_tpl->tpl_vars['pre']->scope = 0;
} else $_smarty_tpl->tpl_vars['pre'] = new Smarty_variable('03', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fashionyunbuy']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <?php echo $_smarty_tpl->getSubTemplate ("yunbuy/lbi_yunbuy_index.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <?php } ?>
            </ul>
        </div>
    </div>
</div>

<div class="section">
    <div class="s-hd">
        <h3>生活超市</h3>
        <a href="/yunbuy/index/?cid=3" class="s-nav" style="float:right;cursor:pointer;" target="_blank">查看更多</a>
    </div>
    <div class="s-bd ui-clr">
        <div class="fn-clear">
            <ul class="win-list ui-clr">
                <?php if (isset($_smarty_tpl->tpl_vars['pre'])) {$_smarty_tpl->tpl_vars['pre'] = clone $_smarty_tpl->tpl_vars['pre'];
$_smarty_tpl->tpl_vars['pre']->value = '03'; $_smarty_tpl->tpl_vars['pre']->nocache = null; $_smarty_tpl->tpl_vars['pre']->scope = 0;
} else $_smarty_tpl->tpl_vars['pre'] = new Smarty_variable('03', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lifeyunbuy']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <?php echo $_smarty_tpl->getSubTemplate ("yunbuy/lbi_yunbuy_index.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <?php } ?>
            </ul>
        </div>
    </div>
</div>

<div class="section">
    <div class="s-hd">
        <h3>户外运动</h3>
        <a href="/yunbuy/index/?cid=2" class="s-nav" style="float:right;cursor:pointer;" target="_blank">查看更多</a>
    </div>
    <div class="s-bd ui-clr">
        <div class="fn-clear">
            <ul class="win-list ui-clr">
                <?php if (isset($_smarty_tpl->tpl_vars['pre'])) {$_smarty_tpl->tpl_vars['pre'] = clone $_smarty_tpl->tpl_vars['pre'];
$_smarty_tpl->tpl_vars['pre']->value = '03'; $_smarty_tpl->tpl_vars['pre']->nocache = null; $_smarty_tpl->tpl_vars['pre']->scope = 0;
} else $_smarty_tpl->tpl_vars['pre'] = new Smarty_variable('03', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['outdooryunbuy']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <?php echo $_smarty_tpl->getSubTemplate ("yunbuy/lbi_yunbuy_index.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <?php } ?>
            </ul>
        </div>
    </div>
</div>

<div class="section">
    <div class="s-hd">
        <h3>充值卡类</h3>
        <a href="/yunbuy/index/?cid=8" class="s-nav" style="float:right;cursor:pointer;" target="_blank">查看更多</a>
    </div>
    <div class="s-bd ui-clr">
        <div class="fn-clear">
            <ul class="win-list ui-clr">
                <?php if (isset($_smarty_tpl->tpl_vars['pre'])) {$_smarty_tpl->tpl_vars['pre'] = clone $_smarty_tpl->tpl_vars['pre'];
$_smarty_tpl->tpl_vars['pre']->value = '03'; $_smarty_tpl->tpl_vars['pre']->nocache = null; $_smarty_tpl->tpl_vars['pre']->scope = 0;
} else $_smarty_tpl->tpl_vars['pre'] = new Smarty_variable('03', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cardyunbuy']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <?php echo $_smarty_tpl->getSubTemplate ("yunbuy/lbi_yunbuy_index.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <?php } ?>
            </ul>
        </div>
    </div>
</div>


<div class="section">
    <div class="s-hd">
        <h3>最新上架</h3>
    </div>
    <div class="s-bd ui-clr">
        <div class="fn-clear">
            <ul class="win-list ui-clr">
                <?php if (isset($_smarty_tpl->tpl_vars['pre'])) {$_smarty_tpl->tpl_vars['pre'] = clone $_smarty_tpl->tpl_vars['pre'];
$_smarty_tpl->tpl_vars['pre']->value = '03'; $_smarty_tpl->tpl_vars['pre']->nocache = null; $_smarty_tpl->tpl_vars['pre']->scope = 0;
} else $_smarty_tpl->tpl_vars['pre'] = new Smarty_variable('03', null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['newyunbuy']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <?php echo $_smarty_tpl->getSubTemplate ("yunbuy/lbi_yunbuy_index.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <?php } ?>
            </ul>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['data']->value['newAuction']){?>
        <div class="fn-clear">
            <ul class="pro-list ui-clr">
                <?php  $_smarty_tpl->tpl_vars['auction'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['auction']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['newAuction']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['auction']->key => $_smarty_tpl->tpl_vars['auction']->value){
$_smarty_tpl->tpl_vars['auction']->_loop = true;
?>
                <li class="aucli">
                    <div class="pic scrollLoadingDiv"><a href="<?php echo $_smarty_tpl->tpl_vars['auction']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['auction']->value['title'];?>
" target="_blank"><img class="scrollLoading" src="/style/images/pix.gif" data-url="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['auction']->value['imgurl_src'],'width'=>210,'height'=>130,'type'=>0),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['auction']->value['title'];?>
" /></a></div>
                    <p class="title"><a href="<?php echo $_smarty_tpl->tpl_vars['auction']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['auction']->value['title'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['auction']->value['title'];?>
</a></p>

                    <?php if ($_smarty_tpl->tpl_vars['auction']->value['cat_type']=='tiyan'){?>
                    <p class="price" style="line-height: 24px;">
                        价值：<?php echo price_format($_smarty_tpl->tpl_vars['auction']->value['price']);?>

                        <?php if ($_smarty_tpl->tpl_vars['auction']->value['paib']){?>
                        仅需<i> <?php echo $_smarty_tpl->tpl_vars['auction']->value['paib'];?>
<em><a href="<?php echo url('/content/tiyan');?>
" target="_blank" title="做任务，赚<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</a></em></i>
                        <?php }?>
                    </p>
                    <?php }else{ ?>
                    <p class="price"><i>￥</i><span><?php echo $_smarty_tpl->tpl_vars['auction']->value['current_price'];?>
</span> <del>原价：<?php echo price_format($_smarty_tpl->tpl_vars['auction']->value['price']);?>
</del></p>
                    <?php }?>


                    <p class="tip"><?php if ($_smarty_tpl->tpl_vars['auction']->value['cat_type']=='tiyan'){?><span class="color01">体验</span><?php }?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
率：<?php echo $_smarty_tpl->tpl_vars['auction']->value['win'];?>
%，已有<span class="color01"><?php echo $_smarty_tpl->tpl_vars['auction']->value['bid_user_count'];?>
</span>人参与</p>
                    <?php if ($_smarty_tpl->tpl_vars['auction']->value['status']<@constant('FINISHED')){?>
                    <div class="count-time"><i></i><?php if ($_smarty_tpl->tpl_vars['auction']->value['status']==@constant('PRE_START')){?>即将开始<?php }else{ ?>剩余<?php }?>：<span id="leftTime<?php echo $_smarty_tpl->tpl_vars['auction']->value['act_id'];?>
">请稍等, 载入中...</span></div>
                    <script type="text/javascript">
                        onload_leftTime('<?php echo $_smarty_tpl->tpl_vars['auction']->value['act_id'];?>
<?php echo $_smarty_tpl->tpl_vars['auction']->value['key'];?>
',"<?php echo $_smarty_tpl->tpl_vars['auction']->value['diff_time'];?>
","<?php echo $_smarty_tpl->tpl_vars['auction']->value['status'];?>
");
                    </script>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['auction']->value['status']==@constant('PRE_START')){?>
                    <a class="btn-go btn-pre" href="<?php echo $_smarty_tpl->tpl_vars['auction']->value['url'];?>
">即将推出</a>
                    <?php }elseif($_smarty_tpl->tpl_vars['auction']->value['status']==@constant('UNDER_WAY')){?>
                    <a class="btn-go" href="<?php echo $_smarty_tpl->tpl_vars['auction']->value['url'];?>
">抢拍</a>
                    <?php }else{ ?>
                    <a class="btn-go btn-finish" href="<?php echo $_smarty_tpl->tpl_vars['auction']->value['url'];?>
">已结束</a>
                    <?php }?>

                    <?php if ($_smarty_tpl->tpl_vars['auction']->value['win']){?>
                    <div class="winz"><i><?php echo $_smarty_tpl->tpl_vars['auction']->value['win'];?>
<span>%</span></i></div>
                    <?php }?>
                </li>
                <?php } ?>
            </ul>
        </div>
        <?php }?>
    </div>
</div>

<?php if ($_smarty_tpl->tpl_vars['share']->value){?>
<div class="section">
    <div class="s-hd">
        <h3>晒单分享</h3>
        <span id="start"></span>
        <ul class="s-nav">
            <li><a href="<?php echo url('/content/share');?>
" target="_blank">更多分享...</a></li>
        </ul>
    </div>
    <div class="s-bd ui-clr">
        <div class="share-list">
            <ul class="ui-clr">
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['share']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <li>
                    <div class="pic"><a href="<?php echo url(((('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid'])).('#share#vid=')).($_smarty_tpl->tpl_vars['m']->value['id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['thumb'],'width'=>100,'height'=>82,'type'=>1),$_smarty_tpl);?>
" /></a></div>
                    <div class="detail">
                        <i class="former"></i>
                        <p class="txt"><a href="<?php echo url(((('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid'])).('#share#vid=')).($_smarty_tpl->tpl_vars['m']->value['id']));?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['content'];?>
"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['m']->value['content'],54);?>
</a></p>
                        <p class="author">&mdash;&mdash; <a href="<?php echo url(((('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid'])).('#share#vid=')).($_smarty_tpl->tpl_vars['m']->value['id']));?>
" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" target="_blank"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['m']->value['title'],10);?>
</a>&nbsp; <?php echo date('Y-m-d H:i',$_smarty_tpl->tpl_vars['m']->value['addtime']);?>
</p>
                        <i class="after"></i>
                    </div>
                </li>
                <?php }
if (!$_smarty_tpl->tpl_vars['m']->_loop) {
?>
                <li class="empty" style="border:0;width:100%;line-height:200px;">等你来晒单...</li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<?php }?>

</div>

<!-- 首页广告  -->
<!-- <div class="home-ad" style="position:fixed; bottom:0; width:100%; height:135px; background-color: rgba(56, 47, 107, 0.701961); z-index:9999;">
  <div style="width:1200px;margin: 0 auto;">
    <div style="float:left; margin-top: -20px; padding-left:35px;">
      <img src="/upload/images/home2.png" alt="">
    </div>
    <div style="float:left;">
      <img src="/upload/images/home1.png" alt="">
    </div>
    <a id="close-home-ad" href="javascript:;" style="display:block; float:left; margin-top:42px; margin-left: 80px;">
      <img src="/upload/images/homeclose.png" alt="">
    </a>
  </div>
</div> -->
<div class="home-ad hidden">
  <div style="width:360px;margin: 0 auto;position:relative;">
    <a href="/content/html/apps"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['site_config']->value['pc_home_ad_picture']),$_smarty_tpl);?>
" alt="" style="width:100%;"></a>
    <a id="close-home-ad" href="javascript:;" style="position:absolute;top:5px;right:0;"><img src="/upload/images/homeclose.png" alt=""></a>
  </div>
</div>

<script>
  $(document).ready(function(){
      if(sessionStorage.getItem("home_visited") == "true" ){
      }else{
          $(".home-ad").removeClass("hidden");
          sessionStorage.setItem("home_visited", true);
          $("#close-home-ad").click(function(e){
              $(this).parents(".home-ad").addClass("hidden");
          });
      }
  })
</script>

<script src="<?php echo url('/style/script.js');?>
"></script>
<script src="<?php echo url('/style/jquery.SuperSlide.2.1.1.js');?>
"></script>
<script src="<?php echo url('/style/jcarousellite.js');?>
"></script>

<script type="text/javascript">
    jQuery(".recduobao").slide({mainCell:".bd ul",effect:"top",autoPlay:true,interTime:"3000",delayTime:"1000"});
    jQuery("#slideBox").slide({mainCell:".bd ul",effect:"left",autoPlay:true});
    jQuery("#notice").slide({});
    jQuery("#focus").slide({mainCell:".bd ul",effect:"top",autoPlay:true,interTime:"3000"});
    jQuery(".win-bd").slide({mainCell:"ul",autoPage:true,effect:"topLoop",autoPlay:true,vis:7,interTime:"2500",delayTime:"1000",opp:true});
    jQuery(".act-bd").slide({mainCell:"ul",autoPage:true,effect:"topLoop",autoPlay:true,vis:7,interTime:"2500",delayTime:"1000",opp:true});
    jQuery("#share").slide({mainCell:".share-list ul",autoPage:true,interTime:"5000",effect:"topLoop",autoPlay:true,vis:2});
    //jQuery("#scroll").slide({ mainCell:".bd",autoPage:true,effect:"left",autoPlay:true,interTime:"4000",scroll:2,vis:2 });

    $(function(){
        $(".share-list").jCarouselLite({auto:3000,speed: 300});
        $(".share-list li:even").addClass("even");

        $(".side-r img").each(function(){
            SetImage(this,294,142);
        });

        $('.win-list li,.pro-list li').bind('mouseover',function(){
            $(this).addClass('hover');
        }).bind('mouseout',function(){
            $(this).removeClass('hover');
        });

        //商品分类效果
        $('.nav-sub li').bind('mouseover',function(){
            if($(this).find('.nc-content').html().trim()){
                $(this).find('.nav-child').stop().show();
            }
        }).bind('mouseout',function(){
            $(this).find('.nav-child').stop().hide();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        compaceIds();
        setInterval('compaceIds()',5*1000);
    });
    function compaceIds(){
        $.post('/content/ajaxIds','skin=index&ids='+$('#ids').val(),function(data){
            if(data.error==1){
                $('#ids').val(data.ids);
                $('#win-list').prepend(data.html);
            }
        },'json');
    }
</script>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>