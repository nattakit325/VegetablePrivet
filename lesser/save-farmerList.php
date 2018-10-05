<?php
    session_start();
    include "connect.php";
    $id = $_GET["id"];
    $farmerType = $_GET["farmer_type_id"];

    if($farmerType=='2'){
        $sql="UPDATE profile SET farmer_type_id='1' WHERE id='$id'";
        $query=mysqli_query($objCon, $sql);
    }else{
        $sql="UPDATE profile SET farmer_type_id='2' WHERE id='$id'";
        $query=mysqli_query($objCon, $sql);
    }

    ?>