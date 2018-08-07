<?php
session_start();
include "connect.php";

$q = $_GET['q'];
$password = $_GET['password'];



mysqli_select_db($objCon,"ajax_demo");
$sqlUser = "SELECT * FROM login WHERE username = '".$q."'";
$sql="SELECT * FROM login WHERE username = '".$q."' 
	and password = '".$password."'";
$ProfileSQL = "SELECT name ,surname ,career ,age ,picture ,username FROM profile WHERE username = '".$q."'";



$result = mysqli_query($objCon,$sql);
$objResult = mysqli_fetch_array($result,MYSQLI_ASSOC);

$result1 = mysqli_query($objCon,$sqlUser);
$objResult1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);

$objQuery2 = mysqli_query($objCon,$ProfileSQL);
$objResult2 = mysqli_fetch_array($objQuery2 ,MYSQLI_ASSOC);



if(!$objResult1){
	echo "Username นี้ไม่ได้ลงทะเบียนไว้";
}else{
	if(!$objResult){
	echo "Password ไม่ถูกต้อง";
	}else{

			$_SESSION["status"] = $objResult["status"];
			$_SESSION["username"] = $objResult["username"];
			$_SESSION["password"] = $objResult["password"];
			$_SESSION["name"] = $objResult2["name"];
			$_SESSION["surname"] = $objResult2["surname"];
			$_SESSION["career"] = $objResult2["career"];
			$_SESSION["age"] = $objResult2["age"];
			$_SESSION["picture"] = $objResult2["picture"];

			session_write_close();
			}
			
}
mysqli_close($objCon);

?>