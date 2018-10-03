
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AddAdmin</title>
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
                    $('#blah').attr('style', 'background-image: url('+e.target.result+');');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

	<body>

	

	<div id="fh5co-page">
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="header-inner">
				<h1><i class="sl-icon-energy"></i><a href="index.php">Lesser</a></h1>

			</div>
		</div>
	</header>
	<div id="fh5co-contact-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>ลงทะเบียนเพิ่มผู้ดูแลระบบ</h2>
					<p><span>New Admin Registration</span></p>
				</div>
			</div>
			<div class="row">

				<div class="col-md-10 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
					<div class="row">
						<form action="save-register-admin.php" method="post" enctype="multipart/form-data"  name="frmMain" id="frmMain" runat="server" onSubmit="JavaScript:return fncSubmit();">
						
			<div class="col-md-4 text-center">

					<div class="work-inner">
						<a  class="work-grid" style="background-image: url(images/Admin.png);" id="blah" >
						</a>
						<div class="desc">
							<input class="form-control" placeholder="Picture" type="file" name="fileToUpload" Oonchange="readURL(this);" onchange="readURL(this);">
						</div>
					</div>
				</div>

							<div class="col-md-6">


								<div class="form-group">
									<input class="form-control" placeholder="ชื่อ - นามสกุล" type="text" name="name">
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" placeholder="ชื่อผู้ใช้งาน" type="text" name="username">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" placeholder="รหัสผ่าน" type="password" name="password" id="p1">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" placeholder="ยืนยันรหัสผ่านอีกครั้ง" type="password"name="confirm-password" id="p2">
								</div>
							</div>
							
							


					</div>
				</div>
			</div>
		</div>
	</div>



  			<div class="col-md-12">
              <div class="form-group">
                <center>
                <input value="ยืนยันการเพิ่มผู้ดูแลระบบ" class="btn btn-primary" type="submit" name="submit">
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

	<script language="javascript">
		function fncSubmit()
		{
			if(document.frmMain.firstname.value == "")
			{
				alert('กรุณากรอกชื่อจริง');
				document.frmMain.firstname.focus();
				return false;
			}   
			if(document.frmMain.lastname.value == "")
			{
				alert('กรุณากรอกนามสกุล');
				document.frmMain.lastname.focus();      
				return false;
			}
			if(document.frmMain.username.value == "")
			{
				alert('กรุณากรอกชื่อผู้ใช้');
				document.frmMain.username.focus();      
				return false;
			}  
			if(document.frmMain.password.value == "")
			{
				alert('กรุณากรอกรหัสผ่าน');
				document.frmMain.password.focus();      
				return false;
			}
			if(document.frmMain.age.value == "")
			{
				alert('กรุณากรอกอายุ');
				document.frmMain.age.focus();      
				return false;
			}       
			document.frmMain.submit();
		}
	</script>

	</body>
</html>