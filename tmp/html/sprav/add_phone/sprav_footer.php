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
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
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
</script>
</body>
</html>