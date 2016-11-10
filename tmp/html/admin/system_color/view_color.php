<?php
$sql = "SELECT * FROM system_config_colorchart";
$result = $conn->query($sql);
    // output data of each row
	
if ($result->num_rows > 0) {
	echo '<div class="row">
        <div class="col-xs-12">
          <div class="box">
		  <div class="box-header">
		  <h3>Цвета</h3>
		  </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>Название цвета</th>
                  <th>Код цвета</th>
				  <th>Действие</th>
                </tr>
                </thead>
                <tbody>';
    while($row = $result->fetch_assoc()) {
		echo '
                <tr>
				  <td>'.$row["name"].'</td>
                  <td>'.$row["hex"].'</td>
				  <td>
				 <a href="admin?type=system_color_edit&id='.$row["id"].'"><span class="label label-success">Редактировать</span></a> <a href="admin?type=system_color_drop&id='.$row["id"].'"><span class="label label-danger">Удалить</span></a>
				 </td>
				  </tr>';
			}
	 echo'
				<tr>
			<td colspan="3">
			<form id="valid_add_group">
			<div style="width:100%;" class="input-group input-group-sm">
			<span class="input-group-btn">
                      <a href="?type=system_color_add" type="submit" class="btn btn-info btn-flat">Добавить</a>
                    </span>
              </div>
			</form>
			</td>
			</tr>
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
}
?>