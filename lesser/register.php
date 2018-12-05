
<?php
session_start();
	include "connect.php";

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

	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNyDumm4Nkun0UNrkqJdXjzUL_NXPl0V4&callback=setupMap">
	</script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
 


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
    <script>
function ShowMarker(){
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 14,
      center: new google.maps.LatLng(10,10),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();
    if (navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(function (position) {
		var pos = {
			lat: position.coords.latitude,
			lng: position.coords.longitude
		};
		infowindow.setPosition(pos);
		infowindow.setContent('คุณอยู่ตรงนี้');
		infowindow.open(map);
		map.setCenter(pos);
	});

	}
	google.maps.event.addListener(map, 'click', function (event) {

	var html = '';
	html += 'lat : <input type="text" id="lat" value="' + event.latLng.lat() + '" readonly/><br/>';
	html += 'lng : <input type="text" id="lng" value="' + event.latLng.lng() + '" readonly/><br/>';
	html += '<input type="button" value="ตกลง" onclick="Addlatlong()" />';
	infowindow.open(map);
	infowindow.setContent(html);
	infowindow.setPosition(event.latLng);
	//marker.setPosition(event.latLng);

});
}
function Addlatlong(){
	var lat = $("#lat").val();
	var lng = $("#lng").val();
	document.getElementById("lati").value = lat;
	document.getElementById("longi").value = lng;
	$('#myModal2').modal('hide');
}
</script>

	<body onload="ShowMarker()">
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

	

	<div id="fh5co-page">
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="header-inner">
				<h1><i class="sl-icon-energy"></i><a href="index.php">OrganicApp</a></h1>

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
						<form action="save-register.php" method="post" enctype="multipart/form-data"  name="frmMain" id="frmMain" runat="server" onSubmit="JavaScript:return fncSubmit();">
						
			<div class="col-md-4 text-center">

					<div class="work-inner">
						<a  class="work-grid" style="background-image: url(images/profile.png);" id="blah" >
						</a>
						<div class="desc">
							<input class="form-control" placeholder="Picture" type="file" name="fileToUpload" Oonchange="readURL(this);" onchange="readURL(this);">
						</div>
					</div>
				</div>

							<div class="col-md-6">


								<div class="form-group">
									<input class="form-control" placeholder="ชื่อ-นามสกุล" type="text" name="name" required="">
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" placeholder="ชื่อผู้ใช้งาน" type="text" name="username" required="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" placeholder="รหัสผ่าน" type="password" name="password" id="p1" required="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" placeholder="ยืนยันรหัสผ่านอีกครั้ง" type="password"name="confirm-password" id="p2" required=""> 
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<select class="form-control" name="status"  required="">
										<option value="" disabled="">เลือกประเภทผู้ใช้งาน</option>
										<option value="เกษตรกร">ผู้ขายสินค้า</option>
										<option value="เกษตรกร">เกษตรกร</option>
										<option value="ปัจจัย">ผู้ขายปัจจัย</option>
									</select>
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

									<input class="form-control" placeholder="ตำบล" type="text" name="subdictrict">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<select class="form-control" name="district_id" required="required">
										<option value="" selected=""  disabled="">เลือกอำเภอ</option>
										 <?php while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){ ?>
										<option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" placeholder="เบอร์โทรศัพท์" type="text" name="phone">
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
							<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" placeholder="Email" type="email" name="email">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" placeholder="Brand" type="text" name="brand">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" placeholder="Farmmer Group" type="text" name="farmer_group">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" placeholder="Youtube Link" type="text" name="link_youtube">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>latitude</label>
									<input class="form-control" placeholder="" id="lati" type="text" name="latitude">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>longitude</label>
									<input class="form-control" placeholder="" id="longi" type="text" name="longitude">
								</div>
							</div>
							<div class="col-md-3">
								<br>
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal2"><i class="fas fa-map-marked"></i>&nbsp;&nbsp;เพิ่มพิกัด</button>
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
				alert('กรุณากรอกวันเกิด');
				document.frmMain.age.focus();      
				return false;
			}       
			document.frmMain.submit();
		}
	</script>

	</body>
</html>
