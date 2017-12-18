<?php

/**
 * Class home 首页
 */
class home extends Lowxp{
    function index(){
        $data = array();
        $this->display_before();
        $this->load->model('index');

        #显示众筹
        if(isset($this->site_config['index_crowd']) && $this->site_config['index_crowd']){
            $this->load->model('crowd');
            $hotCrowd = $this->crowd->crowd_list(" status = 2 AND is_rec = 1 ORDER BY end_time ASC",10);
            $this->smarty->assign('hotCrowd',$hotCrowd);
        }

        $data_skin = $this->setting->get_skin();
        $skin = $data_skin['index_skin'];

        $tpl = 'index.html';
        if($skin == 2){ //直购模板
            $tpl = 'index_buy.html';
        }

        if(STPL == 'mobile'){ //移动端
            if($skin == 2){
                $this->index->index_mobile_buy($data);
            }else{
                $this->index->index_mobile($data);
            }
        }else{
            if(CUR_SKIN != 'cn'){ //PC新模板
                if($skin == 2){
                    call_user_func_array(array($this->index, "index_" . CUR_SKIN ."_buy"), array(& $data));
                }else{
                    call_user_func_array(array($this->index, "index_" . CUR_SKIN), array(& $data));
                }
            }else{ //PC默认模板
                if($skin == 2){
                    $this->index->index_pc_buy($data);
                }else{
                    $this->index->index_pc($data);
                }
            }
        }

        $this->smarty->assign('navMark', 'index');
        $this->smarty->assign('data', $data);
        $this->smarty->display($tpl);
    }

    /**
     * AJAX 更新夺宝信息
     */
    function update_db(){
        $id = intval($_GET['id']);
        $this->load->model('yunbuy');
        $row = $this->yunbuy->yuninfo($id);
        if(!empty($row)){
            if(!empty($row['wait_time']) && RUN_TIME >= $row['wait_time'] && empty($row['luck_code'])){
                $this->yunbuy->lottery($id);
                echo true;
            }
        }
    }
    /**
     * AJAX获取夺宝单一信息
     */
    function load_db(){
        $id = intval($_GET['id']);
        $this->load->model('yunbuy');
        $this->load->model('member');
        $this->load->model('goods');
        $row = $this->yunbuy->getyunbuy("buy_id = $id");
        $row = $row[0];
        if($row['member_id']){
            $row['luck_member'] = $this->member->member_info($row['member_id']);
            $goods = $this->goods->get($row['goods_id']);
            $row['g_price'] = $goods['price'];
            $this->smarty->assign('m',$row);
            $this->smarty->display('content/windjxajaxindex.html');
        }
    }

    /**
     * 上传图片
     */
    function upload(){
        $file = trim($_POST['name']);
        $this->load->model('upload');
        $thumb = array();

        if(!empty($_POST['width'])&&!empty($_POST['height'])){
            $thumb = array('thumb'=>array('width'=>floor($_POST['width']),'height'=>floor($_POST['height'])));
        }
        echo $this->upload->save_image('upFile',$file,$thumb);
    }

