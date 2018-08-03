<?php

     include "connect.php";
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
        $pass = md5($_POST["password"]);
        $strSQL1 = "INSERT INTO login ";
        $strSQL1 .="(username,password,status) VALUES ('".$_POST["username"]."','$pass','".$_POST["status"]."')";
        $objQuery = mysqli_query($objCon,$strSQL1);
        
        $strSQL2 = "INSERT INTO profile ";
        $strSQL2 .="(name,surname,career,age,picture,username) VALUES ('".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["status"]."','".$_POST["age"]."','".$_FILES["filUpload"]["name"]."','".$_POST["username"]."')";
        $objQuery = mysqli_query($objCon,$strSQL2);

        $strSQL3 = "INSERT INTO `contact` ";
        $strSQL3 .="(address,phone,facebook,line,username) VALUES ('".$_POST["address"]."','".$_POST["tel"]."','".$_POST["facebook"]."','".$_POST["line"]."','".$_POST["username"]."')";
        $objQuery = mysqli_query($objCon,$strSQL3);
        
        $user = $_POST["username"];

        if($objResult["status"] != "ADMIN")
                {
                    session_start();
                    $strSQL = "SELECT * FROM login WHERE username = '".mysqli_real_escape_string($objCon,$_POST["username"])."' 
	                and password = '".mysqli_real_escape_string($objCon,$_POST["password"])."'";
	                $objQuery = mysqli_query($objCon,$strSQL);
	                $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
                    $_SESSION["status"] = $objResult["status"];
                    $_SESSION["username"] = $objResult["username"];
                    session_write_close();
                    header("location:register2.php?user=$user");
                }

	}


?>