<?php
	session_start();
	
    include "connect.php";
    $name =  $_POST['name'];
    $detail =  $_POST['detail'];
    $type =  $_POST['type'];
    $category =  $_POST['value'];
    $picture =  'product.png';
    $username = $_SESSION["username"];


	$strSQL = "INSERT INTO product";
    $strSQL .="(name,detail,type,category,picture) VALUES ('$name','$detail','$type','$category','$picture')";
	$objQuery = mysqli_query($objCon,$strSQL);


	$ProfileSQL = "SELECT MAX(id) as id FROM product WHERE name = '$name'";
	$objQuery2 = mysqli_query($objCon,$ProfileSQL);
	$objResult2 = mysqli_fetch_array($objQuery2 ,MYSQLI_ASSOC);

	$id = $objResult2["id"];




	$strSQL = "INSERT INTO selllist";
    $strSQL .="(productid,username) VALUES ('$id','$username')";
	$objQuery = mysqli_query($objCon,$strSQL);

   

	
?>


<?php
header("location:create product.php");

?>