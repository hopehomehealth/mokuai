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
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>jeDate.css">


    <script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-2.1.3.min.js'></script>
    <script type="text/javascript" src="<?php echo (JS_URL); ?>city-data.js"></script>
    <script type="text/javascript" src="<?php echo (JS_URL); ?>hzw-city-picker.min.js"></script>
    <script type="text/javascript" src="<?php echo (JS_URL); ?>jeDate.js"></script>
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



        <script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-1.7.2.min.js'></script>
<div class="main-content">

    <div class="page-content">
        <div class="row">
            <div class="page-content box">
                <div class="box-title margin_bot_20">
                    <div class="span10">
                        <h3><i class="icon-cogs"></i>评估师列表</h3>
                    </div>
                </div>
                <form class="form-horizontal" action="<?php echo U('/Admin/Assess/index');?>">
                    <div class="form-group">
                        <label class="control-label" style="width:80px;">评估师名 : </label>
                        <div class="controls pull-left">
                            <input type="text" class="input-medium" name="keywords">
                            <button type="submit" class="btn btn-sm btn-primary">搜索</button>
                        </div>
                    </div>
                </form>
                <table class="table table-striped table-bordered table-hover" style="text-align:center">
                    <thead>
                    <tr><th width="55px" >评估师ID</th>
                        <th width="75px">图像</th>
                        <th width="100px">姓名</th>
                        <th width="50px">性别</th>
                        <th width="50px">年龄</th>
                        <th width="100px">电话</th>
                        <th width="100px">城市</th>
                        <th width="100px">详细地址</th>
                        <th width="100px">账户余额</th>
                        <th width="50px">认证状态</th>
                        <th width="200px">操作</th>
                    </tr></thead>
                    <tbody>
                    <?php if(is_array($assessList)): foreach($assessList as $k=>$v): ?><tr>
                            <td><?php echo ($v["userid"]); ?></td>
                            <td><img src="" style="width:75px;height:75px;border-radius:50%;margin:0px"></td>
                            <td><?php echo ($v["username"]); ?></td>
                            <td><?php echo ($v['sex']?"男":"女"); ?></td>
                            <td><?php echo ($v["age"]); ?></td>
                            <td><?php echo ($v["iphone"]); ?></td>
                            <td><?php echo ($v["city"]); ?></td>
                            <td><?php echo ($v["area"]); ?></td>
                            <td><?php echo ($v["money"]); ?></td>
                            <td><?php echo ($v['status']?"<span style='color:green'>已认证</span>":"<span style='color:red'>未认证</span>"); ?></td>
                            <td style="text-align:left">
                                <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                    <a class="green moreinfo" href="#"> <i class="icon-eye-open bigger-130"></i>&nbsp;<span>详细资料∨</span> <input type="hidden" name="userid" value="<?php echo ($v["userid"]); ?>"></a>
                                    <?php if($v["status"] == 0): ?><a class="green" href="/index.php/Admin/Assess/confirm/userid/<?php echo ($v["userid"]); ?>"> <i class="icon-ok bigger-130"></i>&nbsp;认证 </a><?php else: endif; ?>
                                    <?php if($v["status"] == 1): ?><a class="red detail" href="/index.php/Admin/Assess/cancel/userid/<?php echo ($v["userid"]); ?>"> <i class="icon-remove bigger-130"></i>&nbsp;取消认证 </a><?php else: endif; ?>
                                </div>
                            </td>
                        </tr>
                        <tr class="table-moreinfo<?php echo ($v["userid"]); ?>" style="display:none;text-align:center;vertical-align:middle">
                        <td colspan=11>
                        <form method="post" action="/index.php/Admin/Assess/upd">
                        <table class="table table-striped table-bordered table-moreinfo-assess">
                            <tr>
                                <th>姓名</th><td><input type="text" name="username" value="<?php echo ($v["username"]); ?>" readonly></td><th>性别</th><td><input type="radio" name="sex" <?php echo ($v['sex']?"":"checked"); ?> value="0">女&nbsp;<input type="radio" name="sex" <?php echo ($v['sex']?"checked":""); ?> value="1">男</td><th>年龄</th><td><input type="text" name="age" value="<?php echo ($v["age"]); ?>"></td><th>照片</th><td><img src="" style="width:75px;height:75px;border-radius:50%;margin:0px"></td>
                            </tr>
                            <tr>
                                <th>身份证号</th><td><input type="text" name="number" value="<?php echo ($v["number"]); ?>"></td><th>工作单位</th><td><input type="text" name="company" value="<?php echo ($v["company"]); ?>"></td><th>城市</th><td><input type="text" class="cityChoice" id="cityChoice<?php echo ($v["userid"]); ?>" name="city" value="<?php echo ($v["city"]); ?>"></td><th>详细地址</th><td><input type="text" name="area" value="<?php echo ($v["area"]); ?>"></td>
                            </tr>
                            <tr><input type="hidden" name="userid" value=<?php echo ($v["userid"]); ?>></tr>
                            <tr><th>学校</th><td><input type="text" name="school" value="<?php echo ($v["school"]); ?>"></td><th>评估信用</th><td><input type="text" name="credit" value="<?php echo ($v["credit"]); ?>"></td><td colspan=4><button type="submit">确认信息</td></tr>
                        </table>
                        </form>
                        </td>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>
                <script>
                var cityChoiceid="";
                $(".cityChoice").hover(function(){

                    cityChoiceid = $(this).attr("id");
                    //alert(cityChoiceid);
                    var cityPicker = new HzwCityPicker({
                    data: data,
                    target: cityChoiceid,
                    valType: 'k-v',
                    hideCityInput: {
                        name: 'city',
                        id: 'city'
                    },
                    hideProvinceInput: {
                        name: 'province',
                        id: 'province'
                    },
                    callback: function(){
                        
                    }
                });
                cityPicker.init();
                })      
                </script>
                <div class="green-black"><?php echo ($page); ?></div>
            </div>
        </div>
        <!--/.box-->
    </div><!-- /.page-content -->
</div><!-- /.main-content -->
<script type="text/javascript">
    var displaystatus = false;
   $(".moreinfo").click(function(){
        var userid = $(this).children("input").val();
        var classname="table-moreinfo"+userid;
        if(displaystatus == true){
            $(this).children("span").text("详细资料∨");
        }else{
            $(this).children("span").text("收起∧");
        } 
        $("."+classname).toggle("fast",function(){
            displaystatus = !displaystatus;
         });
    })
</script>

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