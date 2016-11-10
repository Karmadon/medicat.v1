<?php
/* Делаем запрос к БД, на вывод персональной информации о задачах, выводится информация персонализированая конкретному менеджеру (список) */ 
function main_day() {
global $conn; # Для запросов к БД
	global $manager; # Текущий пользователь в системе
	global $cur_date; # Для запросов к БД
	$foas_f="SELECT * FROM ce WHERE date='$cur_date' AND twtma = '".$manager."'"; # Запрос о задачах для менеджера
	$result_f_foas=$conn->query($foas_f);
	while($row_f_foas=$result_f_foas->fetch_assoc()) { # Старт цикла
		$foas_f2="SELECT * FROM clients WHERE id = '".$row_f_foas["client"]."'";
		$result_foas_f2=$conn->query($foas_f2);
		$row_foas_f2=$result_foas_f2->fetch_assoc();
		if ($row_f_foas["status"]=='0') {
			echo'<tr>
					<td>Клиент записан</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='1') {
			echo'<tr>
					<td>Клиент принят</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='2') {
			echo'<tr>
					<td>Клиент отменен</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='3') {
			echo'<tr>
					<td>Клиент опаздывает</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='4') {
			echo'<tr>
					<td>Клиент перезаписан</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
	}
}

/* Делаем запрос к БД, на вывод для менеджера информации о задачах, выводится информация за сегодня (список) */ 
function main_day_man_today() {
	global $conn; # Для запросов к БД
	global $cur_date; # Для запросов к БД
	global $manager; # Текущий пользователь в системе
	$foas_f="SELECT * FROM ce WHERE date='$cur_date' AND twtma = '".$manager."'"; # Запрос о задачах
	$result_f_foas=$conn->query($foas_f);
	echo'<tbody>';
	while($row_f_foas=$result_f_foas->fetch_assoc()) { # Старт цикла
		$foas_f2="SELECT * FROM clients WHERE id = '".$row_f_foas["client"]."'";
		$result_foas_f2=$conn->query($foas_f2);
		$row_foas_f2=$result_foas_f2->fetch_assoc();
		if ($row_f_foas["status"]=='0') {
			echo'<tr>
					<td>Клиент записан</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='1') {
			echo'<tr>
					<td>Клиент принят</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='2') {
			echo'<tr>
					<td>Клиент отменен</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='3') {
			echo'<tr>
					<td>Клиент опаздывает</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='4') {
			echo'<tr>
					<td>Клиент перезаписан</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
	}
	echo'</tbody>';
}
/* Делаем запрос к БД, на вывод для менеджера информации о задачах, выводится информация за неделю (список) */ 
	function main_day_man_week() {
	global $conn; # Для запросов к БД
	global $fweek; # Первый день недели
	global $eweek; # Последний день недели
	global $manager; # Текущий пользователь в системе
	$foas_f="SELECT * FROM ce WHERE date >= '".$fweek."' AND date <= '".$eweek."' AND twtma = '".$manager."' ORDER BY date DESC"; # Запрос о задачах
	$result_f_foas=$conn->query($foas_f);
	echo'<tbody>';
	while($row_f_foas=$result_f_foas->fetch_assoc()) { # Старт цикла
		$foas_f2="SELECT * FROM clients WHERE id = '".$row_f_foas["client"]."'";
		$result_foas_f2=$conn->query($foas_f2);
		$row_foas_f2=$result_foas_f2->fetch_assoc();
		if ($row_f_foas["status"]=='0') {
			echo'<tr>
					<td>Клиент записан</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='1') {
			echo'<tr>
					<td>Клиент принят</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='2') {
			echo'<tr>
					<td>Клиент отменен</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='3') {
			echo'<tr>
					<td>Клиент опаздывает</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='4') {
			echo'<tr>
					<td>Клиент перезаписан</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
	}
	echo'</tbody>';
}

/* Делаем запрос к БД, на вывод для менеджера информации о задачах, выводится информация за месяц (список) */ 
	function main_day_man_month() {
	global $conn; # Для запросов к БД
	global $month; # Первый день недели
	global $cur_date; # Текущий день
	global $manager; # Текущий пользователь в системе
	$foas_f="SELECT * FROM ce WHERE date >= '".$month."' AND date <= '".$cur_date."' AND twtma = '".$manager."' ORDER BY date DESC"; # Запрос о задачах
	$result_f_foas=$conn->query($foas_f);
	echo'<tbody>';
	while($row_f_foas=$result_f_foas->fetch_assoc()) { # Старт цикла
		$foas_f2="SELECT * FROM clients WHERE id = '".$row_f_foas["client"]."'";
		$result_foas_f2=$conn->query($foas_f2);
		$row_foas_f2=$result_foas_f2->fetch_assoc();
		if ($row_f_foas["status"]=='0') {
			echo'<tr>
					<td>Клиент записан</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='1') {
			echo'<tr>
					<td>Клиент принят</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='2') {
			echo'<tr>
					<td>Клиент отменен</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='3') {
			echo'<tr>
					<td>Клиент опаздывает</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='4') {
			echo'<tr>
					<td>Клиент перезаписан</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
	}
	echo'</tbody>';
}

/* Делаем запрос к БД, на вывод для менеджера информации о задачах, выводится информация за дату (список) */ 
	function main_day_man_v() {
	global $conn; # Для запросов к БД
	global $manager; # Текущий пользователь в системе
	$type = (string)$_GET['date']; # Получаем выбранную дату
	$foas_f="SELECT * FROM ce WHERE date = '".$type."' AND twtma = '".$manager."' ORDER BY date DESC"; # Запрос о задачах
	$result_f_foas=$conn->query($foas_f);
	echo'<tbody>';
	while($row_f_foas=$result_f_foas->fetch_assoc()) { # Старт цикла
		$foas_f2="SELECT * FROM clients WHERE id = '".$row_f_foas["client"]."'";
		$result_foas_f2=$conn->query($foas_f2);
		$row_foas_f2=$result_foas_f2->fetch_assoc();
		if ($row_f_foas["status"]=='0') {
			echo'<tr>
					<td>Клиент записан</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='1') {
			echo'<tr>
					<td>Клиент принят</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='2') {
			echo'<tr>
					<td>Клиент отменен</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='3') {
			echo'<tr>
					<td>Клиент опаздывает</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='4') {
			echo'<tr>
					<td>Клиент перезаписан</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
	}
	echo'</tbody>';
}
/* Делаем запрос к БД, на вывод для всез информации о задачах, выводится информация (список) */ 
	function main_day_all() {
	global $conn; # Для запросов к БД
	global $cur_date; # Для запросов к БД
	$foas_f="SELECT * FROM ce WHERE date='$cur_date'"; # Запрос о задачах
	$result_f_foas=$conn->query($foas_f);
	while($row_f_foas=$result_f_foas->fetch_assoc()) { # Старт цикла
		$foas_f2="SELECT * FROM clients WHERE id = '".$row_f_foas["client"]."'";
		$result_foas_f2=$conn->query($foas_f2);
		$row_foas_f2=$result_foas_f2->fetch_assoc();
		if ($row_f_foas["status"]=='0') {
			echo'<tr>
					<td>Клиент записан</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='1') {
			echo'<tr>
					<td>Клиент принят</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='2') {
			echo'<tr>
					<td>Клиент отменен</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='3') {
			echo'<tr>
					<td>Клиент опаздывает</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='4') {
			echo'<tr>
					<td>Клиент перезаписан</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
	}
}
/* Делаем запрос к БД, на вывод для всез информации о задачах, выводится информация за сегодня (список) */ 
function main_day_all_today() {
	global $conn; # Для запросов к БД
	global $cur_date; # Для запросов к БД
	$foas_f="SELECT * FROM ce WHERE date='$cur_date'"; # Запрос о задачах
	$result_f_foas=$conn->query($foas_f);
	echo'<tbody>';
	while($row_f_foas=$result_f_foas->fetch_assoc()) { # Старт цикла
		$foas_f2="SELECT * FROM clients WHERE id = '".$row_f_foas["client"]."'";
		$result_foas_f2=$conn->query($foas_f2);
		$row_foas_f2=$result_foas_f2->fetch_assoc();
		if ($row_f_foas["status"]=='0') {
			echo'<tr>
					<td>Клиент записан</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='1') {
			echo'<tr>
					<td>Клиент принят</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='2') {
			echo'<tr>
					<td>Клиент отменен</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='3') {
			echo'<tr>
					<td>Клиент опаздывает</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='4') {
			echo'<tr>
					<td>Клиент перезаписан</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
	}
	echo'</tbody>';
}
/* Делаем запрос к БД, на вывод для всез информации о задачах, выводится информация за неделю (список) */ 
	function main_day_all_week() {
	global $conn; # Для запросов к БД
	global $fweek; # Первый день недели
	global $eweek; # Последний день недели
	$foas_f="SELECT * FROM ce WHERE date >= '".$fweek."' AND date <= '".$eweek."' ORDER BY date DESC"; # Запрос о задачах
	$result_f_foas=$conn->query($foas_f);
	echo'<tbody>';
	while($row_f_foas=$result_f_foas->fetch_assoc()) { # Старт цикла
		$foas_f2="SELECT * FROM clients WHERE id = '".$row_f_foas["client"]."'";
		$result_foas_f2=$conn->query($foas_f2);
		$row_foas_f2=$result_foas_f2->fetch_assoc();
		if ($row_f_foas["status"]=='0') {
			echo'<tr>
					<td>Клиент записан</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='1') {
			echo'<tr>
					<td>Клиент принят</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='2') {
			echo'<tr>
					<td>Клиент отменен</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='3') {
			echo'<tr>
					<td>Клиент опаздывает</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='4') {
			echo'<tr>
					<td>Клиент перезаписан</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
	}
	echo'</tbody>';
}

/* Делаем запрос к БД, на вывод для всез информации о задачах, выводится информация за месяц (список) */ 
	function main_day_all_month() {
	global $conn; # Для запросов к БД
	global $month; # Первый день недели
	global $cur_date; # Текущий день
	$foas_f="SELECT * FROM ce WHERE date >= '".$month."' AND date <= '".$cur_date."' ORDER BY date DESC"; # Запрос о задачах
	$result_f_foas=$conn->query($foas_f);
	echo'<tbody>';
	while($row_f_foas=$result_f_foas->fetch_assoc()) { # Старт цикла
		$foas_f2="SELECT * FROM clients WHERE id = '".$row_f_foas["client"]."'";
		$result_foas_f2=$conn->query($foas_f2);
		$row_foas_f2=$result_foas_f2->fetch_assoc();
		if ($row_f_foas["status"]=='0') {
			echo'<tr>
					<td>Клиент записан</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='1') {
			echo'<tr>
					<td>Клиент принят</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='2') {
			echo'<tr>
					<td>Клиент отменен</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='3') {
			echo'<tr>
					<td>Клиент опаздывает</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='4') {
			echo'<tr>
					<td>Клиент перезаписан</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
	}
	echo'</tbody>';
}

/* Делаем запрос к БД, на вывод для всез информации о задачах, выводится информация за дату (список) */ 
	function main_day_all_v() {
	global $conn; # Для запросов к БД
	$type = (string)$_GET['date']; # Получаем выбранную дату
	$foas_f="SELECT * FROM ce WHERE date = '".$type."' ORDER BY date DESC"; # Запрос о задачах
	$result_f_foas=$conn->query($foas_f);
	echo'<tbody>';
	while($row_f_foas=$result_f_foas->fetch_assoc()) { # Старт цикла
		$foas_f2="SELECT * FROM clients WHERE id = '".$row_f_foas["client"]."'";
		$result_foas_f2=$conn->query($foas_f2);
		$row_foas_f2=$result_foas_f2->fetch_assoc();
		if ($row_f_foas["status"]=='0') {
			echo'<tr>
					<td>Клиент записан</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='1') {
			echo'<tr>
					<td>Клиент принят</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='2') {
			echo'<tr>
					<td>Клиент отменен</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='3') {
			echo'<tr>
					<td>Клиент опаздывает</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_f_foas["status"]=='4') {
			echo'<tr>
					<td>Клиент перезаписан</td>
					<td>'.$row_f_foas["date"].'</td> 
					<td>'.$row_f_foas["time"].'</td> 
					<td>'.$row_foas_f2["fio"].'</td> 
					<td><a href="ce_info?id='.$row_f_foas["id"].'">Подробнее</a></td> 
				</tr>';
		}
	}
	echo'</tbody>';
}

/* Делаем запрос к БД, на вывод информации о группе повтора, информация доступна всем */
function main_repeat() {
	global $conn; # Для запросов к БД
	global $cur_date; # Текущая дата
	$repeat="SELECT * FROM repeat_ce WHERE date_final=".$cur_date.""; # Запрос о повторах
	$result_repeat=$conn->query($repeat);
	while($row_repeat=$result_repeat->fetch_assoc()) { # Старт цикла
		$repeat_client="SELECT * FROM clients WHERE id = '".$row_repeat["id_client"]."'";
		$result_repeat_client=$conn->query($repeat_client);
		$row_repeat_client=$result_repeat_client->fetch_assoc();
		if ($row_repeat["status"]=='0') {
			echo'<tr>
					<td>Повторное напоминание</td>
					<td>'.$row_repeat["date_final"].'</td> 
					<td>'.$row_repeat_client["fio"].'</td> 
					<td><a href="repeat_status?id='.$row_repeat["id"].'">Подробнее</a></td> 
				</tr>';
		}
		elseif ($row_repeat["status"]=='1') {
			echo'<tr>
					<td>Повторное напоминание</td>
					<td>'.$row_repeat["date_final"].'</td> 
					<td>'.$row_repeat_client["fio"].'</td> 
					<td><b>Клиент оповещен</b></td> 
				</tr>';
		}
		else {}
	}
}
/* Делаем запрос к БД, на вывод персональной информации о задачах, выводится информация персонализированая конкретному менеджеру */
function get_event() {
	global $conn; # Для запросов к БД
	global $manager; # Текущий пользователь в системе
	$foas_f="SELECT * FROM ce WHERE twtma = '".$manager."'"; # Запрос о задачах для менеджера
	$result_f_foas=$conn->query($foas_f);
	while($row_f_foas=$result_f_foas->fetch_assoc()) { # Старт цикла
		$time_end = new DateTime($row_f_foas["time"]);
		$time_end->modify('+60min');
		$vtm=$time_end ->format('H:i');
		
		$foas_f2="SELECT * FROM clients WHERE id = '".$row_f_foas["client"]."'";
		$result_foas_f2=$conn->query($foas_f2);
		$row_foas_f2=$result_foas_f2->fetch_assoc();
		if ($row_f_foas["status"]=='0') {
			echo'{
					title: "Записан клиент '.$row_foas_f2["fio"].'", 
					start: "'.$row_f_foas["date"].'T'.$row_f_foas["time"].'", 
					end: "'.$row_f_foas["date"].'T'.$vtm.'", 
					backgroundColor: "#3c8dbc", 
					borderColor: "#3c8dbc", 
					description: "<b>Менеджер</b> '.$row_foas_f3["lastname"].' '.$row_foas_f3["name"].'<br><b>Вопрос:</b> '.$row_foas_f4["name"].'<br> <big><a class=btn-danger href=ce_info?id='.$row_f_foas["id"].'><h4 style=display:block;float:left; class=txt-white> <i class=fa_info></i> </h4></a> <a class=btn-danger href=ce_status?id='.$row_f_foas["id"].'><h4 style=display:block;float:left;margin-left:10px; class=txt-white><i class=fa_edit></i></h4></a></big>"
				},';
		}
		elseif ($row_f_foas["status"]=='1') {
			echo'{
					title: "Принят клиент '.$row_foas_f2["fio"].'", 
					start: "'.$row_f_foas["date"].'T'.$row_f_foas["time"].'", 
					end: "'.$row_f_foas["date"].'T'.$vtm.'", 
					backgroundColor: "#00a65a", 
					borderColor: "#00a65a", 
					description: "<b>Менеджер</b> '.$row_foas_f3["lastname"].' '.$row_foas_f3["name"].'<br><b>Вопрос:</b> '.$row_foas_f4["name"].'<br> <big><a class=btn-danger href=ce_info?id='.$row_f_foas["id"].'><h4 style=display:block;float:left; class=txt-white> <i class=fa_info></i> </h4></a> <a class=btn-danger href=ce_status?id='.$row_f_foas["id"].'><h4 style=display:block;float:left;margin-left:10px; class=txt-white><i class=fa_edit></i></h4></a></big>"
				},';
		}
		elseif ($row_f_foas["status"]=='2') {
			echo'{
					title: "Отменен клиент '.$row_foas_f2["fio"].'", 
					start: "'.$row_f_foas["date"].'T'.$row_f_foas["time"].'", 
					end: "'.$row_f_foas["date"].'T'.$vtm.'", 
					backgroundColor: "#dd4b39", 
					borderColor: "#dd4b39", 
					description: "<b>Менеджер</b> '.$row_foas_f3["lastname"].' '.$row_foas_f3["name"].'<br><b>Вопрос:</b> '.$row_foas_f4["name"].'<br> <big><a class=btn-danger href=ce_info?id='.$row_f_foas["id"].'><h4 style=display:block;float:left; class=txt-white> <i class=fa_info></i> </h4></a> <a class=btn-danger href=ce_status?id='.$row_f_foas["id"].'><h4 style=display:block;float:left;margin-left:10px; class=txt-white><i class=fa_edit></i></h4></a></big>"
				},';
		}
		elseif ($row_f_foas["status"]=='3') {
			echo'{
					title: "Опаздывает клиент '.$row_foas_f2["fio"].'",
					start: "'.$row_f_foas["date"].'T'.$row_f_foas["time"].'",
					end: "'.$row_f_foas["date"].'T'.$vtm.'", 
					backgroundColor: "#00c0ef",
					borderColor: "#00c0ef",
					description: "<b>Менеджер</b> '.$row_foas_f3["lastname"].' '.$row_foas_f3["name"].'<br><b>Вопрос:</b> '.$row_foas_f4["name"].'<br> <big><a class=btn-danger href=ce_info?id='.$row_f_foas["id"].'><h4 style=display:block;float:left; class=txt-white> <i class=fa_info></i> </h4></a> <a class=btn-danger href=ce_status?id='.$row_f_foas["id"].'><h4 style=display:block;float:left;margin-left:10px; class=txt-white><i class=fa_edit></i></h4></a></big>"
				},';
		}
		elseif ($row_f_foas["status"]=='4') {
			echo'{
					title: "Перезаписан клиент '.$row_foas_f2["fio"].'",
					start: "'.$row_f_foas["date"].'T'.$row_f_foas["time"].'",
					end: "'.$row_f_foas["date"].'T'.$vtm.'", 
					backgroundColor: "#f39c12",
					borderColor: "#f39c12",
					description: "<b>Менеджер</b> '.$row_foas_f3["lastname"].' '.$row_foas_f3["name"].'<br><b>Вопрос:</b> '.$row_foas_f4["name"].'<br> <big><a class=btn-danger href=ce_info?id='.$row_f_foas["id"].'><h4 style=display:block;float:left; class=txt-white> <i class=fa_info></i> </h4></a> <a class=btn-danger href=ce_status?id='.$row_f_foas["id"].'><h4 style=display:block;float:left;margin-left:10px; class=txt-white><i class=fa_edit></i></h4></a></big>"
				},';
		}
	}
}
/* Делаем запрос к БД, на вывод информации о записях, выводится информация всем */
function get_event_all() {
	global $conn; # Для запросов к БД
	global $manager; # Текущий пользователь в системе
	$foas_f="SELECT * FROM ce"; # Запрос о задачах для менеджера
	$result_f_foas=$conn->query($foas_f);
	while($row_f_foas=$result_f_foas->fetch_assoc()) {		# Старт цикла
		$time_end = new DateTime($row_f_foas["time"]);
		$time_end->modify('+60min');
		$vtm=$time_end ->format('H:i');

		$foas_f2="SELECT * FROM clients WHERE id = '".$row_f_foas["client"]."'";
		$result_foas_f2=$conn->query($foas_f2);
		$row_foas_f2=$result_foas_f2->fetch_assoc();
		
		$foas_f3="SELECT * FROM users WHERE id = '".$row_f_foas["twtma"]."'";
		$result_foas_f3=$conn->query($foas_f3);
		$row_foas_f3=$result_foas_f3->fetch_assoc();
		
		$foas_f4="SELECT * FROM sprav_wia WHERE id = '".$row_f_foas["wia"]."'";
		$result_foas_f4=$conn->query($foas_f4);
		$row_foas_f4=$result_foas_f4->fetch_assoc();
		
		if ($row_f_foas["status"]=='0') {
			echo'{
					title: "Записан клиент '.$row_foas_f2["fio"].'", 
					start: "'.$row_f_foas["date"].'T'.$row_f_foas["time"].'",
					end: "'.$row_f_foas["date"].'T'.$vtm.'", 
					backgroundColor: "#3c8dbc", 
					borderColor: "#3c8dbc", 
					description: "<b>Менеджер</b> '.$row_foas_f3["lastname"].' '.$row_foas_f3["name"].'<br><b>Вопрос:</b> '.$row_foas_f4["name"].'<br> <big><a class=btn-danger href=ce_info?id='.$row_f_foas["id"].'><h4 style=display:block;float:left; class=txt-white> <i class=fa_info></i> </h4></a> <a class=btn-danger href=ce_status?id='.$row_f_foas["id"].'><h4 style=display:block;float:left;margin-left:10px; class=txt-white><i class=fa_edit></i></h4></a></big>"
				},';
		}
		elseif ($row_f_foas["status"]=='1') {
			echo'{
					title: "Принят клиент '.$row_foas_f2["fio"].'", 
					start: "'.$row_f_foas["date"].'T'.$row_f_foas["time"].'", 
					end: "'.$row_f_foas["date"].'T'.$vtm.'", 
					backgroundColor: "#00a65a", 
					borderColor: "#00a65a", 
					description: "<b>Менеджер</b> '.$row_foas_f3["lastname"].' '.$row_foas_f3["name"].'<br><b>Вопрос:</b> '.$row_foas_f4["name"].'<br> <big><a class=btn-danger href=ce_info?id='.$row_f_foas["id"].'><h4 style=display:block;float:left; class=txt-white> <i class=fa_info></i> </h4></a> <a class=btn-danger href=ce_status?id='.$row_f_foas["id"].'><h4 style=display:block;float:left;margin-left:10px; class=txt-white><i class=fa_edit></i></h4></a></big>"
				},';
		}
		elseif ($row_f_foas["status"]=='2') {
			echo'{
					title: "Отменен клиент '.$row_foas_f2["fio"].'", 
					start: "'.$row_f_foas["date"].'T'.$row_f_foas["time"].'", 
					end: "'.$row_f_foas["date"].'T'.$vtm.'", 
					backgroundColor: "#dd4b39", 
					borderColor: "#dd4b39", 
					description: "<b>Менеджер</b> '.$row_foas_f3["lastname"].' '.$row_foas_f3["name"].'<br><b>Вопрос:</b> '.$row_foas_f4["name"].'<br> <big><a class=btn-danger href=ce_info?id='.$row_f_foas["id"].'><h4 style=display:block;float:left; class=txt-white> <i class=fa_info></i> </h4></a> <a class=btn-danger href=ce_status?id='.$row_f_foas["id"].'><h4 style=display:block;float:left;margin-left:10px; class=txt-white><i class=fa_edit></i></h4></a></big>"
				},';
		}
		elseif ($row_f_foas["status"]=='3') {
			echo'{
					title: "Опаздывает клиент '.$row_foas_f2["fio"].'",
					start: "'.$row_f_foas["date"].'T'.$row_f_foas["time"].'",
					end: "'.$row_f_foas["date"].'T'.$vtm.'", 
					backgroundColor: "#00c0ef",
					borderColor: "#00c0ef",
					description: "<b>Менеджер</b> '.$row_foas_f3["lastname"].' '.$row_foas_f3["name"].'<br><b>Вопрос:</b> '.$row_foas_f4["name"].'<br> <big><a class=btn-danger href=ce_info?id='.$row_f_foas["id"].'><h4 style=display:block;float:left; class=txt-white> <i class=fa_info></i> </h4></a> <a class=btn-danger href=ce_status?id='.$row_f_foas["id"].'><h4 style=display:block;float:left;margin-left:10px; class=txt-white><i class=fa_edit></i></h4></a></big>"
				},';
		}
		elseif ($row_f_foas["status"]=='4') {
			echo'{
					title: "Перезаписан клиент '.$row_foas_f2["fio"].'",
					start: "'.$row_f_foas["date"].'T'.$row_f_foas["time"].'",
					end: "'.$row_f_foas["date"].'T'.$vtm.'", 
					backgroundColor: "#f39c12",
					borderColor: "#f39c12",
					description: "<b>Менеджер</b> '.$row_foas_f3["lastname"].' '.$row_foas_f3["name"].'<br><b>Вопрос:</b> '.$row_foas_f4["name"].'<br> <big><a class=btn-danger href=ce_info?id='.$row_f_foas["id"].'><h4 style=display:block;float:left; class=txt-white> <i class=fa_info></i> </h4></a> <a class=btn-danger href=ce_status?id='.$row_f_foas["id"].'><h4 style=display:block;float:left;margin-left:10px; class=txt-white><i class=fa_edit></i></h4></a></big>"
				},';
		}
	}
}
/* Делаем запрос к БД, на вывод информации о группе повтора, информация доступна всем */
function get_repeat() {
	global $conn; # Для запросов к БД
	$repeat="SELECT * FROM repeat_ce"; # Запрос о повторах
	$result_repeat=$conn->query($repeat);
	while($row_repeat=$result_repeat->fetch_assoc()) { # Старт цикла
		$repeat_client="SELECT * FROM clients WHERE id = '".$row_repeat["id_client"]."'";
		$result_repeat_client=$conn->query($repeat_client);
		$row_repeat_client=$result_repeat_client->fetch_assoc();
		if ($row_repeat["status"]=='0') {
			echo'{
					title: "Повторное напоминание",
					start: "'.$row_repeat["date_final"].'",
					backgroundColor: "#d33724",
					borderColor: "#d33724",
					description: "'.$row_repeat_client["fio"].'",
					url: "repeat_status?id='.$row_repeat["id"].'"
				  },';	
		}
		elseif ($row_repeat["status"]=='1') {
			echo'{
					title: "Повторное напоминание",
					start: "'.$row_repeat["date_final"].'",
					backgroundColor: "#000",
					borderColor: "#000",
					description: "'.$row_repeat_client["fio"].'<br><b>Клиент оповещен</b>"
				  },';	
		}
		else {}
	}
}

