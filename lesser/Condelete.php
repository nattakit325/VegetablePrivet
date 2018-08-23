<?php
	session_start();
	
    include "connect.php";
    $id =  $_POST['ProductID'];
    $username = $_SESSION["username"];


    echo $id;
    echo $username;

    $sql1="SELECT *
		FROM selllist s
		INNER JOIN product p
  		ON s.productid=p.id
		WHERE s.username = '$username'
		and p.id = '$id'";
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
		WHERE s.username = '$username'and s.id = '$id'";

$query=mysqli_query($objCon,$sql);

header("location:selllist.php");

?>