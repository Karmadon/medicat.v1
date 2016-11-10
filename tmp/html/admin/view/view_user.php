<?php
$sql = "SELECT * FROM users WHERE id != '1' AND status = '1'";
$result = $conn->query($sql);
    // output data of each row
	
if ($result->num_rows > 0) {
	echo '<div class="row">
        <div class="col-xs-12">
          <div class="box">
		  <div class="box-header">
		  <h3>Активные пользователи</h3>
		  </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>ID пользователя</th>
                  <th>Логин в системе</th>
                  <th>Имя</th>
				  <th>Фамилия</th>
				  <th>Группа</th>
				  <th>Действие</th>
                </tr>
                </thead>
                <tbody>';
    while($row = $result->fetch_assoc()) {
		echo '
                <tr>
				  <td>№'.$row["id"].'</td>
				  <td>'.$row["username"].'</td>
                  <td>'.$row["name"].'</td>
				  <td>'.$row["lastname"].'</td>';
				  $sqls3 = "SELECT * FROM sprav_user_group WHERE g_id=".$row['groupd_id']."";
				  $results3 = $conn->query($sqls3);
				  $rows3 = $results3->fetch_assoc();
                  echo'<td>'.$rows3["name"].'</td>
				  <td>
				  <a href="admin?type=edit_user&id='.$row["id"].'"><span class="label label-success">Редактировать</span></a> <a href="admin?type=drop_user&id='.$row["id"].'"><span class="label label-danger">Удалить</span></a> <a href="admin?type=disable_user&id='.$row["id"].'"><span class="label label-primary">Отключить</span></a>
				 </td>
				  </tr>';
			}
	 echo'
                </tbody>
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
          <h3 class="text-red box-title">Активных пользователей нет</h3>
        </div>
      </div>';
}



$sql = "SELECT * FROM users WHERE id != '1' AND status = '0'";
$result = $conn->query($sql);
    // output data of each row
	
if ($result->num_rows > 0) {
	echo '<div class="row">
        <div class="col-xs-12">
          <div class="box">
		  <div class="box-header">
		  <h3>Отключенные пользователи</h3>
		  </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>ID пользователя</th>
                  <th>Логин в системе</th>
                  <th>Имя</th>
				  <th>Фамилия</th>
				  <th>Группа</th>
				  <th>Действие</th>
                </tr>
                </thead>
                <tbody>';
    while($row = $result->fetch_assoc()) {
		echo '
                <tr>
				  <td>№'.$row["id"].'</td>
				  <td>'.$row["username"].'</td>
                  <td>'.$row["name"].'</td>
				  <td>'.$row["lastname"].'</td>';
				  $sqls3 = "SELECT * FROM sprav_user_group WHERE g_id=".$row['groupd_id']."";
				  $results3 = $conn->query($sqls3);
				  $rows3 = $results3->fetch_assoc();
                  echo'<td>'.$rows3["name"].'</td>
				  <td>
				  <div class="btn-group">
                  <button type="button" class="btn btn-default">Действие</button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                   <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
				  <li><a href="admin?type=edit_user&id='.$row["id"].'">Редактировать</a></li>
				  <li><a href="admin?type=drop_user&id='.$row["id"].'">Удалить</a></li>
				  <li><a href="admin?type=enable_user&id='.$row["id"].'">Включить</a></li>
                  </ul>
                 </div>
				 </td>
				  </tr>';
			}
	 echo'
                </tbody>
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
          <h3 class="text-red box-title">Отключенных пользователей нет</h3>
        </div>
      </div>';
}
?>