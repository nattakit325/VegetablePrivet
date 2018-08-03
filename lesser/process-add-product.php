<?php
	session_start();
	if($_SESSION['username'] == "")
	{
		echo "Please Login!";
		exit();
	}
	
	include "connect.php";

	$strSQL = "SELECT * FROM login WHERE username = '".$_SESSION['username']."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>
<html>
<head>
<title>dwad</title>
</head>
<body>
<?php

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["filUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

echo "<br>";





	if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"myfile/".$_FILES["filUpload"]["name"]))
	{
		echo "Copy/Upload Complete<br>";

		$strSQL1 = "INSERT INTO product ";
		$strSQL1 .="(name,detail,type,category,picture) VALUES ('".$_POST["na"]."','".$_POST["am"]."','".$_POST["pr"]."','".$_POST["day"]."','".$_FILES["filUpload"]["name"]."')";
		$objQuery = mysqli_query($objCon,$strSQL1);

		$strSQL2 = "INSERT INTO `selllist` ";
		$strSQL2 .="(productname,amount,price,time,username) VALUES ('".$_POST["na"]."','".$_POST["amo"]."','".$_POST["pri"]."','".$_POST["date"]."','".$_SESSION['username']."')";
		$objQuery = mysqli_query($objCon,$strSQL2);

		echo $_SESSION['username'];
		echo $_POST['amo'];
		echo $_POST["pri"];
		echo $_POST["date"];

	}


?>
<a href="indexag.php">View files</a>
</body>
</html>