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



        <script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-1.7.2.min.js'></script>
<div class="main-content">
    <div class="page-content">
        <div class="row">
            <div class="page-content box">
    <div class="box-title margin_bot_20">
        <div class="span10">
            <h3><i class="icon-cogs"></i>护士资料</h3>
        </div>
    </div>
            <form method="post" action="/index.php/Admin/Nurse/upd" enctype="multipart/form-data">
            <table class="table table-striped table-bordered table-moreinfo-nurse" style="height:700px">
                <tr>
                    <th>姓名</th><td><input type="text" name="username" value="<?php echo ($nurseinfo["username"]); ?>"></td><th>性别</th><td><input type="radio" name="sex" <?php echo ($nurseinfo['sex']?"":"checked"); ?> value="0">女&nbsp;<input type="radio" name="sex" <?php echo ($nurseinfo['sex']?"checked":""); ?> value="1">男</td><th>工作单位</th><td><input type="text" name="company" value="<?php echo ($nurseinfo["company"]); ?>"></td><th>照片</th><td><?php if($nurseinfo["photo"] == ''): ?><img src="<?php echo (IMG_URL); ?>pgtu.jpg" style="width:75px;height:75px;border-radius:50%;margin:0px"><?php else: ?><img src="/Public/<?php echo ($nurseinfo["photo"]); ?>" style="width:75px;height:75px;border-radius:50%;margin:0px"><?php endif; ?><br/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="photo" style="display:inline;width:200px"></td>
                </tr>
                <tr>
                    <th>身份证号</th><td><input type="text" name="number" value="<?php echo ($nurseinfo["number"]); ?>"></td><th>职位类型</th><td><input type="text" name="type" value="<?php echo ($nurseinfo["type"]); ?>"></td><th>职称级别</th><td><input type="text" name="grade" value="<?php echo ($nurseinfo["grade"]); ?>"></td><th>护士级别</th><td><input type="text" name="level" value="<?php echo ($nurseinfo["level"]); ?>"></td>
                </tr>
                <tr>
                    <th>部门</th><td><input type="text" name="departments" value="<?php echo ($nurseinfo["departments"]); ?>"></td><th>护士工龄</th><td><input type="text" name="standing" value="<?php echo ($nurseinfo["standing"]); ?>"></td><th>证书编号</th><td><input type="text" name="certificate" value="<?php echo ($nurseinfo["certificate"]); ?>"></td><th>电话</th><td><input type="text" name="iphone" value="<?php echo ($nurseinfo["iphone"]); ?>"></td>
                </tr>
                <tr>
                    <th>学校</th><td><input type="text" name="school" value="<?php echo ($nurseinfo["school"]); ?>"></td><th>城市</th><td>
                    <select name="province_id" class="province selectarea">
                        <option value=''><?php if($nurseinfo["city"] == ''): ?>省<?php else: echo ($nurseinfo["city"]); endif; ?></option>
                        <?php if(is_array($provincelist)): foreach($provincelist as $key=>$provinceinfo): ?><option value="<?php echo ($provinceinfo["id"]); ?>"><?php echo ($provinceinfo["name"]); ?></option><?php endforeach; endif; ?>
                    </select>
                    <select name="city_id" class="city selectarea" style="visibility:hidden">
                    </select>
                    <select name="country_id" class="country selectarea" style="visibility:hidden">
                    </select>
                    <input type="hidden" name="city" value="<?php echo ($nurseinfo["city"]); ?>"> 
                </td><th>详细地址</th><td><input type="text" name="area" value="<?php echo ($nurseinfo["area"]); ?>"></td><th>籍贯</th><td><input type="text" name="origin" value="<?php echo ($nurseinfo["origin"]); ?>"></td>
                </tr>
                <input type="hidden" name="userid" value="<?php echo ($nurseinfo["userid"]); ?>">
                <input type="hidden" name="oldphoto" value="<?php echo ($nurseinfo["photo"]); ?>">
                <tr>
                    <th>工作经历</th><td colspan=7><textarea rows="5" cols="60" name="experience"><?php echo ($nurseinfo["experience"]); ?></textarea></td>
                </tr>
                <tr>
                    <td colspan=8><button class="btn btn-biger submit" type="submit">确认信息</td>
                </tr>
            </table>
            </form>
    <script type="text/javascript">
            $(function(){
                    var provinceid,cityid,countryid; 
                    var provincename,cityname,countryname;
                    var areaname;
                    $(".province").change(function(){
                        var index = $(this).get(0).selectedIndex;
                        if(index == 0){
                            $(this).siblings('.selectarea').css("visibility","hidden");
                            return;
                        }else{
                            $(".city").css("visibility","visible");
                            provinceid = $(this).val();
                            provincename = $(".province option:selected").text();
                            //alert(provincename);
                            $.post("/index.php/Admin/Assess/getcity",{'upid':provinceid},function(data){
                                if(data.error ==  1){

                                }else{
                                    var cityhtml = "<option value=''>市</option>";
                                    var datalist = data.content;
                                    for(var i in datalist){
                                        cityhtml+="<option value='"+datalist[i].id+"'>"+datalist[i].name+"</option>";
                                    }
                                    $(".city").eq(0).html(cityhtml);
                                }
                            })
                        }
                        //计算出选择省在数组中的下标
                    })
                    $(".city").change(function(){
                        var index = $(this).get(0).selectedIndex;
                        if(index == 0){
                            $(".country").css("visibility","hidden");
                            return;
                        }else{
                            $(".country").css("visibility","visible");
                            cityid = $(this).val();
                            cityname = $(".city option:selected").text();
                            //alert(cityid);
                            $.post("/index.php/Admin/Assess/getcity",{'upid':cityid},function(data){
                                if(data.error ==  1){

                                }else{
                                    var countryhtml = "<option value=''>县/区</option>";
                                    var datalist = data.content;
                                    for(var i in datalist){
                                        countryhtml+="<option value='"+datalist[i].id+"'>"+datalist[i].name+"</option>";
                                    }
                                    $(".country").eq(0).html(countryhtml);
                                }
                            })
                        }
                        //计算出选择省在数组中的下标
                    })
                    $(".country").change(function(){
                        var index = $(this).get(0).selectedIndex;
                        if(index == 0){
                            return;
                        }else{
                            countryid = $(this).val();
                            countryname = $(".country option:selected").text();
                            areaname = provincename+cityname+'市'+countryname;
                            //$(".country option:selected").text(areaname);
                            $("input[name='city']").val(areaname);
                        }
                    })
                })
        </script>
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