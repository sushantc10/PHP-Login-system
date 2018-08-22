<?php
	
	define('__CONFIG__',true);

	require_once "../inc/config.php";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		header('Content-type:application/json');
		$array['redirect'] = 'php_login_system/index.php?this-was-a-redirect';
		echo json_encode($array,JSON_PRETTY_PRINT);exit;
	}else{
		exit('test');
	}
		

	

?>