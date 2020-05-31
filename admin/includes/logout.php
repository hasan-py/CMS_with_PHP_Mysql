<?php 
session_start();

if(isset($_SESSION['loginCMS'])){
	session_destroy();
	session_unset();
	header('Location: ../../index.php');
}else{
	header('Location: ../../index.php');
}


?>