/* Делаем запрос к БД, на вывод информации всех записях клиентов */
function ce() {
	global $conn; # Для запросов к БД
	global $manager; # Текущий пользователь в системе
	$sql = "SELECT * FROM ce ORDER BY id DESC"; # Запрос о записях
	$result = $conn->query($sql);
	
	$sqlid = "SELECT groupd_id FROM users WHERE id='".$manager."'"; # Запрос группа текущего пользователя в системе
	$resultid = $conn->query($sqlid);
	$rowid = $resultid->fetch_assoc();

	if ($result->num_rows > 0) { # Если в запросе есть 1 и более результат
		echo '
			<div class="row">
			<div class="col-xs-12">
			<div class="box">
            <div class="box-body">
				<table id="example1" class="table table-bordered table-striped display responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>№ обращения</th>
							<th>Клиент</th>
							<th>Телефон</th>
							<th>Группа</th>
							<th>К кому записан</th>
							<th>Дата записи</th>
							<th>Время записи</th>
							<th>Статус</th>
							<th>Действие</th>
						</tr>
					</thead>
					<tbody>';
		while($row = $result->fetch_assoc()) { # Старт цикла
			$sqls = "SELECT fio, number, groups FROM clients WHERE id=".$row["client"]."";
			$results = $conn->query($sqls);
			$rows = $results->fetch_assoc();
			echo '
				<tr>
				<td>'.$row["tr"].'</td>
                <td>'.$rows["fio"].'</td>
                <td>'.$rows["number"].'</td>
				';
			$sqls2 = "SELECT * FROM sprav_client_group WHERE id=".$rows["groups"].""; # Запрос о группе повтора
			$results2 = $conn->query($sqls2);
			$rows2 = $results2->fetch_assoc();	  
			if ($rows2["day_repeat"]=='0') {
				echo '<td>'.$rows2["name"].'</td>';	
			}
			else {
				echo '<td>'.$rows2["name"].' '.$rows2["day_repeat"].' дней</td>';	
			}
            $sqls3 = "SELECT lastname,name,thirthname FROM users WHERE id=".$row["twtma"].""; # Запрос Ф.И.О. к кому прошла запись
			$results3 = $conn->query($sqls3);
			$rows3 = $results3->fetch_assoc();
			echo '<td>'.$rows3["lastname"].' '.$rows3["name"].' '.$rows3["thirthname"].'</td>';
			echo '<td>'.$row["date"].'</td>';
			echo '<td>'.$row["time"].'</td>';
			if ($row["status"]=='0') {
				echo '<td>Записан</td>';
			}
			elseif ($row["status"]=='1') {
				echo '<td>Принят</td>';
			}
			elseif ($row["status"]=='2') {
				echo '<td>Отменен</td>';
			}
			elseif ($row["status"]=='3') {
				echo '<td>Опаздывает</td>';
			}
			elseif ($row["status"]=='4') {
				echo '<td>Перенесен</td>';
			}
			else {}
				  
			if ($rowid["groupd_id"] =='1' || $rowid["groupd_id"] =='101') { # Группа текущего пользователя в системе, кому можно редактировать, а кому нет
				echo '
						<td>
								<a href="ce_info?id='.$row["id"].'"><span class="label label-warning">Подробнее</span></a>
								<a href="ce_edit?id='.$row["id"].'"><span class="label label-success">Редактировать</span></a>
								<a href="ce_status?id='.$row["id"].'"><span class="label label-primary">Изменить статус</span></a>

						</td>
					</tr>
					';
			}
			elseif ($rowid["groupd_id"] =='102')  {
				echo '
						<td>
								<a href="ce_info?id='.$row["id"].'"><span class="label label-warning">Подробнее</span></a>
								<a href="ce_status?id='.$row["id"].'"><span class="label label-primary">Изменить статус</span></a>

						</td>
					</tr>
				    ';  
			}
			else {}
		}
		echo '
			</tbody>
            <tfoot>
				<tr>
					<th>№ обращения</th>
					<th>Клиент</th>
					<th>Телефон</th>
					<th>Группа</th>
					<th>К кому записан</th>
					<th>Дата записи</th>
					<th>Время записи</th>
					<th>Статус</th>
					<th>Действие</th>
                </tr>
            </tfoot>
            </table>
            </div>
			</div>
			</div>
			</div>
			  ';			
	}	 
	else {
		echo '
			<div class="box">
			<div class="box-header with-border">
				<h3 class="text-red box-title">Записей нет</h3>
			</div>
			</div>
			';
		}
}
/* Делаем запрос к БД, на вывод информации за текущий день о новых звонках */
function tl_call_today() {
	global $conn; # Для запросов к БД
	global $cur_date; # Текущая дата
	$sql = "SELECT id, tr, date, time, oapc FROM calls WHERE date='$cur_date' ORDER BY time DESC"; # Запрос о звонках
	$result = $conn->query($sql);
	echo '
			<table id="date_sel" class="table table-striped">
				<tr>
				<th colspan="4"><span id="title_day" class="text-red">За день: ('.$cur_date.')</span></th>
				</tr>
				<tr>
					<th style="width: 10px">#</th>
					<th>Время звонка</th>
					<th>Номер обращения</th>
					<th>На какой телефон звонили</th>
				</tr>
		  ';
	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { # Старт цикла
	$sql_phone = "SELECT name FROM sprav_phone WHERE id='".$row["oapc"]."'";
	$result_phone = $conn->query($sql_phone);
	$row_phone = $result_phone->fetch_assoc();
	echo '
		<tr>
			<td>'. $row["id"].'</td>
			<td>'. $row["time"].'</td>
			<td>'. $row["tr"].'</td>
			<td>'. $row_phone["name"].'</td>
        </tr>
		';	
    }
	echo '
		</table>
		';
	} 
	else {}
}

