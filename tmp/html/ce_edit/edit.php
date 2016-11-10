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

$wia = $_POST['wia']; 
$twtma = $_POST['twtma'];  
$note = $_POST['note']; 

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

$sql2 = ("INSERT INTO log_ce (id, id_ce, type, dorr, torr, manager) VALUES ('', '$b_id_osn', 'Изменены данные о записи', '$dorr', '$torr', '$manager')");
$result2 = $conn->query($sql2);
$id_for_log=mysqli_insert_id($conn);

$sql_b_add = ("INSERT INTO log_ce_old (id, id_osn, id_for_log, tr, client, date, time, wia, twtma, note, dorr, torr, manager, status) VALUES ('', '$b_id_osn', '$id_for_log', '$b_tr', '$b_client', '$b_date', '$b_time', '$b_wia', '$b_twtma', '$b_note', '$b_dorr', '$b_torr', '$b_manager', '$b_status')");
$result_b_add = $conn->query($sql_b_add);

$sql = ("UPDATE ce SET wia='$wia', twtma='$twtma', note='$note', dorr='$dorr', torr='$torr', manager='$manager' WHERE id='$get_id'");
$result = $conn->query($sql);
header('location:../../../ce');


?>