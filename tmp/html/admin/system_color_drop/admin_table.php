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

echo'<!-- SELECT2 EXAMPLE -->
	  <form role="form" method="POST" action="tmp/html/admin/system_color_drop/drop.php?id='.$id.'">
      <div class="box box-default">
        <div class="box-body">
		<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Внимание!</h4>
                Если Вы удалите элемент, то графики в статистике имеющие текущий элемент, получат статус "Цвет был удален", а графики будут использовать светло-серый цвет.
              </div>
			<div class="box-footer">
                <button type="submit" class="btn btn-primary">Удалить</button>
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