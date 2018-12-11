<?php
	session_start();
	
    include "connect.php";
    if($_SESSION["status"] != "admin"&&$_SESSION["status"]!='superAdmin')
	{
		header("location:index.php");
	}
    




    $sql = "SELECT n.id,n.topic as topic, n.detail as detail,n.media as media,n.time as time,n.username as username,p.name_surname as name_surname ,n.PostTime as posttime FROM news n inner join profile p on n.username = p.username where n.status = 1 order by n.PostTime";


    

	$usermname = $_SESSION["username"];
		
	

    
    $sqlForNotification = "SELECT COUNT(DISTINCT chat_user1) as chatAM from tbl_chat WHERE chat_user2='$usermname' and status = 1 ";
    $queryForNotification=mysqli_query($objCon,$sqlForNotification);
	$objResult = mysqli_fetch_array($queryForNotification, MYSQLI_ASSOC);



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

	$sqlForImage= "SELECT name FROM menu  where page = 'แอดมิน'";

    $querylForImage=mysqli_query($objCon,$sqlForImage);
    $i = 1;

    while($row=mysqli_fetch_array($querylForImage,MYSQLI_ASSOC)){ 
    	$img[$i] = $row["name"];
    	$i++;
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
	<title>Admin</title>
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

	</head>


<script>
$(document).ready(function(){
    $("#delete").click(function(){
    	$('#fordelete').hide();
    	
          //$('.row').hide();
    });

});




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


function showHint(str) {
    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("search_result").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "getNews.php?q="+str, true);
        xmlhttp.send();
    
}



</script>

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


<div class="modal fade" id="forconfermdelete" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><p class="modal-title">ต้องการปฏิเสธข่าวหมดหรือไม่</p></center>
        </div>
        <div class="modal-body">
          <center>
						
  <br>

  <a href="DeleteAllNews.php"><button type="button" class="btn btn-warning"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;ต้องการ</button></a>
  <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
        </center>
          
        </div>
        
          
        
      </div>
    </div>
  </div>


  <div class="modal fade" id="forconfermAP" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><p class="modal-title">ต้องการอนุมัติข่าวหมดหรือไม่</p></center>
        </div>
        <div class="modal-body">
          <center>
						
  <br>

  <a href="apAllNews.php"><button type="button" class="btn btn-success"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;ต้องการ</button></a>
  <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
        </center>
          
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
          
          <h3>หัวข้อข่าว</h3><h4 class="modal-title"><?php echo $row["topic"];?> </h4>
          
        </div>
        <div class="modal-header">
        
          <h3>วันเวลาสิ้นสุดการประชาสัมพันธ์</h3><h4 class="modal-title"><?php echo DateThai($row["time"]);?> </h4>
        
        </div>
        <div class="modal-body">
          <h3>รายละเอียด</h3><p> <?php echo $row["detail"];?></p>
        </div>
        <div class="modal-footer">
        	<a href="APnews.php?id=<?php echo $row["id"]; ?>" class="btn btn-primary btn-outline with-arrow">อนุมัติ<i class="icon-arrow-right"></i></a>
							<a href="RFnews.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-danger" >ปฏิเสธ</span></button></a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php }
