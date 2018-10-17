<?php
	session_start();
	
    include "connect.php";
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $detail = filter_input(INPUT_POST, 'detail', FILTER_SANITIZE_STRING);
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
    $category = filter_input(INPUT_POST, 'value', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    $picture[1] =  'product.png';
    $username = $_SESSION["username"];



    //---------------------------------------//
    $i=1;

    while($i<=3){
    	$picture[$i] = $_POST["picture".$i];
    	if(basename($_FILES["fileToUpload".$i]["name"])){
    	if($picture[$i] != "product.png"){
    	unlink("uploads_product/".$picture[$i]);
    }
    	$target_dir = "uploads_product/";
    	$target_file = $target_dir . basename($_FILES["fileToUpload".$i]["name"]);

		$PictureName[$i] =  basename($_FILES["fileToUpload".$i]["name"]);
		$pieces = explode(".", $PictureName[$i]);



	

		$t = microtime(true);
		$micro = sprintf("%06d",($t - floor($t)) * 1000000);
		$PictureName[$i] = $pieces[0].date("Y-m-d H:i:s").".$micro$t.";
		$PictureName[$i] = str_replace(".","","$PictureName[$i]");
		$PictureName[$i] = str_replace("-","","$PictureName[$i]");
		$PictureName[$i] = str_replace(":","","$PictureName[$i]");
		$PictureName[$i] = str_replace(" ","","$PictureName[$i]");
	




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

	// Check if file already exists
	
	
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    	
    		$uploadOk = 0;
		}
		if ($uploadOk == 0) {
    	
			// if everything is ok, try to upload file
		} else {
    		if (move_uploaded_file($_FILES["fileToUpload".$i]["tmp_name"], $target_file)) {
    			rename("$target_file","$target_dir"."$PictureName[$i].$pieces[1]");
    			$PictureName[$i] = $PictureName[$i].".".$pieces[1];
        	
    		} else {
        
    		}
		}
    }else{
    	$PictureName[$i] = $picture[$i];

    }
    $i++;
    $picture[$i] =  'product.png';



    }




    

    



    //---------------------------------------//


	$strSQL = "UPDATE product SET name = '$name',detail = '$detail',price = '$price',type = '$type',category = '$category',picture ='$PictureName[1]',picture2 ='$PictureName[2]',picture3 ='$PictureName[3]' where id ='$id'";
	$objQuery = mysqli_query($objCon,$strSQL);

	header("location:Update_product_result.php?id=$id");



	
?>



