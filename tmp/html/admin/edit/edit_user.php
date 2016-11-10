<!-- SELECT2 EXAMPLE -->
	  <? $get_id = (int)$_GET['id']; ?>
	  
	  <form role="form" id="new_call" method="POST" action="tmp/html/admin/edit/edit.php?id_user=<?=$get_id;?>">
      <div class="box box-default">
	  <div class="box-header">
			 <?php
				$sqls1 = "SELECT * FROM users WHERE id='$get_id'";
				$results1 = $conn->query($sqls1);
				$rows1 = $results1->fetch_assoc();	
				
              echo"<h3 class='box-title'>Пользователь: ".$rows1['name']." ".$rows1['lastname']."</h3>";?>
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
				
				$sqls3 = "SELECT * FROM sprav_user_group WHERE g_id=".$rows1['groupd_id']."";
				$results3 = $conn->query($sqls3);
				$rows3 = $results3->fetch_assoc();
				
				echo "<select id='groupd_id' class='form-control select2' style='width: 100%;' name='groupd_id' required>";
				echo " <option value='".$rows1['groupd_id']."'>".$rows3['name']."</option>";
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
                 <input type="text" name="username" autocomplete="off" class="form-control" value="<?=$rows1['username']?>" placeholder="Логин пользователя" required>
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
                 <input type="text" id="lastname" name="lastname" autocomplete="off" class="form-control" value="<?=$rows1['lastname']?>" placeholder="Фамилия пользователя" required>
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
                 <input type="text" id="name" name="name" autocomplete="off" class="form-control" value="<?=$rows1['name']?>" placeholder="Имя пользователя" required>
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
                 <input type="text" id="thirthname" name="thirthname" autocomplete="off" class="form-control" value="<?=$rows1['thirthname']?>" placeholder="Отчество пользователя" required>
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
					<option value="'.$rows1["color"].'">'.$rows1["nam_color"].'</option>
                    <option value="">Выбрать цвет</option>';
					$sqls5 = "SELECT * FROM system_config_colorchart";
					$results5 = $conn->query($sqls5);
					while($rows5 = $results5->fetch_assoc()) {
					echo "<option style='background-color: ".$rows5['hex']."' value='".$rows5['hex']."'>".$rows5['name']."</option>";
				}
					
                  echo'</select>';?>
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