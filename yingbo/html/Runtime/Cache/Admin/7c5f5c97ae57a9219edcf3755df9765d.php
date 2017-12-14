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

    <script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-1.7.2.min.js'></script>
    <script type="text/javascript" src="<?php echo (JS_URL); ?>city-data.js"></script>
    <script type="text/javascript" src="<?php echo (JS_URL); ?>hzw-city-picker.min.js"></script>
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
        <?php if(is_array($auth_infoA)): foreach($auth_infoA as $key=>$v): if(($v["auth_c"] == '') AND ($v["auth_a"] == '')): ?><li <?php if((CONTROLLER_NAME == '') AND (ACTION_NAME == '')): ?>class="open"<?php endif; ?>>
                <a class="dropdown-toggle">
                    <i class="icon-folder-open"></i>
                    <span class="menu-text"><?php echo ($v["auth_name"]); ?> </span>
                    <b class="arrow icon-angle-down"></b>
                </a>
                <ul class="submenu">
                    <?php if(is_array($auth_infoB)): foreach($auth_infoB as $key=>$vv): if(($vv["auth_pid"]) == $v["auth_id"]): ?><li <?php if((CONTROLLER_NAME == $vv['auth_c']) AND (ACTION_NAME == $vv['auth_a'])): ?>class="active open"<?php endif; ?>>
                            <a href="/index.php/Admin/<?php echo ($vv["auth_c"]); ?>/<?php echo ($vv["auth_a"]); ?>">
                                <i class="icon-double-angle-right"></i> <?php echo ($vv["auth_name"]); ?>
                            </a>
                            </li><?php endif; endforeach; endif; ?>
                </ul>
                </li>
                <?php elseif(($v["auth_a"] != '') AND ($v["auth_c"] != '')): ?>


                <li <?php if((CONTROLLER_NAME == $v['auth_c']) AND (ACTION_NAME == $v['auth_a'])): ?>class="active"<?php endif; ?>>
                <a href="/index.php/Admin/<?php echo ($v["auth_c"]); ?>/<?php echo ($v["auth_a"]); ?>" class="dropdown-toggle">
                    <i class="icon-folder-open"></i>
                    <span class="menu-text"><?php echo ($v["auth_name"]); ?> </span>
                </a>
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
        <div class="row">
            <div class="page-content box">
                <div class="box-title margin_bot_20">
                    <div class="span10">
                        <h3><i class="icon-cogs"></i>提现审核</h3>
                    </div>
                </div>
                <form  action="<?php echo U('Admin/Postal/examine');?>" method="post">
                <table class="table table-striped table-bordered" style="text-align:center">
                    <tr><th>用户名</th><td><?php echo ($userinfo["username"]); ?></td>
                    </tr>
                    <tr><th>手机号</th><td><?php echo ($userinfo["iphone"]); ?></td>
                    </tr>
                    <tr><th>提现前余额</th><td style="color:red;font-size:120%;font-weight:bold;"><?php echo ($_GET['pre_money']); ?>元</td>
                    </tr>
                    <tr><th>提现金额</th><td style="color:red;font-size:120%;font-weight:bold;"><?php echo ($_GET['balance']); ?>元</td>
                    </tr>
                    <tr><th>提现后余额</th><td style="color:red;font-size:120%;font-weight:bold;"><?php echo ($userinfo["money"]); ?>元</td>
                    </tr>
                    <tr><th>手机号</th><td><?php echo ($userinfo["iphone"]); ?></td>
                    </tr>
                    <tr><th>账户类型</th><td><?php echo ($accountinfo["count_type"]); ?></td>
                    </tr>
                    <?php if($accountinfo["count_type"] == '支付宝'): ?><tr><th>支付宝账号</th><td><?php echo ($accountinfo["count_no"]); ?></td>
                    </tr>
                    <tr><th>账户名</th><td><?php echo ($accountinfo["count_name"]); ?></td>
                    </tr><?php endif; ?>
                    <?php if($accountinfo["count_type"] == '银行卡'): ?><tr><th>银行名</th><td><?php echo ($accountinfo["bankname"]); ?></td>
                        </tr>
                        <tr><th>银行卡号</th><td><?php echo ($accountinfo["card_no"]); ?></td>
                        </tr>
                        <tr><th>户名</th><td><?php echo ($accountinfo["count_name"]); ?></td>
                        </tr><?php endif; ?>
                    <input type="hidden" name="cash_id" value="<?php echo ($_GET['cash_id']); ?>" />
                    <input type="hidden" name="userid" value="<?php echo ($_GET['userid']); ?>" />
                    <input type="hidden" name="balance" value="<?php echo ($_GET['balance']); ?>" />
                    <input type="hidden" name="money" value="<?php echo ($userinfo["money"]); ?>" />
                    <tr><th>操作(打款成功后操作)</th><td><?php if($_GET['status']== '0'): ?><button class="btn btn-big" style="margin-left:20px;background:green">确认打款</button><?php else: endif; ?></td>
                    </tr>
                </table>
                </form>
            </div>
        </div>
        <!--/.box-->
    </div><!-- /.page-content -->
</div><!-- /.main-content -->


    </div><!-- /.main-container-inner -->
</div><!-- /.main-container -->
<script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-1.7.2.min.js'></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>ace-extra.min.js"></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>ace.min.js"></script>
<script type="text/javascript" src="<?php echo (JS_URL); ?>pulic.js"></script>
</body>
</html>