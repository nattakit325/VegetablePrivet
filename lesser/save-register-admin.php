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
    $PictureName = "Admin.png";
}

 
 
 
     //---------------------------------------//

        $pass = md5($_POST["password"]);
        $strSQL = "SELECT * FROM login WHERE username = '".mysqli_real_escape_string($objCon,$_POST["username"])."'";
        $objQuery4 = mysqli_query($objCon,$strSQL);
        $objResult4 = mysqli_fetch_array($objQuery4,MYSQLI_ASSOC);
        if($objResult4["username"]== $_POST['username']){
            echo "<script language=\"JavaScript\">";
            echo "alert('ชื่อซ้ำ');";
            echo "window.location = 'AddAdmin.php'; ";
            echo "</script>";
            exit();
        }else if($_POST["password"] != $_POST["confirm-password"]){
            echo "<script language=\"JavaScript\">";
            echo "alert('รหัสผ่านไม่ตรงกัน');";
            echo "window.location = 'AddAdmin.php'; ";
            echo "</script>";
        }else{
        $strSQL1 = "INSERT INTO login ";
        $strSQL1 .="(username,password,status) VALUES ('".$_POST["username"]."','$pass','admin')";
        $objQuery = mysqli_query($objCon,$strSQL1);


        $name = $_POST["name"];
        $username = $_POST["username"];
        
        $strSQL2 = "INSERT INTO profile (id, name_surname, address, subdictrict, district_id, phone, facebook, line, email, brand, farmer_group, link_youtube, latitude, longitude, picture, farmer_type_id, username) VALUES (NULL, '$name', null, null, 1, null, null, null, null, null, null, null, null , null, '$PictureName', null, '$username');";
        $objQuery = mysqli_query($objCon,$strSQL2);




        echo "<script language=\"JavaScript\">";
            echo "alert('เพิ่มผู้ดูแลระบบสำเร็จ');";
            echo "window.location = 'AccountMG.php'; ";
            echo "</script>";

        
           
       
       

        
         
         
        }

    
    


?>