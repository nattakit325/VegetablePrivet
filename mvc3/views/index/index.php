<?php require_once 'views/layout/header.php';?>	
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
                    <h4 class="modal-title text-center">กรุณาเข้าสู่ระบบ</h4>
                </div>
                <div class="modal-body text-center">
                    <form action="/login/login" method="POST"  id="login_form">
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
                    </form>
                    <br>
                    <a href="register.php">ยังไม่ได้สมัครบัญชีในระบบ</a>
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
          <h4 class="modal-title text-center"><?php echo $_SESSION["name"];?> <?php echo $_SESSION["surname"];?></h4>
        </div>
        <div class="modal-body text-center">
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
  
  

  
<?php echo "<script type='text/javascript'>alert('$pstm');</script>"; ?>

	
	
	<div id="fh5co-page">
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="header-inner">
				<h1><i class="sl-icon-energy"></i><a href="index/index">Lesserr</a></h1>
				<nav role="navigation">
					<ul>
						<li>
							<?php if(empty($_SESSION["username"])){
								?>
							<a href="" data-toggle="modal" data-target="#myModal">เข้าสู่ระบบ</a></li>
							<a href="login/logout"><img class="circle" src="/public/images/profile.png" width="10%" height="12%" /></a>
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
					<a href="<?php echo $buy?>" class="featured-grid featured-grid-2" style="background-image: url(/public/images/buy.jpg);">
						<div class="desc">
							<h3>ชื้อสินค้า</h3>
							<span>Buy</span>
						</div>
					</a>
				</div>


<?php if(empty($_SESSION["username"])){ ?>
				<div class="col-md-6">
					<a href="#" data-toggle="modal" data-target="#myModal" class="featured-grid featured-grid-2" style="background-image: url(/public/images/sell3.jpg);">
						<div class="desc">
							<h3>ขายสินค้า</h3>
							<span>Sell</span>
						</div>
					</a>
					
				</div>
<?php }else{ ?>

				<div class="col-md-6">
					<a href="selllist.php"  class="featured-grid featured-grid-2" style="background-image: url(/public/images/sell3.jpg);">
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
					<h2>ข่าวสารล่าสุด</h2>
					<p>Latest News</p>
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
	
	
<?php require_once 'views/layout/footer.php';?>

