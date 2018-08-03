<?php

	include "connect.php";

	$sql="SELECT * FROM market WHERE type = 1 ";
	$query=mysqli_query($objCon,$sql);
	$username = $_GET['user'];

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


	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2G4KpiHxEwq-geWsql29f4CL7ks4rPP0&callback=setupMap">
	</script>
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    //$("p").append("<br>"+place1.value+" X ");
	$("#place option:selected").remove();
    });

});
function myFunction() {
    var x = document.getElementById("show");
	var place = document.getElementById("place");
    var option = document.createElement("option");
    option.text = x.value;
    place.add(option);
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
	console.log(x.value);
	console.log(marketarr);
	x.remove(x.selectedIndex);
	
}
var la = [];
var long = [];
var loname = [];
function saveLatLng() {

var lat = $("#lat").val();
var lng = $("#lng").val();
var location_name = $("#location_name").val();
la.push(lat);
long.push(lng);
loname.push(location_name);
var show = document.getElementById("show");
    var option = document.createElement("option");
    option.text = location_name;
	show.add(option);
	console.log(la);
	console.log(long);
	console.log(loname);
}
function saveMarket() {
	var user = "<?php echo $username; ?>";

$.ajax({
	method: "POST",
	url: "save-market.php",
	dataType:"json",
	data: { marketarr: marketarr, la: la, long: long, loname:loname ,  user:user },
	success: function(data){
				window.location.replace('success.php');
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

var marker = new google.maps.Marker({
	map: map,
	position: new google.maps.LatLng(15.000682, 103.728207),
	draggable: true
});

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
	html += 'lat : <input type="text" id="lat" value="' + event.latLng.lat() + '" /><br/>';
	html += 'lng : <input type="text" id="lng" value="' + event.latLng.lng() + '" /><br/>';
	html += 'location name : <input type="text" id="location_name" value="" /><br/>';
	html += '<input type="button" value="Save" onclick="saveLatLng()" />';

	infowindow.open(map, marker);
	infowindow.setContent(html);
	infowindow.setPosition(event.latLng);
	marker.setPosition(event.latLng);

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
	
	<div class="modal fade" id="myModal" role="dialog">
      <div class="modal-content">
        
        <div class="modal-body">
			<body onload="setupMap()">

				<div id="map_canvas" style="width:800px;height:450px;"></div>

			</body>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">เพิ่ม</button>
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
	<div class="row">
        <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
          <h2>กำหนดสถานที่ขายสินค้าของคุณ</h2>
          <p><span>Set location where your products sold</span></p>
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
					<select class="form-control" name="status" id="place">
						<option selected>เลือกตลาด</option>
						<?php while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){ ?>
						<option value="<?php echo $row["market"] ?>"><?php echo $row["market"] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
            <div class="col-md-6">
				<div class="form-group">
					<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">เพิ่มสถานที่ของคุณ</button>
				</div>
			</div>
        </div>
    </div>
</div>
	
	
  			<div class="col-md-12">
              <div class="form-group">
                <br>
                <center>
                <input value="ยืนยันการสมัครสมาชิก" class="btn btn-primary" type="button" onclick="saveMarket()">
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

