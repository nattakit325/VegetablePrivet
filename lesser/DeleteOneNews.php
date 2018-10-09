<?php
$id = $_GET['id'];
$picture = $_GET['picture'];
?>




        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><p class="modal-title">ต้องการหยุดประชาสัมพันธ์ดังกล่าวหรือไม่</p></center>
        </div>
        <div class="modal-body">
          <center>
            
						
  <br>
<form action="CondeleteNews.php" method="POST">
	<input type="hidden" name="NewsID" value="<?php echo $id ?>">
  <input type="hidden" name="picture" value="<?php echo $picture ?>">
	<button type="submit" class="btn btn-warning" ><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;ต้องการ</button>

  
  <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
  </form>
        </center>
          
        </div>
        
          
        
    