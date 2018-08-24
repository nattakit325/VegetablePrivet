<?php
$id = $_GET['id'];
$name = $_GET['name'];

?>




        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><p class="modal-title">ต้องการลบ <?php echo $name ?> หรือไม่</p></center>
        </div>
        <div class="modal-body">
          <center>
            
						
  <br>
<form action="Condelete.php" method="POST">
	<input type="hidden" name="ProductID" value="<?php echo $id ?>">
	<button type="submit" class="btn btn-warning" ><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;ต้องการ</button>

  
  <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
  </form>
        </center>
          
        </div>
        
          
        
    