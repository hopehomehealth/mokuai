<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class OrderController extends AdminController
{
    //商品列表
    function index()
    {
        if($_POST['keywords']){
            $map['ordernumber'] = trim($_POST['keywords']);
        }
        if(isset($_GET['type'])){
            foreach($_GET['type'] as $key=>$value){
                if($value == 1){
                    $map['if_say'] = '1';
                    $title1 = '已支付';
                    $if_say = 1;
                    $this->assign('if_say',$if_say);
                }else if($value == 2){
                    $map['if_say'] = '0';
                    $title2 = '未支付';
                    $if_say = 2;
                    $this->assign('if_say',$if_say);
                }else if($value == 3){
                    $map['status'] = '2';
                    $title3 = '已完成';
                    $status = 2;
                    $this->assign('status',$status);
                }else if($value == 4){
                    $map['status'] = array('neq','2');
                    $title4 = '未完成';
                    $status = 88;
                    $this->assign('status',$status);
                }
            }
        }
        $title = $title1.$title2.$title3.$title4.'--服务订单';
           $this->assign('title',$title); 
    
        
        //dump($map);die;
        $map['shopid'] = array('NEQ',''); 
        $order = D('user_order');
        $count = $order ->where($map)-> count();
        $p = new \Think\Page($count,10);
        $orderList = $order ->where($map)-> order('orderid desc') ->limit($p->firstRow.','.$p->listRows)-> select();
        $time = time();
        foreach($orderList as $key => $value){
            $orderList[$key]['hours'] = floor(($time-$value['inputtime'])/3600);
        }
        $page = $p->show();
        $first = $_GET['p']?$_GET['p']:"1";
        $this -> assign('firstno',($first-1)*10+1);
        $this -> assign('page',$page);
        $this -> assign('orderList',$orderList);
        $this->display();
    }
    function orderinfo(){
        $orderid = $_GET['orderid']; 
        $model = D();
        $suborder = D('user_suborder');
        $assess = D('user_assess');
        $nurse = D('user_nurse');
        $orderinfo = $model ->query("select a.*,b.userid,b.username,b.area,b.iphone from lh_user_order as a,lh_user_patient as b where a.userid = b.userid AND a.orderid = {$orderid}");
        //dump($orderinfo);exit;
        $orderinfo = $orderinfo[0];
        if(!empty($orderinfo['auserid'])){
            $assessinfo = $assess ->find($orderinfo['auserid']);
            $this ->assign('assessinfo',$assessinfo);
        }
        $suborderList = $suborder ->where("parent_id = {$orderinfo['orderid']}")->select();
        foreach($suborderList as $key => $value){
            if(!empty($value['nurseid'])){
                $nurseinfo = $nurse ->find($value['nurseid']);
                $suborderList[$key]['nurseinfo'] = $nurseinfo;
            }
        }
        $orderinfo['suborderList'] = $suborderList;      
        //dump($orderinfo);exit;
        $this ->assign("orderinfo",$orderinfo);
        $this ->display();
    }

     function loseeffect(){
        $orderid = $_GET['orderid'];
        $data['status'] = '3';
        M('user_suborder')->where("orderid = {$orderid}")->save($data);
        $this->success('取消订单成功!');
    }

  function outexcelp(){
        // $pa = I('get.p');
        // $title = I('get.title');
        // $map['if_say'] = $_GET['if_say'];

        //     $map['o.status'] = array('neq','2');
$title = '服务订单汇总';

          $orderList = D('user_suborder')->alias('s')
        ->field("s.ordernumber,s.inputtime,s.if_nay,s.status,s.hutime,s.huctime,s.huwtime,s.nsum,s.fuwutime,p.userid,p.username as pusername,p.iphone as piphone,p.area as parea,n.username as ausername,n.iphone as aiphone,n.area as aarea,o.number")
        ->join("left join lh_user_patient as p on s.userid = p.userid") 
        ->join("left join __USER_NURSE__ as n on n.userid = s.nurseid")
         ->join("left join __USER_ORDER__ as o on o.orderid = s.parent_id")
        // ->where($map)
      
     
        -> select();

        //dump($orderList);die;
        $this->chuangexcel($orderList,$title,$pa);
    }
  //   function outexcel(){
  // $map['loseeffect'] = '0';
  //               if($_GET['type'] == 1){
  //                   $map['auserid'] = array('exp','is NULL'); 
  //                   $title ='待回访--预约评估订单';
  //               }else if($_GET['type'] == 2){
  //                   $map['issendmsg'] = '0';
  //                   $map['if_say'] = '1';
  //                   $title = '待推送服务--预约评估订单';
  //               }else if($_GET['type'] == 3){
  //                   $map['issendmsg'] = '1';
  //                   $map['o.status'] = '2';
  //                   $map['if_say'] = '1';
  //                   $title = '已完成--预约评估订单';
  //               }else if($_GET['type'] == 4){
  //                   $map['o.status'] = array('neq','2');
  //                   $map['if_say'] = '0';
  //                   $title = '未完成--预约评估订单';
  //               }else if($_GET['type'] == 5){
  //                   $map['loseeffect'] = '1';
  //                   $title = '无效--预约评估订单';
  //               }else{
           
  //       $title = '有效--预约评估订单';
  //       }
  //       /*if(isset($_GET['loseeffect'])){
  //           $map['loseeffect'] = $_GET['loseeffect'];
  //       }*/
  //       $map['shopid'] = array('exp','is NULL');
  //       //dump($map);exit; 
        

     
  //       $orderList = D('user_order')->alias('o')
  //       ->field("o.*,p.userid,p.username as pusername,p.iphone as piphone,p.area as parea,a.username as ausername,a.iphone as aiphone,a.area as aarea")
  //       ->join("left join lh_user_patient as p on o.userid = p.userid") 
  //       ->join("left join __USER_ASSESS__ as a on o.auserid = a.userid")
  //       ->where($map)
  //       ->order('orderid desc') 
     
  //       -> select();
  //       //dump($orderList);
  //       //dump($title);die;
      
  //       $this->chuangexcel($orderList,$title);
  //   }

 private function chuangexcel(&$data,$title,$pa){
        vendor("PHPExcel176.PHPExcel");

        // Create new PHPExcel object
        $objPHPExcel = new \PHPExcel();
        // Set properties
        $objPHPExcel->getProperties()->setCreator("ctos")
            ->setLastModifiedBy("ctos")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test result file");

        //set width
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(6);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(40);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(40);
         $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(40);
          $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(40);
           $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(40);
           $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(40);
        //设置行高度
        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(22);

        $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);

        //set font size bold
        $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(10);
        $objPHPExcel->getActiveSheet()->getStyle('A2:M2')->getFont()->setBold(true);

        $objPHPExcel->getActiveSheet()->getStyle('A2:M2')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('A2:M2')->getBorders()->getAllBorders()->setBorderStyle(\PHPExcel_Style_Border::BORDER_THIN);

        //设置水平居中
        $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
       
    

        //合并cell
        $objPHPExcel->getActiveSheet()->mergeCells('A1:M1');

        // set table header content
    
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', $title.'       时间:'.date('Y-m-d H:i:s').'                            '.$pa)
            ->setCellValue('A2', '序号')
            ->setCellValue('B2', '订单号')
            ->setCellValue('C2', '下单时间')
            ->setCellValue('D2', '接单时间')
            ->setCellValue('E2', '处理时间')
            ->setCellValue('F2', '完成时间')
            ->setCellValue('G2', '服务时间')
            ->setCellValue('H2', '姓名/电话/地址')
            ->setCellValue('I2', '护士/电话/地址')
            ->setCellValue('J2', '订单总额')
            ->setCellValue('k2', '次数')
            ->setCellValue('L2', '订单状态')
            ->setCellValue('M2', '备注');

        // Miscellaneous glyphs, UTF-8
        for($i=0;$i<count($data);$i++){
            $objPHPExcel->getActiveSheet(0)->setCellValue('A'.($i+3), $i+1);
            $objPHPExcel->getActiveSheet(0)->setCellValue('B'.($i+3), $data[$i]['ordernumber']);
            if($data[$i]['inputtime'] == ''){
            $objPHPExcel->getActiveSheet(0)->setCellValue('C'.($i+3), '');
            }else{
            $objPHPExcel->getActiveSheet(0)->setCellValue('C'.($i+3), date("Y-m-d H:i:s",$data[$i]['inputtime']));
            }
            if ($data[$i]['hutime'] == '') {
               $objPHPExcel->getActiveSheet(0)->setCellValue('D'.($i+3), ''); 
            }else{
             $objPHPExcel->getActiveSheet(0)->setCellValue('D'.($i+3), date("Y-m-d H:i:s",$data[$i]['hutime']));    
            }
            if($data[$i]['huctime'] == ''){
                $objPHPExcel->getActiveSheet(0)->setCellValue('E'.($i+3), '');
            }else{
             $objPHPExcel->getActiveSheet(0)->setCellValue('E'.($i+3), date("Y-m-d H:i:s",$data[$i]['huctime']));   
            }
            if($data[$i]['huwtime'] == ''){
                $objPHPExcel->getActiveSheet(0)->setCellValue('F'.($i+3), '');
            }else{
            $objPHPExcel->getActiveSheet(0)->setCellValue('F'.($i+3), date("Y-m-d H:i:s",$data[$i]['huwtime']));    
            }
            if($data[$i]['fuwutime'] == ''){
                $objPHPExcel->getActiveSheet(0)->setCellValue('G'.($i+3), '');
            }else{
            $objPHPExcel->getActiveSheet(0)->setCellValue('G'.($i+3), $data[$i]['fuwutime']);    
            }
            
            $objPHPExcel->getActiveSheet(0)->setCellValue('H'.($i+3), $data[$i]['pusername'].'/'.$data[$i]['piphone'].'/'.$data[$i]['parea']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('I'.($i+3), $data[$i]['ausername'].'/'.$data[$i]['aiphone'].'/'.$data[$i]['aarea']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('J'.($i+3), $data[$i]['nsum']);
            $objPHPExcel->getActiveSheet(0)->setCellValue('K'.($i+3), $data[$i]['number']);
            if($data[$i]['if_nay'] == 1){
                    $a = '已支付';
                }else{
                    $a = '未支付';
                }
                if ($data[$i]['status'] == 0) {
                    $b = '未完成';
                }else if($data[$i]['status'] == 1){
                    $b = '进行中';
                }else if($data[$i]['status'] == 2){
                    $b = '已完成';
                }
            $objPHPExcel->getActiveSheet(0)->setCellValue('L'.($i+3), $a.'/'.$b);
            $objPHPExcel->getActiveSheet(0)->setCellValue('M'.($i+3), '');
            $objPHPExcel->getActiveSheet()->getStyle('A'.($i+3).':M'.($i+3))->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('A'.($i+3).':M'.($i+3))->getBorders()->getAllBorders()->setBorderStyle(\PHPExcel_Style_Border::BORDER_THIN);
            $objPHPExcel->getActiveSheet()->getRowDimension($i+3)->setRowHeight(16);
        }

        //  sheet命名
        $objPHPExcel->getActiveSheet()->setTitle($title);


        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


        // excel头参数
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$title.'('.date('Ymd-His').').xls"');  //日期为文件名后缀
        header('Cache-Control: max-age=0');

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  //excel5为xls格式，excel2007为xlsx格式
        $objWriter->save('php://output');
    }
    


    function del(){
        $order = D('user_order');
        $order -> where("orderid = {$_GET['orderid']}")-> delete();
        D('user_suborder')->where("parent_id = {$_GET['orderid']}")->delete();
        $this -> success("成功取消订单");
    }
    function handleSubOrder(){
        //var_dump($_POST);exit;
        if($_POST){
            $order = D('user_suborder');
            $schedule = D('user_schedule');
            $nurse = D('user_nurse');
            $arr = explode('-',$_POST['comid']);
            $_POST['nurseid'] = $arr[0];
            $id = $arr[1];
            $_POST['hutime'] = time();
            $info = $schedule->find($id);
            if($info['ampm'] == 0){
                $ampm = '上午';
            }else if($info['ampm'] == 1){
                $ampm = '下午';
            }else if($info['ampm'] == 2){
                $ampm = '晚上';
            }
            $_POST['fuwutime'] = $info['year'].'-'.$info['month'].'-'.$info['day'].' '.$ampm;
            //var_dump($_POST);exit;
            if($order ->create()){
                if($order ->save()){
                    
                    $nurseinfo=$nurse ->find($_POST['nurseid']);
                    $this ->ajaxReturn(array(
                            "error" =>0,
                            'content'=>"姓名：".$nurseinfo['username']."    电话：".$nurseinfo['iphone'] ."    详细地址：".$nurseinfo['area']
                        ));
                }else{
                    $this ->ajaxReturn(array(
                            "error" =>1
                        ));
                }
            }
        }
    }

    /**
        @发送模板消息 
        @参数 orderid  订单id
    */
    function  f_msg(){
        $orderid = $_POST['orderid'];
        //定义model
        $user_model = M("user");
        //获取订单
        $hushi = M("user_suborder")->where(array('orderid'=>$orderid))->find();
        //var_dump($hushi);exit;
        $p_id = $hushi['nurseid'];  //护士id
        $userid = $hushi['userid']; //用户id

        //读取用户数据
        $user = D('user_patient')->where(array('userid'=>$userid))->find();

        $patient = $user_model->where(array('userid'=>$userid))->find(); //用户信息
        $user['openid'] = $patient['openid']; // 用户
        //var_dump($user);exit;
        $pinggu = D('user_nurse')->where(array('userid'=>$p_id))->find();
        $assess = $user_model->where(array('userid'=>$p_id))->find(); //护士信息

        $pinggu['openid'] = $assess['openid'];  //护士
        //var_dump($user_model->getlastsql());exit;
        //$p_dizhi =$pinggu;
        
        //获取 token
        $model = M('basic');
        $setting = $model->find();
        $json_token=$this->http_request("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$setting['appid']."&secret=".$setting['appsecret']);
        $access_token=json_decode($json_token,true);
        //获得access_token
        //$dizhi = $user;
        $fuwutime = $hushi['fuwutime'];
        $accesstoken=$access_token['access_token'];
        
        if(!$pinggu){
            echo '护士信息不完全';
        }else{
            $template=array(
                'touser'=>$pinggu['openid'],
                'template_id'=>"iqI6Wc1S9VAGz8CsdimHDCHSWBNaSvIIZlOfyLiarGc",
                //'url'=>"http://weixin.qq.com/download",
                'topcolor'=>"#7B68EE",
                'data'=>array(
                'first'=>array('value'=>urlencode("姓名：".$user['username'].'已经预约了您'.",患者电话：".$user['iphone'].",患者地址：".$user['area'].",上门服务时间：".$fuwutime),'color'=>"#000"),
                
                'remark'=>array('value'=>urlencode('用户已经匹配，请尽快处理！'),'color'=>'#000'),
                 )
            );
                //var_dump($template);exit;
            $json_template=json_encode($template);
            $url="https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$accesstoken;
            $res=json_decode($this->http_request($url,urldecode($json_template)));
        }
        
        //var_dump($p_dizhi);exit;
        if(!$user){
            echo '用户信息不完全';
        }else{
            $template=array(
            'touser'=>$user['openid'],
            'template_id'=>"iqI6Wc1S9VAGz8CsdimHDCHSWBNaSvIIZlOfyLiarGc",
            //'url'=>"http://weixin.qq.com/download",
            'topcolor'=>"#7B68EE",
            'data'=>array(
            'first'=>array('value'=>urlencode("恭喜您已经预约成功，护士姓名：".$pinggu['username'].',护士电话：'.$pinggu['iphone'].",上门服务时间：".$fuwutime),'color'=>"#000"),
            
            'remark'=>array('value'=>urlencode('请尽快联系护士确认时间吧！'),'color'=>'#000'),
             )
            );
            $json_template=json_encode($template);
            $url="https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=".$accesstoken;
            $res=json_decode($this->http_request($url,urldecode($json_template)));
        }
        echo "发送成功！";
        
    
    }

    function http_request($url,$data=array()){
        $ch = curl_init();//-----------------------
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        // 我们在POST数据哦！
        curl_setopt($ch, CURLOPT_POST, 1);
        // 把post的变量加上
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);//-----------------------
        curl_close($ch);//-----------------------
        return $output;
    }
    function optable(){
        $data['status'] = '1';
        $data['huwtime'] = '';
        M('user_suborder')->where("parent_id = 79")->save($data);echo 111;

    }
}