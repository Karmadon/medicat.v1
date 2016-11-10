<?
$v = (int)$_GET['v'];

require_once('classes/userClass.php');
$userObj = new USER();
$userInfo = $userObj->getUserById($_SESSION['result']['id']);
$manager = $userInfo['result']['id'];

$sqlid = "SELECT groupd_id FROM users WHERE id='$manager'";
$resultid = $conn->query($sqlid);
$rowid = $resultid->fetch_assoc();


$sql = "SELECT * FROM log_ce_old WHERE id_for_log=$v";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sqls = "SELECT groups,fio,id FROM clients WHERE id=".$row["client"]."";
$results = $conn->query($sqls);
$rows = $results->fetch_assoc();

$sqls2 = "SELECT name, lastname, thirthname FROM users WHERE id=".$row["twtma"]."";
$results2 = $conn->query($sqls2);
$rows2 = $results2->fetch_assoc();

$sqls3 = "SELECT name, lastname, thirthname FROM users WHERE id=".$row["manager"]."";
$results3 = $conn->query($sqls3);
$rows3 = $results3->fetch_assoc();
    // output data of each row
	echo '<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Подробная информация о записи</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Статус записи</th>';
				  if ($row["status"]=='0') {
				
                  echo '<td><span class="label label-primary">Записан</span></td>';
				  }
				  elseif ($row["status"]=='1') {
                  echo '<td><span class="label label-success">Принят</span></td>';
				  }
				  elseif ($row["status"]=='2') {
                  echo '<td><span class="label label-danger">Отменен</span></td>';
				  }
				   elseif ($row["status"]=='3') {
                  echo '<td><span class="label label-maroon">Опаздывает</span></td>';
				  }
				  elseif ($row["status"]=='4') {
                  echo '<td><span class="label label-info">Перенесен</span></td>';
				  }
				  else{}
				echo '</tr>
				<tr>
                  <th>№ обращения</th>
                  <td>'.$row["tr"].'</td>
                </tr>
				<tr>
                  <th>Ф.И.О. Клиента</th>
                  <td>'.$rows["fio"].' <br /> <a id="clients_info" href="clients_info?id='.$rows["id"].'"><span class="label label-warning">Подробнее</span></a></td>
                </tr>
				<tr>';
				  $sql_g = "SELECT * FROM sprav_client_group WHERE id=".$rows["groups"]."";
				  $result_g = $conn->query($sql_g);
			      $row_g = $result_g->fetch_assoc();
                  echo'<th>Группа клиента</th>
                  <td>'.$row_g["name"].'</td>
                </tr>
				<tr>
                  <th>Дата записи</th>
                  <td>'.$row["date"].'</td>
                </tr>
				<tr>
                  <th>Время записи</th>
                  <td>'.$row["time"].'</td>
                </tr>
				<tr>
                  <th>Причина обращения</th>';
				  $sql4 = "SELECT * FROM sprav_wia WHERE id=".$row["wia"]."";
				  $result4 = $conn->query($sql4);
				  $row4 = $result4->fetch_assoc();
				
                  echo'<td>'.$row4["name"].'</td>
                </tr>
				<tr>
                  <th>Запись произведена к менеджеру</th>';
				  if ($row["twtma"]=='0') {
				  echo '<td>Неизвестно</td>';  
				  }
				  else{
                  echo'<td>'.$rows2["lastname"].' '.$rows2["name"].' '.$rows2["thirthname"].'</td>';
				  }
                echo'</tr>
				<tr>
                  <th>Заметка менеджера</th>
                  <td>'.$row["note"].'</td>
                </tr>
				<tr>
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