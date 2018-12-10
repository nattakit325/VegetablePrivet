<?php
	session_start();
    include "connect.php";
    $username =  $_SESSION["username"];
    $sql = "SELECT m.id as id,m.market as market FROM market m INNER JOIN gmarket g on m.id = g.marketid where g.username = '$username'";
    $queryA = mysqli_query($objCon, $sql);

    $Profilesql = "SELECT p.name_surname as name_surname,p.address as address,p.subdictrict as subdictrict,d.district_name as district_name,d.district_id as district_id,p.phone as phone,p.facebook as facebook,p.line as line,p.email as email, p.brand as brand,p.farmer_group as farmer_group, p.link_youtube as link_youtube,p.username as username,p.latitude as latitude,p.longitude as longitude FROM profile p INNER join districts d on p.district_id = d.district_id  WHERE p.username = '$username'";
    $queryPro = mysqli_query($objCon, $Profilesql);
    $objResult = mysqli_fetch_array($queryPro,MYSQLI_ASSOC);

    $sql = "SELECT district_id as id,district_name as name from districts";

	$query=mysqli_query($objCon,$sql);

	

 



?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Edit Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

  <!--
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE
	DESIGNED & DEVELOPED by FreeHTML5.co

	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />



	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="css/simple-line-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>

	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
<style>
.circle{ /* ชื่อคลาสต้องตรงกับ <img class="circle"... */
    height: 40px;  /* ความสูงปรับให้เป็นออโต้ */
    width: 40px;  /* ความสูงปรับให้เป็นออโต้ */
    border: 3px solid #fff; /* เส้นขอบขนาด 3px solid: เส้น #fff:โค้ดสีขาว */
    border-radius: 50%; /* ปรับเป็น 50% คือความโค้งของเส้นขอบ*/
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); /* เงาของรูป */
}
.circlein{ /* ชื่อคลาสต้องตรงกับ <img class="circle"... */
    height: 140px;  /* ความสูงปรับให้เป็นออโต้ */
    width: 140px;  /* ความสูงปรับให้เป็นออโต้ */
    border: 3px solid #fff; /* เส้นขอบขนาด 3px solid: เส้น #fff:โค้ดสีขาว */
    border-radius: 50%; /* ปรับเป็น 50% คือความโค้งของเส้นขอบ*/
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); /* เงาของรูป */
}
</style>
	<body>
		<div class="modal fade" id="myModal2" role="dialog">
      <div class="modal-content">

        <div class="modal-body">
				<div id="map"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">ออก</button>
        </div>
      </div>

 </div>
    
