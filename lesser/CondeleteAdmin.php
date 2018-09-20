<?php
	session_start();
	
    include "connect.php";
    $id =  $_POST['AdminID'];
    $picture =  $_POST['picture'];


    echo $id;
    echo $picture;


    if(empty($picture)){

    }else{
	if($picture!='Admin.png'){
			unlink("uploads_product/".$picture);
	}
}


$sql="DELETE from profile where username= '$id'";

$query=mysqli_query($objCon,$sql);
$sql2="DELETE from login where username= '$id'";

$query2=mysqli_query($objCon,$sql2);


//header("location:report.php?value=' '&type=admin");

?>