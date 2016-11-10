<?php
session_start();
$get_id = (int)$_GET['id_client'];
require_once('../conn.php');

$sql = "SELECT * FROM clients WHERE id=$get_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


echo'<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="text-red box-title">Краткая информация о клиенте</h3>
			  <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                  <th>Ф.И.О</th>
                  <td>'.$row["fio"].'</td>
                </tr>
				<tr>
                  <th>Пол</th>
                  <td>'.$row["male"].'</td>
                </tr>
				<tr>
                  <th>Дата рождения</th>
                  <td>'.$row["dob"].'</td>
                </tr>
				<tr>
                  <th>Контактный номер</th>
                  <td>'.$row["number"].'</td>
                </tr>
				<tr>
                  <th>Почта</th>
                  <td>'.$row["email"].'</td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
		  </div>
		  </div>
          <!-- /.box -->';
?>
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h4 class="text-green box-title">Добавить запись</h4>
		 <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
	 </div>
        <div class="box-body">
		 <div class="row hidden">
            <div class="col-md-12">
               <!-- Date and time range -->
              <div class="form-group">
                <label>Клиент:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="text" name="client" class="form-control pull-right" value="<?php echo $get_id;?>">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		   <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>К какому менеджеру обратились</label>
                <?php
				$sqls2 = "SELECT * FROM users WHERE groupd_id='101' AND status='1'";
				$results2 = $conn->query($sqls2);
				echo "<select class='form-control select2' style='width: 100%;' id='twtma' name='twtma' required>";
				echo " <option value='' selected='selected'>Выбрать менеджера</option>";
				while($rows2 = $results2->fetch_assoc()) {
				echo "<option value=' ".$rows2['id']." '>".$rows2['lastname']." ".$rows2['name']." ".$rows2['thirthname']."</option>";
				}
				echo "</select>\n"; 
				?>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		  <div class="row">
            <div class="col-md-12">
               <!-- Date and time range -->
              <div class="form-group">
                <label>Дата и время записи:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="text" name="datetime" class="form-control pull-right" id="reservationtime" disabled="disabled" value="" required> 
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		   <div class="row">
            <div class="col-md-12">
               <!-- Date and time range -->
              <div class="form-group">
                <label><span class="text-red" id="reservationtime2"></span></label>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		  <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>С каким вопросом обратились?</label>
                <?php
				$sqls4 = "SELECT * FROM sprav_wia WHERE id != '0'";
				$results4 = $conn->query($sqls4);
				echo "<select class='form-control select2' style='width: 100%;' name='wia' required>";
				echo " <option value='' selected='selected'>Выбрать причину обращения</option>";
				while($rows4 = $results4->fetch_assoc()) {
				echo "<option value=' ".$rows4['id']." '>".$rows4['name']."</option>";
				}
				echo "</select>\n"; 
				?>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		  <div class="row">
				<div class="col-md-12">
					 <div class="form-group">
             <label>Заметка менеджера:</label>
                <textarea class="textarea" name="note" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> 
            </div>
			 </div>
			</div>
			<div class="box-footer">
                <button type="submit" class="btn btn-primary">Записать</button>
              </div>
          </div>
      </div>
	  </div>
	  </div>
	  
<?php
$sqls = "SELECT * FROM ce WHERE client=$get_id ORDER BY id DESC";
$results = $conn->query($sqls);
if ($results->num_rows > 0) {
		echo'
		<div class="box">
			<div class="box-header">
              <h3 class="text-red box-title">Предыдущие обращения клиента</h3>
			  <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
            </div>
			<!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
				<tr>
                  <th>№ обращения</th>
                  <th>Дата записи</th>
				  <th>Время записи</th>
				  <th>К какому менеджеру</th>
                </tr>';
    while($rows = $results->fetch_assoc()) {
		$sqls2 = "SELECT name, lastname FROM users WHERE id=".$rows["twtma"]."";
		$results2 = $conn->query($sqls2);
		$rows2 = $results2->fetch_assoc();
		
		echo '
                <tr>
				  <td>№'.$rows["tr"].'</td>
				  <td>'.$rows["date"].'</td>
                  <td>'.$rows["time"].'</td>
				  <td>'.$rows2["name"].' '.$rows2["lastname"].'</td></tr>';
			}
	 echo'
                </tbody>
              </table>
             </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>';
	
} else {
echo'<div class="box-body">
              <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> У клиента еще небыло записей</h4>
              </div>
            </div>';
}	 
?>