    function fileupload(){
        $this->load->model('upload');
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;
        $result = array();
        $allow_type = array('.jpg','.jpeg','.gif','.png','.mp4','.flv');
        //大文件分片上传
        if($chunks>1){
            if (isset($_REQUEST["name"])) {
                $fileName = $_REQUEST["name"];
            } elseif (!empty($_FILES)) {
                $fileName = $_FILES["file"]["name"];
            } else {
                $fileName = uniqid("file_");
            }
            $epos = strrpos($fileName,'.');#点的位置
            $name = substr($fileName,0,$epos);#文件名称
            $ext = strtolower(substr($fileName,$epos));#扩展名
            if(!in_array($ext, $allow_type)){
                //如果不被允许，则直接停止程序运行
                echo json_encode(array('error'=>'文件格式不正确'));
                exit;
            }
            //新文件名
//            if($chunk==$chunks-1){
//                $name = $this->upload->random_filename();
//                $_SESSION['filename'] = $name.$ext;
//            }
            $fileName = md5($fileName.$_SESSION['mid']).$ext;

            $targetDir = 'upload'. DIRECTORY_SEPARATOR .'files';
            $uploadDir = 'upload'. DIRECTORY_SEPARATOR .'images'. DIRECTORY_SEPARATOR .'files';
            $cleanupTargetDir = true; // Remove old files
            $maxFileAge = 5 * 3600; // Temp file age in seconds
            $fileName = iconv('UTF-8', 'GB2312', $fileName);//转编码
            $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
            $uploadPath = $uploadDir .DIRECTORY_SEPARATOR. $fileName;
            // Remove old temp files
            if ($cleanupTargetDir) {
                if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                    die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
                }

                while (($file = readdir($dir)) !== false) {
                    $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

                    // If temp file is current file proceed to the next
                    if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
                        continue;
                    }

                    // Remove temp file if it is older than the max age and is not the current file
                    if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
                        @unlink($tmpfilePath);
                    }
                }
                closedir($dir);
            }

            // Open temp file
            if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            }

            if (!empty($_FILES)) {
                if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                    die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
                }

                // Read binary input stream and append it to temp file
                if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                    die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
                }
            } else {
                if (!$in = @fopen("php://input", "rb")) {
                    die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
                }
            }

            while ($buff = fread($in, 4096)) {
                fwrite($out, $buff);
            }

            @fclose($out);
            @fclose($in);

            rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");

            $index = 0;
            $done = true;
            for( $index = 0; $index < $chunks; $index++ ) {
                if ( !file_exists("{$filePath}_{$index}.part") ) {
                    $done = false;
                    break;
                }
            }
            if ( $done ) {
                if (!$out = @fopen($uploadPath, "wb")) {
                    die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
                }

                if ( flock($out, LOCK_EX) ) {
                    for( $index = 0; $index < $chunks; $index++ ) {
                        if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
                            break;
                        }
                        while ($buff = fread($in, 4096)) {
                            fwrite($out, $buff);
                        }

                        @fclose($in);
                        @unlink("{$filePath}_{$index}.part");
                    }

                    flock($out, LOCK_UN);
                }
                @fclose($out);
                $name = $this->upload->random_filename();
                $newname = $uploadDir .DIRECTORY_SEPARATOR.$name.$ext;
                rename($uploadPath,$newname);
                $result['data'] =  '/'.str_replace(DIRECTORY_SEPARATOR,'/',$newname);
            }
        }else{
            $this->load->model('upload');
            $dir = trim($_REQUEST['dir']);
            $dir = preg_replace('/[^a-zA-Z0-9-_]/','',$dir);
            //创建目录
            static $upDir;
            if(is_null($upDir))$upDir = $this->load->config('picture','image_dir');#保存目录
            $FullDir = $upDir.$dir.'/';
            is_dir($FullDir)||mkdir($FullDir,0777,true);

            $filename = trim($_REQUEST['name']);
            $epos = strrpos($filename,'.');#点的位置
            $name = substr($filename,0,$epos);#文件名称
            $ext = strtolower(substr($filename,$epos));#扩展名

            if(!in_array($ext, $allow_type)){
                //如果不被允许，则直接停止程序运行
                echo json_encode(array('error'=>'文件格式不正确'));
                exit;
            }

            //新文件名
            $name = $this->upload->random_filename();
            $savePath = $FullDir.$name.'_src'.$ext;
            $content = file_get_contents('php://input');
            $file = file_put_contents($savePath, $content, true);

            if(!empty($_REQUEST['width'])&&!empty($_REQUEST['height'])){
                $thumb = array('thumb'=>array('width'=>floor($_REQUEST['width']),'height'=>floor($_REQUEST['height'])));
            }

            //生成图片缩略图
            if(is_array($thumb)){
                static $loadedImage;
                if(is_null($loadedImage)){
                    $this->load->library('image',array('ratio'=>true));
                    $loadedImage = true;
                }
                //载入图片.
                $this->image->load_src($savePath);

                foreach($thumb as $size=>$val){
                    if(!isset($val['height'],$val['width']))continue;
                    $widht = $val['width'];
                    $height = $val['height'];
                    $path = $FullDir.$name.'_'.$size.$ext;
                    $this->image->resize($widht, $height, $path, true);
                    $img = str_replace(RootDir.'web/upload/images','',$path);
                    $this->upload->yunsave($img,$dir);
                }
            }

            if(!empty($thumb)){
                $this->upload->rmFile($savePath);
            }else{
                $img = str_replace(RootDir.'web/upload/images','',$savePath);
                $this->upload->yunsave($img,$dir);
            }
            //保存原图
            $result['data'] = empty($thumb) ? str_replace(RootDir.'web','',$savePath) : str_replace(RootDir.'web','',$path);
        }
        echo json_encode($result);
        exit;
    }

    /**
     * AJAX联动菜单
     */
    function chang_parent(){
        $id = (int) $_POST['id'];
        $hidetop = $_POST['hidetop'];
        $field = $_POST['field'];
        $this->load->model('linkage');
        $str = $this->linkage->select_linkage($id,$hidetop,$field,true);
        die($str);
    }

}