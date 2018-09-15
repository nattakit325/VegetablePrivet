<?php 
    session_start();
    include "connect.php";
    $nameShop = $_POST["nameShop"];
    $detailShop = $_POST["detailShop"];
    $linkShop = $_POST["linkShop"];
    $telShop = $_POST["telShop"];
    $districtShop = $_POST["districtShop"];
    $typeShop = $_POST["typeShop"];
    $laShop = $_POST["laShop"];
    $loShop = $_POST["loShop"];


    $strSQL = "INSERT INTO place";
    $strSQL .="(place_name,place_address,place_link,place_tel,district_id,place_type_id,place_la,place_long) 
                VALUES ('$nameShop','$detailShop','$linkShop','$telShop','$districtShop','$typeShop','$laShop','$loShop')";
    $objQuery = mysqli_query($objCon,$strSQL);

        header("location:admin.php");

?>

