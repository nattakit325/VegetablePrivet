<?php
	session_start();
	
    include "connect.php";
    $sql = "SELECT n.id as id, n.topic as topic, n.detail as detail,n.media as media,n.time as time,n.username as username,p.name_surname as name_surname ,n.PostTime as posttime FROM news n inner join profile p on n.username = p.username where n.status = 0 order by n.PostTime";

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
		return "$strDay $strMonthThai $strYear,<br> เวลา $strHour:$strMinute";
	}


	$usermname = $_SESSION["username"];
	$sqlForNotification = "SELECT COUNT(DISTINCT chat_user1) as chatAM from tbl_chat WHERE chat_user2='$usermname' 
							and status = 1 ";

	$queryForNotification=mysqli_query($objCon,$sqlForNotification);
	$objResultNor = mysqli_fetch_array($queryForNotification, MYSQLI_ASSOC);

    
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>MenuMG</title>
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
	</head>




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



	<body>



 <div class="modal fade" id="forconfermdeleteeach" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
<div id="DeleteDialog">
</div>
  </div>
    </div>
  </div>







<div class="modal fade" id="forconfermdelete" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><p class="modal-title">ต้องการลบข่าวที่หมดเวลาทั้งหมดหรือไม่</p></center>
        </div>
        <div class="modal-body">
          <center>
						
  <br>

  <a href="DeleteAllNewOverTime.php"><button type="button" class="btn btn-warning" id="delete"  ><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;ต้องการ</button></a>
  <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
        </center>
          
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
				<h1><i class="sl-icon-energy"></i><a href="index.php">OrganicApp</a></h1>
				<nav role="navigation">
					<ul>
						<li>
							<?php if(empty($_SESSION["username"])){
								?>
							<a href="" data-toggle="modal" data-target="#myModal">เข้าสู่ระบบ</a></li>
							<a href="" data-toggle="modal" data-target="#myModal"><img class="circle" src="images/profile.png" width="10%" height="12%" /></a>
						<?php }else{
							if ($objResultNor['chatAM']>0) {
								$color = 'red';
							}else{
								$color = 'gray';

							}
							?>
							<a href="TopChat.php" title="คุณมี <?php echo $objResultNor['chatAM'] ?> ข้อความ"><i class="fas fa-bell" style="color: <?php echo $color ?>">&nbsp;<?php echo $objResultNor['chatAM'] ?></i></a>
							<a data-toggle="modal" data-target="#login"><img class="circle" src="images/<?php echo $_SESSION["picture"]?>" width="10%" height="12%" /></a>
							
						<?php } ?>
						
					</ul>
				</nav>
			</div>
		</div>
	</header>
	

	<div id="fh5co-blog-section" class="fh5co-grey-bg-section">
			<div class="container">
				<div class="row" >
					<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
						<h2>การจัดการเมนู</h2>
						<p>Menu management</p>
						<br>

						<a href="editMenuImg.php?id=หน้าหลัก" class="btn btn-primary btn-outline with-arrow" >หน้าหลัก<i class="icon-arrow-right"></i></a>
						<a href="editMenuImg.php?id=เลือกประเภทสินค้า" class="btn btn-primary btn-outline with-arrow" >หน้าเลือกประเภทสินค้า<i class="icon-arrow-right"></i></a>
						<a href="editMenuImg.php?id=ตัวเลือกสินค้าของเกษตรกร" class="btn btn-primary btn-outline with-arrow" >หน้าตัวเลือกสินค้าของเกษตรกร<i class="icon-arrow-right"></i></a>
						<br><br>
						<a href="editMenuImg.php?id=แอดมิน" class="btn btn-primary btn-outline with-arrow" >หน้าแอดมิน<i class="icon-arrow-right"></i></a>
						
						<a href="editMenuImg.php?id=การจัดการบัญชี" class="btn btn-primary btn-outline with-arrow" >หน้าการจัดการบัญชี<i class="icon-arrow-right"></i></a>
						<a href="editMenuImg.php?id=การจัดการตลาด" class="btn btn-primary btn-outline with-arrow" >หน้าการจัดการตลาด<i class="icon-arrow-right"></i></a>
						<br><br>
						<a href="editMenuImg.php?id=การจัดการเกษตรกร" class="btn btn-primary btn-outline with-arrow" >หน้าการจัดการเกษตรกร<i class="icon-arrow-right"></i></a>		
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
	  
	  <script>
	    var dataTable = $('#datatable').DataTable();
	  </script>
	<!-- END Data Table -->
	</body>
</html>

