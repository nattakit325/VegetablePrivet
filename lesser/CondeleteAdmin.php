<?php
	session_start();
	
    include "connect.php";
    $id =  $_POST['AdminID'];
    $picture =  $_POST['picture'];
    $type =  $_POST['type'];




    


    if(empty($picture)){

    }else{
	if($picture!='Admin.png'&&$picture!='profile.png'){
			unlink("images/".$picture);
	}
}

$sql3="DELETE from tbl_chat where chat_user1= '$id' or chat_user2= '$id'";

$query3=mysqli_query($objCon,$sql3);

$sql8="DELETE FROM `selllist` WHERE username = '$id'";

$query8=mysqli_query($objCon,$sql8);

$sql4="DELETE from news where username= '$id'";

$query4=mysqli_query($objCon,$sql4);


$sql="DELETE from profile where username= '$id'";

$query=mysqli_query($objCon,$sql);


$sql7="DELETE from gmarket where username= '$id'";
$query7=mysqli_query($objCon,$sql7);


$sql2="DELETE from login where username= '$id'";

$query2=mysqli_query($objCon,$sql2);

header("location:report.php?value=' '&type=".$type);

?>