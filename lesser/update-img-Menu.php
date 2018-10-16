<?php 

	session_start();
	
    include "connect.php";

    $target_dir = "images/";


    $amount = $_POST['amount'];
    

    
    $i=1;

    while ($i <= $amount ) {
    	 if($_FILES["fileToUpload".$i]["name"]){
    	 	
    	 	$target_file = $target_dir . basename($_FILES["fileToUpload".$i]["name"]);
    	 	$PictureName[$i] =  basename($_FILES["fileToUpload".$i]["name"]);

    	 	 if($_POST["pictureold".$i] != $PictureName[$i]){
    	 	 	
    				unlink("images/".$_POST["pictureold".$i]);
    			

    		}
    	 	$pieces = explode(".", $PictureName[$i]);


    	 	$t = microtime(true);
			$micro = sprintf("%06d",($t - floor($t)) * 1000000);
			$PictureName[$i] = $pieces[0].date("Y-m-d H:i:s").".$micro$t.";
			$PictureName[$i] = str_replace(".","","$PictureName[$i]");
			$PictureName[$i] = str_replace("-","","$PictureName[$i]");
			$PictureName[$i] = str_replace(":","","$PictureName[$i]");
			$PictureName[$i] = str_replace(" ","","$PictureName[$i]");


			$PictureName[$i] = $PictureName[$i].$pieces[1];

			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			if(isset($_POST["submit"])) {
                
    			$check = getimagesize($_FILES["fileToUpload".$i]["tmp_name"]);

    			if($check !== false) {
        	
        				$uploadOk = 1;
    			} else {
        	
        			$uploadOk = 0;
    			}
			}
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    	
    			$uploadOk = 0;
			}
			if ($uploadOk == 0) {
    	
				// if everything is ok, try to upload file
			}else{
				if (move_uploaded_file($_FILES["fileToUpload".$i]["tmp_name"], $target_file)) {
    				rename("$target_file","$target_dir"."$PictureName[$i]");
        	
    			} else {

        
    			}

			}





    	 }else{
    	 	 $PictureName[$i] = $_POST["pictureold".$i];
    	 }


    	

    	 $id[$i] = $_POST["id".$i];
    	 $UpdateImgSQL = "UPDATE menu SET  name='$PictureName[$i]' where id='$id[$i]'";
		$objQuery = mysqli_query($objCon,$UpdateImgSQL);

    	$i++;

    	
    }
    $id = $_POST['id'];

    header("location:editMenuImg.php?id=$id");

    





?>