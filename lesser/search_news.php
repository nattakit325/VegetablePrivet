<?php
	session_start();
	include "connect.php";

	$value=$_GET["value"];



	$sql="SELECT n.topic as topic, n.detail as detail,n.media as media,n.time as time,n.username as username,p.name as name,p.surname as 		surname FROM news n inner join profile p on n.username = p.username WHERE time>NOW()  order by time";


    $query=mysqli_query($objCon,$sql);
    $queryC=mysqli_query($objCon,$sql);



?>