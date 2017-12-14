<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>乐护后台管理系统</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?php echo (CSS_URL); ?>bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>ace.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>page.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>calendar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>hzw-city-picker.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>jedate.css">


    <script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-2.1.3.min.js'></script>
    <script type="text/javascript" src="<?php echo (JS_URL); ?>city-data.js"></script>
    <script type="text/javascript" src="<?php echo (JS_URL); ?>hzw-city-picker.min.js"></script>
    <script type="text/javascript" src="<?php echo (JS_URL); ?>jedate.js"></script>
    <script type="text/javascript" src="<?php echo (JS_URL); ?>calendar.js"></script>
</head>
<body>
<div class="navbar navbar-default">
    <div class="navbar-container">
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>乐护后台管理系统 </small>
            </a>
        </div><!-- /.navbar-header -->
        <div class="navbar-header pull-right">
            <ul class="nav ace-nav">
                <li >
                    <a href="#">
                        <i class="icon-user bigger-140"></i><?php echo (session('admin_name')); ?>
                    </a>
                </li>
                <li >
                    <a href="<?php echo U('Manager/logout');?>" target="_top"
                    onclick="if(confirm('确认要退出系统么？')==false){return false;}">
                        <i class="icon-off bigger-130"></i>退出
                    </a>
                </li>
            </ul><!-- /.ace-nav -->
        </div><!-- /.navbar-header -->
    </div><!-- /.navbar-container-->
</div><!-- /.navbar-->
<div class="main-container">
    <div class="main-container-inner">
<div class="sidebar" id="sidebar">
    <ul class="nav nav-list">
        <?php if(is_array($auth_infoA)): foreach($auth_infoA as $key=>$v): if(($v["auth_c"] != '') AND ($v["auth_a"] != '')): ?><li <?php if((CONTROLLER_NAME == $v['auth_c']) AND (ACTION_NAME == $v['auth_a'])): ?>class="active"<?php endif; ?>>
                <a href="/index.php/Admin/<?php echo ($v["auth_c"]); ?>/<?php echo ($v["auth_a"]); ?>">
                    <i class="icon-folder-open"></i>
                    <span class="menu-text"><?php echo ($v["auth_name"]); ?> </span>
                </a>
                </li>



                <?php elseif(($v["auth_a"] == '') AND ($v["auth_c"] == '')): ?>
                <li>
                <a class="dropdown-toggle">
                    <i class="icon-folder-open"></i>
                    <span class="menu-text"><?php echo ($v["auth_name"]); ?> </span>
                    <b class="arrow icon-angle-down"></b>
                </a>
                <ul class="submenu">
                    <?php if(is_array($auth_infoB)): foreach($auth_infoB as $key=>$vv): if(($vv["auth_pid"]) == $v["auth_id"]): ?><li <?php if((CONTROLLER_NAME == $vv['auth_c']) AND (ACTION_NAME == $vv['auth_a'])): ?>class="active"<?php endif; ?>>
                            <a href="/index.php/Admin/<?php echo ($vv["auth_c"]); ?>/<?php echo ($vv["auth_a"]); ?>">
                                <i class="icon-double-angle-right"></i> <?php echo ($vv["auth_name"]); ?>
                            </a>
                            </li><?php endif; endforeach; endif; ?>
                </ul>
                </li><?php endif; endforeach; endif; ?>
    </ul>
    <!-- /.nav-list -->
    <div class="sidebar-collapse" id="sidebar-collapse">
        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
    </div>
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
    </script>
