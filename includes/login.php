<?php 
session_start();
include "./db.php";

if(isset($_POST['loginSubmit'])){
	$username = $_POST['log_username'];
	$password = $_POST['log_password'];
	$username = mysqli_real_escape_string($connection,$username);
	$password = mysqli_real_escape_string($connection,$password);
	$password = md5($password);

	$query_for_check = "SELECT * FROM users WHERE username='{$username}' and user_password='{$password}'";
	$result = mysqli_query($connection,$query_for_check);
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)){
			$_SESSION['username'] = $row['username'];
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['user_firstname'] = $row['user_firstname'];
			$_SESSION['user_lastname'] = $row['user_lastname'];
			$_SESSION['login'] = true;
			$_SESSION['loginCMS'] = true;
			$_SESSION['user_role'] = $row['user_role'];

			header('Location: ../admin');
		}

	}else{
		header('Location: ../index.php');

	}


}else{
	header('Location: ../index.php');
	exit;
}


?>