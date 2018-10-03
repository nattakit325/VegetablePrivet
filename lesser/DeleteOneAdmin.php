<?php
$id = $_GET['id'];
$name = $_GET['name'];
$picture = $_GET['picture'];
$type = $_GET['type'];
?>




        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><p class="modal-title">ต้องการยกเลิกบัญชีของ <?php echo $name ?>&nbsp;&nbsp;<br> หรือไม่</p></center>
        </div>
        <div class="modal-body">
          <center>
            
						
  <br>
<form action="CondeleteAdmin.php" method="POST">
	<input type="hidden" name="AdminID" value="<?php echo $id ?>">
  <input type="hidden" name="picture" value="<?php echo $picture ?>">
  <input type="hidden" name="type" value="<?php echo $type ?>">
	<button type="submit" class="btn btn-warning" ><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;ต้องการ</button>

  
  <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
  </form>
        </center>
          
        </div>
        
          
        
    