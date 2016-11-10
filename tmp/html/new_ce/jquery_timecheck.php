<?php
session_start();
$get_time = (string)$_GET['time'];
$get_man = (string)$_GET['man'];
require_once('../conn.php');
$rest = substr($get_time, 0, 10);
$rest2 = substr($get_time, 11);
$pre = ("SELECT COUNT(*) as id FROM ce WHERE twtma='".$get_man."' AND date='".$rest."' AND time='".$rest2."'");
$result_pre = $conn->query($pre);
$row_pre = $result_pre->fetch_assoc();
if ($row_pre["id"]>='1') {
echo "На это время уже есть записанный клиент!";
}
else {}
?>