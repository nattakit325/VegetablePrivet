

<?php
session_start();
include "connect.php";


        $sqlAdmin = "SELECT username FROM `login` where status ='admin' or status ='superAdmin'";
        $queryAdmin=mysqli_query($objCon,$sqlAdmin);
        while($row=mysqli_fetch_array($queryAdmin,MYSQLI_ASSOC)){ 
            $sql="
            INSERT INTO tbl_chat SET 
            chat_msg='fdhdfhfgh',
            chat_user1='test',  
            chat_user2='".$row["username"]."',
            chat_datetime='".date("Y-m-d H:i:s")."' ,
            status=1        
            ";
            $objQuery = mysqli_query($objCon,$sql);

        }
 
?>