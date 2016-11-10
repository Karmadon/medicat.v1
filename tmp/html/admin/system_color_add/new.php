<?php
session_start();
require_once('../../conn.php');
$name = $_POST['name'];
$hex = $_POST['hex'];

$sql = ("INSERT INTO system_config_colorchart (id, name, hex) VALUES ('', '$name', '$hex')");
$result = $conn->query($sql);
header('location:/admin?type=system_color');

?>

