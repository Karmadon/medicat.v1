<?php
$sqlid = "SELECT groupd_id FROM users WHERE id='$manager'";
$resultid = $conn->query($sqlid);
$rowid = $resultid->fetch_assoc();
if ($rowid["groupd_id"] =='1') {
/* Подключаем файлы шаблона */
$type = $_GET['type']; # Получаем тип страницы
if(empty($type) || !isset($type)) {
require_once('html/admin/admin_header.php');
require_once('html/admin/admin_body.php');
require_once('html/admin/admin_footer.php');
}
else if($type == 'sprav') { # Справочники
require_once('html/sprav/header.php');
require_once('html/sprav/body.php');
require_once('html/sprav/footer.php');
}
else if($type == 'sprav_add') {
require_once('html/sprav/add/sprav_header.php');
require_once('html/sprav/add/sprav_body.php');
require_once('html/sprav/add/sprav_footer.php');
}
else if($type == 'sprav_foas_add') {
require_once('html/sprav/add_foas/sprav_header.php');
require_once('html/sprav/add_foas/sprav_body.php');
require_once('html/sprav/add_foas/sprav_footer.php');
}
else if($type == 'sprav_phone_add') {
require_once('html/sprav/add_phone/sprav_header.php');
require_once('html/sprav/add_phone/sprav_body.php');
require_once('html/sprav/add_phone/sprav_footer.php');
}
else if($type == 'sprav_wia_add') {
require_once('html/sprav/add_wia/sprav_header.php');
require_once('html/sprav/add_wia/sprav_body.php');
require_once('html/sprav/add_wia/sprav_footer.php');
}

else if($type == 'sprav_edit') {
require_once('html/sprav/edit/sprav_header.php');
require_once('html/sprav/edit/sprav_body.php');
require_once('html/sprav/edit/sprav_footer.php');
}
else if($type == 'sprav_foas_edit') {
require_once('html/sprav/edit_foas/sprav_header.php');
require_once('html/sprav/edit_foas/sprav_body.php');
require_once('html/sprav/edit_foas/sprav_footer.php');
}
else if($type == 'sprav_phone_edit') {
require_once('html/sprav/edit_phone/sprav_header.php');
require_once('html/sprav/edit_phone/sprav_body.php');
require_once('html/sprav/edit_phone/sprav_footer.php');
}
else if($type == 'sprav_wia_edit') {
require_once('html/sprav/edit_wia/sprav_header.php');
require_once('html/sprav/edit_wia/sprav_body.php');
require_once('html/sprav/edit_wia/sprav_footer.php');
}

else if($type == 'sprav_drop') {
require_once('html/sprav/drop/sprav_header.php');
require_once('html/sprav/drop/sprav_body.php');
require_once('html/sprav/drop/sprav_footer.php');
}
else if($type == 'sprav_foas_drop') {
require_once('html/sprav/drop_foas/sprav_header.php');
require_once('html/sprav/drop_foas/sprav_body.php');
require_once('html/sprav/drop_foas/sprav_footer.php');
}
else if($type == 'sprav_phone_drop') {
require_once('html/sprav/drop_phone/sprav_header.php');
require_once('html/sprav/drop_phone/sprav_body.php');
require_once('html/sprav/drop_phone/sprav_footer.php');
}
else if($type == 'sprav_wia_drop') {
require_once('html/sprav/drop_wia/sprav_header.php');
require_once('html/sprav/drop_wia/sprav_body.php');
require_once('html/sprav/drop_wia/sprav_footer.php');
}
 
else if($type == 'add_user') {
require_once('html/admin/add/admin_header.php');
require_once('html/admin/add/admin_body.php');
require_once('html/admin/add/admin_footer.php');
} 

else if($type == 'view_user') {
require_once('html/admin/view/admin_header.php');
require_once('html/admin/view/admin_body.php');
require_once('html/admin/view/admin_footer.php');
}

else if($type == 'edit_user') {
require_once('html/admin/edit/admin_header.php');
require_once('html/admin/edit/admin_body.php');
require_once('html/admin/edit/admin_footer.php');
}

else if($type == 'drop_user') {
require_once('html/admin/drop/admin_header.php');
require_once('html/admin/drop/admin_body.php');
require_once('html/admin/drop/admin_footer.php');
} 
else if($type == 'system') {
require_once('html/admin/system/header.php');
require_once('html/admin/system/body.php');
require_once('html/admin/system/footer.php');
} 
else if($type == 'system_edit') {
require_once('html/admin/system_edit/admin_header.php');
require_once('html/admin/system_edit/admin_body.php');
require_once('html/admin/system_edit/admin_footer.php');
}
else if($type == 'system_color') {
require_once('html/admin/system_color/admin_header.php');
require_once('html/admin/system_color/admin_body.php');
require_once('html/admin/system_color/admin_footer.php');
}
else if($type == 'system_color_edit') {
require_once('html/admin/system_color_edit/admin_header.php');
require_once('html/admin/system_color_edit/admin_body.php');
require_once('html/admin/system_color_edit/admin_footer.php');
}
else if($type == 'system_color_drop') {
require_once('html/admin/system_color_drop/admin_header.php');
require_once('html/admin/system_color_drop/admin_body.php');
require_once('html/admin/system_color_drop/admin_footer.php');
}
else if($type == 'system_color_add') {
require_once('html/admin/system_color_add/admin_header.php');
require_once('html/admin/system_color_add/admin_body.php');
require_once('html/admin/system_color_add/admin_footer.php');
}
else if($type == 'disable_user') {
require_once('html/admin/visible/disable.php');
}
else if($type == 'enable_user') {
require_once('html/admin/visible/enable.php');
}   
else {
}
	  }
else{header('location:../../../profile');}

?>