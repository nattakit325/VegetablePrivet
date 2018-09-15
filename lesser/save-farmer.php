<?php 
    session_start();
    include "connect.php";
    $nameFarmer = $_POST["nameFarmer"];
    $detailFarmer = $_POST["detailFarmer"];
    $productFarmer = $_POST["productFarmer"];
    $brandFarmer = $_POST["brandFarmer"];
    $adrFarmer = $_POST["adrFarmer"];
    $conFarmer = $_POST["conFarmer"];
    $linkFarmer = $_POST["linkFarmer"];
    $laFarmer = $_POST["laFarmer"];
    $loFarmer = $_POST["loFarmer"];




    $strSQL = "INSERT INTO famers";
    $strSQL .="(famer_name,famer_address,famer_plant,famer_brand,famer_sellproduct,famer_contact,famer_link,famer_lati,famer_longti) 
                VALUES ('$nameFarmer','$detailFarmer','$productFarmer','$brandFarmer','$adrFarmer','$conFarmer','$linkFarmer','$laFarmer','$loFarmer')";
    $objQuery = mysqli_query($objCon,$strSQL);



        header("location:admin.php");

?>

