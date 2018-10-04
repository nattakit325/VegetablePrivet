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

	

	$sql4="DELETE n from news n inner join login l on n.username = l.username where l.status ='admin' ";
	$query4=mysqli_query($objCon,$sql5);

	$sql3="DELETE c  from tbl_chat c INNER join login l on c.chat_user1 = l.username or c.chat_user2 = l.username WHERE l.status = 'admin' ";
	$query3=mysqli_query($objCon,$sql3);

	$sql7="DELETE g  from gmarket g INNER join login l on g.username = l.username WHERE l.status = 'admin' ";
	$query7=mysqli_query($objCon,$sql7);


	$sql2="DELETE p from profile p INNER join login l on p.username = l.username WHERE p.name_surname like '%$value%' and l.status = 'admin'";
	$query2=mysqli_query($objCon,$sql2);

	$sql1="DELETE from login where status = 'admin' and username like '%$value%'";
	$query1=mysqli_query($objCon,$sql1);

}else{

	$sql6="DELETE n from news n inner join login l on n.username = l.username where l.status !='admin' and l.status !='superAdmin'";
	$query6=mysqli_query($objCon,$sql6);


	$sql3="DELETE c  from tbl_chat c INNER join login l on c.chat_user1 = l.username or c.chat_user2 = l.username WHERE l.status != 'admin' and l.status !='superAdmin'";
	$query3=mysqli_query($objCon,$sql3);

	


	$sql7="DELETE g  from gmarket g INNER join login l on g.username = l.username WHERE l.status != 'admin' and l.status !='superAdmin'";
	$query7=mysqli_query($objCon,$sql7);


	$sql5="SELECT p.picture as picture from selllist l INNER join product p on p.id = l.productid";
	$query5=mysqli_query($objCon,$sql5);
while($row=mysqli_fetch_array($query5,MYSQLI_ASSOC)){
	
	if($row["picture"]!='product.png'){
		unlink("uploads_product/".$row["picture"]);

		
	}
	
}

	$sql4="DELETE p,l from selllist l INNER join product p on p.id = l.productid";
	$query4=mysqli_query($objCon,$sql4);


	$sql="DELETE p from profile p INNER join login l on p.username = l.username and l.status != 'admin' and l.status != 'superAdmin'";

	$query=mysqli_query($objCon,$sql);
	$sql2="DELETE from login where status != 'admin' and status != 'superAdmin' ";

	$query2=mysqli_query($objCon,$sql2);


}



header("location:report.php?value=' '&type=admin");

?>