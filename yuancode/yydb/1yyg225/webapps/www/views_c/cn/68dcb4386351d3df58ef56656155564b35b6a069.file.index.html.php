<?php /* Smarty version Smarty-3.1.13, created on 2016-06-21 10:39:15
         compiled from "E:\projects\web\1yyg\1yyg225_0016\webapps\www\views\cn\plate\index.html" */ ?>
<?php /*%%SmartyHeaderCode:30895768a8d3a04807-00285105%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68dcb4386351d3df58ef56656155564b35b6a069' => 
    array (
      0 => 'E:\\projects\\web\\1yyg\\1yyg225_0016\\webapps\\www\\views\\cn\\plate\\index.html',
      1 => 1463447829,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30895768a8d3a04807-00285105',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'winList' => 0,
    'k' => 0,
    'm' => 0,
    'data' => 0,
    'config_plate' => 0,
    'L' => 0,
    'site_config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5768a8d3b24b27_77112070',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5768a8d3b24b27_77112070')) {function content_5768a8d3b24b27_77112070($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<link rel="stylesheet" href="/style/plate/css/plate.css">
<div class="resultBg"></div>
<div class="plate_bg">
    <div class="choujiang">
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
</div>
<div class="plate_rows container">
    <dl class="cols-1">
        <dt></dt>
        <dd>
            <table cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <td>用户名</td>
                    <td>奖品</td>
                    <td>时间</td>
                </tr>
                </thead>
                <tbody>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['winList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
                <tr <?php if ($_smarty_tpl->tpl_vars['k']->value%2==0){?>class="od"<?php }?>>
                    <td class="username"><?php echo nickname($_smarty_tpl->tpl_vars['m']->value['username'],$_smarty_tpl->tpl_vars['m']->value['nickname']);?>
</td>
                    <td><?php echo num2char($_smarty_tpl->tpl_vars['m']->value['star']);?>
等奖</td>
                    <td><?php echo date('Y-m-d',$_smarty_tpl->tpl_vars['m']->value['c_time']);?>
</td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </dd>
    </dl>

    <div class="cols-2">
        <dl class="cols-2-row-1">
            <?php if ($_smarty_tpl->tpl_vars['data']->value['status']>0){?>
            <dt><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['zz'][0][0]->_callViewFunc(array('mod'=>'photo','source'=>$_smarty_tpl->tpl_vars['data']->value['photo'],'size'=>'160'),$_smarty_tpl);?>
" height="105" width="105" /></dt>
            <dd>
                <h3><?php echo nickname($_smarty_tpl->tpl_vars['data']->value['username'],$_smarty_tpl->tpl_vars['data']->value['nickname']);?>
</h3>
                <h5>剩余次数：<?php echo $_smarty_tpl->tpl_vars['data']->value['count_qty'];?>
</h5>
                <p><?php echo $_smarty_tpl->tpl_vars['data']->value['status_name'];?>
</p>
            </dd>
            <?php }else{ ?>
            <dd>
                <h3><?php echo $_smarty_tpl->tpl_vars['data']->value['status_name'];?>
</h3>
            </dd>
            <?php }?>
            <div class="clear"></div>
        </dl>
        <dl class="cols-2-row-2">
            <dt>活动规则</dt>
            <dd>
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
            </dd>
        </dl>
    </div>

    <dl class="cols-3">
        <dt></dt>
        <dd>
            <ul>
                <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['config_plate']->value['plate_get_points']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
                <li class="li-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><b><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</b><span><?php echo num2char($_smarty_tpl->tpl_vars['k']->value);?>
等奖：获得 <?php echo $_smarty_tpl->tpl_vars['m']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['config_plate']->value['plate_get_title_type'][$_smarty_tpl->tpl_vars['k']->value];?>
</span></li>
                <?php } ?>
            </ul>
        </dd>
    </dl>
    <div class="clear" style="height: 40px;"></div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script type="text/javascript" src="/style/plate/js/jquery.rotate.min.js"></script>
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
                                rotateFunc(1, 210, '<img src="/style/plate/img/dzp-zj.jpg" /><span>恭喜您获得<em>一等奖</em>（'+x.desc+'）</span>');
                                break;
                            case 2:
                                rotateFunc(2, 270, '<img src="/style/plate/img/dzp-zj.jpg" /><span>恭喜您获得<em>二等奖</em>（'+x.desc+'）</span>');
                                break;
                            case 3:
                                rotateFunc(3, 330, '<img src="/style/plate/img/dzp-zj.jpg" /><span>恭喜您获得<em>三等奖</em>（'+x.desc+'）</span>');
                                break;
                            case 4:
                                rotateFunc(4, 30, '<img src="/style/plate/img/dzp-zj.jpg" /><span>恭喜您获得<em>四等奖</em>（'+x.desc+'）</span>');
                                break;
                            case 5:
                                rotateFunc(5, 90, '<img src="/style/plate/img/dzp-zj.jpg" /><span>恭喜您获得<em>五等奖</em>（'+x.desc+'）</span>');
                                break;
                            default:
                                rotateFunc(0, 150, '<img src="/style/plate/img/dzp-wzj.jpg" /><span>很遗憾，<em>未中奖</em>，谢谢参与！</span>');
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
</script><?php }} ?>