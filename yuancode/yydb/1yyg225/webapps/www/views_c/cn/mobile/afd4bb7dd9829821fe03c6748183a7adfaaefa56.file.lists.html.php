<?php /* Smarty version Smarty-3.1.13, created on 2016-12-21 20:19:23
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/auction/lists.html" */ ?>
<?php /*%%SmartyHeaderCode:494818288585a734baffe72-80866197%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afd4bb7dd9829821fe03c6748183a7adfaaefa56' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/auction/lists.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '494818288585a734baffe72-80866197',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_585a734bb839e9_09893541',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_585a734bb839e9_09893541')) {function content_585a734bb839e9_09893541($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/lefttime.js"></script>
<div class="container">
    <?php echo $_smarty_tpl->getSubTemplate ("nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="sort">
        <ul class="ui-clr">
            <li id="li_cate" class="DESC"><a><?php echo $_smarty_tpl->tpl_vars['data']->value['top']['title'];?>
<i class="ap-icon icon-sort"><em></em></i></a></li>
            <li class="li_sort" id="li_default"><a onclick="mLoad('default')">剩余</a> </li>
            <li class="li_sort" id="li_count"><a onclick="mLoad('count')">人气</a></li>
            <li class="li_sort" id="li_new"><a onclick="mLoad('new')">最新</a></li>
            <li class="li_sort" id="li_price"><a onclick="mLoad('price')">价值<i class="ap-icon icon-sort"><em></em></i></a> </li>
        </ul>
    </div>

    <div class="pro-view">
        <div class="cate-bg"></div>
        <div class="cate">
            <ul class="ui-clr">
                <li><a<?php if ($_smarty_tpl->tpl_vars['data']->value['type']=='kaquan'){?> class="on"<?php }?> href="<?php echo url('/auction/lists/kaquan');?>
"><i class="ap-icon c1"></i>卡券拍</a></li>
                <li><a<?php if ($_smarty_tpl->tpl_vars['data']->value['type']=='jingpin'){?> class="on"<?php }?> href="<?php echo url('/auction/lists/jingpin');?>
"><i class="ap-icon c2"></i>精品拍</a></li>
                <li><a<?php if ($_smarty_tpl->tpl_vars['data']->value['type']=='tiyan'){?> class="on"<?php }?> href="<?php echo url('/auction/lists/tiyan');?>
"><i class="ap-icon c3"></i>体验拍</a></li>
            </ul>
        </div>
        <ul class="goodList"></ul>
    </div>
    <a class="loading getMore"></a>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/mobile/js/jquery-pageload.js"></script>
<script type="text/javascript">
    var order = "<?php if ($_GET['order']){?><?php echo $_GET['order'];?>
<?php }else{ ?>default<?php }?>";
    var sort = "<?php if ($_GET['sort']){?><?php echo $_GET['sort'];?>
<?php }else{ ?>ASC<?php }?>";
    var url = "/auction/lists/<?php echo $_smarty_tpl->tpl_vars['data']->value['type'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['status'];?>
/<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
";
    var param = "order="+order+"&sort="+sort;

    $(function(){
        $('.sort li.li_sort').removeClass('on DESC ASC');
        $('.sort #li_'+order).addClass('on '+sort);
        $('.goodList').pageload({ url: url, param: param });

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
        if(type=='price'){ sort=(sort=='ASC')?'DESC':'ASC'; }
        else if(type=='default'){ sort='ASC'; }
        else{ sort='DESC'; }
        location.replace(url+(url.indexOf('?')>-1?'&':'?')+'order='+type+'&sort='+sort);
    }
</script><?php }} ?>