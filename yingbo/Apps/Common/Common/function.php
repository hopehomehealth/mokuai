<?php
function p($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";

}

/**
 * 生成红包
 * @param total 总钱，num红包个数 
 * @return data 红包数组
 */
function getBonus($total,$num){
    // $total=10;//红包总额 
    // $num=8;// 分成8个红包，支持8人随机领取 
    $min=0.01;//每个人最少能收到0.01元   
    $data = array();
    for ($i=0;$i<$num-1;$i++) 
    { 
        $safe_total=($total-($num-$i)*$min)/($num-$i);//随机安全上限 
        $money=mt_rand($min*100,$safe_total*100)/100; 
        $total=$total-$money; 
        $data[$i]['money']=$money;
        $data[$i]['left']=$total;
       
    } 
    $data[$i]['money']=sprintf("%.2f",$total);
    $data[$i]['left']=0;
    return $data;
}

/**
 * kindeditor获取内容转码
 * @param kindeditor获取内容转码
 * @return 转码后的内容
 */
 function getEditorContent($content){
    $htmlData = '';
    if (!empty($content)) {
        if (get_magic_quotes_gpc()) {
           $htmlData = stripslashes($content);
        } else {
           $htmlData = $content;
        }
        return htmlspecialchars_decode($htmlData);
     }
}

/**
 * 浏览记录按照时间排序
 */
function my_sort($a, $b){
    $a = substr($a,1);
    $b = substr($b,1);
    if ($a == $b) return 0;
    return ($a > $b) ? -1 : 1;
  }
/**
 * 网页浏览记录生成
 */
function cookie_history($id){
    $dealinfo['goodsId'] = $id;
    $time = 't'.NOW_TIME;
    $cookie_history = array($time => json_encode($dealinfo));  //设置cookie
    if (!cookie('history')){//cookie空，初始一个
        cookie('history',$cookie_history);
    }else{
        $new_history = array_merge(cookie('history'),$cookie_history);//添加新浏览数据
        uksort($new_history, "my_sort");//按照浏览时间排序
        $history = array_unique($new_history);
        if (count($history) > 20){
            $history = array_slice($history,0,20);
        }
        cookie('history',$history);
    }
}
/**
 * 搜索记录
 */
function searchHistory($name){
    $dealinfo['name'] = $name;
    $time = 't'.NOW_TIME;
    $cookie_history = array($time => json_encode($dealinfo));  //设置cookie
    if (!cookie('search')){//cookie空，初始一个
        cookie('search',$cookie_history);
    }else{
        $new_history = array_merge(cookie('search'),$cookie_history);//添加新浏览数据
        uksort($new_history, "my_sort");//按照浏览时间排序
        $history = array_unique($new_history);
        if (count($history) > 20){
            $history = array_slice($history,0,20);
        }
        cookie('search',$history);
    }
}
/**
 * 网页浏览记录读取
 */
function cookie_history_read($key){
    $arr = cookie($key);
    foreach ((array)$arr as $k => $v){
        $list[$k] = json_decode($v,true);
    }
    return $list;
}
/**
 * 获取网站域名
 */
function JHJYDomain(){
    $server = $_SERVER['SERVER_NAME'];
    $http = is_ssl()?'https://':'http://';
    return $http.$server.__ROOT__;
}

/**
 * 循环删除指定目录下的文件及文件夹
 * @param string $dirpath 文件夹路径
 */
function JHJYDelDir($dirpath){
    $dh=opendir($dirpath);
    while ($file=readdir($dh)) {
        if($file!="." && $file!="..") {
            $fullpath=$dirpath."/".$file;
            if(!is_dir($fullpath)) {
                unlink($fullpath);
            } else {
                WSTDelDir($fullpath);
                rmdir($fullpath);
            }
        }
    }    
    closedir($dh);
    $isEmpty = 1;
    $dh=opendir($dirpath);
    while ($file=readdir($dh)) {
        if($file!="." && $file!="..") {
            $isEmpty = 0;
            break;
        }
    }
    return $isEmpty;
}
/**
 * Excel导出
 * @param data 导出数据
 * @param title 表格的字段名 数组长度有限制，一般都够用，可以改变 $length1和$length2来增长
 * @param subject 表格主题 命名为主题+导出日期
 */
function exportExcel($data,$title,$subject){  
    Vendor('phpexcel.PHPExcel');
    Vendor('phpexcel.PHPExcel.IOFactory');
    Vendor('phpexcel.PHPExcel.Reader.Excel5');
    // Create new PHPExcel object  
    $objPHPExcel = new PHPExcel();  
    // Set properties  
    $objPHPExcel->getProperties()->setCreator("ctos")  
        ->setLastModifiedBy("ctos")  
        ->setTitle("Office 2007 XLSX Test Document")  
        ->setSubject("Office 2007 XLSX Test Document")  
        ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")  
        ->setKeywords("office 2007 openxml php")  
        ->setCategory("Test result file");  
    $length1=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD');
    $length2=array('A1','B1','C1','D1','E1','F1','G1','H1','I1','J1','K1','L1','M1','N1','O1','P1','Q1','R1','S1','T1','U1','V1','W1','X1','Y1','Z1','AA1','AB1','AC1','AD1');
    //set width  
    for($a=0;$a<count($title);$a++){
         $objPHPExcel->getActiveSheet()->getColumnDimension($length1[$a])->setWidth(16); 
    }
    //set font size bold  
    $objPHPExcel->getActiveSheet()->getDefaultStyle()->getFont()->setSize(10);  
    $objPHPExcel->getActiveSheet()->getStyle($length2[0].':'.$length2[count($title)-1])->getFont()->setBold(true); 
    $objPHPExcel->getActiveSheet()->getStyle($length2[0].':'.$length2[count($title)-1])->getFont()->setBold(true);    
    $objPHPExcel->getActiveSheet()->getStyle($length2[0].':'.$length2[count($title)-1])->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);  
    
    // set table header content  
    for($a=0;$a<count($title);$a++){
          $objPHPExcel->setActiveSheetIndex(0)->setCellValue($length2[$a], $title[$a]); 
    }
    for($i=0;$i<count($data);$i++){ 
        $buffer=$data[$i];
        $number=0;
        foreach ($buffer as $value) {
            $objPHPExcel->getActiveSheet(0)->setCellValueExplicit($length1[$number].($i+2),$value,PHPExcel_Cell_DataType::TYPE_STRING);//设置单元格为文本格式
            $number++;
        }
        unset($value);
        $objPHPExcel->getActiveSheet()->getStyle($length1[0].($i+2).':'.$length1[$number-1].($i+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);  
        $objPHPExcel->getActiveSheet()->getStyle($length1[0].($i+2).':'.$length1[$number-1].($i+2))->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);  
        $objPHPExcel->getActiveSheet()->getRowDimension($i+2)->setRowHeight(16);  
    }  
    // Set active sheet index to the first sheet, so Excel opens this as the first sheet  
    $objPHPExcel->setActiveSheetIndex(0);  

    ob_end_clean();//清除缓冲区,避免乱码
    // Redirect output to a client’s web browser (Excel5)  
    header('Content-Type: application/vnd.ms-excel');  
    header('Content-Disposition: attachment;filename='.$subject.'('.date('Y-m-d').').xls');  
    header('Cache-Control: max-age=0');  

    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');  
    $objWriter->save('php://output');  
}  
