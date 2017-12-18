<?php /* Smarty version Smarty-3.1.13, created on 2015-11-28 17:39:38
         compiled from "H:\projects\web\lnest02\1yyg\webapps\www\views\cn\content\win.html" */ ?>
<?php /*%%SmartyHeaderCode:31457565975cf892d10-02224846%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e33422c44dc6f77f00343910b3bc90095160dd55' => 
    array (
      0 => 'H:\\projects\\web\\lnest02\\1yyg\\webapps\\www\\views\\cn\\content\\win.html',
      1 => 1448703575,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31457565975cf892d10-02224846',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_565975cf8febf1_16733992',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_565975cf8febf1_16733992')) {function content_565975cf8febf1_16733992($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="<?php echo url('/style/css/win.css');?>
">
<script src="<?php echo url('/style/jquery.ajaxContent.pack.js');?>
" type="text/javascript"></script>
<script src="/style/lefttime_jx.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ("ur_here.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="fn-clear win-box">
    <ul class="fn-clear taba">
        <li class="li_db" onclick="mLoad('db',true)">最新夺宝揭晓</li>
        <!--<li class="li_auc" onclick="mLoad('auc',true)">最新竞拍揭晓</li>-->
    </ul>
    <div class="load" id="load_db"><div class="loading">拼命加载中...</div></div>
    <div class="load" id="load_auc"><div class="loading">拼命加载中...</div></div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
var hash = 'db';
var idsTime = false;
var isLoad = {
    "db":false,
    "auc":false
};
if(location.hash){ hash = location.hash.substr(1); }
mLoad(hash,true);

function mLoad(hash, load){
    var arr=hash.split("#");
    var type = arr[0];

    var loadDiv = '#load_'+type;

    $('.taba li').removeClass('hover');
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
        $(loadDiv).load('/content/win/1?type='+type,function(){
            scrollLoading();
            itemhover();
            //加载待揭晓
            if(type=='db'){
                compaceIds();
                if(idsTime==false){
                    idsTime = setInterval('compaceIds()',5*1000);
                }
            }else{
                if(idsTime){
                    window.clearInterval(idsTime);
                    idsTime = false;
                }
            }
        });
        if('#load_'+type == loadDiv) isLoad[type] = true;
    }

    location.href='/content/win#'+type;
}
function compaceIds(){
    $.post('/content/ajaxIds','ids='+$('#ids').val(),function(data){
        if(data.error==1){
            scrollLoading();
            $('#ids').val(data.ids);
            $('#win-list').prepend(data.html);
        }
    },'json');
}
</script><?php }} ?>