<?php
require_once('classes/userClass.php');
$userObj = new USER();
$userInfo = $userObj->getUserById($_SESSION['result']['id']);
$manager = $userInfo['result']['id'];

$sqlid = "SELECT groupd_id FROM users WHERE id='$manager'";
$resultid = $conn->query($sqlid);
$rowid = $resultid->fetch_assoc();

if ($rowid["groupd_id"] =='1') {
$id = (int)$_GET['id'];
$sql = "SELECT * FROM sprav_wia WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

echo'<!-- SELECT2 EXAMPLE -->
	  <form role="form" method="POST" action="tmp/html/sprav/edit_wia/edit.php?id='.$id.'">
      <div class="box box-default">
        <div class="box-body">
		<div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Название</label>
                <input type="text" name="name" class="form-control" value="'.$row["name"].'" placeholder="Причина обращения" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->';
		echo'<div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Цвет для графиков</label>
                <select name="background" class="form-control" required>
					<option value="'.$row["color"].'">'.$row["nam_color"].'</option>
                    <option value="">Выбрать цвет</option>';
					$sqls5 = "SELECT * FROM system_config_colorchart";
					$results5 = $conn->query($sqls5);
					while($rows5 = $results5->fetch_assoc()) {
					echo "<option style='background-color: ".$rows5['hex']."' value='".$rows5['hex']."'>".$rows5['name']."</option>";
				}
					
                  echo'</select>
              </div>
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