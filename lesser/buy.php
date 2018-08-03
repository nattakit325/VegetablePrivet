<?php
	include "connect.php";
	
	$value1='ราก';
	$value2='ลำต้น';
	$value3='ใบ';
	$value4='ดอก';
	$value5='ผล';
	$value6;

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Buy</title>
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

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>



	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>



		<style>
.circle{ /* ชื่อคลาสต้องตรงกับ <img class="circle"... */
    height: 40px;  /* ความสูงปรับให้เป็นออโต้ */
    width: 40px;  /* ความสูงปรับให้เป็นออโต้ */
    border: 3px solid #fff; /* เส้นขอบขนาด 3px solid: เส้น #fff:โค้ดสีขาว */
    border-radius: 50%; /* ปรับเป็น 50% คือความโค้งของเส้นขอบ*/
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); /* เงาของรูป */
}
</style>




<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">กรุณาเข้าสู่ระบบ</h4></center>
        </div>
        <div class="modal-body">
          <center>
						<form action="check_login.php" method="POST">
							<div class="form-group">
								<input type="text" class="form-control" name="usr" placeholder="Username">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="pwd" placeholder="Password">
							</div>
							<input type="submit" class="btn btn-success" id="pwd" placeholder="Password" value="เข้าสู่ระบบ">
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


	
	
	<div id="fh5co-page">
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="header-inner">
				<h1><i class="sl-icon-energy"></i><a href="index.html">Lesserr</a></h1>
				<nav role="navigation">
					<ul>
						<li><a href="" data-toggle="modal" data-target="#myModal">เข้าสู่ระบบ</a></li>
						<a href="" data-toggle="modal" data-target="#myModal"><img class="circle" src="images/profile.png" width="10%" height="12%" /></a>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<div id="fh5co-work-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>ประเภทสินค้า</h2>
					<p>Category</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 text-center">
					<div class="work-inner">
						<a href="buylist.php?value=<?php echo $value1;?>" class="work-grid" style="background-image: url(images/carrot.jpg);">
						</a>
						<div class="desc">
							<h3><a href="buylist.php?value=<?php echo $value1;?>">ราก</a></h3>
							<span>Root</span>
						</div>
					</div>
				</div>
				<div class="col-md-4 text-center">
					<div class="work-inner">
						<a href="buylist.php?value=<?php echo $value2;?>" class="work-grid" style="background-image: url(images/asparagus.jpg);">
						</a>
						<div class="desc">
							<h3><a href="buylist.php?value=<?php echo $value2;?>">ลำต้น</a></h3>
							<span>trunk</span>
						</div>
					</div>
				</div>
				<div class="col-md-4 text-center">
					<div class="work-inner">
						<a href="buylist.php?value=<?php echo $value3;?>" class="work-grid" style="background-image: url(images/cabbage.jpg);">
						</a>
						<div class="desc">
							<h3><a href="buylist.php?value=<?php echo $value3;?>">ใบ</a></h3>
							<span>Leaves</span>
						</div>
					</div>
				</div>
				<div class="col-md-4 text-center">
					<div class="work-inner">
						<a href="buylist.php?value=<?php echo $value4;?>" class="work-grid" style="background-image: url(images/Broccoli.jpg);">
						</a>
						<div class="desc">
							<h3><a href="buylist.php?value=<?php echo $value4;?>">ดอก</a></h3>
							<span>blossom</span>
						</div>
					</div>
				</div>
				<div class="col-md-4 text-center">
					<div class="work-inner">
						<a href="buylist.php?value=<?php echo $value5;?>" class="work-grid" style="background-image: url(images/tomato.jpg);">
						</a>
						<div class="desc">
							<h3><a href="buylist.php?value=<?php echo $value5;?>">ผล</a></h3>
							<span>fruit</span>
						</div>
					</div>
				</div>
				<div class="col-md-4 text-center">
					<div class="work-inner">
						<a href="buy-farmer-other.php" class="work-grid" style="background-image: url(images/vegetable.jpg);">
						</a>
						<div class="desc">
							<h3><a href="buy-farmer-other.php">อื่นๆ</a></h3>
							<span>other</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	</div>
	
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- MAIN JS -->
	<script src="js/main.js"></script>

	</body>
</html>

