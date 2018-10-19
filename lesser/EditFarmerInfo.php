
<?php
session_start();
	include "connect.php";

	$sql = "SELECT district_id as id,district_name as name from districts";

	$query=mysqli_query($objCon,$sql);
	if($_SESSION["username"]==null){
		 echo "<script language=\"JavaScript\">";
         echo "alert('กรุณาล็อกอินก่อน');";
         echo "window.location = 'index.php'; ";
         echo "</script>";
	}
	$usermname = $_SESSION["username"];
	$sql = "SELECT  n.id as id, n.topic as topic, n.detail as detail,n.media as media,n.Youtube_Link as Youtube_Link,n.Link as Link,n.time 
			as time,n.username as username,p.name_surname as name_surname FROM news n 
			inner join profile p on n.username = p.username WHERE time>NOW() and n.status=0  order by time";

    $sqlForNotification = "SELECT COUNT(DISTINCT chat_user1) as chatAM from tbl_chat WHERE chat_user2='$usermname' 
							and status = 1 ";

    $sqlForImage= "SELECT name FROM menu  where page = 'หน้าหลัก'";


   	$sql = "SELECT * FROM farmer_infomation WHERE profileID = '$usermname'";
	$queryInfo=mysqli_query($objCon,$sql);
	$objResultInfo = mysqli_fetch_array($queryInfo, MYSQLI_ASSOC);


    $querylForImage=mysqli_query($objCon,$sqlForImage);
    $i = 1;

    while($row=mysqli_fetch_array($querylForImage,MYSQLI_ASSOC)){ 
    	$img[$i] = $row["name"];
    	$i++;
    }
    if($objResultInfo){
		$sql = "SELECT * FROM farmer_infomation INNER JOIN product_log_for_farmer 
			ON farmer_infomation.id = product_log_for_farmer.farmer_information_id INNER JOIN product 
			ON product_log_for_farmer.product_id = product.id 
			WHERE profileID = '$usermname'";
		$queryProduct=mysqli_query($objCon,$sql);
	}


	

	
	$query=mysqli_query($objCon,$sql);
	$queryDialog=mysqli_query($objCon,$sql);

	$queryForNotification=mysqli_query($objCon,$sqlForNotification);
	$objResult = mysqli_fetch_array($queryForNotification, MYSQLI_ASSOC);




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
	<title>แก้ไขเกษตรกร</title>
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
<style>
.circle{ /* ชื่อคลาสต้องตรงกับ <img class="circle"... */
    height: 50px;  /* ความสูงปรับให้เป็นออโต้ */
    width: 50px;  /* ความสูงปรับให้เป็นออโต้ */
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
	<br>
	<br>
	<form action="update-farmerInfo.php" method="post" enctype="multipart/form-data" name="frmMain" runat="server">
	<div id="fh5co-contact-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>เแก้ไขเกษตรกรผู้ที่ผลิตสินค้าอินทรีย์</h2>
					<p><span>Edit Farmer</span></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-push-1 col-sm-12 col-sm-push-0 col-xs-12 col-xs-push-0">
					 <div class="col-md-6">
						<div class="form-group">
							<p>ปีที่เริ่มปลูก</p>
							<input class="form-control" placeholder="ปีที่เริ่มปลูก" value="<?php echo $objResultInfo['year_begin'] ?>" type="text" name="yearBegin" maxlength="4">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p>ทุ่งนา(ทำ/ไม่ทำ)</p>
							<input class="form-control" placeholder="ทุ่งนา(ทำ/ไม่ทำ)" value="<?php echo $objResultInfo['rice_field'] ?>" type="text" name="riceField" maxlength="5">
						</div>
					</div>
					 <div class="col-md-6">
						<div class="form-group">
							<p>ทำไร่(ทำ/ไม่ทำ)</p>
							<input class="form-control" placeholder="ทำไร่(ทำ/ไม่ทำ)" value="<?php echo $objResultInfo['farm'] ?>" type="text" name="Farm" maxlength="5">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p>ทำสวน(ทำ/ไม่ทำ)</p>
							<input class="form-control" placeholder="ทำสวน(ทำ/ไม่ทำ)" value="<?php echo $objResultInfo['orchard'] ?>" type="text" name="Orchard" maxlength="5">
						</div>
					</div>
					 <div class="col-md-6">
						<div class="form-group">
							<p>พื้นที่เพาะปลูก(ไร่)</p>
							<input class="form-control" placeholder="พื้นที่เพาะปลูก(ไร่)" value="<?php echo $objResultInfo['farm_area'] ?>" type="text" name="FarmArea" maxlength="5">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p>พื้นที่เพาะปลูก(งาน)</p>
							<input class="form-control" placeholder="พื้นที่เพาะปลูก(งาน)" value="<?php echo $objResultInfo['farm_area_ngan'] ?>" type="text" name="farmAreaNgan" maxlength="5">
						</div>
					</div>
					 <div class="col-md-6">
						<div class="form-group">
							<p>วัว(ตัว)</p>
							<input class="form-control" placeholder="วัว(ตัว)" type="text" value="<?php echo $objResultInfo['cow_or_ox'] ?>" name="cowOrox" maxlength="5">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p>ควาย(ตัว)</p>
							<input class="form-control" placeholder="ควาย(ตัว)" type="text" value="<?php echo $objResultInfo['buffalo'] ?>" name="buffalo" maxlength="5">
						</div>
					</div>
					 <div class="col-md-6">
						<div class="form-group">
							<p>ไก่(ตัว)</p>
							<input class="form-control" placeholder="ไก่(ตัว)" type="text" value="<?php echo $objResultInfo['chicken'] ?>" name="chicken" maxlength="5">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p>เป็ด(ตัว)</p>
							<input class="form-control" placeholder="เป็ด(ตัว)" type="text" value="<?php echo $objResultInfo['duck'] ?>" name="duck" maxlength="5">
						</div>
					</div>
					 <div class="col-md-6">
						<div class="form-group">
							<p>หมู(ตัว)</p>
							<input class="form-control" placeholder="หมู(ตัว)" type="text" value="<?php echo $objResultInfo['pig'] ?>" name="pig" maxlength="5">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p>สัตว์อื่นๆ</p>
							<input class="form-control" placeholder="สัตว์อื่นๆ" type="text" value="<?php echo $objResultInfo['other_anumal'] ?>" name="otherAnimal" maxlength="200">
						</div>
					</div>
					 <div class="col-md-6">
						<div class="form-group">
							<p>แหล่งน้ำที่ใช้</p>
							<input class="form-control" placeholder="แหล่งน้ำที่ใช้" value="<?php echo $objResultInfo['water source'] ?>" type="text" name="	waterSource" maxlength="100">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p>ปุ๋ยอินทรีย์สำเร็จรูปยี่ห้อที่ใช้</p>
							<input class="form-control" placeholder="ปุ๋ยอินทรีย์สำเร็จรูปยี่ห้อที่ใช้" value="<?php echo $objResultInfo['organic_fertilizer'] ?>" type="text" name="organicFertilizer" maxlength="5">
						</div>
					</div>
					 <div class="col-md-6">
						<div class="form-group">
							<p>ปริมาณที่ใช้ (กก./ไร่)</p>
							<input class="form-control" placeholder="ปริมาณที่ใช้ (กก./ไร่)" value="<?php echo $objResultInfo['amount_to_use'] ?>" type="text" name="	amountToUse" maxlength="5">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p>ปัจจัยที่ทำให้เกษตรอินทรีย์ประสบความสำเร็จ(ลำดับที่1)</p>
							<input class="form-control" placeholder="ปัจจัยที่ทำให้เกษตรอินทรีย์ประสบความสำเร็จ(ลำดับที่1)" value="<?php echo $objResultInfo['1_factor'] ?>" type="text" name="Factor1" maxlength="100">
						</div>
					</div>
					 <div class="col-md-6">
						<div class="form-group">
							<p>ปัจจัยที่ทำให้เกษตรอินทรีย์ประสบความสำเร็จ(ลำดับที่2)</p>
							<input class="form-control" placeholder="ปัจจัยที่ทำให้เกษตรอินทรีย์ประสบความสำเร็จ(ลำดับที่2)" value="<?php echo $objResultInfo['2_factor'] ?>" type="text" name="Factor2" maxlength="100">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p>ปัจจัยที่ทำให้เกษตรอินทรีย์ประสบความสำเร็จ(ลำดับที่3)</p>
							<input class="form-control" placeholder="ปัจจัยที่ทำให้เกษตรอินทรีย์ประสบความสำเร็จ(ลำดับที่3)" value="<?php echo $objResultInfo['3_factor'] ?>" type="text" name="Factor3" maxlength="100">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p>แรงบันดาลใจในการเปลี่ยนมาทำเกษตรอินทรีย์</p>
							<input class="form-control" placeholder="แรงบันดาลใจในการเปลี่ยนมาทำเกษตรอินทรีย์" value="<?php echo $objResultInfo['inspiration'] ?>" type="text" name="Inspiration" maxlength="100">
						</div>
					</div>
					<div class="row">
						<br>
						<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
							<h2>พืชที่ปลูก</h2>
						</div>
					</div>
					<?php while ($row = mysqli_fetch_array($queryProduct, MYSQLI_ASSOC)) {?>
						<div class="col-md-6">
							<div class="form-group" align="center">
								<div class="work-inner">
									<a  class="work-grid" style="background-image: url(images/<?php echo $row['picture']; ?>);" id="blah" ></a>
								</div>
								<a  class="work-grid" style="background-image: url(images/<?php echo $row['picture']; ?>);" id="blah" ></a>
								<label><?php echo $row['name']; ?></label>
							</div>
						</div>
					<?php }?>
				</div>
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
</body>
</html>
