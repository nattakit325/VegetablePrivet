
<?php 
session_start();
include "connect.php";

$sql="SELECT * FROM `districts`";
$queryA=mysqli_query($objCon,$sql);
$queryE=mysqli_query($objCon,$sql);
$district_id = filter_input(INPUT_POST, 'district_id', FILTER_SANITIZE_STRING);
$farmerType = filter_input(INPUT_POST, 'farmerType', FILTER_SANITIZE_STRING);
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
$queryB=mysqli_query($objCon,$sql);
	if($district_id != null){
		$sql="SELECT * FROM `districts` WHERE district_id = $district_id";
		$querydistrict = mysqli_query($objCon,$sql);
		$objResultdistrict = mysqli_fetch_array($querydistrict, MYSQLI_ASSOC);

		$sql = "SELECT * FROM `farmer_type` WHERE farmer_type_id = $farmerType";
		$queryFarmerType = mysqli_query($objCon,$sql);
		$objResultFarmer = mysqli_fetch_array($queryFarmerType, MYSQLI_ASSOC);

		$sql="SELECT * FROM `profile` INNER JOIN districts ON profile.district_id = districts.district_id  WHERE  districts.district_id = $district_id AND farmer_type_id = $farmerType";
		$queryProfile = mysqli_query($objCon,$sql);
	}else{
		$queryProfile = '';
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
	<title>Search Farmer</title>
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

	<script type="text/javascript" src="js/showUser.js"></script>
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
  <a href="register.php">ยังไม่ได้สมัครบัญชีในระบบ</a>
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

  <a href="editProfile.php"><button type="button" class="btn btn-success" >แก้ไขข้อมมูลส่วนตัว</button></a>
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
				<h1><i class="sl-icon-energy"></i><a href="index.php">OrganicApp</a></h1>
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
					<h2>ค้นหาเกษตรกร</h2>
					<p><span>Search Farmer</a></span></p>

					<div class="form-group col-md-12">
                    <form action="search-farmer.php" method="POST"  class="form-inline" name="searchform" id="searchform">
                        <div class="form-group col-md-4">
                            <label for="textsearch" >เลือกอำเภอ</label>
                            <select class="form-control" name="district_id" id="district_id">
                            	<?php while ($row = mysqli_fetch_array($queryA, MYSQLI_ASSOC)) {?>
									<option value="<?php echo $row["district_id"] ?>"><?php echo $row["district_name"] ?></option>
								<?php }?>
                            </select>
                            
                            
                            
                        </div>
                        <div class="form-group col-md-4">
                            <label for="textsearch" >เลือกประเภท</label>
                            <select class="form-control" name="farmerType">
                            	<option value="1">เกษตรกรต้นแบบ</option>
                            	<option value="2">เกษตรกรผู้ผลิตอินทรีย์</option>
                            </select>    
                        </div>
                        <div class="form-group  col-md-2">
                        <button type="subm" class="btn btn-primary" id="btnSearch">
                            <span class="glyphicon glyphicon-search"></span>
                            ค้นหา
                        </button>
                    	</div>
                    	</form>
						<br>

					</div>
					<?php if(empty($_SESSION["farmer_type"])){ 
					}else{
						if($_SESSION["farmer_type"]=='1'||$_SESSION["farmer_type"]=='3'){?>

					<div class="row col-md-12" align="left">
						<a href="registerFarmer.php">สมัครเกษตรกร</a>
					</div>

					<?php }} ?>
						<?php if($district_id != null){ ?>
							<div class="form-group col-md-12 row">
								<p>อำเภอที่คุณเลือก: <?php echo $objResultdistrict['district_name']  ?></p>
							</div>
							<div class="form-group col-md-12 row">
								<p>ประเภทที่คุณเลือก: <?php echo $objResultFarmer['farmer_type_name']  ?></p>
							</div>
							<div class="form-group  col-md-6 col-md-offset-3 row center">
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal2"><i class="fas fa-map-marked"></i>&nbsp;&nbsp;ดูแผนที่</button>
							</div>
						<?php } ?>
						
						
					
					
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
var districts = [];
var latitudeDis = 0;
var longitudeDis = 0;
var src = null;
function setMarket(){
	<?php 
	  if($queryB != null){
	?>
	<?php while ($row = mysqli_fetch_array($queryProfile, MYSQLI_ASSOC)) {?>
		place.push(["<?php echo $row["name_surname"];?>","<?php echo $row["address"];?>",
			"<?php echo $row["subdictrict"];?>","<?php echo $row["district_name"];?>",
			"<?php echo $row["phone"];?>","<?php echo $row["facebook"];?>",
			"<?php echo $row["line"];?>","<?php echo $row["email"];?>",
			"<?php echo $row["username"];?>","<?php echo $row["sellproduct"];?>",
			"<?php echo $row["link_youtube"];?>",<?php echo $row["latitude"];?>,
			<?php echo $row["longitude"];?>]);
	 <?php }?>
	 getLaLongMarket();
	 <?php 
		}
	 ?>
	
}
function getLaLongMarket() {
	 for(var i=0;i<place.length;i++){
        place[i][13] = new google.maps.LatLng(place[i][11], place[i][12]);
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
		place[j][14] = (google.maps.geometry.spherical.computeDistanceBetween(place[j][13], p2) / 1000).toFixed(2);
	 }
	 ShowMarker();
}
function ShowMarker(){
	for(k= 0;k<place.length;k++){
		locations.push(["ชื่อเกษตรกร: "+ place[k][0]+"<br>ระยะทาง: "+place[k][14]+" กิโลเมตร"+"<br>ที่อยู่: "+place[k][1]+place[k][2]+place[k][3]+"<br>Link: <a href="+place[k][10]+">"+place[k][10]+"</a><br> เบอร์โทรศัพท์: "+place[k][4]+"<br> facebook:"+place[k][5]+"<br> Line:"+place[k][6]+"<br> สถานที่ขาย: "+place[k][9]+
			"<br><a href='ShowfarmerDetail.php?id="+place[k][8]+"'>เพิ่มเติม</a>", place[k][11], place[k][12], 0 ]);
	}
	setLocation();
	
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 16,
      center: new google.maps.LatLng(latitudeDis,longitudeDis),
      
      panControl: true,
        mapTypeControl: false,
        panControlOptions: {
            position: google.maps.ControlPosition.RIGHT_CENTER
        },
        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.LARGE,
            position: google.maps.ControlPosition.RIGHT_CENTER
        },
        scaleControl: false,
        streetViewControl: false,
        streetViewControlOptions: {
            position: google.maps.ControlPosition.RIGHT_CENTER
        }
    });
    var infowindow = new google.maps.InfoWindow();
    var myParser = new geoXML3.parser({map: map, zoom: false});
    myParser.parse(src);
    var marker, i;
		var icon = {
			url: "icon/human.png", // url
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
        position: new google.maps.LatLng(place[i][11], place[i][12]),
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
function setLocation(){
	<?php while ($row = mysqli_fetch_array($queryE, MYSQLI_ASSOC)) {?>
		districts.push(["<?php echo $row["district_name"] ?>"]);
	<?php }?>
	var districtName = "<?php echo $objResultdistrict['district_name']  ?>";

	districts[0][3] = '/kmlFile/MueangChiangMai.kml';
	districts[0][1] = 18.784101;
	districts[0][2]	= 98.984107;
	districts[1][3] = '/kmlFile/Saraphi.kml';
	districts[1][1] = 18.709776;
	districts[1][2] = 99.042566;
	districts[2][3] = '/kmlFile/HangDong.kml';
	districts[2][1] = 18.732064;
	districts[2][2] = 98.864661;
	districts[3][3] = '/kmlFile/Hot.kml';
	districts[3][1] = 18.119511;
	districts[3][2] = 98.462303;
	districts[4][3] = '';
	districts[4][1] = 19.01293;
	districts[4][2] = 98.298501;
	districts[5][3] = '/kmlFile/MaeChaem.kml';
	districts[5][1] = 18.573046;
	districts[5][2] = 98.330605;
	districts[6][3] = '/kmlFile/ChiangDao.kml';
	districts[6][1] = 19.518482;
	districts[6][2] = 98.952494;
	districts[7][3] = '/kmlFile/SanSai.kml';
	districts[7][1] = 18.953236;
	districts[7][2] = 99.030692;
	districts[8][3] = '/kmlFile/SanKamphaeng.kml';
	districts[8][1] = 18.741143;
	districts[8][2] = 99.148409;
	districts[9][3] = '/kmlFile/ChomThong.kml';
	districts[9][1] = 18.386825;
	districts[9][2] = 98.587514;
	districts[10][3] = '/kmlFile/DoiSaket.kml';
	districts[10][1] = 18.918385;
	districts[10][2] = 99.204238;
	districts[11][3] = '/kmlFile/WiangHaeng2.kml';
	districts[11][1] = 19.600083;
	districts[11][2] = 98.65759;
	districts[12][3] = '/kmlFile/MaeWang.kml';
	districts[12][1] = 18.669981;
	districts[12][2] = 98.651447;
	districts[13][3] = '/kmlFile/Samoeng.kml';
	districts[13][1] = 18.902797;
	districts[13][2] = 98.638519;
	districts[14][3] = '/kmlFile/Fang.kml';
	districts[14][1] = 19.894004;
	districts[14][2] = 99.145998;
	districts[15][3] = '/kmlFile/MaeRim.kml';
	districts[15][1] = 18.938431;
	districts[15][2] = 98.885433;
	districts[16][3] = '/kmlFile/MaeOn.kml';
	districts[16][1] = 18.735851;
	districts[16][2] = 99.301081;
	districts[17][3] = '/kmlFile/SanPaTong.kml';
	districts[17][1] = 18.603465;
	districts[17][2] = 98.87956;
	districts[18][3] = '/kmlFile/MaeTaeng.kml';
	districts[18][1] = 19.181916;
	districts[18][2] = 98.827772;
	districts[19][3] = '/kmlFile/MaeAi.kml';
	districts[19][1] = 20.001828;
	districts[19][2] = 99.346431;
	districts[20][3] = '/kmlFile/Phrao.kml';
	districts[20][1] = 19.286554;
	districts[20][2] = 99.222962;
	districts[21][3] = '/kmlFile/Omkoi.kml';
	districts[21][1] = 17.777383;
	districts[21][2] = 98.305231;
	districts[22][3] = '/kmlFile/DoiTao.kml';
	districts[22][1] = 17.910388;
	districts[22][2] = 98.689073;
	districts[23][3] = '/kmlFile/ChaiPrakan.kml';
	districts[23][1] = 19.682347;
	districts[23][2] = 99.16342;
	districts[24][3] = '/kmlFile/DoiLo.kml';
	districts[24][1] = 18.523956;
	districts[24][2] = 98.759286;
	for(var i=0;i<=districts.length;i++){
		if(districts[i][0]==districtName){
			latitudeDis = districts[i][1];
			longitudeDis = districts[i][2];
			src = districts[i][3];
			break;
		}
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
	
	<script src="geoxml3-master/kmz/geoxml3.js"></script>
	</body>
</html>

