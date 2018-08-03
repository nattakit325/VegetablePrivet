<?php
	session_start();
	include "connect.php";

	$strSQL = "SELECT * FROM login WHERE username = '".$_SESSION['username']."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

	$sql1="SELECT * FROM selllist RIGHT JOIN product ON selllist.productname = product.name WHERE NOT (type='เครื่องมือ' OR type='ปุ๋ย' OR type='ราก' OR type='ลำต้น' OR type='ใบ' OR type='ดอก'  OR type='ผล') AND name like '%{$_POST['itemname']}%' ";
    $query1=mysqli_query($objCon,$sql1);

?>
                    <div class="row">
                        <?php while($row=mysqli_fetch_array($query1,MYSQLI_ASSOC)){ ?>
                            <div class="col-md-4 text-center">
                                <div class="blog-inner">
                                    <a href="detail-product.php?id=<?php echo $row["id"];?>"><img class="img-responsive" src="myfile/<?php echo $row["picture"];?>" alt="Blog"></a>
                                    <div class="desc">
                                        <h3><a href="detail-product.php?id=<?php echo $row["id"];?>"><?php echo $row["name"];?></a></h3>
                                        <p><?php echo $row["detail"];?></p>
                                        <p><a href="detail-product.php?id=<?php echo $row["id"];?>" class="btn btn-primary btn-outline with-arrow">Read More<i class="icon-arrow-right"></i></a></p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
			        </div>