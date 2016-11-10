<?
$v = (int)$_GET['v'];
require_once('classes/userClass.php');
$userObj = new USER();
$userInfo = $userObj->getUserById($_SESSION['result']['id']);
$manager = $userInfo['result']['id'];

$sqlid = "SELECT groupd_id FROM users WHERE id='$manager'";
$resultid = $conn->query($sqlid);
$rowid = $resultid->fetch_assoc();


$sql = "SELECT * FROM log_ce_status_old WHERE id_for_log=$v";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sqls3 = "SELECT name, lastname, thirthname FROM users WHERE id=".$row["manager"]."";
$results3 = $conn->query($sqls3);
$rows3 = $results3->fetch_assoc();
    // output data of each row
	echo '<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Подробная информация о статусе записи</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">';
				  if ($row["status"]=='0') {
                  echo '<tr><th>Статус записи изменился</th><td><span class="label label-primary">Записан</span></td></tr>';
				  }
				  elseif ($row["status"]=='1') {
                  echo '<tr><th>Статус записи изменился</th><td><span class="label label-success">Принят</span></td></tr>';
				  }
				  elseif ($row["status"]=='2') {
                  echo '<tr><th>Статус записи изменился</th><td><span class="label label-danger">Отменен</span></td></tr>';
				  }
				   elseif ($row["status"]=='3') {
                  echo '<tr><th>Статус записи изменился</th><td><span class="label label-maroon">Опаздывает</span></td></tr>';
				  }
				  elseif ($row["status"]=='4') {
                  echo '<tr><th>Статус записи изменился</th><td><span class="label label-info">Перенесен</span></td></tr>';
				  echo '
				<tr>
                  <th>Новая дата записи</th>
                  <td>'.$row["date"].'</td>
                </tr>
				<tr>
                  <th>Новое время записи</th>
                  <td>'.$row["time"].'</td>
                </tr>';
				  }
				  else{}
				echo'<tr>
                  <th>Дата регистрации записи</th>
                  <td>'.$row["dorr"].' '.$row["torr"].'</td>
                </tr>';
				if ($rowid["groupd_id"] =='1' || $rowid["groupd_id"] =='101') {
				echo'<tr>
                  <th>Автор записи</th>
                  <td>'.$rows3["lastname"].' '.$rows3["name"].' '.$rows3["thirthname"].'</td>
                </tr>';
				}
				elseif ($rowid["groupd_id"] =='102')  {}
				else{}
              echo'</table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>';
$conn->close();
?>