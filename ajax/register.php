<?php
	
	define('__CONFIG__',true);

	require_once "../inc/config.php";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		header('Content-type:application/json');
		$return = [];
		$email = Filter::String($_POST['email']);
		$findUser = $con->prepare("select user_id from users where email= :email limit 1");
		$findUser->bindParam(':email',$email,PDO::PARAM_STR);
		$findUser->execute();

		if($findUser->rowCount() == 1){
			$return['error'] = "You Already have an account..";
			$return['is_logged_in'] = false;
		}else{
			$password =  password_hash($_POST['password'],PASSWORD_DEFAULT);
			$addUser = $con->prepare('insert into users(email,password) values(:email,:password)');
			$addUser->bindParam(':email',$email,PDO::PARAM_STR);
			$addUser->bindParam(':password',$password,PDO::PARAM_STR);
			$addUser->execute();

			$user_id = $con->lastInsertId();
			$_SESSION['user_id'] = (int) $user_id;
			$return['is_logged_in'] = true;
			$return['redirect'] = '/dashboard.php?message=welcome';
		}
		$return['name'] = "Kalob Taulien";
		echo json_encode($return,JSON_PRETTY_PRINT);exit;
	}else{
		exit('INVALID URL');
	}
		

	

?>