/* Делаем запрос к БД, на вывод информации за текущий день о новых записях клиентов */
function tl_ce_today() {
	global $conn; # Для запросов к БД
	global $cur_date; # Текущая дата
	$sql = "SELECT id, tr, date, time, dorr, torr, client, twtma FROM ce WHERE date  = '$cur_date' ORDER BY dorr DESC"; # Запрос о записях
	$result = $conn->query($sql);
	echo '
			<table id="date_ce" class="table table-striped">
				<tr>
					<th colspan="8"><span id="title_day" class="text-red">За день: ('.$cur_date.')</span></th>
				</tr>
				<tr>
					<th style="width: 10px">#</th>
					<th>Дата записи</th>
					<th>Время записи</th>
					<th>Номер обращения</th>
					<th>Клиент</th>
					<th>Записан к менеджеру</th>
					<th>Записан на дату</th>
					<th>Записан на время</th>
				</tr>
		  ';
	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { # Старт цикла
	$sql_client = "SELECT fio FROM clients WHERE id=".$row["client"]."";
	$result_client = $conn->query($sql_client);
	$row_client = $result_client->fetch_assoc();
	$sql_manager = "SELECT lastname, name, thirthname FROM users WHERE id=".$row["twtma"]."";
	$result_manager = $conn->query($sql_manager);
	$row_manager = $result_manager->fetch_assoc();
	echo '
		<tr>
			<td>'. $row["id"].'</td>
			<td>'. $row["dorr"].'</td>
			<td>'. $row["torr"].'</td>
			<td>'. $row["tr"].'</td>
			<td>'. $row_client["fio"].'</td>
			<td>'. $row_manager["lastname"].' '. $row_manager["name"].' '. $row_manager["thirthname"].'</td>
			<td>'. $row["date"].'</td>
			<td>'. $row["time"].'</td>
        </tr>
		';	
    }
	echo '
		</table>
		';
	} 
	else {}
}

