<?php
session_start();
$get_id = (int)$_GET['id'];
require_once('../../../classes/userClass.php');
$userObj = new USER();
$userInfo = $userObj->getUserById($_SESSION['result']['id']);
$manager = $userInfo['result']['id'];
require_once('../conn.php');
$torr = date("H:i");
$dorr = date("Y-m-d");



$date = $_POST['datetime'];
$datetemp=explode(' ',$date,2);
$newdate = $datetemp[0];

$time = $_POST['datetime'];
$newtime = substr($time,11,5);
$status = $_POST['status']; 


$sql_backup = ("SELECT * from ce WHERE id='$get_id'");
$result_backup = $conn->query($sql_backup);
$row_backup = $result_backup->fetch_assoc();
$b_id_osn = $row_backup["id"]; 
$b_tr = $row_backup["tr"];
$b_client = $row_backup["client"];
$b_date = $row_backup["date"];
$b_client = $row_backup["client"];
$b_time = $row_backup["time"];
$b_wia = $row_backup["wia"];
$b_twtma = $row_backup["twtma"];
$b_note = $row_backup["note"];
$b_dorr = $row_backup["dorr"];
$b_torr = $row_backup["torr"];
$b_manager = $row_backup["manager"];
$b_status = $row_backup["status"];


$sql2 = ("INSERT INTO log_ce (id, id_ce, type, dorr, torr, manager) VALUES ('', '$b_id_osn', 'Изменен статус записи', '$dorr', '$torr', '$manager')");
$result2 = $conn->query($sql2);
$id_for_log=mysqli_insert_id($conn);

$sql_b_add2 = ("INSERT INTO log_ce_old (id, id_osn, id_for_log, tr, client, date, time, wia, twtma, note, dorr, torr, manager, status) VALUES ('', '$b_id_osn', '$id_for_log', '$b_tr', '$b_client', '$b_date', '$b_time', '$b_wia', '$b_twtma', '$b_note', '$b_dorr', '$b_torr', '$b_manager', '$b_status')");
$result_b_add2 = $conn->query($sql_b_add2);

if ($status=='4') {
$sql_b_add = ("INSERT INTO log_ce_status_old (id, id_osn, id_for_log, tr, date, time, dorr, torr, manager, status) VALUES ('', '$b_id_osn', '$id_for_log', '$b_tr', '$newdate', '$newtime', '$b_dorr', '$b_torr', '$b_manager', '$status')");
$result_b_add = $conn->query($sql_b_add);
}
else {
$sql_b_add = ("INSERT INTO log_ce_status_old (id, id_osn, id_for_log, tr, date, time, dorr, torr, manager, status) VALUES ('', '$b_id_osn', '$id_for_log', '$b_tr', '$b_date', '$b_time', '$b_dorr', '$b_torr', '$b_manager', '$status')");
$result_b_add = $conn->query($sql_b_add);
}

if ($status=='4') {
$sql = ("UPDATE ce SET date='$newdate', time='$newtime', dorr='$dorr', torr='$torr', manager='$manager', status='$status' WHERE id='$get_id'");
}
else {
$sql = ("UPDATE ce SET dorr='$dorr', torr='$torr', manager='$manager', status='$status' WHERE id='$get_id'");
}
$result = $conn->query($sql);
header('location:../../../ce');


?>