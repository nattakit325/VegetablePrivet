
<?php 
session_start();
include "connect.php";

$username = $_SESSION["username"];
$sqlUser = "SELECT * FROM login WHERE username = '".$username."'";


$sql="SELECT * FROM login WHERE username = '".$username."'";

$ProfileSQL = "SELECT name ,surname ,career ,age ,picture ,username FROM profile WHERE username = '".$username."'";



$result = mysqli_query($objCon,$sql);
$objResult = mysqli_fetch_array($result,MYSQLI_ASSOC);

$result1 = mysqli_query($objCon,$sqlUser);
$objResult1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);


$objQuery2 = mysqli_query($objCon,$ProfileSQL);
$objResult2 = mysqli_fetch_array($objQuery2 ,MYSQLI_ASSOC);

		$_SESSION["status"] = $objResult["status"];
			$_SESSION["username"] = $objResult["username"];
			$_SESSION["password"] = $objResult["password"];
			$_SESSION["name"] = $objResult2["name"];
			$_SESSION["surname"] = $objResult2["surname"];
			$_SESSION["career"] = $objResult2["career"];
			$_SESSION["age"] = $objResult2["age"];
			$_SESSION["picture"] = $objResult2["picture"];

?>


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
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
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
                            <h2>ลงทะเบียนเสร็จสิ้น</h2>
                            <p><span><a href="index.php">กลับสู่หน้าหลัก</a></span></p>
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
	<!-- Google Map -->
	<!-- MAIN JS -->
	<script src="js/main.js"></script>



	</body>
</html>

