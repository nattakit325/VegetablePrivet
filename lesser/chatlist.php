

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

	$chat = $_GET['chatname'];


	$strSQL = "UPDATE tbl_chat SET status = 0  where chat_user1 ='$chat'";
	$objQuery = mysqli_query($objCon,$strSQL);






	$sqlForNotification = "SELECT COUNT(DISTINCT chat_user1) as chatAM from tbl_chat WHERE chat_user2='$usermname' and status = 1";
	$queryForNotification=mysqli_query($objCon,$sqlForNotification);
	$objResult = mysqli_fetch_array($queryForNotification, MYSQLI_ASSOC);


	$sqlChatUser = "SELECT  p.name as name,p.surname as surname,p.picture as picture, c.chat_msg  as msg, p.username as chatname from tbl_chat c inner join profile p on  c.chat_user1 = p.username where c.chat_user2='$usermname' group by c.chat_user1 ORDER by chat_datetime DESC";



	$queryForChatUser=mysqli_query($objCon,$sqlChatUser);





	


	?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Lesser &mdash; Free HTML5 Bootstrap Website Template by FreeHTML5.co</title>
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
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>


	<script type="text/javascript" src="js/showUser.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
					<h2>พูดคุย กับ <?php echo $_GET['name'] ?>&nbsp;&nbsp;<?php echo $_GET['surname'] ?></h2>
					<p><span>Chat to <?php echo $_GET['name'] ?>&nbsp;&nbsp;<?php echo $_GET['surname'] ?> </span></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<?php while($row=mysqli_fetch_array($queryForChatUser,MYSQLI_ASSOC)){ 
				 	
				 	?>
					<div class="row">
						<div class="col-md-12 services-inner">
							<span><img class="circle" src="images/<?php echo $row['picture'];?>"></span>
							<div class="desc">

								<br><u><a href="chatlist.php?name=<?php echo $row['name'];?>&surname=<?php echo $row['surname'];?>&chatname=<?php echo $row['chatname'];?>"><h3><?php echo $row["name"];?>&nbsp;&nbsp;<?php echo $row["surname"];?></h3></a></u>
							</div>
							</div>
						
					</div>
					<?php } ?>
					
				</div>
				<div class="col-md-8">
					<aside class="sidebar">
						<div class="row">
							<div class="col-md-12 side">
								<div class="modal-body">
          <center>
          	<div id="messagesDiv">

</div>
<div class="bg-info" style="width:100%;padding:5px 0px;">
<div class="row">
  
  <div class="col-xs-12">
<!--  input hidden สำหรับ เก็บ chat_id ล่าสุดที่แสดง-->

<input name="userID1" type="hidden" id="userID1" value="<?php echo $_SESSION['username']; ?>">

  <input name="userID2" type="hidden" id="userID2" value="<?php echo $_GET['chatname']; ?>">
  <!--  input hidden สำหรับ เก็บ chat_id ล่าสุดที่แสดง-->
  <input name="h_maxID" type="hidden" id="h_maxID" value="0" >
  <input type="text" class="form-control" name="msg" id="msg" placeholder="Message">
  </div>

</div>
</div>
								
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
	<script src="js/main.js"></script>

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
  
});

</script>