<?php /* Smarty version Smarty-3.1.13, created on 2016-12-05 16:05:52
         compiled from "/data/01/html/1yyg225/webapps/www/views/manage/plate/config.html" */ ?>
<?php /*%%SmartyHeaderCode:104603392058451fe00a8159-85019505%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ad5ca4e6198661e9b5ed9198d01817afb116f01' => 
    array (
      0 => '/data/01/html/1yyg225/webapps/www/views/manage/plate/config.html',
      1 => 1464775538,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104603392058451fe00a8159-85019505',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config' => 0,
    'winConfig' => 0,
    'm' => 0,
    'points' => 0,
    'n' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_58451fe0142428_81085669',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58451fe0142428_81085669')) {function content_58451fe0142428_81085669($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../public_btn.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="html-box">    <form target="iframeNewsTarget" method="post" action="/manage/setting/config_other">        <table class="table-list">            <tbody>            <tr class="table-h3">                <td colspan="2">大转盘活动时间</td>            </tr>            <tr>                <td class="td-input" colspan="2">                    <input class="form-i w120 sitem" name="config[plate_start_time]" id="start_time" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['plate_start_time'];?>
" type="text" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss', maxDate:'#F{ $dp.$D(\'end_time\') }' })" autocomplete="false" /> ~                    <input class="form-i w120 sitem" name="config[plate_end_time]" id="end_time" value="<?php echo $_smarty_tpl->tpl_vars['config']->value['plate_end_time'];?>
" type="text" onclick="WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss', minDate:'#F{ $dp.$D(\'start_time\') }' })" autocomplete="false" />                </td>            </tr>            <tr class="table-h3">                <td colspan="2">大转盘参与条件</td>            </tr>            <tr>                <td class="td-input" colspan="2">                    <span>每参与</span> <input type="text" class="form-i w40" name="config[plate_db_points]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['config']->value['plate_db_points'])===null||$tmp==='' ? 0 : $tmp);?>
" /> <span>人次（不含免费区），可以获得一次大转盘机会；</span><br>                    <span>每扣除</span> <input type="text" class="form-i w40" name="config[plate_pay_points]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['config']->value['plate_pay_points'])===null||$tmp==='' ? 0 : $tmp);?>
" /> <span>拍币，可以获得一次大转盘机会。</span><br>                </td>            </tr>            <tr class="table-h3">                <td colspan="2">大转盘奖项设置</td>            </tr>            <tr>                <td class="td-input" colspan="2">                    <?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['m']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['winConfig']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
$_smarty_tpl->tpl_vars['m']->_loop = true;
?>                    <div>                        <span><?php echo $_smarty_tpl->tpl_vars['m']->value['title'];?>
：<?php if ($_smarty_tpl->tpl_vars['m']->value['number']){?>获得<?php }?></span>                        <?php if ($_smarty_tpl->tpl_vars['m']->value['number']){?>                        <input type="text" class="form-i w60" name="config[plate_get_points_<?php echo $_smarty_tpl->tpl_vars['m']->value['key'];?>
]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['config']->value[('plate_get_points_').($_smarty_tpl->tpl_vars['m']->value['key'])])===null||$tmp==='' ? 0 : $tmp);?>
" />                        <select name="config[plate_get_type_<?php echo $_smarty_tpl->tpl_vars['m']->value['key'];?>
]" style="vertical-align: middle">                            <?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['n']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['points']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value){
$_smarty_tpl->tpl_vars['n']->_loop = true;
?>                            <option value="<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['config']->value[('plate_get_type_').($_smarty_tpl->tpl_vars['m']->value['key'])]==$_smarty_tpl->tpl_vars['n']->value['id']){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['n']->value['title'];?>
</option>                            <?php } ?>                        </select>                        <?php }?>                        <?php if ($_smarty_tpl->tpl_vars['m']->value['points']){?>                        <span> 中奖概率（</span>                        <input type="text" class="form-i w40" name="config[plate_points_<?php echo $_smarty_tpl->tpl_vars['m']->value['key'];?>
]" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['config']->value[('plate_points_').($_smarty_tpl->tpl_vars['m']->value['key'])])===null||$tmp==='' ? 0 : $tmp);?>
" />                        <span>）</span>                        <?php }?>                    </div>                    <?php } ?>                    <div class="form-tip" style="padding-top:10px;">                        关于中奖概率：<br>                        -.不支持小数，小数默认为下一个整数，如1.1实际为2，0.1实际为1；<br>                        -.中奖出现概率：单个概率值 / 所有奖项概率值之和；<br>                        -.中奖概率举例：如一等奖1，二等奖2，三等奖3，四等奖4，五等奖5，未中奖100，相当于1+2+3+4+5+100张彩票，随机选一张，即一等奖中奖概率为1/115.                    </div>                </td>            </tr>            <tr class="tr-btn">                <td class="td-input" colspan="2">                    <button type="submit" name="Submit" class="uiBtn BtnGreen">提&nbsp;&nbsp;交</button>                    <button type="reset" class="uiBtn">重&nbsp;&nbsp;置</button>                </td>            </tr>            </tbody>        </table>    </form></div><?php }} ?>