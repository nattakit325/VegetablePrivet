<?php 
session_start();
include "connect.php";

$usermname = $_SESSION["username"];


$sqlForNotification = "SELECT COUNT(DISTINCT chat_user1) as chatAM from tbl_chat WHERE chat_user2='$usermname' 
							and status = 1 ";

	$queryForNotification=mysqli_query($objCon,$sqlForNotification);
	$objResultNor = mysqli_fetch_array($queryForNotification, MYSQLI_ASSOC);



?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>เพิ่มข้อมูลเกษตรกร</title>
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#dd1").click(function(){
          $("#d1").remove();
    });
    $("#dd2").click(function(){
          $("#d2").remove();
    });
    
   
});
</script>


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

<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('style', 'background-image: url('+e.target.result+');');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	<div class="modal fade" id="myModal1" role="dialog">
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
				<h1><i class="sl-icon-energy"></i><a href="index.php">OrganicApp</a></h1>
				<nav role="navigation">
					<ul>
						<li>
							<?php if(empty($_SESSION["username"])){
								?>
							<a href="" data-toggle="modal" data-target="#myModal">เข้าสู่ระบบ</a></li>
							<a href="" data-toggle="modal" data-target="#myModal"><img class="circle" src="images/profile.png" width="10%" height="12%" /></a>
						<?php }else{
							if ($objResultNor['chatAM']>0) {
								$color = 'red';
							}else{
								$color = 'gray';

							}
							?>
							<a href="TopChat.php" title="คุณมี <?php echo $objResultNor['chatAM'] ?> ข้อความ"><i class="fas fa-bell" style="color: <?php echo $color ?>">&nbsp;<?php echo $objResultNor['chatAM'] ?></i></a>
							<a data-toggle="modal" data-target="#login"><img class="circle" src="images/<?php echo $_SESSION["picture"]?>" width="10%" height="12%" /></a>
							
						<?php } ?>
						
					</ul>
				</nav>
			</div>
		</div>
	</header>



	<div id="fh5co-contact-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>เพิ่มข้อมูลเกษตรกร</h2>
					<p><span>Insert farmer</span></p>
				</div>
			</div>

			<div class="row">
				
				<div class="col-md-10 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
					<div class="row">
				
				<div class="col-md-10 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
					<div class="row">
						<form action="save-farmer.php" method="post" enctype="multipart/form-data" runat="server">
							<div class="col-md-4 text-center">
				</div>
							<div class="col-md-6">
								<div class="form-group">ชื่อ
									<input class="form-control" placeholder="ชื่อ" type="text" name="nameFarmer" required="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">รายละเอียดที่อยู่
									<textarea name="detailFarmer" class="form-control" id="" cols="30" rows="7" placeholder="รายละเอียด"></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">สินค้า
									<input class="form-control" placeholder="สินค้า" type="text" name="productFarmer" required="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">แบรนด์
									<input class="form-control" placeholder="แบรนด์" type="text" name="brandFarmer" required="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">สถานที่ขาย
									<input class="form-control" placeholder="สถานที่ขาย" type="text" name="adrFarmer" required="">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">ติดต่อ
									<input class="form-control" placeholder="ติดต่อ" type="text" name="conFarmer" required="">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">ลิ๊งค์ 
									<input class="form-control" placeholder="ลิ๊งค์" type="text" name="linkFarmer" required="">
								</div>
							</div>
                            <div class="col-md-6">
								<div class="form-group">ที่ตั้ง:ละติจูด (laitude)
									<input class="form-control" placeholder="laitude" type="text" name="laFarmer" required="">
								</div>
							</div>    
							<div class="col-md-6">
								<div class="form-group">ที่ตั้ง:ลองติจูด (longitude)
									<input class="form-control" placeholder="longitude" type="text" name="loFarmer" required="">
								</div>
							</div>
							
						<div class="col-md-12">
              <div class="form-group">
                <br>
                <center>
                <input value="เพิ่มข้อมูล" class="btn btn-primary" type="submit">
                </center>
              </div>
            </div>
						
					</div>
				</div>
						
			</div>
				</div>
			</div>
		</div>
	</div>

	

	</form>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>
	<!-- MAIN JS -->
	<script src="js/main.js"></script>

	</body>
</html>

