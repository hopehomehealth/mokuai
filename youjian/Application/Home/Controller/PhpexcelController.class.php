<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    public function dao(){
        $data = array(
            array(NULL, 2010, 2011, 2012),
            array('Q1',   12,   15,   21),
            array('Q2',   56,   73,   86),
        );
//        var_dump(hawk_import_excel("user.csv"));
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Worksheet.Drawing");
        import("Org.Util.PHPExcel.Writer.Excel2007");
        $objPHPExcel = new \PHPExcel();

//        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        var_dump($this->hawk_create_xlsx($data));

    }


    function hawk_create_xlsx($data,$filename='simple.xlsx'){
        ini_set('max_execution_time', '0');
//    Vendor('PHPExcel.PHPExcel');
        $filename=str_replace('.xlsx', '', $filename).'.xlsx';
        $phpexcel = new \PHPExcel();
        $phpexcel->getProperties()
            ->setCreator("Maarten Balliauw")
            ->setLastModifiedBy("Maarten Balliauw")
            ->setTitle("Office 2007 XLSX Test Document")
            ->setSubject("Office 2007 XLSX Test Document")
            ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("Test result file");
        $phpexcel->getActiveSheet()->fromArray($data);
        $phpexcel->getActiveSheet()->setTitle('Sheet1');
        $phpexcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=$filename");
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0
        $objwriter = \PHPExcel_IOFactory::createWriter($phpexcel, 'Excel5');
        $objwriter->save('php://output');
        exit;
    }

    /**
     * 数组转xls格式的excel文件(分sheet页---数据量不要超过5万)
     * @param  array  $data      需要生成excel文件的数组
     * @param  int    $listNum   每页行数
     * @param  string $filename  生成的excel文件名
     */

