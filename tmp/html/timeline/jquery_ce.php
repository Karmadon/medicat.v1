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
$type_ce = $_GET['date_ce']; # Получаем тип вывода записей клиентов
if ($type_ce == 'Неделя') {
	tl_ce_week();
}
elseif ($type_ce == 'Сегодня') {
	tl_ce_today();
}
elseif ($type_ce == 'Месяц') {
	tl_ce_month();
}
else {
tl_ce_v();
}
?>

            