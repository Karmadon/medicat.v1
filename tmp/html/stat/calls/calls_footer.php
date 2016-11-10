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
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/datepicker/locales/bootstrap-datepicker.ru.js"></script>
<!-- page script -->

<script>
$("#select_stat").click(function(){
	var selected_first = $(".date_f").val();
	var selected_second = $(".date_e").val();
	$.get('tmp/html/stat/calls/jquery.php?date_f='+ selected_first +'&date_e='+ selected_second +'', function(data){
		$("#load_stat").html(data);
    });
});

$('#datepicker1').datepicker({
	language: 'ru',
	autoclose: true,
	format: 'yyyy-mm-dd',
});

$('#datepicker2').datepicker({
	language: 'ru',
	autoclose: true,
	format: 'yyyy-mm-dd',
});

$(function () {
/* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);

    var areaChartData = {
      labels: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Декабрь"],
      datasets: [
        {
          label: "Звонки",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $jan; ?>, <?php echo $feb; ?>, <?php echo $mar; ?>, <?php echo $apr; ?>, <?php echo $may; ?>, <?php echo $jun; ?>, <?php echo $jul; ?>, <?php echo $aug; ?>, <?php echo $sep; ?>, <?php echo $oct; ?>, <?php echo $nov; ?>, <?php echo $dec; ?>]
        }
      ]
    };
	
	 var areaChartData2 = {
      labels: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Декабрь"],
      datasets: [
        
        <?php
$foas_f = "SELECT count(*), foas FROM calls GROUP BY foas HAVING count(*) >= 1 ORDER BY count(*)";
$result_f_foas = $conn->query($foas_f);
while($row_f_foas = $result_f_foas->fetch_assoc()) {
$year="2016";

$jan_start_line ="01-01";
$jan_end_line="01-31";
$sql_jan_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE foas=".$row_f_foas["foas"]." AND `date` >= '".$year."-".$jan_start_line."' AND `date` <= '".$year."-".$jan_end_line."'";
$result_jan_line = $conn->query($sql_jan_line);
$row_jan_line = $result_jan_line->fetch_assoc();

$feb_start_line ="02-01";
$feb_end_line="02-29";
$sql_feb_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE foas=".$row_f_foas["foas"]." AND `date` >= '".$year."-".$feb_start_line."' AND `date` <= '".$year."-".$feb_end_line."'";
$result_feb_line = $conn->query($sql_feb_line);
$row_feb_line = $result_feb_line->fetch_assoc();

$mar_start_line ="03-01";
$mar_end_line="03-31";
$sql_mar_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE foas=".$row_f_foas["foas"]." AND `date` >= '".$year."-".$mar_start_line."' AND `date` <= '".$year."-".$mar_end_line."'";
$result_mar_line = $conn->query($sql_mar_line);
$row_mar_line = $result_mar_line->fetch_assoc();

$apr_start_line ="04-01";
$apr_end_line="04-30";
$sql_apr_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE foas=".$row_f_foas["foas"]." AND `date` >= '".$year."-".$apr_start_line."' AND `date` <= '".$year."-".$apr_end_line."'";
$result_apr_line = $conn->query($sql_apr_line);
$row_apr_line = $result_apr_line->fetch_assoc();

$may_start_line ="05-01";
$may_end_line="05-31";
$sql_may_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE foas=".$row_f_foas["foas"]." AND `date` >= '".$year."-".$may_start_line."' AND `date` <= '".$year."-".$may_end_line."'";
$result_may_line = $conn->query($sql_may_line);
$row_may_line = $result_may_line->fetch_assoc();

$jun_start_line ="06-01";
$jun_end_line="06-30";
$sql_jun_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE foas=".$row_f_foas["foas"]." AND `date` >= '".$year."-".$jun_start_line."' AND `date` <= '".$year."-".$jun_end_line."'";
$result_jun_line = $conn->query($sql_jun_line);
$row_jun_line = $result_jun_line->fetch_assoc();

$jul_start_line ="07-01";
$jul_end_line="07-31";
$sql_jul_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE foas=".$row_f_foas["foas"]." AND `date` >= '".$year."-".$jul_start_line."' AND `date` <= '".$year."-".$jul_end_line."'";
$result_jul_line = $conn->query($sql_jul_line);
$row_jul_line = $result_jul_line->fetch_assoc();

$aug_start_line ="08-01";
$aug_end_line="08-31";
$sql_aug_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE foas=".$row_f_foas["foas"]." AND `date` >= '".$year."-".$aug_start_line."' AND `date` <= '".$year."-".$aug_end_line."'";
$result_aug_line = $conn->query($sql_aug_line);
$row_aug_line = $result_aug_line->fetch_assoc();

$sep_start_line ="09-01";
$sep_end_line="09-30";
$sql_sep_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE foas=".$row_f_foas["foas"]." AND `date` >= '".$year."-".$sep_start_line."' AND `date` <= '".$year."-".$sep_end_line."'";
$result_sep_line = $conn->query($sql_sep_line);
$row_sep_line = $result_sep_line->fetch_assoc();

$oct_start_line ="10-01";
$oct_end_line="10-31";
$sql_oct_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE foas=".$row_f_foas["foas"]." AND `date` >= '".$year."-".$oct_start_line."' AND `date` <= '".$year."-".$oct_end_line."'";
$result_oct_line = $conn->query($sql_oct_line);
$row_oct_line = $result_oct_line->fetch_assoc();

$nov_start_line ="11-01";
$nov_end_line="11-30";
$sql_nov_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE foas=".$row_f_foas["foas"]." AND `date` >= '".$year."-".$nov_start_line."' AND `date` <= '".$year."-".$nov_end_line."'";
$result_nov_line = $conn->query($sql_nov_line);
$row_nov_line = $result_nov_line->fetch_assoc();

$dec_start_line ="12-01";
$dec_end_line="12-31";
$sql_dec_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE foas=".$row_f_foas["foas"]." AND `date` >= '".$year."-".$dec_start_line."' AND `date` <= '".$year."-".$dec_end_line."'";
$result_dec_line = $conn->query($sql_dec_line);
$row_dec_line = $result_dec_line->fetch_assoc();
	
$sql44 = "SELECT * FROM sprav_foas WHERE id=".$row_f_foas["foas"]."";
$result44 = $conn->query($sql44);
$row44 = $result44->fetch_assoc();

echo'{
label: "'.$row44["name"].'",
fillColor: "'.$row44["color"].'",
pointColor:"'.$row44["color"].'",
strokeColor:"'.$row44["color"].'",
pointHighlightFill:"#fff",
data: ["'.$row_jan_line["id"].'", "'.$row_feb_line["id"].'", "'.$row_mar_line["id"].'", "'.$row_apr_line["id"].'", "'.$row_may_line["id"].'", "'.$row_jun_line["id"].'", "'.$row_jul_line["id"].'", "'.$row_aug_line["id"].'", "'.$row_sep_line["id"].'", "'.$row_oct_line["id"].'", "'.$row_nov_line["id"].'", "'.$row_dec_line["id"].'"]
},';
}



?>
		
      ]
    };

var areaChartData3 = {
      labels: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Декабрь"],
      datasets: [
        
        <?php
$oapc_f = "SELECT count(*), oapc FROM calls GROUP BY oapc HAVING count(*) >= 1 ORDER BY count(*)";
$result_f_oapc = $conn->query($oapc_f);
while($row_f_oapc = $result_f_oapc->fetch_assoc()) {
$year="2016";

$jan_start_line ="01-01";
$jan_end_line="01-31";
$sql_jan_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE oapc=".$row_f_oapc["oapc"]." AND `date` >= '".$year."-".$jan_start_line."' AND `date` <= '".$year."-".$jan_end_line."'";
$result_jan_line = $conn->query($sql_jan_line);
$row_jan_line = $result_jan_line->fetch_assoc();

$feb_start_line ="02-01";
$feb_end_line="02-29";
$sql_feb_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE oapc=".$row_f_oapc["oapc"]." AND `date` >= '".$year."-".$feb_start_line."' AND `date` <= '".$year."-".$feb_end_line."'";
$result_feb_line = $conn->query($sql_feb_line);
$row_feb_line = $result_feb_line->fetch_assoc();

$mar_start_line ="03-01";
$mar_end_line="03-31";
$sql_mar_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE oapc=".$row_f_oapc["oapc"]." AND `date` >= '".$year."-".$mar_start_line."' AND `date` <= '".$year."-".$mar_end_line."'";
$result_mar_line = $conn->query($sql_mar_line);
$row_mar_line = $result_mar_line->fetch_assoc();

$apr_start_line ="04-01";
$apr_end_line="04-30";
$sql_apr_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE oapc=".$row_f_oapc["oapc"]." AND `date` >= '".$year."-".$apr_start_line."' AND `date` <= '".$year."-".$apr_end_line."'";
$result_apr_line = $conn->query($sql_apr_line);
$row_apr_line = $result_apr_line->fetch_assoc();

$may_start_line ="05-01";
$may_end_line="05-31";
$sql_may_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE oapc=".$row_f_oapc["oapc"]." AND `date` >= '".$year."-".$may_start_line."' AND `date` <= '".$year."-".$may_end_line."'";
$result_may_line = $conn->query($sql_may_line);
$row_may_line = $result_may_line->fetch_assoc();

$jun_start_line ="06-01";
$jun_end_line="06-30";
$sql_jun_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE oapc=".$row_f_oapc["oapc"]." AND `date` >= '".$year."-".$jun_start_line."' AND `date` <= '".$year."-".$jun_end_line."'";
$result_jun_line = $conn->query($sql_jun_line);
$row_jun_line = $result_jun_line->fetch_assoc();

$jul_start_line ="07-01";
$jul_end_line="07-31";
$sql_jul_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE oapc=".$row_f_oapc["oapc"]." AND `date` >= '".$year."-".$jul_start_line."' AND `date` <= '".$year."-".$jul_end_line."'";
$result_jul_line = $conn->query($sql_jul_line);
$row_jul_line = $result_jul_line->fetch_assoc();

$aug_start_line ="08-01";
$aug_end_line="08-31";
$sql_aug_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE oapc=".$row_f_oapc["oapc"]." AND `date` >= '".$year."-".$aug_start_line."' AND `date` <= '".$year."-".$aug_end_line."'";
$result_aug_line = $conn->query($sql_aug_line);
$row_aug_line = $result_aug_line->fetch_assoc();

$sep_start_line ="09-01";
$sep_end_line="09-30";
$sql_sep_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE oapc=".$row_f_oapc["oapc"]." AND `date` >= '".$year."-".$sep_start_line."' AND `date` <= '".$year."-".$sep_end_line."'";
$result_sep_line = $conn->query($sql_sep_line);
$row_sep_line = $result_sep_line->fetch_assoc();

$oct_start_line ="10-01";
$oct_end_line="10-31";
$sql_oct_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE oapc=".$row_f_oapc["oapc"]." AND `date` >= '".$year."-".$oct_start_line."' AND `date` <= '".$year."-".$oct_end_line."'";
$result_oct_line = $conn->query($sql_oct_line);
$row_oct_line = $result_oct_line->fetch_assoc();

$nov_start_line ="11-01";
$nov_end_line="11-30";
$sql_nov_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE oapc=".$row_f_oapc["oapc"]." AND `date` >= '".$year."-".$nov_start_line."' AND `date` <= '".$year."-".$nov_end_line."'";
$result_nov_line = $conn->query($sql_nov_line);
$row_nov_line = $result_nov_line->fetch_assoc();

$dec_start_line ="12-01";
$dec_end_line="12-31";
$sql_dec_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE oapc=".$row_f_oapc["oapc"]." AND `date` >= '".$year."-".$dec_start_line."' AND `date` <= '".$year."-".$dec_end_line."'";
$result_dec_line = $conn->query($sql_dec_line);
$row_dec_line = $result_dec_line->fetch_assoc();
	
$sql55 = "SELECT * FROM sprav_phone WHERE id=".$row_f_oapc["oapc"]."";
$result55 = $conn->query($sql55);
$row55 = $result55->fetch_assoc();

echo'{
label: "'.$row55["name"].'",
fillColor: "'.$row55["color"].'",
pointColor:"'.$row55["color"].'",
strokeColor:"'.$row55["color"].'",
pointHighlightFill:"#fff",
data: ["'.$row_jan_line["id"].'", "'.$row_feb_line["id"].'", "'.$row_mar_line["id"].'", "'.$row_apr_line["id"].'", "'.$row_may_line["id"].'", "'.$row_jun_line["id"].'", "'.$row_jul_line["id"].'", "'.$row_aug_line["id"].'", "'.$row_sep_line["id"].'", "'.$row_oct_line["id"].'", "'.$row_nov_line["id"].'", "'.$row_dec_line["id"].'"]
},';
}



?>
		
      ]
    };

var areaChartData4 = {
      labels: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Декабрь"],
      datasets: [
        
        <?php
$wia_f = "SELECT count(*), wia FROM calls GROUP BY wia HAVING count(*) >= 1 ORDER BY count(*)";
$result_f_wia = $conn->query($wia_f);
while($row_f_wia = $result_f_wia->fetch_assoc()) {
$year="2016";

$jan_start_line ="01-01";
$jan_end_line="01-31";
$sql_jan_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE wia=".$row_f_wia["wia"]." AND `date` >= '".$year."-".$jan_start_line."' AND `date` <= '".$year."-".$jan_end_line."'";
$result_jan_line = $conn->query($sql_jan_line);
$row_jan_line = $result_jan_line->fetch_assoc();

$feb_start_line ="02-01";
$feb_end_line="02-29";
$sql_feb_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE wia=".$row_f_wia["wia"]." AND `date` >= '".$year."-".$feb_start_line."' AND `date` <= '".$year."-".$feb_end_line."'";
$result_feb_line = $conn->query($sql_feb_line);
$row_feb_line = $result_feb_line->fetch_assoc();

$mar_start_line ="03-01";
$mar_end_line="03-31";
$sql_mar_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE wia=".$row_f_wia["wia"]." AND `date` >= '".$year."-".$mar_start_line."' AND `date` <= '".$year."-".$mar_end_line."'";
$result_mar_line = $conn->query($sql_mar_line);
$row_mar_line = $result_mar_line->fetch_assoc();

$apr_start_line ="04-01";
$apr_end_line="04-30";
$sql_apr_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE wia=".$row_f_wia["wia"]." AND `date` >= '".$year."-".$apr_start_line."' AND `date` <= '".$year."-".$apr_end_line."'";
$result_apr_line = $conn->query($sql_apr_line);
$row_apr_line = $result_apr_line->fetch_assoc();

$may_start_line ="05-01";
$may_end_line="05-31";
$sql_may_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE wia=".$row_f_wia["wia"]." AND `date` >= '".$year."-".$may_start_line."' AND `date` <= '".$year."-".$may_end_line."'";
$result_may_line = $conn->query($sql_may_line);
$row_may_line = $result_may_line->fetch_assoc();

$jun_start_line ="06-01";
$jun_end_line="06-30";
$sql_jun_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE wia=".$row_f_wia["wia"]." AND `date` >= '".$year."-".$jun_start_line."' AND `date` <= '".$year."-".$jun_end_line."'";
$result_jun_line = $conn->query($sql_jun_line);
$row_jun_line = $result_jun_line->fetch_assoc();

$jul_start_line ="07-01";
$jul_end_line="07-31";
$sql_jul_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE wia=".$row_f_wia["wia"]." AND `date` >= '".$year."-".$jul_start_line."' AND `date` <= '".$year."-".$jul_end_line."'";
$result_jul_line = $conn->query($sql_jul_line);
$row_jul_line = $result_jul_line->fetch_assoc();

$aug_start_line ="08-01";
$aug_end_line="08-31";
$sql_aug_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE wia=".$row_f_wia["wia"]." AND `date` >= '".$year."-".$aug_start_line."' AND `date` <= '".$year."-".$aug_end_line."'";
$result_aug_line = $conn->query($sql_aug_line);
$row_aug_line = $result_aug_line->fetch_assoc();

$sep_start_line ="09-01";
$sep_end_line="09-30";
$sql_sep_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE wia=".$row_f_wia["wia"]." AND `date` >= '".$year."-".$sep_start_line."' AND `date` <= '".$year."-".$sep_end_line."'";
$result_sep_line = $conn->query($sql_sep_line);
$row_sep_line = $result_sep_line->fetch_assoc();

$oct_start_line ="10-01";
$oct_end_line="10-31";
$sql_oct_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE wia=".$row_f_wia["wia"]." AND `date` >= '".$year."-".$oct_start_line."' AND `date` <= '".$year."-".$oct_end_line."'";
$result_oct_line = $conn->query($sql_oct_line);
$row_oct_line = $result_oct_line->fetch_assoc();

$nov_start_line ="11-01";
$nov_end_line="11-30";
$sql_nov_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE wia=".$row_f_wia["wia"]." AND `date` >= '".$year."-".$nov_start_line."' AND `date` <= '".$year."-".$nov_end_line."'";
$result_nov_line = $conn->query($sql_nov_line);
$row_nov_line = $result_nov_line->fetch_assoc();

$dec_start_line ="12-01";
$dec_end_line="12-31";
$sql_dec_line = "SELECT COUNT(*) as `id` FROM `calls` WHERE wia=".$row_f_wia["wia"]." AND `date` >= '".$year."-".$dec_start_line."' AND `date` <= '".$year."-".$dec_end_line."'";
$result_dec_line = $conn->query($sql_dec_line);
$row_dec_line = $result_dec_line->fetch_assoc();
	
$sql66 = "SELECT * FROM sprav_wia WHERE id=".$row_f_wia["wia"]."";
$result66 = $conn->query($sql66);
$row66 = $result66->fetch_assoc();

echo'{
label: "'.$row66["name"].'",
fillColor: "'.$row66["color"].'",
pointColor:"'.$row66["color"].'",
strokeColor:"'.$row66["color"].'",
pointHighlightFill:"#fff",
data: ["'.$row_jan_line["id"].'", "'.$row_feb_line["id"].'", "'.$row_mar_line["id"].'", "'.$row_apr_line["id"].'", "'.$row_may_line["id"].'", "'.$row_jun_line["id"].'", "'.$row_jul_line["id"].'", "'.$row_aug_line["id"].'", "'.$row_sep_line["id"].'", "'.$row_oct_line["id"].'", "'.$row_nov_line["id"].'", "'.$row_dec_line["id"].'"]
},';
}
?>	
	
]
    };

	
    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: true,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
	  tooltipTemplate: "<%= datasetLabel %> (<%= value %>)"
    };
	
	var areaChartOptions2 = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: true,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
	  tooltipTemplate: "<%= datasetLabel %> (<%= value %>)",
	  multiTooltipTemplate: "<%= datasetLabel %> (<%= value %>)"
    };

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions);

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
    var lineChart = new Chart(lineChartCanvas);
    var lineChartOptions = areaChartOptions2;
    lineChartOptions.datasetFill = false;
    lineChart.Line(areaChartData2, lineChartOptions);
	
	//-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas2 = $("#lineChart2").get(0).getContext("2d");
    var lineChart2 = new Chart(lineChartCanvas2);
    var lineChartOptions2 = areaChartOptions2;
    lineChartOptions2.datasetFill = false;
    lineChart2.Line(areaChartData3, lineChartOptions2);
	
	//-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas3 = $("#lineChart3").get(0).getContext("2d");
    var lineChart3 = new Chart(lineChartCanvas3);
    var lineChartOptions3 = areaChartOptions2;
    lineChartOptions3.datasetFill = false;
    lineChart3.Line(areaChartData4, lineChartOptions3);

  
	//-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: <?php echo $maleM; ?>,
        color: "#f56954",
        highlight: "#f56954",
        label: "Мужской"
      },
      {
        value: <?php echo $maleW; ?>,
        color: "#00a65a",
        highlight: "#00a65a",
        label: "Женский"
      }
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);
  });
</script>