<?php 

session_start();
	include "connect.php";

	$usermname = '';

	if(empty($_SESSION["username"])){

	}else{
		if($_SESSION["status"]=='admin'){
			header("location:admin.php");
		}else{
			$usermname = $_SESSION["username"];
		}
		
	}

	$sqlTopChat = "SELECT  p.name as name,p.surname as surname,p.picture as picture, c.chat_msg  as msg ,p.username as chatname from tbl_chat c inner join profile p on  c.chat_user1 = p.username where c.chat_user2='$usermname' group by c.chat_user1 ORDER by chat_datetime DESC limit 1";
	$queryForTopUser=mysqli_query($objCon,$sqlTopChat);
	$objResult1 = mysqli_fetch_array($queryForTopUser, MYSQLI_ASSOC);
	$name = $objResult1['name'];
	$surname = $objResult1['surname'];
	$chatname = $objResult1['chatname'];


	

	header("location:chatlist.php?name=$name&surname=$surname&chatname=$chatname");


?>