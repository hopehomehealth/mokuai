<?php /* Smarty version Smarty-3.1.13, created on 2016-12-11 10:46:53
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/store/index.html" */ ?>
<?php /*%%SmartyHeaderCode:243503662584cbe1d163b37-24737039%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ca88498354766a08f159f37a292e8a9ca7b64d3' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/store/index.html',
      1 => 1481177938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '243503662584cbe1d163b37-24737039',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'business_row' => 0,
    'member' => 0,
    'data' => 0,
    'site_config' => 0,
    'L' => 0,
    'yuncat' => 0,
    'm' => 0,
    'template_lbi' => 0,
    'cid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584cbe1d22ca16_18637046',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584cbe1d22ca16_18637046')) {function content_584cbe1d22ca16_18637046($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/css/business.css">
<div class="bus_top">
    <a href="javascript:;" onclick="_system._guide(true)" class="bus_share">邀请小伙伴一起</a>
    <dl>
        <dt><a href="/minfo?id=<?php echo $_smarty_tpl->tpl_vars['business_row']->value['mid'];?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['member']->value['photo'],'size'=>'80'),$_smarty_tpl);?>
" /></a></dt>
        <dd>
            <h3><?php echo $_smarty_tpl->tpl_vars['business_row']->value['bus_name'];?>
</h3>
            <p><?php if ($_smarty_tpl->tpl_vars['member']->value['nickname']){?>昵称<?php }else{ ?>会员名<?php }?>：<?php echo nickname($_smarty_tpl->tpl_vars['member']->value['username'],$_smarty_tpl->tpl_vars['member']->value['nickname']);?>
</p>
        </dd>
    </dl>
</div>

<div class="bus_body">
    <div class="sort">
        <ul class="ui-clr">
            <li id="li_cate" class="DESC"><a><?php echo $_smarty_tpl->tpl_vars['data']->value['cate_name'];?>
<i class="ap-icon icon-sort"><em></em></i></a></li>
            <?php if ($_GET['zq']=='buy'){?>
            <li class="li_sort" id="li_new"><a onclick="mLoad('new')">最新</a> </li>
            <li class="li_sort" id="li_price"><a onclick="mLoad('price')">价格<i class="ap-icon icon-sort"><em></em></i></a></li>
            <?php }else{ ?>
            <li class="li_sort" id="li_ratio"><a onclick="mLoad('ratio')">人气</a> </li>
            <li class="li_sort" id="li_new"><a onclick="mLoad('new')">最新</a> </li>
            <li class="li_sort" id="li_end_num"><a onclick="mLoad('end_num')">剩余人次</a> </li>
            <li class="li_sort" id="li_need_num"><a onclick="mLoad('need_num')">总需人次<i class="ap-icon icon-sort"><em></em></i></a></li>
            <?php }?>
        </ul>
    </div>

    <div class="pro-view">
        <div class="cate-bg"></div>
        <div class="cate">
            <ul class="ui-clr">
                <?php if ($_smarty_tpl->tpl_vars['site_config']->value['index_skin']==2){?><?php }else{ ?>
                <li><a href="/store/index/<?php echo $_smarty_tpl->tpl_vars['business_row']->value['mid'];?>
"<?php if (!$_GET['cid']&&!$_GET['zq']){?> class="on"<?php }?>><i class="ap-icon d0"></i><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
商品</a></li>
                <?php }?>
                <li><a href="/store/index/<?php echo $_smarty_tpl->tpl_vars['business_row']->value['mid'];?>
?zq=buy"<?php if (!$_GET['cid']&&$_GET['zq']=='buy'){?> class="on"<?php }?>><i class="ap-icon d0"></i><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_go_buy'];?>
商品</a></li>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['yuncat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['index']++;
?>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['ismenu']==1&&$_smarty_tpl->tpl_vars['m']->value['parentid']==0){?>
                <li><a<?php if ($_GET['cid']==$_smarty_tpl->tpl_vars['m']->value['id']){?> class="on"<?php }?> href="/store/index/<?php echo $_smarty_tpl->tpl_vars['business_row']->value['mid'];?>
?cid=<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
&zq=<?php echo $_GET['zq'];?>
"><i class="ap-icon d<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['list']['index']+1;?>
"></i><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
</a></li>
                <?php }?>
                <?php } ?>
            </ul>
        </div>
        <ul class="paiList list">
            <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['template_lbi']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </ul>
    </div>
    <script type="text/javascript">
        var order = "<?php if ($_GET['order']){?><?php echo $_GET['order'];?>
<?php }else{ ?><?php if ($_GET['zq']=='buy'){?>new<?php }else{ ?>ratio<?php }?><?php }?>";
        var sort = "<?php if ($_GET['sort']){?><?php echo $_GET['sort'];?>
<?php }else{ ?><?php }?>";
        var url = "/store/index/<?php echo $_smarty_tpl->tpl_vars['business_row']->value['mid'];?>
";
        var param = "?cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
&order="+order+"&sort="+sort+"&zq=<?php echo $_GET['zq'];?>
&load";

        $(function(){
            $('.sort li.li_sort').removeClass('on DESC ASC');
            $('.sort #li_'+order).addClass('on '+sort);

            $('#li_cate').bind('click',function(){
                if($(this).hasClass('DESC')){
                    $(this).removeClass('DESC').addClass('ASC');
                }else{
                    $(this).removeClass('ASC').addClass('DESC');
                }
                $('.cate-bg,.cate').toggle();
            })
        });

        function mLoad(type){
            if(type=='need_num'||type=='price'){ sort=(sort=='ASC')?'DESC':'ASC'; }
            else if(type=='end_num'){ sort='ASC'; }
            else{ sort='DESC'; }
            location.replace(url+(url.indexOf('?')>-1?'&':'?')+'cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
&order='+type+'&sort='+sort+"&zq=<?php echo $_GET['zq'];?>
");
        }

        var ExtendOptions = {
            path: function(index) {
                return "/store/index/<?php echo $_smarty_tpl->tpl_vars['business_row']->value['mid'];?>
/"+index+"?cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
&order="+order+"&sort="+sort+"&zq=<?php echo $_GET['zq'];?>
&load";
            }
        };
    </script>
    <?php echo $_smarty_tpl->getSubTemplate ("public_scroll.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<?php echo $_smarty_tpl->getSubTemplate ("public_share.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>