<?php
require_once('classes/userClass.php');
$userObj = new USER();
$userInfo = $userObj->getUserById($_SESSION['result']['id']);
$manager = $userInfo['result']['id'];

$sqlid = "SELECT groupd_id FROM users WHERE id='$manager'";
$resultid = $conn->query($sqlid);
$rowid = $resultid->fetch_assoc();

if ($rowid["groupd_id"] =='1' || $rowid["groupd_id"] =='101') {
$id = (int)$_GET['id'];
$sql = "SELECT * FROM clients WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$str_fio = explode(' ', $row["fio"]);

echo'<!-- SELECT2 EXAMPLE -->
	  <form role="form" method="POST" action="tmp/html/clients_edit/edit.php?id='.$id.'">
      <div class="box box-default">
        <div class="box-body">
		<div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Фамилия</label>
                <input type="text" id="lastname" name="lastname" class="form-control" value="'.$str_fio[0].'" placeholder="Фамилия клиента" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		  <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Имя</label>
                <input type="text" id="name" name="name" class="form-control" value="'.$str_fio[1].'" placeholder="Имя клиента" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		  <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Отчество</label>
                <input type="text" id="thirthname" name="thirthname" class="form-control" value="'.$str_fio[2].'" placeholder="Отчество клиента">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		  <div class="row">
            <div class="col-md-12">
              <div class="form-group">
			    <label>Группа</label>';

				$sql2 = "SELECT id,name,day_repeat FROM sprav_client_group WHERE id='".$row["groups"]."'";
				$result2 = $conn->query($sql2);
				$row2 = $result2->fetch_assoc();
				
				$sqls = "SELECT * FROM sprav_client_group WHERE id !='0'";
				$results = $conn->query($sqls);
				echo "<select class='form-control select2' style='width: 100%;' name='groups' required>";
				
				if ($row2["day_repeat"]=='0') {
				 echo '<option value="'.$row2["id"].'">'.$row2["name"].'</option>';
				}
				else {echo '<option value="'.$row2["id"].'">'.$row2["name"].' '.$row2["day_repeat"].' дней</option>';}
				 echo "<option disabled='disabled'>Выбрать группу</option>";
				while($rows = $results->fetch_assoc()) {
				if ($rows['day_repeat']=='0') {
				echo "<option value=' ".$rows['id']." '>".$rows['name']."</option>";
				}
				else {echo "<option value=' ".$rows['id']." '>".$rows['name']." ".$rows['day_repeat']." дней</option>";}
				}
				echo "</select>\n"; 

              echo'</div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		  <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Телефон</label>
                <input type="text" id="phone" name="number" class="form-control" value="'.$row["number"].'" placeholder="Телефон клиента (вводить без кода города и знаков разделения)" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		  <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Электронная почта</label>
                <input type="text" id="UserEmail" name="email" class="form-control" value="'.$row["email"].'" placeholder="Почта клиента">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		  <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Номер обращения</label>
                <input type="text" name="tr" class="form-control" value="'.$row["tr"].'"  placeholder="Номер обращения">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		   <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Пол</label>';
				
				echo '<select class="form-control select2" style="width: 100%;" name="male" required>
				<option value="'.$row["male"].'">'.$row["male"].'</option>
				<option disabled="disabled">Выбрать пол</option>
				    <option>Мужской</option>
                    <option>Женский</option>
					</select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		  <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Дата рождения</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="dob" value="'.$row["dob"].'" class="form-control pull-right" id="datepicker" required>
                </div>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
        
		  <div class="row">
				<div class="col-md-12">
					 <div class="form-group">
             <label>Заметка:</label>
                <textarea class="textarea" name="note" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">'.$row["note"].'</textarea> 
            </div>
			 </div>
			</div>
			<div class="box-footer">
                <button type="submit" class="btn btn-primary">Записать</button>
              </div>
          </div>
      </div>
	  </form>
      <!-- /.box -->';
}
else {
echo'<div class="box-body">
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Внимание!</h4>
                Вы не имеете прав доступа, на просмотр этого ресурса.
              </div>
            </div>';
}
?>