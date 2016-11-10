<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.3
    </div>  
</footer>
</div>
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/datepicker/locales/bootstrap-datepicker.ru.js"></script>
<script src="plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="plugins/fullcalendar/ru.js"></script>
<script>
$("#week_ce").click(function(){
	var selected_ce = $(this).text();
	$.get('tmp/html/main/jquery_ce.php?date_ce='+ selected_ce +'', function(data){
		$("#date_ce").html(data);
    });
});
$("#month_ce").click(function(){
	var selected_ce = $(this).text();
	$.get('tmp/html/main/jquery_ce.php?date_ce='+ selected_ce +'', function(data){
		$("#date_ce").html(data);
    });
});
$("#today_ce").click(function(){
	var selected_ce = $(this).text();
	$.get('tmp/html/main/jquery_ce.php?date_ce='+ selected_ce +'', function(data){
		$("#date_ce").html(data);
    });
});
$(".datev_ce").on('change', function(){
	var selected_ce = $(this).val();
	$.get('tmp/html/main/jquery_ce.php?date_ce='+ selected_ce +'', function(data){
		$("#date_ce").html(data);
    });
});
$("#week").click(function(){
	var selected = $(this).text();
	$.get('tmp/html/main/jquery_call.php?date='+ selected +'', function(data){
		$("#date_sel").html(data);
    });
});
$("#month").click(function(){
	var selected = $(this).text();
	$.get('tmp/html/main/jquery_call.php?date='+ selected +'', function(data){
		$("#date_sel").html(data);
    });
});
$("#today").click(function(){
	var selected = $(this).text();
	$.get('tmp/html/main/jquery_call.php?date='+ selected +'', function(data){
		$("#date_sel").html(data);
    });
});
$(".datev").on('change', function(){
	var selected = $(this).val();
	$.get('tmp/html/main/jquery_call.php?date='+ selected +'', function(data){
		$("#date_sel").html(data);
    });
});
$('#datepicker').datepicker({
	language: 'ru',
	autoclose: true,
	format: 'yyyy-mm-dd',
});
$(function () {
	function ini_events(ele) {
		ele.each(function () {
			var eventObject = {
				title: $.trim($(this).text())
			};
			$(this).data('eventObject', eventObject);
		});
    }
    ini_events($('#external-events div.external-event'));
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
    $('#calendar').fullCalendar({
		defaultView: 'agendaDay',
		businessHours: {
			start: '09:00',
			end:   '19:00'
		},
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
        },

	    lang: 'ru',
	    axisFormat: 'HH:mm',

timeFormat: {
    agenda: 'H:mm'
},
	    firstDay: '1',
        buttonText: {
			today: 'Сегодня',
			month: 'Месяц',
			week: 'Неделя',
			day: 'День'
		},	  
		events: [	  
	  <?php
	  $sqlid = "SELECT groupd_id FROM users WHERE id='$manager'";
	  $resultid = $conn->query($sqlid);
	  $rowid = $resultid->fetch_assoc();
	  if ($rowid["groupd_id"] =='101') {
	  get_event(); # Делаем запрос к БД, на вывод персональной информации о задачах
	  }
	  elseif ($rowid["groupd_id"] =='1' || $rowid["groupd_id"] =='102'){
	  get_event_all(); # Делаем запрос к БД, на вывод информации о задачах для пользователей и админа
	  }
	  get_repeat(); # Делаем запрос к БД, на вывод группы повтора	  
	  ?>
	    ],
		eventRender: function(event, element) {
		element.find('.fc-title').append("<div>" + event.description + "</div>");
        },
		contentHeight: 'auto',
		eventLimit: true, 
		views: {
        agenda: {
			eventLimit: 2,
            slotMinutes:'1',
			slotEventOverlap: true,
			slotDuration:'00:10:00',
			minTime:'09:00',
			maxTime:'19:00',
			displayEventEnd: true
        },
        day: {
            slotMinutes:'1'
        }
    },
		editable: false,
		draggable: false,
		droppable: false,
		drop: function (date, allDay) {
			var originalEventObject = $(this).data('eventObject');
			var copiedEventObject = $.extend({}, originalEventObject);
			copiedEventObject.start = date;
			copiedEventObject.allDay = allDay;
			copiedEventObject.backgroundColor = $(this).css("background-color");
			copiedEventObject.borderColor = $(this).css("border-color");
			$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
			if ($('#drop-remove').is(':checked')) {
				$(this).remove();
			}
		}
	});
    var currColor = "#3c8dbc";
    var colorChooser = $("#color-chooser-btn");
    $("#color-chooser > li > a").click(function (e) {
		e.preventDefault();
		currColor = $(this).css("color");
		$('#add-new-event').css({"background-color": currColor, "border-color": currColor});
    });
    $("#add-new-event").click(function (e) {
		e.preventDefault();
		var val = $("#new-event").val();
		if (val.length == 0) {
			return;
		}
		var event = $("<div />");
		event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
		event.html(val);
		$('#external-events').prepend(event);
		ini_events(event);
		$("#new-event").val("");
    });
	 $(".fc-title big a.btn-danger h4.txt-white").find("i.fa_edit").addClass("glyphicon glyphicon-edit");
	 $(".fc-title").addClass("small");
	 $(".fc-title big a.btn-danger h4.txt-white").find("i.fa_info").addClass("glyphicon glyphicon-info-sign");
	 
	 $(".fc-prev-button").on('click', function() {
	 $(".fc-title big a.btn-danger h4.txt-white").find("i.fa_edit").addClass("glyphicon glyphicon-edit");
	 $(".fc-title big a.btn-danger h4.txt-white").find("i.fa_info").addClass("glyphicon glyphicon-info-sign");
	 });
	  $(".fc-next-button").on('click', function() {
	 $(".fc-title big a.btn-danger h4.txt-white").find("i.fa_edit").addClass("glyphicon glyphicon-edit");
	 $(".fc-title big a.btn-danger h4.txt-white").find("i.fa_info").addClass("glyphicon glyphicon-info-sign");
	 });
	  $(".fc-today-button").on('click', function() {
	 $(".fc-title big a.btn-danger h4.txt-white").find("i.fa_edit").addClass("glyphicon glyphicon-edit");
	 $(".fc-title big a.btn-danger h4.txt-white").find("i.fa_info").addClass("glyphicon glyphicon-info-sign");
	 });
	   $(".fc-month-button").on('click', function() {
	 $(".fc-title big a.btn-danger h4.txt-white").find("i.fa_edit").addClass("glyphicon glyphicon-edit");
	 $(".fc-title big a.btn-danger h4.txt-white").find("i.fa_info").addClass("glyphicon glyphicon-info-sign");
	 });
	 $(".fc-agendaWeek-button").on('click', function() {
	 $(".fc-title big a.btn-danger h4.txt-white").find("i.fa_edit").addClass("glyphicon glyphicon-edit");
	 $(".fc-title big a.btn-danger h4.txt-white").find("i.fa_info").addClass("glyphicon glyphicon-info-sign");
	 });
	 $(".fc-agendaDay-button").on('click', function() {
	 $(".fc-title big a.btn-danger h4.txt-white").find("i.fa_edit").addClass("glyphicon glyphicon-edit");
	 $(".fc-title big a.btn-danger h4.txt-white").find("i.fa_info").addClass("glyphicon glyphicon-info-sign");
	 });
	  });
</script>
</body>
</html>