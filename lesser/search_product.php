<?php
	session_start();
	include "connect.php";

	$value=$_GET["value"];
	$type=$_GET["type"];



	$sql="SELECT d.name as name,d.detail as detail ,d.picture as picture FROM product d
			inner join gcategory g 
			on d.category = g.name
			where d.category='$type' and d.name like '%$value%'";


    $query=mysqli_query($objCon,$sql);
    $queryC=mysqli_query($objCon,$sql);

?>

           <div class="row">
				<div class="fh5co-heading">
					<?php if(mysqli_fetch_array($queryC,MYSQLI_ASSOC)<=0){?>
						<center><h2>ไม่รายการในประเภทสินค้าดังกล่าว</h2> </center>
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
                            <div class="blog-inner">
                                <a href="detail-product.php?id=<?php echo $row["id"];?>"><img class="img-responsive" src="images/<?php echo $row["picture"];?>" alt="Blog"></a>
                                <div class="desc">
                                    <h3><a href="#"><?php echo $row["name"];?></a></h3>
                                    <p><?php echo $row["detail"];?></p>
                                    <p><a href="detail-list.php?id=<?php echo $row["id"];?>" class="btn btn-primary btn-outline with-arrow">ดูรายละเอียด<i class="icon-arrow-right"></i></a></p>
                                </div>
                            </div>
                        </div>
				    <?php } ?>
			        </div>
				</div>
			</div>
		
