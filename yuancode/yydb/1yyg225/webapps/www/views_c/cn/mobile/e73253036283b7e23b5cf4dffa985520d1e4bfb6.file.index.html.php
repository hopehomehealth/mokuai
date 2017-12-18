<?php /* Smarty version Smarty-3.1.13, created on 2016-05-17 09:17:42
         compiled from "D:\test1yyg3.lnest.com\webapps\www\views\cn\mobile\plate\index.html" */ ?>
<?php /*%%SmartyHeaderCode:708573415b7e4e1c4-39363875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e73253036283b7e23b5cf4dffa985520d1e4bfb6' => 
    array (
      0 => 'D:\\test1yyg3.lnest.com\\webapps\\www\\views\\cn\\mobile\\plate\\index.html',
      1 => 1463447829,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '708573415b7e4e1c4-39363875',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_573415b807a120_78263037',
  'variables' => 
  array (
    'data' => 0,
    'config_plate' => 0,
    'k' => 0,
    'm' => 0,
    'full_cut_discount' => 0,
    'L' => 0,
    'site_config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573415b807a120_78263037')) {function content_573415b807a120_78263037($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['header'])) {$_smarty_tpl->tpl_vars['header'] = clone $_smarty_tpl->tpl_vars['header'];
$_smarty_tpl->tpl_vars['header']->value = 'header2'; $_smarty_tpl->tpl_vars['header']->nocache = null; $_smarty_tpl->tpl_vars['header']->scope = 0;
} else $_smarty_tpl->tpl_vars['header'] = new Smarty_variable('header2', null, 0);?>
<?php echo $_smarty_tpl->getSubTemplate ("top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/mobile/plate/css/common.css">
<link rel="stylesheet" href="/style/mobile/plate/css/plate.css">
<div class="resultBg"></div>
<div id="content" class="container main">

    <div class="choujiang">
        <img src="/style/mobile/plate/img/dzpanbg.png" />
        <div class="plate">
            <a id="plateBtn" href="javascript:">开始抽奖</a>
        </div>
        <div id="result" class="result">
            <p id="resultTxt" class="resultTxt"></p>
            <a id="resultBtn" class="resultBtn" href="javascript:">再转一次</a>
        </div>
        <div id="tips" class="result">
            <a class="resultClose"></a>
            <p class="resultTxt"><b></b><span></span></p>
            <a class="resultBtn" href="javascript:;"></a>
        </div>
    </div>

    <div class="dzp-jifen"<?php if ($_smarty_tpl->tpl_vars['data']->value['status']<1){?> style="background-color: #aaa;"<?php }?>>
        <?php if ($_smarty_tpl->tpl_vars['data']->value['status']>0){?>
        <i><?php echo $_smarty_tpl->tpl_vars['data']->value['status_name'];?>
</i>
        剩余次数：<?php echo $_smarty_tpl->tpl_vars['data']->value['count_qty'];?>

        <?php }else{ ?>
        <?php echo $_smarty_tpl->tpl_vars['data']->value['status_name'];?>

        <?php }?>
    </div>

    <div class="dzp-jxsm">
        <section>
            <table>
                <tr>
                    <th>奖<br />品<br />说<br />明<br /></th>
                    <td>
                        <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['config_plate']->value['plate_get_points']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
                        <p><i class="icon iconfenxiao">&#xe650;</i><?php echo num2char($_smarty_tpl->tpl_vars['k']->value);?>
等奖：获得 <?php echo $_smarty_tpl->tpl_vars['m']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['config_plate']->value['plate_get_title_type'][$_smarty_tpl->tpl_vars['k']->value];?>
<em>（<?php if ($_smarty_tpl->tpl_vars['config_plate']->value['plate_get_type'][$_smarty_tpl->tpl_vars['k']->value]==2&&isset($_smarty_tpl->tpl_vars['full_cut_discount']->value)){?>满<?php echo $_smarty_tpl->tpl_vars['full_cut_discount']->value[0];?>
用<?php echo $_smarty_tpl->tpl_vars['full_cut_discount']->value[1];?>
<?php echo $_smarty_tpl->tpl_vars['config_plate']->value['plate_get_title_type'][$_smarty_tpl->tpl_vars['k']->value];?>
<?php }else{ ?>无条件使用限制<?php }?>）</em></p>
                        <?php } ?>
                    </td>
                </tr>
            </table>
        </section>
    </div>

    <div class="dzp-guiz">
        <h3 class="dzp-guiz-h3">活动规则：</h3>
        <section>
            1.<?php if ($_smarty_tpl->tpl_vars['config_plate']->value['plate_db_points']){?>每参与<?php echo $_smarty_tpl->tpl_vars['config_plate']->value['plate_db_points'];?>
人次（不含免费区）<?php }?><?php if ($_smarty_tpl->tpl_vars['config_plate']->value['plate_db_points']&&$_smarty_tpl->tpl_vars['config_plate']->value['plate_pay_points']){?>（优先）或<?php }?><?php if ($_smarty_tpl->tpl_vars['config_plate']->value['plate_pay_points']){?>单次消耗<?php echo $_smarty_tpl->tpl_vars['config_plate']->value['plate_pay_points'];?>
<?php echo $_smarty_tpl->tpl_vars['L']->value['unit_pay_points'];?>
<?php }?><?php if (!$_smarty_tpl->tpl_vars['config_plate']->value['plate_db_points']&&!$_smarty_tpl->tpl_vars['config_plate']->value['plate_pay_points']){?>没有设置参与条件<?php }?>，可以获得一次大转盘机会;<br>
            2.活动时间：<?php if ($_smarty_tpl->tpl_vars['config_plate']->value['plate_start_time']){?><?php echo date('Y年m月d日',strtotime($_smarty_tpl->tpl_vars['config_plate']->value['plate_start_time']));?>
<?php }?>-<?php if ($_smarty_tpl->tpl_vars['config_plate']->value['plate_end_time']){?><?php echo date('Y年m月d日',strtotime($_smarty_tpl->tpl_vars['config_plate']->value['plate_end_time']));?>
<?php }?>；<br />
            3.抽奖成功，奖品将直接充值到您的帐户，立即生效；<br />
            4.本次活动最终解释权归<?php echo $_smarty_tpl->tpl_vars['site_config']->value['site_name'];?>
所有。<br />
        </section>
    </div>

<script type="text/javascript" src="/style/mobile/plate/js/jquery.rotate.min.js"></script>
<script type="text/javascript">
    $(function () {
        var $plateBtn = $('#plateBtn');
        var $result = $('#result');
        var $resultTxt = $('#resultTxt');
        var $resultBtn = $('#resultBtn');
        var status = 1; //抽奖状态 1可抽奖 0抽奖运行中

        $plateBtn.click(function () {
            if(status == 1){
                $.post('/plate/get',function(x){
                    if(x.status<1){
                        if(x.status_name){
                            $('#tips .resultTxt b').html(x.status_name);
                        }
                        if(x.status_tip){
                            $('#tips .resultTxt span').html(x.status_tip);
                        }
                        if(x.status_btn){
                            $('#tips .resultBtn').html(x.status_btn);
                        }
                        if(x.status_url){
                            $('#tips .resultBtn').attr('href',x.status_url);
                        }
                        $('#tips,.resultBg').show();
                    }else{
                        switch (x.m) {
                            case 1:
                                rotateFunc(1, 210, '<img src="/style/mobile/plate/img/dzp-zj.jpg" /><span>恭喜您获得<em>一等奖</em>（'+x.desc+'）</span>');
                                break;
                            case 2:
                                rotateFunc(2, 270, '<img src="/style/mobile/plate/img/dzp-zj.jpg" /><span>恭喜您获得<em>二等奖</em>（'+x.desc+'）</span>');
                                break;
                            case 3:
                                rotateFunc(3, 330, '<img src="/style/mobile/plate/img/dzp-zj.jpg" /><span>恭喜您获得<em>三等奖</em>（'+x.desc+'）</span>');
                                break;
                            case 4:
                                rotateFunc(4, 30, '<img src="/style/mobile/plate/img/dzp-zj.jpg" /><span>恭喜您获得<em>四等奖</em>（'+x.desc+'）</span>');
                                break;
                            case 5:
                                rotateFunc(5, 90, '<img src="/style/mobile/plate/img/dzp-zj.jpg" /><span>恭喜您获得<em>五等奖</em>（'+x.desc+'）</span>');
                                break;
                            default:
                                rotateFunc(0, 150, '<img src="/style/mobile/plate/img/dzp-wzj.jpg" /><span>很遗憾，<em>未中奖</em>，谢谢参与！</span>');
                                break;
                        }
                    }
                },'json');
            }
        });

        var rotateFunc = function (awards, angle, text) {  //awards:奖项，angle:奖项对应的角度
            status = 0;
            $plateBtn.stopRotate();
            $plateBtn.rotate({
                angle: 0,
                duration: 5000,
                animateTo: angle + 1440,  //angle是图片上各奖项对应的角度，1440是让指针固定旋转4圈
                callback: function () {
                    $resultTxt.html(text);
                    $result.show();
                    $('.resultBg').show();
                    status = 1;
                }
            });
        };

        $resultBtn.click(function () {
            $result.hide();
            $('.resultBg').hide();
            location.reload();
        });

        $('.resultClose').click(function () {
            $('.result,.resultBg').hide();
        });
    });
</script>

    <div class="ft"></div>
</div>
</body>
</html><?php }} ?>