<?php
	session_start();
	include "connect.php";


	$strSQL = "SELECT * FROM login WHERE username = '".mysqli_real_escape_string($objCon,$_POST['usr'])."' 
	and password = '".mysqli_real_escape_string($objCon,$_POST['pwd'])."'";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
	}
	else
	{
			$_SESSION["status"] = $objResult["status"];
			$_SESSION["username"] = $objResult["username"];

			session_write_close();
			
			if($objResult["status"] == "admin")
			{
				header("location:indexad.php");
			}
			else if($objResult["status"] == "ปัจจัย")
			{
				header("location:indexag.php");
			}
			else
			{
				header("location:indexag.php");
			}
	}
	mysqli_close($objCon);
?>