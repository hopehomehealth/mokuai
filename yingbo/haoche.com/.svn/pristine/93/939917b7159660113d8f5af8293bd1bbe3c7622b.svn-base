<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Think\Controller;
class CishanController extends Controller
{
    //项目列表
    function showlist(){
        if($_POST){
            $search = $_POST;
            $map['cishan_name'] = array('LIKE',"%{$search['search']}%");
        }else{
            $map = '';
        }

        $cishan = D('Cishan');
        $count = $cishan -> count();
        $p = new \Think\Page($count,10);
        $info = $cishan ->where($map)
            ->where("is_show='0' AND is_zizhu='0'")
            -> order('cishan_id desc')
            ->limit($p->firstRow.','.$p->listRows)-> select();

        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);

        $this->display();
    }
         //捐赠记录
    function cimoney(){
        if($_POST){
            $search = $_POST;
            $map['name'] = array('LIKE',"%{$search['search']}%");
			$map['status'] = '1';
        }else{
            $map = '';
			$map['status'] = '1';
        }

        $cishan = D('Cimoney');
        $count = $cishan ->where($map)-> count();
        $p = new \Think\Page($count,10);
        $info = $cishan ->where($map)
            -> order('id desc') ->limit($p->firstRow.','.$p->listRows)-> select();
        $page = $p->show();
        $this -> assign('page',$page);
        $this -> assign('info',$info);
        $this->display();
    }
         //项目删除
    function xmdel(){
        $cishan_id = I('get.cishan_id');
        if(D('Cishan')->delete($cishan_id)){
            $this->success('删除成功',U('showlist'));
        }else{
            $this->error('删除失败',U('del',array('cishan_id'=>$cishan_id)));
        }
    }
    //捐赠记录删除
    function mondel(){
        $id = I('get.id');
        if(D('Cimoney')->delete($id)){
            $this->success('删除成功',U('cimoney'));
        }else{
            $this->error('删除失败',U('del',array('id'=>$id)),1);
        }
    }

  //项目修改
    function xmupd(){
        $cishan_id = I('get.cishan_id');
        $cishan = D('Cishan');
        if(IS_POST) {

            $info = $cishan->create();
            $info['add_time'] = time();

			if($info['zizhu'] == ''){
				$info['zizhu'] = 0.00;
			}
			//dump($info);exit;
            $this -> deal_logo($info);
			$donate = M('donate')->find();
			if($donate['surplus'] < $_POST['zizhu']){
				$this->error("资金不足，无法资助");
				exit;
			}

            if ($cishan->save($info)) {
                $this->success('修改成功',U('showlist'));
				M('donate')->where("id = {$donate['id']}")->setDec("surplus",$_POST['zizhu']);
            } else {
                $this->error('修改失败', U('upd', array('cishan_id' => $cishan_id)), 1);
            }
        }else{
            $userinfo = D('Userdetail')
                ->where('userid=79')
                ->field('phone,name')
                ->select();
            $this->assign('userinfo',$userinfo);
            $info = $cishan->find($cishan_id);
            $this->assign('info',$info);
            $this->display();
       }
    }

    //捐赠修改
    function monupd(){
        $id = I('get.id');
        $cishan = D('Cimoney');
        if(IS_POST) {

            $info = $cishan->create();
            $info['add_time'] = time();

            if ($cishan->save($info)) {
                $this->success('修改成功',U('showlist'));
            } else {
                $this->error('修改失败', U('upd', array('id' => $id)));
            }
        }else{
            $userinfo = D('Userdetail')
                ->where('userid=79')
                ->field('phone,name')
                ->select();
            $this->assign('userinfo',$userinfo);
            $info = $cishan->find($id);
            $this->assign('info',$info);
            $this->display();
       }
    }

    private function deal_logo(&$data){
        if($_FILES['logo']['error']===0){
            if(!empty($data['cishan_id'])){
                $oldinfo = D('Cishan')->find($data['cishan_id']);
                if(!empty($oldinfo['logo'])){
                    unlink($oldinfo['logo']);
                }
            }

            $cfg = array(
                'rootPath'      =>  './Public/Upd/cishan/logo/',
            );
            $up = new \Think\Upload($cfg);
            $z = $up -> upload(array($_FILES['logo']));
            $im = new \Think\Image();
            foreach($z as $k => $v) {
                $yuaname = $up->rootPath.$v['savepath'].$v['savename'];
                $data['logo'] = $yuaname;
                $im->open($yuaname);

                $im->thumb(375, 132, 6);
                $bsmallname = $up->rootPath . $v['savepath'] . 'b_' . $v['savename'];
                $im->save($bsmallname);
                $data['big_logo'] = $bsmallname;

                $im->thumb(100, 110, 6);
                $msmallname = $up->rootPath . $v['savepath'] . 'm_' . $v['savename'];
                $im->save($msmallname);
                $data['mid_logo'] = $msmallname;


                $im->thumb(50, 50, 6);
                $smallname = $up->rootPath . $v['savepath'] . 's_' . $v['savename'];
                $im->save($smallname);
                $data['sma_logo'] = $smallname;

            }
        }
    }
}