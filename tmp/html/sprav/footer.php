<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.3
    </div>
  </footer>



</div>
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="plugins/form-validator/jquery.validate.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script>
 $("#table_client_select").on('change', function(){
	var selected = $(this).val();
	$.get('tmp/html/sprav/jquery_load.php?id_select=' + selected + '', function(data){
    $("#table_client").html(data);
    });
});

$("#table_foas_select").on('change', function(){
	var selected = $(this).val();
	$.get('tmp/html/sprav/jquery_foas_load.php?id_select=' + selected + '', function(data){
    $("#table_foas").html(data);
    });
});


$("#table_phone_select").on('change', function(){
	var selected = $(this).val();
	$.get('tmp/html/sprav/jquery_phone_load.php?id_select=' + selected + '', function(data){
    $("#table_phone").html(data);
    });
});

$("#table_wia_select").on('change', function(){
	var selected = $(this).val();
	$.get('tmp/html/sprav/jquery_wia_load.php?id_select=' + selected + '', function(data){
    $("#table_wia").html(data);
    });
});
 </script>
</body>
</html>