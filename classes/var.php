<?php
/* Даты */
$cur_date = date("Y-m-d"); # Текущая
$fweek = date ("Y-m-d", time() - (date("N")-1) * 24*60*60); # Первый день недели
$eweek = date ("Y-m-d", time() - (-6 + date("N")-1) * 24*60*60); # Последний день недели
$month = date("Y-m-d",strtotime("-1 months")); # Месяц

/* Текущий пользователь в системе */
$userInfo = $userObj->getUserById($_SESSION['result']['id']); # Запрос информации о пользователе по текущей сессии
$manager = $userInfo['result']['id']; # Назначение переменной
?>