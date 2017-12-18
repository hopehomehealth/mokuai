<?php /* Smarty version Smarty-3.1.13, created on 2016-12-19 16:35:49
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/minfo/index.html" */ ?>
<?php /*%%SmartyHeaderCode:58336600658579be5a80521-90320349%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfa02dcd963856e2de0c435f61500c10bd168052' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/minfo/index.html',
      1 => 1456367944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58336600658579be5a80521-90320349',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'member' => 0,
    'isfri' => 0,
    'L' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58579be5b51622_20687355',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58579be5b51622_20687355')) {function content_58579be5b51622_20687355($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="<?php echo url('/style/jquery.ajaxContent.pack.js');?>
" type="text/javascript"></script>
<link rel="stylesheet" href="/style/mobile/css/member.css">
<link rel="stylesheet" href="/style/mobile/css/minfo.css">
<div id="content" class="container main space">
    <div class="shead">
        <div class="mpic"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['member']->value['photo'],'nopic'=>'/upload/photo.jpg'),$_smarty_tpl);?>
" width="100" height="100" /><i></i></div>
        <dl class="sinfo">
            <dt><?php echo nickname($_smarty_tpl->tpl_vars['member']->value['username'],$_smarty_tpl->tpl_vars['member']->value['nickname']);?>
</dt>
            <dd>
                <?php if ($_smarty_tpl->tpl_vars['member']->value['intro']){?><p><?php echo $_smarty_tpl->tpl_vars['member']->value['intro'];?>
</p><?php }?>
                <p><b>ID：<?php echo sprintf('1%06d',$_smarty_tpl->tpl_vars['member']->value['mid']);?>
 <?php echo cityIp($_smarty_tpl->tpl_vars['member']->value['ip']);?>
</b></p>
                <p><?php echo @constant('RootUrl');?>
minfo?id=<?php echo $_smarty_tpl->tpl_vars['member']->value['mid'];?>
</p>
                <p><b style="font-size:1.8rem;">经验值：<span><?php echo $_smarty_tpl->tpl_vars['member']->value['rank_points'];?>
</span> <span><?php echo $_smarty_tpl->tpl_vars['member']->value['member_rank'];?>
</span></b></p>
                <p>还差<?php echo $_smarty_tpl->tpl_vars['member']->value['level_upgrade'];?>
经验值即可升级到<?php echo $_smarty_tpl->tpl_vars['member']->value['level_upgrade_name'];?>
</p>
            </dd>
        </dl>
        <div class="shr">
            <?php if ($_SESSION['mid']!=$_smarty_tpl->tpl_vars['member']->value['mid']){?>
            <div class="sbtn">
                <?php if ($_smarty_tpl->tpl_vars['isfri']->value>0){?>
                <a href="javascript:;" onclick="addFri('<?php echo $_smarty_tpl->tpl_vars['member']->value['mid'];?>
')" id="Fri" class="at">解除好友</a>
                <?php }else{ ?>
                <a href="javascript:;" onclick="addFri('<?php echo $_smarty_tpl->tpl_vars['member']->value['mid'];?>
')" class="ab sbtn_fri" id="Fri"><span>加好友</span></a>
                <?php }?>
                <span></span>
                <a href="<?php echo ('/member/message?mid=').($_GET['id']);?>
" class="ab sbtn_msg"><span>发私信</span></a>
            </div>
            <?php }?>
        </div>
    </div>

    <div class="snav">
        <ul class="ui-clr">
            <li class="li_db hover" onclick="mLoad('db')"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
记录</li>
            <li class="li_dbCod" onclick="mLoad('dbCod')"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
</li>
            <li class="li_share" onclick="mLoad('share')">晒单</li>
            <li class="li_fri" onclick="mLoad('fri')">好友</li>
            <li class="li_visit" onclick="mLoad('visit')">访客</li>
        </ul>
    </div>

    <div class="load" id="load_db"></div>
    <div class="load" id="load_dbCod"></div>
    <div class="load" id="load_auc"></div>
    <div class="load" id="load_aucCod"></div>
    <div class="load" id="load_share"></div>
    <div class="load" id="load_fri"></div>
    <div class="load" id="load_visit"></div>

    <div class="load" id="load_db_vid"></div>
    <div class="load" id="load_share_vid"></div>

</div>
<script type="text/javascript">
    var hash = 'db';
    var mid = "<?php if ($_smarty_tpl->tpl_vars['member']->value['mid']){?><?php echo $_smarty_tpl->tpl_vars['member']->value['mid'];?>
<?php }else{ ?>0<?php }?>";
    var isLoad = {
        "db":false,
        "dbCod":false,
        "auc":false,
        "aucCod":false,
        "share":false,
        "fri":false,
        "visit":false
    };

    if(location.hash){ hash = location.hash.substr(1); }
    mLoad(hash);

    function mLoad(hash, load){
        var arr=hash.split("#");
        var type = arr[0];

        var loadDiv = '#load_'+type;

        $('.snav li').removeClass('hover');
        $('.li_'+type).addClass('hover');
        $('.load').hide();

        var info = '';
        if(arr[1] != undefined){
            var arr2=arr[1].split("=");
            info = '?'+arr[1];
            loadDiv += '_'+arr2[0];
        }
        $(loadDiv).show();

        load=load?load:false;
        if('#load_'+type != loadDiv || isLoad[type] == false || load==true){
            $(loadDiv).html("拼命加载中...").load('/minfo/load_'+type+'/'+mid+info);
            if('#load_'+type == loadDiv) isLoad[type] = true;
        }

        location.href='minfo?id='+mid+'#'+hash;
    }

    //添加/解除好友
    function addFri(id){
        var D = { id:id };
        $.post('/minfo/addFri',D,function(data){
            if(data.error <= 0){
                location.reload();
            }else{
                var params = ' ';
                if(data.url){
                    params = function(){
                        location.href=data.url;
                    };
                }
                if(data.msg){ layer.alert(data.msg,8,params); }
            }
        },"json");
    }
</script><?php }} ?>