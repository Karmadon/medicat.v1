<?php
session_start();
require_once('../../conn.php');
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$thirthname = $_POST['thirthname'];
$username = $_POST['username']; 
$color = $_POST['background'];
$password = $_POST['password']; 
$groupd_id = $_POST['groupd_id']; 
$hash=md5($password);

$sqls5 = "SELECT * FROM system_config_colorchart WHERE hex='".$color."'";
$results5 = $conn->query($sqls5);
$rows5 = $results5->fetch_assoc();
$nam_color=$rows5["name"];

$sql = ("INSERT INTO users (id, name, lastname, thirthname, groupd_id, color, nam_color, username, password, status) VALUES ('', '$name', '$lastname', '$thirthname', '$groupd_id', '$color', '$nam_color', '$username', '$hash', '1')");
$result = $conn->query($sql);
header('location:/admin?type=view_user');

?>

