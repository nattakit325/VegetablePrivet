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

    $strSQL = "UPDATE `farmer_infomation` SET `year_begin`='$yearBegin',`rice_field`='$riceField',`farm`='$Farm',`orchard`='$Orchard',`farm_area`='$FarmArea',`farm_area_ngan`='$farmAreaNgan',`cow_or_ox`='$cowOrox',`buffalo`='$buffalo',`chicken`='$chicken',`duck`='$duck',`pig`='$pig',`other_anumal`='$otherAnimal',`water source`='$waterSource',`organic_fertilizer`='$organicFertilizer',`amount_to_use`='$amountToUse',`1_factor`='$Factor1',`2_factor`='$Factor2',`3_factor`='$Factor3',`inspiration`='$Inspiration' WHERE `profileID`='$username'";
    $objQuery = mysqli_query($objCon,$strSQL);
    echo $objQuery;

    if($objQuery){
        echo "<script language=\"JavaScript\">";
        echo "alert('ทำรายการสำเร็จ');";
        echo "window.location = 'index.php'; ";
        echo "</script>";
    }
?>