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
$sql = "SELECT * FROM sprav_client_group WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

echo'<!-- SELECT2 EXAMPLE -->
	  <form role="form" method="POST" action="tmp/html/sprav/drop_foas/drop.php?id='.$id.'">
      <div class="box box-default">
        <div class="box-body">
		<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Внимание!</h4>
                Если Вы удалите элемент, то звонки имеющие текущий элемент в поле "Как о нас узнали?", получат статус "Неизвестно".
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