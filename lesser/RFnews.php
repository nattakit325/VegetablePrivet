<?php
	session_start();
	
    include "connect.php";
    $id =  $_GET['id'];


    

    $sql1="SELECT * FROM news where id='$id'";
	$query1=mysqli_query($objCon,$sql1);
		while($row=mysqli_fetch_array($query1,MYSQLI_ASSOC)){
			if($row["media"]!='news.png'){
			unlink("images/".$row["media"]);
		}
	

}


$sql="DELETE from news where id='$id'";

$query=mysqli_query($objCon,$sql);

header("location:index.php");

?>