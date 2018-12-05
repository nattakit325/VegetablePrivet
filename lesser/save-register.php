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
    $PictureName = "profile.png";
}

 
 
 
     //---------------------------------------//

        $pass = md5($_POST["password"]);
        $strSQL = "SELECT * FROM login WHERE username = '".mysqli_real_escape_string($objCon,$_POST["username"])."'";
        $objQuery4 = mysqli_query($objCon,$strSQL);
        $objResult4 = mysqli_fetch_array($objQuery4,MYSQLI_ASSOC);
        if($objResult4["username"]== $_POST['username']){
            echo "<script language=\"JavaScript\">";
            echo "alert('ชื่อซ้ำ');";
            echo "window.location = 'register.php'; ";
            echo "</script>";
            exit();
        }else if($_POST["password"] != $_POST["confirm-password"]){
            echo "<script language=\"JavaScript\">";
            echo "alert('รหัสผ่านไม่ตรงกัน');";
            echo "window.location = 'register.php'; ";
            echo "</script>";
        }else{
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
        $strSQL1 = "INSERT INTO login ";
        $strSQL1 .="(username,password,status) VALUES ('$username','$pass','$status')";
        $objQuery = mysqli_query($objCon,$strSQL1);

        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $subdictrict = filter_input(INPUT_POST, 'subdictrict', FILTER_SANITIZE_STRING);
        $district_id = filter_input(INPUT_POST, 'district_id', FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $facebook = filter_input(INPUT_POST, 'facebook', FILTER_SANITIZE_STRING);
        $line = filter_input(INPUT_POST, 'line', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $brand = filter_input(INPUT_POST, 'brand', FILTER_SANITIZE_STRING);
        $farmer_group = filter_input(INPUT_POST, 'farmer_group', FILTER_SANITIZE_STRING);
        $link_youtube = filter_input(INPUT_POST, 'link_youtube', FILTER_SANITIZE_STRING);
        $latitude = filter_input(INPUT_POST, 'latitude', FILTER_SANITIZE_STRING);
        $longitude = filter_input(INPUT_POST, 'longitude', FILTER_SANITIZE_STRING);
        $farmer_type_id = '3';

        $strSQL2 = "INSERT INTO profile (id, name_surname, address, subdictrict, district_id, phone, facebook, line, email, brand, farmer_group, link_youtube, latitude, longitude, picture, farmer_type_id, username) VALUES (NULL, '$name', '$address', '$subdictrict', '$district_id', '$phone', '$facebook', '$line', '$email', '$brand', '$farmer_group', '$link_youtube', '$latitude' , '$longitude' , '$PictureName', '$farmer_type_id', '$username');";
        $objQuery = mysqli_query($objCon,$strSQL2); 
        $strSQL = "SELECT * FROM login WHERE username = '".mysqli_real_escape_string($objCon,$_POST['username'])."'";
    $ProfileSQL = "SELECT * FROM profile WHERE username = '".mysqli_real_escape_string($objCon,$_POST['username'])."'";
    $objQuery = mysqli_query($objCon,$strSQL);
    $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

    $objQuery2 = mysqli_query($objCon,$ProfileSQL);
    $objResult2 = mysqli_fetch_array($objQuery2 ,MYSQLI_ASSOC);
                   $_SESSION["status"] = $objResult["status"];
            $_SESSION["username"] = $objResult["username"];
            $_SESSION["password"] = $objResult["password"];
            $_SESSION["name_surname"] = $objResult2["name_surname"];
            $_SESSION["address"] = $objResult2["address"];
            $_SESSION["picture"] = $objResult2["picture"];
            $_SESSION["phone"] = $objResult2["phone"];
            $_SESSION["facebook"] = $objResult2["facebook"];
            $_SESSION["line"] = $objResult2["line"];
            $_SESSION["email"] = $objResult2["email"];
            $_SESSION["latitude"] = $objResult2["latitude"];
            $_SESSION["longitude"] = $objResult2["longitude"];

                    session_write_close();
                    header("location:register2.php");
                
        }

    
    


?>