<!-- SELECT2 EXAMPLE -->
	  <form role="form" method="POST" action="tmp/html/new_call/new.php">
      <div class="box box-default">
        <div class="box-body">
		<div class="row hidden">
            <div class="col-md-12">
               <!-- Date and time range -->
              <div class="form-group">
                <label>Дата и время звонка:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
				  <?php
				  $torr = date("H:i");
				  $dorr = date("Y-m-d");
				  ?>
                  <input type="text" name="date" class="form-control pull-right"  value="<?echo "$dorr";?>">
				  <input type="text" name="time" class="form-control pull-right"  value="<?echo "$torr";?>">
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
                <label>Как о нас узнали?</label>
                <?php
				$sqls2 = "SELECT * FROM sprav_foas WHERE id != '0'";
				$results2 = $conn->query($sqls2);
				echo "<select id='foas' class='form-control select2' style='width: 100%;' name='foas' required>";
				echo " <option value=''>Выбрать</option>";
				while($rows2 = $results2->fetch_assoc()) {
				echo "<option value=' ".$rows2['id']." '>".$rows2['name']."</option>";
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
                <label>На какой телефон позвонили?</label>
                 <?php
				$sqls3 = "SELECT * FROM sprav_phone WHERE id != '0'";
				$results3 = $conn->query($sqls3);
				echo "<select class='form-control select2' style='width: 100%;' name='oapc' required>";
				echo '<option value="">Выбрать телефон</option>';
				while($rows3 = $results3->fetch_assoc()) {
				echo "<option value=' ".$rows3['id']." '>".$rows3['name']."</option>";
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
                <label>С каким вопросом обратились?</label>
                <?php
				$sqls4 = "SELECT * FROM sprav_wia WHERE id != '0'";
				$results4 = $conn->query($sqls4);
				echo "<select class='form-control select2' style='width: 100%;' name='wia' required>";
				echo '<option value="">Выбрать причину обращения</option>';
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
                <label>Фамилия</label>
                <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Фамилия" maxlength="20">
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
                <input type="text" id="name" name="name" class="form-control" placeholder="Имя" maxlength="20">
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
                <input type="text" id="thirthname" name="thirthname" class="form-control" maxlength="20" placeholder="Отчество">
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
					<option value="">Выбрать пол</option>
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
                <label>Телефон обратившегося</label>
                <input name="number" id="phone" type="text" class="form-control" maxlength="10" placeholder="Телефон звонившего (вводить без кода города и знаков разделения)">
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
	  </form>
      <!-- /.box -->