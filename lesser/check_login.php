<?php
	session_start();
	include "connect.php";
	


 
	$password = md5($_POST['pwd']);
	// echo $password;
	$strSQL = "SELECT * FROM login WHERE username = '".mysqli_real_escape_string($objCon,$_POST['usr'])."' 
	and password = '$password'";
	$ProfileSQL = "SELECT * FROM profile WHERE username = '".mysqli_real_escape_string($objCon,$_POST['usr'])."'";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

	$objQuery2 = mysqli_query($objCon,$ProfileSQL);
	$objResult2 = mysqli_fetch_array($objQuery2 ,MYSQLI_ASSOC);


	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
	}
	else
	{
			$_SESSION["status"] = $objResult["status"];
			$_SESSION["username"] = $objResult["username"];
			$_SESSION["password"] = $objResult["password"];
			$_SESSION["name_surname"] = $objResult2["name_surname"];
			$_SESSION["address"] = $objResult2["address"];
			$_SESSION["picture"] = $objResult2["picture"];
			$_SESSION["phone"] = $objResult2["phone"];
			$_SESSION["facebook"] = $objResult2["facebook"];
			$_SESSION["line"] = $objResult2["line"];
			$_SESSION["email"] = $objResult2["email"];
			$_SESSION["latitude"] = $objResult2["latitude"];
			$_SESSION["longitude"] = $objResult2["longitude"];
			$_SESSION["farmer_type"] = $objResult2["farmer_type_id"];

			session_write_close();
			
			if($objResult["status"] == "admin")
			{
				header("location:admin.php");
			}
			else if($objResult["status"] == "ปัจจัย")
			{
				header("location:index.php");
			}
			else
			{
				header("location:index.php");
			}
	}
	mysqli_close($objCon);
?>