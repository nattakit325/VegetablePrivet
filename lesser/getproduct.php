<?php


$value =  $_GET['q'];
$username = $_GET['username'];
header("location:search_product_sold.php?value=$value&username=$username");

?>