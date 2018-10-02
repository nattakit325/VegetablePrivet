
<?php
session_start();
include "connect.php";

$usermname = '';

	if(empty($_SESSION["username"])){

	}else{
		if($_SESSION["status"]=='admin'){
			header("location:admin.php");
		}else{
			$usermname = $_SESSION["username"];
		}
		
	}
$productId = filter_input(INPUT_GET, 'productId', FILTER_SANITIZE_STRING);
$sellername = filter_input(INPUT_GET, 'sellername', FILTER_SANITIZE_STRING);
$MarketId = filter_input(INPUT_GET, 'MarketId', FILTER_SANITIZE_NUMBER_INT);
$sql = "SELECT profile.name_surname as name_surname,profile.address as address,profile.subdictrict as subdictrict ,districts.district_name as  district_name,profile.phone as phone, profile.facebook as facebook ,profile.line as LineId , profile.email as EmailName , profile.brand as brand , profile.farmer_group as farmer_group , profile.link_youtube as linkYoutube ,profile.latitude as latitude , profile.longitude as  longitude, profile.picture as Profilepicture,product.id as productId ,product.name as ProductName, product.detail as ProductDetail, product.price as price ,product.picture as ProductPicture, market.id as marketId,market.market as market ,market.latitude as marketLatitude,market.longitude as marketLongitude,market.openDate as openDate,market.openingTime as openingTime,market.closingTime as closingTime FROM `product` INNER JOIN selllist ON product.id = selllist.productid INNER JOIN profile ON selllist.username = profile.username INNER JOIN login ON profile.username = login.username INNER JOIN gmarket ON login.username = gmarket.username INNER JOIN market ON gmarket.marketid = market.id INNER JOIN districts ON profile.district_id = districts.district_id WHERE profile.name_surname = 'Nattakit' and product.id = 68 AND market.id= 16";
$queryA = mysqli_query($objCon, $sql);
$objResult = mysqli_fetch_array($queryA, MYSQLI_ASSOC);



	$sqlForNotification = "SELECT COUNT(DISTINCT chat_user1) as chatAM from tbl_chat WHERE chat_user2='$usermname' and status = 1";
	$queryForNotification=mysqli_query($objCon,$sqlForNotification);
	$objResultNoti = mysqli_fetch_array($queryForNotification, MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Product Detail</title>
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


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDO9xE9smgXJIDFDpyPaDGZcjQu-ybwOKc&libraries=geometry"></script>
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
<style type="text/css">
div#messagesDiv{
    display: block;
    height: 280px;
    overflow: auto;
    background-color: #FDFDE0;
    width: 100%;
    margin: 5px 0px;
    border: 1px solid #CCC;
}
.left_box_chat{
    border: 1px solid #CCC;
    border-radius: 25px;
    margin: 5px;
    padding: 0px 10px;
    display:inline-block;
    float:left;
    clear:both;
    text-align:left;
    background-color:#FFF;  
}
.right_box_chat{
    border: 1px solid #CCC;
    border-radius: 25px;
    margin: 5px;
    padding: 0px 10px;
    display:inline-block;
    float:right;
    clear:both;
    text-align:right;
    background-color:#9F6;
}
</style>
<script type="text/javascript">
var p1 = 0;
let p2;
let p3;
let p4;
var place = [];
var locations = [];
function setMarket(){
	// place.push([<?php echo $objResult["marketLatitude"]; ?>,<?php echo $objResult["marketLongitude"]; ?>,
	// 	'<?php echo $objResult["market"]; ?>','<?php echo $objResult["openDate"]; ?>',
	// 	'<?php echo $objResult["openingTime"]; ?>','<?php echo $objResult["closingTime"]; ?>']);
	//getLaLongMarket();
}
function getLaLongMarket() {
	 for(var i=0;i<place.length;i++){
        place[i][6] = new google.maps.LatLng(place[i][0], place[i][1]);
	 }
	 getLocation();
}
function getLocation() {

    if (navigator.geolocation) {
        navigator.geolocation.watchPosition(CurrentPosition);
    } else {
	document.getElementById("demo").innerHTML = "Geolocation is not supported by this browser.";}
    }
