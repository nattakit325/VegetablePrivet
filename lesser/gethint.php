<?php


$value = $_GET['q'];
$type = $_GET['type'];
header("location:search_product.php?value=$value&type=$type&status=$status");

?>