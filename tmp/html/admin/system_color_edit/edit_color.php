<!-- SELECT2 EXAMPLE -->
	  <? $get_id = (int)$_GET['id']; ?>
	   <?php
				$sqls1 = "SELECT * FROM system_config_colorchart WHERE id='$get_id'";
				$results1 = $conn->query($sqls1);
				$rows1 = $results1->fetch_assoc();	?>
	  <form role="form" id="new_call" method="POST" action="tmp/html/admin/system_color_edit/edit.php?id_color=<?=$get_id;?>">
      <div class="box box-default">
	  <div class="box-header">
			  <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
            </div>
        <div class="box-body">
		   <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Имя цвета</label>
                 <input type="text" name="name" autocomplete="off" class="form-control" value="<?=$rows1['name']?>" placeholder="Имя цвета" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
		 <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Код цвета</label>
                 <input type="text" id="hex" name="hex" autocomplete="off" class="form-control" value="<?=$rows1['hex']?>" placeholder="Код цвета" required>
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