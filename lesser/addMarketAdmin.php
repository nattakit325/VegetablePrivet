<?php
    session_start();
	include "connect.php";

	

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>เพิ่มสถานที่</title>
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


	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDO9xE9smgXJIDFDpyPaDGZcjQu-ybwOKc&callback=setupMap">
	</script>
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
<script>
	var marketarr = [];
$(document).ready(function(){
    $("#place").change(function(){
	var place1 = document.getElementById("place");
    var show = document.getElementById("show");
    var option = document.createElement("option");
	option.text = place1.value;
	show.add(option);
	marketarr.push(place1.value);
	console.log(marketarr);
	$("#place option:selected").remove();
    });

});
function myFunction() {
    var x = document.getElementById("show");
	var place = document.getElementById("place");
    var option = document.createElement("option");
    
	Array.prototype.remove = function() {
    var what, a = arguments, L = a.length, ax;
    while (L && this.length) {
        what = a[--L];
        while ((ax = this.indexOf(what)) !== -1) {
            this.splice(ax, 1);
        }
    }
    return this;
	};
	marketarr.remove(x.value);
	for(var i =0;i<loname.length;i++){
		if(x.value == loname[i]){
			loname.remove(x.value);
			la.splice(i,1);
			long.splice(i,1);
			openDate.splice(i,1);
			openTime.splice(i,1);
			closeTime.splice(i,1);
		}
	}
	
	console.log(x.value);
	console.log(marketarr);
	x.remove(x.selectedIndex);
	
}
var la = [];
var long = [];
var loname = [];
var openDate = [];
var openTime = [];
var closeTime = [];
function saveLatLng() {

	var lat = $("#lat").val();
	var lng = $("#lng").val();
	var location_name = $("#location_name").val();
	var openDate1 = $("#openDate").val();
	var openTime1 = $("#openTime").val();
	var closeTime1 = $("#closeTime").val();
	if(location_name != null && openDate1 != '' && openTime1 != '' && closeTime1 != '' ){
		la.push(lat);
		long.push(lng);
		loname.push(location_name);
		openDate.push(openDate1);
		openTime.push(openTime1);
		closeTime.push(closeTime1);
		var show = document.getElementById("show");
    	var option = document.createElement("option");
    	option.text = location_name;
		show.add(option);
		
		$('#market1').modal('hide');
	}else{
		alert('กรุณากรอกให้ครบ');
	}
	
}
function saveMarket() {
$.ajax({
	method: "POST",
	url: "save-market.php",
	dataType:"json",
	cache: false,
	data: { marketarr: marketarr, la: la, long: long, loname:loname , openDate:openDate , openTime:openTime , closeTime:closeTime},
	success: function(data){
				alert(data);
                //the controller function count_votes returns an integer.
                //echo that with the fade in here.
                }
	});

}

function setupMap() {
var myOptions = {
	zoom: 13,
	center: new google.maps.LatLng(16.024695711685314, 103.13690185546875),
	mapTypeId: google.maps.MapTypeId.ROADMAP
};
var map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);


var infowindow = new google.maps.InfoWindow;
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
	html += 'ชื่อสถานที่ : <input type="text" id="location_name" value="" /><br/>';
	html += 'วันที่เปิดทำการ : <input type="text" id="openDate" value="" placeholder="Ex. ทุกวัน" /><br/>';
	html += 'เวลาที่เปิด : <input type="text" id="openTime" value="" placeholder="Ex. 07.00" /><br/>';
	html += 'เวลาที่ปิด : <input type="text" id="closeTime" value="" placeholder="Ex. 15.00" /><br/>';
	html += '<input type="button" value="Save" onclick="saveLatLng()" />';

	infowindow.open(map);
	infowindow.setContent(html);
	infowindow.setPosition(event.latLng);
	//marker.setPosition(event.latLng);

});


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
	<div class="modal fade" id="market1" role="dialog">
      <div class="modal-content">
        
        <div class="modal-body">
			<body onload="setupMap()">

				<div id="map_canvas" style="width:800px;height:450px;"></div>

			</body>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">ออก</button>
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
							<a href="" data-toggle="modal" data-target="#login"><?php echo $_SESSION["name_surname"];?></a></li>
							<a href="" data-toggle="modal" data-target="#login"><img class="circle" src="images/<?php echo $_SESSION["picture"]?>" width="10%" height="12%" /></a>
						<?php } ?>
						
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<br>
	<br>
<div id="fh5co-contact-section">
	<div class="row">
        <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
          <h2>เพิ่มสถานที่</h2>
                        <div class="col-md-6">
							<div class="form-group">
								<select class="form-control" name="status"  id="show" size="0">
									
								</select>
							</div>
                        </div>
                        <div class="col-md-6">
							<div class="form-group">
								<button type="button" class="btn btn-info" data-toggle="modal" onclick="myFunction()">ลบที่คุณเลือก</button>
							</div>
                        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
            <div class="col-md-6">
				<div class="form-group">
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#market1">เพิ่มตลาดอื่นๆ</button>
				</div>
			</div>
        </div>
    </div>
</div>
	
	
  			<div class="col-md-12">
              <div class="form-group">
                <br>
                <center>
               <a href="/suscess.php"><input value="ยืนยัน" class="btn btn-primary" type="button" onclick="saveMarket()"></a>
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

