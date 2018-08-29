<?php
<?php  
session_start();
include "connect.php";
// ถ้ามี session ของคนที่กำลังใช้งานอยู่ และมีค่า id ของคนที่เป็นจะส่งไปหา และข้อความไม่ว่าง ส่งมาเพิ่มข้อมูล
if(isset($_POST['user1']) && $_POST['user1']!=""
&& isset($_POST['user2']) && $_POST['user2']!=""
&& isset($_POST['msg']) && $_POST['msg']!="" ){
    $sql="
    INSERT INTO chat SET 
    msg='".$_POST['msg']."',
    user1='".$_POST['user1']."',  
    user2='".$_POST['user2']."',
    datetime='".date("Y-m-d H:i:s")."'        
    ";
    $mysqli->query($sql);
    exit;
}
// ส่งค่ามาเพื่อรับข้อมูลไปแสดง
if(isset($_POST['viewData']) && $_POST['viewData']!=""){
header("Content-type:application/json; charset=UTF-8");            
header("Cache-Control: no-store, no-cache, must-revalidate");           
header("Cache-Control: post-check=0, pre-check=0", false);      
    if($_POST['viewData']==1){ // เงื่อนไขกรณีส่งค่ามาครั้งแรก แสดงรายการทั้งหมดที่มีอยู่ 
        // กำหนดเงื่อนไขคำสั่งแสดงรายการทั้งหมดของคู่สนทนา
        $sql="
        SELECT * FROM chat WHERE id>'".$_POST['maxID']."' AND
        (
            (user1='".$_POST['user1']."' AND user2='".$_POST['userID']."') OR 
            (user1='".$_POST['userID']."' user2='".$_POST['user1']."')
        )   
        ORDER BY id 
        ";
         
    }else{ // แสดงทีละรายการกรณีเริ่มสนทนา
        // กำหนดเงื่อนไขแสดงรายการล่าสุดที่ละ 1 รายการที่มีการเพิ่มเข้ามาใหม่
        $sql="
        SELECT * FROM chat WHERE id>'".$_POST['maxID']."' AND
        (
            (user1='".$_POST['user1']."' AND user2='".$_POST['userID']."') OR 
            (user1='".$_POST['userID']."' AND user2='".$_POST['user1']."')
        )   
        ORDER BY id LIMIT 1
        ";
    }
    $result = $mysqli->query($sql);
    if($result){
        while($row = $result->fetch_array()){
            $json_data[]=array(
                "max_id"=>$row['id'],
                "data_align"=>($_POST['user1']==$row['user1'])?"right":"left",// ถ้าเป็นข้อความที่ส่งจากผู้ใช้ขณะนั้น
                "data_msg"=>$row['msg']         
            );  
        }
    }
    $json =json_encode($json_data);
    echo $json;// ส่งค่ากลับเป็น json object
    exit;
}



?>