<?php
    session_start();
    include "connect.php";
    $target_dir = "images/";

    //$target_dir = "/home/nattakit/domains/nattakitmju.com/public_html/uploads_product/";

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
        $PictureName = $_POST["pictureold"];
    }
     $name = $_POST["name"];
        $address = $_POST["address"];
        $subdictrict = $_POST["subdictrict"];
        $district_id = $_POST["district_id"];
        $phone = $_POST["phone"];
        $facebook = $_POST["facebook"];
        $line = $_POST["line"];
        $email = $_POST["email"];
        $brand = $_POST["brand"];
        $farmer_group = $_POST["farmer_group"];
        $link_youtube = $_POST["link_youtube"];
        $username = $_POST["username"];
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];
        $username = $_SESSION["username"];

        $farmer_type_id = '2';
        if($_SESSION["status"]=='ปัจจัย'){
            $farmer_type_id = '3';
        }

    $UpdateProfileSQL = "UPDATE profile SET  name_surname='$name', address='$address', subdictrict='$subdictrict', district_id='$district_id', phone='$phone', facebook='$facebook', line='$line', email='$email', brand='$brand', farmer_group='$farmer_group', link_youtube='$link_youtube', latitude='$latitude', longitude='$longitude', picture='$PictureName', farmer_type_id='$farmer_type_id'where username='$username'";
	$objQuery = mysqli_query($objCon,$UpdateProfileSQL);

      
    
            $_SESSION["name_surname"] = $name;
            $_SESSION["address"] = $address;
            $_SESSION["picture"] = $PictureName;
            $_SESSION["phone"] = $phone;
            $_SESSION["facebook"] = $facebook;
            $_SESSION["line"] = $line;
            $_SESSION["email"] = $email;
            $_SESSION["latitude"] = $latitude;
            $_SESSION["longitude"] = $longitude;
    header("location:index.php");

?>