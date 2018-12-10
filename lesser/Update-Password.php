<?php 
session_start();
include "connect.php";
$username = $_SESSION["username"];
$Password = filter_input(INPUT_POST, 'NewPass', FILTER_SANITIZE_STRING);
$Password = md5($Password);
$sql="UPDATE login SET password = '$Password' WHERE username = '$username'";
$query = mysqli_query($objCon,$sql);

echo '<script>alert("เปลี่ยนรหัสสำเร็จ");window.location = "/editProfile.php"</script>';

?>