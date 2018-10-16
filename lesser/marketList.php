<?php
session_start();
include "connect.php";

$type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_NUMBER_INT);
$sql = "SELECT * FROM `market` WHERE market_type_id = $type";
$query = mysqli_query($objCon, $sql);
$queryC = mysqli_query($objCon, $sql);
$usermname = '';

	if(empty($_SESSION["username"])){

	}else{
		if($_SESSION["status"]=='admin'){
			header("location:admin.php");
		}else{
			$usermname = $_SESSION["username"];
		}
		
	}
	$sqlForNotification = "SELECT COUNT(DISTINCT chat_user1) as chatAM from tbl_chat WHERE chat_user2='$usermname' and status = 1";
	$queryForNotification=mysqli_query($objCon,$sqlForNotification);
	$objResult = mysqli_fetch_array($queryForNotification, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Buy</title>
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



	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body onload="setMarket()">

<script type="text/javascript" src="js/showUser.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- data table -->
	 <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" />
	  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" />
	  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css" type="text/css" />
	  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.bootstrap.min.css" type="text/css" />
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
	<!-- data table -->
		<style>
.circle{ /* ชื่อคลาสต้องตรงกับ <img class="circle"... */
    height: 50px;  /* ความสูงปรับให้เป็นออโต้ */
    width: 50px;  /* ความสูงปรับให้เป็นออโต้ */
    border: 3px solid #fff; /* เส้นขอบขนาด 3px solid: เส้น #fff:โค้ดสีขาว */
    border-radius: 50%; /* ปรับเป็น 50% คือความโค้งของเส้นขอบ*/
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); /* เงาของรูป */
}
.picture{ /* ชื่อคลาสต้องตรงกับ <img class="circle"... */
    height: 90px;  /* ความสูงปรับให้เป็นออโต้ */
    width: 90px;  /* ความสูงปรับให้เป็นออโต้ */
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
<script>

function showHint(str,type) {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("search_result").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "gethint.php?q="+str+"&type="+type, true);
        xmlhttp.send();

}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDO9xE9smgXJIDFDpyPaDGZcjQu-ybwOKc&libraries=geometry">
	</script>
