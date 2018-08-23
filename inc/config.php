<?php
	if(!defined('__CONFIG__')){
		exit('You do not have a config file');
	}

	if(!isset($_SESSION)){
		session_start();
	}

	include_once "classes/DB.php";
	include_once "classes/Filter.php";
	require_once('functions.php');

	$con = DB::getConnection();
?>