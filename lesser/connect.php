<?php
    $server="localhost";
    $user="root";
    $password="";
    $db="smartfarmer";

 
   	$objCon = new mysqli($server,$user,$password,$db);
    mysqli_set_charset($objCon,"utf8mb4");

?>