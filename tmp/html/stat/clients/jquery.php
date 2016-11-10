<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

session_start(); # Старт сессии
if(empty($_SESSION['result']['id'])) { # Если сессии нет, то перебрасываем на главную
header('location:index.php');
}
require_once ('../../../../classes/userClass.php'); # Пользователи системы
$userObj = new USER();  # Текущий пользователь
require_once('../../../../classes/conn.php'); # Подключаем БД
require_once('../../../../classes/var.php'); # Подключаем переменные
require_once ('../../../../classes/bd_requests.php'); # Для запросов к БД
$type_f = $_GET['date_f'];
$type_e = $_GET['date_e'];
?>

<?
if ($type_f == $type_e) {# Если в выборке даты за один день
$start = $month = strtotime($type_f); # Форматируем первую дату
$selector=date('M Y', $month);
$month = strtotime("+1 month", $month);
$string_gra='"'.$selector.'"';
}

elseif ($type_f != $type_e){# Если в выборке даты больше чем за один день
$start    = new DateTime($type_f);
$start->modify('first day of this month');
$end      = new DateTime($type_e);
$end->modify('first day of next month');
$interval = DateInterval::createFromDateString('1 month');
$period   = new DatePeriod($start, $interval, $end);
$full_s = array();
$pre='"';
foreach ($period as $dt) {
$full_s[]="".$pre."".$dt->format("M y")."".$pre."";
}
$comma_separated = implode(",", $full_s);
$string_gra=$comma_separated;
}

else {}
?>

