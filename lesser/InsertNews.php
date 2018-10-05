<?php 
    session_start();
    include "connect.php";
    $topic = $_POST["topic"];
    $detail = $_POST["detail"];
    $link = $_POST["link"];
    $dateDF = $_POST["dateDF"];
    $username = $_SESSION["username"];
    $status = $_SESSION["status"];

    $link = str_replace("watch?v=","embed/",$link);
    $cut= strstr($link, "&t="); 
    $link = str_replace($cut,"",$link);
    $st = 0;

    if($status == 'admin' || $status == 'superAdmin'){
        $st = 0;
    }else{
        $st=1;
    }






    $target_dir = "images/";
    //$target_dir = "/home/nattakit/domains/nattakitmju.com/public_html/uploads_product/";

    echo basename($_FILES["fileToUpload"]["name"]);
    if($_FILES["fileToUpload"]["name"]){
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

	$PictureName =  basename($_FILES["fileToUpload"]["name"]);
	$pieces = explode(".", $PictureName);


	$path = getcwd();

	


	

	$t = microtime(true);
	$micro = sprintf("%06d",($t - floor($t)) * 1000000);
	$PictureName = $pieces[0].date("Y-m-d H:i:s").".$micro$t.";
	$PictureName = str_replace(".","","$PictureName");
	$PictureName = str_replace("-","","$PictureName");
	$PictureName = str_replace(":","","$PictureName");
	$PictureName = str_replace(" ","","$PictureName");
	

	$PictureName = $PictureName.$pieces[1];


    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if(isset($_POST["submit"])) {
    	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    	if($check !== false) {
        	
        	$uploadOk = 1;
    	} else {
        	
        	$uploadOk = 0;
    	}
	}

	// Check if file already exists
	
	
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    	
    	$uploadOk = 0;
	}
	if ($uploadOk == 0) {
    	
		// if everything is ok, try to upload file
	} else {
    	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    		rename("$target_file","$target_dir"."$PictureName");
        	
    	} else {

        
    	}
	}
}else{
	$PictureName = "news.png";
}


    $strSQL = "INSERT INTO news";
    $strSQL .="(topic,detail,media,Youtube_Link,time,username,status) VALUES ('$topic','$detail','$PictureName','$link','$dateDF','$username','$st')";
    $objQuery = mysqli_query($objCon,$strSQL);



    if($status == 'admin'||$status == 'superAdmin'){
        header("location:admin.php");
    }else{

        header("location:SendToAP.php");
    }

?>