//            echo hawk_creat_sheet_xlsx($data,'simple.xlsx');

    function hawk_creat_sheet_xlsx($data,$listNum,$filename='simple.xlsx'){
        ini_set('max_execution_time', '0');
//    Vendor('PHPExcel.PHPExcel');
        $cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_in_memory_gzip;
        $cacheSettings = array( 'memoryCacheSize' => '512MB');
        PHPExcel_Settings::setCacheStorageMethod($cacheMethod,$cacheSettings);
        $filename=str_replace('.xlsx', '', $filename).'.xlsx';
        $excel = new PHPExcel();
        //Excel表格列
        $num = count($data[0]);
        if($num<26){
            $letter = array_slice(range('A','Z'),0,$num);
        }else{
            return json_encode(array('code'=>0,'info'=>' column number is overtop!'));
        }
        //表头
        $tableheader=$data[0];
        //去除数据的表头
        array_shift($data);
        //总得行数
        $count = count($data);
        //每个sheet页最大行数
        if(!$listNum){
            return json_encode(array('code'=>0,'info'=>'$listNum do not null'));
        }
        $num = ceil($count/$listNum);//sheet页个数
        $MuitData =  array_chunk($data,$listNum,false);//分割总的数据，每页最多$listNum行有效数据
        //var_dump($MuitData);exit();
        //缺省情况下,PHPExcel会自动创建第一个SHEET,其索引SheetIndex=0
        //设置 当前处于活动状态的SHEET 为PHPExcel自动创建的第一个SHEET
        $excel->setActiveSheetIndex(0); //objPHPExcel
        //设置sheet的title
        $excel->getActiveSheet()->setTitle('数据第'.'1'.'页');
        //设置sheet的列名称
        for($k = 0; $k < count($tableheader); ++$k) {
            $excel->getActiveSheet()->setCellValue("$letter[$k]".'1',"$tableheader[$k]");//第一行数据
        }
        //填充表格信息 处理第1块数据
        $crrntSheetLineNo = count($MuitData[0]) + 1;
        for ( $j = 2; $j <= $crrntSheetLineNo; ++$j) { //遍历每一行
            $k = 0;
            foreach ( $MuitData[0][$j - 2] as $key => $value ) {//遍历具体行的某一列
                $excel->getActiveSheet()->setCellValue("$letter[$k]".$j,"$value");//第$k列 第$j行
                $k++;
            }
        }
        //后续的sheet页及数据块
        for ( $i = 1; $i <$num; ++$i){
            //创建第$i个sheet
            $msgWorkSheet = new PHPExcel_Worksheet($excel, '数据第'.($i + 1).'页'); //创建一个工作表
            $excel->addSheet($msgWorkSheet); //插入工作表
            $excel->setActiveSheetIndex($i); //切换到新创建的工作表

            //设置sheet的列名称
            for($k = 0; $k < count($tableheader); ++$k) {
                $excel->getActiveSheet()->setCellValue("$letter[$k]1","$tableheader[$k]");//第一行数据
            }
            //填充表格信息 处理第$i块数据
            $crrntSheetLineNo = count($MuitData[$i]) + 1; //var_dump($crrntSheetLineNo);var_dump($MuitData[$i-1]);die('as');
            for ( $j = 2; $j <= $crrntSheetLineNo; ++$j) { //遍历每一行
                $k = 0;
                //var_dump($MuitData[$i-1][$j - 2]);
                foreach ( $MuitData[$i][$j - 2] as $key => $value ) {//遍历具体行的某一列
                    $excel->getActiveSheet()->setCellValue("$letter[$k]$j","$value");//第$k列 第$j行
                    ++$k;
                }
            }
            usleep(100);
        }
        //创建Excel输出对象

        $write = new PHPExcel_Writer_Excel5($excel);
        ob_end_clean();//清除缓冲区,避免乱码
        //输出到浏览器
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
        header("Content-Type:application/force-download");
        header("Content-Type:application/vnd.ms-execl");
        header("Content-Type:application/download");
        header('Content-Type:application/octet-stream');
        $encoded_filename = urlencode($filename);
        $encoded_filename = str_replace("+", "%20", $encoded_filename);
        $ua = $_SERVER["HTTP_USER_AGENT"];
        if (preg_match("/MSIE/", $ua)) {
            header('Content-Disposition: attachment; filename="' . $encoded_filename . '"');
        } else if (preg_match("/Firefox/", $ua)) {
            header('Content-Disposition: attachment; filename*="utf8\'\'' . $filename . '"');
        } else {
            header('Content-Disposition: attachment; filename="' . $filename . '"');
        }
        header("Content-Transfer-Encoding:binary");
        $write->save('php://output');
        exit;
    }

    /**
     * 数组转csv格式的excel文件(测试20w木有问题)
     * @param  array  $data      需要生成excel文件的数组
     * @param  array  $head      每页行数
     * @param  string $filename  生成的excel文件名
     */

//echo hawk_create_csv($data);
    function hawk_create_csv($data=array()){
        // 输出Excel文件头，可把user.csv换成你要的文件名
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="user.csv"');
        header('Cache-Control: max-age=0');
        // 打开PHP文件句柄，php://output 表示直接输出到浏览器
        $fp = fopen('php://output', 'a');
        // 输出Excel列名信息
        foreach ($data[0] as $i => $v) {
            // CSV的Excel支持GBK编码，一定要转换，否则乱码
            $data[0][$i] = iconv('utf-8', 'gbk', $v);
        }
        // 将数据通过fputcsv写到文件句柄
        fputcsv($fp, $data[0]);

        // 计数器
        $cnt = 0;
        // 每隔$limit行，刷新一下输出buffer，不要太大，也不要太小
        $limit = 100000;
        //去除数据的表头
        array_shift($data);
        // 逐行取出数据，不浪费内存
        foreach($data as $row) {
            $cnt ++;
            if ($limit == $cnt) { //刷新一下输出buffer，防止由于数据过多造成问题
                ob_flush();
                flush();
                $cnt = 0;
            }
            foreach ($row as $i => $v) {
                $row[$i] = iconv('utf-8', 'gbk', $v);
            }
            fputcsv($fp, $row);
        }
    }

    /**
     * 导入excel文件
     * @param  string $file excel文件路径
     * @return array        excel文件内容数组
     */
