<?php
	session_start();
	
    include "connect.php";


 


$sql="UPDATE news SET status = 0 where status =1";

$query=mysqli_query($objCon,$sql);

header("location:admin.php");

?>