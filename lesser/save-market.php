<?php
    header("Content-Type: application/json; charset=UTF-8");
     include "connect.php";

     $loname= $_POST['loname'];
     $user= $_POST['user'];
     $marketarr= $_POST['marketarr'];
     $la= $_POST['la'];
     $longti= $_POST['long'];
     $i = 0;
     foreach($loname as $value ){
        $strSQL1 = "INSERT INTO market";
        $strSQL1 .="(market,latitude,longitude,type) VALUES ('$loname[$i]','$la[$i]','$longti[$i]','2')";
        $objQuery1 = mysqli_query($objCon,$strSQL1);

        $strSQL2 = " SELECT MAX(id) FROM market ";
        $objQuery2 = mysqli_query($objCon,$strSQL2);
        $objResult = mysqli_fetch_array($objQuery2,MYSQLI_ASSOC);
        $marketid = $objResult["MAX(id)"];

        $strSQL3 = "INSERT INTO gmarket";
        $strSQL3 .="(username,marketid) VALUES ('$user','$marketid')";
        $objQuery3 = mysqli_query($objCon,$strSQL3);
        print ($gmarket[$i]);
        print ($user);
       
        $i = $i + 1 ;
    }

    
   echo "done";
?>