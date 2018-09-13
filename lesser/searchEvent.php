<?php
	session_start();
	include "connect.php";

	$value=$_GET["p"];



	$sql="SELECT p.name as name,p.picture as picture, s.username as SellerName, p.id as Productid FROM selllist s
			inner join product p
			on s.productid=p.id
			where s.username='$username' and p.name like '%$value%'";


    $query=mysqli_query($objCon,$sql);
    $queryC=mysqli_query($objCon,$sql);



?>
<?php if(mysqli_fetch_array($queryC,MYSQLI_ASSOC)<=0){ ?>
			<center><h3>ไม่มีรายการสินค้าที่ลงขาย</h3></center>
			<?php } ?>

			<div class="row" id="fordelete">

<?php while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){ ?>
				<div class="col-md-4 text-center">
					<div class="work-inner">
						<a class="work-grid" style="background-image: url(uploads_product/<?php echo $row['picture'];?>);">
						</a>
						<div class="desc">
							<h3><a ><?php echo $row["name"];?></a></h3>
							<div class="foo">
							<span> <button type="button" class="btn btn-primary" ><i class="fas fa-pencil-alt"></i>&nbsp;&nbsp;แก้ไข</span>
								<span> <button type="button" class="btn btn-danger" 
									data-toggle="modal" data-target="#forconfermdeleteeach"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;ลบ</span>
								</div>
						</div>
					</div>
				</div>
				
<?php } ?>


			</div>