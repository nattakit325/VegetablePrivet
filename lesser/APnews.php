<?php
	session_start();
	
    include "connect.php";
    $id =  $_GET['id'];


 


$sql="UPDATE news SET status = 0 where id ='$id'";

$query=mysqli_query($objCon,$sql);

header("location:admin.php");

?>