<?
require_once('classes/userClass.php');
$userObj = new USER();
$userInfo = $userObj->getUserById($_SESSION['result']['id']);
$manager = $userInfo['result']['id'];

$sqlid = "SELECT groupd_id FROM users WHERE id='$manager'";
$resultid = $conn->query($sqlid);
$rowid = $resultid->fetch_assoc();

$sql = "SELECT * FROM clients ORDER BY id DESC";
$result = $conn->query($sql);
    // output data of each row
	
if ($result->num_rows > 0) {
	echo '<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped display responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
				  <th>ID-клиента</th>
                  <th>Ф.И.О.</th>
                  <th>Телефон</th>
				  <th>Группа</th>
				  <th>Дата регистрации</th>
				  <th>Действие</th>
                </tr>
                </thead>
                <tbody>';
    while($row = $result->fetch_assoc()) {
		echo '
                <tr>
				  <td>№'.$row["id"].'</td>
				  <td>'.$row["fio"].'</td>
                  <td>'.$row["number"].'</td>';
				  $sqls3 = "SELECT * FROM sprav_client_group WHERE id=".$row['groups']."";
				  $results3 = $conn->query($sqls3);
				  $rows3 = $results3->fetch_assoc();
				  if ($rows3["day_repeat"]=='0') {
				  echo'<td>'.$rows3["name"].'</td>';  
				  }
				  else {echo'<td>'.$rows3["name"].' '.$rows3["day_repeat"].' дней</td>';}
                  
				  echo'<td>'.$row["dorr"].'</td>  
				  <td>
                  <a href="clients_info?id='.$row["id"].'"><span class="label label-warning">Подробнее</span></a>';
				  if ($rowid["groupd_id"] =='1' || $rowid["groupd_id"] =='101') {
				  echo' <a href="clients_edit?id='.$row["id"].'"><span class="label label-success">Редактировать</span></a>';
				  }
				  else {}
                  echo'
				 </td>
				  </tr>';
			}
	 echo'
                </tbody>
                <tfoot>
                 <tr>
				  <th>ID-клиента</th>
                  <th>Ф.И.О.</th>
                  <th>Телефон</th>
				  <th>Группа</th>
				  <th>Дата регистрации</th>
				  <th>Действие</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->';		
	
} else {
	echo '<div class="box">
        <div class="box-header with-border">
          <h3 class="text-red box-title">Записей нет</h3>
        </div>
      </div>';
}
$conn->close();
?>