<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Mobile\Controller;
use Common\Common\FooterController;
class ScheduleController extends FooterController {
    function mark(){
        $userid = $_SESSION['userInfo']['userid'];
        if($_POST){
            //var_dump($_POST);
            $schedule = D('user_schedule');
            $data = $_POST['datapacket'];
            $deldata = array();
            $adddata = array();
            foreach($data as $key =>$value){
                if(($value['count'])%2 == 0){
                    //unset($data[$key]);
                    continue;
                }else{
                    if($value['flag'] == "true"){
                    unset($value['flag']);
                    $value['userid'] = $userid;
                    $adddata[] =  $value;
                }else{
                    unset($value['flag']);
                    $value['userid'] = $userid;
                    $deldata[] = $value;
                }
                }
            }
            //var_dump($deldata);//var_dump($adddata);exit;
            //$schedule ->where()->delete();
            $schedule -> addAll($adddata);
            foreach($deldata as $value){
                $map['year'] =$value['year'];
                $map['month'] =$value['month'];
                $map['day'] = $value['day'];
                $map['userid'] = $value['userid'];
                $schedule ->where($map)->delete();
            }
            $this->ajaxReturn(array(
                    'error'=>0
                ));
        }

    }
}