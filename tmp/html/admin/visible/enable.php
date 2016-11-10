<?php
session_start();
$get_id = (int)$_GET['id'];
require_once('tmp/html/conn.php');
$sql = ("UPDATE users SET status='1'  WHERE id='$get_id'");
$result = $conn->query($sql);
header('location:/admin?type=view_user');

?>

