<!-- SELECT2 EXAMPLE -->
<div id="new_ce">
	  </div>
	  <form role="form" id="new_client" method="POST" action="tmp/html/new_client/new.php">
      <div class="box box-default">
        <div class="box-body">
		<? 
		$type = $_GET['add'];
		if(empty($type) || !isset($type)) {}
		else if($type == 'error') {
		echo'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Внимание!</h4>
                Клиент с такими данными уже есть в базе данных
              </div>';	
		}
?>
		  <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Фамилия</label>
                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Фамилия клиента" maxlength="20" required>
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
                <input type="text" name="name" id="name" class="form-control" placeholder="Имя клиента" maxlength="20" required>
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
                <input type="text" name="thirthname" id="thirthname" class="form-control" maxlength="20" placeholder="Отчество клиента">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		  <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Группа</label>
                <?php
				$sqls2 = "SELECT * FROM sprav_client_group WHERE id != '0'";
				$results2 = $conn->query($sqls2);
				echo "<select id='groups' class='form-control select2' style='width: 100%;' name='groups' required>";
				echo " <option value=''>Выбрать группу</option>";
				while($rows2 = $results2->fetch_assoc()) {
				if ($rows2['day_repeat']=='0') {	
				echo "<option value=' ".$rows2['id']." '>".$rows2['name']."</option>";
				}
				else {echo "<option value=' ".$rows2['id']." '>".$rows2['name']." ".$rows2['day_repeat']." дней</option>";}
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
                <label>Телефон</label>
                <input name="number" id="phone" type="text" class="form-control" maxlength="10" placeholder="Телефон клиента (вводить без кода города и знаков разделения)" required>
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
                <input name="email" id="UserEmail" type="text" class="form-control" maxlength="30" placeholder="Почта клиента">
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
                <input type="text" name="tr" class="form-control" maxlength="20" placeholder="Номер обращения">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		  <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Пол</label>
                <select name="male" class="form-control" required>
                    <option value=''>Выбрать пол</option>
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
                  <input type="text" name="dob" class="form-control pull-right" id="datepicker" required>
                </div>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		  <div class="row">
				<div class="col-md-12">
					 <div class="form-group">
             <label>Заметка:</label>
                <textarea class="textarea" name="note" placeholder="Заметка" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea> 
            </div>
			 </div>
			</div>
			<div class="box-footer">
                <button type="submit" class="btn btn-primary">Записать</button> <a href="#" id="tt11">Записать</a>
              </div>
          </div>
      </div>
	  </form>
      <!-- /.box -->