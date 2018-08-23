<?php
function ForceLogin(){
	if(!isset($_SESSION['user_id'])){
		header("Location:login.php");
	}
}

function ForceDashboardLogin(){
	if(isset($_SESSION['user_id'])){
		header("Location:dashboard.php");
	}
}

?>