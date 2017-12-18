<?php /* Smarty version Smarty-3.1.13, created on 2016-06-24 15:40:54
         compiled from "E:\projects\web\1yyg\1yyg225_full\webapps\www\views\cn\auction\lists.html" */ ?>
<?php /*%%SmartyHeaderCode:26622576ce4067c85e8-66687635%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92d7394ba9a22cf776cf87c63d4f2e360632edc0' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_full\\webapps\\www\\views\\cn\\auction\\lists.html',
      1 => 1456367945,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26622576ce4067c85e8-66687635',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'tagAdw' => 0,
    'tagAds' => 0,
    'm' => 0,
    'tagGG' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_576ce4069fb8c4_82527092',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576ce4069fb8c4_82527092')) {function content_576ce4069fb8c4_82527092($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'E:\\projects\\web\\1yyg\\1yyg225_full\\system\\smarty\\plugins\\modifier.truncate.php';
?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/lefttime.js"></script>
<link rel="stylesheet" href="<?php echo url('/style/css/boutique.css');?>
">

<?php if (!$_GET['k']&&$_smarty_tpl->tpl_vars['data']->value['type']!='all'&&$_smarty_tpl->tpl_vars['data']->value['type']!='tiyan'){?>
<div class="ggAuc">
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'content','var'=>'tagAdw','module'=>'ad','id'=>$_smarty_tpl->tpl_vars['data']->value['top']['ggid']),$_smarty_tpl);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','var'=>'tagAds','source'=>$_smarty_tpl->tpl_vars['tagAdw']->value['images'],'num'=>2),$_smarty_tpl);?>

    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tagAds']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
    <div class="g-gg" style="height:<?php echo $_smarty_tpl->tpl_vars['tagAdw']->value['height'];?>
px;background:<?php echo $_smarty_tpl->tpl_vars['tagAdw']->value['bgcolor'];?>
 url('<?php echo $_smarty_tpl->tpl_vars['m']->value['path'];?>
') no-repeat center bottom"><span></span><?php if ($_smarty_tpl->tpl_vars['m']->value['title']){?><a href="<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
" target="_blank"></a><?php }?></div>
    <?php } ?>
    <div class="container" style="position:relative;margin-top:-180px;height:250px;">
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'content','var'=>'tagGG','catid'=>$_smarty_tpl->tpl_vars['data']->value['noteid'],'limit'=>1,'type'=>'row','field'=>'content'),$_smarty_tpl);?>

        <?php if ($_smarty_tpl->tpl_vars['tagGG']->value){?>
        <div class="txt txt_<?php echo $_smarty_tpl->tpl_vars['data']->value['type'];?>
">
            <dl style="background: #<?php echo $_smarty_tpl->tpl_vars['data']->value['top']['bgcolor'];?>
">
                <dt><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'category','catid'=>$_smarty_tpl->tpl_vars['data']->value['noteid'],'type'=>'field'),$_smarty_tpl);?>
</dt>
                <dd>
                    <?php echo stripcslashes($_smarty_tpl->tpl_vars['tagGG']->value['content']);?>

                </dd>
            </dl>
        </div>
        <?php }?>
        <div class="txtScroll-top" style="color: #<?php echo $_smarty_tpl->tpl_vars['data']->value['top']['bgcolor'];?>
">
            <h4>幸运一族：</h4>
            <div class="bd">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['log']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <li title="恭喜<?php echo $_smarty_tpl->tpl_vars['m']->value['username'];?>
会员<?php if ($_smarty_tpl->tpl_vars['m']->value['win']>0){?>在<?php echo $_smarty_tpl->tpl_vars['m']->value['win'];?>
%出价成交活动中<?php }?>以<?php echo price_format($_smarty_tpl->tpl_vars['m']->value['bid_price']);?>
获<?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
">恭喜<a href="<?php echo url(('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['bid_user']));?>
#aucCod" target="_blank"><span class="color01"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</span></a>会员<?php if ($_smarty_tpl->tpl_vars['m']->value['win']>0){?>在<?php echo $_smarty_tpl->tpl_vars['m']->value['win'];?>
%出价成交活动中<?php }?>以<span class="color01"><?php if ($_smarty_tpl->tpl_vars['m']->value['bid_price']>0){?><?php echo price_format($_smarty_tpl->tpl_vars['m']->value['bid_price']);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['m']->value['paib']>0){?> <?php echo $_smarty_tpl->tpl_vars['m']->value['paib'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
<?php }?></span>获<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['m']->value['title'],16);?>
</li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</div>
<?php }else{ ?>
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>

<div id="container">
    <div class="jp-lbsx mt10" id="m">
        <?php if ($_smarty_tpl->tpl_vars['data']->value['cate']){?>
        <ul class="jp-fl fn-clear">
            <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['cate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
            <li <?php if ($_smarty_tpl->tpl_vars['m']->value['id']==$_smarty_tpl->tpl_vars['data']->value['id']){?>class="dq"<?php }?>><a href="<?php echo url((((((('/auction/lists/').($_smarty_tpl->tpl_vars['data']->value['type'])).('/')).($_smarty_tpl->tpl_vars['data']->value['status'])).('/')).($_smarty_tpl->tpl_vars['m']->value['id'])).($_smarty_tpl->tpl_vars['data']->value['urlQuery']));?>
#m"><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
(<?php echo $_smarty_tpl->tpl_vars['m']->value['count'];?>
)</a></li>
            <?php } ?>
        </ul>
        <?php }?>

        <?php if ($_GET['k']){?>
        <div class="jp-flpx fn-clear">
            <span>搜索<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
商品：<?php echo $_GET['q'];?>
</span>
        </div>
        <?php }?>
    </div>

    <ul class="fn-clear mt20 jp-tab">
        <li<?php if ($_smarty_tpl->tpl_vars['data']->value['status']==@constant('UNDER_WAY')){?> class="dq"<?php }?>><a href="<?php echo url((((((('/auction/lists/').($_smarty_tpl->tpl_vars['data']->value['type'])).('/')).(@constant('UNDER_WAY'))).('/')).($_smarty_tpl->tpl_vars['data']->value['row']['id'])).($_smarty_tpl->tpl_vars['data']->value['urlQuery']));?>
#m">正在热拍</a></li>
        <li<?php if ($_smarty_tpl->tpl_vars['data']->value['status']==@constant('PRE_START')){?> class="dq"<?php }?>><a href="<?php echo url((((((('/auction/lists/').($_smarty_tpl->tpl_vars['data']->value['type'])).('/')).(@constant('PRE_START'))).('/')).($_smarty_tpl->tpl_vars['data']->value['row']['id'])).($_smarty_tpl->tpl_vars['data']->value['urlQuery']));?>
#m">下期预告</a></li>
        <li<?php if ($_smarty_tpl->tpl_vars['data']->value['status']==@constant('FINISHED_ALL')){?> class="dq"<?php }?>> <a href="<?php echo url((((((('/auction/lists/').($_smarty_tpl->tpl_vars['data']->value['type'])).('/')).(@constant('FINISHED_ALL'))).('/')).($_smarty_tpl->tpl_vars['data']->value['row']['id'])).($_smarty_tpl->tpl_vars['data']->value['urlQuery']));?>
#m">历史成交</a></li>
        <li class="other">
            <a href="/content/index/79" _title="为什么只要70%的价格，就可以购买来自京东天猫等商城完全正品？" class="layerTip">【什么是<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
？】</a>
        </li>
    </ul>

    <div class="fn-clear mt20 jp-list mb20">
        <ul class="fn-clear" style="display:block">
            <?php  $_smarty_tpl->tpl_vars['auction'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['auction']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['auction']->key => $_smarty_tpl->tpl_vars['auction']->value){
$_smarty_tpl->tpl_vars['auction']->_loop = true;
?>
            <?php echo $_smarty_tpl->getSubTemplate ("auction/lbi_auction.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <?php }
if (!$_smarty_tpl->tpl_vars['auction']->_loop) {
?>
            <p class="empty" style="border-bottom: 1px solid #e3e3e3">正在上架</p>
            <?php } ?>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['listNo']<4&&$_smarty_tpl->tpl_vars['data']->value['listNo']>0){?>
            <?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int)ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_smarty_tpl->tpl_vars['data']->value['listNo']+1 - (1) : 1-($_smarty_tpl->tpl_vars['data']->value['listNo'])+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0){
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++){
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
            <li class="blank"></li>
            <?php }} ?>
            <?php }?>
        </ul>
    </div>

    <?php echo $_smarty_tpl->getSubTemplate ("public_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <?php if ($_smarty_tpl->tpl_vars['data']->value['love']){?>
    <div class="ceneral-title">
        <h2>猜你喜欢 </h2>
    </div>
    <div class="fn-clear ceneral picScroll-left">
        <div class="bd">
            <ul class="picList">
                <?php  $_smarty_tpl->tpl_vars['auction'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['auction']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['love']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['auction']->key => $_smarty_tpl->tpl_vars['auction']->value){
$_smarty_tpl->tpl_vars['auction']->_loop = true;
?>
                <?php echo $_smarty_tpl->getSubTemplate ("auction/lbi_auction.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <?php } ?>
            </ul>
        </div>
    </div>
    <?php }?>

</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script src="/style/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript">
    jQuery(".txtScroll-top").slide({ mainCell:".bd ul",autoPage:true,interTime:3000,effect:"top",autoPlay:true,vis:1 });
    jQuery(".picScroll-left").slide({ titCell:".hd ul",mainCell:".bd ul",autoPage:true,interTime:6000,effect:"left",autoPlay:true,vis:5,trigger:"click" });

    $('.jp-list li,.picList li').bind('mouseover',function(){
        $(this).addClass('hover');
    }).bind('mouseout',function(){
        $(this).removeClass('hover');
    })
</script><?php }} ?>