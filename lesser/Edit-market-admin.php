<?php
    header("Content-Type: application/json; charset=UTF-8");
     include "connect.php";
     session_start();
     $target_dir = "uploads_product/";

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
    $PictureName = filter_input(INPUT_POST, 'pictureMarket', FILTER_SANITIZE_STRING);
}
     $id= filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
     $market_name= filter_input(INPUT_POST, 'market_name', FILTER_SANITIZE_STRING);
     $latitude= filter_input(INPUT_POST, 'latitude', FILTER_SANITIZE_STRING);
     $longitude= filter_input(INPUT_POST, 'longitude', FILTER_SANITIZE_STRING);
     $address= filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
     $tel= filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
     $Categoryfactor= filter_input(INPUT_POST, 'Categoryfactor', FILTER_SANITIZE_STRING);
     $market_type= filter_input(INPUT_POST, 'market_type', FILTER_SANITIZE_STRING);
     $openingTime= filter_input(INPUT_POST, 'openingTime', FILTER_SANITIZE_STRING);
     $closingTime= filter_input(INPUT_POST, 'closingTime', FILTER_SANITIZE_STRING);
     $openDate= filter_input(INPUT_POST, 'openDate', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
     $openDateMarket = "";
     if($openDate){
        foreach ($openDate as $key => $value) {
             if($openDate[0] == "ทุกวัน"){
                $openDateMarket = $openDate[0];
                break;  
             }else{
               $openDateMarket = $openDateMarket.$value.",";
             }
        }
     }else{
        $openDateMarket = filter_input(INPUT_POST, 'opendateO', FILTER_SANITIZE_STRING);
     }
     $strSQL1 = "UPDATE `market` SET market='$market_name',latitude='$latitude',longitude='$longitude',market_address='$address',market_tel='$tel',market_Categoryfactor='$Categoryfactor',pictureMarket='$PictureName',market_type_id='$market_type',openDate='$openDateMarket',openingTime='$openingTime',closingTime='$closingTime' WHERE id=$id";
    $objQuery1 = mysqli_query($objCon,$strSQL1);
       
    if($objQuery1){
      header("location:suscess.php");

    }
?>