<?php /* Smarty version Smarty-3.1.13, created on 2016-12-11 23:18:29
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/minfo/index.html" */ ?>
<?php /*%%SmartyHeaderCode:2102681497584d6e45983861-51479588%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67a818f0ac16a693c8891a7f67258c9b3ba99651' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/minfo/index.html',
      1 => 1481178229,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2102681497584d6e45983861-51479588',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'member' => 0,
    'isfri' => 0,
    'L' => 0,
    'data' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_584d6e45a46b88_39044149',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584d6e45a46b88_39044149')) {function content_584d6e45a46b88_39044149($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/minfo.css');?>
">
<script src="<?php echo url('/style/jquery.ajaxContent.pack.js');?>
" type="text/javascript"></script>
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="space">
    <div class="shead">
        <div class="mpic"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['member']->value['photo'],'nopic'=>'/upload/photo.jpg'),$_smarty_tpl);?>
" /><i></i></div>
        <dl class="sinfo">
            <dt><?php echo nickname($_smarty_tpl->tpl_vars['member']->value['username'],$_smarty_tpl->tpl_vars['member']->value['nickname']);?>
（ID:<?php echo sprintf('1%06d',$_smarty_tpl->tpl_vars['member']->value['mid']);?>
）</dt>
            <dd>
                <p class="p_01">
                    <span class="s_01"><?php echo cityIp($_smarty_tpl->tpl_vars['member']->value['ip']);?>
</span>
                    <span class="s_02"><?php echo url();?>
minfo?id=<?php echo $_smarty_tpl->tpl_vars['member']->value['mid'];?>
</span>
                </p>
                <p>经验值：<span><?php echo $_smarty_tpl->tpl_vars['member']->value['rank_points'];?>
</span> <span><?php echo $_smarty_tpl->tpl_vars['member']->value['member_rank'];?>
</span></p>
                <p><?php echo $_smarty_tpl->tpl_vars['member']->value['intro'];?>
</p>
            </dd>
        </dl>
        <div class="shr">
            <?php if ($_SESSION['mid']!=$_smarty_tpl->tpl_vars['member']->value['mid']){?>
            <div class="sbtn">
                <a href="<?php echo ('/member/message?mid=').($_GET['id']);?>
" target="_blank" class="ab sbtn_msg"><i>发私信</i></a>
                <span></span>
                <?php if ($_smarty_tpl->tpl_vars['isfri']->value>0){?>
                <a href="javascript:;" onclick="addFri('<?php echo $_smarty_tpl->tpl_vars['member']->value['mid'];?>
')" class="ab sbtn_fri" id="Fri"><i>解除好友</i></a>
                <?php }else{ ?>
                <a href="javascript:;" onclick="addFri('<?php echo $_smarty_tpl->tpl_vars['member']->value['mid'];?>
')" class="ab sbtn_fri" id="Fri"><i>加好友</i></a>
                <?php }?>
            </div>
            <?php }?>
        </div>
        <div class="snav">
            <ul>
                <li class="li_db hover" onclick="mLoad('db')"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
记录</li>
                <li class="li_dbCod" onclick="mLoad('dbCod')"><?php echo $_smarty_tpl->tpl_vars['L']->value['unit_yun'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_winning'];?>
</li>
                <li class="li_share" onclick="mLoad('share')">晒单</li>
                <li class="li_fri" onclick="mLoad('fri')">好友</li>
            </ul>
        </div>
    </div>
    <div class="sleft">
        <div class="svisit">
            <h4><strong>近期访客</strong></h4>
            <div class="c fn-clear">
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['visit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <dl>
                    <dt class="spic"><a href="<?php echo ('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']);?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['m']->value['photo'],'size'=>'80','nopic'=>'/upload/default.gif'),$_smarty_tpl);?>
" /></a><i></i></dt>
                    <dd><a href="<?php echo ('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']);?>
"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a><br><span><?php echo formatTime($_smarty_tpl->tpl_vars['m']->value['lasttime']);?>
</span></dd>
                </dl>
                <?php }
if (!$_smarty_tpl->tpl_vars['m']->_loop) {
?>
                <div class="sempty">暂无访客记录！</div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="sright">
        <div class="load" id="load_db"></div>
        <div class="load" id="load_dbCod"></div>
        <div class="load" id="load_auc"></div>
        <div class="load" id="load_aucCod"></div>
        <div class="load" id="load_share"></div>
        <div class="load" id="load_fri"></div>

        <div class="load" id="load_db_vid"></div>
        <div class="load" id="load_share_vid"></div>
    </div>
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
        "fri":false
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
            $(loadDiv).html("拼命加载中...").load('/minfo/load_'+type+'/'+mid+info,function(){
                scrollLoading();
                itemhover();
            });
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
</script>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>