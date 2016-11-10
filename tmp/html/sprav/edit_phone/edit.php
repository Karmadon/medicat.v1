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
$id = (int)$_GET['id'];

$sqls1 = "SELECT * FROM sprav_phone WHERE id='".$id."'";
$results1 = $conn->query($sqls1);
$rows1 = $results1->fetch_assoc();
$namenow=$rows1["name"];

if ($name==$namenow) {$a=$name;}
else {
$a = substr_replace($name, "(", 0, 0);
$a = substr_replace($a, ")", 4, 0);
$a = substr_replace($a, "-", 8, 0);
$a = substr_replace($a, "-", 11, 0);
$a = substr_replace($a, "+38", 0, 0);
$a = substr_replace($a, " ", 3, 0);
$a = substr_replace($a, " ", 9, 0);
}
$color = $_POST['background'];

$sqls5 = "SELECT * FROM system_config_colorchart WHERE hex='".$color."'";
$results5 = $conn->query($sqls5);
$rows5 = $results5->fetch_assoc();
$nam_color=$rows5["name"];

$sql = ("UPDATE sprav_phone SET name='$a', torr='$torr', dorr='$dorr', manager='$manager', color='$color', nam_color='$nam_color' WHERE id='$id'");
$result = $conn->query($sql);
header('location:../../../../admin?type=sprav');

?>