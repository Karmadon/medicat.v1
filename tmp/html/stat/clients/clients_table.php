<!-- Main content -->
<section class="content">
    <?php 
	$year="2016";

	$jan_start ="01-01";
	$jan_end="01-31";
	$sql_jan = "SELECT COUNT(*) as `id` FROM `clients` WHERE `dorr` >= '".$year."-".$jan_start."' AND `dorr` <= '".$year."-".$jan_end."'";
	$result_jan = $conn->query($sql_jan);
	$row_jan = $result_jan->fetch_assoc();
	$jan = $row_jan['id'];

	$feb_start ="02-01";
	$feb_end="02-29";
	$sql_feb = "SELECT COUNT(*) as `id` FROM `clients` WHERE `dorr` >= '".$year."-".$feb_start."' AND `dorr` <= '".$year."-".$feb_end."'";
	$result_feb = $conn->query($sql_feb);
	$row_feb = $result_feb->fetch_assoc();
	$feb = $row_feb['id'];

	$mar_start ="03-01";
	$mar_end="03-31";
	$sql_mar = "SELECT COUNT(*) as `id` FROM `clients` WHERE `dorr` >= '".$year."-".$mar_start."' AND `dorr` <= '".$year."-".$mar_end."'";
	$result_mar = $conn->query($sql_mar);
	$row_mar = $result_mar->fetch_assoc();
	$mar = $row_mar['id'];

	$apr_start ="04-01";
	$apr_end="04-30";
	$sql_apr = "SELECT COUNT(*) as `id` FROM `clients` WHERE `dorr` >= '".$year."-".$apr_start."' AND `dorr` <= '".$year."-".$apr_end."'";
	$result_apr = $conn->query($sql_apr);
	$row_apr = $result_apr->fetch_assoc();
	$apr = $row_apr['id'];

	$may_start ="05-01";
	$may_end="05-31";
	$sql_may = "SELECT COUNT(*) as `id` FROM `clients` WHERE `dorr` >= '".$year."-".$may_start."' AND `dorr` <= '".$year."-".$may_end."'";
	$result_may = $conn->query($sql_may);
	$row_may = $result_may->fetch_assoc();
	$may = $row_may['id'];

	$jun_start ="06-01";
	$jun_end="06-30";
	$sql_jun = "SELECT COUNT(*) as `id` FROM `clients` WHERE `dorr` >= '".$year."-".$jun_start."' AND `dorr` <= '".$year."-".$jun_end."'";
	$result_jun = $conn->query($sql_jun);
	$row_jun = $result_jun->fetch_assoc();
	$jun = $row_jun['id'];

	$jul_start ="07-01";
	$jul_end="07-31";
	$sql_jul = "SELECT COUNT(*) as `id` FROM `clients` WHERE `dorr` >= '".$year."-".$jul_start."' AND `dorr` <= '".$year."-".$jul_end."'";
	$result_jul = $conn->query($sql_jul);
	$row_jul = $result_jul->fetch_assoc();
	$jul = $row_jul['id'];

	$aug_start ="08-01";
	$aug_end="08-31";
	$sql_aug = "SELECT COUNT(*) as `id` FROM `clients` WHERE `dorr` >= '".$year."-".$aug_start."' AND `dorr` <= '".$year."-".$aug_end."'";
	$result_aug = $conn->query($sql_aug);
	$row_aug = $result_aug->fetch_assoc();
	$aug = $row_aug['id'];

	$sep_start ="09-01";
	$sep_end="09-30";
	$sql_sep = "SELECT COUNT(*) as `id` FROM `clients` WHERE `dorr` >= '".$year."-".$sep_start."' AND `dorr` <= '".$year."-".$sep_end."'";
	$result_sep = $conn->query($sql_sep);
	$row_sep = $result_sep->fetch_assoc();
	$sep = $row_sep['id'];

	$oct_start ="10-01";
	$oct_end="10-31";
	$sql_oct = "SELECT COUNT(*) as `id` FROM `clients` WHERE `dorr` >= '".$year."-".$oct_start."' AND `dorr` <= '".$year."-".$oct_end."'";
	$result_oct = $conn->query($sql_oct);
	$row_oct = $result_oct->fetch_assoc();
	$oct = $row_oct['id'];

	$nov_start ="11-01";
	$nov_end="11-31";
	$sql_nov = "SELECT COUNT(*) as `id` FROM `clients` WHERE `dorr` >= '".$year."-".$nov_start."' AND `dorr` <= '".$year."-".$nov_end."'";
	$result_nov = $conn->query($sql_nov);
	$row_nov = $result_nov->fetch_assoc();
	$nov = $row_nov['id'];

	$dec_start ="12-01";
	$dec_end="12-31";
	$sql_dec = "SELECT COUNT(*) as `id` FROM `clients` WHERE `dorr` >= '".$year."-".$dec_start."' AND `dorr` <= '".$year."-".$dec_end."'";
	$result_dec = $conn->query($sql_dec);
	$row_dec = $result_dec->fetch_assoc();
	$dec= $row_dec['id'];

	$sql_full = "SELECT COUNT(*) as `id` FROM `clients` WHERE `dorr` >= '".$year."-".$jan_start."' AND `dorr` <= '".$year."-".$dec_end."'";
	$result_full = $conn->query($sql_full);
	$row_full = $result_full->fetch_assoc();
	$full = $row_full['id'];

	?>
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
                            <canvas id="areaChart" style="height:250px"></canvas>
                        </div>
                        <div class="disabled">
                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                На текущий момент за 2016 год было зарегестрировано:
                                <?echo $full; ?> клиентов
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
                            <canvas id="lineChart" style="height:250px"></canvas>
                        </div>
                        <?
	   $foas_find = "SELECT groups, count(*) FROM clients GROUP BY groups HAVING count(*) >= 1 ORDER BY count(*)";
       $result_find_foas = $conn->query($foas_find);
	   if ($result_find_foas->num_rows > 0) {
		   echo'<table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Группа</th>
				  <th>Количество клиентов</th>
                  <th colspan="2">Процентное соотношение</th>
                </tr>';
	   while($row_find_foas = $result_find_foas->fetch_assoc()) { 

	   $sql4 = "SELECT * FROM sprav_client_group WHERE id=".$row_find_foas["groups"]."";
	   $result4 = $conn->query($sql4);
	   $row4 = $result4->fetch_assoc();
	   $procent = ($row_find_foas["count(*)"] / $full)*100;
	   $procent=round($procent, 2);

	   echo"<tr>
	   <td>".$row4["id"]."</td>";
	   if ($row4["day_repeat"]=='0') {
		echo "<td>".$row4["name"]." <span style='background-color:".$row4["color"]."' class='label'>Цвет линии</span></td>";  
	   }
	   else {
	   echo "<td>".$row4["name"]." ".$row4["day_repeat"]." дней<span style='background-color:".$row4["color"]."' class='label'>Цвет линии</span></td>";  
	   }
	   echo"<td>".$row_find_foas["count(*)"]."</td>";

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

    

        <?

		$sql_sexM = "SELECT COUNT(*) as `male` FROM `clients` WHERE `male` = 'Мужской'";
		$result_sexM = $conn->query($sql_sexM);
		$row_sexM = $result_sexM->fetch_assoc();
		$maleM = $row_sexM['male'];

		$sql_sexW = "SELECT COUNT(*) as `male` FROM `clients` WHERE `male` = 'Женский'";
		$result_sexW = $conn->query($sql_sexW);
		$row_sexW = $result_sexW->fetch_assoc();
		$maleW = $row_sexW['male'];

		?>

            <div class="row">
                <div class="col-md-12">
                    <!-- DONUT CHART -->
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Пол</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <canvas id="pieChart"></canvas>
                        </div>
                        <!-- /.box-body -->

                        <?
		   echo'<table class="table table-bordered">
                <tr>
                  <th>Пол</th>
                  <th colspan="2">Процентное соотношение</th>
                </tr>';

	   $man_find = "SELECT male, count(*) FROM clients WHERE male='Мужской' GROUP BY male HAVING count(*) >= 1 ORDER BY count(*)";
       $result_find_man = $conn->query($man_find);
	   $row_find_man = $result_find_man->fetch_assoc();
	   $procent = ($row_find_man["count(*)"] / $full)*100;
	   $procent=round($procent, 2);

	   $woman_find = "SELECT male, count(*) FROM clients WHERE male='Женский' GROUP BY male HAVING count(*) >= 1 ORDER BY count(*)";
       $result_find_woman = $conn->query($woman_find);
	   $row_find_woman = $result_find_woman->fetch_assoc();
	   $procentW = ($row_find_woman["count(*)"] / $full)*100;
	   $procentW=round($procentW, 2);

	   echo"<tr>
	   <td>".$row_find_man["male"]." <span style='background-color:#f56954' class='label'>Цвет линии</span></td>
	    <td>".$row_find_man["count(*)"]."</td>";

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

		echo"<tr>
	   <td>".$row_find_woman["male"]."  <span style='background-color:#00a65a' class='label'>Цвет линии</span></td>
	    <td>".$row_find_woman["count(*)"]."</td>";

	   if ($procentW <= '25') {
		  echo "<td style='width:25%'><div class='progress progress-xs'>
                      <div class='progress-bar progress-bar-danger' style='width: ".$procentW."%'></div>
                    </div>
                  </td>";
	   }

	   elseif ($procentW >= '26' && $procentW <= '50') {
		  echo "<td style='width:25%'><div class='progress progress-xs'>
                      <div class='progress-bar progress-bar-yellow' style='width: ".$procentW."%'></div>
                    </div>
                  </td>";
	   }

	   elseif ($procentW >= '51' && $procentW <= '75') {
		  echo "<td style='width:25%'><div class='progress progress-xs'>
                      <div class='progress-bar progress-bar-prymary' style='width: ".$procentW."%'></div>
                    </div>
                  </td>";
	   }

	    elseif ($procentW >= '76' && $procentW <= '100') {
		  echo "<td style='width:25%'><div class='progress progress-xs'>
                      <div class='progress-bar progress-bar-success' style='width: ".$procentW."%'></div>
                    </div>
                  </td>";
	   }

	   else {}

	   if ($procentW <= '25') {
		  echo "<td><span class='badge bg-red'>".$procentW."%</span></td>";
	   }

	   elseif ($procentW >= '26' && $procentW <= '50') {
		  echo "<td><span class='badge bg-yellow'>".$procentW."%</span></td>";
	   }

	   elseif ($procentW >= '51' && $procentW <= '75') {
		  echo "<td><span class='badge bg-light-blue'>".$procentW."%</span></td>";
	   }

	    elseif ($procentW >= '76' && $procentW <= '100') {
		  echo "<td><span class='badge bg-green'>".$procentW."%</span></td>";
	   }

	   else {}

	     echo"</tr>";

	   echo"</table>";

			?>
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col (LEFT) -->

            </div>
            <!-- /.row -->

</section>
<!-- /.content -->