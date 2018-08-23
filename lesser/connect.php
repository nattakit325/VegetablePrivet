<?php
    $server="localhost";
    $user="root";
    $password="";
    $db="smartfarmer";


    $objCon = mysqli_connect($server,$user,$password,$db);
    if($objCon){
        echo "show";
    }
    mysqli_set_charset($objCon,"utf8");







?>