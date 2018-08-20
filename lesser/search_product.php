<?php
	session_start();
	include "connect.php";

	$value=$_GET["value"];
	$type=$_GET["type"];



	$sql="SELECT p.name as name,p.picture as picture, s.username as SellerName, p.id as Productid FROM selllist s
			inner join product p
			on s.productid=p.id
			where p.category='$type' and p.name like '%$value%'";


    $query=mysqli_query($objCon,$sql);
    $queryC=mysqli_query($objCon,$sql);

?>


           <div class="row">
				<div class="fh5co-heading">
					<?php if(mysqli_fetch_array($queryC,MYSQLI_ASSOC)<=0){?>
						<center><h2>ไม่มีรายการในประเภทสินค้าดังกล่าว</h2> </center>
					<?php }else{ ?>
					<h2>แนะนำ</h2> 
				<?php }?>
				</div>
            </div>
			<div class="row">
				<div class="col-md-12">
                    <div class="row">
                    <?php while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){ ?>
                         <div class="col-md-4 text-center">
					<div class="work-inner">
						<a href="ProductDetail.php?SellerName=<?php echo $row["SellerName"];?>&Productid=<?php echo $row["Productid"];?>" class="work-grid" style="background-image: url(uploads_product/<?php echo $row["picture"];?>);">
						</a>
						<div class="desc">
							<h3><a href="ProductDetail.php?SellerName=<?php echo $row["SellerName"];?>&Productid=<?php echo $row["Productid"];?>"><?php echo $row["name"];?></a></h3>
							<span>ห่างจากคุณ 14 กิโลเมตร</span>
							<br>
							 <p><a href="ProductDetail.php?SellerName=<?php echo $row["SellerName"];?>&Productid=<?php echo $row["Productid"];?>" class="btn btn-primary btn-outline with-arrow">ดูรายละเอียด<i class="icon-arrow-right"></i></a></p>
						</div>
					</div>
				</div>
				    <?php } ?>
			        </div>
				</div>
			</div>
		
