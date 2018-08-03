<?php
	session_start();
	if($_SESSION['username'] == "")
	{
		echo "Please Login!";
		exit();
	}

    include "connect.php";
    
	$strSQL = "UPDATE selllist SET productname = '".trim($_POST['name'])."' 
	,amount = '".trim($_POST['amount'])."',price = '".trim($_POST['price'])."' WHERE username = '".$_SESSION["username"]."' ";
	$objQuery = mysqli_query($objCon,$strSQL);

	$strSQL1 = "UPDATE product SET name = '".trim($_POST['name'])."',detail = '".trim($_POST['detail'])."' WHERE username = '".$_SESSION["username"]."' ";
	$objQuery1 = mysqli_query($objCon,$strSQL1);
	
	echo "Save Completed!<br>";		

	echo $_POST['name']."<br>";	
	echo $_POST['detail']."<br>";
	
	

	echo $_POST['amount']."<br>";	
	echo $_POST['price']."<br>";







	
	if($_SESSION["status"] == "ADMIN")
	{
		echo "<br> Go to <a href='sell-product.php'>Admin page</a>";
	}
	else
	{
		echo "<br> Go to <a href='sell-product.php'>User page</a>";
	}
	
	mysqli_close($objCon);
?>