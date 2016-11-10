<?
$cur_date = date("d.m.Y");
require_once('classes/userClass.php');
$userObj = new USER();
$userInfo = $userObj->getUserById($_SESSION['result']['id']);
$manager = $userInfo['result']['id'];

require_once('tmp/html/conn.php');
$sqlid = "SELECT groupd_id FROM users WHERE id='$manager'";
$resultid = $conn->query($sqlid);
$rowid = $resultid->fetch_assoc();
// Вывод таймлайна и задача, для менеджеров и администраторов
if ($rowid["groupd_id"] =='1') {
require_once('view_user.php');
}

else{echo '<div class="box-body">
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Внимание!</h4>
                Вы не имеете прав доступа, на просмотр этого ресурса.
              </div>
            </div>';}
$conn->close()
?>