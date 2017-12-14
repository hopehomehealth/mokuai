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
                    <li <?php if((CONTROLLER_NAME == Auth) AND (ACTION_NAME == showlist)): ?>class="active"<?php endif; ?>> <a href="<?php echo U('Auth/showlist');?>"><i class="icon-double-angle-right"></i>权限列表</a></li>
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
        <div class="row">
            <div class="page-content box">
                <div class="box-title margin_bot_20">
                    <div class="span10">
                        <h3><i class="icon-magic"></i>权限添加</h3>
                    </div>
                </div>

                <form action="/index.php/Sadmin/Auth/add.html" method="post" enctype='multipart/form-data' class="form-horizontal">
    <div class="form-group">
        <label class="control-label">权限名 : </label>
        <div class="controls pull-left">
            <input type="text" class="input-large" name="auth_name">
            <span class="help-inline red"> * </span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">权限上级 : </label>
        <div class="controls pull-left">
            <select name='auth_pid'>
                <option value='0'>-请选择-</option>
                <?php if(is_array($authinfo)): foreach($authinfo as $key=>$v): ?><option value='<?php echo ($v["auth_id"]); ?>'><?php echo str_repeat('--/',$v['auth_level']); echo ($v["auth_name"]); ?></option><?php endforeach; endif; ?>
            </select>
            <span class="help-inline red"> * 添加顶级权限,此处不选; 添加子级权限, 请选择顶级权限名</span>
        </div>
    </div>

     <div class="form-group">
        <label class="control-label">控制器 : </label>
        <div class="controls pull-left">
            <input type="text" class="input-medium" name="auth_c">
            <span class="help-inline red"> * 添加顶级权限,此处不填</span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">操作方法 : </label>
        <div class="controls pull-left">
            <input type="text" class="input-medium" name="auth_a">
            <span class="help-inline red"> * 添加顶级权限,此处不填</span>
        </div>
    </div>
                    <div class="form-group">
                        <label class="control-label">左侧栏排序 : </label>
                        <div class="controls pull-left">
                            <input type="text" class="input-medium" name="auth_sort">
                            <span class="help-inline red"> * 请输入整数数字,添加二级权限,此处不填</span>
                        </div>
                    </div>
                    <div>
                        <label class="control-label"></label>
                        <button id="bsubmit" type="submit"  class="btn btn-sm btn-primary">添加</button>
                    </div>
                </form>
            </div>
        </div>
        <!--/.box-->
    </div><!-- /.page-content -->
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