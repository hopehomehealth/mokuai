<?php /* Smarty version Smarty-3.1.13, created on 2016-03-11 19:42:31
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\auction\view.html" */ ?>
<?php /*%%SmartyHeaderCode:2521156e2af27f17148-19794148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f4a28e084c188b0f59c2489690e8659ea76a637' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\auction\\view.html',
      1 => 1456367942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2521156e2af27f17148-19794148',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'm' => 0,
    'key' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56e2af285352b5_49146951',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e2af285352b5_49146951')) {function content_56e2af285352b5_49146951($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/artDialog/skins/225.css">
<script src="/style/artDialog/artDialog.js?skin=225'" type="text/javascript"></script>
<script src="/style/jquery.ajaxContent.pack.js" type="text/javascript"></script>
<script src="/style/lefttime.js"></script>
<div id="content" class="container detail">
    <div class="slider" id="single-item">
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
        <?php if ($_smarty_tpl->tpl_vars['m']->value['imgurl_src']&&$_smarty_tpl->tpl_vars['key']->value<5){?>
        <div><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>400,'type'=>0),$_smarty_tpl);?>
" /></div>
        <?php }?>
        <?php } ?>
    </div>

    <div class="info mb10">
        <p class="title"><?php echo $_smarty_tpl->tpl_vars['data']->value['row']['title'];?>
</p>
        <div class="count">
            <i class="ap-icon icon-count"></i>
            剩余：
            <span id="leftTime<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['act_id'];?>
">请稍等, 正在载入中...</span>
            <script type="text/javascript">
                onload_leftTime('<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['act_id'];?>
',"<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['diff_time'];?>
","<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['status'];?>
");
            </script>
        </div>
        <p style="padding-top:10px;"><del>市场价：<?php echo price_format($_smarty_tpl->tpl_vars['data']->value['row']['price']);?>
</del></p>
        <?php if ($_smarty_tpl->tpl_vars['data']->value['row']['desc'][0]){?>
        <p>商品来源：<a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['desc'][1];?>
" class="blue" target="_blank"><?php echo $_smarty_tpl->tpl_vars['data']->value['row']['desc'][0];?>
</a> <span class="gray">（正品保障）</span></p>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['data']->value['row']['amplitude']>0){?>
        <p>加价幅度：<span class="blue"><?php echo price_format($_smarty_tpl->tpl_vars['data']->value['row']['amplitude']);?>
</span></p>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['data']->value['row']['deposit']>0){?>
        <p><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
保证金：<span class="red"><?php echo price_format($_smarty_tpl->tpl_vars['data']->value['row']['deposit']);?>
</span> （<span class="gray"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
结束后退还到您的帐户余额</span>）</p>
        <?php }?>
        <p><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
模式：<span class="red"><?php if ($_smarty_tpl->tpl_vars['data']->value['row']['type']==0){?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
+<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
<?php }?></span> <span class="gray">（<?php if ($_smarty_tpl->tpl_vars['data']->value['row']['type']==0){?>本<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
为<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
模式，只有一次出价机会<?php if ($_smarty_tpl->tpl_vars['data']->value['row']['typenum']>0){?>，参与人数超过<span class="red"><?php echo $_smarty_tpl->tpl_vars['data']->value['row']['typenum'];?>
</span>人，最高出价者将获得商品<?php }?><?php }else{ ?>本<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
最高出价者<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
成功，同时首次出价者还有一次<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
机会<?php }?>）</span></p>
        <p style="display: none;">开奖处理：<span class="gray">工作日每天下午3:00-4:00，系统计算当天14点前所有首次出价结果</span></p>
        <p><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
人数：<?php echo $_smarty_tpl->tpl_vars['data']->value['codCount'];?>
/<?php if ($_smarty_tpl->tpl_vars['data']->value['row']['winnum']<0){?>不限数量<?php }elseif($_smarty_tpl->tpl_vars['data']->value['row']['winnum']>0){?><?php echo $_smarty_tpl->tpl_vars['data']->value['row']['winnum'];?>
<?php }else{ ?>0<?php }?> <span class="gray">（<?php if ($_smarty_tpl->tpl_vars['data']->value['row']['winnum']<0){?>本<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
人数不限数量<?php }elseif($_smarty_tpl->tpl_vars['data']->value['row']['winnum']>0){?>本<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
最大<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
数为前<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['winnum'];?>
位<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
者<?php }else{ ?>本<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
未设置<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
<?php }?>）</span></p>
        <?php if ($_smarty_tpl->tpl_vars['data']->value['row']['painum']>0){?>
        <p><a href="<?php echo url('/content/index/78');?>
"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</a>限额：<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['painum'];?>
 <span class="gray">（若您<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay'];?>
成功或<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
，下单时最多可使用<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
的数量）</span></p>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['data']->value['row']['paib']){?>
        <p>扣除<a href="<?php echo url('/content/index/78');?>
"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</a>：<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['paib'];?>
 <span class="gray">（本商品首次出价即扣相应<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
数，<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
不足则无法出价）</span></p>
        <?php }?>
        <div class="pai">
            <div class="pai-btn">
                <?php if ($_smarty_tpl->tpl_vars['data']->value['row']['current_price']>0){?>
                <span><em id><?php echo $_smarty_tpl->tpl_vars['data']->value['row']['current_price'];?>
</em> ￥</span>
                <?php }else{ ?>
                <span><em><?php echo $_smarty_tpl->tpl_vars['data']->value['row']['paib'];?>
</em> <?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
</span>
                <?php }?>
                <div class="btn-auc">
                    <?php if ($_SESSION['mid']){?>
                    <a href="javascript:;" id="qjA">出价</a>
                    <?php }else{ ?>
                    <a href="<?php echo url('/member/login');?>
">登陆</a>
                    <?php }?>
                </div>
            </div>
            <?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
率：<span class="red"><?php echo $_smarty_tpl->tpl_vars['data']->value['row']['win'];?>
%</span>，已有<span class="red" id="BidCount"><?php echo $_smarty_tpl->tpl_vars['data']->value['row']['bid_user_count'];?>
</span>人参与
        </div>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate ("auction/lbi/qujia.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <div class="detail-bd tab">
        <ul class="detail-nav tab-nav ui-clr">
            <li>商品描述</li>
            <li onclick="mLoad('log')">出价历史</li>
            <li onclick="mLoad('cod')"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
名单</li>
            <li onclick="mLoad('share')">晒单</li>
        </ul>
        <div class="tab-bd">
            <div class="tab-item detail-info">
                <?php echo picurl(stripcslashes($_smarty_tpl->tpl_vars['data']->value['row']['content']));?>

                <?php if ($_smarty_tpl->tpl_vars['data']->value['row']['price']>5000){?>
                <div class="special">重要说明：商品获得者拥有 <?php echo $_smarty_tpl->tpl_vars['data']->value['row']['title'];?>
 10年免费使用权</div>
                <?php }?>
            </div>
            <div class="tab-item">
                <ul class="offer-list offer-win" id="log"></ul>
                <div class="loading getMore_log"></div>
            </div>
            <div class="tab-item">
                <ul class="offer-list offer-win" id="cod"></ul>
                <div class="loading getMore_cod"></div>
            </div>
            <div class="tab-item">
                <div class="shareList" style="padding: 0">
                    <div class="item"></div>
                </div>
                <div class="loading getMore"></div>
            </div>
        </div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/mobile/js/slick.min.js"></script>
<script src="/style/mobile/js/jquery-pageload.js"></script>
<script src="/style/mobile/js/jquery.more.js"></script>
<script>
    $(function(){
        $('#single-item').slick({
            autoplay: true,
            arrows: false,
            dots: true
        });
        tabs(".tab", ".tab-nav li", ".tab-item", "on", "click");
    });

    var isLoad = {
        "log":false,
        "cod":false,
        "share":false
    };

    function mLoad(type){
        if(isLoad[type]==false){
            if(type == 'share'){
                $('.shareList').more({
                    'address': '/content/share_ajax?goods_id=<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['goods_id'];?>
&type=auc',
                    'amount' : 10
                })
            }else{
                $('#'+type).pageload({
                    url: '/auction/ajax_log',
                    param: 'id=<?php echo $_smarty_tpl->tpl_vars['data']->value['row']['act_id'];?>
&status='+type,
                    trigger: '.getMore_'+type
                });
            }
            isLoad[type] = true;
        }
    }
</script><?php }} ?>