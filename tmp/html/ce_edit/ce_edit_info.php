<?
$id = (int)$_GET['id'];
$sql = "SELECT tr FROM ce WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
    // output data of each row
	echo $row["tr"];
?>