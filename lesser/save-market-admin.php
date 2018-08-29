<?php
    header("Content-Type: application/json; charset=UTF-8");
     include "connect.php";
     session_start();
     $loname= $_POST['loname'];
     $user= $_POST['user'];
     $la= $_POST['la'];
     $longti= $_POST['long'];
     $openDate = $_POST['openDate'];
     $openTime = $_POST['openTime'];
     $closeTime = $_POST['closeTime'];
     $i = 0;
    
        foreach($loname as $value ){
            $strSQL1 = "INSERT INTO market";
            $strSQL1 .="(market,latitude,longitude,type,openDate,openingTime,closingTime) VALUES ('$loname[$i]','$la[$i]','$longti[$i]','1','$openDate[$i]','$openTime[$i]','$closeTime[$i]')";
            $objQuery1 = mysqli_query($objCon,$strSQL1);
            $i = $i+1;
        }
    mysql_close($objCon);  
?>