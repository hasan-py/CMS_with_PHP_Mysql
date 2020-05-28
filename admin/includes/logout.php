<?php 
session_start();

if(isset($_SESSION['login']) && isset($_SESSION['user_role'])){
	session_destroy();
	session_unset();
	$_SESSION['username'] = null;
	$_SESSION['user_id'] = null;
	$_SESSION['user_firstname'] = null;
	$_SESSION['user_lastname'] = null;
	$_SESSION['login'] = null;
	$_SESSION['user_role'] = null;
	header('Location: ../../index.php');
}else{
	header('Location: ../../index.php');
}


?>