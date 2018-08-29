<?php
	session_start();
	include "connect.php";
    
    $placevalue= $_POST['placevalue'];
    $username =  $_SESSION["username"];
    $deleteMarketSQL = "DELETE FROM `gmarket` WHERE marketid = '$placevalue' and username = '$username' ";
	$objQuery = mysqli_query($objCon,$deleteMarketSQL);
    mysqli_close($objCon);
    echo 'ทำรายการสำเร็จ';
?>