<?php
	
	define('DATA_FILE', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . "groups.json");
	
	$data = json_decode(file_get_contents("php://input"));
	
	$id_group = $data->id;
	$stud = $data->stud;
	
	$_dataStr_ = file_get_contents(DATA_FILE);
	
	$groups = json_decode( $_dataStr_, true );	//in ASSOC;
	
	for($i = 0; $i < count($groups); $i++) {
	
		if ($id_group === $groups[$i]['id']) {
			
			$groups[$i]['students'][] = (array) $stud;
			
			file_put_contents(DATA_FILE, json_encode($groups));
			
			return 1;
		}
	}
	
	return 0;
?>