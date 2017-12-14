<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>中国缓粘结管理后台</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?php echo (SCSS_URL); ?>bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo (SCSS_URL); ?>font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo (SCSS_URL); ?>ace.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (SCSS_URL); ?>style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (SCSS_URL); ?>page.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (SCSS_URL); ?>daterangepicker.css">
    <script type="text/javascript" src='<?php echo (SJS_URL); ?>jquery-2.1.3.min.js'></script>
</head>
<body>
<div class="navbar navbar-default">
    <div class="navbar-container">
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>中国<font color="#9acd32">缓粘结</font>管理后台 </small>
            </a>
        </div><!-- /.navbar-header -->
        <div class="navbar-header pull-right">
            <ul class="nav ace-nav">
                <li >
                    <a href="#">
                        <i class="icon-user bigger-140"></i><?php echo ($_SESSION['userInfo']['nikename']); ?>
                    </a>
                </li>
                <li >
                    <a href="<?php echo U('User/logout');?>" target="_top"
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
                <li <?php if(CONTROLLER_NAME == Index): ?>class="active"<?php endif; ?>>
                    <a href="<?php echo U('Index/index');?>">
                        <i class="icon-home"></i>
                        <span class="menu-text">首页 </span>
                    </a>
                </li>
                <li <?php if(CONTROLLER_NAME == Seller): ?>class="open active"<?php endif; ?>>
                 <a href="" class="dropdown-toggle">
                        <i class="icon-text-width"></i>
                        <span class="menu-text">栏目管理</span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                      <ul class="submenu">

                        <li <?php if((CONTROLLER_NAME == Seller) AND (ACTION_NAME == setting)): ?>class="active"<?php endif; ?>> <a href="/index.php/Sadmin/Seller/setting"><i class="icon-double-angle-right"></i>基本设置</a></li>
                <?php if($sellerinfo["seller_type"] == 2): ?><li <?php if((CONTROLLER_NAME == Seller) AND (ACTION_NAME == branchlist)): ?>class="active"<?php endif; ?>> <a href="/index.php/Sadmin/Seller/branchlist"><i class="icon-double-angle-right"></i>分店管理</a></li><?php endif; ?>
                    </ul>


                </li>
                <li <?php if(CONTROLLER_NAME == User): ?>class="open active"<?php endif; ?>>
                    <a href="" class="dropdown-toggle">
                        <i class="icon-text-width"></i>
                        <span class="menu-text">新闻管理</span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">

                        <li <?php if((CONTROLLER_NAME == User) AND (ACTION_NAME == userlist)): ?>class="active"<?php endif; ?>> <a href="/index.php/Sadmin/User/userlist"><i class="icon-double-angle-right"></i>会员列表</a></li>
                    </ul>
                </li>
                <li <?php if(CONTROLLER_NAME == Dispatch): ?>class="active"<?php endif; ?>>
                <a href="<?php echo U('Dispatch/Dispatch');?>">
                    <i class="icon-truck"></i>
                    <span class="menu-text">广告管理 </span>
                </a>
                </li>
                <li <?php if(CONTROLLER_NAME == Youhui): ?>class="active"<?php endif; ?>>
                <a href="<?php echo U('Youhui/index');?>">
                    <i class="icon-truck"></i>
                    <span class="menu-text">友情链接 </span>
                </a>
                </li>
				<li <?php if(CONTROLLER_NAME == Banner): ?>class="active"<?php endif; ?>>
                <a href="<?php echo U('Banner/showlist');?>">
                    <i class="icon-suitcase"></i>
                    <span class="menu-text">角色管理 </span>
                </a>
                </li>


                <li <?php if(CONTROLLER_NAME == Auth): ?>class="active open"<?php endif; ?>>
                <a href="" class="dropdown-toggle" >
                    <i class="icon-shopping-cart"></i>
                    <span class="menu-text">权限管理</span>
                    <b class="arrow icon-angle-down"></b>
                </a>
                <ul class="submenu">
                    <li <?php if((CONTROLLER_NAME == Auth) AND (ACTION_NAME == showlist)): ?>class="active"<?php endif; ?>> <a href="<?php echo U('Auth/add');?>"><i class="icon-double-angle-right"></i>权限列表</a></li>
                </ul>
                </li>
				<li <?php if(CONTROLLER_NAME == User): ?>class="open active"<?php endif; ?>>
                    <a href="" class="dropdown-toggle">
                        <i class="icon-text-width"></i>
                        <span class="menu-text">会员管理</span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">

                        <li <?php if((CONTROLLER_NAME == User) AND (ACTION_NAME == index)): ?>class="active"<?php endif; ?>> <a href="/index.php/Sadmin/User/index"><i class="icon-double-angle-right"></i>会员列表</a></li>
                    </ul>
                </li>
                <li <?php if(CONTROLLER_NAME == Sorder): ?>class="open active"<?php endif; ?>>
                    <a href="" class="dropdown-toggle">
                        <i class="icon-reorder"></i>
                        <span class="menu-text">订单管理</span>
                        <b class="arrow icon-angle-down"></b>
                    </a>
                    <ul class="submenu">
                        <li <?php if((CONTROLLER_NAME == Order) AND (ACTION_NAME == index)): ?>class="active"<?php endif; ?>> <a href="/index.php/Sadmin/Order/index"><i class="icon-double-angle-right"></i>订单列表</a></li>
						<!-- <li <?php if((CONTROLLER_NAME == Sorder) AND (ACTION_NAME == orderlist)): ?>class="active"<?php endif; ?>> <a href="/index.php/Sadmin/Sorder/orderlist"><i class="icon-double-angle-right"></i>乐购订单</a></li>
                        <li <?php if((CONTROLLER_NAME == Sorder) AND (ACTION_NAME == yuyuelist)): ?>class="active"<?php endif; ?>> <a href="/index.php/Sadmin/Sorder/yuyuelist"><i class="icon-double-angle-right"></i>预约订单</a></li>
                        <li <?php if((CONTROLLER_NAME == Sorder) AND (ACTION_NAME == together)): ?>class="active"<?php endif; ?>> <a href="/index.php/Sadmin/Sorder/together"><i class="icon-double-angle-right"></i>整单购买</a></li> -->

                    </ul>

                </li>
				<li <?php if(CONTROLLER_NAME == Tuihuo): ?>class="active"<?php endif; ?>>
                    <a href="/index.php/Sadmin/Tuihuo/showlist">
                        <i class="icon-signout"></i>
                        <span class="menu-text">退货管理</span>
                    </a>
                </li>




                <li <?php if(CONTROLLER_NAME == Finance): ?>class="active"<?php endif; ?>>
                    <a href="/index.php/Sadmin/Finance/sorder">
                        <i class="icon-money"></i>
                        <span class="menu-text">财务管理</span>
                    </a>
                </li>
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
                        <h2>店家: <font color="#31a8ff" size="3px"><?php echo ($sellerinfo["seller_name"]); ?></font><span style="font-size: 13px;color: gray;padding-left: 15px;">有效期:</span></h2>
                        <h3 class="red">
                            <i class="icon-volume-down icon-2x green"></i>
                            欢迎<i class="blue"><?php echo (session('reg_phone')); ?></i>回家，现在时间：<?php echo (date('Y-m-d g:i a',time())); ?>
                        </h3>
                        <h3><i class="icon-volume-down icon-2x green"></i>
                            商家帮助<i class="blue">规则体系</i><i class="blue">店铺续约</i></h3>
                        <h3><i class="icon-volume-down icon-2x green"></i>
                            平台联系方式<i class="blue">电话:</i><i class="blue">邮箱:</i></h3>

                    </div>
                </div>
                <!--<ul class="indexK">
                    <li class="blueBg">
                        <span class="icon-circle indexKLeft">
                            <i class="icon-calendar"></i>
                        </span>
                        <span class="indexKRight">
                            <b>0</b>
                            今日订单量
                        </span>
                    </li>
                    <li class="greenBg">
                        <span class="icon-circle indexKLeft">
                            <i class="icon-bar-chart"></i>
                        </span>
                        <span class="indexKRight">
                            <b>0</b>
                            今日销售额
                        </span>
                    </li>
                    <li class="redBg">
                        <span class="icon-circle indexKLeft">
                            <i class="icon-group"></i>
                        </span>
                        <span class="indexKRight">
                            <b>0</b>
                            今日商城访问量
                        </span>
                    </li>
                    <li class="yellowBg">
                        <span class="icon-circle indexKLeft">
                            <i class="icon-glass"></i>
                        </span>
                        <span class="indexKRight">
                            <b>0</b>
                            今日参与活动
                        </span>
                    </li>
                </ul>-->
                <div class="indexTable">
                    <div class="indexTableLeft">
                        <h4 class="indexTableTit">
                            <i class="icon-reorder blue"></i>
                            <span>未付款订单列表</span>
                        </h4>
                        <table>
                            <thead>
                            <tr><th width="90px">会员ID</th>
                                <th width="120px">订单号</th>
                                <th width="100px">时间</th>
                                <th width="60px">总价</th>
                                <th width="100px">状态</th>
                            </tr></thead>
                            <tbody>
							<?php if(is_array($paying)): foreach($paying as $key=>$info): ?><tr>
                                <td><?php echo ($info["userid"]); ?></td>
                                <td><?php echo ($info["orderno"]); ?></td>
                                <td><?php echo (date("Y-m-d H:i:s",$info["paytime"])); ?></td>
                                <td>￥<?php echo ($info["downpay"]); ?></td>
                                <td>未付款</td>
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
                            <tr><th width="90px">会员ID</th>
                                <th width="120px">订单号</th>
                                <th width="100px">时间</th>
                                <th width="60px">总价</th>
                                <th width="100px">状态</th>
                            </tr></thead>
                            <tbody>
                            <?php if(is_array($paied)): foreach($paied as $key=>$info): ?><tr>
                                <td><?php echo ($info["userid"]); ?></td>
                                <td><?php echo ($info["orderno"]); ?></td>
                                <td><?php echo (date("Y-m-d H:i:s",$info["paytime"])); ?></td>
                                <td>￥<?php echo ($info["downpay"]); ?></td>
                                <td>已付款</td>
                            </tr><?php endforeach; endif; ?>
							</tbody>
                        </table>
                    </div>
                </div>
                <div class="indexTable">
                    <div class="indexTableLeft">
                        <h4 class="indexTableTit">
                            <i class="icon-reorder blue"></i>
                            <span>新加入会员列表</span>
                        </h4>
                        <table>
                            <thead>
                            <tr><th width="60px">会员ID</th>
                                <th width="60px">头像</th>
                                <th width="120px">昵称</th>
                                <th width="60px">关注</th>
                                <th width="80px">代理</th>
                                <th width="60px">推荐人ID</th>
                            </tr></thead>
                            <tbody>
							<?php if(is_array($userList)): foreach($userList as $key=>$info): ?><tr>
                                <td><?php echo ($info["userid"]); ?></td>
                                <td><img src="<?php echo ($info["userhead"]); ?>" width="50px" hieght="50px"></td>
                                <td><?php echo ($info["nikename"]); ?></td>
                                <td><font color="#03A92B"><?php if($info["is_follow"] == '1'): ?>是<?php else: ?><p class="red">否</p><?php endif; ?></font></td>
                                <td><font color="#ff0000"><?php if($info["level"] == '1'): ?>是<?php else: ?>否<?php endif; ?></font><br><?php if($info["level"] == '1'): ?><a onclick="return confirm('你确定执行该操作吗')" href="/index.php/Sadmin/User/cancel/userid/<?php echo ($info["userid"]); ?>" class="green">[取消资格]</a><?php endif; if($info["level"] == '0'): ?><a href="/index.php/Sadmin/User/beagent/userid/<?php echo ($info["userid"]); ?>" class="green">[确认资格]</a><?php endif; ?></td>
                                <td><?php if($info["pid"] != 0): ?>邀请注册<?php endif; if($info["pid"] == 0): ?>后台添加<?php endif; ?></td>
                            </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="indexTableRight">
                        <h4 class="indexTableTit">
                            <i class="icon-reorder blue"></i>
                            <span>申请提现列表</span>
                        </h4>
                        <table>
                            <thead>
                            <tr><th width="60px">会员ID</th>
                                <th width="60px">头像</th>
                                <th width="120px">昵称</th>
                                <th width="100px">申请提现/可提现</th>
                                <th width="150px">申请/审核日期</th>
                                <th width="60px">状态</th>
                            </tr></thead>
                            <tbody>
							<?php if(is_array($exchange)): foreach($exchange as $key=>$info): ?><tr>
                                <td>1</td>
                                <td><img src="<?php echo ($info["userhead"]); ?>" width="50px" height="50px;"></td>
                                <td><?php echo ($info["nikename"]); ?></td>
                                <td>￥<?php echo ($info["amount"]); ?><br></td>
                                <td>申请:<?php echo (date("Y-m-dH:i:s",$info["inputtime"])); ?><br />审核:<?php if($info["checktime"] != ''): echo (date("Y-m-d H:i:s",$info["checktime"])); endif; ?></td>
                                <td><div class="visible-md visible-lg hidden-sm hidden-xs action-buttons"> <a href="/index.php/Sadmin/Exchange/oppass/ex_id/<?php echo ($info["ex_id"]); ?>" onclick="return confirm('你确定通过吗？')" class="green">通过</a><br /><a href="/index.php/Sadmin/Exchange/opfail/ex_id/<?php echo ($info["ex_id"]); ?>" onclick="return confirm('你确定不通过吗？')" class="green">不通过</a> </div></td>
                            </tr><?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/.box-->
    </div>
    <!-- /.page-content -->
</div><!-- /.main-content -->




    </div><!-- /.main-container-inner -->
</div><!-- /.main-container -->



<script type="text/javascript" src='<?php echo (SJS_URL); ?>jquery-1.7.2.min.js'></script>
<script type="text/javascript" src="<?php echo (SJS_URL); ?>ace-extra.min.js"></script>
<script type="text/javascript" src="<?php echo (SJS_URL); ?>daterangepicker.min.js"></script>
<script type="text/javascript" src="<?php echo (SJS_URL); ?>moment.min.js"></script>
<script type="text/javascript" src="<?php echo (SJS_URL); ?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo (SJS_URL); ?>ace.min.js"></script>
<script type="text/javascript" src="<?php echo (SJS_URL); ?>pulic.js"></script>
</body>
</html>