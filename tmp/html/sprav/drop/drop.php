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


$sql = "DELETE FROM sprav_client_group WHERE id=$id";
$result = $conn->query($sql);
$sql2 = "UPDATE clients SET groups='0' WHERE groups=$id";
$result2 = $conn->query($sql2);
$sql3 = "UPDATE log_client_old SET groups='0' WHERE groups=$id";
$result3 = $conn->query($sql3);
header('location:../../../../admin?type=sprav');

?>