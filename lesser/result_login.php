<?php
session_start();
include "connect.php";

$q = $_GET['q'];
$password = md5($_GET['password']);


mysqli_select_db($objCon,"ajax_demo");
$sqlUser = "SELECT * FROM login WHERE username = '".$q."'";
$sql="SELECT * FROM login WHERE username = '".$q."' 
	and password = '".$password."'";
$ProfileSQL = "SELECT name_surname ,picture ,username,farmer_type_id FROM profile WHERE username = '".$q."'";



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
			$_SESSION["name_surname"] = $objResult2["name_surname"];
			$_SESSION["picture"] = $objResult2["picture"];
			$_SESSION["farmer_type"] = $objResult2["farmer_type_id"];


			if($_SESSION["status"] == "admin"){
				echo "admin";
			}

			session_write_close();
			}
			
}
mysqli_close($objCon);

?>