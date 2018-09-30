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
        $strSQL1 = "INSERT INTO login ";
        $strSQL1 .="(username,password,status) VALUES ('".$_POST["username"]."','$pass','".$_POST["status"]."')";
        $objQuery = mysqli_query($objCon,$strSQL1);
        
        $strSQL2 = "INSERT INTO profile ";
        $strSQL2 .="(name_surname,address,subdictrict,district_id,phone,facebook,line,email,brand,farmer_group,link_youtube,picture,farmer_type_id,username) VALUES ('".$_POST["name"]."','".$_POST["address"]."','".$_POST["subdictrict"]."','".$_POST["district_id"]."','".$_POST["phone"]."','".$_POST["facebook"]."','".$_POST["line"]."','".$_POST["email"]."','".$_POST["brand"]."','".$_POST["farmer_group"]."','".$_POST["link_youtube"]."','".$_POST["farmer_type_id"]."','$PictureName','".$_POST["username"]"')";
        $objQuery = mysqli_query($objCon,$strSQL2);  

        
           
       
       

        if($objResult["status"] != "ADMIN")
                {
                    $strSQL = "SELECT * FROM login WHERE username = '".mysqli_real_escape_string($objCon,$_POST['username'])."' 
                     and password = '$pass'";
                     $ProfileSQL = "SELECT name ,surname ,career ,age ,picture ,username FROM profile WHERE username = '".mysqli_real_escape_string($objCon,$_POST['username'])."'";
                    $objQuery = mysqli_query($objCon,$strSQL);
                    $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

                    $objQuery4 = mysqli_query($objCon,$ProfileSQL);
                    $objResult4 = mysqli_fetch_array($objQuery4,MYSQLI_ASSOC);
                    $_SESSION["status"] = $objResult["status"];
                    $_SESSION["username"] = $objResult["username"];
                    $_SESSION["password"] = $objResult["password"];
                    $_SESSION["name"] = $objResult4["name"];
                    $_SESSION["surname"] = $objResult4["surname"];
                    $_SESSION["career"] = $objResult4["career"];
                    $_SESSION["age"] = $objResult4["age"];
                    $_SESSION["picture"] = $objResult4["picture"];
                    session_write_close();
                    header("location:register2.php");
                }
        }

    
    


?>