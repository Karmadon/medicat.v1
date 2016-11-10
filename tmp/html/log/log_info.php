<?
require_once('classes/userClass.php');
$userObj = new USER();
$userInfo = $userObj->getUserById($_SESSION['result']['id']);
$manager = $userInfo['result']['id'];

$sqlid = "SELECT groupd_id FROM users WHERE id='$manager'";
$resultid = $conn->query($sqlid);
$rowid = $resultid->fetch_assoc();

$sql = "SELECT * FROM log_client";
$result = $conn->query($sql);
    // output data of each row
	
if ($result->num_rows > 0) {
	echo '<div class="row">
        <div class="col-xs-12">
          <div class="box">
		  <div class="box-header">
              <h3 class="box-title">Отчет по клиентам</h3>
			  <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
            </div>
            <div class="box-body">
              <table id="example22" class="table table-bordered table-striped display responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
				  <th>ID-действия</th>
                  <th>Тип действия</th>
				  <th>Дата действия</th>
				  <th>Время действия</th>
				  <th>Автор действия</th>
                  <th>Данные о клиенте</th>
				  <th>Действия</th>
                </tr>
                </thead>
                <tbody>';
        while($row = $result->fetch_assoc()) {
		if ($row["type"]=='Создан новый клиент') {
		echo '
                  <tr>
				  <td>№'.$row["id"].'</td>
				  <td>'.$row["type"].'</td>
                  <td>'.$row["dorr"].'</td>
				  <td>'.$row["torr"].'</td>';
				  $sqlman = "SELECT name, lastname, thirthname FROM users WHERE id=".$row["manager"]."";
				  $resultman = $conn->query($sqlman);
				  $rowman = $resultman->fetch_assoc();
				  
				  $sqlclient = "SELECT fio FROM clients WHERE id=".$row["id_client"]."";
				  $resultclient = $conn->query($sqlclient);
				  $rowclient = $resultclient->fetch_assoc();
				  
				  echo'<td>'.$rowman["lastname"].' '.$rowman["name"].' '.$rowman["thirthname"].'</td>
				  <td><span class="small">'.$rowclient["fio"].'</span></td> 
				  <td><a href="clients_info?id='.$row["id_client"].'"><span class="label label-warning">Страница клиента</span></a></td>
				  </tr>';	
		}
		elseif ($row["type"]=='Изменены данные о клиенте') {
			echo '<tr>
				  <td>№'.$row["id"].'</td>
				  <td>'.$row["type"].'</td>
                  <td>'.$row["dorr"].'</td>
				  <td>'.$row["torr"].'</td>';
				  $sqlman = "SELECT name, lastname, thirthname FROM users WHERE id=".$row["manager"]."";
				  $resultman = $conn->query($sqlman);
				  $rowman = $resultman->fetch_assoc();
				  
				  $sqlold = "SELECT id_for_log FROM log_client_old WHERE id_for_log=".$row["id"]."";
				  $resultold = $conn->query($sqlold);
				  $rowold = $resultold->fetch_assoc();
				  
				  $sqlclient = "SELECT fio FROM clients WHERE id=".$row["id_client"]."";
				  $resultclient = $conn->query($sqlclient);
				  $rowclient = $resultclient->fetch_assoc();
				  
				  echo'<td>'.$rowman["lastname"].' '.$rowman["name"].' '.$rowman["thirthname"].'</td>
				  <td><span class="small">'.$rowclient["fio"].'</span></td> 
				  <td><a href="clients_info?id='.$row["id_client"].'"><span class="label label-warning">Страница клиента</span></a> <a href="clients_old?id='.$row["id_client"].'&v='.$rowold["id_for_log"].'"><span class="label label-danger">Предыдущая страница клиента</span></a></td>
				  </tr>';
		}
		else {}
			}
	 echo'
                </tbody>
                <tfoot>
                 <tr>
				   <th>ID-действия</th>
                  <th>Тип действия</th>
				  <th>Дата действия</th>
				  <th>Время действия</th>
				  <th>Автор действия</th>
                  <th>Данные о клиенте</th>
				  <th>Действия</th>
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
          <h3 class="text-red box-title">Записей по клиентам нет</h3>
        </div>
      </div>';
}

$sql = "SELECT * FROM log_calls";
$result = $conn->query($sql);
    // output data of each row
	
