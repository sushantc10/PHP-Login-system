<?php

class Page{
	static function ForceLogin(){
		if(!isset($_SESSION['user_id'])){
			header("Location:login.php");
		}
	}
	static function ForceDashboardLogin(){
		if(isset($_SESSION['user_id'])){
			header("Location:dashboard.php");
		}
	}
}


?>