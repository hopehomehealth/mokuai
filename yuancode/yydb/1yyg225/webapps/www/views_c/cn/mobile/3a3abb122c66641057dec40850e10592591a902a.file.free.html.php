<?php /* Smarty version Smarty-3.1.13, created on 2016-02-26 20:26:53
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\yunbuy\free.html" */ ?>
<?php /*%%SmartyHeaderCode:2843656d0448d6e78a2-44470705%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a3abb122c66641057dec40850e10592591a902a' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\yunbuy\\free.html',
      1 => 1456367942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2843656d0448d6e78a2-44470705',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'L' => 0,
    'yuncat' => 0,
    'm' => 0,
    'cid' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56d0448d894fe0_39634051',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d0448d894fe0_39634051')) {function content_56d0448d894fe0_39634051($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="content" class="container">
    <?php echo $_smarty_tpl->getSubTemplate ("nav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="pro-view">
        <div class="cate-bg"></div>
        <div class="cate">
            <ul class="ui-clr">
                <li><a href="<?php echo url('/yunbuy');?>
"<?php if (!$_GET['cid']){?> class="on"<?php }?>><i class="ap-icon d0"></i>全部<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
</a></li>
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
&order="+order+"&sort="+sort+"&type=2&zq=<?php echo $_GET['zq'];?>
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