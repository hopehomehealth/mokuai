<?php/** * Class user_model */class disk_model extends Lowxp_Model{    public $baseTable = '###_folder';    //public $baseTable = '###_folder';    public $diskTable = '###_diskfile';    function __construct(){}    #添加文件夹    function create_folder($input){        if(empty($input['title'])) return array('code'=>10001, 'message'=>'请输入文件夹名称!');                $r = $this->db->insert($this->baseTable,array(            'title' =>$input['title'],            'parentid' =>$input['parentid']?intval($input['parentid']):0,            'description' =>isset($input['description']) ? $input['description'] : '',        	'userid' =>$input['userid'],        	'addtime' =>time(),        	'name' => $input['name']        ));		        admin_log('添加文件夹：'.$input['title']);        return $r;    }        /**     * 查询文件夹     */    function find_folder($title,$userid){    	$folder = $this->db->select("SELECT * FROM `###_folder` WHERE `userid` = '".$userid."' and `title`='".$title."' ORDER BY addtime DESC");
    	return $folder;    }    /**     * 查询会员的文件夹     */    function get_folder($userid){    	$folder = $this->db->select("SELECT * FROM `###_folder` WHERE `userid` = '".$userid."' and `parentid`=0 ORDER BY addtime DESC");    	foreach($folder as $k=>$v){    		$folder[$k]['child'] = $this->db->select("SELECT * FROM `###_folder` WHERE `userid` = '".$userid."' and `parentid`='".$v[id]."' ORDER BY addtime DESC");    	}
    	return $folder;    }    /**
     * 查询会员的文件夹
     */
    function find_folder_id($id){
    	$folder = $this->db->select("SELECT * FROM `###_folder` WHERE `id` = '".$id."' and `parentid`=0 ORDER BY addtime DESC");
    	
    	return $folder;
    }    /**
     * 根据名称,文件夹id找寻文件
     */
    function find_file($name,$folderid){
    	$r = $this->db->select("SELECT * FROM `###_diskfile` WHERE `name` = '".$name."' AND `folderid`='".$folderid."' ORDER BY addtime DESC");
    
    	return $r;
    }    /**     * 根据id找寻文件     */    function find_file_id($id){    	$file_data = $this->db->select("SELECT * FROM `###_diskfile` WHERE `id` = '".$id."' ORDER BY addtime DESC");
    	 
    	return $file_data;    }        /**
     * 根据名称,文件夹id找寻文件
     */
    function upload_file($input){
    	if(empty($input['title'])) return array('code'=>10001, 'message'=>'文件名称读取失败!');
    	 
    	$r = $this->db->insert($this->diskTable,array(
    			'title' =>$input['title'],
    			'folderid' =>$input['folderid'],
    			'size' =>isset($input['size']) ? $input['size'] : 0,
    			'userid' =>$input['userid'],
    			'addtime' =>time(),
    			'name' => $input['name']
    	));
    	 
    	admin_log('添加文件：'.$input['title']);
    	 
    	return $r
    	? array(
    			'mid' => $r,
    			'username' => $input['title'],
    			'code' =>'0',
    			'message' => '添加成功'
    	) : $r;
    }
        /**     * 根据文件id，删除文件     */    function delete_file($id){    	$this->db->delete($this->diskTable,array('id'=>$id));    	    	return 1;    }    /**
     * 根据文件id，删除文件
     */
    function delete_folder($id){
    	$this->db->delete($this->baseTable,array('id'=>$id));
    	     	$this->db->delete($this->diskTable,array('folderid'=>$id));
    	return 1;
    }	/**	 * 修改文件名	 */    function update_file($id,$title){        	$r = $this->db->update($this->diskTable,array('title'=>$title),"id = '$id'");    	    	return $r;    }    /**
     * 修改文件夹名
     */
    function update_folder($id,$title){
    
    	$r = $this->db->update($this->baseTable,array('title'=>$title),"id = '$id'");
    	 
    	return $r;
    }}