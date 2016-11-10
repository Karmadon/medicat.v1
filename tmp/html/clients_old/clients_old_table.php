<?
$v = (int)$_GET['v'];
function calculate_age($birthday) {
  $birthday_timestamp = strtotime($birthday);
  $age = date('Y') - date('Y', $birthday_timestamp);
  if (date('md', $birthday_timestamp) > date('md')) {
    $age--;
  }
  return $age;
}

require_once('classes/userClass.php');
$userObj = new USER();
$userInfo = $userObj->getUserById($_SESSION['result']['id']);
$manager = $userInfo['result']['id'];

$sqlid = "SELECT groupd_id FROM users WHERE id='$manager'";
$resultid = $conn->query($sqlid);
$rowid = $resultid->fetch_assoc();

$sql = "SELECT * FROM log_client_old WHERE id_for_log=$v";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sqls3 = "SELECT name, lastname FROM users WHERE id=".$row["manager"]."";
$results3 = $conn->query($sqls3);
$rows3 = $results3->fetch_assoc();

$sqls = "SELECT * FROM ce WHERE client=$id";
$results = $conn->query($sqls);
    // output data of each row
	echo '<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Подробная информация о клиенте</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
			  <tr>
                  <th>Статус клиента</th>';
				  $sql_s = "SELECT * FROM sprav_status_user WHERE id=".$row["status"]."";
				  $result_s = $conn->query($sql_s);
			      $row_s = $result_s->fetch_assoc();
				  $voz = calculate_age(''.$row["dob"].'');
				  
				  
				  if ($row["status"]=='1') {
                  echo'<td><span class="btn-success btn-xs">'.$row_s["name"].'</span></td>';
				  }
				  else { echo'<td><span class="btn-danger btn-xs">'.$row_s["name"].'</span></td>';}
               echo' </tr>
				   <tr>
                  <th>Ф.И.О</th>
                  <td>'.$row["fio"].'</td>
                </tr>
				<tr>
                  <th>Дата рождения</th>
                  <td>'.$row["dob"].'</td>
                </tr>
				<tr>
                  <th>Возраст</th>
                  <td>'.$voz.'</td>
                </tr>
				<tr>
                  <th>Пол</th>
                  <td>'.$row["male"].'</td></tr>
                <tr>';
				  $sql_g = "SELECT * FROM sprav_client_group WHERE id=".$row["groups"]."";
				  $result_g = $conn->query($sql_g);
			      $row_g = $result_g->fetch_assoc();
                  echo'<th>Группа клиента</th>';
				  if ($row_g["day_repeat"]=='0') {
				   echo'<td>'.$row_g["name"].'</td>'; 
				  }
				  else {
                  echo'<td>'.$row_g["name"].' '.$row_g["day_repeat"].' дней</td>';
				  }
                echo'</tr>
				<tr>
                  <th>Контактный номер</th>
                  <td>'.$row["number"].'</td>
                </tr>
				<tr>
                  <th>Почта</th>
                  <td>'.$row["email"].'</td>
                </tr>
				<tr>
                  <th>Заметка менеджера</th>
                  <td style="max-width: 70%; word-break: break-all;">'.$row["note"].'</td>
                </tr>
				<tr>
                  <th>Дата регистрации записи</th>
                  <td>'.$row["dorr"].' '.$row["torr"].'</td>
                </tr>';
				if ($rowid["groupd_id"] =='1' || $rowid["groupd_id"] =='101') {
				echo'<tr>
                  <th>Автор записи</th>
                  <td>'.$rows3["name"].' '.$rows3["lastname"].'</td>
                </tr>';
				}
				elseif ($rowid["groupd_id"] =='102')  {}
				else{}
              echo'</table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->';
	  
$conn->close();
?>