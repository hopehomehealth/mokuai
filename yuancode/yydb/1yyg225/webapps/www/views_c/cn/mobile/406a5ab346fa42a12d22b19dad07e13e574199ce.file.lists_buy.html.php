<?php /* Smarty version Smarty-3.1.13, created on 2016-05-24 11:12:41
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\yunbuy\lists_buy.html" */ ?>
<?php /*%%SmartyHeaderCode:267356e76fa87f4358-52727410%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '406a5ab346fa42a12d22b19dad07e13e574199ce' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\yunbuy\\lists_buy.html',
      1 => 1464059541,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '267356e76fa87f4358-52727410',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56e76fa8b97209_29717869',
  'variables' => 
  array (
    'yuncat' => 0,
    'm' => 0,
    'mobilecat' => 0,
    'cid' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e76fa8b97209_29717869')) {function content_56e76fa8b97209_29717869($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<style type="text/css">
    .paiList li .price b{ color: #f60; }
</style>
<div id="content" class="container">
    <?php echo $_smarty_tpl->getSubTemplate ("search.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="sort">
        <ul class="ui-clr">
            <li id="li_cate" class="DESC"><a>全部商品<i class="ap-icon icon-sort"><em></em></i></a>
            </li>
            <li class="li_sort" id="li_count"><a onclick="mLoad('count')">人气</a> </li>
            <li class="li_sort" id="li_new"><a onclick="mLoad('new')">最新</a> </li>
            <li class="li_sort" id="li_end_num"><a onclick="mLoad('custom_price')">价格</a> </li>
            <li class="li_sort" id="li_need_num"><a onclick="mLoad('custom_price')">价格<i class="ap-icon icon-sort"><em></em></i></a></li>
        </ul>
    </div>

    <div class="pro-view">
        <div class="cate-bg"></div>
        <div class="cate">
            <ul class="ui-clr">
                <li><a href="/yunbuy?zq=<?php echo $_GET['zq'];?>
"<?php if (!$_GET['cid']){?> class="on"<?php }?>><i class="ap-icon d0"></i>全部商品</a></li>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['yuncat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['index']++;
?>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['ismenu']==1){?>
                <li><a<?php if ($_GET['cid']==$_smarty_tpl->tpl_vars['m']->value['id']){?> class="on"<?php }?> href="<?php echo url(('/yunbuy/index?cid=').($_smarty_tpl->tpl_vars['m']->value['id']));?>
<?php if ($_GET['zq']){?>&zq=<?php echo $_GET['zq'];?>
<?php }?>"><i class="ap-icon d<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['list']['index']+1;?>
"></i><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
</a></li>
                <?php }?>
                <?php } ?>
				<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mobilecat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['index']++;
?>
                <?php if ($_smarty_tpl->tpl_vars['m']->value['ismenu']==1){?>
                <li><a<?php if ($_GET['cid']==$_smarty_tpl->tpl_vars['m']->value['id']){?> class="on"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['m']->value['url'];?>
"><i class=""></i><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
</a></li>
                <?php }?>
                <?php } ?>
            </ul>
        </div>
        <ul class="paiList list">
            <?php echo $_smarty_tpl->getSubTemplate ("yunbuy/lbi/list_buy.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </ul>
    </div>
    <script type="text/javascript">
        var order = "<?php if ($_GET['order']){?><?php echo $_GET['order'];?>
<?php }else{ ?>count<?php }?>";
        var sort = "<?php if ($_GET['sort']){?><?php echo $_GET['sort'];?>
<?php }else{ ?>DESC<?php }?>";
        var url = "/yunbuy/index";
        var param = "?cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
&order="+order+"&sort="+sort+"&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&zq=<?php echo $_GET['zq'];?>
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
            if(type=='need_num'){ sort=(sort=='ASC')?'DESC':'ASC'; }
            else if(type=='end_num'){ sort='ASC'; }
            else{ sort='DESC'; }
            location.replace(url+(url.indexOf('?')>-1?'&':'?')+'cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
&order='+type+'&sort='+sort+"&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&zq=<?php echo $_GET['zq'];?>
");
        }

        var ExtendOptions = {
            path: function(index) {
                return "/yunbuy/index/"+index+"?cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
&order="+order+"&sort="+sort+"&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&zq=<?php echo $_GET['zq'];?>
&load";
            }
        };
    </script>
    <?php echo $_smarty_tpl->getSubTemplate ("public_scroll.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>