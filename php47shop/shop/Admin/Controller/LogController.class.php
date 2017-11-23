<?php
namespace Admin\Controller;
use Tools\AdminController;

//后台控制器
class LogController extends AdminController {
    //展示操作日志信息
    function showlist(){
        //获得mongo的日志信息，并传递给模板展示
        $m = new \MongoClient('mongodb://linken2:1234@localhost:27017/shop45');

        //$m是MongoClient对象
        $shop45 = $m->shop45;//选取操作的数据库

        //按照时间降序 获得日志信息
        //$minfo = $shop45->log->find()->sort(array('time'=>-1))->skip(1)->limit(2);
        $minfo = $shop45->log->find()->sort(array('time'=>-1));
        //dump($minfo);//object(MongoCursor)#10 (0)

        //变换$minfo对象 ----> 数组Array
        $info = array();
        $i=1;
        foreach($minfo as $k => $v){
            $info[$i]['time'] = date("Y-m-d H:i:s",$v['time']);
            $info[$i]['operator'] = $v['operator'];
            $info[$i]['ip'] = $v['ip'];
            $info[$i]['msg'] = $v['msg'];
            $i++;
        }
        $this -> assign('info',$info);
        $this -> display();
    }
}

