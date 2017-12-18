<?php /* Smarty version Smarty-3.1.13, created on 2016-03-15 10:34:27
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\yunbuy\detail_buy.html" */ ?>
<?php /*%%SmartyHeaderCode:2428756e774b3250e36-22498333%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ccb4ddec6cfb7643fce17f8090b017e84ed1c955' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\yunbuy\\detail_buy.html',
      1 => 1456976273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2428756e774b3250e36-22498333',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'row' => 0,
    'm' => 0,
    'k' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56e774b375a000_12492466',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e774b375a000_12492466')) {function content_56e774b375a000_12492466($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="content" class="container detail">
    <div class="slider" id="single-item">
        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['row']->value['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
        <?php if ($_smarty_tpl->tpl_vars['m']->value['imgurl_src']){?>
        <div><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'fileurl','source'=>$_smarty_tpl->tpl_vars['m']->value['imgurl_src'],'width'=>410,'height'=>380),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>id="buy_img_<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
"<?php }?> /></div>
        <?php }?>
        <?php } ?>
    </div>

    <div class="info">
        <p class="title"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</p>
        <p class="price">
            价格：<b class="color01"><?php echo price_format($_smarty_tpl->tpl_vars['row']->value['custom']);?>
</b>
        </p>
        <?php if ($_smarty_tpl->tpl_vars['row']->value['end_num']>0){?>
        <div class="progressBar">
            <div class="bottom">
                购买数量：
                <div class="number" style="margin-right: 5px;">
                    <input class="num-input" type="text" id="qty_<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
" data-max="1000" value="1" />
                    <a class="num-btn btn-plus" id="qty_plus" href="javascript:void(0);">+</a>
                    <a class="num-btn btn-minus" id="qty_minus" href="javascript:void(0);">-</a>
                </div>
                <script type="text/javascript">
                    function add(){
                        var div=$(".num-input");
                        var num=div.val();
                        num=parseInt(num);
                        num+=1;
                        if(num>div.attr('data-max')) return false;
                        div.val(num);
                    }
                    function reduce(){
                        var div=$(".num-input");
                        var num=div.val();
                        num=parseInt(num);
                        num-=1;
                        if(num<1) return false;
                        div.val(num);
                    }
                    window.onload=function(e){
                        //鼠标按钮时刻，抬起时刻
                        var firstTime,lastTime;
                        //定义计时器(判断2s后)
                        var time1,time2;
                        //周期性计时器;
                        var flag=false;
                        document.getElementById("qty_plus").onmousedown=function(e){
                            firstTime=new Date().getTime();
                            var time1=setTimeout(function(){
                                flag=true;
                                clearTimeout(time1);
                            },100);
                            time2=setInterval(function(){
                                if(flag==true){
                                    add();
                                }
                            },100);
                        }
                        document.getElementById("qty_minus").onmousedown=function(e){
                            firstTime=new Date().getTime();
                            var time1=setTimeout(function(){
                                flag=true;
                                clearTimeout(time1);
                            },100);
                            time2=setInterval(function(){
                                if(flag==true){
                                    reduce();
                                }
                            },100);
                        }
                        document.onmouseup=function(e){
                            lastTime=new Date().getTime();
                            var someTime=lastTime-firstTime;
                            someTime=someTime/1000;
                            if(someTime<2){
                                if(e.target.id=="qty_plus"){
                                    add();flag=false;clearInterval(time2);
                                }else if(e.target.id=="qty_minus"){
                                    reduce();flag=false;clearInterval(time2);
                                }
                            }else{
                                flag=false;
                                clearTimeout(time2);
                            }
                        }
                        $(".num-input").blur(function(){
                            var max = $(this).attr('data-max')*1;
                            if($(this).val()>max){
                                $(this).val(max);
                            }
                        });
                    }
                </script>
            </div>
            <div class="bottom button-box ui-clr">
                <span class="btn-db"><a href="javascript:void(0)" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
','buy')">立即购买</a></span>
                <span class="btn-db btn-cart"><a href="javascript:void(0)" onclick="addToCart('<?php echo $_smarty_tpl->tpl_vars['row']->value['buy_id'];?>
','',this)">加入购物车</a></span>
            </div>
        </div>
        <?php }?>
    </div>

    <ul class="yunbuy_other">
        <a href="<?php echo url((('/yunbuy/detail/').($_smarty_tpl->tpl_vars['row']->value['buy_id'])).('/info'));?>
"><b></b>商品图文详情<label>（建议WIFI下使用）</label></a>
    </ul>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script src="/style/mobile/js/slick.min.js"></script>
<script src="/style/mobile/js/jquery-pageload.js"></script>
<script src="/style/mobile/js/jquery.more.js"></script>
<script type="text/javascript">
    $(function(){
        $('#single-item').slick({
            autoplay: true,
            arrows: false,
            dots: true
        });
    });
</script><?php }} ?>