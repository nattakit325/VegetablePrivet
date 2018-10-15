

<?php  
   	session_start();
	include "connect.php";
	$usermname = '';

	if(empty($_SESSION["username"])){

	}else{
		if($_SESSION["status"]=='admin'||$_SESSION["status"]=='superAdmin'){
			header("location:admin.php");
		}else{
			$usermname = $_SESSION["username"];
		}
		
	}

	


    $sql = "SELECT  n.id as id, n.topic as topic, n.detail as detail,n.media as media,n.Youtube_Link as Youtube_Link,n.Link as Link,n.time 
			as time,n.username as username,p.name_surname as name_surname FROM news n 
			inner join profile p on n.username = p.username WHERE time>NOW() and n.status=0  order by time";

    $sqlForNotification = "SELECT COUNT(DISTINCT chat_user1) as chatAM from tbl_chat WHERE chat_user2='$usermname' 
							and status = 1 ";

    $sqlForImage= "SELECT name FROM menu  where page = 'หน้าหลัก'";


    $sqlForProduct = "SELECT p.name as product_name,p.detail as detail,f.name_surname as name,p.price as price,p.picture as picture FROM selllist s 
		INNER join product p on s.id = p.id 
		INNER JOIN profile f on s.username = f.username
		ORDER BY s.id DESC LIMIT 12";
	$querylForProduct=mysqli_query($objCon,$sqlForProduct);




    $querylForImage=mysqli_query($objCon,$sqlForImage);
    $i = 1;

    while($row=mysqli_fetch_array($querylForImage,MYSQLI_ASSOC)){ 
    	$img[$i] = $row["name"];
    	$i++;
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
<script type="text/javascript">
	function showHint(str) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("search_result").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "getevent.php?q="+str, true);
        xmlhttp.send();
    
}

</script>
</script>






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

