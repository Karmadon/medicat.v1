<!-- SELECT2 EXAMPLE -->
	  <form role="form" id="new_call" method="POST" action="tmp/html/admin/system_color_add/new.php">
      <div class="box box-default">
	  <div class="box-header">
              <h3 class="box-title">Новый цвет</h3>
			  <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
			</div>
            </div>
        <div class="box-body">
		   <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Название цвета</label>
                 <input type="text" name="name" autocomplete="off" class="form-control"  placeholder="Название цвета" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
		  
		  <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Код цвета</label>
                 <input type="text" name="hex" autocomplete="off" class="form-control"  placeholder="Код цвета" required>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
         
		  
			<div class="box-footer">
                <button type="submit" class="btn btn-primary">Записать</button>
              </div>
          </div>
      </div>
	  </form>
      <!-- /.box -->