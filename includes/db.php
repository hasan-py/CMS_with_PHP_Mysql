<?php

$connection = mysqli_connect('localhost','root','','cms');

if(!$connection){
	die("Not connected".mysqli_error($connection));
}


?>