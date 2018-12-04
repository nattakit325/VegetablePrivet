<?php
	session_start();
	include "connect.php";
    
    $placeid= $_POST['id'];
    $deleteMarketSQL = "DELETE FROM `gmarket` WHERE marketid = '$placeid' ";
    $objQuery = mysqli_query($objCon,$deleteMarketSQL);
    
    $deleteMarketSQL1 = "DELETE FROM `market` WHERE id = '$placeid' ";
	$objQuery = mysqli_query($objCon,$deleteMarketSQL1);
    mysqli_close($objCon);
    echo 'ทำรายการสำเร็จ';
?>