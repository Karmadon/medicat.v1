<?php
session_start();
$get_id = (int)$_GET['id'];
require_once('../../conn.php');
$sql = "SELECT name, hex FROM system_config_colorchart WHERE id='".$get_id."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$sql2 = "UPDATE sprav_client_group SET color='#D7D7D7', nam_color='Цвет был удален' WHERE nam_color='".$row["name"]."'";
$result2 = $conn->query($sql2);

$sql3 = "UPDATE sprav_foas SET color='#D7D7D7', nam_color='Цвет был удален' WHERE nam_color='".$row["name"]."'";
$result3 = $conn->query($sql3);

$sql4 = "UPDATE sprav_phone SET color='#D7D7D7', nam_color='Цвет был удален' WHERE nam_color='".$row["name"]."'";
$result4 = $conn->query($sql4);

$sql5 = "UPDATE sprav_wia SET color='#D7D7D7', nam_color='Цвет был удален' WHERE nam_color='".$row["name"]."'";
$result5 = $conn->query($sql5);

$sql6 = "UPDATE users SET color='#D7D7D7', nam_color='Цвет был удален' WHERE nam_color='".$row["name"]."'";
$result6 = $conn->query($sql6);

$sql = "DELETE FROM system_config_colorchart WHERE id=$get_id";
$result = $conn->query($sql);

header('location:/admin?type=system_color');

?>

