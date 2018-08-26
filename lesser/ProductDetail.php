
<?php
	session_start();
	include "connect.php";

	$SellerName=$_GET["SellerName"];
	$Productid=$_GET["Productid"];
	$MarketId=$_GET["MarketId"];
	$sql="SELECT d.name as ProductName, d.picture as picture, d.detail as detail, 
	p.name as name, p.surname as surname,c.address as address,c.phone as phone,
	c.facebook as facebook, c.line as line,p.picture as img ,m.market as  marketName ,
	m.latitude as latitude , m.longitude as longitude FROM selllist s INNER join product d on 
	s.productid = d.id INNER JOIN profile p on s.username = p.username inner join contact c on
	s.username = c.username INNER JOIN  gmarket g ON  g.username=p.username INNER JOIN market m ON 
	m.id=g.marketid where s.username = '$SellerName' and s.productid = '$Productid' ";
	$queryA=mysqli_query($objCon,$sql);
		
	$sqlgetbyMarketid="SELECT d.name as ProductName, d.picture as picture, d.detail as detail, 
	p.name as name, p.surname as surname,c.address as address,c.phone as phone,
	c.facebook as facebook, c.line as line,p.picture as img ,m.market as  marketName ,
	m.latitude as latitude , m.longitude as longitude FROM selllist s INNER join product d on 
	s.productid = d.id INNER JOIN profile p on s.username = p.username inner join contact c on
	s.username = c.username INNER JOIN  gmarket g ON  g.username=p.username INNER JOIN market m ON 
	m.id=g.marketid where s.username = '$SellerName' and s.productid = '$Productid' AND m.id= $MarketId";
		$query=mysqli_query($objCon,$sqlgetbyMarketid);
		$objResult = mysqli_fetch_array($query,MYSQLI_ASSOC);
	

?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Lesser &mdash; Free HTML5 Bootstrap Website Template by FreeHTML5.co</title>
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
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDO9xE9smgXJIDFDpyPaDGZcjQu-ybwOKc">
	</script>
		<style>
.circle{ /* ชื่อคลาสต้องตรงกับ <img class="circle"... */
    height: 40px;  /* ความสูงปรับให้เป็นออโต้ */
    width: 40px;  /* ความสูงปรับให้เป็นออโต้ */
    border: 3px solid #fff; /* เส้นขอบขนาด 3px solid: เส้น #fff:โค้ดสีขาว */
    border-radius: 50%; /* ปรับเป็น 50% คือความโค้งของเส้นขอบ*/
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); /* เงาของรูป */
}
.picture{ /* ชื่อคลาสต้องตรงกับ <img class="circle"... */
    height: 30px;  /* ความสูงปรับให้เป็นออโต้ */
    width: 30px;  /* ความสูงปรับให้เป็นออโต้ */
    border: 3px solid #fff; /* เส้นขอบขนาด 3px solid: เส้น #fff:โค้ดสีขาว */
    border-radius: 50%; /* ปรับเป็น 50% คือความโค้งของเส้นขอบ*/
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); /* เงาของรูป */
}
.circlein{ /* ชื่อคลาสต้องตรงกับ <img class="circle"... */
    height: 150px;  /* ความสูงปรับให้เป็นออโต้ */
    width: 140px;  /* ความสูงปรับให้เป็นออโต้ */
    border: 3px solid #fff; /* เส้นขอบขนาด 3px solid: เส้น #fff:โค้ดสีขาว */
    border-radius: 50%; /* ปรับเป็น 50% คือความโค้งของเส้นขอบ*/
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); /* เงาของรูป */
}
</style>

	</head>
	<body>

		




	<div class="modal fade" id="myModal" role="dialog">
      <div class="modal-content">
        
        <div class="modal-body">
				<div id="map"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">ออก</button>
        </div>
      </div>
    
  </div>

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
          <center><h4 class="modal-title"><?php echo $_SESSION["name"];?> <?php echo $_SESSION["surname"];?></h4></center>
        </div>
        <div class="modal-body">
          <center>
						<img class="circlein" src="images/<?php echo $_SESSION["picture"]?>" width="100%" height="100%" />
						<br>
						<br>
						<p>FirstName : <?php echo $_SESSION["name"];?></p>
						<p>LastName   : <?php echo $_SESSION["surname"];?></p>
						<p>career     : <?php echo $_SESSION["career"];?></p>
						<p>age        : <?php echo $_SESSION["age"];?></p>
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
							<a href="" data-toggle="modal" data-target="#myModal1">เข้าสู่ระบบ</a></li>
							<a href="" data-toggle="modal" data-target="#myModal1"><img class="circle" src="images/profile.png" width="10%" height="12%" /></a>
						<?php }else{?>
							<a href="" data-toggle="modal" data-target="#login"><?php echo $_SESSION["name"];?> <?php echo $_SESSION["surname"];?></a></li>
							<a href="" data-toggle="modal" data-target="#login"><img class="circle" src="images/<?php echo $_SESSION["picture"]?>" width="10%" height="12%" /></a>
						<?php } ?>
						
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<div id="fh5co-about-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2><?php echo $objResult["ProductName"]; ?></h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<div class="about-inner">
								<img class="img-responsive" src="uploads_product/<?php echo $objResult["picture"]; ?>" alt="About" height="100%" width="100%">
								
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-4">
					<aside class="sidebar">
						<div class="row">
							<div class="col-md-12 side">
								<h3><i class="fas fa-info-circle"></i>&nbsp;&nbsp;รายละเอียด</h3>
								<ul>
									<li>
										<?php echo $objResult["detail"]; ?>
									</li>
									
								</ul>
							</div>

							<div class="col-md-12 side">
								<h3><img class="picture" src="images/<?php echo $objResult["img"]; ?>" width="10%" height="12%" />&nbsp;&nbsp;ผู้จำหน่าย</h3>
								<ul>
									<li>
										<li><?php echo $objResult["name"];?>  &nbsp;&nbsp;<?php echo $objResult["surname"];?></li>
						
									</li>
									
								</ul>
							</div>
							<div class="col-md-12 side">
								<h3><i class="fas fa-address-card"></i>&nbsp;&nbsp;ช่องทางการติดต่อ</h3>
								<ul>
									<li>
										<li><i class="fas fa-map-marker-alt"></i><a href="#"><?php echo $objResult["address"]; ?></a></li>
									<li><i class="fas fa-map-pin"></i></i><a href="#"> ห่างออกไป 14 กม.</a></li>
									<li><i class="fas fa-phone"></i><a href="#"><?php echo $objResult["phone"]; ?></a></li>
									<li><i class="icon-facebook"></i><a href="#"><?php echo $objResult["facebook"]; ?></a></li>
									<li><i class="fab fa-line"></i><a href="#"><?php echo $objResult["line"]; ?></a></li>
						</a>

									</li>
									
								</ul>
								<br><br><br>
								<center><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fas fa-map-marked"></i>&nbsp;&nbsp;ดูสถานที่ขายสินค้า</button></center>
							</div>
							
						</div>
					</aside>
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
	 
	<script type="text/javascript" src="js/showUser.js"></script>
	</body>
</html>
<script type="text/javascript">
    var locations = [
			<?php while ($row = mysqli_fetch_array($queryA, MYSQLI_ASSOC)) {?>
				['<?php echo $row["marketName"]; ?>', <?php echo $row["latitude"]; ?>, <?php echo $row["longitude"]; ?>, 4],
	 		<?php }?>
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 14,
      center: new google.maps.LatLng(<?php echo $objResult["latitude"]; ?>,<?php echo $objResult["longitude"]; ?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>