<!-- Main content -->
<section class="content">
    <?php 


	$sql_full = "SELECT COUNT(*) as `id` FROM `clients` WHERE `dorr` >= '".$type_f."' AND `dorr` <= '".$type_e."'";
	$result_full = $conn->query($sql_full);
	$row_full = $result_full->fetch_assoc();
	$full = $row_full['id'];
	
	$ft=$type_f; # Первая дата
	$st=$type_e; # Вторая дата
	if ($ft==$st) { # Если выборка за 1 день
	$result_count_data = 1;
	$sql = "SELECT COUNT(*) as `id` FROM `clients` WHERE `dorr` = '".$ft."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$count_one = $row['id'];
	}
	else {# Если выборка более, чем за 1 день
	
	$start = new DateTime($ft); # Берем первую дату из диапазона
	$start->modify('first day of this month'); # Получаем первый день
	$end      = new DateTime($st); # Берем вторую дату из диапазона
	$end->modify('first day of next month'); # Получаем первый день
	$interval = DateInterval::createFromDateString('1 month'); # Создаем между датами интервал в 1 месяц
	$period   = new DatePeriod($start, $interval, $end); # Создаем период
	$data_f = array(); # Создаем массив
	foreach ($period as $dt) {  # Запускаем цикл
		$data_f[]=$dt->format("Y-m-d");
	}

	function get_months($date1, $date2) {
    $time1 = strtotime($date1);
    $time2 = strtotime($date2);
    $my = date('mY', $time2);
    $months = array(date('Y-m-t', $time1));
    $f = '';
    while($time1 < $time2) {
        $time1 = strtotime((date('Y-m-d', $time1).' +1month'));
        if(date('F', $time1) != $f) {
            $f = date('F', $time1);
            if(date('mY', $time1) != $my && ($time1 < $time2))
                $months[] = date('Y-m-t', $time1);
		}

    }
    $months[] = date('Y-m-t', $time2);
    return $months;
}
	$data_s = get_months($ft, $st);
	
	$result_count_data = count($data_f); # Считаем количество элементов в массиве

	if ($result_count_data == 1) { # Проверяем находится ли диапазон в одном месяце
	$sql = "SELECT COUNT(*) as `id` FROM `clients` WHERE `dorr` >= '".$ft."' AND `dorr` <= '".$st."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$count_one = $row['id'];
	}

	else {	
	$x=-1; # Точка первого дня
	$final = $result_count_data + $x; # Для завершения цикла
	$count_f = array(); # Массив первый месяц
	$count_m = array(); # Массив последующие месяцы
	$count_e = array(); # Массив последний месяц
	while ($x++ < $result_count_data) { # Запускаем цикл
		if ($x==$result_count_data) break; # Прерываем цикл, если достигли конца
		
		if ($x == 0) {
			$sql = "SELECT COUNT(*) as `id` FROM `clients` WHERE `dorr` >= '".$ft."' AND `dorr` <= '".$data_s[$x]."'"; # Поиск первого месяца из диапазона
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$count_first = $row['id'];
			$count_f[]= $count_first; 
		}
	
		elseif($x > 0 && $x < $final) {
			$sql = "SELECT COUNT(*) as `id` FROM `clients` WHERE `dorr` >= '".$data_f[$x]."' AND `dorr` <= '".$data_s[$x]."'"; # Поиск последующих месяцев из диапазона
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$count_many = $row['id'];
			$count_m[]= $count_many; 

		}
		elseif($x == $final) {
			$sql = "SELECT COUNT(*) as `id` FROM `clients` WHERE `dorr` >= '".$data_f[$x]."' AND `dorr` <= '".$st."'"; # Поиск последнего месяца из диапазона
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$count_end = $row['id'];
			$count_e[]= $count_end; 
		}
	}

	$comma_s1 = implode(",,", $count_f); # Выдергиваем массив первого месяца
	$comma_s2 = implode(",", $count_m);  # Выдергиваем массив последующих месяцев
	$something = ','; # Разделитель между месяцами
	$comma_s1 .= $something; # Ставим разделитель после первого месяца
	$comma_s2 .= $something; # Ставим разделитель после последующих месяцев
	$comma_s3 = implode("", $count_e); # Выдергиваем массив последнего месяца
	if ($comma_s2==',') { # Если в диапазоне было 2 месяца
		$comma_full = "".$comma_s1." ".$comma_s3."";
	}
	else { # Если 3 и больше месяцев в диапазоне
		$comma_full = "".$comma_s1." ".$comma_s2." ".$comma_s3."";
	}
	
	}
}

	?>
		 <!-- Первый график -->
        <div class="row">
            <div class="col-md-12">
                <!-- AREA CHART -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Количество клиентов</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="areaChart_period" style="height:250px"></canvas>
                        </div>
                        <div class="disabled">
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                За выбранный период (<?php echo ''.$type_f.' - '.$type_e.''; ?>):
                                было зарегистрировано <?echo $full; ?> клиентов
                            </p>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col (LEFT) -->

        </div>
        <!-- /.row -->
		 <!-- Второй -->
		<div class="row">
            <div class="col-md-12">
                <!-- AREA CHART -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Группа клиентов</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="lineChart_period" style="height:250px"></canvas>
                        </div>
                        <?
	   $groups_find = "SELECT groups, count(*) FROM clients WHERE `dorr` >= '".$type_f."' AND `dorr` <= '".$type_e."' GROUP BY groups HAVING count(*) >= 1 ORDER BY count(*)";
       $result_find_client_group = $conn->query($groups_find);
	   if ($result_find_client_group->num_rows > 0) {
		   echo'<table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Группа</th>
				  <th>Количество клиентов</th>
                  <th colspan="2">Процентное соотношение</th>
                </tr>';
	   while($row_find_client_group = $result_find_client_group->fetch_assoc()) { 

	   $sql4 = "SELECT * FROM sprav_client_group WHERE id=".$row_find_client_group["groups"]."";
	   $result4 = $conn->query($sql4);
	   $row4 = $result4->fetch_assoc();
	   $procent = ($row_find_client_group["count(*)"] / $full)*100;
	   $procent=round($procent, 2);

	   echo"<tr>
	   <td>".$row4["id"]."</td>";
	   if ($row4["day_repeat"]=='0') {
		echo "<td>".$row4["name"]." <span style='background-color:".$row4["color"]."' class='label'>Цвет линии</span></td>";  
	   }
	   else {
	   echo "<td>".$row4["name"]." ".$row4["day_repeat"]." дней<span style='background-color:".$row4["color"]."' class='label'>Цвет линии</span></td>";  
	   }
	    echo"<td>".$row_find_client_group["count(*)"]."</td>";

	   if ($procent <= '25') {
		  echo "<td style='width:25%'><div class='progress progress-xs'>
                      <div class='progress-bar progress-bar-danger' style='width: ".$procent."%'></div>
                    </div>
                  </td>";
	   }

	   elseif ($procent >= '26' && $procent <= '50') {
		  echo "<td style='width:25%'><div class='progress progress-xs'>
                      <div class='progress-bar progress-bar-yellow' style='width: ".$procent."%'></div>
                    </div>
                  </td>";
	   }

	   elseif ($procent >= '51' && $procent <= '75') {
		  echo "<td style='width:25%'><div class='progress progress-xs'>
                      <div class='progress-bar progress-bar-prymary' style='width: ".$procent."%'></div>
                    </div>
                  </td>";
	   }

	    elseif ($procent >= '76' && $procent <= '100') {
		  echo "<td style='width:25%'><div class='progress progress-xs'>
                      <div class='progress-bar progress-bar-success' style='width: ".$procent."%'></div>
                    </div>
                  </td>";
	   }

	   else {}

	   if ($procent <= '25') {
		  echo "<td><span class='badge bg-red'>".$procent."%</span></td>";
	   }

	   elseif ($procent >= '26' && $procent <= '50') {
		  echo "<td><span class='badge bg-yellow'>".$procent."%</span></td>";
	   }

	   elseif ($procent >= '51' && $procent <= '75') {
		  echo "<td><span class='badge bg-light-blue'>".$procent."%</span></td>";
	   }

	    elseif ($procent >= '76' && $procent <= '100') {
		  echo "<td><span class='badge bg-green'>".$procent."%</span></td>";
	   }

	   else {}

	     echo"</tr>";
	   }
	   echo"</table>";
	   }
	   else {}
			?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col (LEFT) -->

        </div>
        <!-- /.row -->
		
	
