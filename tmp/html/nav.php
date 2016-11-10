<?php 
function getUrl() {
  $url = $_SERVER["REQUEST_URI"];
  return $url;
}
$now_url=getUrl();

$sql = "SELECT id, name, link, pic FROM pages WHERE id != '8' AND id != '7' AND id != '6'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo '<!-- sidebar menu: : style can be found in sidebar.less -->
	<ul class="sidebar-menu">
			<li class="header">Панель навигации</li>';
    while($row = $result->fetch_assoc()) {
		if ($now_url==$row["link"]) {
		echo '<li class="active">
				<a href="'. $row["link"].'">
					<i class="fa '. $row["pic"].'"></i> <span>'. $row["name"].'</span>
				</a>
			  </li>';
		}
		else {
		echo '<li>
				<a href="'. $row["link"].'">
					<i class="fa '. $row["pic"].'"></i> <span>'. $row["name"].'</span>
				</a>
			  </li>';	
		}
    }
	
	require_once('classes/userClass.php');
	$userObj = new USER();
	$userInfo = $userObj->getUserById($_SESSION['result']['id']);
    if ($userInfo['result']['groupd_id'] == '1' || $userInfo['result']['groupd_id'] == '101') {
	echo '<li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i> <span>Статистика</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu menu-open" style="display: block;">
            <li><a href="/stat?type=calls"><i class="fa fa-phone"></i> Звонки</a></li>
			<li><a href="/stat?type=ce"><i class="fa fa-edit"></i> Запись</a></li>
			<li><a href="/stat?type=clients"><i class="fa fa-users"></i> Клиенты</a></li>
          </ul>
        </li>';		  
	}
	else {}
	
	require_once('classes/userClass.php');
	$userObj = new USER();
	$userInfo = $userObj->getUserById($_SESSION['result']['id']);
	if ($userInfo['result']['groupd_id'] == '1') {
	echo '<li class="treeview">
          <a href="#">
            <i class="fa fa-user-secret"></i> <span>Администрирование</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu menu-open" style="display: block;">
		    <li><a href="/admin?type=system"><i class="fa fa-expeditedssl"></i>Настройки</a></li>
            <li><a href="/admin?type=add_user"><i class="fa fa-user-plus"></i> Добавление пользователя</a></li>
			<li><a href="/admin?type=view_user"><i class="fa fa-users"></i> Пользователи системы</a></li>
			<li><a href="/admin?type=sprav"><i class="fa fa-list-alt"></i> Справочники</a></li>
          </ul>
        </li>';		  
	}
	else {}
	
	if ($userInfo['result']['groupd_id'] == '1') {
	echo '<li>
				<a href="/log">
					<i class="fa fa-book"></i> <span>Логи системы</span>
				</a>
			  </li>';		  
	}
	else {}
	echo '</ul>';
} else {
    echo "0 results";
}
?>