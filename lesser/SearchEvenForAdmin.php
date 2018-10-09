<?php
	session_start();
	include "connect.php";

	$value=$_GET["value"];




	$sql = "SELECT n.id as id,n.topic as topic, n.detail as detail,n.media as media,n.time as time,n.username as username,p.name_surname as name_surname ,n.PostTime as posttime FROM news n inner join profile p on n.username = p.username where n.status = 0 and time>='$value' order by n.PostTime";


    $query=mysqli_query($objCon,$sql);
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

   




?>

<div class="row">

				<table border="1" class="datatable table table-hover table-bordered" cellspacing="0" width="100%" id='datatable'>
				    <thead>
				        <tr>
				            <th>Topic</th>
				            <th>Status</th>
				            <th>Time</th>
				            <th>PostTime</th>
				            <th>PostName</th>
				            <th>Edit</th>
				            <th>Delete</th>
				        </tr>
				    </thead>
				    <tbody>
				    	<?php while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {?>
							<tr>
					    
					            <td><?php echo $row["topic"];?></td>
					            <?php if(date('Y/m/d',strtotime($row["time"]))<date("Y/m/d")){?>
									<td><center><p style="color: red">หมดเวลา</p></center></td>
								<?php }else{ ?>
									<td><center><p style="color: green">ปกติ</p></center></td>
								<?php  } ?>
					            <?php if(date('Y/m/d',strtotime($row["time"]))<date("Y/m/d")){?>
									<td><p style="color: red">แสดงถึงวันที่ <?php echo DateThai($row["time"]);?></p></td>
								<?php }else{ ?>
									<td><p style="color: green">แสดงถึงวันที่ <?php echo DateThai($row["time"]);?></p></td>
								<?php  } ?>
				            	<td><?php echo DateThai($row["posttime"]);?></td>
				            	<td><?php echo $row["name_surname"];?></td>
				            	<td><a href="EditNews.php?id=<?php echo $row["id"];?>" class="btn btn-primary btn-outline with-arrow" target="blank"> แก้ไขข่าว<i class="icon-arrow-right"></i></a></td>
				            	<td><button type="button" class="btn btn-danger" data-toggle="modal"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;ลบ</span></button></td>
				        </tr>
						<?php }?>
				        
				    </tbody>
				</table>

			</div>