/* Делаем запрос к БД, на вывод информации за текущий день о новых клиентах */
function tl_client_today() {
	global $conn; # Для запросов к БД
	global $cur_date; # Текущая дата
	$sql = "SELECT id, fio, number, dorr, torr FROM clients WHERE dorr='$cur_date' ORDER BY torr DESC"; # Запрос о клиентах
	$result = $conn->query($sql);
	echo '
			<table id="date_client" class="table table-striped">
				<tr>
				<th colspan="4"><span id="title_day" class="text-red">За день: ('.$cur_date.')</span></th>
				</tr>
				<tr>
					<th style="width: 10px">#</th>
					<th>Время регистрации</th>
					<th>ФИО</th>
				</tr>
		  ';
	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { # Старт цикла
	$sql_phone = "SELECT name FROM sprav_phone WHERE id='".$row["oapc"]."'";
	$result_phone = $conn->query($sql_phone);
	$row_phone = $result_phone->fetch_assoc();
	echo '
		<tr>
			<td>'.$row["id"].'</td>
			<td>'.$row["torr"].'</td>
			<td>'.$row["fio"].'</td>
        </tr>
		';	
    }
	echo '
		</table>
		';
	} 
	else {}
}

/* Делаем запрос к БД, на вывод информации за неделю о новых звонках */
function tl_call_week() {
	global $conn; # Для запросов к БД
	global $fweek; # Первый день недели
	global $eweek; # Последний день недели
	$sql = "SELECT id, tr, date, time, oapc FROM calls WHERE date >= '".$fweek."' AND date <= '".$eweek."' ORDER BY date DESC"; # Запрос о звонках
	$result = $conn->query($sql);
	echo '
			<table id="date_sel" class="table table-striped">
						<tr>
						<th colspan="5"><span id="title_day" class="text-red">За неделю: ('.$fweek.' - '.$eweek.')</span></th>
						</tr>
						<tr>
							<th style="width: 10px">#</th>
							<th>Дата звонка</th>
							<th>Время звонка</th>
							<th>Номер обращения</th>
							<th>На какой телефон звонили</th>
						</tr>
		  ';
	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { # Старт цикла
	$sql_phone = "SELECT name FROM sprav_phone WHERE id='".$row["oapc"]."'";
	$result_phone = $conn->query($sql_phone);
	$row_phone = $result_phone->fetch_assoc();
	echo '
		<tr>
			<td>'. $row["id"].'</td>
			<td>'. $row["date"].'</td>
			<td>'. $row["time"].'</td>
			<td>'. $row["tr"].'</td>
			<td>'. $row_phone["name"].'</td>
        </tr>
		';	
    }
	echo '
		</table>
		';
	}
	else {}	
}

