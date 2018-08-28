

<?php  
   	session_start();
	include "connect.php";

	if(empty($_SESSION["username"])){

	}else{
		if($_SESSION["status"]=='admin')
		header("location:admin.php");
	}


	
	$sql = "connect.php";
    $sql = "SELECT n.topic as topic, n.detail as detail,n.media as media,n.time as time,n.username as username,p.name as name,p.surname as surname FROM news n inner join profile p on n.username = p.username WHERE time>NOW() and n.status=0  order by time";



	
	$query=mysqli_query($objCon,$sql);
	$queryDialog=mysqli_query($objCon,$sql);
	$count = 0;

	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear, เวลา $strHour:$strMinute";
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
	<title>VegetableGether</title>
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


	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>

	<script type="text/javascript" src="js/showUser.js"></script>
	<!--<script type="text/javascript" src="js/FB.js"></script> -->
	


	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>


	<style>
.circle{ /* ชื่อคลาสต้องตรงกับ <img class="circle"... */
    height: 40px;  /* ความสูงปรับให้เป็นออโต้ */
    width: 40px;  /* ความสูงปรับให้เป็นออโต้ */
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
						
							<p id="txtHint" style="color:red; "></p>
							
							<div class="form-group">

								<p id="txtHint"></p>

								<input type="text" class="form-control" name="usr" placeholder="Username" required id="usr">

							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="pwd" placeholder="Password" required id="pwd"> 
								
							</div>
							<button type="button" class="btn btn-success" onclick="showUser(document.getElementById('usr').value,document.getElementById('pwd').value)">เข้าสู่ระบบ</button>
							<!--<input type="submit" class="btn btn-success" placeholder="Password" value="เข้าสู่ระบบ">-->
							<br><br>
							
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


<?php while($row=mysqli_fetch_array($queryDialog,MYSQLI_ASSOC)){ 
	$count++;
	?>

  <div class="modal fade" id="myModal<?php echo $count?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title"> <?php echo $row["topic"];?> </h4>
          
        </div>
        <div class="modal-body">
          <p> <?php echo $row["detail"];?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php }
$count=0;
 ?>
  
  

  


	
	
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
							<a href="" data-toggle="modal" data-target="#login"><?php echo $_SESSION["name"];?> <?php echo $_SESSION["surname"];?></a></li>
							<a href="" data-toggle="modal" data-target="#login"><img class="circle" src="images/<?php echo $_SESSION["picture"]?>" width="10%" height="12%" /></a>
						<?php } ?>
						
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<br>
	<br>
	<div id="fh5co-featured-section">
		<div class="container">
			<div class="row">
				<?php
					$buy = null;
					if(empty($_SESSION["username"])){
						$buy = "buy.php";
						$sell = "#";
					}else{
						if($_SESSION["status"]=="เกษตรกร"){
							$buy = "buy_farmmer_first.php";
							
						}else{
							$buy = "buy.php";
							
						}
					}
				 ?>



				<div class="col-md-6">
					<a href="<?php echo $buy?>" class="featured-grid featured-grid-2" style="background-image: url(images/buy.jpg);">
						<div class="desc">
							<h3>ชื้อสินค้า</h3>
							<span>Buy</span>
						</div>
					</a>
				</div>


<?php if(empty($_SESSION["username"])){ ?>
				<div class="col-md-6">
					<a href="#" data-toggle="modal" data-target="#myModal" class="featured-grid featured-grid-2" style="background-image: url(images/sell3.jpg);">
						<div class="desc">
							<h3>ขายสินค้า</h3>
							<span>Sell</span>
						</div>
					</a>
					
				</div>
<?php }else{ ?>

				<div class="col-md-6">
					<a href="selllist.php"  class="featured-grid featured-grid-2" style="background-image: url(images/sell3.jpg);">
						<div class="desc">
							<h3>ขายสินค้า</h3>
							<span>Sell</span>
						</div>
					</a>
					
				</div>
<?php } ?>
			

			</div>
		</div>
	</div>

	<div id="fh5co-blog-section" class="fh5co-grey-bg-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>กิจกรรมที่กำลังจะมาถึง</h2>
					<p>Coming soon events</p>
					<div class="form-group">
									<form class="form-inline" name="searchform" id="searchform">
                        <div class="form-group">
                            <label for="textsearch" >วันเดือนปีที่จัดกิจกรรม</label>
                            <input type="date"  class="form-control" >
                        </div>

                        <button type="submit" class="btn btn-primary" id="btnSearch">
                            <span class="glyphicon glyphicon-search"></span>
                            ค้นหา
                        </button>
                        <?php if(empty($_SESSION["username"])){ ?>
                        <a href="#" data-toggle="modal" data-target="#myModal"><button type="button" class="btn btn-success" ><i class="fas fa-plus-square"></i>&nbsp;&nbsp;เสนอข่าวใหม่</button></span></a>

                    <?php }else{ ?>
                        <a href="AddNews.php"><button type="button" class="btn btn-success" ><i class="fas fa-plus-square"></i>&nbsp;&nbsp;เสนอข่าวใหม่</button></span></a>
                    <?php } ?>
                    </form> 
                    <br>
									
										
										
									</div>
				</div>
			</div>
			<div class="row">

				 <?php while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){ 
				 	$count++
				 	?>
				<div class="col-md-4 text-center">
					<div class="work-inner">
						<a class="work-grid" style="background-image: url(images/<?php echo $row['media'];?>);">
						</a>
						<div class="desc">
							<h3><?php echo $row["topic"];?></h3>
							<p>เวลา <?php echo DateThai($row["time"]);?></p>
							<p>โดย <?php echo $row["name"]." ".$row["surname"];?></p>
							
							<a href="#" class="btn btn-primary btn-outline with-arrow" data-toggle="modal" data-target="#myModal<?php echo $count?>">ดูรายละเอียด<i class="icon-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<?php } ?>
				
				
				


				

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
	<script src="js/main.js"></script>

	</body>
</html>

