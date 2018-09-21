<?php
session_start();
include "connect.php";

$username = $_SESSION["username"];


$sql1="SELECT *
		FROM selllist s
		INNER JOIN product p
  		ON s.productid=p.id
		WHERE as.username = '$username'";
$query1=mysqli_query($objCon,$sql1);
while($row=mysqli_fetch_array($query1,MYSQLI_ASSOC)){
	if($row["picture"]!='product.png'){
		unlink("uploads_product/".$row["picture"]);
	}
	

}



$sql="DELETE s,p
		FROM selllist s
		INNER JOIN product p
  		ON s.productid=p.id
		WHERE s.username = '$username'";

$query=mysqli_query($objCon,$sql);



header("location:selllist.php?value=' '");

?>


			

			