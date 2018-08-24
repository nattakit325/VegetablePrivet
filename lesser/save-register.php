<?php

     include "connect.php";

     $target_dir = "/home/nattakit/domains/nattakitmju.com/public_html/uploads_product/";
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
             rename("$target_file","$target_dir"."$PictureName.$pieces[1]");
             
         } else {
 
         
         }
     }
 
 
 
     //---------------------------------------//

        $pass = $_POST["password"];
        $strSQL = "SELECT * FROM login WHERE username = '".mysqli_real_escape_string($objCon,$_POST["username"])."'";
        $objQuery4 = mysqli_query($objCon,$strSQL);
        $objResult4 = mysqli_fetch_array($objQuery4,MYSQLI_ASSOC);
        if($objResult4["username"]== $_POST['username']){
            echo "<script language=\"JavaScript\">";
            echo "alert('ชื่อซ้ำ');";
            echo "window.location = 'register.php'; ";
            echo "</script>";
            exit();
        }else{
        $strSQL1 = "INSERT INTO login ";
        $strSQL1 .="(username,password,status) VALUES ('".$_POST["username"]."','$pass','".$_POST["status"]."')";
        $objQuery = mysqli_query($objCon,$strSQL1);
        
        $strSQL2 = "INSERT INTO profile ";
        $strSQL2 .="(name,surname,career,age,picture,username) VALUES ('".$_POST["firstname"]."','".$_POST["lastname"]."','".$_POST["status"]."','".$_POST["age"]."','$PictureName.$pieces[1]','".$_POST["username"]."')";
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