<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();
$get_id = (int)$_GET['id'];
require_once('../../../classes/userClass.php');
$userObj = new USER();
$userInfo = $userObj->getUserById($_SESSION['result']['id']);
$manager = $userInfo['result']['id'];
require_once('../conn.php');
$torr = date("H:i");
$dorr = date("Y-m-d");

$lastname = $_POST['lastname'];
$name = $_POST['name'];
$thirthname = $_POST['thirthname'];
$fio="".$lastname." ".$name." ".$thirthname."";
$tr = $_POST['tr'];
$dob = $_POST['dob'];
$male = $_POST['male'];
$number = $_POST['number'];
$mail = $_POST['email'];
$note = $_POST['note'];
$groups = $_POST['groups'];




$sql_backup = ("SELECT * from clients WHERE id='$get_id'");
$result_backup = $conn->query($sql_backup);
$row_backup = $result_backup->fetch_assoc();
$b_id_osn = $row_backup["id"]; 
$b_fio = $row_backup["fio"];
$b_tr = $row_backup["tr"];
$b_male = $row_backup["male"];
$b_dob = $row_backup["dob"];
$b_number = $row_backup["number"];
$b_email = $row_backup["email"];
$b_note = $row_backup["note"];
$b_dorr = $row_backup["dorr"];
$b_torr = $row_backup["torr"];
$b_manager = $row_backup["manager"];
$b_groups = $row_backup["groups"];
$b_status = $row_backup["status"];

$sql2 = ("INSERT INTO log_client (id, id_client, type, dorr, torr, manager) VALUES ('', '$b_id_osn', 'Изменены данные о клиенте', '$dorr', '$torr', '$manager')");
$result2 = $conn->query($sql2);
$id_for_log=mysqli_insert_id($conn);

$sql_b_add = ("INSERT INTO log_client_old (id, id_osn, id_for_log, fio, tr, male, dob, number, email, note, dorr, torr, manager, groups, status) VALUES ('', '$b_id_osn', '$id_for_log', '$b_fio', '$b_tr', '$b_male', '$b_dob', '$b_number', '$b_email', '$b_note', '$b_dorr', '$b_torr', '$b_manager', '$b_groups', '$b_status')");
$result_b_add = $conn->query($sql_b_add);

$sql = ("UPDATE clients SET fio='$fio', tr='$tr', dob='$dob', male='$male', number='$number', email='$mail', note='$note', groups='$groups', dorr='$dorr', torr='$torr', manager='$manager' WHERE id='$get_id'");
$result = $conn->query($sql);



header('location:../../../clients');


?>