<?php while($row=mysqli_fetch_array($queryDialog,MYSQLI_ASSOC)){ 
	
	?>

  <div class="modal fade" id="myModal<?php echo $row["id"]?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title"> <?php echo $row["topic"];?> </h4>
          
        </div>
        <div class="modal-body">
        	<u>เนื้อหา</u><br>
          <p> <?php echo $row["detail"];?></p>
          <?php if($row["Link"]!=null){ ?>
          <u>เว็ปไซต์ประชาสัมพันธ์</u><br>
          <a href="<?php echo $row["Link"];?>" target="_blank"><?php echo $row["Link"];?></a>
          <?php } ?><br><br>
          <?php if($row["Youtube_Link"]!=null){ ?>
          <u>สื่อประชาสัมพันธ์</u><br>
          <iframe width="420" height="345" src="<?php echo $row["Youtube_Link"];?>" frameborder="0" allow="autoplay";>
			</iframe>
          <?php } ?>
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
	<div id="fh5co-featured-section">
		<div class="container">
			<div class="row">
				<?php
					$buy = null;
					if(empty($_SESSION["username"])){
						$buy = "marketList.php?type=1";
						$sell = "#";
					}else{
						if($_SESSION["status"]=="เกษตรกร"){
							$buy = "buy_farmmer_first.php";
							
						}else{
							$buy = "marketList.php?type=1";
							
						}
					}
				 ?>



				<div class="col-md-6">
					<a href="<?php echo $buy?>" class="featured-grid featured-grid-2" style="background-image: url(images/<?php echo $img[1]; ?>);">
						<div class="desc">
							<h3>ชื้อสินค้า(สินค้าทางการเกษตร)</h3>
							<span>Buy</span>
						</div>
					</a>
				</div>


<?php if(empty($_SESSION["username"])){ ?>
				<div class="col-md-6">
					<a href="#" data-toggle="modal" data-target="#myModal" class="featured-grid featured-grid-2" style="background-image: url(images/<?php echo $img[2]; ?>);">
						<div class="desc">
							<h3>ขายสินค้า</h3>
							<span>Sell</span>
						</div>
					</a>
					
				</div>
<?php }else{ ?>

				<div class="col-md-6">
					<a href="selllist.php?value=' '"  class="featured-grid featured-grid-2" style="background-image: url(images/<?php echo $img[2]; ?>);">
						<div class="desc">
							<h3>ขายสินค้า</h3>
							<span>Sell</span>
						</div>
					</a>
					
				</div>
<?php } ?>

				<div class="col-md-6">
					<a href="search-showConsignee.php" class="featured-grid featured-grid-2" style="background-image: url(images/<?php echo $img[3]; ?>);">
						<div class="desc">
							<h3>ค้นหาพื้นที่การแลกเปลี่ยนสินค้า</h3>
							<span>Search For The Exchange Area</span>
						</div>
					</a>
				</div>
				<div class="col-md-6">
					<a href="search-farmer.php" class="featured-grid featured-grid-2" style="background-image: url(images/<?php echo $img[4]; ?>);">
						<div class="desc">
							<h3>ค้นหาเกษตรกรต้นแบบ</h3>
							<span>Good Example Farmer</span>
						</div>
					</a>
				</div>

				<!--<div class="col-md-6">
					<?php if(empty($_SESSION["username"])){ ?>
					<a href="#" data-toggle="modal" data-target="#myModal" class="featured-grid featured-grid-2" style="background-image: url(images/news.jpg);">
						<div class="desc">
							<h3>นำเสนอข่าว</h3>
							<span>Create news</span>
						</div>
					</a>
					<?php }else{ ?>
					<a href="AddNews.php" class="featured-grid featured-grid-2" style="background-image: url(images/news.jpg);">
						<div class="desc">
							<h3>นำเสนอข่าว</h3>
							<span>Create news</span>
						</div>
					</a>

					<?php } ?>

				</div>-->

			

			</div>
		</div>
	</div>

	
	<div id="fh5co-blog-section" class="fh5co-grey-bg-section">
		<div class="container">
			<div class="row">
				<div id="news">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>ประชาสัมพันธ์</h2>
					<p>Public relations</p>
					<div class="form-group">
									<form >
                        <div class="form-group">
                            <label for="textsearch" >วันเดือนปีที่จัดกิจกรรม</label>

                            <input type="date"  class="form-control" name="dateToserch" id="dateToserch" data-date-format="mm-dd-yyyy">

                        </div>
                        

                        <button type="button" class="btn btn-primary" id="btnSearch" onclick="showHint(document.getElementById('dateToserch').value)">
                            <span class="glyphicon glyphicon-search"></span>
                            ค้นหา
                        </button>
                        <?php if(empty($_SESSION["username"])){ ?>
                        <a href="#" data-toggle="modal" data-target="#myModal"><button type="button" class="btn btn-success" ><i class="fas fa-plus-square"></i>&nbsp;&nbsp;เสนอข่าวใหม่</button></span></a>

                    <?php }else{ ?>
                        <a href="AddNews.php"><button type="button" class="btn btn-success" ><i class="fas fa-plus-square"></i>&nbsp;&nbsp;เสนอข่าวใหม่</button></span></a>
                    <?php } ?>
                    <a href="#product"><button type="button" class="btn btn-warning" ><i class="fab fa-product-hunt"></i>&nbsp;&nbsp;ดูสินค้ามาใหม่</button></span></a>

                    </form> 

                    <br>
									
										
										
									</div>
				</div>
			</div>

			<div id="search_result">
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
							<!--<p>เวลา <?php echo DateThai($row["time"]);?></p>-->
							<p>โดย <?php echo $row["name_surname"];?></p>
							
							<a href="#" class="btn btn-primary btn-outline with-arrow" data-toggle="modal" data-target="#myModal<?php echo $row["id"]?>">ดูรายละเอียด<i class="icon-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			</div>



			<div id="product">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>สินค้าที่ลงขายล่าสุด</h2>
					<p>Latest Products</p>
					
                    <a href="#news"><button type="button" class="btn btn-warning" ><i class="fab fa-product-hunt"></i>&nbsp;&nbsp;ดูข่าวประชาสัมพันธ์</button></span></a>
                    <br>
									
										
										
									</div>
				</div>
			</div>

			<div id="search_result">
			<div class="row">

				 <?php while($row=mysqli_fetch_array($querylForProduct,MYSQLI_ASSOC)){ 
				 	$count++
				 	?>
				<div class="col-md-4 text-center">
					<div class="work-inner">
						<a class="work-grid" style="background-image: url(images/<?php echo $row['picture'];?>);">
						</a>
						<div class="desc">
							<h3><?php echo $row["product_name"];?></h3>
							<p>โดย <?php echo $row["name"];?></p>
							
							<a href="#" class="btn btn-primary btn-outline with-arrow" data-toggle="modal" data-target="#myModal<?php echo $row["id"]?>">ดูรายละเอียด<i class="icon-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
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
	<script src="js/main.js"></script>

	</body>
</html>

