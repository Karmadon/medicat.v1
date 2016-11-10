<?php
session_start();
require_once('../../../../classes/userClass.php');
$userObj = new USER();
$userInfo = $userObj->getUserById($_SESSION['result']['id']);
$manager = $userInfo['result']['id'];
require_once('../../conn.php');
$sqlid = "SELECT groupd_id FROM users WHERE id='$manager'";
$resultid = $conn->query($sqlid);
$rowid = $resultid->fetch_assoc();


$torr = date("H:i");
$dorr = date("d.m.Y");
$id = (int)$_GET['id'];


$sql = "DELETE FROM sprav_wia WHERE id=$id";
$result = $conn->query($sql);
$sql2 = "UPDATE calls SET wia='0' WHERE wia=$id";
$result2 = $conn->query($sql2);
$sql3 = "UPDATE ce SET wia='0' WHERE wia=$id";
$result3 = $conn->query($sql3);
header('location:../../../../admin?type=sprav');

?>

