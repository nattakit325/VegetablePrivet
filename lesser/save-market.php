<?php
     include "connect.php";
     $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
     $market = filter_input(INPUT_POST, 'market',FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
     $j = 0;
        foreach($market as $value){
            $strSQL4 = " SELECT market.id as marketid FROM market WHERE market = '$value'";
            $objQuery4 = mysqli_query($objCon,$strSQL4);
            $objResult = mysqli_fetch_array($objQuery4,MYSQLI_ASSOC);
            $marketid = $objResult["marketid"];
    
            $strSQL3 = "INSERT INTO gmarket";
            $strSQL3 .="(username,marketid) VALUES ('$user','$marketid')";
            $objQuery3 = mysqli_query($objCon,$strSQL3);
            $j = $j+1;
        }
   header("location:suscess.php");
?>