<?php
	
	define('__CONFIG__',true);

	require_once "../inc/config.php";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		header('Content-type:application/json');
		$return = [];
		$email = Filter::String($_POST['email']);
		$password = $_POST['password'];
		$user_found = User::Find($email,true);
		$user_found;
		if($user_found){

			// user exists
			//$User = $user_found->fetch(PDO::FETCH_ASSOC);
			$user_id = (int) $user_found['user_id'];
			 $hash = (string) $user_found['password'];

			$_SESSION['user_id'] = $user_id;
			$return['redirect'] = 'php_login_system/dashboard.php';
			//$return['is_logged_in'] = false;
		}else{
			$return['error'] = "You do not have an account.<a href='php_login_system/register'>Create one now ?</a>";
		}
		$return['name'] = "Kalob Taulien";
		echo json_encode($return,JSON_PRETTY_PRINT);exit;
	}else{
		exit('INVALID URL');
	}
		

	

?>