function CurrentPosition(position) {
	p2 = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
	p3 = position.coords.latitude;
	p4 = position.coords.longitude;
	if(p1 == 0){
		showPosition();
	}
}
function showPosition(){
 	p1 = 1;
	for(var j=0;j<place.length;j++){
		place[j][7] = (google.maps.geometry.spherical.computeDistanceBetween(place[j][6], p2) / 1000).toFixed(2);
	 }
	 ShowMarker();
}
function ShowMarker(){
	for(k= 0;k<place.length;k++){
		locations.push(["ตลาด: "+ place[k][2]+"<br>ระยะทาง: "+place[k][7]+" กิโลเมตร"+, place[k][0], place[k][1], 0 ]);
	}
	//locations.push(['คุณอยู่ตรงนี้',p3,p4,2]);
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 14,
      center: new google.maps.LatLng(p3,p4),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();
    var marker, i;
		var icon = {
			url: "icon/market-512.png", // url
			scaledSize: new google.maps.Size(50, 50), // scaled size
			origin: new google.maps.Point(0,0), // origin
			anchor: new google.maps.Point(0, 0) // anchor
		};
		var marker2 = new google.maps.Marker({
    	position: p2,
    	map: map
  	});
    for (i = 0; i < place.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(place[i][0], place[i][1]),
        map: map,
				icon: icon
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
}
</script>

	

	</head>
	<body  onload="setMarket()">














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



  <div class="modal fade" id="myChat" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title"><?php echo $objResult["name"]; ?>  &nbsp;&nbsp;<?php echo $objResult["surname"]; ?></h4></center>
        </div>
        <div class="modal-body">
          <center>
          	<div id="messagesDiv">

</div>
<div class="bg-info" style="width:100%;padding:5px 0px;">
<div class="row">
  
  <div class="col-xs-12">
<!--  input hidden สำหรับ เก็บ chat_id ล่าสุดที่แสดง-->

<input name="userID1" type="hidden" id="userID1" value="<?php echo $_SESSION["username"]; ?>">

  <input name="userID2" type="hidden" id="userID2" value="<?php echo $objResult["Ownusername"]; ?>">
  <!--  input hidden สำหรับ เก็บ chat_id ล่าสุดที่แสดง-->
  <input name="h_maxID" type="hidden" id="h_maxID" value="0" >
  <input type="text" class="control-label col-sm-6"  name="msg" id="msg" placeholder="Message">
  <button type="button" class="btn btn-primary" id="send" name="send">
                            <span></span>
                            <i class="fas fa-arrow-circle-up"></i>&nbsp;&nbsp;ส่งข้อความ
                        </button>
  </div>

</div>
</div>


						
  <br>

  
        </center>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">ออก</button>
        </div>
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
							<?php if (empty($_SESSION["username"])) {
    ?>
							<a href="" data-toggle="modal" data-target="#myModal1">เข้าสู่ระบบ</a></li>
							<a href="" data-toggle="modal" data-target="#myModal1"><img class="circle" src="images/profile.png" width="10%" height="12%" /></a>
						<?php } else {
							if ($objResultNoti['chatAM']>0) {
								$color = 'red';
							}else{
								$color = 'gray';

							}
							?>
							<a href="TopChat.php" title="คุณมี <?php echo $objResultNoti['chatAM'] ?> ข้อความ"><i class="fas fa-bell" style="color: <?php echo $color ?>">&nbsp;<?php echo $objResultNoti['chatAM'] ?></i></a>
							<a data-toggle="modal" data-target="#login"><img class="circle" src="images/<?php echo $_SESSION["picture"]?>" width="10%" height="12%" /></a>
						<?php }?>

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
								<img class="img-responsive" src="uploads_product/<?php echo $objResult["ProductPicture"]; ?>" alt="About" height="100%" width="100%">

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
										<h4><?php echo $objResult["ProductDetail"]; ?></h4>
									</li>

								</ul>
							</div>

							<div class="col-md-12 side">
								<h3><img class="picture" src="images/<?php echo $objResult["Profilepicture"]; ?>" width="10%" height="12%" />&nbsp;&nbsp;ผู้จำหน่าย</h3>
								<ul>
									<li>
										<h4><li><?php echo $objResult["name_surname"]; ?></li></h4>

									</li>

								</ul>
							</div>
							<div class="col-md-12 side">
								<h3><i class="fas fa-address-card"></i>&nbsp;&nbsp;ช่องทางการติดต่อ</h3>
								<ul>
									<li>
									<h4>
									<li><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;&nbsp;ที่อยู่<br><a href="#">&nbsp;&nbsp;&nbsp;<?php echo $objResult["address"]; ?> ต.<?php echo $objResult["subdictrict"]; ?> อ.<?php echo $objResult["district_name"]; ?></a></li>
									<br>
									<li></i>&nbsp;&nbsp;&nbsp;Youtube<br><a href="<?php echo $objResult["linkYoutube"]; ?>">&nbsp;&nbsp;&nbsp;<?php echo $objResult["linkYoutube"]; ?></a></li>
									<br>
									<li></i>&nbsp;&nbsp;&nbsp;Brand<br><a href="#">&nbsp;&nbsp;&nbsp;<?php echo $objResult["brand"]; ?></a></li>
									<br>
									<li></i>&nbsp;&nbsp;&nbsp;กลุ่ม<br><a href="#">&nbsp;&nbsp;&nbsp;<?php echo $objResult["farmer_group"]; ?></a></li>
									<br>
									<li><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;&nbsp;สถานที่ขาย<br><a href="#">&nbsp;&nbsp;&nbsp;<?php echo $objResult["market"]; ?></a></li>
									<br>
									<li><i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;&nbsp;วันที่เปิด<br><a href="#">&nbsp;&nbsp;&nbsp;<?php echo $objResult["openDate"]; ?></a></li>
									<br>
									<li><i class="far fa-clock"></i></i>&nbsp;&nbsp;&nbsp;เวลาเปิด<br><a href="#">&nbsp;&nbsp;&nbsp;<?php echo $objResult["openingTime"]; ?></a></li>
									<br>
									<li><i class="fas fa-clock"></i></i>&nbsp;&nbsp;&nbsp;เวลาปิด<br><a href="#">&nbsp;&nbsp;&nbsp;<?php echo $objResult["closingTime"]; ?></a></li>
									<br>
									<li><i class="fas fa-map-pin"></i>&nbsp;&nbsp;&nbsp;ระยะทาง<br><a href="#">&nbsp; <p id="distance"></p></a></li>
									<br>
									<li><i class="fas fa-phone"></i>&nbsp;&nbsp;Email<br><a href="#">&nbsp;&nbsp;&nbsp;<?php echo $objResult["EmailName"]; ?></a></li>
									<br>
									<li><i class="fas fa-phone"></i>&nbsp;&nbsp;เบอร์โทรศัพท์<br><a href="#">&nbsp;&nbsp;&nbsp;<?php echo $objResult["phone"]; ?></a></li>
									<br>
									<li><i class="icon-facebook"></i>&nbsp;&nbsp;&nbsp;Facebook<br><a href="#">&nbsp;&nbsp;&nbsp;<?php echo $objResult["facebook"]; ?></a></li>
									<br>
									<li><i class="fab fa-line"></i>&nbsp;&nbsp;&nbsp;Line ID<br><a href="http://line.me/ti/p/~<?php echo $objResult["line"]; ?>" target="_blank">&nbsp;&nbsp;&nbsp;<?php echo $objResult["LineId"]; ?></a></li>

						</a>

									</li>
									</h4>

								</ul>
								<br><br><br>
								<center><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fas fa-map-marked"></i>&nbsp;&nbsp;ดูสถานที่ขายสินค้า</button>
									<?php if(empty($_SESSION['username'])){ ?>
									
									<?php }else{ ?>
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myChat"><i class="fas fa-comments"></i></i>&nbsp;&nbsp;พูดคุยกับผู้ขาย</button>
										<?php } ?>
								</center>
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





<!--------chat -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>      
<script type="text/javascript">
var load_chat; // กำหนดตัวแปร สำหรับเป็นฟังก์ชั่นเรียกข้อมูลมาแสดง
var first_load=1; // กำหนดตัวแปรสำหรับโหลดข้อมูลครั้งแรกให้เท่ากับ 1
load_chat = function(userID){
	var maxID = $("#h_maxID").val(); // chat_id ล่าสุดที่แสดง
	$.post("ajax_chat.php",{
		viewData:first_load,
		userID:userID,
		maxID:maxID
	},function(data){
		if(first_load==1){ // ถ้าเป็นการโหลดครั้งแรก ให้ดึงข้อมูลทั้งหมดที่เคยบันทึกมาแสดง
			for(var k=0;k<data.length;k++){ // วนลูปแสดงข้อความ chat ที่เคยบันทึกไว้ทั้งหมด
				if(parseInt(data[0].max_id)>parseInt(maxID)){ // เทียบว่าข้อมูล chat_id .ใหม่กว่าที่แสดงหรือไม่
					$("#h_maxID").val(data[k].max_id); // เก็บ chat_id เป็น ค่าล่าสุด
					// แสดงข้อความการ chat มีการประยุกต์ใช้ ตำแหน่งข้อความ เพื่อจัด css class ของข้อความที่แสดง
					$("#messagesDiv").append("<div class=\""+data[k].data_align+"_box_chat\">"+data[k].data_msg+"</div>"); 
					$("#messagesDiv")[0].scrollTop = $("#messagesDiv")[0].scrollHeight; // เลือน scroll ไปข้อความล่าสุด  	
				}
			};
		}else{ // ถ้าเป็นข้อมูลที่เพิ่งส่งไปล่าสุด
			if(parseInt(data[0].max_id)>parseInt(maxID)){ // เทียบว่าข้อมูล chat_id .ใหม่กว่าที่แสดงหรือไม่
				$("#h_maxID").val(data[0].max_id); // เก็บ chat_id เป็น ค่าล่าสุด
				// แสดงข้อความการ chat มีการประยุกต์ใช้ ตำแหน่งข้อความ เพื่อจัด css class ของข้อความที่แสดง
				$("#messagesDiv").append("<div class=\""+data[0].data_align+"_box_chat\">"+data[0].data_msg+"</div>"); 
				$("#messagesDiv")[0].scrollTop = $("#messagesDiv")[0].scrollHeight;   // เลือน scroll ไปข้อความล่าสุด
			}
		}
		first_load++;// บวกค่า first_load
	});		
}
// กำหนดให้ทำงานทกๆ 2.5 วินาทีเพิ่มแสดงข้อมูลคู่สนทนา
setInterval(function(){
	var userID = $("#userID2").val(); // id user ของผู้รับ
	load_chat(userID); // เรียกใช้งานฟังก์ช่นแสดงข้อความล่าสุด
},2500);	
$(function(){
	

 /// เมื่อพิมพ์ข้อความ แล้วกดส่ง
  $("#msg").keypress(function (e) { // เมื่อกดที่ ช่องข้อความ  
	if (e.keyCode == 13) { // ถ้ากดปุ่ม enter  
	  var user1 = $("#userID1").val(); // เก็บ id user  ผู้ใช้ที่ส่ง
	  var user2 = $("#userID2").val(); // เก็บ id user  ผู้ใช้ที่รับ
	  var msg = $("#msg").val();  // เก็บค่าข้อความ  
	  $.post("ajax_chat.php",{
		  user1:user1,
		  user2:user2,
		  msg:msg
	  },function(data){
		  	load_chat(user2);// เรียกใช้งานฟังก์ช่นแสดงข้อความล่าสุด
	  		$("#msg").val(""); // ล้างค่าช่องข้อความ ให้พร้อมป้อนข้อความใหม่  		  
	  });

	}  
  });
   $( "#send" ).click(function(e) {
   	
   		 var user1 = $("#userID1").val(); // เก็บ id user  ผู้ใช้ที่ส่ง
	  var user2 = $("#userID2").val(); // เก็บ id user  ผู้ใช้ที่รับ
	  var msg = $("#msg").val();  // เก็บค่าข้อความ  
	  $.post("ajax_chat.php",{
		  user1:user1,
		  user2:user2,
		  msg:msg
	  },function(data){
		  	load_chat(user2);// เรียกใช้งานฟังก์ช่นแสดงข้อความล่าสุด
	  		$("#msg").val(""); // ล้างค่าช่องข้อความ ให้พร้อมป้อนข้อความใหม่  		  
	  });

   	  
  
});  
  
});

</script>
