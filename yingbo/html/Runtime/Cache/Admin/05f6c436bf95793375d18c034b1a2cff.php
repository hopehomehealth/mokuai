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
<script type="text/javascript" src="<?php echo (JS_URL); ?>jedate.js"></script>
<div class="main-content">

    <div class="page-content">
        <div class="row">
            <div class="page-content box">
                <div class="box-title margin_bot_20">
                    <div class="span10">
                        <h3><i class="icon-cogs"></i>订单详情</h3>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-orderinfo">
                    <tr style="background:gray"><td colspan=4><h3>基本信息</h3></td></tr>
                    <tr>
                        <th>订单编号</th><td><?php echo ($orderinfo["ordernumber"]); ?></td><th>订单状态</th><td><?php if($orderinfo["if_say"] == '1'): ?><span style="color:green">已支付</span><?php else: ?><span style="color:red">未支付</span><?php endif; ?>、<?php if($orderinfo["status"] == '0'): ?><span style="color:red">未完成</span><?php elseif($orderinfo["status"] == '1'): ?><span style="color:orange">进行中</span><?php elseif($orderinfo["status"] == '2'): ?><span style="color:green">已完成</span><?php else: endif; ?>（<span style="color:green">完成后支付</span>）</td>
                    </tr>
                    <tr>
                        <th>患者姓名</th><td><a href="/index.php/Admin/Patient/upd/userid/<?php echo ($orderinfo["userid"]); ?>"><?php echo ($orderinfo["username"]); ?></a></td><th>详细地址</th><td><?php echo ($orderinfo["area"]); ?></td>
                    </tr>
                    <tr>
                        <th>下单时间</th><td><?php echo (date("Y-m-d H:i:s",$orderinfo["inputtime"])); ?></td><th>联系电话</th><td><?php echo ($orderinfo["iphone"]); ?></td>
                    </tr>
                    <?php if($orderinfo["shopid"] == ''): ?><tr>
                            </td><th>接单时间</th><td><?php if($orderinfo["pingtime"] != ''): echo (date("Y-m-d H:i:s",$orderinfo["pingtime"])); else: endif; ?></td><th>处理时间</th><td><?php if($orderinfo["pingctime"] != ''): echo (date("Y-m-d H:i:s",$orderinfo["pingctime"])); else: endif; ?></td>
                        </tr>
                        <tr>
                            <th>完成时间</th><td><?php if($orderinfo["pingwtime"] != ''): echo (date("Y-m-d H:i:s",$orderinfo["pingwtime"])); else: endif; ?></td><th>选择评估师</th><td>检索范围：<select name="fanwei" style="height:34px" id="fanwei"><option value='1'>省</option><option value='2'>市</option><option value='3'>区/县</option></select>检索日期：<input type="text" id="assessdate" style="width:117px;height:34px" placeholder="请选择日期" readonly>&nbsp;&nbsp;<button id="importassess">导入</button>&nbsp;&nbsp;<select name="comid" id="selectassess" style="height:34px">
                                <option value="">--评估师--</option>
                            </select><button class="btn btn-sm" id="btn-assess" style="margin-bottom:3px">确认</button><i></i></td>
                        </tr>
                        <tr>
                            <th>评估师信息</th><td colspan=3 id="assessinfo"><?php if($assessinfo != ''): ?><b style="color:green">姓名：<?php echo ($assessinfo["username"]); ?>&nbsp; &nbsp;&nbsp;电话：<?php echo ($assessinfo["iphone"]); ?> &nbsp; &nbsp;&nbsp;详细地址：<?php echo ($assessinfo["area"]); ?></b><?php else: ?><b style="color:red">没有选择评估师</b><?php endif; ?></td>
                        </tr>
                        <tr>
                            <th>患者描述</th><td colspan=3><?php echo ($orderinfo["casexl"]); ?></td>
                        </tr>
                        <tr>
                            <th>评估建议</th><td colspan=3><?php echo ($orderinfo["evaluate"]); ?></td>
                        </tr><?php endif; ?>
                    <?php if($orderinfo["shopid"] == ''): ?><tr>
                            <th>评估费用</th><td colspan=3><input type="text" name="psum" id="productpsum" value="<?php echo ($orderinfo["psum"]); ?>" placeholder="请输入评估费用"></td>
                        </tr>
                        <tr>
                            <th>订单总额</th><td colspan=3 id="productssum" style="padding-left:10px;font-size:1.5em"><?php echo ($orderinfo["ssum"]); ?></td>
                        </tr>
                    <?php else: ?>
                        <tr>
                            <th>数&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;量</th><td><?php echo ($orderinfo["number"]); ?></td><th>订单总额</th><td><?php echo ($orderinfo["ssum"]); ?></td>
                        </tr><?php endif; ?>
                    <?php if($orderinfo["shopid"] != ''): ?><tr style="background:#f9f9f9">
                        <td colspan=4><h3>子订单信息</h3></td>
                    </tr>
                    <tr>
                        <td colspan=4>
                        <?php if(is_array($orderinfo["suborderList"])): foreach($orderinfo["suborderList"] as $key=>$suborder): ?><table class="table-bordered table-orderinfo" style="width:100%;background:#cccc99;margin:2px auto">
                                <tr>
                                    <th>订单编号</th><td><?php echo ($suborder["ordernumber"]); ?></td><th>订单状态</th><td><?php if($suborder["if_nay"] == '1'): ?><span style="color:green">已支付</span><?php else: ?><span style="color:red">未支付</span><?php endif; ?>、<?php if($suborder["status"] == '0'): ?><span style="color:red">未完成</span><?php elseif($suborder["status"] == '1'): ?><span style="color:orange">进行中</span><?php elseif($suborder["status"] == '2'): ?><span style="color:green">已完成</span><?php else: endif; ?></td>
                                </tr>
                                <tr>
                                    <th>下单时间</th><td><?php echo (date("Y-m-d H:i:s",$suborder["inputtime"])); ?></td><th>接单时间</th><td><?php echo (date("Y-m-d H:i:s",$suborder["hutime"])); ?></td>
                                </tr>
                                <tr>
                                    <th>处理时间</th><td><?php echo (date("Y-m-d H:i:s",$suborder["huctime"])); ?></td><th>完成时间</th><td><?php echo (date("Y-m-d H:i:s",$suborder["huwtime"])); ?></td>
                                </tr>
                                <tr>
                                    <th>选择护士</th><td><input type="text" class="nursedate" id="nursedate<?php echo ($suborder["orderid"]); ?>" style="width:117px;height:34px" placeholder="请选择日期" readonly><button class="importnurse">导入</button><select name="comid" id="selectnurse<?php echo ($suborder["orderid"]); ?>" style="height:34px">
                                        <option value="">--护士--</option>
                                    </select><button class="btn btn-sm btn_nurse" style="margin-bottom:3px">确认</button><i></i></td><th rowspan=2>护士信息</th><td id="nurseinfo<?php echo ($suborder["orderid"]); ?>" rowspan=2><?php if($suborder["nurseinfo"] != ''): ?><b style="color:green">姓名：<?php echo ($suborder["nurseinfo"]["username"]); ?> 电话：<?php echo ($suborder["nurseinfo"]["iphone"]); ?> 详细地址：<?php echo ($suborder["nurseinfo"]["area"]); ?></b><?php else: ?><b style="color:red;font-size:16px">没有选择护士</b><?php endif; ?></td>
                                </tr>
                                <tr>
                                    <th>订单金额</th><td><?php echo ($suborder["nsum"]); ?></td>
                                </tr>
                            </table><?php endforeach; endif; ?>
                        </td>
                    </tr><?php endif; ?>
                </table>
               <div class="green-black"><?php echo ($page); ?></div>
            </div>
        </div>
        <!--/.box-->
    </div><!-- /.page-content -->