/* Делаем запрос к БД, на вывод информации за неделю о новых записях клиентов */
function tl_ce_week() {
	global $conn; # Для запросов к БД
	global $fweek; # Первый день недели
	global $eweek; # Последний день недели
	$sql = "SELECT id, tr, date, time, dorr, torr, client, twtma FROM ce WHERE date >= '".$fweek."' AND date <= '".$eweek."' ORDER BY dorr DESC"; # Запрос о записях
	$result = $conn->query($sql);
	echo '
			<table id="date_ce" class="table table-striped">
				<tr>
					<th colspan="8"><span id="title_day" class="text-red">За неделю: ('.$fweek.' - '.$eweek.')</span></th>
				</tr>
				<tr>
					<th style="width: 10px">#</th>
					<th>Дата записи</th>
					<th>Время записи</th>
					<th>Номер обращения</th>
					<th>Клиент</th>
					<th>Записан к менеджеру</th>
					<th>Записан на дату</th>
					<th>Записан на время</th>
				</tr>
		  ';
	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { # Старт цикла
	$sql_client = "SELECT fio FROM clients WHERE id=".$row["client"]."";
	$result_client = $conn->query($sql_client);
	$row_client = $result_client->fetch_assoc();
	$sql_manager = "SELECT lastname, name, thirthname FROM users WHERE id=".$row["twtma"]."";
	$result_manager = $conn->query($sql_manager);
	$row_manager = $result_manager->fetch_assoc();
	echo '
		<tr>
			<td>'. $row["id"].'</td>
			<td>'. $row["dorr"].'</td>
			<td>'. $row["torr"].'</td>
			<td>'. $row["tr"].'</td>
			<td>'. $row_client["fio"].'</td>
			<td>'. $row_manager["lastname"].' '. $row_manager["name"].' '. $row_manager["thirthname"].'</td>
			<td>'. $row["date"].'</td>
			<td>'. $row["time"].'</td>
        </tr>
		';	
    }
	echo '
		</table>
		';
	} 
	else {}
}