if ($result->num_rows > 0) {
	echo '<div class="row">
        <div class="col-xs-12">
          <div class="box">
		  <div class="box-header">
              <h3 class="box-title">Отчет по звонкам</h3>
			  <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
            </div>
            <div class="box-body">
              <table id="example23" class="table table-bordered table-striped display responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
				  <th>ID-действия</th>
				  <th>Дата звонка</th>
				  <th>Время звонка</th>
				  <th>Автор действия</th>
                  <th>Данные о звонившем</th>
				  <th>Действия</th>
                </tr>
                </thead>
                <tbody>';
        while($row = $result->fetch_assoc()) {
	
		echo '
                  <tr>
				  <td>№'.$row["id"].'</td>
                  <td>'.$row["dorr"].'</td>
				  <td>'.$row["torr"].'</td>';
				  $sqlman = "SELECT name, lastname, thirthname FROM users WHERE id=".$row["manager"]."";
				  $resultman = $conn->query($sqlman);
				  $rowman = $resultman->fetch_assoc();
				  
				  $sqlclient = "SELECT fio FROM calls WHERE id=".$row["id_call"]."";
				  $resultclient = $conn->query($sqlclient);
				  $rowclient = $resultclient->fetch_assoc();
				  
				  echo'<td>'.$rowman["lastname"].' '.$rowman["name"].' '.$rowman["thirthname"].'</td>
				  <td><span class="small">'.$rowclient["fio"].'</span></td> 
				  <td><a href="calls_info?id='.$row["id_call"].'"><span class="label label-warning">Страница звонка</span></a></td>
				  </tr>';	
			}
	 echo'
                </tbody>
                <tfoot>
                 <tr>
				  <th>ID-действия</th>
				  <th>Дата звонка</th>
				  <th>Время звонка</th>
				  <th>Автор действия</th>
                  <th>Данные о звонившем</th>
				  <th>Действия</th>
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
          <h3 class="text-red box-title">Записей по звонкам нет</h3>
        </div>
      </div>';
}

$sql = "SELECT * FROM log_ce";
$result = $conn->query($sql);
    // output data of each row
	
if ($result->num_rows > 0) {
	echo '<div class="row">
        <div class="col-xs-12">
          <div class="box">
		  <div class="box-header">
              <h3 class="box-title">Отчет по записям</h3>
			  <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
            </div>
            <div class="box-body">
              <table id="example24" class="table table-bordered table-striped display responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
				  <th>ID-действия</th>
                  <th>Тип действия</th>
				  <th>Дата действия</th>
				  <th>Время действия</th>
				  <th>Автор действия</th>
                  <th>Данные о записи</th>
				  <th>Действия</th>
                </tr>
                </thead>
                <tbody>';
        while($row = $result->fetch_assoc()) {
		if ($row["type"]=='Создана новая запись') {
		echo '
                  <tr>
				  <td>№'.$row["id"].'</td>
				  <td>'.$row["type"].'</td>
                  <td>'.$row["dorr"].'</td>
				  <td>'.$row["torr"].'</td>';
				  $sqlman = "SELECT name, lastname, thirthname FROM users WHERE id=".$row["manager"]."";
				  $resultman = $conn->query($sqlman);
				  $rowman = $resultman->fetch_assoc();
				  
				  $sqltr = "SELECT tr FROM ce WHERE id=".$row["id_ce"]."";
				  $resulttr = $conn->query($sqltr);
				  $rowtr = $resulttr->fetch_assoc();
				  
				  echo'<td>'.$rowman["lastname"].' '.$rowman["name"].' '.$rowman["thirthname"].'</td>
				  <td><span class="small">'.$rowtr["tr"].'</span></td> 
				  <td><a href="ce_info?id='.$row["id_ce"].'"><span class="label label-warning">Страница записи</span></a></td>
				  </tr>';	
		}
		elseif ($row["type"]=='Изменены данные о записи') {
			echo '<tr>
				  <td>№'.$row["id"].'</td>
				  <td>'.$row["type"].'</td>
                  <td>'.$row["dorr"].'</td>
				  <td>'.$row["torr"].'</td>';
				  $sqlman = "SELECT name, lastname, thirthname FROM users WHERE id=".$row["manager"]."";
				  $resultman = $conn->query($sqlman);
				  $rowman = $resultman->fetch_assoc();
				  
				  $sqloldce = "SELECT id_for_log FROM log_ce_old WHERE id_for_log=".$row["id"]."";
				  $resultoldce = $conn->query($sqloldce);
				  $rowoldce = $resultoldce->fetch_assoc();
				  
				  $sqltr = "SELECT tr FROM ce WHERE id=".$row["id_ce"]."";
				  $resulttr = $conn->query($sqltr);
				  $rowtr = $resulttr->fetch_assoc();
				  
				  echo'<td>'.$rowman["lastname"].' '.$rowman["name"].' '.$rowman["thirthname"].'</td>
				  <td><span class="small">'.$rowtr["tr"].'</span></td> 
				  <td><a href="ce_info?id='.$row["id_ce"].'"><span class="label label-warning">Страница записи</span></a> <a href="ce_old?id='.$row["id_ce"].'&v='.$rowoldce["id_for_log"].'"><span class="label label-danger">Предыдущая страница записи</span></a></td>
				  </tr>';
		}
		elseif ($row["type"]=='Изменен статус записи') {
			echo '<tr>
				  <td>№'.$row["id"].'</td>
				  <td>'.$row["type"].'</td>
                  <td>'.$row["dorr"].'</td>
				  <td>'.$row["torr"].'</td>';
				  $sqlman = "SELECT name, lastname, thirthname FROM users WHERE id=".$row["manager"]."";
				  $resultman = $conn->query($sqlman);
				  $rowman = $resultman->fetch_assoc();
				  
				  $sqloldce = "SELECT id_for_log FROM log_ce_status_old WHERE id_for_log=".$row["id"]."";
				  $resultoldce = $conn->query($sqloldce);
				  $rowoldce = $resultoldce->fetch_assoc();
				  
				  $sqltr = "SELECT tr FROM ce WHERE id=".$row["id_ce"]."";
				  $resulttr = $conn->query($sqltr);
				  $rowtr = $resulttr->fetch_assoc();
				  
				  echo'<td>'.$rowman["lastname"].' '.$rowman["name"].' '.$rowman["thirthname"].'</td>
				  <td><span class="small">'.$rowtr["tr"].'</span></td> 
				  <td><a href="ce_info?id='.$row["id_ce"].'"><span class="label label-warning">Страница записи</span></a> <a href="ce_info_status?id='.$row["id_ce"].'&v='.$rowoldce["id_for_log"].'"><span class="label label-primary">Статус записи</span></a> <a href="ce_old?id='.$row["id_ce"].'&v='.$rowoldce["id_for_log"].'"><span class="label label-danger">Предыдущая страница записи</span></a></td>
				  </tr>';
		}
		else {}
			}
	 echo'
                </tbody>
                <tfoot>
                 <tr>
				  <th>ID-действия</th>
                  <th>Тип действия</th>
				  <th>Дата действия</th>
				  <th>Время действия</th>
				  <th>Автор действия</th>
                  <th>Данные о записи</th>
				  <th>Действия</th>
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
          <h3 class="text-red box-title">Записей по заявкам нет</h3>
        </div>
      </div>';
}

