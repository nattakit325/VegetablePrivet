
<?php
session_start();
	include "connect.php";
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

	$sql = "SELECT * FROM `profile`INNER JOIN districts ON profile.district_id = districts.district_id WHERE username = '$id'";
	$queryProfile=mysqli_query($objCon,$sql);
	$objResultProfile = mysqli_fetch_array($queryProfile, MYSQLI_ASSOC);

	$sql = "SELECT * FROM farmer_infomation WHERE profileID = '$id'";
	$queryInfo=mysqli_query($objCon,$sql);
	$objResultInfo = mysqli_fetch_array($queryInfo, MYSQLI_ASSOC);
	if($objResultInfo){
		$sql = "SELECT * FROM farmer_infomation INNER JOIN product_log_for_farmer 
			ON farmer_infomation.id = product_log_for_farmer.farmer_information_id INNER JOIN product 
			ON product_log_for_farmer.product_id = product.id 
			WHERE profileID = '$id'";
		$queryProduct=mysqli_query($objCon,$sql);
	}
	
 ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Show Farmer Detail</title>
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



	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDO9xE9smgXJIDFDpyPaDGZcjQu-ybwOKc&callback=setupMap">

	</script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
 	<script type="text/javascript" src="js/showUser.js"></script>


<script>
		 var bFbStatus = false;
  var fbID = "";
  var fbName = "";
  var fbEmail = "";

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '303133320267472',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();   
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));


function statusChangeCallback(response)
{

    if(bFbStatus == false)
    {
      fbID = response.authResponse.userID;

        if (response.status == 'connected') {
        getCurrentUserInfo(response)
        } else {
        FB.login(function(response) {
          if (response.authResponse){
          getCurrentUserInfo(response)
          } else {
          console.log('Auth cancelled.')
          }
        }, { scope: 'email' });
        }
    }


    bFbStatus = true;
}


    function getCurrentUserInfo() {
      FB.api('/me?fields=name,email', function(userInfo) {


      
      fbName = userInfo.name;
      fbEmail = userInfo.email;

      $("#hdnFbID").val(fbID);
      $("#hdnName ").val(fbName);
      $("#hdnEmail").val(fbEmail);
      $("#frmMain").submit();

      });
    }

function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}

	</script>


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
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>แสดงข้อมูลเกษตรกร</h2>
					<p><span>Show Detail Farmer</span></p>
				</div>
			</div>
			<div class="row">

				<div class="col-md-10 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
					<div class="row">
			<div class="col-md-4 text-center">

					<div class="work-inner">
						<a  class="work-grid" style="background-image: url(images/<?php echo $objResultProfile['picture']; ?>);" id="blah" >
						</a>
					</div>
				</div>

							<div class="col-md-6">


								<div class="form-group">
									<p>ชื่อ-นามสกุล</p>
									<input class="form-control" placeholder="ชื่อ-นามสกุล" type="text" value="<?php echo $objResultProfile['name_surname']; ?>"   readonly="">
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<p>ที่อยู่</p>
									<input class="form-control" value="<?php echo $objResultProfile['address']; ?> ต.<?php echo $objResultProfile['subdictrict']; ?> อ.<?php echo $objResultProfile['district_name']; ?>" type="text" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>โทรศัพท์</p>
									<input class="form-control" value="<?php echo $objResultProfile['phone']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>Facebook</p>
									<input class="form-control" value="<?php echo $objResultProfile['facebook']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>Line</p>
									<input class="form-control" value="<?php echo $objResultProfile['line']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>Email</p>
									<input class="form-control" value="<?php echo $objResultProfile['email']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>Brand</p>
									<input class="form-control" value="<?php echo $objResultProfile['brand']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>สถานที่ขาย</p>
									<input class="form-control" value="<?php echo $objResultProfile['sellproduct']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>กลุ่ม</p>
									<input class="form-control" value="<?php echo $objResultProfile['farmer_group']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>LinkYoutube</p>
									<a href="<?php echo $objResultProfile['link_youtube']; ?>"><?php echo $objResultProfile['link_youtube']; ?></a>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>Transport</p>
									<input class="form-control" value="<?php echo $objResultProfile['transport']; ?>" readonly="">
								</div>
							</div>
							<?php if($objResultInfo){ ?>
							<div class="col-md-6">
								<div class="form-group">
									<p>ปีที่เริ่มปลูก</p>
									<input class="form-control" value="<?php echo $objResultInfo['year_begin']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>ทุ่งนา</p>
									<input class="form-control" value="<?php echo $objResultInfo['rice_field']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>ทำไร่</p>
									<input class="form-control" value="<?php echo $objResultInfo['farm']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>ทำสวน</p>
									<input class="form-control" value="<?php echo $objResultInfo['orchard']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>พื้นที่เพาะปลูก(ไร่)</p>
									<input class="form-control" value="<?php echo $objResultInfo['farm_area']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>พื้นที่เพาะปลูก(งาน)</p>
									<input class="form-control" value="<?php echo $objResultInfo['farm_area_ngan']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>วัว(ตัว)</p>
									<input class="form-control" value="<?php echo $objResultInfo['cow_or_ox']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>ควาย(ตัว)</p>
									<input class="form-control" value="<?php echo $objResultInfo['buffalo']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>ไก่(ตัว)</p>
									<input class="form-control" value="<?php echo $objResultInfo['chicken']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>เป็ด(ตัว)</p>
									<input class="form-control" value="<?php echo $objResultInfo['duck']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>หมู(ตัว)</p>
									<input class="form-control" value="<?php echo $objResultInfo['pig']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>แหล่งน้ำที่ใช้</p>
									<input class="form-control" value="<?php echo $objResultInfo['water source']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>ปุ๋ยอินทรีย์สำเร็จรูปยี่ห้อที่ใช้</p>
									<input class="form-control" value="<?php echo $objResultInfo['organic_fertilizer']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>ปริมาณที่ใช้ (กก./ไร่)</p>
									<input class="form-control" value="<?php echo $objResultInfo['amount_to_use']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>ปัจจัยที่ทำให้เกษตรอินทรีย์ประสบความสำเร็จ(ลำดับที่1)</p>
									<input class="form-control" value="<?php echo $objResultInfo['1_factor']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>ปัจจัยที่ทำให้เกษตรอินทรีย์ประสบความสำเร็จ(ลำดับที่2)</p>
									<input class="form-control" value="<?php echo $objResultInfo['2_factor']; ?>" readonly="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p>ปัจจัยที่ทำให้เกษตรอินทรีย์ประสบความสำเร็จ(ลำดับที่3)</p>
									<input class="form-control" value="<?php echo $objResultInfo['3_factor']; ?>" readonly="">
								</div>
							</div>
								<div class="col-md-6">
								<div class="form-group">
									<p>แรงบันดาลใจในการเปลี่ยนมาทำเกษตรอินทรีย์</p>
									<input class="form-control" value="<?php echo $objResultInfo['inspiration']; ?>" readonly="">
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
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
</html>
