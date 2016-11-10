<?php
require_once('classes/userClass.php');
$userObj = new USER();
$userInfo = $userObj->getUserById($_SESSION['result']['id']);
$manager = $userInfo['result']['id'];

$sqlid = "SELECT groupd_id FROM users WHERE id='$manager'";
$resultid = $conn->query($sqlid);
$rowid = $resultid->fetch_assoc();

$id = (int)$_GET['id'];
$sql = "SELECT * FROM repeat_ce WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

echo'<!-- SELECT2 EXAMPLE -->
	  <form role="form" method="POST" action="tmp/html/repeat_status/edit.php?id='.$id.'">
      <div class="box box-default">
        <div class="box-body">
		  <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Выбрать статус</label>';
				
				 echo "<select class='form-control select2' style='width: 100%;' name='status'>";
				 if ($row["status"]=='0') {
				 echo '<option value="'.$row["status"].'">Необработан</option>';
				 }
				 elseif ($row["status"]=='1') {
				 echo '<option value="'.$row["status"].'">Обработан</option>';	 
				 }
				 echo "<option disabled='disabled'>Выбрать статус</option>";
				 echo '<option value="0">Необработан</option>';
				 echo '<option value="1">Обработан</option>';

				echo "</select>\n"; 
              echo'</div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
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