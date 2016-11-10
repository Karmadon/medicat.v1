<?php
session_start();
require_once('../../../classes/userClass.php');
$userObj = new USER();
$userInfo = $userObj->getUserById($_SESSION['result']['id']);
$manager = $userInfo['result']['id'];
require_once('../conn.php');
$torr = date("H:i");
$dorr = date("Y-m-d");

$tr = $_POST['tr'];
$lastname = $_POST['lastname'];
$name = $_POST['name'];
$thirthname = $_POST['thirthname'];
$fio="".$lastname." ".$name." ".$thirthname."";
$male = $_POST['male']; 
$dob = $_POST['dob']; 
$number = $_POST['number']; 
$a = substr_replace($number, "(", 0, 0);
$a = substr_replace($a, ")", 4, 0);
$a = substr_replace($a, "-", 8, 0);
$a = substr_replace($a, "-", 11, 0);
$a = substr_replace($a, "+38", 0, 0);
$a = substr_replace($a, " ", 3, 0);
$a = substr_replace($a, " ", 9, 0);
$email = $_POST['email']; 
$note = $_POST['note']; 
$groups = $_POST['groups']; 

$pre = ("SELECT COUNT(*) as fio FROM clients WHERE fio LIKE '%".$fio."%' AND dob='".$dob."'");
$result_pre = $conn->query($pre);
$row_pre = $result_pre->fetch_assoc();
if ($row_pre["fio"]=='1') {
header('location:../../../new_client?add=error');
}

else {
$sql = ("INSERT INTO clients (id, fio, tr, male, dob, number, email, note, dorr, torr, manager,groups,status) VALUES ('', '$fio', '$tr', '$male', '$dob', '$a', '$email', '$note', '$dorr', '$torr', '$manager','$groups','1')");
$result = $conn->query($sql);
$id_client=mysqli_insert_id($conn);

$sql2 = ("INSERT INTO log_client (id, id_client, type, dorr, torr, manager) VALUES ('', '$id_client', 'Создан новый клиент', '$dorr', '$torr', '$manager')");
$result2 = $conn->query($sql2);
header('location:../../../clients');
}




?>