<div class="modal fade" id="forconfermdelete" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><p class="modal-title">ต้องลบตลาดที่คุณเลือกหรือไม่</p></center>
        </div>
        <div class="modal-body">
          <center>
						
  <br>

 	<button type="button" class="btn btn-warning" onclick="deleteMarket()"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;ต้องการ</button>
  <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
        </center>
          
        </div>
        
          
        
      </div>
    </div>
  </div>





    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">กรุณาเข้าสู่ระบบ</h4></center>
        </div>
        <div class="modal-body">
          <center>
						<form action="check_login.php" method="POST"  id="login_form">
							<p id="txtHint" style="color:red; "></p>
							
							<div class="form-group">
								<input type="text" class="form-control" name="usr" placeholder="Username" required id="usr">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="pwd" placeholder="Password" required id="pwd">
								<input type="hidden"  name="page" value="buylist.php" id="page"> 
							</div>
							<button type="button" class="btn btn-success" onclick="showUser(document.getElementById('usr').value,document.getElementById('pwd').value,document.getElementById('page').value)">เข้าสู่ระบบ</button>
							<!--<input type="submit" class="btn btn-success" placeholder="Password" value="เข้าสู่ระบบ">-->

						</form>
  <br>
  <a href="register.html">ยังไม่ได้สมัครบัญชีในระบบ</a>
        </center>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title"><?php echo $_SESSION["name_surname"];?> </h4></center>
        </div>
        <div class="modal-body">
          <center>
						<img class="circlein" src="images/<?php echo $_SESSION["picture"]?>" width="100%" height="100%" />
						<br>
						<br>
						<p>FirstName : <?php echo $_SESSION["name_surname"];?></p>
						<p>career     : <?php echo $_SESSION["status"];?></p>
  <br>

  <a href="edit.html"><button type="button" class="btn btn-success" >แก้ไขข้อมมูลส่วนตัว</button></a>
  <a href="ClearSession.php"><button type="button" class="btn btn-warning" >ออกจากระบบ</button></a>
        </center>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
        </div>
      </div>
    </div>
  </div>



	<div id="fh5co-page">
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="header-inner">
				<h1><i class="sl-icon-energy"></i><a href="index.php">Lesserr</a></h1>
				<nav role="navigation">
					<ul>
						<li>
							<?php if(empty($_SESSION["username"])){
								?>
							<a href="" data-toggle="modal" data-target="#myModal">เข้าสู่ระบบ</a></li>
							<a href="" data-toggle="modal" data-target="#myModal"><img class="circle" src="images/profile.png" width="10%" height="12%" /></a>
						<?php }else{?>
							<a href="" data-toggle="modal" data-target="#login"><?php echo $_SESSION["name_surname"];?> </a></li>
							<a href="" data-toggle="modal" data-target="#login"><img class="circle" src="images/<?php echo $_SESSION["picture"]?>" width="10%" height="12%" /></a>
							<br>
							
						<?php } ?>
						
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<br>
	<br>
	<div id="fh5co-contact-section">
		<div class="container">
			<form action="Update-Password.php" method="POST" onsubmit="return CheckPass()">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
						<h2>แก้รหัสผ่าน</h2>
						<p><span>Edit Password</span></p>
					</div>
				</div>
				<div class="row" align="center">
					<div class="col-md-4 col-md-offset-4">
						<div class="form-group">
	                        <label>รหัสผ่านเก่า</label>
							<input class="form-control" placeholder="รหัสผ่านเก่า" type="password" name="oldPass" required="" id="oldPass" maxlength="50">
						</div>
	              </div>
				</div>
				<div class="row" align="center">
					<div class="col-md-4 col-md-offset-4">
						<div class="form-group">
	                        <label>รหัสผ่านใหม่</label>
							<input class="form-control" placeholder="รหัสผ่านใหม่" type="password" name="NewPass" maxlength="50" required="" id="NewPass" maxlength="50"><br>
							<input class="form-control" placeholder="ยืนยันรหัสผ่าน" type="password" name="CheckPass1" required="" id="CheckPass1" maxlength="50">
						</div>
	              </div>
				</div>
				<div class="row" align="center">
					<input value="ยืนยันการแก้ไข" class="btn btn-primary" type="submit" name="submit">
				</div>
			</form>
		</div>

<script type="text/javascript">
	function CheckPass(){
		var NewPass = document.getElementById("NewPass").value;
		var oldPass = document.getElementById("oldPass").value;
		var CheckPass1 = document.getElementById("CheckPass1").value;
		var value = null;
		$.ajax({
	        method: "POST",
	        url: "CheckPass.php",
	        async: false,
	        data: { oldPass:oldPass },
	        success: function(data){
	            	value = data;
	            	
	            }
	    }); 
	    if(value==1){
	    	if(CheckPass1!=NewPass){
				alert("รหัสผ่านไม่ตรงกัน");
				document.getElementById("NewPass").focus();
				return false;
			}else{
				return true;
			}    
	    }else{
	    	document.getElementById("oldPass").focus();
	    	alert("รหัาผ่านเก่าไม่ถูกต้อง");
			return false;
		}
	}
</script>
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Google Map -->
	<!-- MAIN JS -->
	<script src="js/main.js"></script>
	</body>
</html>
