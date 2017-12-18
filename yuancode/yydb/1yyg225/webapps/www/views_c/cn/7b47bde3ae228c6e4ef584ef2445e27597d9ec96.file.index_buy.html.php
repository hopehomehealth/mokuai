<?php /* Smarty version Smarty-3.1.13, created on 2016-12-08 23:26:09
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/index_buy.html" */ ?>
<?php /*%%SmartyHeaderCode:9111258085847527ccf2327-92481083%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b47bde3ae228c6e4ef584ef2445e27597d9ec96' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/yunbuy/index_buy.html',
      1 => 1481177938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9111258085847527ccf2327-92481083',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5847527ce21dd0_09970977',
  'variables' => 
  array (
    'ad' => 0,
    'tagAdw' => 0,
    'tagAds' => 0,
    'm' => 0,
    'yuncat' => 0,
    'cid_one' => 0,
    'brand' => 0,
    'cid' => 0,
    'bid' => 0,
    'list' => 0,
    'listNo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5847527ce21dd0_09970977')) {function content_5847527ce21dd0_09970977($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/yiyuanbao.css');?>
">
<style type="text/css">
    .w-quickBuyList-item{ height: 315px; }
    .m-list-goodsList .w-goods-opr-buy{ margin:0; }
    .w-goods-ing .w-goods-price b{ color: #f60; }
</style>
<?php if ($_smarty_tpl->tpl_vars['ad']->value['ad_mark']){?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'content','var'=>'tagAdw','module'=>'ad','type'=>'row','where'=>(("mark='").($_smarty_tpl->tpl_vars['ad']->value['ad_mark'])).("'")),$_smarty_tpl);?>

<?php }?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','var'=>'tagAds','source'=>$_smarty_tpl->tpl_vars['tagAdw']->value['images'],'num'=>2),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['tagAds']->value){?>
<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tagAds']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
<div class="g-gg" style="margin-bottom:20px;height:<?php echo $_smarty_tpl->tpl_vars['tagAdw']->value['height'];?>
px;background:<?php echo $_smarty_tpl->tpl_vars['tagAdw']->value['bgcolor'];?>
 url('<?php echo $_smarty_tpl->tpl_vars['m']->value['path'];?>
') no-repeat center bottom"><span></span></div>
<?php } ?>
<?php }else{ ?><?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }?>
<div class="g-wrap g-body">
<div class="m-list">
<div class="g-body-hd f-clear">
    <div class="m-list-classification">
        <div class="m-classification">
            <div class="m-classi">分类</div>
            <div class="m-fication">
                <ul>
                    <li <?php if (!$_GET['cid']){?>class="current"<?php }?>><a href="<?php echo url('/yunbuy');?>
<?php if ($_GET['zq']){?>?zq=<?php echo $_GET['zq'];?>
<?php }?>">全部</a></li>
                    <?php if (isset($_smarty_tpl->tpl_vars['cid_one'])) {$_smarty_tpl->tpl_vars['cid_one'] = clone $_smarty_tpl->tpl_vars['cid_one'];
$_smarty_tpl->tpl_vars['cid_one']->value = 0; $_smarty_tpl->tpl_vars['cid_one']->nocache = null; $_smarty_tpl->tpl_vars['cid_one']->scope = 0;
} else $_smarty_tpl->tpl_vars['cid_one'] = new Smarty_variable(0, null, 0);?>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['yuncat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['parentid']==0&&$_smarty_tpl->tpl_vars['m']->value['id']==$_GET['cid']){?><?php if (isset($_smarty_tpl->tpl_vars['cid_one'])) {$_smarty_tpl->tpl_vars['cid_one'] = clone $_smarty_tpl->tpl_vars['cid_one'];
$_smarty_tpl->tpl_vars['cid_one']->value = $_smarty_tpl->tpl_vars['m']->value['id']; $_smarty_tpl->tpl_vars['cid_one']->nocache = null; $_smarty_tpl->tpl_vars['cid_one']->scope = 0;
} else $_smarty_tpl->tpl_vars['cid_one'] = new Smarty_variable($_smarty_tpl->tpl_vars['m']->value['id'], null, 0);?>
                    <?php }elseif($_smarty_tpl->tpl_vars['m']->value['parentid']!=0&&$_smarty_tpl->tpl_vars['m']->value['id']==$_GET['cid']){?><?php if (isset($_smarty_tpl->tpl_vars['cid_one'])) {$_smarty_tpl->tpl_vars['cid_one'] = clone $_smarty_tpl->tpl_vars['cid_one'];
$_smarty_tpl->tpl_vars['cid_one']->value = $_smarty_tpl->tpl_vars['m']->value['parentid']; $_smarty_tpl->tpl_vars['cid_one']->nocache = null; $_smarty_tpl->tpl_vars['cid_one']->scope = 0;
} else $_smarty_tpl->tpl_vars['cid_one'] = new Smarty_variable($_smarty_tpl->tpl_vars['m']->value['parentid'], null, 0);?><?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['ismenu']==1&&$_smarty_tpl->tpl_vars['m']->value['parentid']==0){?>
                    <li id="cat_<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><a href="<?php echo url('/yunbuy');?>
?cid=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
<?php if ($_GET['zq']){?>&zq=<?php echo $_GET['zq'];?>
<?php }?>" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
</a></li>
                    <?php }?>
                    <?php } ?>
                </ul>
                <a href="javascript:;" class="expansion"></a>
            </div>
        </div>

        <?php if ($_smarty_tpl->tpl_vars['cid_one']->value){?>
        <div class="m-classification" id="dd_sub" style="display: none;">
            <div class="m-classi">子分类</div>
            <div class="m-fication">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['yuncat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['m']->value['ismenu']==1&&$_smarty_tpl->tpl_vars['m']->value['parentid']==$_smarty_tpl->tpl_vars['cid_one']->value){?>
                    <li class="<?php if ($_GET['cid']==$_smarty_tpl->tpl_vars['m']->value['id']){?>current<?php }?>"><a href="<?php echo url('/yunbuy');?>
?cid=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
<?php if ($_GET['zq']){?>&zq=<?php echo $_GET['zq'];?>
<?php }?>"><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
</a></li>
                    <script type="text/javascript">
                        $(function(){
                            var dd = $('#dd_sub');
                            if(dd.is(':hidden')){ dd.show(); }
                        })
                    </script>
                    <?php }?>
                    <?php } ?>
                    <script type="text/javascript">
                        $(function(){
                            $('#cat_<?php echo $_smarty_tpl->tpl_vars['cid_one']->value;?>
').addClass('current');
                        })
                    </script>
                </ul>
            </div>
        </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['brand']->value){?>
        <div id="dlBrandBox" class="m-classification">
            <div class="m-classi">品牌</div>
            <div class="m-fication">
                <ul id="ulBrandList">
                    <li <?php if (!$_GET['bid']){?>class="current"<?php }?>><a href="<?php echo url('/yunbuy');?>
?cid=<?php echo $_GET['cid'];?>
<?php if ($_GET['zq']){?>&zq=<?php echo $_GET['zq'];?>
<?php }?>" title="全部">全部</a></li>
                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brand']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                    <li <?php if ($_GET['bid']==$_smarty_tpl->tpl_vars['m']->value['id']){?>class="current"<?php }?>><a href="<?php echo url('/yunbuy');?>
?bid=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
&cid=<?php echo $_GET['cid'];?>
<?php if ($_GET['zq']){?>&zq=<?php echo $_GET['zq'];?>
<?php }?>" title="<?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
</a></li>
                    <?php } ?>
                </ul>
                <div class="one_more">
                    <a href="javascript:;" class="om1">展开<i></i></a>
                    <a href="javascript:;" class="om2">收起<i></i></a>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
</div>
<div class="g-wrap g-body-bd f-clear">
<div class="m-list-mod m-list-goodsList" style="overflow: hidden">
<div class="m-list-mod-hd">
    <h6>排序：</h6>
    <ul class="m-list-sortList">
        <li <?php if ($_GET['k']=='goods_click'){?>class="selected"<?php }?>>
        <a href="<?php echo url('/yunbuy/');?>
?cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
&bid=<?php echo $_smarty_tpl->tpl_vars['bid']->value;?>
&k=goods_click<?php if ($_GET['zq']){?>&zq=<?php echo $_GET['zq'];?>
<?php }?>">人气</a>
        </li>
        <li <?php if ($_GET['k']=='add_time'){?>class="selected"<?php }?>><a href="<?php echo url('/yunbuy/');?>
?cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
&bid=<?php echo $_smarty_tpl->tpl_vars['bid']->value;?>
&k=add_time<?php if ($_GET['zq']){?>&zq=<?php echo $_GET['zq'];?>
<?php }?>">最新</a>
        </li>
        <li <?php if ($_GET['k']=='custom_price'&&$_GET['s']=='desc'){?>class="selected"<?php }?>><a href="<?php echo url('/yunbuy/');?>
?cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
&bid=<?php echo $_smarty_tpl->tpl_vars['bid']->value;?>
&k=custom_price&s=desc<?php if ($_GET['zq']){?>&zq=<?php echo $_GET['zq'];?>
<?php }?>">价格<i class="ico ico-arrow-sort ico-arrow-sort-gray-down" title="降序"></i></a>
        </li>
        <li <?php if ($_GET['k']=='custom_price'&&$_GET['s']=='asc'){?>class="selected"<?php }?>><a href="<?php echo url('/yunbuy/');?>
?cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
&bid=<?php echo $_smarty_tpl->tpl_vars['bid']->value;?>
&k=custom_price&s=asc<?php if ($_GET['zq']){?>&zq=<?php echo $_GET['zq'];?>
<?php }?>">价格<i class="ico ico-arrow-sort ico-arrow-sort-gray-up" title="升序"></i></a>
        </li>
    </ul>
</div>
<div class="m-list-mod-bd">
<ul class="w-quickBuyList f-clear">
    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
    <?php echo $_smarty_tpl->getSubTemplate ("yunbuy/lbi_yunbuy_buy.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php }
if (!$_smarty_tpl->tpl_vars['m']->_loop) {
?>
    <p class="empty">产品正在上架</p>
    <?php } ?>
    <?php if ($_smarty_tpl->tpl_vars['listNo']->value<4&&$_smarty_tpl->tpl_vars['listNo']->value>0){?>
    <?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int)ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? $_smarty_tpl->tpl_vars['listNo']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['listNo']->value)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0){
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++){
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?>
    <li class="w-quickBuyList-item blank"></li>
    <?php }} ?>
    <?php }?>
</ul>
</div>
</div>
<div class="m-list-pager">
    <?php echo $_smarty_tpl->getSubTemplate ("public_page.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
</div>
</div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
    $('.w-quickBuyList-item').bind('mouseover',function(){
        $(this).addClass('hover');
    }).bind('mouseout',function(){
        $(this).removeClass('hover');
    });
    $(function(){
        if($('#ulBrandList').height() <= '56'){
            $('.one_more').hide();
        }
    })
    $('.one_more .om1').click(function(){
        $('#dlBrandBox').css('height','auto');
        $(this).hide();
        $('.one_more .om2').show();
    })
    $('.one_more .om2').click(function(){
        $('#dlBrandBox').css('height','74px');
        $(this).hide();
        $('.one_more .om1').show();
    })
</script><?php }} ?>