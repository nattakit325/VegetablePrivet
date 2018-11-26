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


$sql="DELETE s
		FROM selllist s
        INNER join product p
        on s.productid = p.id
		WHERE  s.username = '$username'and s.productid = '$id'";
$sql2=" DELETE from product WHERE id = '$id'";

$query=mysqli_query($objCon,$sql);
$query=mysqli_query($objCon,$sql2);

header("location:selllist.php?value=' '");

?>