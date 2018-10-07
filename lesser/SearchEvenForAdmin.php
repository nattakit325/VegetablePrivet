<?php
	session_start();
	include "connect.php";

	$value=$_GET["value"];




	$sql = "SELECT n.topic as topic, n.detail as detail,n.media as media,n.time as time,n.username as username,p.name_surname as name ,n.PostTime as posttime FROM news n inner join profile p on n.username = p.username where n.status = 0 and posttime>='$value' order by n.PostTime";


    $query=mysqli_query($objCon,$sql);
    $count = 0;

   




?>

<div class="row">

				 <?php while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){ 
				 	
				 	?>
				<div class="col-md-4 text-center">
					<div class="work-inner">
						<a class="work-grid" style="background-image: url(images/<?php echo $row['media'];?>);">
						</a>
						<div class="desc">
							<h3><?php echo $row["topic"];?></h3>
							<?php if(date('Y/m/d',strtotime($row["time"]))<date("Y/m/d")){?>
								<p style="color: red">แสดงถึงวันที่ <?php echo ($row["time"]);?></p>
							<?php }else{ ?>
								<p style="color: green">แสดงถึงวันที่ <?php echo ($row["time"]);?></p>
							<?php  } ?>
							ประกาศเมื่อ <?php echo ($row["posttime"]);?><br>
							โดย <?php echo $row["name"];?><br>
							<button type="button" class="btn btn-danger" data-toggle="modal"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;ลบ</span></button>
							<a href="#" class="btn btn-primary btn-outline with-arrow" data-toggle="modal" data-target="#myModal<?php echo $count?>">แก้ไขข่าว<i class="icon-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<?php } ?>