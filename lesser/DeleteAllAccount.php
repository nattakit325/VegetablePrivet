<?php
	session_start();
	
    include "connect.php";
    $value =  $_GET['value'];
    $type =  $_GET['type'];


    


 $sql1="SELECT p.picture as picture from login l inner join profile p on l.username = p.username where l.status = '$type' and l.username like '%$value%'";
$query1=mysqli_query($objCon,$sql1);
while($row=mysqli_fetch_array($query1,MYSQLI_ASSOC)){
	if($row["picture"]!='Admin.png'&&$picture!='profile.png'){
		unlink("images/".$row["picture"]);
	}
	

}

echo($type);

if($type=='admin'){
	$sql3="DELETE n,c from news n INNER join login l on n.username = l.username
			LEFT JOIN tbl_chat c on c.chat_user1= l.username or c.chat_user2 = l.username
			where l.status = 'admin'";
	$query3=mysqli_query($objCon,$sql3);


	$sql2="DELETE p from profile p INNER join login l on p.username = l.username WHERE p.name_surname like '%$value%' and l.status = 'admin'";
	$query2=mysqli_query($objCon,$sql2);

	$sql1="DELETE from login where status = 'admin' and username like '%$value%'";
	$query1=mysqli_query($objCon,$sql1);

}else{
	$sql3="DELETE n,c from news n INNER join login l on n.username = l.username
			LEFT JOIN tbl_chat c on c.chat_user1= l.username or c.chat_user2 = l.username
			where l.status != 'admin' and l.status != 'superAdmin'";
	$query3=mysqli_query($objCon,$sql3);


	$sql5="SELECT p.picture as picture from selllist l INNER join product p on p.id = l.productid";
	$query5=mysqli_query($objCon,$sql5);
while($row=mysqli_fetch_array($query5,MYSQLI_ASSOC)){
	
	if($row["picture"]!='product.png'){
		unlink("uploads_product/".$row["picture"]);

		
	}
	
}

	$sql4="DELETE p,l from selllist l INNER join product p on p.id = l.productid";
	$query4=mysqli_query($objCon,$sql4);


	$sql="DELETE p from profile p INNER join login l on p.username = l.username WHERE p.name_surname like '%$value%' and l.status != 'admin' and l.status != 'superAdmin'";

	$query=mysqli_query($objCon,$sql);
	$sql2="DELETE from login where status != 'admin' and status != 'superAdmin' and username like '%$value%'";

	$query2=mysqli_query($objCon,$sql2);


}



header("location:report.php?value=' '&type=admin");

?>