$sql = "SELECT * FROM log_repeat";
$result = $conn->query($sql);
    // output data of each row
	
if ($result->num_rows > 0) {
	echo '<div class="row">
        <div class="col-xs-12">
          <div class="box">
		  <div class="box-header">
              <h3 class="box-title">Отчет по группе повтора</h3>
			  <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
            </div>
            <div class="box-body">
              <table id="example25" class="table table-bordered table-striped display responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
				  <th>ID-действия</th>
				  <th>Клиент</th>
                  <th>Тип действия</th>
				  <th>Дата действия</th>
				  <th>Время действия</th>
				  <th>На какой день назначено</th>
				  <th>Статус</th>
				  <th>Автор действия</th>
                </tr>
                </thead>
                <tbody>';
        while($row = $result->fetch_assoc()) {
		if ($row["type"]=='Создано напоминание о повторе') {
		$sql_rep = "SELECT id_client, date_final, status FROM repeat_ce WHERE id=".$row["id_repeat_ce"]."";
		$result_rep = $conn->query($sql_rep);
		$row_rep = $result_rep->fetch_assoc();

		$sql_client = "SELECT fio FROM clients WHERE id='".$row_rep["id_client"]."'";
		$result_client = $conn->query($sql_client);
		$row_client = $result_client->fetch_assoc();
		
		echo '
                  <tr>
				  <td>№'.$row["id"].'</td>
				  <td>'.$row_client["fio"].'</td>
				  <td>'.$row["type"].'</td>
                  <td>'.$row["dorr"].'</td>
				  <td>'.$row["torr"].'</td>
				  <td>'.$row_rep["date_final"].'</td>
				  <td>Создано</td>';
				  echo'<td>'.$row["manager"].'</td>';
				  
		}
		elseif ($row["type"]=='Изменен статус напоминания') {
		$sql_rep = "SELECT id_client, date_final, status FROM repeat_ce WHERE id=".$row["id_repeat_ce"]."";
		$result_rep = $conn->query($sql_rep);
		$row_rep = $result_rep->fetch_assoc();
		
		$sql_client = "SELECT fio FROM clients WHERE id='".$row_rep["id_client"]."'";
		$result_client = $conn->query($sql_client);
		$row_client = $result_client->fetch_assoc();
		
		
		$sqlman = "SELECT name, lastname, thirthname FROM users WHERE id=".$row["manager"]."";
		$resultman = $conn->query($sqlman);
		$rowman = $resultman->fetch_assoc();
				  
		echo '
                  <tr>
				  <td>№'.$row["id"].'</td>
				  <td>'.$row_client["fio"].'</td>
				  <td>'.$row["type"].'</td>
                  <td>'.$row["dorr"].'</td>
				  <td>'.$row["torr"].'</td>
				  <td>'.$row_rep["date_final"].'</td>';
				  if ($row_rep["status"]=='0') {
					  echo '<td>Необработано</td>';
				  }
				  elseif ($row_rep["status"]=='1') {
				  echo '<td>Обработано</td>';
				  }
				  else {echo "<td></td>";}
				  echo'<td>'.$rowman["lastname"].' '.$rowman["name"].' '.$rowman["thirthname"].'</td>';
				  
		}
		else {}
			}
	 echo'
                </tbody>
                <tfoot>
                 <tr>
				  <th>ID-действия</th>
				  <th>Клиент</th>
                  <th>Тип действия</th>
				  <th>Дата действия</th>
				  <th>Время действия</th>
				  <th>На какой день назначено</th>
				  <th>Статус</th>
				  <th>Автор действия</th>
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
          <h3 class="text-red box-title">Записей по заявкам нет</h3>
        </div>
      </div>';
}
?>