/* Делаем запрос к БД, на вывод информации за неделю о новых клиентах */
function tl_client_week() {
	global $conn; # Для запросов к БД
	global $fweek; # Первый день недели
	global $eweek; # Последний день недели
	$sql = "SELECT id, fio, number, dorr, torr FROM clients WHERE dorr >= '".$fweek."' AND dorr <= '".$eweek."' ORDER BY dorr DESC"; # Запрос о клиентах
	$result = $conn->query($sql);
	echo '
			<table id="date_client" class="table table-striped">
				<tr>
				<th colspan="4"><span id="title_day" class="text-red">За неделю: ('.$fweek.' - '.$eweek.')</span></th>
				</tr>
				<tr>
					<th style="width: 10px">#</th>
					<th>Дата регистрации</th>
					<th>Время регистрации</th>
					<th>ФИО</th>
				</tr>
		  ';
	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { # Старт цикла
	echo '
		<tr>
			<td>'.$row["id"].'</td>
			<td>'.$row["dorr"].'</td>
			<td>'.$row["torr"].'</td>
			<td>'.$row["fio"].'</td>
        </tr>
		';	
    }
	echo '
		</table>
		';
	} 
	else {}
}

/* Делаем запрос к БД, на вывод информации за месяц о новых звонках */
function tl_call_month() {
	global $conn; # Для запросов к БД
	global $month; # Первый день недели
	global $cur_date; # Текущий день
	$sql = "SELECT id, tr, date, time, oapc FROM calls WHERE date >= '".$month."' AND date <= '".$cur_date."' ORDER BY date DESC"; # Запрос о звонках
	$result = $conn->query($sql);
	echo '
			<table id="date_sel" class="table table-striped">
				<tr>
					<th colspan="5"><span id="title_day" class="text-red">За месяц: ('.$month.' - '.$cur_date.')</span></th>
				</tr>
				<tr>
					<th style="width: 10px">#</th>
					<th>Дата звонка</th>
					<th>Время звонка</th>
					<th>Номер обращения</th>
					<th>На какой телефон звонили</th>
				</tr>
		  ';
	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { # Старт цикла
	$sql_phone = "SELECT name FROM sprav_phone WHERE id='".$row["oapc"]."'";
	$result_phone = $conn->query($sql_phone);
	$row_phone = $result_phone->fetch_assoc();
	echo '
		<tr>
			<td>'. $row["id"].'</td>
			<td>'. $row["date"].'</td>
			<td>'. $row["time"].'</td>
			<td>'. $row["tr"].'</td>
			<td>'. $row_phone["name"].'</td>
        </tr>
		';	
    }
	echo '
		</table>
		';
	} 
	else {}
}

/* Делаем запрос к БД, на вывод информации за месяц о новых записях клиентов */
function tl_ce_month() {
	global $conn; # Для запросов к БД
	global $month; # Первый день недели
	global $cur_date; # Текущий день
	$sql = "SELECT id, tr, date, time, dorr, torr, client, twtma FROM ce WHERE date >= '".$month."' AND date <= '".$cur_date."' ORDER BY dorr DESC"; # Запрос о записях
	$result = $conn->query($sql);
	echo '
			<table id="date_ce" class="table table-striped">
				<tr>
					<th colspan="8"><span id="title_day" class="text-red">За месяц: ('.$month.' - '.$cur_date.')</span></th>
				</tr>
				<tr>
					<th style="width: 10px">#</th>
					<th>Дата записи</th>
					<th>Время записи</th>
					<th>Номер обращения</th>
					<th>Клиент</th>
					<th>Записан к менеджеру</th>
					<th>Записан на дату</th>
					<th>Записан на время</th>
				</tr>
		  ';
	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { # Старт цикла
	$sql_client = "SELECT fio FROM clients WHERE id=".$row["client"]."";
	$result_client = $conn->query($sql_client);
	$row_client = $result_client->fetch_assoc();
	$sql_manager = "SELECT lastname, name, thirthname FROM users WHERE id=".$row["twtma"]."";
	$result_manager = $conn->query($sql_manager);
	$row_manager = $result_manager->fetch_assoc();
	echo '
		<tr>
			<td>'. $row["id"].'</td>
			<td>'. $row["dorr"].'</td>
			<td>'. $row["torr"].'</td>
			<td>'. $row["tr"].'</td>
			<td>'. $row_client["fio"].'</td>
			<td>'. $row_manager["lastname"].' '. $row_manager["name"].' '. $row_manager["thirthname"].'</td>
			<td>'. $row["date"].'</td>
			<td>'. $row["time"].'</td>
        </tr>
		';	
    }
	echo '
		</table>
		';
	} 
	else {}
}

/* Делаем запрос к БД, на вывод информации за месяц о новых клиентах */
function tl_client_month() {
	global $conn; # Для запросов к БД
	global $month; # Первый день недели
	global $cur_date; # Текущий день
	$sql = "SELECT id, fio, number, dorr, torr FROM clients WHERE dorr >= '".$month."' AND dorr <= '".$cur_date."' ORDER BY dorr DESC"; # Запрос о клиентах
	$result = $conn->query($sql);
	echo '
			<table id="date_client" class="table table-striped">
				<tr>
				<th colspan="4"><span id="title_day" class="text-red">За месяц: ('.$month.' - '.$cur_date.')</span></th>
				</tr>
				<tr>
					<th style="width: 10px">#</th>
					<th>Дата регистрации</th>
					<th>Время регистрации</th>
					<th>ФИО</th>
				</tr>
		  ';
	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { # Старт цикла
	$sql_phone = "SELECT name FROM sprav_phone WHERE id='".$row["oapc"]."'";
	$result_phone = $conn->query($sql_phone);
	$row_phone = $result_phone->fetch_assoc();
	echo '
		<tr>
			<td>'.$row["id"].'</td>
			<td>'.$row["dorr"].'</td>
			<td>'.$row["torr"].'</td>
			<td>'.$row["fio"].'</td>
        </tr>
		';	
    }
	echo '
		</table>
		';
	} 
	else {}
}

/* Делаем запрос к БД, на вывод информации за определенный день о новых звонках */
function tl_call_v() {
	global $conn; # Для запросов к БД
	$type = (string)$_GET['date']; # Получаем выбранную дату
	$sql = "SELECT id, tr, date, time, oapc FROM calls WHERE date = '".$type."' ORDER BY date DESC"; # Запрос о звонках
	$result = $conn->query($sql);
	echo '
			<table id="date_sel" class="table table-striped">
				<tr>
					<th colspan="5"><span id="title_day" class="text-red">За дату: ('.$type.')</span></th>
				</tr>
				<tr>
					<th style="width: 10px">#</th>
					<th>Дата звонка</th>
					<th>Время звонка</th>
					<th>Номер обращения</th>
					<th>На какой телефон звонили</th>
				</tr>
		  ';
	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { # Старт цикла
	$sql_phone = "SELECT name FROM sprav_phone WHERE id='".$row["oapc"]."'";
	$result_phone = $conn->query($sql_phone);
	$row_phone = $result_phone->fetch_assoc();
	echo '
		<tr>
			<td>'. $row["id"].'</td>
			<td>'. $row["date"].'</td>
			<td>'. $row["time"].'</td>
			<td>'. $row["tr"].'</td>
			<td>'. $row_phone["name"].'</td>
        </tr>
		';	
    }
	echo '
		</table>
		';
	} 
	else {}
}

