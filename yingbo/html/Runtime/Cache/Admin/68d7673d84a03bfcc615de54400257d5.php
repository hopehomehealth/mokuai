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
    <div class="breadcrumbs">
        <ul>
            <li > <a href="#">添加支付方式 </a> </li>

        </ul>
        <!-- .breadcrumb -->
    </div>

    <div class="page-content">
        <div class="row">
            <div class="page-content box">
<form action="<?php echo U('/Admin/Pay/add');?>" method="post" class="form-horizontal">
    <div class="form-group">
        <label class="control-label">支付方式 : </label>
        <div class="controls pull-left">
            <input type="text" class="input-large" name="name" value="<?php echo ($info["name"]); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">支付类型 : </label>
        <div class="controls pull-left">
            <input type="text" class="input-large" name="type" value="<?php echo ($info["type"]); ?>">
            <span class="help-inline red"> *（例如：weixin、alipay、baidu） </span>
        </div>
    </div>
     <div class="form-group">
        <label class="control-label">appid : </label>
        <div class="controls pull-left">
            <input type="text" class="input-large" name="appid" value="<?php echo ($info["appid"]); ?>">
            <span class="help-inline red"> *微信支付 </span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">秘钥paysignkey : </label>
        <div class="controls pull-left">
            <input type="text" class="input-large" name="paysignkey" value="<?php echo ($info["paysignkey"]); ?>">
            <span class="help-inline red"> *微信支付 </span>
        </div>
    </div>
     <div class="form-group">
        <label class="control-label">appsecret : </label>
        <div class="controls pull-left">
            <input type="text" class="input-large" name="appsecret" value="<?php echo ($info["appsecret"]); ?>">
            <span class="help-inline red"> *微信支付 </span>
        </div>
    </div>
     <div class="form-group">
        <label class="control-label">商户IDpartnerid : </label>
        <div class="controls pull-left">
            <input type="text" class="input-large" name="partnerid" value="<?php echo ($info["partnerid"]); ?>">
            <span class="help-inline red"> *微信支付 </span>
        </div>
    </div>
     <div class="form-group">
        <label class="control-label">支付宝账号user : </label>
        <div class="controls pull-left">
            <input type="text" class="input-large" name="user" value="<?php echo ($info["user"]); ?>">
            <span class="help-inline red"> *支付宝 </span>
        </div>
    </div>
     <div class="form-group">
        <label class="control-label">支付宝pid : </label>
        <div class="controls pull-left">
            <input type="text" class="input-large" name="pid" value="<?php echo ($info["pid"]); ?>">
            <span class="help-inline red"> *支付宝 </span>
        </div>
    </div>
     <div class="form-group">
        <label class="control-label">支付宝key : </label>
       <div class="controls pull-left">
            <input type="text" class="input-large" name="key" value="<?php echo ($info["key"]); ?>">
            <span class="help-inline red"> *支付宝 </span>
        </div>
    </div>
     <div class="form-group">
        <label class="control-label">百度钱包bpartnerid: </label>
       <div class="controls pull-left">
            <input type="text" class="input-large" name="bpartnerid" value="<?php echo ($info["bpartnerid"]); ?>">
            <span class="help-inline red"> *百度钱包 </span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">百度钱包bpaysignkey: </label>
        <div class="controls pull-left">
            <input type="text" class="input-large" name="bpaysignkey" value="<?php echo ($info["bpaysignkey"]); ?>">
            <span class="help-inline red"> *百度钱包 </span>
        </div>
    </div>
     <div class="form-group">
        <label class="control-label"></label>
       <div class="controls pull-left">
            
            <span class="help-inline red"> （注意：添加支付方式时非该支付方式项不用填） </span>
        </div>
    </div>
                    <div class="form-actions">
                        <input type="hidden" name="adminid" value="<?php echo ($_GET['id']); ?>" />
                        <button id="bsubmit" type="submit"  class="btn btn-sm btn-primary">保存</button>
                    </div>
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