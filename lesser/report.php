<?php
	session_start();
	
    include "connect.php";


    $type = $_GET['type'];
    $value = $_GET['value'];
    if($type=='admin'){
    	 $sql = "SELECT l.username as id, p.name_surname as name,p.picture as picture  from profile p inner join login l on p.username=l.username where l.status = '$type' and p.name_surname like '%$value%'";

    }else{
    	$sql = "SELECT p.id as id, p.name_surname as name,p.picture as picture,p.address as address,p.subdictrict as subdictrict,d.district_name as district_name ,l.username as username  from profile p inner join login l on p.username=l.username  inner join districts d on p.district_id=d.district_id  where l.status != '$type' and l.status != 'superAdmin' and l.status != 'admin' and p.name_surname like '%$value%'";
    }
   

    $query=mysqli_query($objCon,$sql);
	$queryDialog=mysqli_query($objCon,$sql);


	$usermname = $_SESSION["username"];
	 $sqlForNotification = "SELECT COUNT(DISTINCT chat_user1) as chatAM from tbl_chat WHERE chat_user2='$usermname' and status = 1 ";
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
	<title>Report</title>
	<!-- For responsive <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	
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


<script>
$(document).ready(function(){
    $("#delete").click(function(){
    	$('#fordelete').hide();
    	
          //$('.row').hide();
    });

});




function Delete(id,name,picture,type) {

    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("DeleteDialog").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "DeleteOneAdmin.php?id="+id+"&name="+name+"&picture="+picture+"&type="+type, true);
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
          <center><p class="modal-title">ต้องการยกเลิกบัญชีทั้งหมดหรือไม่</p></center>
        </div>
        <div class="modal-body">
          <center>
						
  <br>

  <a href="DeleteAllAccount.php?value=<?php echo $value; ?>&type=<?php echo $type; ?>"><button type="button" class="btn btn-warning" ><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;ต้องการ</button></a>
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





   <?php while($row=mysqli_fetch_array($queryDialog,MYSQLI_ASSOC)){ 
	
	?>

  <div class="modal fade" id="myModalINFO<?php echo $row["id"]?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title"> <?php echo $row["name"] ?> </h4>
          
        </div>
        <div class="modal-body">
          <p>ที่อยู่ <?php echo $row["address"];?> <?php echo $row["subdictrict"];?> อำเภอ<?php echo $row["district_name"];?></p>
          
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
	

	<div id="fh5co-blog-section" class="fh5co-grey-bg-section">
		<div class="container">
			<div class="row" >
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>บัญชีที่มีทั้งหมด</h2>
					<p>All account</p>
					<div class="form-group">
					<form class="form-inline" name="searchform" id="searchform" action="report.php" method="get">
                        <div class="form-group">

                            <input type="text"  class="form-control" placeholder="ชื่อบัญชี" name="value">
                        </div>
                        <div class="form-group">
									<select class="form-control" name="type">
										<?php if($_SESSION["status"]=='superAdmin'){ ?>
										<option value="admin">ผู้ดูและระบบ</option>
										<?php } ?>
										<option value="user">ผู้ใช้งานทั่วไป</option>
									</select>
								</div>
                        <button type="submit" class="btn btn-primary" id="btnSearch">
                            <span class="glyphicon glyphicon-search"></span>
                            ค้นหา
                        </button>
                    </form> 
                    <br>
									<?php if($_SESSION["status"]=='superAdmin'){ ?><a href="AddAdmin.php"><button type="button" class="btn btn-success" ><i class="fas fa-plus-square"></i>&nbsp;&nbsp;เพิ่มผู้ดูและระบบ</button></span></a>
									<?php } ?>
										<button type="button" class="btn btn-danger" id="delete" data-toggle="modal" data-target="#forconfermdelete"><i class="fas fa-trash-alt"></i></i>&nbsp;&nbsp;ยกเลิกบัญชีทั้งหมด
										
									</div>
							
				</div>
			</div>
			<div class="row">
				<?php if($type=='user'){ ?>

			<div class="row">
				<table border="1" class="datatable table table-hover table-bordered" cellspacing="0" width="100%" id='datatable'>
				    <thead>
				        <tr>
				        	<th>No.</th>
				            <th>ID</th>
				            <th>Name</th>
				            <th>Address</th>
				            <th>Delete</th>
				        </tr>
				    </thead>
				    <tbody>
				    	<?php while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {?>
							<tr>
					    		<td><?php echo $row["id"];?></td>
					            <td><?php echo $row["username"];?></td>
					    		<td><?php echo $row["name"];?></td>
				            	<td>ที่อยู่ <?php echo $row["address"];?> <?php echo $row["subdictrict"];?> อำเภอ<?php echo $row["district_name"];?></td>
				            	<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#forconfermdeleteeach" onclick="Delete('<?php echo $row['username'] ?>','<?php echo $row['name'] ?>','<?php echo $row['picture'] ?>','user')"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;ยกเลิกบัญชี</span></button></td>
				        </tr>
						<?php }?>
				        
				    </tbody>
				</table>
			</div>
				<?php }else{?>
					<div class="row">
						<table border="1" class="datatable table table-hover table-bordered" cellspacing="0" width="100%" id='datatable'>
						    <thead>
						        <tr>
						        	<th>No.</th>
						            <th>ID</th>
						            <th>Name</th>
						            <th>Delete</th>
						        </tr>
						    </thead>
						    <tbody>

						    	<?php while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {?>
									<tr>
										
							            <td><?php echo $row["id"];?></h3></td>
							    		<td><?php echo $row["name"];?></td>
						            	<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#forconfermdeleteeach" onclick="Delete('<?php echo $row['id'] ?>','<?php echo $row['name'] ?>','<?php echo $row['picture'] ?>','admin')"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;ยกเลิกบัญชีผู้ดูแลระบบ</span></button></td>
						        	</tr>
								<?php }?>
						        
						    </tbody>
						</table>
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
	    var dataTable = $('#datatable').DataTable({
	        "order": [[ 0, "desc" ]]
	    });
	  </script>
	<!-- END Data Table -->
	</body>
</html>

