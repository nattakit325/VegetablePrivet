<?php
	session_start();
	include "connect.php";

	$value=$_GET["value"];

	if($value=='ปัจจัย'){ ?>
	<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" placeholder="กลุ่มผู้ขายปัจจัย" type="text" name="farmer_type_id" value="3" disabled>
								</div>
							</div>

	<?php 

	}else if($value=='เกษตรกร'){
		$sql = "SELECT farmer_type_id as id , farmer_type_name as name from farmer_type";
		$query=mysqli_query($objCon,$sql);
		?>


		<div class="col-md-6">
								<div class="form-group">
									<select class="form-control" name="farmer_type_id" required="">
										<option value="">เลือกกลุ่มเกษตรกร</option>
										 <?php while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){ ?>
										<option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
										<?php } ?>
									</select>
							</div>



	
	<?php 

	}else{
		
		?>


		<div class="col-md-6">
								<div class="form-group">
									<input class="form-control" placeholder="กรุณาเลือกประเภทผู้ใช้งานก่อน" type="text" name="farmer_type_id" disabled>
								</div>
							</div>



	<?php  }?>

