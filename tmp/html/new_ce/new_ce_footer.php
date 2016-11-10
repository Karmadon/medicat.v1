<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.3
    </div>
    
    
  </footer>



</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datetimepicker -->
<script src="plugins/datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script src="plugins/datetimepicker/locale/ru.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Page script -->
<script>
$("#fio_pre").on('change', function(){
	var selected = $(this).val();
	$.get('tmp/html/new_ce/jquery_load.php?id_client=' + selected + '', function(data){
    $("#new_ce").html(data);
	$('#reservationtime').datetimepicker({
                    locale: 'ru',
					format: 'Y-MM-DD HH:mm'
                });
	$(".select2").select2();
	$(".textarea").wysihtml5();
    
		
		$('#twtma').on('change', function(){
      	var select_man = $("#twtma").val();
		if (select_man != "") {
		$('#reservationtime').removeAttr("disabled");
		$('#reservationtime').val("");
		$('#reservationtime').text("");
		}
		}); 
	

		$('#reservationtime').datetimepicker().mouseenter(function() {
		var select_man = $("#twtma").val();
		var selected = $(this).val();
		$.get('tmp/html/new_ce/jquery_timecheck.php?time='+ selected +'&man='+ select_man +'', function(data){
		$("#reservationtime2").html(data);
		});	
		});
	});
});

$("form").submit(function(e) {

    var ref = $(this).find("[required]");

    $(ref).each(function(){
        if ( $(this).val() == '' )
        {
            alert("Поле не может быть пустым.");

            $(this).focus();

            e.preventDefault();
            return false;
        }
    });  return true;
});

 $(function () {
	$(".textarea").wysihtml5();
	$(".select2").select2();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
	$('#reservationtime').datetimepicker({
                    locale: 'ru',
					format: 'Y-m-d'
                });

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  }); 
</script>
</body>
</html>