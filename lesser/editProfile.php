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

	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDO9xE9smgXJIDFDpyPaDGZcjQu-ybwOKc&callback=setupMap">
	</script>
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
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>แก้ไขโปรไฟล์</h2>
					<p><span>Edit Profile</span></p>
				</div>
			</div>
			<div class="row">

				<div class="col-md-10 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
					<div class="row">
						<form action="Update-Profile.php" method="post" enctype="multipart/form-data"  name="frmMain" id="frmMain">
						
			<div class="col-md-4 text-center">

					<div class="work-inner">
						<a  class="work-grid" style="background-image: url(images/<?php echo $_SESSION["picture"]?>);" id="blah" >
						</a>
						
						<div class="desc">
							<input class="form-control" placeholder="Picture" type="file" name="fileToUpload" onchange="readURL(this);">
						</div>
					</div>
				</div>

							<div class="col-md-6">
                                <input type="hidden" name="pictureold" value="<?php echo $_SESSION["picture"]?>">
                                

								<div class="form-group">
                                    <label>ชื่อ - นามสกุล</label>
									<input class="form-control" placeholder="ชื่อจริง" type="text" name="name" value="<?php echo $objResult["name_surname"];?>">
								</div>
							</div>
							<div class="col-md-6">
								<label>ชื่อผู้ใช้งาน</label>
								<div class="form-group">
									<input class="form-control" placeholder="ชื่อผู้ใช้งาน" type="text" name="username" value="<?php echo $objResult["username"];?>" >
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

                            	<label>ที่อยู่</label>
								<div class="form-group">
									<input class="form-control" placeholder="ที่อยู่" type="text" name="address"
									value="<?php echo $objResult["address"];?>">
								</div>
							</div>
							<div class="col-md-6">

								<label>ตำบล</label>
								<div class="form-group">

									<input class="form-control" placeholder="ตำบล" type="text" name="subdictrict" value="<?php echo $objResult["subdictrict"];?>">
								</div>
							</div>
							<div class="col-md-6">
								<label>อำเภอ</label>
								<div class="form-group">
									<select class="form-control" name="district_id">
										<option value="<?php echo $objResult["district_id"];?>"><?php echo $objResult["district_name"];?></option>
										 <?php while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){ ?>
										<option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<label>เบอร์โทรศัพท์</label>
								<div class="form-group">
									<input class="form-control" placeholder="เบอร์โทรศัพท์" type="text" name="phone" value="<?php echo $objResult["phone"];?>">
								</div>
							</div>
							<div class="col-md-6">
								<label>Facebook</label>
								<div class="form-group">
									<input class="form-control" placeholder="Facebook" type="text" name="facebook" value="<?php echo $objResult["facebook"];?>">
								</div>
							</div>
							
							
							<div class="col-md-6">
								<label>Line</label>
								<div class="form-group">
									<input class="form-control" placeholder="Line" type="text" name="line" value="<?php echo $objResult["line"];?>"> 
								</div>
							</div>
							<div class="col-md-6">
								<label>Email</label>
								<div class="form-group">
									<input class="form-control" placeholder="Email" type="email" name="email"
									value="<?php echo $objResult["email"];?>">
								</div>
							</div>
							<div class="col-md-6">
								<label>Brand</label>
								<div class="form-group">
									<input class="form-control" placeholder="Brand" type="text" name="brand"
									value="<?php echo $objResult["brand"];?>">
								</div>
							</div>
							<div class="col-md-6">
								<label>Farmmer Group</label>
								<div class="form-group">
									<input class="form-control" placeholder="Farmmer Group" type="text" name="farmer_group" value="<?php echo $objResult["farmer_group"];?>">
								</div>
							</div>
							<div class="col-md-6">
								<label>Youtube Link</label>
								<div class="form-group">
									<input class="form-control" placeholder="Youtube Link" type="text" name="link_youtube" value="<?php echo $objResult["link_youtube"];?>">
								</div>
							</div>
							<div class="col-md-4">
								<label>latitude</label>
								<div class="form-group">
									<input class="form-control" placeholder="" id="lati" type="text" name="latitude" readonly=""  value="<?php echo $objResult["latitude"];?>">
								</div>
							</div>
							<div class="col-md-4">
								<label>longitude</label>
								<div class="form-group">
									<input class="form-control" placeholder="" id="longi" type="text" name="longitude" readonly=""  value="<?php echo $objResult["longitude"];?>">
								</div>
							</div>
							<div class="col-md-4">
								<br>
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal2"><i class="fas fa-map-marked"></i>&nbsp;&nbsp;เพิ่มพิกัด</button>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<br>
									<select class="form-control" name="status" id="place">
										<?php while($row=mysqli_fetch_array($queryA,MYSQLI_ASSOC)){ ?>
											<option value="<?php echo $row["id"] ?>"><?php echo $row["market"] ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<button type="button" class="btn btn-danger" id="delete" data-toggle="modal" data-target="#forconfermdelete"><i class="fas fa-trash-alt"></i></i>&nbsp;&nbsp;ลบที่คุณเลิอก</button>
								</div>
	                        </div>
							<div class="col-md-6">
								<div class="form-group">
									<a href="register2.php"><button type="button" class="btn btn-success" >เพิ่มตลาดที่คุณขาย</button></a>
								</div>
							</div>
							<?php if($_SESSION["farmer_type"]=='2'){ ?>
							<div class="col-md-6">
								<div class="form-group">
									<a href="EditFarmerInfo.php"><button type="button" class="btn btn-success" >แก้ไขเกษตรกรผู้ที่ผลิตสินค้าอินทรีย์</button></a>
								</div>
							</div>
							<?php } ?>
						


        </div>
</div>


  			<div class="col-md-12">
              <div class="form-group">
                <br>
                <center>
                <input value="ยืนยันการแก้ไข" class="btn btn-primary" type="submit" name="submit">
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
   	<script type="text/javascript">
	function deleteMarket() {
		var place = document.getElementById("place");
        var placevalue = place.value;
       // var kk ="<?php echo $_SESSION["username"];?>";
       $.ajax({
            method: "POST",
            url: "delete-market-profile.php",
            cache: false,
            data: { placevalue:placevalue },
            success: function(data){
                        alert(data);
                        //the controller function count_votes returns an integer.
                        //echo that with the fade in here.
                }
            });
		
		location.reload();
    }
   	</script>

	</body>
</html>
