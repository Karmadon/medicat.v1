<?php
session_start();
require_once('../../../classes/userClass.php');
$userObj = new USER();
$userInfo = $userObj->getUserById($_SESSION['result']['id']);
$manager = $userInfo['result']['id'];
require_once('../conn.php');
$torr = date("H:i");
$dorr = date("Y-m-d");

$date = $_POST['date'];
$time = $_POST['time'];

$foas = $_POST['foas'];
$oapc = $_POST['oapc'];
$wia = $_POST['wia']; 
$lastname = $_POST['lastname'];
$name = $_POST['name'];
$thirthname = $_POST['thirthname'];
$fio="".$lastname." ".$name." ".$thirthname."";
$male = $_POST['male']; 
$number = $_POST['number'];
if (empty($number)) {
    $a="";
}
else{
$a = substr_replace($number, "(", 0, 0);
$a = substr_replace($a, ")", 4, 0);
$a = substr_replace($a, "-", 8, 0);
$a = substr_replace($a, "-", 11, 0);
$a = substr_replace($a, "+38", 0, 0);
$a = substr_replace($a, " ", 3, 0);
$a = substr_replace($a, " ", 9, 0); 
}
$note = $_POST['note']; 


$sqls = "SELECT id FROM calls ORDER BY id DESC LIMIT 1";
$results = $conn->query($sqls);
$rows = $results->fetch_assoc();
$tr_auto=$rows["id"];
if ($tr_auto<'9') {
$tr_add="000";
$tr_auto_plus=$tr_auto+1;	
}

elseif ($tr_auto='9') {
$tr_add="00";
$tr_auto_plus=$tr_auto+0;	
}

elseif ($tr_auto>'10' && $tr_auto<='99') {
$tr_add="00";
$tr_auto_plus=$tr_auto+1;	
}
elseif ($tr_auto='99') {
$tr_add="0";
$tr_auto_plus=$tr_auto+0;	
}

elseif ($tr_auto>'99' && $tr_auto<='999') {
$tr_add="0";
$tr_auto_plus=$tr_auto+1;	
}

elseif ($tr_auto='999') {
$tr_add="";
$tr_auto_plus=$tr_auto+0;	
}

elseif ($tr_auto>'999') {
$tr_add="";	
}
$tr_day = date("d");
$tr_month = date("m");
$tr_auto_plus=$tr_auto+1;
$tr_full ="".$tr_add."".$tr_auto_plus."".$tr_day."".$tr_month."";

$sql = ("INSERT INTO calls (id, tr, fio, male, number, date, time, foas, oapc, wia, note, dorr, torr, manager) VALUES ('', '$tr_full', '$fio', '$male', '$a', '$date', '$time', '$foas', '$oapc', '$wia', '$note', '$dorr', '$torr', '$manager')");
$result = $conn->query($sql);
$id_call=mysqli_insert_id($conn);

$sql2 = ("INSERT INTO log_calls (id, id_call, dorr, torr, manager) VALUES ('', '$id_call', '$dorr', '$torr', '$manager')");
$result2 = $conn->query($sql2);
header('location:../../../calls');

?>