<?php
	
	define('__CONFIG__',true);

	require_once "../inc/config.php";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		header('Content-type:application/json');
		$return = [];
		$email = Filter::String($_POST['email']);
		$password = $_POST['password'];
		$findUser = $con->prepare("select user_id,password from users where email= :email limit 1");
		$findUser->bindParam(':email',$email,PDO::PARAM_STR);
		$findUser->execute();

		if($findUser->rowCount() == 1){

			// user exists
			$User = $findUser->fetch(PDO::FETCH_ASSOC);
			$user_id = (int) $User['user_id'];
			$hash = (string) $User['password'];

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