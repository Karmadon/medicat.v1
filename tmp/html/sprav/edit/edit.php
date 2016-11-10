<?php
session_start();
require_once('../../../../classes/userClass.php');
$userObj = new USER();
$userInfo = $userObj->getUserById($_SESSION['result']['id']);
$manager = $userInfo['result']['id'];

require_once('../../conn.php');
$torr = date("H:i");
$dorr = date("d.m.Y");
$name = $_POST['name'];
$day =  $_POST['day'];
$id = (int)$_GET['id'];
$color = $_POST['background'];

$sqls5 = "SELECT * FROM system_config_colorchart WHERE hex='".$color."'";
$results5 = $conn->query($sqls5);
$rows5 = $results5->fetch_assoc();
$nam_color=$rows5["name"];

$sql = ("UPDATE sprav_client_group SET name='$name', day_repeat='$day', torr='$torr', dorr='$dorr', manager='$manager', color='$color', nam_color='$nam_color' WHERE id='$id'");
$result = $conn->query($sql);
header('location:../../../../admin?type=sprav');

?>