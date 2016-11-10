<!-- SELECT2 EXAMPLE -->
	  <form role="form" method="POST" action="tmp/html/sprav/add_phone/new.php">
      <div class="box box-default">
        <div class="box-body">
		  <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Название</label>
                <input type="text" name="name" id="phone" class="form-control" placeholder="Контактный телефон" required>
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
			<div class="box-footer">
                <button type="submit" class="btn btn-primary">Записать</button>
              </div>
          </div>
      </div>
	  </form>
      <!-- /.box -->