
<?php 
session_start();
include "connect.php";


	if(empty($_SESSION["username"])){

	}else{
		if($_SESSION["status"]=='admin'){
			header("location:admin.php");
		}else{
            $usermname = $_SESSION["username"];
            $sqlForNotification = "SELECT COUNT(DISTINCT chat_user1) as chatAM from tbl_chat WHERE chat_user2='$usermname' and status = 1";
            $queryForNotification=mysqli_query($objCon,$sqlForNotification);
        $objResult2 = mysqli_fetch_array($queryForNotification, MYSQLI_ASSOC);
		}
		
	}
$sql="SELECT * FROM `famers`";
$queryB=mysqli_query($objCon,$sql);

?>

<!DOCTYPE html>



<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Search Consignee</title>
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

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	
	</head>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDO9xE9smgXJIDFDpyPaDGZcjQu-ybwOKc&libraries=geometry"></script>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

function Delete(id,name) {
    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("DeleteDialog").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "DeleteOneProduct.php?id="+id+"&name="+name, true);
        xmlhttp.send();
    
}


function showHint(str,username) {
    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("search_result").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "getproduct.php?q="+str+"&username="+username, true);
        xmlhttp.send();
    
}

</script>

	<body onload="setMarket()"> 



		<style>
.circle{ /* ชื่อคลาสต้องตรงกับ <img class="circle"... */
    height: 50px;  /* ความสูงปรับให้เป็นออโต้ */
    width: 50px;  /* ความสูงปรับให้เป็นออโต้ */
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


<div class="modal fade" id="forconfermdeleteeach" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
<div id="DeleteDialog">
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
						<?php }else{
							if ($objResult2['chatAM']>0) {
								$color = 'red';
							}else{
								$color = 'gray';

							}
							?>
							<a href="TopChat.php" title="คุณมี <?php echo $objResult2['chatAM'] ?> ข้อความ"><i class="fas fa-bell" style="color: <?php echo $color ?>">&nbsp;<?php echo $objResult2['chatAM'] ?></i></a>
							<a data-toggle="modal" data-target="#login"><img class="circle" src="images/<?php echo $_SESSION["picture"]?>" width="10%" height="12%" /></a>
							
						<?php } ?>
						
					</ul>
				</nav>
			</div>
		</div>
	</header>
	

	<div id="fh5co-main-services-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>ค้นหาผู้รับสินค้าทางการเกษตร</h2>
					<p><span>Search Consignee</a></span></p>

					<div class="form-group  col-md-6 col-md-offset-3 row center">
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fas fa-map-marked"></i>&nbsp;&nbsp;ดูแผนที่</button>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
var p1 = 0;
let p2;
let p3;
let p4;
var place = [];
var locations = [];
function setMarket(){
	<?php while ($row = mysqli_fetch_array($queryB, MYSQLI_ASSOC)) {?>
			place.push(["<?php echo $row["famer_name"]; ?>","<?php echo $row["famer_lati"]; ?>",
			"<?php echo $row["famer_longti"]; ?>","<?php echo $row["famer_address"]; ?>",
			"<?php echo $row["famer_plant"]; ?>","<?php echo $row["famer_brand"]; ?>"]);
	 <?php }?>
	getLaLongMarket();
}
function getLaLongMarket() {
	 for(var i=0;i<place.length;i++){
        place[i][6] = new google.maps.LatLng(place[i][1], place[i][2]);
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
		locations.push([ place[k][0]+"<br>ระยะทาง "+place[k][7]+" กิโลเมตร"+"<br> "+place[k][3]+"<br>Link: "
			+place[k][4]+"<br> เบอร์โทรศัพท์ "+place[k][5], place[k][1], place[k][2], 0 ]);
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
        position: new google.maps.LatLng(place[i][1], place[i][2]),
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

	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- MAIN JS -->
	<script src="js/main.js"></script>
	
	</body>
</html>

