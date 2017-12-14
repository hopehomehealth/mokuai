<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>蓝海长青后台管理系统</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="<?php echo (CSS_URL); ?>bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>ace.min.css" />
    <link rel="stylesheet" href="<?php echo (CSS_URL); ?>page.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>style.css">

</head>
<body>
<div class="navbar navbar-default">
    <div class="navbar-container">
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>蓝海长青管理后台 </small>
            </a>
        </div><!-- /.navbar-header -->
        <div class="navbar-header pull-right">
            <ul class="nav ace-nav">
                <li >
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <i class="icon-user bigger-140"></i><?php echo (session('admin_name')); ?>
                    </a>
                    <!--<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">-->
                        <!--<li>-->
                            <!--<a href="">-->
                                <!--<i class="icon-edit"></i>-->
                                <!--修改密码-->
                            <!--</a>-->
                        <!--</li>-->
                    <!--</ul>-->
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
                                <e><img src="<?php echo (IMG_URL); ?>tb.png" alt="" style="padding-left: 6px;padding-right: 6px;"/></e>
                                <span class="menu-text"><?php echo ($v["auth_name"]); ?></span>
                            </a>         
                        </li>
                    <?php elseif(($v["auth_a"] == '') AND ($v["auth_c"] == '')): ?>
                        <li>
                            <a class="dropdown-toggle">
                                <e><img src="<?php echo (IMG_URL); ?>tb.png" alt="" style="padding-left: 6px;padding-right: 6px;"/></e>
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
        
        <script type="text/javascript" src='<?php echo (JS_URL); ?>jquery-2.1.3.min.js'></script>
<script type="text/javascript" src='<?php echo (JS_URL); ?>uploadPreview.js'></script>
<div class="main-content">

    <div class="page-content">
        <div class="row">
            <div class="page-content box">
                <div class="box-title margin_bot_20">
        <div class="span10">
            <h3><i class="icon-magic"></i>栏目页广告添加</h3>
        </div>
    </div>
                <form action="/index.php/Admin/Banner/tianjia.html" method="post" class="form-horizontal" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="control-label">名称 : </label>
                        <div class="controls pull-left">
                            <input type="text" class="input-large" name="banner_title">
                            <span class="help-inline red"> * </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">关键字 : </label>
                        <div class="controls pull-left">
                            <input type="text" class="input-large" name="keyword">
                            <span class="help-inline red"> * </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">描　　述 : </label>
                        <div class="controls pull-left">
                            <textarea class="input-large" style="margin: 0px; height: 115px; width: 530px;" name="description"></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label">链接地址 : </label>
                        <div class="controls pull-left">
                            <input type="text" class="input-large" name="url">
                            <span class="help-inline red"> * 注：必须以http://或https://开头  例如：http://www.hlnv.com</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">主栏目 : </label>
                        <div class="controls pull-left">
                            <select id='main_lan0' name='lan_id' onchange='show_lan1()'>
                                <option value='0'>-请选择-</option>
                                <?php if(is_array($laninfoA)): foreach($laninfoA as $key=>$v): ?><option value="<?php echo ($v["lan_id"]); ?>"><?php echo ($v["lan_title"]); ?></option><?php endforeach; endif; ?>
                            </select>
                            <span class="help-inline red"> * </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">扩展栏目 : </label>
                        <div class="controls pull-left">
                            <select id='ext_lan1' name='ext_lan[]'>
                                <option value='0'>-请选择-</option></select>
                            <span class="help-inline red"> * </span>
                        </div>
                    </div>
                    <script type='text/javascript'>
                        //主分类切换显示第一个扩展分类
                        function show_lan1(){
                            //获得当前选取的主分类id信息
                            var lan_id = $('#main_lan0').val();

                            //不显示分类信息处理
                            if(lan_id==0){
                                $('#ext_lan1 option:gt(0)').remove();//清除旧数据标签
                            }else{
                                //让ajax带着lan_id信息，去服务器端获得子级分类信息
                                $.ajax({
                                    url:"/index.php/Admin/Lanmu/getLanByPid",
                                    data:{'lan_id':lan_id},
                                    dataType:'json',
                                    type:'get',
                                    success:function(msg){
                                        var s = "";
                                        //遍历msg并与html标签(option)结合，最后追加给页面
                                        $.each(msg,function(){
                                            s += "<option value='"+this.lan_id+"'>--/"+this.lan_title+"</option>";
                                        });
                                        $('#ext_lan1 option:gt(0)').remove();//清除旧数据标签
                                        $('#ext_lan1').append(s);//追加新标签
                                    }
                                });
                            }
                        }

                    </script>

                    <div class="form-group">
                        <label class="control-label">展示位置 : </label>
                        <div class="controls pull-left">
                            <label>
                                <input type="radio" class="ace" name="is_area"  value="0">
                                <span class="lbl">顶部</span>
                                <span class="help-inline red"> * 图片建议尺寸</span>
                            </label> <br/>
                            <label>
                                <input type="radio" class="ace" name="is_area" value="1">
                                <span class="lbl">中部</span>
                                <span class="help-inline red"> * 图片建议尺寸</span>
                            </label> <br/>
                            <label>
                                <input type="radio" class="ace" name="is_area" value="2">
                                <span class="lbl">底部</span>
                                <span class="help-inline red"> * 图片建议尺寸</span>
                            </label> <br/>
                            <label>
                                <input type="radio" class="ace" name="is_area" value="3">
                                <span class="lbl">右下一</span>
                                <span class="help-inline red"> * 图片建议尺寸</span>
                            </label> <br/><label>
                                <input type="radio" class="ace" name="is_area" value="4">
                                <span class="lbl">右下二</span>
                            <span class="help-inline red"> * 图片建议尺寸</span>
                        </label> <br/><label>
                                <input type="radio" class="ace" name="is_area" value="5">
                                <span class="lbl">右下三</span>
                            <span class="help-inline red"> * 图片建议尺寸</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">图片 : </label>
                        <div class="controls pull-left">
                            <input type="file" class="input-large" id="pic" name="pic" >
                            <div id="pic_div"><img id='pic_img' width='600' height='130'></div>
                        </div>
                    </div>
                    <script type='text/javascript'>
                        $(function(){
                            new uploadPreview({ UpBtn: "pic", DivShow: "pic_div", ImgShow: "pic_img" });
                        });
                    </script>
                    <div class="form-group">
                        <label class="control-label">是否显示 : </label>
                        <div class="controls pull-left">
                            <label>
                                <input type="radio" class="ace" name="is_show" checked="checked" value="0">
                                <span class="lbl">是</span>
                            </label>
                            <label>
                                <input type="radio" class="ace" name="is_show" value="1">
                                <span class="lbl">否</span>
                            </label>
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


<script src='<?php echo (JS_URL); ?>jquery-2.1.3.min.js'></script>
<script type="text/javascript">
    $('.active').parent().parent().addClass("active open");
</script>
<script src="<?php echo (JS_URL); ?>ace-extra.min.js"></script>
<script src="<?php echo (JS_URL); ?>bootstrap.min.js"></script>
<script src="<?php echo (JS_URL); ?>ace.min.js"></script>
</body>
</html>