/* Делаем запрос к БД, на вывод информации за определенный день о новых записях клиентов */
function tl_ce_v() {
	global $conn; # Для запросов к БД
	$type_ce = (string)$_GET['date_ce']; # Получаем выбранную дату
	$sql = "SELECT id, tr, date, time, dorr, torr, client, twtma FROM ce WHERE date  = '$type_ce' ORDER BY dorr DESC"; # Запрос о записях
	$result = $conn->query($sql);
	echo '
			<table id="date_ce" class="table table-striped">
				<tr>
					<th colspan="8"><span id="title_day" class="text-red">За день: ('.$type_ce.')</span></th>
				</tr>
				<tr>
					<th style="width: 10px">#</th>
					<th>Дата записи</th>
					<th>Время записи</th>
					<th>Номер обращения</th>
					<th>Клиент</th>
					<th>Записан к менеджеру</th>
					<th>Записан на дату</th>
					<th>Записан на время</th>
				</tr>
		  ';
	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { # Старт цикла
	$sql_client = "SELECT fio FROM clients WHERE id=".$row["client"]."";
	$result_client = $conn->query($sql_client);
	$row_client = $result_client->fetch_assoc();
	$sql_manager = "SELECT lastname, name, thirthname FROM users WHERE id=".$row["twtma"]."";
	$result_manager = $conn->query($sql_manager);
	$row_manager = $result_manager->fetch_assoc();
	echo '
		<tr>
			<td>'. $row["id"].'</td>
			<td>'. $row["dorr"].'</td>
			<td>'. $row["torr"].'</td>
			<td>'. $row["tr"].'</td>
			<td>'. $row_client["fio"].'</td>
			<td>'. $row_manager["lastname"].' '. $row_manager["name"].' '. $row_manager["thirthname"].'</td>
			<td>'. $row["date"].'</td>
			<td>'. $row["time"].'</td>
        </tr>
		';	
    }
	echo '
		</table>
		';
	} 
	else {}
}

/* Делаем запрос к БД, на вывод информации за определенный день о новых клиентах */
function tl_client_v() {
	global $conn; # Для запросов к БД
	$type_client = (string)$_GET['date_client']; # Получаем выбранную дату
	$sql = "SELECT id, fio, number, dorr, torr FROM clients WHERE dorr='$type_client' ORDER BY dorr DESC"; # Запрос о клиентах
	$result = $conn->query($sql);
	echo '
			<table id="date_client" class="table table-striped">
				<tr>
				<th colspan="4"><span id="title_day" class="text-red">За день: ('.$type_client.')</span></th>
				</tr>
				<tr>
					<th style="width: 10px">#</th>
					<th>День регистрации</th>
					<th>Время регистрации</th>
					<th>ФИО</th>
				</tr>
		  ';
	if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { # Старт цикла
	$sql_phone = "SELECT name FROM sprav_phone WHERE id='".$row["oapc"]."'";
	$result_phone = $conn->query($sql_phone);
	$row_phone = $result_phone->fetch_assoc();
	echo '
		<tr>
			<td>'.$row["id"].'</td>
			<td>'.$row["dorr"].'</td>
			<td>'.$row["torr"].'</td>
			<td>'.$row["fio"].'</td>
        </tr>
		';	
    }
	echo '
		</table>
		';
	} 
	else {}
}
/* Делаем запрос к БД, на вывод информации всех звонков */
function calls() {
	global $conn; # Для запросов к БД
	global $manager; # Текущий пользователь в системе
	$sql = "SELECT * FROM calls ORDER BY id DESC"; # Запрос
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo '
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped display responsive nowrap" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>№ обращения</th>
										<th>Дата звонка</th>
										<th>Время звонка</th>
										<th>Ф.И.О.</th>
										<th>Номер звонившего</th>
										<th>Куда звонили</th>
										<th>Действие</th>
									</tr>
								</thead>
				';
		while($row = $result->fetch_assoc()) {
			echo '
				<tr>
					<td>'.$row["tr"].'</td>
					<td>'.$row["date"].'</td>
					<td>'.$row["time"].'</td>
					<td>'.$row["fio"].'</td>
					<td>'.$row["number"].'</td>
				  ';
				  $sqls3 = "SELECT * FROM sprav_phone WHERE id=".$row['oapc']."";
				  $results3 = $conn->query($sqls3);
				  $rows3 = $results3->fetch_assoc();
                  echo'<td>'.$rows3["name"].'</td>
				  <td><a href="calls_info?id='.$row["id"].'"><span class="label label-warning">Подробнее</span></a></td></tr>';
			}
		echo'
             <tfoot>
               <tr>
				<th>№ обращения</th>
                <th>Дата звонка</th>
                <th>Время звонка</th>
                <th>Ф.И.О.</th>
                <th>Номер звонившего</th>
                <th>Куда звонили</th>
				<th>Действие</th>
               </tr>
             </tfoot>
			</table>
            </div>
          </div>
        </div>
      </div>
			';		
}  
else {
	echo '
		<div class="box">
			<div class="box-header with-border">
				<h3 class="text-red box-title">Записей нет</h3>
			</div>
		</div>
		';
}
}

/* Делаем запрос к БД, на вывод групп клиентов в справочнике */
function sprav_client_group() {
	global $conn; # Для запросов к БД
	$sql = "SELECT * FROM sprav_client_group WHERE id != '0' LIMIT 5"; # Запрос
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo '
			<table id="table_client" class="table table-bordered">
				<tr>
					<th style="width: 10px">#</th>
					<th>Группа</th>
					<th>Повтор, через кол-во дней</th>
					<th>Действия</th>
                </tr>
			';
		while($row = $result->fetch_assoc()) { # Старт цикла
			echo'
				<tr>
					<td>'.$row["id"].'</td>';
				if ($row["day_repeat"]=='0') {
					echo'<td>'.$row["name"].'</td> <td>Без повторного напоминания</td>';
				}
				else {
					echo'<td>'.$row["name"].'</td> <td>'.$row["day_repeat"].' дней</td>';  
				}
                echo'
					<td>
						<a href="?type=sprav_edit&id='.$row["id"].'" style="cursor:pointer;"><span class="label label-warning">Редактировать</span></a>
						<a href="?type=sprav_drop&id='.$row["id"].'" style="cursor:pointer;"><span class="label label-danger">Удалить</span></a>
					</td>
                  </tr>
				  ';
		}
		echo'
			<tr>
			<td colspan=3>
			<form id="valid_add_group">
			<div style="width:100%;" class="input-group input-group-sm">
			<span class="input-group-btn">
                      <a href="?type=sprav_add" type="submit" class="btn btn-info btn-flat">Добавить</a>
                    </span>
              </div>
			</form>
			</td>
			</tr>
			</table>
			';
	}
}
/* Делаем запрос к БД, на вывод групп клиентов в справочнике (выборка) */
function sprav_client_group_adv() {
	global $conn; # Для запросов к БД
	$get_id = (int)$_GET['id_select']; # Получаем количество отображения
	$sql = "SELECT * FROM sprav_client_group WHERE `id`!='0' AND`id`>'0' AND `id`<='999' LIMIT $get_id"; # Запрос
	$result = $conn->query($sql);

			echo '<table id="table_client" class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Группа</th>
				  <th>Повтор, через кол-во дней</th>
                  <th>Действия</th>
                </tr>';
			while($row = $result->fetch_assoc()) {
			echo'<tr>
                  <td>'.$row["id"].'</td>';
				  if ($row["day_repeat"]=='0') {
                  echo'<td>'.$row["name"].'</td> <td>Без повторного напоминания</td>';
				  }
				  else {
				  echo'<td>'.$row["name"].'</td> <td>'.$row["day_repeat"].' дней</td>';  
				  }
                  echo'<td>
				  <a href="?type=sprav_edit&id='.$row["id"].'" style="cursor:pointer;"><span class="label label-warning">Редактировать</span></a>
				  <a href="?type=sprav_drop&id='.$row["id"].'" style="cursor:pointer;"><span class="label label-danger">Удалить</span></a>
				 </td>
                </tr>';
			}
			
			echo'
			<tr>
			<td colspan=3>
			<form id="valid_add_group">
			<div style="width:100%;" class="input-group input-group-sm">
			<span class="input-group-btn">
                      <a href="?type=sprav_add" type="submit" class="btn btn-info btn-flat">Добавить</a>
                    </span>
              </div>
			</form>
			</td>
			</tr>
			</table>';
}