</div><!-- /.main-content -->
<script type="text/javascript">
    jeDate({
        dateCell:"#assessdate",
        format:"YYYY-MM-DD",
        isinitVal:true,
        isTime:true, //isClear:false,
        minDate:"2014-09-19 00:00:00",
        okfun:function(val){alert(val)}
    })
</script>
<script type="text/javascript">
    $(function(){
        var userid = <?php echo ($orderinfo["userid"]); ?>;
        var orderid = <?php echo ($_GET['orderid']); ?>;
        var suborderid;
        var nursedate = '';
        var selectnurse = '';
        var nurseinfo = '';
        $(".nursedate").mouseover(function(){
            suborderid = $(this).attr("id").replace('nursedate','');
            nursedate = 'nursedate'+suborderid;
            selectnurse = 'selectnurse'+suborderid;
            nurseinfo = 'nurseinfo'+suborderid;
            jeDate({
                dateCell:"#"+nursedate,
                format:"YYYY-MM-DD",
                isinitVal:true,
                isTime:true, //isClear:false,
                minDate:"2014-09-19 00:00:00",
                okfun:function(val){alert(val)}
            })
        })
        $('#importassess').click(function(){
            //$(this).attr("disabled",true);
            var arr=$('#assessdate').get(0).value.split('-');
            var fanwei = $("#fanwei").val();
            $.post("/index.php/Admin/Schedule/ajaxAssess",{"year":arr[0],"month":arr[1],"day":arr[2],"userid":userid,"fanwei":fanwei},function(data){
                if(data.error == 1){
                }else{
                   var assessstr = "<option value=''>--评估师--</option>"; 
                   for(var i=0 in data.content){
                        assessstr += "<option value='"+data.content[i].userid+'-'+data.content[i].id+"'>"+data.content[i].username+"</option>";
                   }
                   $('#selectassess').html(assessstr);
                }
            })
        })
        $("#btn-assess").click(function(){
            $.post("/index.php/Admin/Yuyue/handleOrder",{"orderid":orderid,"comid":$('#selectassess').val()},function(data){
                if(data.error == 1){
                }else{
                    $("#assessinfo").text(data.content);
                }
            })
        })
        $("#productpsum").blur(function(){
            var psum = $(this).val();
            var newpsum = '';
            if(isNaN(psum)){
                psum = '0.00';
            }else{
                psum = Math.abs(psum)+'';
                if(psum.indexOf('.') == -1){
                    psum += '.00'; 
                }else{
                    for(var i=0;i<psum.length;i++){
                        if(psum[i] == '.'){
                            newpsum += '.';
                            if(psum[i+1] != 'Undefined'){
                                newpsum += psum[i+1];
                            }else{
                                newpsum += psum[i];
                            }
                            if(psum[i+2] != 'Undefined'){
                                newpsum += psum[i+2];
                            }else{
                                newpsum += psum[i];
                            }
                                break;
                            }
                                newpsum += psum[i]; 
                        }
                        psum = newpsum;
                    }
            }
            $(this).val(psum);
            $.post("/index.php/Admin/Yuyue/productssum",{"orderid":orderid,"psum":psum},function(data){
                if(data.error == 1){

                }else{
                    $("#productssum").text(psum);
                }
            });

        })
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