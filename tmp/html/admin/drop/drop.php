<?php
session_start();
$get_id = (int)$_GET['id'];
require_once('../../conn.php');
if ($get_id =='1') {
session_start();
echo "Вы не можете себя удалить";
sleep(2);
header('location:/admin?type=view_user');}
else {
$sql = "DELETE FROM users WHERE id=$get_id";
$result = $conn->query($sql);
$sql2 = "UPDATE ce SET twtma='0' WHERE twtma=$get_id";
$result2 = $conn->query($sql2);
header('location:/admin?type=view_user');
}

?>

