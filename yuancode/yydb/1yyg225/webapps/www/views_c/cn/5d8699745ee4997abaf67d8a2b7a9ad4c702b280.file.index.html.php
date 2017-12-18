<?php /* Smarty version Smarty-3.1.13, created on 2016-03-14 18:28:23
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\minfo\index.html" */ ?>
<?php /*%%SmartyHeaderCode:29965660f75845e4d2-57214783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d8699745ee4997abaf67d8a2b7a9ad4c702b280' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\minfo\\index.html',
      1 => 1457944798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29965660f75845e4d2-57214783',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5660f7586ecf47_74703368',
  'variables' => 
  array (
    'member' => 0,
    'isfri' => 0,
    'L' => 0,
    'data' => 0,
    'm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5660f7586ecf47_74703368')) {function content_5660f7586ecf47_74703368($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
</dt>
            <dd>
                <?php if ($_smarty_tpl->tpl_vars['member']->value['intro']){?><?php echo $_smarty_tpl->tpl_vars['member']->value['intro'];?>
<br><?php }?>
                ID：<?php echo sprintf('1%06d',$_smarty_tpl->tpl_vars['member']->value['mid']);?>
 <?php echo cityIp($_smarty_tpl->tpl_vars['member']->value['ip']);?>

            </dd>
        </dl>
        <div class="shr">
            <?php if ($_SESSION['mid']!=$_smarty_tpl->tpl_vars['member']->value['mid']){?>
            <div class="sbtn">
                <?php if ($_smarty_tpl->tpl_vars['isfri']->value>0){?>
                <a href="javascript:;" onclick="addFri('<?php echo $_smarty_tpl->tpl_vars['member']->value['mid'];?>
')" id="Fri">解除好友</a>
                <?php }else{ ?>
                <a href="javascript:;" onclick="addFri('<?php echo $_smarty_tpl->tpl_vars['member']->value['mid'];?>
')" class="ab sbtn_fri" id="Fri"><i>加好友</i></a>
                <?php }?>
                <span></span>
                <a href="<?php echo ('/member/message?mid=').($_GET['id']);?>
" target="_blank" class="ab sbtn_msg"><i>发私信</i></a>
            </div>
            <?php }?>
            <div class="sinfo2">
                <p><?php echo @constant('RootUrl');?>
minfo?id=<?php echo $_smarty_tpl->tpl_vars['member']->value['mid'];?>
</p>
                <p>经验值：<span><?php echo $_smarty_tpl->tpl_vars['member']->value['rank_points'];?>
</span> <span><?php echo $_smarty_tpl->tpl_vars['member']->value['member_rank'];?>
</span> (还差<?php echo $_smarty_tpl->tpl_vars['member']->value['level_upgrade'];?>
经验值即可升级到<?php echo $_smarty_tpl->tpl_vars['member']->value['level_upgrade_name'];?>
)</p>
            </div>
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
        <div class="sfri">
            <h4><strong>TA的好友</strong><a href="javascript:;" onclick="mLoad('fri')">共<?php echo $_smarty_tpl->tpl_vars['data']->value['fri_count'];?>
个<i>></i></a></h4>
            <div class="c fn-clear">
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['fri']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>
                <dl>
                    <dt class="spic"><a href="<?php echo ('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']);?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['m']->value['photo'],'size'=>'80','nopic'=>'/upload/default.gif'),$_smarty_tpl);?>
" /></a><i></i></dt>
                    <dd><a href="<?php echo ('/minfo?id=').($_smarty_tpl->tpl_vars['m']->value['mid']);?>
"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</a></dd>
                </dl>
                <?php }
if (!$_smarty_tpl->tpl_vars['m']->_loop) {
?>
                <div class="sempty">暂无好友关注！</div>
                <?php } ?>
            </div>
        </div>
        <div class="svisit">
            <h4><strong>最近访客</strong></h4>
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