</section>
<!-- /.content -->     

<script>
$(function () {
/* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $("#areaChart_period").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);

	
    var areaChartData = {
      labels: [<?php echo $string_gra; ?>],
      datasets: [
        {
          label: "Количество клиентов",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
		  <?php
		  if ($result_count_data == 1) {
          echo"data: [".$count_one."]";
		  }
		  else {
		  echo"data: [".$comma_full."]";
		  }
		  ?>
		}
      ]
    };
	
	var areaChartData2 = {
      labels: [<?php echo $string_gra; ?>],
      datasets: [
        
        <?php
		$sql_find_client_group  = "SELECT * FROM sprav_client_group WHERE id != 0";	
		$result_find_client_group = $conn->query($sql_find_client_group);

		$ft=$type_f; # Первая дата
		$st=$type_e; # Вторая дата
	
		if ($ft==$st) {# Если выборка за 1 день
			while($row_find_client_group = $result_find_client_group->fetch_assoc()) {
			
			$sql = "SELECT COUNT(*) as `id` FROM `clients` WHERE groups=".$row_f_client_group["groups"]." AND `dorr` = '".$ft."'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$count_one = $row['id'];
	
			$sql44 = "SELECT * FROM sprav_client_group WHERE id=".$row_f_client_group["groups"]."";
			$result44 = $conn->query($sql44);
			$row44 = $result44->fetch_assoc();

			echo'{
			label: "'.$row44["name"].'",
			fillColor: "'.$row44["color"].'",
			pointColor:"'.$row44["color"].'",
			strokeColor:"'.$row44["color"].'",
			pointHighlightFill:"#fff",
			data: ["'.$count_one.'"]
			},';
		}
	}
	
	else {# Если выборка более, чем за 1 день
	
	$start = new DateTime($ft); # Берем первую дату из диапазона
	$start->modify('first day of this month'); # Получаем первый день
	$end      = new DateTime($st); # Берем вторую дату из диапазона
	$end->modify('first day of next month'); # Получаем первый день
	$interval = DateInterval::createFromDateString('1 month'); # Создаем между датами интервал в 1 месяц
	$period   = new DatePeriod($start, $interval, $end); # Создаем период
	$data_f = array(); # Создаем массив
	foreach ($period as $dt) {  # Запускаем цикл
		$data_f[]=$dt->format("Y-m-d");
	}
	$data_s = get_months($ft, $st);
	$result_count_data = count($data_f); # Считаем количество элементов в массиве

	if ($result_count_data == 1) { # Проверяем находится ли диапазон в одном месяце
			while($row_find_client_group = $result_find_client_group->fetch_assoc()) {
			
			$sql = "SELECT COUNT(*) as `id` FROM `clients` WHERE groups=".$row_f_client_group["groups"]." AND `dorr` >= '".$ft."' AND `dorr` <= '".$st."'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$count_one = $row['id'];
	
			$sql44 = "SELECT * FROM sprav_client_group WHERE id=".$row_f_client_group["groups"]."";
			$result44 = $conn->query($sql44);
			$row44 = $result44->fetch_assoc();

			echo'{
			label: "'.$row44["name"].'",
			fillColor: "'.$row44["color"].'",
			pointColor:"'.$row44["color"].'",
			strokeColor:"'.$row44["color"].'",
			pointHighlightFill:"#fff",
			data: ["'.$count_one.'"]
			},';
		}
	}

	else {
			while($row_find_client_group = $result_find_client_group->fetch_assoc()) {
			$sql44 = "SELECT * FROM sprav_client_group WHERE id=".$row_find_client_group["id"]."";
			$result44 = $conn->query($sql44);
			$row44 = $result44->fetch_assoc();	
			$count_f = array(); # Массив первый месяц
			$count_m = array(); # Массив последующие месяцы
			$count_e = array(); # Массив последний месяц
			$x=-1; # Точка первого дня
			$final = $result_count_data + $x; # Для завершения цикла
			while ($x++ < $result_count_data) { # Запускаем цикл
			if ($x == 0) {
			$sql = "SELECT COUNT(*) as `id` FROM `clients` WHERE groups=".$row_find_client_group["id"]." AND `dorr` >= '".$ft."' AND `dorr` <= '".$data_s[$x]."'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$count_first = $row['id'];
			$count_f[]= $count_first;
			}
			
			elseif($x > 0 && $x < $final) {
			$sql = "SELECT COUNT(*) as `id` FROM `clients` WHERE groups=".$row_find_client_group["id"]." AND `dorr` >= '".$data_f[$x]."' AND `dorr` <= '".$data_s[$x]."'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$count_many = $row['id'];
			$count_m[]= $count_many; 
			}
			
			elseif($x == $final) {
			$sql = "SELECT COUNT(*) as `id` FROM `clients` WHERE groups=".$row_find_client_group["id"]." AND `dorr` >= '".$data_f[$x]."' AND `dorr` <= '".$st."'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$count_end = $row['id'];
			$count_e[]= $count_end; 
			}
			}
			$comma_s1 = implode(",,", $count_f);# Выдергиваем массив первого месяца	
			$comma_s2 = implode(",", $count_m);  # Выдергиваем массив последующих месяцев
			$something = ','; # Разделитель между месяцами
			$comma_s1 .= $something; # Ставим разделитель после первого месяца
			$comma_s2 .= $something; # Ставим разделитель после последующих месяцев
			$comma_s3 = implode("", $count_e); # Выдергиваем массив последнего месяца
			if ($comma_s2==',') { # Если в диапазоне было 2 месяца
				$comma_full = "".$comma_s1." ".$comma_s3."";
			}
			else { # Если 3 и больше месяцев в диапазоне
				$comma_full = "".$comma_s1." ".$comma_s2." ".$comma_s3."";
			}
			echo'{
			label: "'.$row44["name"].'",
			fillColor: "'.$row44["color"].'",
			pointColor:"'.$row44["color"].'",
			strokeColor:"'.$row44["color"].'",
			pointHighlightFill:"#fff",
			data: ['.$comma_full.']
			},';			
			}
		}
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
	  tooltipTemplate: "<%= datasetLabel %> (<%= value %>)",
	  multiTooltipTemplate: "<%= datasetLabel %> (<%= value %>)"
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
    var lineChartCanvas = $("#lineChart_period").get(0).getContext("2d");
    var lineChart = new Chart(lineChartCanvas);
    var lineChartOptions = areaChartOptions2;
    lineChartOptions.datasetFill = false;
    lineChart.Line(areaChartData2, lineChartOptions);

  });
</script>       