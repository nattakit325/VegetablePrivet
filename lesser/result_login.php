<?php
include "connect.php";

$q = $_GET['q'];
mysqli_select_db($objCon,"ajax_demo");
$sql="SELECT * FROM login WHERE username = '".$q."'";
$result = mysqli_query($objCon,$sql);
$objResult = mysqli_fetch_array($result,MYSQLI_ASSOC);
if(!$objResult){
	 
}else{
	echo "Username ถูกต้อง";
}
mysqli_close($objCon);

?>