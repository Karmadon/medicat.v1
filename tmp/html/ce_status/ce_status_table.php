<?php
require_once('classes/userClass.php');
$userObj = new USER();
$userInfo = $userObj->getUserById($_SESSION['result']['id']);
$manager = $userInfo['result']['id'];

$sqlid = "SELECT groupd_id FROM users WHERE id='$manager'";
$resultid = $conn->query($sqlid);
$rowid = $resultid->fetch_assoc();

$id = (int)$_GET['id'];
$sql = "SELECT * FROM sprav_status_ce";
$result = $conn->query($sql);

$sql_pre = "SELECT * FROM ce WHERE id='$id'";
$result_pre = $conn->query($sql_pre);
$row_pre = $result_pre->fetch_assoc();

echo'<!-- SELECT2 EXAMPLE -->
	  <form role="form" method="POST" action="tmp/html/ce_status/edit.php?id='.$id.'">
      <div class="box box-default">
        <div class="box-body">
		  <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Выбрать статус</label>';
				
				 echo "<select id='statuschange' class='form-control select2' style='width: 100%;' name='status'>";
				 if ($row_pre["status"]=='0') {
				 echo '<option value="'.$row_pre["status"].'">Записан</option>';
				 }
				 elseif ($row_pre["status"]=='1') {
				 echo '<option value="'.$row_pre["status"].'">Принят</option>';	 
				 }
				 elseif ($row_pre["status"]=='2') {
				 echo '<option value="'.$row_pre["status"].'">Отменен</option>';	 
				 }
				 elseif ($row_pre["status"]=='3') {
				 echo '<option value="'.$row_pre["status"].'">Опаздывает</option>';	 
				 }
				 elseif ($row_pre["status"]=='4') {
				 echo '<option value="'.$row_pre["status"].'">Перезаписан</option>';	 
				 }
				 echo "<option disabled='disabled'>Выбрать статус</option>";
				 while($row = $result->fetch_assoc()) {
				 echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
				}
				echo "</select>\n"; 
              echo'</div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		  <div id="timechange" class="row">
	      </div>
          <!-- /.row -->
			<div class="box-footer">
                <button type="submit" class="btn btn-primary">Записать</button>
              </div>
          </div>
      </div>
	  </form>
      <!-- /.box -->';
?>