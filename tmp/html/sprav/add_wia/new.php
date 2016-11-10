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
$color = $_POST['background'];

$sqls5 = "SELECT * FROM system_config_colorchart WHERE hex='".$color."'";
$results5 = $conn->query($sqls5);
$rows5 = $results5->fetch_assoc();
$nam_color=$rows5["name"];

$sql = ("INSERT INTO sprav_wia (id, name, dorr, torr, manager, color, nam_color) VALUES ('', '$name', '$dorr', '$torr', '$manager', '$color', '$nam_color')");
$result = $conn->query($sql);
header('location:../../../../admin?type=sprav');

?>