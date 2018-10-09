<?php
	session_start();
	
    include "connect.php";
    $id =  $_POST['NewsID'];
    $picture =  $_POST['picture'];




    


    if(empty($picture)){

    }else{
	if($picture!='news.png'){
			unlink("images/".$picture);
	}
}

$sql3="DELETE from news where id= '$id' ";

$query3=mysqli_query($objCon,$sql3);


header("location:dataMG.php?");

?>