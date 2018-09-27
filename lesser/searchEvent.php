<?php
	session_start();
	include "connect.php";

	$value=$_GET["value"];




	$sql = "SELECT n.id as id, n.topic as topic, n.detail as detail,n.media as media,n.time as time,n.username as username,p.name_surname as name_surname FROM news n inner join profile p on n.username = p.username WHERE time>='$value' and n.status=0 and time>NOW() order by time";


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
							<p>เวลา <?php echo $row["time"];?></p>
							<p>โดย <?php echo $row["name_surname"];?></p>
							
							<a href="#" class="btn btn-primary btn-outline with-arrow" data-toggle="modal" data-target="#myModal<?php echo $row["id"]?>">ดูรายละเอียด<i class="icon-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>