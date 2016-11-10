<?php
/* Сессия */
session_start(); # Старт сессии
if(empty($_SESSION['result']['id'])) { # Если сессии нет, то перебрасываем на главную
header('location:index.php');
}

/* Подключаем системные файлы */
require_once ('classes/router.php'); # Маршрутизатор
require_once ('classes/conn.php'); # БД
require_once ('classes/userClass.php'); # Пользователи системы

/* Создаем экземпляры  */
$userObj = new USER();  # Текущий пользователь
$router = new router(); # Маршрутизатор
$router->setBasePath('');

/* Подключаем файлы */
require_once ('classes/var.php'); # Основные переменные
require_once ('classes/bd_requests.php'); # Запросы к БД

/* Строим основные маршруты  */
$router->map('GET','/profile', 'tmp/main.tpl.php', 'main'); # Стартовая страница
$router->map('GET','/timeline', 'tmp/timeline.tpl.php', 'timeline'); # Таймлайн
$router->map('GET','/ce', 'tmp/ce.tpl.php', 'ce'); # Запись клиентов
$router->map('GET','/calls', 'tmp/calls.tpl.php', 'calls'); # Звонки
$router->map('GET','/clients', 'tmp/clients.tpl.php', 'clients'); # Клиенты
$router->map('GET','/stat', 'tmp/stat.tpl.php', 'stat'); # Статистика
$router->map('GET','/admin', 'tmp/admin.tpl.php', 'admin'); # Администрирование
$router->map('GET','/log', 'tmp/log.tpl.php', 'log'); # Логирование

/* Строим дополнительные маршруты  */
$router->map('GET','/new_client', 'tmp/new_client.tpl.php', 'new_client'); # Добавление нового клиента
$router->map('GET','/clients_edit', 'tmp/clients_edit.tpl.php', 'clients_edit'); # Редактирование клиента
$router->map('GET','/clients_info', 'tmp/clients_info.tpl.php', 'clients_info'); # Просмотр данных о клиенте
$router->map('GET','/clients_old', 'tmp/clients_old.tpl.php', 'clients_old'); # Просмотр старых (логирование) данных о клиенте
$router->map('GET','/new_call', 'tmp/new_call.tpl.php', 'new_call'); # Добавление нового звонка
$router->map('GET','/calls_info', 'tmp/calls_info.tpl.php', 'calls_info'); # Просмотр данных о звонке
$router->map('GET','/new_ce', 'tmp/new_ce.tpl.php', 'new_ce'); # Добавление новой записи
$router->map('GET','/ce_edit', 'tmp/ce_edit.tpl.php', 'ce_edit'); # Редактирование записи
$router->map('GET','/ce_info', 'tmp/ce_info.tpl.php', 'ce_info'); # Просмотр данных о записи
$router->map('GET','/ce_info_status', 'tmp/ce_info_status.tpl.php', 'ce_info_status'); # Просмотр данных о статусе записи (логирование)
$router->map('GET','/ce_old', 'tmp/ce_old.tpl.php', 'ce_old'); # Просмотр старых (логирование) данных о записи
$router->map('GET','/ce_status', 'tmp/ce_status.tpl.php', 'ce_status'); # Редактирование статуса записи
$router->map('GET','/repeat_status', 'tmp/repeat_status.tpl.php', 'repeat_status'); # Редактирование повторного напоминания

/* Проверка вводимого адреса в браузере на совпадение с маршрутами */
$match = $router->match();
if($match) {
  require $match['target']; # Маршрут найден
}
else {
  header("HTTP/1.0 404 Not Found");
  require '404.html'; # Маршрут не найден, выводим ошибку
}
?>