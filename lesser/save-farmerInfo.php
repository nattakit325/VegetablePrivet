<?php
     session_start();
     include "connect.php";

     $yearBegin = filter_input(INPUT_POST, 'yearBegin', FILTER_SANITIZE_STRING);
     $riceField = filter_input(INPUT_POST, 'riceField', FILTER_SANITIZE_STRING);
     $Farm = filter_input(INPUT_POST, 'Farm', FILTER_SANITIZE_STRING);
     $Orchard = filter_input(INPUT_POST, 'Orchard', FILTER_SANITIZE_STRING);
     $FarmArea = filter_input(INPUT_POST, 'FarmArea', FILTER_SANITIZE_STRING);
     $farmAreaNgan = filter_input(INPUT_POST, 'farmAreaNgan', FILTER_SANITIZE_STRING);
     $cowOrox = filter_input(INPUT_POST, 'cowOrox', FILTER_SANITIZE_STRING);
     $buffalo = filter_input(INPUT_POST, 'buffalo', FILTER_SANITIZE_STRING);
     $chicken = filter_input(INPUT_POST, 'chicken', FILTER_SANITIZE_STRING);
     $duck = filter_input(INPUT_POST, 'duck', FILTER_SANITIZE_STRING);
     $pig = filter_input(INPUT_POST, 'pig', FILTER_SANITIZE_STRING);
     $otherAnimal = filter_input(INPUT_POST, 'otherAnimal', FILTER_SANITIZE_STRING);
     $waterSource = filter_input(INPUT_POST, 'waterSource', FILTER_SANITIZE_STRING);
     $organicFertilizer = filter_input(INPUT_POST, 'organicFertilizer', FILTER_SANITIZE_STRING);
     $amountToUse = filter_input(INPUT_POST, 'amountToUse', FILTER_SANITIZE_STRING);
     $Factor1 = filter_input(INPUT_POST, 'Factor1', FILTER_SANITIZE_STRING);
     $Factor2 = filter_input(INPUT_POST, 'Factor2', FILTER_SANITIZE_STRING);
     $Factor3 = filter_input(INPUT_POST, 'Factor3', FILTER_SANITIZE_STRING);
     $Inspiration = filter_input(INPUT_POST, 'Inspiration', FILTER_SANITIZE_STRING);
     $username = $_SESSION["username"];

    $strSQL = "INSERT INTO `farmer_infomation`(`year_begin`, `rice_field`, `farm`, `orchard`, `farm_area`, `farm_area_ngan`, `cow_or_ox`, `buffalo`, `chicken`, `duck`, `pig`, `other_anumal`, `water source`, `organic_fertilizer`, `amount_to_use`, `1_factor`, `2_factor`, `3_factor`, `inspiration`,`profileID`) VALUES ('$yearBegin','$riceField','$Farm','$Orchard','$FarmArea','$farmAreaNgan','$cowOrox','$buffalo','$chicken','$duck','$pig','$otherAnimal','$waterSource','$organicFertilizer','$amountToUse','$Factor1','$Factor2','$Factor3','$Inspiration','$username')";
    $objQuery = mysqli_query($objCon,$strSQL);

    $strSQL = "UPDATE `profile` SET `farmer_type_id`= 4 WHERE username = '$username'";
    $objQuery = mysqli_query($objCon,$strSQL);

    if($objQuery){
        echo "<script language=\"JavaScript\">";
        echo "alert('ทำรายการสำเร็จ');";
        echo "window.location = 'index.php'; ";
        echo "</script>";
    }
?>