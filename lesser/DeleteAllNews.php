<?php
	session_start();
	
    include "connect.php";


    

    $sql1="SELECT * FROM news where status=1";
	$query1=mysqli_query($objCon,$sql1);
		while($row=mysqli_fetch_array($query1,MYSQLI_ASSOC)){
			if($row["media"]!='news.png'){
			unlink("images/".$row["media"]);
		}
	

}


$sql="DELETE from news where status=1";

$query=mysqli_query($objCon,$sql);

header("location:index.php");

?>