<script>
var p1 = 0;
let p2;
var market = [];
var marketList = [];
var toDay = ["อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์"];
function setMarket(){
	 <?php while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {?>
		marketList.push([<?php echo $row["latitude"]; ?>,<?php echo $row["longitude"]; ?>,
			"<?php echo $row["market"]; ?>","<?php echo $row["pictureMarket"]; ?>",
			"<?php echo $row["openDate"]; ?>","<?php echo $row["openingTime"]; ?>",
			"<?php echo $row["closingTime"]; ?>",<?php echo $row["id"]; ?>,
			"<?php echo $row["market_address"]; ?>","<?php echo $row["market_tel"]; ?>",
			"<?php echo $row["market_Categoryfactor"]; ?>"]);
	 <?php }?>
	
	var d1 = new Date();
	var total = 0;
	if(<?php echo $type; ?>==1){
		for(var i=0;i<marketList.length;i++){
			var openDateT = marketList[i][4].split(",");
			for(var j=0;j<openDateT.length;j++){
				if(openDateT[j]==toDay[d1.getDay()]||openDateT[j]=="ทุกวัน"){
					market.push(marketList[i]);
				}
			}
		}
	}else{
		for(var j=0;j<marketList.length;j++){			
				market.push(marketList[j]);
			}
	}
	getLaLongMarket();
}
function getLaLongMarket() {
	 for(var i=0;i<market.length;i++){
		 market[i][11] = new google.maps.LatLng(market[i][0], market[i][1]);
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
	if(p1 == 0){
		showPosition();
	}
}
 function showPosition(){
 	p1 = 1;
	for(var j=0;j<market.length;j++){
		 market[j][12] = (google.maps.geometry.spherical.computeDistanceBetween(market[j][11], p2) / 1000).toFixed(2);
	 }
	 market.sort(function(a,b){
    	return a[12] - b[12];
	});
	//alert(market.length);
	if(<?php echo $type; ?>==1){
		showOnWeb()
	}else if(<?php echo $type; ?>==2){
		setOnWebFactor();

	}
}
	function showOnWeb(){
		
		for(var i=0;i<market.length;i++){
		var showV  = document.getElementById('showV');
		var div1 = document.createElement("div");
		div1.classList.add("col-md-4","text-center");
		var div2 = document.createElement("div");
		div2.classList.add("work-inner");
		var a1 = document.createElement("a");
		if(<?php echo $type; ?>==1){
			
			a1.href = "buy.php?&MarketId="+market[i][7];
			a1.classList.add("work-grid");
			a1.style.cssText = "background-image: url(uploads_product/"+market[i][3];
		}else{
			a1.href = "buy-farmer.php?&MarketId="+market[i][7];
			a1.classList.add("work-grid");
			a1.style.cssText = "background-image: url(uploads_product/"+market[i][3];
		}
		var div3 = document.createElement("div");
		div3.classList.add("desc");
		var h3 = document.createElement("h3");
		var a2 = document.createElement("a");
		a2.href = "buy.php?&MarketId="+market[i][7];
		var TnameVeget = document.createTextNode(market[i][2]);
		var pDisten = document.createElement("p");
		var TextDistan = document.createTextNode("ห่างจากคุณ "+market[i][12]+" กิโลเมตร");
		var pMarketName = document.createElement("p");
		var TextNameMket = document.createTextNode("วันที่เปิด "+market[i][4]);
		var pOpenAndClose = document.createElement("p");
		var TextOpenAndClose = document.createTextNode("เวลาเปิด "+market[i][5]+ " เวลาปิด "+market[i][6]);
		var pLink = document.createElement("p");
		var a3 = document.createElement("a");
		if(<?php echo $type; ?>==1){
			
			a3.href = "buy.php?&MarketId="+market[i][7];
			a3.classList.add("btn","btn-primary","btn-outline","with-arrow");
		}else{
			a3.href = "buy-farmer.php?&MarketId="+market[i][7];
			a3.classList.add("btn","btn-primary","btn-outline","with-arrow");
		}
		var TextLink = document.createTextNode("ดูรายละเอียด");
		var icon = document.createElement("i");
		icon.classList.add("icon-arrow-right");
		showV.appendChild(div1);
		div1.appendChild(div2);
		div2.appendChild(a1);
		div2.appendChild(div3);
		div3.appendChild(h3);
		h3.appendChild(a2);
		a2.appendChild(TnameVeget);
		div3.appendChild(pMarketName);
		pMarketName.appendChild(TextNameMket);
		div3.appendChild(pOpenAndClose);
		pOpenAndClose.appendChild(TextOpenAndClose);
		div3.appendChild(pDisten);
		pDisten.appendChild(TextDistan);
		div3.appendChild(pLink);
		pLink.appendChild(a3);
		a3.appendChild(TextLink);
		a3.appendChild(icon);
		}
	}
	function setOnWebFactor(){
		var showV  = document.getElementById('showV');
		var table1 = document.createElement("table");
		var thead1 = document.createElement("thead");
		var tr1 = document.createElement("tr");
		var td1 = document.createElement("td");
		var td2 = document.createElement("td");
		var td3 = document.createElement("td");
		var td4 = document.createElement("td");
		var td5 = document.createElement("td");
		var tbody1 = document.createElement("tbody");
		var TextThead1 = document.createTextNode("ชื่อตลาด");
		var TextThead2 = document.createTextNode("ที่อยู่");
		var TextThead3 = document.createTextNode("โทร");
		var TextThead4 = document.createTextNode("ประเภทปัจจัยการผลิต");
		var TextThead5 = document.createTextNode("เลือก");
		table1.classList.add("datatable","table","table-hover","table-bordered");
		table1.border = "1";
		table1.id = "datatable";
		table1.width = "100%";
		showV.appendChild(table1);
		table1.appendChild(thead1);	
		thead1.appendChild(tr1);
		tr1.appendChild(td1);
		tr1.appendChild(td2);
		tr1.appendChild(td3);
		tr1.appendChild(td4);
		tr1.appendChild(td5);
		td1.appendChild(TextThead1);	
		td2.appendChild(TextThead2);
		td3.appendChild(TextThead3);
		td4.appendChild(TextThead4);
		td5.appendChild(TextThead5);
		table1.appendChild(tbody1);
		for(var i=0;i<market.length;i++){
		var Marketname1 = document.createTextNode(market[i][2]);
		var Marketname2 = document.createTextNode(market[i][8]);
		var Marketname3 = document.createTextNode(market[i][9]);
		var Marketname4 = document.createTextNode(market[i][10]);
		var Marketname5 = document.createTextNode("เลือก");
		var tr2 = document.createElement("tr");
		var td6 = document.createElement("td");
		var td7 = document.createElement("td");
		var td8 = document.createElement("td");
		var td9 = document.createElement("td");
		var td10 = document.createElement("td");
		var a1 = document.createElement("a");
		a1.href = "buy-farmer.php?&MarketId="+market[i][7];
		tbody1.appendChild(tr2);
		tr2.appendChild(td6);
		tr2.appendChild(td7);
		tr2.appendChild(td8);
		tr2.appendChild(td9);
		tr2.appendChild(td10);
		td6.appendChild(Marketname1);
		td7.appendChild(Marketname2);
		td8.appendChild(Marketname3);
		td9.appendChild(Marketname4);
		td10.appendChild(a1);
		a1.appendChild(Marketname5);
		}


		var dataTable = $('#datatable').DataTable();
		}
</script>



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
						<?php }else{
							if ($objResult['chatAM']>0) {
								$color = 'red';
							}else{
								$color = 'gray';

							}
							?>
							<a href="TopChat.php" title="คุณมี <?php echo $objResult['chatAM'] ?> ข้อความ"><i class="fas fa-bell" style="color: <?php echo $color ?>">&nbsp;<?php echo $objResult['chatAM'] ?></i></a>
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
					<h2>สินค้านำเสนอสำหรับคุณ</h2>

                    <p><span>Product for you</a></span></p>
                    <form class="form-inline" name="searchform" id="searchform" action="buylist.php" method="get">
                        <div class="form-group">
                            <label for="textsearch" >ชื่อสินค้า</label>
                            <input type="hidden" name="type" value="<?php echo $type ?>">
                            <input type="hidden" name="value" value="<?php echo $value ?>">
                            <input type="text"  class="form-control" placeholder="ข้อความ คำค้นหา!" name="search">
                        </div>
                        <button type="submit" class="btn btn-primary" id="btnSearch">
                            <span class="glyphicon glyphicon-search"></span>
                            ค้นหา
                        </button>
                    </form>
				</div>

            </div>
            <div id="search_result">
             <div class="row">
				<div class="fh5co-heading">
					<?php if (mysqli_fetch_array($queryC, MYSQLI_ASSOC) <= 0) {?>
						<center><h2>ไม่มีรายการในประเภทสินค้าดังกล่าว</h2> </center>
					<?php } else {?>
					<h2>แนะนำ</h2>
				<?php }?>
				</div>
            </div>
			<div class="row" >
				<div class="col-md-12">
		
                    <div class="row" id="showV">
           
			        </div>
			    
				</div>
			</div>
	</div>

	</div>

</div>


<div id="search_result">

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
    <script src="js/main.js"></script>
    <!-- Search -->
    <script type="text/javascript" src="jquery-1.11.2.min.js"></script>

    <!-- data Table State -->
	  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	  <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	  <script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	  <!-- Responsive extension -->
	  <script src="https://cdn.datatables.net/responsive/2.1.0/js/responsive.bootstrap.min.js"></script>
	  <!-- Buttons extension -->
	  <script src="//cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
	  <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.bootstrap.min.js"></script>
	  <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
	  <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
	  
	 
	<!-- END Data Table -->

	</body>
</html>

