<?php
     include "connect.php";
     $loname= $_POST['loname'];
     $user= $_POST['user'];
     $marketarr= $_POST['marketarr'];
     $la= $_POST['la'];
     $longti= $_POST['long'];
     $openDate = $_POST['openDate'];
     $openTime = $_POST['openTime'];
     $closeTime = $_POST['closeTime'];
     $i = 0;
     $j = 0;
    
        foreach($loname as $value ){
            $strSQL1 = "INSERT INTO market";
            $strSQL1 .="(market,latitude,longitude,type,openDate,openingTime,closingTime) VALUES ('$loname[$i]','$la[$i]','$longti[$i]','1','$openDate[$i]','$openTime[$i]','$closeTime[$i]')";
            $objQuery1 = mysqli_query($objCon,$strSQL1);
    
            $strSQL2 = " SELECT MAX(id) FROM market ";
            $objQuery2 = mysqli_query($objCon,$strSQL2);
            $objResult = mysqli_fetch_array($objQuery2,MYSQLI_ASSOC);
            $marketid = $objResult["MAX(id)"];
    
            $strSQL3 = "INSERT INTO gmarket";
            $strSQL3 .="(username,marketid) VALUES ('$user','$marketid')";
            $objQuery3 = mysqli_query($objCon,$strSQL3);
            $i = $i + 1 ;
        }
     
        foreach($marketarr as $value1){
            $strSQL4 = " SELECT market.id as marketid FROM market WHERE market = '$marketarr[$j]'";
            $objQuery4 = mysqli_query($objCon,$strSQL4);
            $objResult = mysqli_fetch_array($objQuery4,MYSQLI_ASSOC);
            $marketid = $objResult["marketid"];
    
            $strSQL3 = "INSERT INTO gmarket";
            $strSQL3 .="(username,marketid) VALUES ('$user','$marketid')";
            $objQuery3 = mysqli_query($objCon,$strSQL3);
            $j = $j+1;
    
        }
    mysql_close($objCon);
    return 'a';
  
?>