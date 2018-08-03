
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Register</title>
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
 
<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {

			var reader = new FileReader();
			reader.onload = function (e) {
				$('#blah').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>
	<body>

	<div class="modal fade" id="myModal" role="dialog">
      <div class="modal-content">

	  <div class="modal-body">
			<body onload="setupMap()">

				<div id="map_canvas" style="width:800px;height:450px;"></div>

			</body>
        </div>
      </div>

  </div>

	<div id="fh5co-page">
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="header-inner">
				<h1><i class="sl-icon-energy"></i><a href="index.html">Lesser</a></h1>

			</div>
		</div>
	</header>
	<div id="fh5co-contact-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>ลงทะเบียนสมาชิกใหม่</h2>
					<p><span>New Member Registration</span></p>
				</div>
			</div>
			<div class="row">

				<div class="col-md-10 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
					<div class="row">
						<form action="save-register.php" method="post" enctype="multipart/form-data">
			<div class="col-md-4 text-center">

					<div class="work-inner">
						<img src="images/profile.png"  id="blah" class="work-grid">
						</a>
						<div class="desc">
							<input class="form-control" placeholder="Picture" type="file" name="filUpload" Oonchange="readURL(this);">
						</div>
					</div>
				</div>

							<div class="col-md-6">


								<div class="form-group">
									<input class="form-control" placeholder="ชื่อจริง" type="text" name="firstname">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" placeholder="นามสกุล" type="text" name="lastname">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" placeholder="ชื่อผู้ใช้งาน" type="text" name="username">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" placeholder="รหัสผ่าน" type="password" name="password">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<select class="form-control" name="status">
										<option value="เกษตรกร">เกษตรกร</option>
										<option value="ปัจจัย">ปัจจัย</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" placeholder="อายุ" type="number" name="age">
								</div>
							</div>


					</div>
				</div>
			</div>
		</div>
	</div>
<div class="row">
        <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
          <h2>ช่องทางการติดต่อของคุณ</h2>
          <p ip="pp"><span>Your contact</span></p>

          <div class="col-md-6">


								<div class="form-group">
									<input class="form-control" placeholder="ที่อยู่" type="text" name="address">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" placeholder="เบอร์โทรศัพท์" type="text" name="tel">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" placeholder="Facebook" type="text" name="facebook">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" placeholder="Line" type="text" name="line">
								</div>
							</div>


        </div>
      </div>


  			<div class="col-md-12">
              <div class="form-group">
                <br>
                <center>
                <input value="ยืนยันการสมัครสมาชิก" class="btn btn-primary" type="submit" name="submit">
                </center>
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
	<!-- MAIN JS -->
	<script src="js/main.js"></script>



	</body>
</html>