$count=0;
 ?>





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

  <a href="Edit-Password.php"><button type="button" class="btn btn-success" >แก้ไขรหัสผ่าน</button></a>
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
				<a href="index.php"><img src="icon/logo.png" width="20%" height="12%"></a>
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
	<div id="fh5co-featured-section">
		<div class="container">
			<div class="row">
				
				<div class="col-md-6">
					<a href="AddNews.php" class="featured-grid featured-grid-2" style="background-image: url(images/<?php echo $img[1]; ?>);">
						<div class="desc">
							<h3>สร้างข่าว</h3>
							<span>Create news</span>
						</div>
					</a>
				</div>
				<?php if($_SESSION["status"]=='superAdmin'){ ?>
				<div class="col-md-6">
					<a href="AccountMG.php" class="featured-grid featured-grid-2" style="background-image: url(images/<?php echo $img[2]; ?>);">
						<div class="desc">
							<h3>การจัดการบัญชี</h3>
							<span>Account management</span>
						</div>
					</a>
					
				</div>
			<?php }else{ ?>

				<div class="col-md-6">
					<a href="report.php?value=' '&type=user"  class="featured-grid featured-grid-2" style="background-image: url(images/<?php echo $img[2]; ?>);">
						<div class="desc">
							<h3>การจัดการบัญชี</h3>
							<span>Account management</span>
						</div>
					</a>
					
				</div>
			<?php } ?>
				<div class="col-md-6">
					<a href="ManageTheMarket.php" class="featured-grid featured-grid-2" style="background-image: url(images/<?php echo $img[3]; ?>);">
						<div class="desc">
							<h3>เพิ่มสถานที่ขายพืชผักอินทรีย์</h3>
							<span>Add location</span>
						</div>
					</a>	
				</div>

				<div class="col-md-6">
					<a href="addSellLocation.php" class="featured-grid featured-grid-2" style="background-image: url(images/<?php echo $img[4]; ?>);">
						<div class="desc">
							<h3>เพิ่มสถานที่รับสินค้า</h3>
							<span>Add location</span>
						</div>
					</a>	
				</div>

				<div class="col-md-6">
					<a href="addFarmerLocation.php" class="featured-grid featured-grid-2" style="background-image: url(images/<?php echo $img[5]; ?>);">
						<div class="desc">
							<h3>เพิ่มข้อมูลเกษตรกร</h3>
							<span>Add farmer</span>
						</div>
					</a>	
				</div>

				<div class="col-md-6">
					<a href="farmer.php" class="featured-grid featured-grid-2" style="background-image: url(images/<?php echo $img[6]; ?>);">
						<div class="desc">
							<h3>ข้อมูลเกษตรกร</h3>
							<span>Add farmer</span>
						</div>
					</a>	
				</div>

				<div class="col-md-6">
					<a href="dataMG.php" class="featured-grid featured-grid-2" style="background-image: url(images/<?php echo $img[7]; ?>);">
						<div class="desc">
							<h3>การจัดการข้อมูล</h3>
							<span>Data management</span>
						</div>
					</a>
					
				</div>
				<div class="col-md-6">
					<a href="menuMG.php" class="featured-grid featured-grid-2" style="background-image: url(images/<?php echo $img[8]; ?>);">
						<div class="desc">
							<h3>การจัดการเมนู</h3>
							<span>Menu management</span>
						</div>
					</a>
					
				</div>
				
			</div>
		</div>
	</div>

	<div id="fh5co-blog-section" class="fh5co-grey-bg-section">
		<div class="container">
			<div class="row" >
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>ข่าวที่รอการอนุมัติ</h2>
					<p>All News that waiting for approval</p>
					<div class="form-group">
									<form class="form-inline" name="searchform" id="searchform">
                        
                        
                    </form> 
                    <br>
									<button type="button" class="btn btn-success" data-toggle="modal" data-target="#forconfermAP"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;อนุมัติทั้งหมด</button>
										<button type="button" class="btn btn-danger" id="delete" data-toggle="modal" data-target="#forconfermdelete"><i class="fas fa-trash-alt"></i></i>&nbsp;&nbsp;ปฏิเสธทั้งหมด</button>
										
									</div>
							
				</div>
			</div>
			<div class="row">

				 <?php while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){ 
				 	$count++
				 	?>
				<div class="col-md-4 text-center">
					<div class="work-inner">
						<a class="work-grid"  style="background-image: url(images/<?php echo $row['media'];?>); ">
						</a>
						<div class="desc">
							<h3><?php echo $row["topic"];?></h3>
							<p>ประกาศเมื่อ <?php echo DateThai($row["posttime"]);?></p>
							<p>โดย <?php echo $row["name_surname"];?></p>
							
							<a href="#" class="btn btn-primary btn-outline with-arrow" data-toggle="modal" data-target="#myModal<?php echo $count?>">ดูรายระเอียด<i class="icon-arrow-right"></i></a>
							
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

