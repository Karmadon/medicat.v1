<?
$v = (int)$_GET['v'];
$sql = "SELECT fio, dorr, torr FROM log_client_old WHERE id_for_log='$v'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
    // output data of each row
	echo ''.$row["fio"].' Версия от ( '.$row["dorr"].' '.$row["torr"].')';
?>