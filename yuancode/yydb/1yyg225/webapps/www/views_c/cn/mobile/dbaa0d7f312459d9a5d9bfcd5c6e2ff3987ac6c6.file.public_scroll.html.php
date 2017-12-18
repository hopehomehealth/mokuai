<?php /* Smarty version Smarty-3.1.13, created on 2017-01-11 11:07:10
         compiled from "/data/01/html/1yyg225/webapps/www/views/cn/mobile/public_scroll.html" */ ?>
<?php /*%%SmartyHeaderCode:130797078058451d2b6047b7-52645956%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dbaa0d7f312459d9a5d9bfcd5c6e2ff3987ac6c6' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/cn/mobile/public_scroll.html',
      1 => 1484103638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130797078058451d2b6047b7-52645956',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58451d2b61a046_94112284',
  'variables' => 
  array (
    'event' => 0,
    'page' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451d2b61a046_94112284')) {function content_58451d2b61a046_94112284($_smarty_tpl) {?><div class="loading getMore"><a class="next" href="#"></a></div>
<div class="load"></div>
<script src="/style/scroll/debug.js"></script>
<script src="/style/scroll/jquery.infinitescroll.js"></script>
<script type="text/javascript">
    var options = {
        loading: {
            msgText: "",
            img: "/style/scroll/loading.gif",
            finishedMsg: '没有更多了哦...',
            //loading选择器
            selector: '.load'
        },
        animate: false,
        //触发方式
        event: "<?php if ($_smarty_tpl->tpl_vars['event']->value=='click'){?>click<?php }else{ ?>scroll<?php }?>",
        //导航的选择器，会被隐藏
        navSelector: ".getMore",
        //包含下一页链接的选择器
        nextSelector: ".next",
        //你将要取回的选项(内容块)
        itemSelector: "li",
        //启用调试信息，若启用必须引入debug.js
        debug: false,
        //格式要和itemSelector保持一致
        dataType: 'html',
        //最大加载的页数
        maxPage: "<?php echo $_smarty_tpl->tpl_vars['page']->value['count'];?>
",
        //当有新数据加载进来的时候，页面是否有动画效果，默认没有
        //animate: true,
        //滚动条距离底部多少像素的时候开始加载，默认150
        extraScrollPx: 150,
        //载入信息的显示时间，时间越大，载入信息显示时间越短
        //bufferPx: 40,
        //加载完数据后的回调函数
        errorCallback: function() {

        },
        //获取下一页方法
        path: function(index) {
            return "/content/index/<?php echo $_smarty_tpl->tpl_vars['data']->value['cat']['id'];?>
/"+index+"?load";
        }
    }
    if(typeof(ExtendOptions)!="undefined"){
        options = $.extend(options,ExtendOptions);
    }
    console.log(options)
    $('.list').infinitescroll(options, function(newElements, data, url) {  //回调函数
        //console.log(data);
        //alert(url);
    });
</script><?php }} ?>