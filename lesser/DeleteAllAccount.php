<?php
	session_start();
	
    include "connect.php";
    $value =  $_GET['value'];
    $type =  $_GET['type'];


    


 $sql1="SELECT p.picture as picture from login l inner join profile p on l.username = p.username where l.status = '$type' and l.username like '%$value%'";
$query1=mysqli_query($objCon,$sql1);
while($row=mysqli_fetch_array($query1,MYSQLI_ASSOC)){
	if($row["picture"]!='Admin.png'){
		unlink("images/".$row["picture"]);
	}
	

}

if($type=='admin'){
	$sql3="DELETE n,c from news n INNER join login l on n.username = l.username
			LEFT JOIN tbl_chat c on c.chat_user1= l.username or c.chat_user2 = l.username
			where l.status = 'admin'";
	$query3=mysqli_query($objCon,$sql3);


	$sql2="DELETE from profile where career = 'admin' and username like '%$value%'";
	$query2=mysqli_query($objCon,$sql2);

	$sql1="DELETE from login where status = 'admin' and username like '%$value%'";
	$query1=mysqli_query($objCon,$sql1);

}else{
	$sql="DELETE from profile where career != 'admin' and career != 'SuperAdmin' and username like '%$value%'";

	$query=mysqli_query($objCon,$sql);
	$sql2="DELETE from login where status != 'admin' and status != 'superAdmin' and username like '%$value%'";

	$query2=mysqli_query($objCon,$sql2);


}



header("location:report.php?value=' '&type=admin");

?>