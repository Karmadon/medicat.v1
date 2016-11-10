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
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Page script -->
<script>
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

$(document).ready(function() { 
 
    $('.btn-primary').click(function() {  
 
        $(".error").hide();
        var hasError = false;
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
 
        var emailaddressVal = $("#UserEmail").val();
        if(emailaddressVal == '') {
            hasError = false;
        }
 
        else if(!emailReg.test(emailaddressVal)) {
            alert("Введите валидный emai");
            hasError = true;
        }
 
        if(hasError == true) { return false; }
 
    });
});

$('#name').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^а-яА-Я]/g,'') ); }
);

$('#lastname').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^а-яА-Я]/g,'') ); }
);

$('#thirthname').bind('keyup blur',function(){ 
    var node = $(this);
    node.val(node.val().replace(/[^а-яА-Я]/g,'') ); }
);

$('#email').blur(function() {
    var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
});

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#phone").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        alert("В этом поле должны быть только цифры");
               return false;
    }
   });
   
   $('#phone').keyup( function() {
        var $this = $(this);
        if($this.val().length > 10)
        $this.val($this.val().substr(0, 10));
    });
     });
  $(function () {
	$(".textarea").wysihtml5();
	$(".select2").select2();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
	$('#reservationtime').datetimepicker({
                    locale: 'ru'
                });

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
	  format: 'yyyy-mm-dd'
    });


    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
</body>
</html>