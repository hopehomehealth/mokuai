<?php /* Smarty version Smarty-3.1.13, created on 2015-12-04 14:27:54
         compiled from "F:\WWW\1yyg225\webapps\www\views\cn\mobile\yunbuy\lists.html" */ ?>
<?php /*%%SmartyHeaderCode:9418565d6498ddad88-24340017%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a9af7b06418a9b11d87f7f177b258dbdf96e117' => 
    array (
      0 => 'F:\\WWW\\1yyg225\\webapps\\www\\views\\cn\\mobile\\yunbuy\\lists.html',
      1 => 1449210471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9418565d6498ddad88-24340017',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565d6498ed6541_50245628',
  'variables' => 
  array (
    'type' => 0,
    'cid' => 0,
    'yuncat' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565d6498ed6541_50245628')) {function content_565d6498ed6541_50245628($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="content" class="container">
    <?php echo $_smarty_tpl->getSubTemplate ("nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="sort">
        <ul class="ui-clr">
            <li id="li_cate" class="DESC"><a><?php if ($_smarty_tpl->tpl_vars['type']->value==2){?>免费云购<?php }elseif(isset($_smarty_tpl->tpl_vars['yuncat']->value[$_smarty_tpl->tpl_vars['cid']->value])){?><?php echo $_smarty_tpl->tpl_vars['yuncat']->value[$_smarty_tpl->tpl_vars['cid']->value]['catname'];?>
<?php }else{ ?>全部云购<?php }?><i class="ap-icon icon-sort"><em></em></i></a>
            </li>
            <li class="li_sort" id="li_count"><a onclick="mLoad('count')">人气</a> </li>
            <li class="li_sort" id="li_new"><a onclick="mLoad('new')">最新</a> </li>
            <li class="li_sort" id="li_end_num"><a onclick="mLoad('end_num')">剩余人次</a> </li>
            <li class="li_sort" id="li_need_num"><a onclick="mLoad('need_num')">总需人次<i class="ap-icon icon-sort"><em></em></i></a></li>
        </ul>
    </div>

    <div class="pro-view">
        <div class="cate-bg"></div>
        <div class="cate">
            <ul class="ui-clr">
                <li><a href="<?php echo url('/yunbuy');?>
"<?php if (!$_GET['cid']){?> class="on"<?php }?>><i class="ap-icon d0"></i>全部云购</a></li>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['yuncat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list']['index']++;
?>
                <li><a<?php if ($_GET['cid']==$_smarty_tpl->tpl_vars['m']->value['id']){?> class="on"<?php }?> href="<?php echo url(('/yunbuy/index?cid=').($_smarty_tpl->tpl_vars['m']->value['id']));?>
<?php if ($_GET['zq']){?>&zq=<?php echo $_GET['zq'];?>
<?php }?>"><i class="ap-icon d<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['list']['index']+1;?>
"></i><?php echo $_smarty_tpl->tpl_vars['m']->value['catname'];?>
</a></li>
                <?php } ?>
            </ul>
        </div>
        <ul class="paiList"></ul>
    </div>
    <div class="loading getMore"></div>

</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/mobile/js/jquery-pageload.js"></script>
<script type="text/javascript">
    var order = "<?php if ($_GET['order']){?><?php echo $_GET['order'];?>
<?php }else{ ?>count<?php }?>";
    var sort = "<?php if ($_GET['sort']){?><?php echo $_GET['sort'];?>
<?php }else{ ?>ASC<?php }?>";
    var url = "/yunbuy/index";
    var param = "cid=<?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
&order="+order+"&sort="+sort+"&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
&zq=<?php echo $_GET['zq'];?>
";

    $(function(){
        $('.sort li.li_sort').removeClass('on DESC ASC');
        $('.sort #li_'+order).addClass('on '+sort);
        $('.paiList').pageload({ url: url, param: param });

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
</script>
<?php }} ?>