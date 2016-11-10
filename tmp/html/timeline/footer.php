<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<b>Version</b> 2.3.3
	</div>
</footer>
</div>
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/pages/dashboard2.js"></script>
<script src="dist/js/demo.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/datepicker/locales/bootstrap-datepicker.ru.js"></script>
<script>
$("#week").click(function(){
	var selected = $(this).text();
	$.get('tmp/html/timeline/jquery_call.php?date='+ selected +'', function(data){
		$("#date_sel").html(data);
    });
});
$("#month").click(function(){
	var selected = $(this).text();
	$.get('tmp/html/timeline/jquery_call.php?date='+ selected +'', function(data){
		$("#date_sel").html(data);
    });
});
$("#today").click(function(){
	var selected = $(this).text();
	$.get('tmp/html/timeline/jquery_call.php?date='+ selected +'', function(data){
		$("#date_sel").html(data);
    });
});
$(".datev").on('change', function(){
	var selected = $(this).val();
	$.get('tmp/html/timeline/jquery_call.php?date='+ selected +'', function(data){
		$("#date_sel").html(data);
    });
});
$("#week_ce").click(function(){
	var selected_ce = $(this).text();
	$.get('tmp/html/timeline/jquery_ce.php?date_ce='+ selected_ce +'', function(data){
		$("#date_ce").html(data);
    });
});
$("#month_ce").click(function(){
	var selected_ce = $(this).text();
	$.get('tmp/html/timeline/jquery_ce.php?date_ce='+ selected_ce +'', function(data){
		$("#date_ce").html(data);
    });
});
$("#today_ce").click(function(){
	var selected_ce = $(this).text();
	$.get('tmp/html/timeline/jquery_ce.php?date_ce='+ selected_ce +'', function(data){
		$("#date_ce").html(data);
    });
});
$(".datev_ce").on('change', function(){
	var selected_ce = $(this).val();
	$.get('tmp/html/timeline/jquery_ce.php?date_ce='+ selected_ce +'', function(data){
		$("#date_ce").html(data);
    });
});
$("#week_client").click(function(){
	var selected_client = $(this).text();
	$.get('tmp/html/timeline/jquery_client.php?date_client='+ selected_client +'', function(data){
		$("#date_client").html(data);
    });
});
$("#month_client").click(function(){
	var selected_client = $(this).text();
	$.get('tmp/html/timeline/jquery_client.php?date_client='+ selected_client +'', function(data){
		$("#date_client").html(data);
    });
});
$("#today_client").click(function(){
	var selected_client = $(this).text();
	$.get('tmp/html/timeline/jquery_client.php?date_client='+ selected_client +'', function(data){
		$("#date_client").html(data);
    });
});
$(".datev_client").on('change', function(){
	var selected_client = $(this).val();
	$.get('tmp/html/timeline/jquery_client.php?date_client='+ selected_client +'', function(data){
		$("#date_client").html(data);
    });
});
$('#datepicker').datepicker({
	language: 'ru',
	autoclose: true,
	format: 'yyyy-mm-dd',
});
$('#datepicker_ce').datepicker({
	language: 'ru',
	autoclose: true,
	format: 'yyyy-mm-dd',
});
$('#datepicker_client').datepicker({
	language: 'ru',
	autoclose: true,
	format: 'yyyy-mm-dd',
});
</script>
</body>
</html>