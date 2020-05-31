<?php 
if(!isset($_SESSION['loginCMS'])){
    header('Location: ../index.php');
}

?>


<?php 

function confirmQuery($result){
	global $connection;
	if(!$result){
		echo '<h1>Please Insert valid Letter in form</h1>';
	}
}

?>