</div>



                <div class="main-content">
          
          <div class="page-content">
            <div class="row indexBox">
              <div class="page-content box">
              	<div class="box-title margin_bot_20">
                  	<div class="span10">
                   		<h3 class="red">
                            <i class="icon-volume-down icon-2x green"></i>
                            欢迎　<i class="blue"><?php echo (session('admin_name')); ?></i>　回家，现在时间：<?php echo (date('Y-m-d g:i a',time())); ?>
                        </h3>
                  	</div>
                </div>
                <ul class="indexK">
                    <li class="blueBg">
                        <span class="icon-circle indexKLeft">
                            <i class="icon-calendar"></i>
                        </span>
                        <span class="indexKRight"> 
                            <b><?php echo ((isset($countorder) && ($countorder !== ""))?($countorder):0); ?></b>
                            今日订单量
                        </span> 
                    </li>
                    <li class="greenBg">
                        <span class="icon-circle indexKLeft">
                            <i class="icon-bar-chart"></i>
                        </span>
                        <span class="indexKRight"> 
                            <b><?php echo ((isset($summoney["sum"]) && ($summoney["sum"] !== ""))?($summoney["sum"]):0); ?></b>
                            今日销售额
                        </span> 
                    </li>
                    <li class="redBg">
                        <span class="icon-circle indexKLeft">
                            <i class="icon-group"></i>
                        </span>
                        <span class="indexKRight"> 
                            <b><?php echo ((isset($count) && ($count !== ""))?($count):0); ?></b>
                            官网访问量
                        </span> 
                    </li>
                  <!--   <li class="yellowBg">
                        <span class="icon-circle indexKLeft">
                            <i class="icon-glass"></i>
                        </span>
                        <span class="indexKRight"> 
                            <b>39</b>
                            今日参与活动
                        </span> 
                    </li> -->
                </ul>
                <div class="indexTable">
                    <div class="indexTableLeft">
                        <h4 class="indexTableTit">
                            <i class="icon-reorder blue"></i>
                            <span>未付款订单列表</span>
                        </h4>
                        <table>
                            <thead>
                                <th width="100px">订单号</th>
                                <th width="100px">时间</th>
                                <th width="60px">总价</th>
                                <th width="60px">状态</th>
                                <th width="60px">详情</th>
                            </thead>
                            <tbody>
                                <?php if(is_array($unorderlist)): foreach($unorderlist as $key=>$unorder): ?><tr>
                                    <td><?php echo ($unorder["ordernumber"]); ?></td>
                                    <td><?php echo (date("Y-m-d",$unorder["inputtime"])); ?></td>
                                    <td>￥<?php echo ($unorder["ssum"]); ?></td>
                                    <td>待付款</td>
                                    <td><a href="/index.php/Admin/Order/orderinfo/orderid/<?php echo ($unorder["orderid"]); ?>">查看</td>
                                </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="indexTableRight">
                        <h4 class="indexTableTit">
                            <i class="icon-reorder blue"></i>
                            <span>已付款订单列表</span>
                        </h4>
                        <table>
                            <thead>
                                <th width="100px">订单号</th>
                                <th width="100px">时间</th>
                                <th width="60px">总价</th>
                                <th width="60px">状态</th>
                                <th width="60px">详情</th>
                            </thead>
                            <tbody>
                                <?php if(is_array($orderlist)): foreach($orderlist as $key=>$order): ?><tr>
                                    <td><?php echo ($order["ordernumber"]); ?></td>
                                    <td><?php echo (date("Y-m-d",$order["inputtime"])); ?></td>
                                    <td>￥<?php echo ($order["ssum"]); ?></td>
                                    <td>交易成功</td>
                                    <td><a href="/index.php/Admin/Order/orderinfo/orderid/<?php echo ($order["orderid"]); ?>">查看</td>
                                </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                              </div>
                            </div>

			<div class="indexTable">
                    <div class="indexTableLeft">
                        <h4 class="indexTableTit">
                            <i class="icon-reorder blue"></i>
                            <span>微信配置</span>
                        </h4>
                        <table>
                            <thead>
                                <th width="100px">URL(服务器地址)</th>
                                <th width="100px">Token(令牌)</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>http://www.1lehu.com/index.php/Admin/Weixin/index</td>
                                    <td>lhpttoken</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                   
                </div>
              </div>
            </div>
            <!--/.box-->
          </div><!-- /.page-content -->
        </div><!-- /.main-content -->

    </div><!-- /.main-container-inner -->
</div><!-- /.main-container -->
<script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-1.7.2.min.js'></script>
<script type="text/javascript">
        $('.active').parent().parent().addClass("active open");
</script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>ace-extra.min.js"></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>ace.min.js"></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>pulic.js"></script>
</body>
</html>