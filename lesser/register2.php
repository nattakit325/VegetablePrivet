<?php
	session_start();
	include "connect.php";

	$sql="SELECT * FROM market WHERE market_type_id = 1 ";
	$query=mysqli_query($objCon,$sql);
	$market = array();
	while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
		array_push($market,$row["market"]);
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


	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNyDumm4Nkun0UNrkqJdXjzUL_NXPl0V4&callback=setupMap">
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
	$("#place option:selected").remove();
    });
    console.log(marketarr);
});
function DeleteOption() {
    var x = document.getElementById("show");
	var place = document.getElementById("place");
    var option = document.createElement("option");
	<?php foreach($market as $value){ ?>
		if(x.value == "<?php echo $value ?>"){
			option.text = x.value;
    		place.add(option);
		}
	<?php } ?>
    
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
	x.remove(x.selectedIndex);
	
}
function saveMarket() {
	selectBox = document.getElementById("show");

        for (var i = 0; i < selectBox.options.length; i++) 
        { 
             selectBox.options[i].selected = true; 
        } 

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
	<form method="post" action="save-market.php">
		<div id="fh5co-contact-section">
			<div class="row">
		        <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
		          <h2>กำหนดสถานที่ขายสินค้าของคุณ</h2>
		          <p><span>Set location where your products sold</span></p>
		          	<input type="hidden" name="user" value="<?php echo $_SESSION["username"];?>">
		                        <div class="col-md-6">
									<div class="form-group">
										<select class="form-control" name="market[]"  id="show" multiple>
											
										</select>
									</div>
		                        </div>
		                        <div class="col-md-6">
									<div class="form-group">
										<button type="button" class="btn btn-info" data-toggle="modal" onclick="DeleteOption()">ลบที่คุณเลือก</button>
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
								<?php foreach($market as $value){ ?>
								<option value="<?php echo $value ?>"><?php echo $value ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
		            <div class="col-md-6">
						<div class="form-group">
							<a href="AddmarketUser.php"><button type="button" class="btn btn-info">เพิ่มตลาดอื่นๆ</button></a>
						</div>
					</div>
		        </div>
		    </div>
		</div>
	
	
  		<div class="col-md-12">
             <div class="form-group">
             <br>
             <center>
              	<input value="ยืนยันการสมัครสมาชิก" class="btn btn-primary" type="submit" onclick="saveMarket()">
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

