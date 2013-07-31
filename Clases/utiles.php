<?php
function json_encode_objs($item){
	if(!is_array($item) && !is_object($item)){
		return json_encode($item);
	}else{
		$pieces = array();
		foreach($item as $k=>$v){
			$pieces[] = "\"$k\":".json_encode_objs($v);
		}
		return '{'.implode(',',$pieces).'}';
	}
}