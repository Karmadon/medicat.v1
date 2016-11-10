<?php
session_start(); # Старт сессии
if(empty($_SESSION['result']['id'])) { # Если сессии нет, то перебрасываем на главную
header('location:index.php');
}
require_once ('../../../classes/userClass.php'); # Пользователи системы
$userObj = new USER();  # Текущий пользователь
require_once('../../../classes/conn.php'); # Подключаем БД
require_once('../../../classes/var.php'); # Подключаем переменные
require_once ('../../../classes/bd_requests.php'); # Для запросов к БД
$type = $_GET['date']; # Получаем тип вывода звонков
if ($type == 'Неделя') {
	main_day_all_week();
}
elseif ($type == 'Сегодня') {
	main_day_all_today();
}
elseif ($type == 'Месяц') {
	main_day_all_month();
}
else {
main_day_all_v();
}
?>

            