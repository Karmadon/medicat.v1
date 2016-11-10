<!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-body">
		<? 
		$type = $_GET['add'];
		if(empty($type) || !isset($type)) {}
		else if($type == 'error') {
		echo'<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Внимание!</h4>
                Клиент уже записан на эту дату к менеджеру
              </div>';	
		}
?>
		  <div class="row">
            <div class="col-md-12">
              <div class="form-group">
			    <label>Ф.И.О.</label>
			    <?php
				require_once('tmp/html/conn.php');
				$sqls = "SELECT * FROM clients";
				$results = $conn->query($sqls);
				echo "<select id='fio_pre' class='form-control select2' style='width: 100%;' name='client'>";
				 echo " <option selected='selected'>Выберите клиента из базы</option>";
				while($rows = $results->fetch_assoc()) {
				echo "<option value=' ".$rows['id']." '>".$rows['fio']."</option>";
				}
				echo "</select>\n"; 
				?>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          </div>
      </div>
	  <form id="new_ce" role="form" method="POST" action="tmp/html/new_ce/new.php">
	  </form>
      <!-- /.box -->