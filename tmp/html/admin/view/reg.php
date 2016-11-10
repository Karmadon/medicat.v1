<?php
require_once('../conn.php');
$name = $_POST['name'];
$lastname = $_POST['lastname'];
$username = $_POST['username']; 
$password = $_POST['password']; 
$groupd_id = $_POST['groupd_id']; 
$hash=md5($password);

$sql = ("INSERT INTO users (id, name, lastname, groupd_id, username, password) VALUES ('', '$name', '$lastname', '$groupd_id', '$username', '$hash')");
$result = $conn->query($sql);
header('location:../../../admin');
?>

