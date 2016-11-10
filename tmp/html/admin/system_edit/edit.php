<?php
session_start();
$get_id = (int)$_GET['id_user'];
require_once('../../conn.php');
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$username = $_POST['username']; 
$thirthname = $_POST['thirthname']; 
$password = $_POST['password']; 
$hash=md5($password);
$color = $_POST['background'];

$sqls5 = "SELECT * FROM system_config_colorchart WHERE hex='".$color."'";
$results5 = $conn->query($sqls5);
$rows5 = $results5->fetch_assoc();
$nam_color=$rows5["name"];

$sql = ("UPDATE users SET name='$name', lastname='$lastname', thirthname='$thirthname', color='$color', nam_color='$nam_color', username='$username', password='$hash' WHERE id='$get_id'");
$result = $conn->query($sql);
header('location:/admin?type=system');
?>

