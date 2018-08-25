<?php

// If there is no constant defined called __CONFIG__, do not load this file 
if(!defined('__CONFIG__')) {
	exit('You do not have a config file');
}

class User{

	private $con;

	public function __construct($user_id){
		$this->con = DB::getConnection();
		$user_id = Filter::Int($user_id);
		$user = $this->con->prepare("select user_id,email,reg_time from users where user_id = :user_id limit 1");
		$user->bindParam(':user_id',$user_id,PDO::PARAM_INT);
		$user->execute();

		if($user->rowCount() > 0){
			// user exists
			$user = $user->fetch(PDO::FETCH_OBJ);
			$this->email 	= (string)$user->email;
			$this->user_id 	= (int)$user->user_id;
			$this->reg_time = (string)$user->reg_time;
		}else{
			// User not found
			header('Location:Logout');
		}
	}	
	public static function Find($email,$return_assoc =false){
		$con = DB::getConnection();

		$email = (string) Filter::String($email); 
		$findUser = $con->prepare("select user_id,password from users where email= LOWER(:email) limit 1");
		$findUser->bindParam(':email',$email,PDO::PARAM_STR);
		$findUser->execute();
		if($return_assoc){
			return $findUser->fetch(PDO::FETCH_ASSOC);
		}
		$user_found = (boolean) $findUser->rowCount();
		return $user_found;
	}
}
?>