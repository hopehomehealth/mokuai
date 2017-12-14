<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/13
 * Time: 11:37
 */
namespace Admin\Controller;
use Common\Common\AdminController;
class MenuController extends AdminController
{
    function showlist(){
        $info = D('Menu')
            ->select();
        $this->assign('info',$info);
        $this->display();
    }

    function tianjia(){
        if(IS_POST){
           $menu = D('Menu');
            $info=$menu->create();

            if($menu->add($info)){
                $this->success('添加成功',U('Menu/showlist'),1);
            }else{
                $this->error('添加失败',U('Menu/tianjia'),1);
            }
        }else{
			$menu = D('Menu');
			$list = $menu->where(array("pid"=>0))->select();
			$this->assign('list',$list);
            $this->display();
        }
    }

    function upd(){
        $menu_id = I('get.id');
        $menu = D('Menu');
        if(IS_POST){
			if(!isset($_POST['pid'])){
				$_POST['pid'] = 0;
			}
            //$shuju = $menu -> create();
			//var_dump($_POST);exit;
            if($menu->where(array("id"=>$_POST['c_id']))->save($_POST)){
                $this -> success('修改成功',U('Menu/showlist'),1);
            }else{
                $this -> error('修改失败',U('Menu/upd',array('id'=>$menu_id)),1);
            }
        }else{
            $list = $menu->find($menu_id);
			//var_dump($info);
			$pid = $menu->where(array("pid"=>0))->select();
			$this->assign('list',$pid);

            $this -> assign('info',$list);
            $this -> display();
        }
    }


	public function  class_send(){
		//读取appid
		$model = M('basic');
		$setting = $model->find();

		if (!$setting['appid']||!$setting['appsecret']){
			$this->error('您未设置开发者凭据appid和appsecret值，无法生成自定义菜单',U('Menu/showlist'));
		}else{
			if(IS_GET){
				//dump($api);
				$url_get='https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$setting['appid'].'&secret='.$setting['appsecret'];
				$json=json_decode($this->curlGet($url_get));
				if ($json->errmsg){
					$this->error('获取access_token发生错误：错误代码'.$json->errcode.',微信返回错误信息：'.$json->errmsg);
				}

				$data = '{"button":[';

				$class=M('menu')->where(array('pid'=>0,'is_show'=>0))->limit(3)->order('sort desc')->select();//dump($class);
				$kcount=M('menu')->where(array('pid'=>0,'is_show'=>0))->limit(3)->order('sort desc')->count();
				$k=1;
				foreach($class as $key=>$vo){
					//主菜单

					$data.='{"name":"'.str_replace('&amp;','&',$vo['title']).'",';
					$c=M('menu')->where(array('pid'=>$vo['id'],'is_show'=>0))->limit(5)->order('sort desc')->select();
					$count=M('menu')->where(array('pid'=>$vo['id'],'is_show'=>0))->limit(5)->order('sort desc')->count();
					//子菜单
					$vo['url']=str_replace(array('&amp;'),array('&'),$vo['url']);
					if($c!=false){
						$data.='"sub_button":[';
					}else{
						if(!$vo['url']){
							$data.='"type":"click","key":"'.$vo['keyword'].'"';
						}else {
							$data.='"type":"view","url":"'.$vo['url'].'"';
						}
					}
					$i=1;
					foreach($c as $voo){
						$voo['url']=str_replace(array('&amp;'),array('&'),$voo['url']);
						if($i==$count){
							if($voo['url']){
								$data.='{"type":"view","name":"'.$voo['title'].'","url":"'.$voo['url'].'"}';
							}else{
								$data.='{"type":"click","name":"'.$voo['title'].'","key":"'.$voo['keyword'].'"}';
							}
						}else{
							if($voo['url']){
								$data.='{"type":"view","name":"'.$voo['title'].'","url":"'.$voo['url'].'"},';
							}else{
								$data.='{"type":"click","name":"'.$voo['title'].'","key":"'.$voo['keyword'].'"},';
							}
						}
						$i++;
					}
					if($c!=false){
						$data.=']';
					}

					if($k==$kcount){
						$data.='}';
					}else{
						$data.='},';
					}
					$k++;
				}
				$data.=']}';

				file_get_contents('https://api.weixin.qq.com/cgi-bin/menu/delete?access_token='.$json->access_token);

				$url='https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$json->access_token;
				$rt=$this->api_notice_increment($url,$data);
				if($rt['rt']==false){
					$this->error('操作失败,curl_error:'.$rt['errorno'],U('Menu/showlist'));
				}else{
					$this->success('操作成功',U('Menu/showlist'));
				}
				exit;
			}else{
				$this->error('非法操作');
			}
		}
	}

	function curlGet($url){
		$ch = curl_init();
		$header = "Accept-Charset: utf-8";
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$temp = curl_exec($ch);
		return $temp;
	}

	function api_notice_increment($url, $data){
		$ch = curl_init();
		$header = "Accept-Charset: utf-8";
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$tmpInfo = curl_exec($ch);
		$errorno=curl_errno($ch);
		if ($errorno) {
			return array('rt'=>false,'errorno'=>$errorno);
		}else{
			$js=json_decode($tmpInfo,1);
			if ($js['errcode']=='0'){
				return array('rt'=>true,'errorno'=>0);
			}else {
				$this->error('发生错误：错误代码'.$js['errcode'].',微信返回错误信息：'.$js['errmsg']);
			}
		}
	}


	public function check(){
		$id = $_GET['id'];
		$class=M('menu')->where(array('id'=>$id,'pid'=>0))->find();
		//echo M('menu')->getlastsql();
		if($class){
			echo 0;
		}else{
			echo 1;
		}
	}

	//删除
	public function classDel(){
		$id = $_GET['id'];
		$class = $_GET['is_class'];
		$model=M('menu');
		if($class == 0){
			$del = $model->where(array('id'=>$id))->delete();
			if($del){
				$this->success('操作成功',U('Menu/showlist'));
			}else{
				$this->error('系统繁忙，请稍后操作！',U('Menu/showlist'));
			}
		}else{
			$del = $model->where(array('id'=>$id))->delete();
			if($del){
				$model->where(array('pid'=>$id))->delete();
				$this->success('操作成功',U('Menu/showlist'));
			}else{
				$this->error('系统繁忙，请稍后操作！',U('Menu/showlist'));
			}
			
		}
	}

}