<?php
    session_start();
    include "connect.php";
    $id = $_GET["id"];
    $farmerType = $_GET["farmer_type_id"];



    $sql="UPDATE profile SET farmer_type_id='$farmerType' WHERE id='$id'";
        $query=mysqli_query($objCon, $sql);


    if($farmerType=='3'){
        $name = $_GET["name"];
        $sql="DELETE FROM `farmer_infomation` WHERE profileID = '$name'";
        $query=mysqli_query($objCon, $sql);

    }

    header("location:farmer.php");

    

    ?>