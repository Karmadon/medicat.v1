<?php
session_start();
$get_id = (int)$_GET['id'];
require_once('../../../classes/userClass.php');
$userObj = new USER();
$userInfo = $userObj->getUserById($_SESSION['result']['id']);
$manager = $userInfo['result']['id'];
require_once('../conn.php');
$torr = date("H:i");
$dorr = date("Y-m-d");
$status = $_POST['status'];

$sql_repeat = ("UPDATE repeat_ce SET status='".$status."' WHERE id='".$get_id."'");
$result = $conn->query($sql_repeat);

$sql_repeat_log = ("INSERT INTO log_repeat (id, id_repeat_ce, type, dorr, torr, manager) VALUES ('', '$get_id', 'Изменен статус напоминания', '$dorr', '$torr', '$manager')");
$result = $conn->query($sql_repeat_log);
header('location:../../../profile');
?>