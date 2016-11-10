<?php
require_once('classes/userClass.php');
$userObj = new USER();
$userInfo = $userObj->getUserById($_SESSION['result']['id']);
$manager = $userInfo['result']['id'];

$sqlid = "SELECT groupd_id FROM users WHERE id='$manager'";
$resultid = $conn->query($sqlid);
$rowid = $resultid->fetch_assoc();

if ($rowid["groupd_id"] =='1' || $rowid["groupd_id"] =='101') {
$id = (int)$_GET['id'];
$sql = "SELECT * FROM ce WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

echo'<!-- SELECT2 EXAMPLE -->
	  <form role="form" method="POST" action="tmp/html/ce_edit/edit.php?id='.$id.'">
      <div class="box box-default">
        <div class="box-body">
		  <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>С каким вопросом обратились?</label>';
				
				$sql4 = "SELECT * FROM sprav_wia WHERE id=".$row["wia"]."";
				$result4 = $conn->query($sql4);
				$row4 = $result4->fetch_assoc();
				
				$sqls5 = "SELECT * FROM sprav_wia WHERE id != '0'";
				$results5 = $conn->query($sqls5);

				echo "<select class='form-control select2' style='width: 100%;' name='wia' required>";
				 echo '<option value="'.$row4["id"].'">'.$row4["name"].'</option>';
				 echo "<option disabled='disabled'>Выбрать причину обращения</option>";
				while($rows5 = $results5->fetch_assoc()) {
				echo "<option value=' ".$rows5['id']." '>".$rows5['name']."</option>";
				}
				echo "</select>\n"; 
              echo'</div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		  <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>К какому менеджеру обратились</label>';
               
			    $sql3 = "SELECT id, name, lastname FROM users WHERE id=".$row["twtma"]."";
				$result3 = $conn->query($sql3);
				$row3 = $result3->fetch_assoc();
			   
				$sqls2 = "SELECT * FROM users WHERE groupd_id='102'";
				$results2 = $conn->query($sqls2);
				echo "<select class='form-control select2' style='width: 100%;' name='twtma' required>";
				if ($row3["id"]=='0') {
				echo '<option value="0">Неизвестно</option>';	
				}
				else {
				 echo '<option value="'.$row3["id"].'">'.$row3["name"].' '.$row3["lastname"].'</option>';
				}
				 echo "<option disabled='disabled'>Выбрать менеджера</option>";
				while($rows2 = $results2->fetch_assoc()) {
				echo "<option value=' ".$rows2['id']." '>".$rows2['name']." ".$rows2['lastname']."</option>";
				}
				echo "</select>\n"; 
			
              echo'</div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		  <div class="row">
				<div class="col-md-12">
					 <div class="form-group">
             <label>Заметка менеджера:</label>
                <textarea class="textarea" name="note" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">'.$row["note"].'</textarea> 
            </div>
			 </div>
			</div>
			<div class="box-footer">
                <button type="submit" class="btn btn-primary">Записать</button>
              </div>
          </div>
      </div>
	  </form>
      <!-- /.box -->';
}
else {
echo'<div class="box-body">
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Внимание!</h4>
                Вы не имеете прав доступа, на просмотр этого ресурса.
              </div>
            </div>';
}
?>