/* Делаем запрос к БД, на вывод как о нас узнали в справочнике */
function sprav_foas() {
	global $conn; # Для запросов к БД
	$sql = "SELECT * FROM sprav_foas WHERE id != '0' LIMIT 5"; # Запрос
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo '<table id="table_foas" class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Название</th>
                  <th>Действия</th>
                </tr>';
		while($row = $result->fetch_assoc()) { # Старт цикла
			echo'<tr>
                  <td>'.$row["id"].'</td>
                  <td>'.$row["name"].'</td>
                  <td>
				  <a href="?type=sprav_foas_edit&id='.$row["id"].'" style="cursor:pointer;"><span class="label label-warning">Редактировать</span></a>
				  <a href="?type=sprav_foas_drop&id='.$row["id"].'" style="cursor:pointer;"><span class="label label-danger">Удалить</span></a>';
				 echo' </td>
                </tr>';
		}
		echo'
			<tr>
			<td colspan=3>
			<form id="valid_add_group">
			<div style="width:100%;" class="input-group input-group-sm">
			<span class="input-group-btn">
                      <a href="?type=sprav_foas_add" type="submit" class="btn btn-info btn-flat">Добавить</a>
                    </span>
              </div>
			</form>
			</td>
			</tr>
			</table>';
			}
}
/* Делаем запрос к БД, на вывод как о нас узнали в справочнике (выборка) */
function sprav_foas_adv() {
	global $conn; # Для запросов к БД
	$get_id = (int)$_GET['id_select'];
	$sql = "SELECT * FROM sprav_foas WHERE `id`!='0' AND`id`>='0' AND `id`<='999' LIMIT $get_id"; # Запрос
	$result = $conn->query($sql);

			echo '<table id="table_foas" class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Название</th>
                  <th>Действия</th>
                </tr>';
			while($row = $result->fetch_assoc()) { # Цикл
			echo'<tr>
                  <td>'.$row["id"].'</td>
                  <td>'.$row["name"].'</td>
                  <td>
				  <a href="?type=sprav_foas_edit&id='.$row["id"].'" style="cursor:pointer;"><span class="label label-warning">Редактировать</span></a>
				  <a href="?type=sprav_foas_drop&id='.$row["id"].'" style="cursor:pointer;"><span class="label label-danger">Удалить</span></a>';
				 echo' </td>
                </tr>';
			}
			
			echo'
			<tr>
			<td colspan=3>
			<form id="valid_add_group">
			<div style="width:100%;" class="input-group input-group-sm">
			<span class="input-group-btn">
                      <a href="?type=sprav_foas_add" type="submit" class="btn btn-info btn-flat">Добавить</a>
                    </span>
              </div>
			</form>
			</td>
			</tr>
			</table>';
}

/* Делаем запрос к БД, на вывод телефонов в справочнике */
function sprav_phone() {
	global $conn; # Для запросов к БД
	$sql = "SELECT * FROM sprav_phone WHERE id != '0' LIMIT 5"; # Запрос
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		echo '<table id="table_phone" class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Название</th>
                  <th>Действия</th>
                </tr>';
	while($row = $result->fetch_assoc()) { # Старт цикла
		echo'<tr>
                  <td>'.$row["id"].'</td>
                  <td>'.$row["name"].'</td>
                  <td>
				  <a href="?type=sprav_phone_edit&id='.$row["id"].'" style="cursor:pointer;"><span class="label label-warning">Редактировать</span></a>
				  <a href="?type=sprav_phone_drop&id='.$row["id"].'" style="cursor:pointer;"><span class="label label-danger">Удалить</span></a>
				 </td>
                </tr>';
			}
			
	echo'
			<tr>
			<td colspan=3>
			<form id="valid_add_group">
			<div style="width:100%;" class="input-group input-group-sm">
			<span class="input-group-btn">
                      <a href="?type=sprav_phone_add" type="submit" class="btn btn-info btn-flat">Добавить</a>
                    </span>
              </div>
			</form>
			</td>
			</tr>
			</table>';
	}
}
/* Делаем запрос к БД, на вывод телефонов в справочнике (выборка) */
function sprav_phone_adv() {
	global $conn; # Для запросов к БД
	$get_id = (int)$_GET['id_select'];
	$sql = "SELECT * FROM sprav_phone WHERE `id` != '0' AND `id`>='0' AND `id`<='999' LIMIT $get_id"; # Запрос
	$result = $conn->query($sql);
		echo '<table id="table_phone" class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Название</th>
                  <th>Действия</th>
                </tr>';
	while($row = $result->fetch_assoc()) { # Старт цикла
		echo'<tr>
                  <td>'.$row["id"].'</td>
                  <td>'.$row["name"].'</td>
                  <td>
				  <a href="?type=sprav_phone_edit&id='.$row["id"].'" style="cursor:pointer;"><span class="label label-warning">Редактировать</span></a>
				  <a href="?type=sprav_phone_drop&id='.$row["id"].'" style="cursor:pointer;"><span class="label label-danger">Удалить</span></a>
				 </td>
                </tr>';
			}
			echo'
			<tr>
			<td colspan=3>
			<form id="valid_add_group">
			<div style="width:100%;" class="input-group input-group-sm">
			<span class="input-group-btn">
                      <a href="?type=sprav_phone_add" type="submit" class="btn btn-info btn-flat">Добавить</a>
                    </span>
              </div>
			</form>
			</td>
			</tr>
			</table>';
}

/* Делаем запрос к БД, на вывод причин обращения в справочнике */
function sprav_wia() {
	global $conn; # Для запросов к БД
	$sql = "SELECT * FROM sprav_wia WHERE id != '0' LIMIT 5"; # Запрос
	$result = $conn->query($sql); 
	if ($result->num_rows > 0) {
		echo '<table id="table_wia" class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Название</th>
                  <th>Действия</th>
                </tr>';
	while($row = $result->fetch_assoc()) { # Старт цикла
		echo'<tr>
                  <td>'.$row["id"].'</td>
                  <td>'.$row["name"].'</td>
                  <td>
				  <a href="?type=sprav_wia_edit&id='.$row["id"].'" style="cursor:pointer;"><span class="label label-warning">Редактировать</span></a>
				  <a href="?type=sprav_wia_drop&id='.$row["id"].'" style="cursor:pointer;"><span class="label label-danger">Удалить</span></a>
				 </td>
                </tr>';
			}
			
	echo'
			<tr>
			<td colspan=3>
			<form id="valid_add_group">
			<div style="width:100%;" class="input-group input-group-sm">
			<span class="input-group-btn">
                      <a href="?type=sprav_wia_add" type="submit" class="btn btn-info btn-flat">Добавить</a>
                    </span>
              </div>
			</form>
			</td>
			</tr>
			</table>';
			}
}

/* Делаем запрос к БД, на вывод причин обращения в справочнике (выборка) */
function sprav_wia_adv() {
	global $conn; # Для запросов к БД
	$get_id = (int)$_GET['id_select'];
	$sql = "SELECT * FROM sprav_wia WHERE id != '0' AND `id`>='0' AND `id`<='999' LIMIT $get_id"; # Запрос
	$result = $conn->query($sql);
			echo '<table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Название</th>
                  <th>Действия</th>
                </tr>';
			while($row = $result->fetch_assoc()) { # Старт цикла
			echo'<tr>
                  <td>'.$row["id"].'</td>
                  <td>'.$row["name"].'</td>
                  <td>
				  <a href="?type=sprav_wia_edit&id='.$row["id"].'" style="cursor:pointer;"><span class="label label-warning">Редактировать</span></a>
				  <a href="?type=sprav_wia_drop&id='.$row["id"].'" style="cursor:pointer;"><span class="label label-danger">Удалить</span></a>
				 </td>
                </tr>';
			}
			
			echo'
			<tr>
			<td colspan=3>
			<form id="valid_add_group">
			<div style="width:100%;" class="input-group input-group-sm">
			<span class="input-group-btn">
                      <a href="?type=sprav_wia_add" type="submit" class="btn btn-info btn-flat">Добавить</a>
                    </span>
              </div>
			</form>
			</td>
			</tr>
			</table>';
}
?>