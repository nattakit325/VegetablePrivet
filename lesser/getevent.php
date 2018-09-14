<?php


$value =  $_GET['q'];
$username = $_GET['username'];
header("location:searchEvent.php?value=$value");

?>