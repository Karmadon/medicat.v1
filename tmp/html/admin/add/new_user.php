<!-- SELECT2 EXAMPLE -->
	  <form role="form" id="new_call" method="POST" action="tmp/html/admin/add/reg.php?type=signup">
      <div class="box box-default">
	  <div class="box-header">
              <h3 class="box-title">Новый пользователь</h3>
			  <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
            </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Тип пользователя</label>
                <?php
				$sqls2 = "SELECT * FROM sprav_user_group";
				$results2 = $conn->query($sqls2);
				echo "<select id='groupd_id' class='form-control select2' style='width: 100%;' name='groupd_id' required>";
				echo " <option value=''>Выбрать</option>";
				while($rows2 = $results2->fetch_assoc()) {
				echo "<option value=' ".$rows2['g_id']." '>".$rows2['name']."</option>";
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
                <label>Логин пользователя</label>
                 <input type="text" name="username" autocomplete="off" class="form-control" placeholder="Логин пользователя" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		  <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Фамилия пользователя</label>
                 <input type="text" name="lastname" autocomplete="off" class="form-control" id="lastname" placeholder="Фамилия пользователя" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		   <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Имя пользователя</label>
                 <input type="text" name="name" autocomplete="off" class="form-control" id="name" placeholder="Имя пользователя" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		   <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Отчество пользователя</label>
                 <input type="text" name="thirthname" autocomplete="off" class="form-control" id="thirthname" placeholder="Отчество пользователя" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		   <?
		  echo'<div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Цвет для графиков</label>
                <select name="background" class="form-control" required>
                    <option value="">Выбрать цвет</option>';
					$sqls5 = "SELECT * FROM system_config_colorchart";
					$results5 = $conn->query($sqls5);
					while($rows5 = $results5->fetch_assoc()) {
					echo "<option style='background-color: ".$rows5['hex']."' value='".$rows5['hex']."'>".$rows5['name']."</option>";
				}
					
                  echo'</select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->';
		  ?>
		   <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Пароль</label>
                 <input type="password" autocomplete="off" name="password" class="form-control" placeholder="Пароль" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		  
			<div class="box-footer">
                <button type="submit" class="btn btn-primary">Записать</button>
              </div>
          </div>
      </div>
	  </form>
      <!-- /.box -->