<?php
session_start();
require_once('../../../classes/userClass.php');
$userObj = new USER();
$userInfo = $userObj->getUserById($_SESSION['result']['id']);
$manager = $userInfo['result']['id'];
require_once('../conn.php');
$torr = date("H:i");
$dorr = date("Y-m-d");


$sqls = "SELECT id FROM ce ORDER BY id DESC LIMIT 1";
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

$client = $_POST['client'];

$date = $_POST['datetime'];
$datetemp=explode(' ',$date,2);
$newdate = $datetemp[0];

$time = $_POST['datetime'];
$newtime = substr($time,11,5);
$wia = $_POST['wia']; 
$twtma = $_POST['twtma'];  
$note = $_POST['note']; 

$pre = ("SELECT COUNT(*) as id FROM ce WHERE client='".$client."' AND date='".$newdate."' AND twtma='".$twtma."'");
$result_pre = $conn->query($pre);
$row_pre = $result_pre->fetch_assoc();
if ($row_pre["id"]>='1') {
header('location:../../../new_ce?add=error');
}

else {


$sql = ("INSERT INTO ce (id, tr, client, date, time, wia, twtma, note, dorr, torr, manager, status) VALUES ('', '$tr_full', '$client', '$newdate', '$newtime', '$wia', '$twtma', '$note', '$dorr', '$torr', '$manager', '0')");
$result = $conn->query($sql);

$id_ce=mysqli_insert_id($conn);

$sql2 = ("INSERT INTO log_ce (id, id_ce, type, dorr, torr, manager) VALUES ('', '$id_ce', 'Создана новая запись', '$dorr', '$torr', '$manager')");
$result2 = $conn->query($sql2);


$sql_clientgroup = "SELECT groups FROM clients WHERE id='".$client."'";
$result_clientgroup = $conn->query($sql_clientgroup);
$row_clientgroup = $result_clientgroup->fetch_assoc();

$sql_repday = "SELECT day_repeat FROM sprav_client_group WHERE id='".$row_clientgroup["groups"]."'";
$result_repday = $conn->query($sql_repday);
$row_repday = $result_repday->fetch_assoc();

if ($row_repday["day_repeat"]=='0' || empty($row_repday["day_repeat"])) {}
else {
$day_repeat=$row_repday["day_repeat"];
$day_final=date("Y-m-d", strtotime("+".$day_repeat." day",strtotime($newdate)));
$sql_repeat = ("INSERT INTO repeat_ce (id, id_ce, id_client, date_ce, day_repeat, date_final, status) VALUES ('', '$id_ce', '$client', '$newdate', '$day_repeat', '$day_final', '0')");
$result = $conn->query($sql_repeat);
$id_repeat_ce=mysqli_insert_id($conn);

$sql_repeat_log = ("INSERT INTO log_repeat (id, id_repeat_ce, type, dorr, torr, manager) VALUES ('', '$id_repeat_ce', 'Создано напоминание о повторе', '$dorr', '$torr', 'Система')");
$result = $conn->query($sql_repeat_log);
}

header('location:../../../ce');

}
?>