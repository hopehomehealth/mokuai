<?php

/**
 * Class msg_model
 */
class msg_model extends Lowxp_Model{

    private $baseTable = '###_msg';

    function __construct(){}

    function msg_save($input){
        $input['add_time'] = RUN_TIME;
        if($input['id']){
            $id = $input['id'];
            unset($input['id']);
            $r = $this->db->update($this->baseTable,$input,array('id'=>$id));
        }else{
            $r = $this->db->insert($this->baseTable,$input);
        }
        return $r;
    }
}