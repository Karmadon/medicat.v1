<?php
session_start();
$get_id = (int)$_GET['id_color'];
require_once('../../conn.php');
$name = $_POST['name'];
$hex = $_POST['hex'];

$sql = ("UPDATE system_config_colorchart SET name='$name', hex='$hex' WHERE id='$get_id'");
$result = $conn->query($sql);
header('location:/admin?type=system_color');
?>

