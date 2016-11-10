<?
$v = (int)$_GET['v'];
$sql = "SELECT tr, dorr, torr FROM log_ce_old WHERE id_for_log='$v'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
    // output data of each row
	echo ''.$row["tr"].' Версия от ( '.$row["dorr"].' '.$row["torr"].')';
?>