<?
require_once('classes/userClass.php');
$userObj = new USER();
$userInfo = $userObj->getUserById($_SESSION['result']['id']);
$manager = $userInfo['result']['id'];

$sqlid = "SELECT groupd_id FROM users WHERE id='$manager'";
$resultid = $conn->query($sqlid);
$rowid = $resultid->fetch_assoc();

$sql = "SELECT * FROM calls WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
    // output data of each row
	echo '<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Подробная информация о звонке</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                  <th>№ обращения</th>
                  <td>'.$row["tr"].'</td>
                </tr>
				<tr>
                  <th>Ф.И.О. звонившего</th>
                  <td>'.$row["fio"].'</td>
                </tr>
				<tr>
                  <th>Пол</th>
                  <td>'.$row["male"].'</td>
                </tr>
				<tr>
                  <th>Номер звонившего</th>
                  <td>'.$row["number"].'</td>
                </tr>
				<tr>
                   <th>Дата звонка</th>
                  <td>'.$row["date"].'</td>
                </tr>
				<tr>
                  <th>Время звонка</th>
                  <td>'.$row["time"].'</td>
                </tr>
				<tr>
                  <th>Как о нас узнали</th>';
				  $sql4 = "SELECT * FROM sprav_foas WHERE id=".$row["foas"]."";
				  $result4 = $conn->query($sql4);
				  $row4 = $result4->fetch_assoc();
                  echo'<td>'.$row4["name"].'</td>
                </tr>
				<tr>
                  <th>На какой телефон звонили</th>';
				  $sql5 = "SELECT * FROM sprav_phone WHERE id=".$row["oapc"]."";
				  $result5 = $conn->query($sql5);
				  $row5 = $result5->fetch_assoc();
                  echo'<td>'.$row5["name"].'</td>
                </tr>
				<tr>
                  <th>С каким вопросом обратились</th>';
				  $sql6 = "SELECT * FROM sprav_wia WHERE id=".$row["wia"]."";
				  $result6 = $conn->query($sql6);
				  $row6 = $result6->fetch_assoc();
                   echo'<td>'.$row6["name"].'</td>
                </tr>
				<tr>
                  <th>Заметка менеджера</th>
                  <td style="max-width: 70%; word-break: break-all;">'.$row["note"].'</td>
                </tr>
				<tr>
                  <th>Дата регистрации записи</th>
                  <td>'.$row["dorr"].' '.$row["torr"].'</td>
                </tr>
				<tr>';
				if ($rowid["groupd_id"] =='1' || $rowid["groupd_id"] =='101') {
				$sqls3 = "SELECT name, lastname FROM users WHERE id=".$row["manager"]."";
				$results3 = $conn->query($sqls3);
				$rows3 = $results3->fetch_assoc();
				echo'<tr>
                  <th>Автор записи</th>
                  <td>'.$rows3["name"].' '.$rows3["lastname"].'</td>
                </tr>';
				}
				elseif ($rowid["groupd_id"] =='102')  {}
				else{}
                echo'</tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>';
$conn->close();
?>