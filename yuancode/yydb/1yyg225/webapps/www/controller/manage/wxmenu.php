<?php
        $string = "";
        if(count($_POST)>1){
        	foreach($_POST as $k=>$v){
        		if($k!='button'){
        			$string .= "&".$k."=".$v;
        		}
        	}
        	$data['button'] = $_POST['button'];
        	if($data['button']){
        		foreach($data['button'] as $key=>$value){
        			if(is_array($value)){
        				foreach($value as $k=>$v)
        					if($k=='data'){
        					$data['button'][$key][$k] = $v.$string;
        				}
        			}
        		}
        	}
        }else{
        	$data = $_POST;
        }
        $json = json_encode($data);