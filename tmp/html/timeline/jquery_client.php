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
$type_client = $_GET['date_client']; # Получаем тип вывода записей клиентов
if ($type_client == 'Неделя') {
	tl_client_week();
}
elseif ($type_client == 'Сегодня') {
	tl_client_today();
}
elseif ($type_client == 'Месяц') {
	tl_client_month();
}
else {
tl_client_v();
}
?>

            