//echo ssa;
//var_dump(hawk_import_excel("user.csv"));
    function hawk_import_excel($file){
        // 判断文件是什么格式
        $type = pathinfo($file);
        $type = strtolower($type["extension"]);
        if ($type == 'xlsx') {
            $type = 'Excel2007';
        } elseif ($type == 'xls') {
            $type = 'Excel5';
        } elseif ($type == 'csv') {
            $type = 'csv';
        }
        ini_set('max_execution_time', '0');
        //Vendor('PHPExcel.PHPExcel');
        // 判断使用哪种格式
        $objReader = \PHPExcel_IOFactory::createReader($type);
        $objPHPExcel = $objReader->load($file);
        $sheet = $objPHPExcel->getSheet(0);
        // 取得总行数
        $highestRow = $sheet->getHighestRow();
        // 取得总列数
        $highestColumn = $sheet->getHighestColumn();
        //循环读取excel文件,读取一条,插入一条
        $data=array();
        //从第一行开始读取数据
        for($j=1;$j<=$highestRow;$j++){
            //从A列读取数据
            for($k='A';$k<=$highestColumn;$k++){
                // 读取单元格
                $tmp=$objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue();
                //去空值
                if($tmp){
                    $data[$j][] = $tmp;
                }
            }
        }
        return $data;
    }


    public function daoru(){
// 导出Exl
        $data = array(
            array(NULL, 2010, 2011, 2012),
            array('Q1',   12,   15,   21),
            array('Q2',   56,   73,   86),
        );

        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Worksheet.Drawing");
        import("Org.Util.PHPExcel.Writer.Excel2007");
        $objPHPExcel = new \PHPExcel();

        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);

        $objActSheet = $objPHPExcel->getActiveSheet();

        // 水平居中（位置很重要，建议在最初始位置）
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('A')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('B1')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('C')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('D')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('E')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->setActiveSheetIndex(0)->getStyle('F')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objActSheet->setCellValue('A1', '商品货号');
        $objActSheet->setCellValue('B1', '商品名称');
        $objActSheet->setCellValue('C1', '商品图');
        $objActSheet->setCellValue('D1', '商品条码');
        $objActSheet->setCellValue('E1', '商品属性');
        $objActSheet->setCellValue('F1', '报价(港币)');
        // 设置个表格宽度
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(16);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(80);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(12);

        // 垂直居中
        $objPHPExcel->getActiveSheet()->getStyle('A')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('B')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('D')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('E')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $objPHPExcel->getActiveSheet()->getStyle('F')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);

        foreach($data as $k=>$v){
            $k +=2;
            $objActSheet->setCellValue('A'.$k, $v['goods_sn']);
            $objActSheet->setCellValue('B'.$k, $v['goods_name']);


            $img = M('goods')->where('goods_id = '.$v['goods_id'])->field('goods_thumb')->find();
            // 图片生成
            $objDrawing[$k] = new \PHPExcel_Worksheet_Drawing();
            $objDrawing[$k]->setPath('./Upload/'.$img['goods_thumb']);
            // 设置宽度高度
            $objDrawing[$k]->setHeight(80);//照片高度
            $objDrawing[$k]->setWidth(80); //照片宽度
            /*设置图片要插入的单元格*/
            $objDrawing[$k]->setCoordinates('C'.$k);
            // 图片偏移距离
            $objDrawing[$k]->setOffsetX(12);
            $objDrawing[$k]->setOffsetY(12);
            $objDrawing[$k]->setWorksheet($objPHPExcel->getActiveSheet());

            // 表格内容
            $objActSheet->setCellValue('D'.$k, $v['barcode']);
            $objActSheet->setCellValue('E'.$k, $v['goods_type']);
            $objActSheet->setCellValue('F'.$k, $v['price']);

            // 表格高度
            $objActSheet->getRowDimension($k)->setRowHeight(80);

        }

        $fileName = '报价表';
        $date = date("Y-m-d",time());
        $fileName .= "_{$date}.xls";
        $fileName = iconv("utf-8", "gb2312", $fileName);
        //重命名表
        // $objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载
        // END
    }
}