<?php 
session_start();
include "connect.php";
$username = $_SESSION["username"];

$Password = filter_input(INPUT_POST, 'oldPass', FILTER_SANITIZE_STRING);
$sql="SELECT password FROM `login` WHERE username = '$username'";
$query = mysqli_query($objCon,$sql);
$objResult= mysqli_fetch_array($query, MYSQLI_ASSOC);
if($objResult['password']==md5($Password)){
	echo true;
}else{
	echo 0;
}

?>